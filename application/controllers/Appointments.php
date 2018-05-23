<?php
include 'Api_Controller.php';
class Appointments extends Api_Controller{

    public function api_set(){
      if(!$this->isAuth)
        return $this->output->set_status_header($this->header);

        $post_data = json_decode(file_get_contents('php://input'),true);
        $this->load->helper('sms_helper');

        $date = $this->db->escape_str($post_data["date"]);
        $format_time = date("H:i", strtotime($post_data["start_time"]));
        $start_time = $this->db->escape_str($format_time);
        $sql = "SELECT housekeeper_id FROM housekeeper_schedule WHERE (date = '".$date."' AND start_time >= '".$start_time."' AND start_time <= '".$start_time."' ) OR (date = '".$date."' AND end_time >= '".$start_time."' AND end_time <= '".$start_time."' ) OR (date = '".$date."' AND availability='0')";

        $schedule_query = $this->db->query($sql);

        $values = array();
        foreach($schedule_query->result_array() as $row ){
            array_push($values, $row['housekeeper_id']);
        }

        if(count($values)>0){
            $list_query = $this->db->select('*')
                ->from('housekeeper')
                ->where_not_in('housekeeper_id',$values)
                ->order_by('RAND()')
                ->get()
                ->row();
        }
        else{
            $list_query = $this->db->select('*')
                                    ->from('housekeeper')
                                    ->order_by('RAND()')
                                    ->get()
                                    ->row();
        }

        if(isset($list_query->housekeeper_id)){
            $time = new DateTime($format_time);
            $time->modify('+3 hours');
            $uuid = $this->db->select('UUID() as id')
                                ->get()
                                ->row();

            $this->db->trans_begin();
            $schedule_data = array(
                'housekeeper_id'=>$list_query->housekeeper_id,
                'date'=>$date,
                'start_time'=>$format_time,
                'end_time'=> $time->format('H:i'),
                'availability'=>'1'
            );
            $this->db->insert('housekeeper_schedule',$schedule_data);
            $schedule_id = $this->db->insert_id();
            $booking_request = array(
                'booking_request_id'=>$uuid->id,
                'service_type_key' => $post_data['service_type_key'],
                'location_id'=> $post_data['location_id'],
                'customer_id'=>$post_data['customer_id'],
                'payment_type'=>$post_data['payment_type'],
                'schedule_id'=>$schedule_id
            );
            $this->db->insert('booking_request',$booking_request);
            $booking_data = $this->db->select('*')->from('booking_request')->where(array('booking_request_id'=>$uuid->id))->get()->row();
            $transaction_uid = $this->db->select('UUID() as id')->get()->row();
            $service_uid = $this->db->select('UUID() as id')->get()->row();
            $this->db->insert('payment_transaction',array('transaction_id'=>$transaction_uid->id,'booking_request_id'=>$booking_data->booking_request_id));
            $service_data = array(
                'service_cleaning_id'=>$service_uid->id,
                'transaction_id' => $transaction_uid->id,
                'housekeeper_id' => $list_query->housekeeper_id
            );
            $this->db->insert('service_cleaning',$service_data);
            $location = $this->db->select('*')->from('location')->where(array('location_id'=>$post_data['location_id'],'customer_id'=>$post_data['customer_id']))->get()->row();
            $service = $this->db->select('*')->from('services')->where(array('service_type_key'=>$post_data['service_type_key']))->get()->row();
            $schedule = $this->db->select('*')->from('housekeeper_schedule')->where(array('schedule_id'=>$schedule_id))->get()->row();
            $customer = $this->db->select('*')->from('customer')->where($this->whereIs)->get()->row();
            $appointment_data = array(
                'service_cleaning_id'=>$service_uid->id,
                'service'=>$service,
                'location'=>$location,
                'housekeeper'=>$list_query,
                'date'=>$schedule->date,
                'start_time'=>$schedule->start_time,
                'end_time'=>$schedule->end_time,
                'is_paid'=>false,
                'is_finished'=>false,
                'payment_type'=>$booking_data->payment_type
            );
            $didSendMessage = send_appointment_details_to_employee($appointment_data,$customer);
            if ($this->db->trans_status() && $didSendMessage){
                $this->db->trans_commit();
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

        return $this->output->set_status_header(404)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($message));

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
            'housekeeper'=>array("housekeeper_id"=>$result->housekeeper_id, "first_name"=>$result->first_name, "middle_name"=>$result->middle_name, "last_name"=>$result->last_name, "rating"=>$result->rating),
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
