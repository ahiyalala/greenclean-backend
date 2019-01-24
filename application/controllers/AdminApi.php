<?php

class AdminApi extends CI_Controller{
  public function employee_appointments($id){
    if(!$this->session->has_userdata('user')){
      return $this->output->set_status_header(401)
                          ->set_content_type('application/json','utf-8')
                          ->set_output(json_encode(array(
                            "message"=>"Unauthorized"
                          )));

    }


      $query = "select t.is_finished, s.service_cleaning_id, c.first_name, c.last_name, hs.date, hs.start_time, hs.end_time
                from housekeeper_schedule as hs
                left join housekeeper as h on h.housekeeper_id=hs.housekeeper_id
                left join booking_request as b on b.schedule_id=hs.schedule_id
                left join customer as c on c.customer_id=b.customer_id
                left join payment_transaction as t on t.booking_request_id = b.booking_request_id
                left join service_cleaning as s on t.transaction_id = s.transaction_id
                where h.housekeeper_id = ".$this->db->escape_like_str($id)." and hs.availability <> 0";

        $appointments = $this->db->query($query)->result();
        $output = [];
        foreach($appointments as $data){
          $q = $data->is_finished;
          $status = ($q)? "[D]":"[P]";
          $input = array(
            'id'=>$data->service_cleaning_id,
            'title' => $status." ".$data->first_name." ".$data->last_name,
            'start' => $data->date.' '.$data->start_time,
            'end'=> $data->date.' '.$data->end_time
          );
          array_push($output,$input);
        }

        $this->output->set_status_header(200)
                      ->set_content_type('application/json','utf-8')
                      ->set_output(json_encode($output));
  }
}
