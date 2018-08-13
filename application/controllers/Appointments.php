<?php
include 'Api_Controller.php';
class Appointments extends Api_Controller{

    public function api_set(){
      if(!$this->isAuth)
        return $this->output->set_status_header($this->header);

      /*Post Data
        {
          service_type_key: string,
          location_id:int,
          customer_id:int,
          payment_type:string,
          date: string,
          start_time:string,
          *number_of_housekeepers:int
          *location_area:int
        }
      */

        $post_data = json_decode(file_get_contents('php://input'),true);
        $this->load->helper('sms_helper');

        $date = $this->db->escape_str($post_data["date"]);
        $day_of_week = date("l", strtotime($post_data["date"]));
        $format_time = date("H:i", strtotime($post_data["start_time"]));
        $start_time = $this->db->escape_str($format_time);
        $query = "SELECT DISTINCT(h.housekeeper_id) FROM housekeeper as h
                  LEFT JOIN housekeeper_schedule AS hs ON h.housekeeper_id = hs.housekeeper_id
                  WHERE hs.date = ? AND hs.start_time >= ? AND hs.start_time <= ?";

        $schedule_query = $this->db->query($query, array($date, $start_time, $start_time));

        $day_offs_id = $this->db->query("SELECT housekeeper_id,schedule_dates FROM housekeeper");

        $values = array();
        foreach($schedule_query->result_array() as $row ){
            array_push($values, $row['housekeeper_id']);
        }

        foreach($day_offs_id->result_array() as $row){
              $day_off = json_decode($row['schedule_dates']);

              if(in_array($day_of_week,$day_off)){
                array_push($values, $row['housekeeper_id']);
              }
        }

        if(strpos(strtoupper($post_data['service_type_key']), 'COMMERCIAL') !== false){
          $post_data['number_of_housekeepers'] = ceil(($post_data['location_area'] - 1) / 100);
        }

        if(count($values)>0){
            $list_query_string = "SELECT * FROM housekeeper WHERE housekeeper_id NOT IN ? ORDER BY RAND() LIMIT ?";
            $list_query = $this->db->query($list_query_string, array($values,$post_data['number_of_housekeepers']))->result();
        }
        else{
            $list_query = $this->db->query("SELECT * FROM housekeeper ORDER BY RAND() LIMIT ?", array($post_data['number_of_housekeepers']))->result();
        }

        if(count($list_query) < $post_data['number_of_housekeepers']){
          return $this->output->set_status_header(404)
                              ->set_content_type('application/json', 'utf-8')
                              ->set_output(json_encode(array("message"=>"No housekeeper found")));
        }

        $service = $this->db->select('*')->from('services')->where(array('service_type_key'=>$post_data['service_type_key']))->get()->row();

            $time = new DateTime($format_time);
            $duration = $service->service_duration*60;
            $time->modify('+'.$duration.' minutes');
            $uuid = $this->db->select('UUID() as id')
                                ->get()
                                ->row();

            $this->db->trans_begin();
            // transaction query list
            $insert_booking_request = "INSERT INTO booking_request (booking_request_id, service_type_key, location_id, customer_id,payment_type, total_price) VALUES (?, ?, ?, ?, ?)";
            $select_booking_request = "SELECT * FROM booking_request WHERE booking_request_id = ?";
            $transaction_insert     = "INSERT INTO payment_transaction (transation_id, booking_request_id) VALUES (?, ?)";
            $select_location        = "SELECT * FROM location WHERE location_id = ? AND customer_id = ?";
            // query list end

            $booking_request_id = $this->db->select('UUID() as id')->get()->row();
            if(strpos(strtoupper($post_data['service_type_key']), 'COMMERCIAL') !== false){
              $remainder_area = $post_data['location_area'] - 50;
              $pseudo_area = ceil($remainder_area / 10) * 10;
              $remainder_price_per_area = $pseudo_area * 150;
              $total_price = $service->service_price + $remainder_price_per_area;
            }
            else{
              $total_price = $service->service_price * count($list_query);
            }
            $this->db->query($insert_booking_request, array($booking_request_id, $post_data['service_type_key'], $post_data['location_id'], $post_data['customer_id'], $post_data['payment_type'], $total_price));

            foreach($list_query as $housekeeper){
              $schedule_data = array(
                  'booking_request_id' => $booking_request_id->id,
                  'housekeeper_id'=>$housekeeper->housekeeper_id,
                  'date'=>$date,
                  'start_time'=>$format_time,
                  'end_time'=> $time->format('H:i'),
                  'availability'=>'1'
              );
              $this->db->insert('housekeeper_schedule',$schedule_data);
            }
            $booking_data = $this->db->query($select_booking_request, array($booking_request_id->id))->get()->row();

            $transaction_id = $this->db->select('UUID() as id')->get()->row();
            $service_id = $this->db->select('UUID() as id')->get()->row();

            $this->db->query($transaction_insert, array($transaction_uid->id, $booking_request_id));

            $drop_code = random_int(100000,999999);
            foreach($list_query as $housekeeper){
              $service_data = array(
                  'service_cleaning_id'=>$service_uid->id,
                  'transaction_id' => $transaction_uid->id,
                  'housekeeper_id' => $list_query->housekeeper_id,
                  'drop_code'=>$drop_code
              );
              $this->db->insert('service_cleaning',$service_data);
            }

            $location = $this->db->query($select_location, array($post_data['location_id'], $post_data['customer_id']))->get()->row();
            $schedule = $this->db->select('*')->from('housekeeper_schedule')->where(array('booking_request_id'=>$booking_request_id->id))->get()->row();
            $customer = $this->db->select('*')->from('customer')->where($this->whereIs)->get()->row();
            $appointment_data = array(
                'service_cleaning_id'=>$service_uid->id,
                'service'=>$service,
                'location'=>$location,
                'housekeepers'=>$list_query,
                'date'=>$schedule->date,
                'start_time'=>$schedule->start_time,
                'end_time'=>$schedule->end_time,
                'is_paid'=>false,
                'is_finished'=>false,
                'total_price'=>$booking_data->total_price,
                'payment_type'=>$booking_data->payment_type,
                'drop_code'=>$service_data['drop_code']
            );
            $didSendMessage = send_appointment_details_to_employee($appointment_data,$customer);
            if ($this->db->trans_status() && $didSendMessage){
                $this->db->trans_rollback();
                return $this->output->set_status_header(200)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($appointment_data));
            }
            else{
                $this->db->trans_rollback();
                $trans_error = array(
                    'message'=>'Failed to provide you a booking'
                );
                return $this->output->set_status_header(500)
                        ->set_content_type('application/json', 'utf-8')
                        ->set_output(json_encode($trans_error));
            }



    }

    public function api_get($id = null){
      if(!$this->isAuth)
        return $this->output->set_status_header($this->header);


        $customer = $this->db->select('*')->from('customer')
                                        ->where($this->whereIs)->get()->row();

        if($id){
            $query = $this->db->query('call select_specific_appointment(?,?)', array($customer->customer_id,$id));
            $result = $query->row();
            if(isset($result)){
                $appointment = $this->curate_appointment_data($result);
            }
            else{
                return $this->output->set_status_header(404)
                                    ->set_content_type('application/json', 'utf-8')
                                    ->set_output(json_encode(array("message"=>"Content not found")));
            }
        }
        else{
            $query = $this->db->query('call select_all_pending_appointments(?)',array($customer->customer_id))->result();
            $appointment = array();
            foreach($query as $result){
                $appointment_data = $this->curate_appointment_data($result);
                array_push($appointment,$appointment_data);
            }
        }

        return $this->output->set_status_header(200)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($appointment));

    }

    private function curate_appointment_data($result){
        return array(
            'service_cleaning_id'=>$result->service_cleaning_id,
            'service'=>array("service_type_key"=>$result->service_type_key,"service_price"=>$result->service_price),
            'location'=>array("street_address"=>$result->street_address,"barangay"=>$result->barangay,"city_address"=>$result->city_address),
            'housekeepers'=>array("housekeeper_id"=>$result->housekeeper_id, "first_name"=>$result->first_name, "middle_name"=>$result->middle_name, "last_name"=>$result->last_name, "rating"=>$result->rating),
            'date'=>$result->date,
            'start_time'=>$result->start_time,
            'end_time'=>$result->end_time,
            'is_paid'=>($result->is_paid)?true:false,
            'is_finished'=>($result->is_finished)?true:false,
            'payment_type'=>$result->payment_type,
            'rating'=>$result->rating
        );
    }
}
