<?php 

class Appointments extends CI_Controller{

    public function api_set(){
        $post_data = json_decode(file_get_contents('php://input'),true);
        $auth = $this->input->get_request_header('Authentication');
        $auth_arr = explode(" ",$auth);
        
        /*
            SELECT *  FROM `housekeeper` 
            WHERE housekeeper_id NOT IN (SELECT housekeeper_id FROM `housekeeper_schedule` WHERE ((date IS NULL) AND ((start_time >= '16:00' AND start_time <= '19:00') OR (end_time>= '16:00' AND end_time<='19:00'))) OR (date = '2018-04-11'))
        */
        if(count($auth_arr)!=2){
            return $this->output->set_status_header(400)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($message));
        }

        $whereIs = array('email_address'=>$auth_arr[0],'user_token'=>$auth_arr[1]);
        $message = array("message"=>"Bad request");
        $whereIs['customer_id'] = $post_data['customer_id'];

        $query = $this->db->from('customer')
                    ->where($whereIs);

        if($query->count_all_results()){
            return $this->output->set_status_header(400)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($message));
        }

        

        $date = $this->db->escape_str($post_data["date"]);
        $format_time = date("H:i", strtotime($post_data["start_time"]));
        $start_time = $this->db->escape_str($format_time);

        $sql = "SELECT housekeeper_id FROM housekeeper_schedule WHERE ((date IS NULL) AND ((start_time >= '".$start_time."' AND start_time <= '".$start_time."') OR (end_time >= '".$start_time."' AND end_time <= '".$start_time."'))) OR (date = '".$date."')";

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
            
            $this->db->trans_start(TRUE);
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
            $this->db->insert('payment_transaction',array('booking_request_id'=>$booking_data->booking_request_id));
            $transaction_id = $this->db->insert_id();
            $service_data = array(
                'transaction_id' => $transaction_id,
                'housekeeper_id' => $list_query->housekeeper_id
            );
            $this->db->insert('service_cleaning',$service_data);
            $location = $this->db->select('*')->from('location')->where(array('location_id'=>$post_data['location_id'],'customer_id'=>$post_data['customer_id']))->get()->row();
            $service = $this->db->select('*')->from('services')->where(array('service_type_key'=>$post_data['service_type_key']))->get()->row();
            $schedule = $this->db->select('*')->from('housekeeper_schedule')->where(array('schedule_id'=>$schedule_id))->get()->row();
            $appointment_data = array(
                'booking_request_id'=>$booking_data->booking_request_id,
                'service'=>$service,
                'location'=>$location,
                'housekeeper'=>$list_query,
                'date'=>$schedule->date,
                'start_time'=>$schedule->start_time,
                'end_time'=>$schedule->end_time,
                'is_paid'=>0,
                'is_finished'=>0,
                'payment_type'=>$booking_data->payment_type
            );
            $this->db->trans_complete();
            if ($this->db->trans_status()){
                return $this->output->set_status_header(200)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($appointment_data));
            }
            else{
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
}