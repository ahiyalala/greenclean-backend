<?php 

class Appointments extends CI_Controller{

    public function api_set(){
        $auth = $this->input->get_request_header('Authentication');
        $auth_arr = explode(" ",$auth);
        $whereIs = array('email_address'=>$auth_arr[0],'user_token'=>$auth_arr[1]);
        /*
            SELECT *  FROM `housekeeper` 
            WHERE housekeeper_id NOT IN (SELECT housekeeper_id FROM `housekeeper_schedule` WHERE ((date IS NULL) AND ((start_time >= '16:00' AND start_time <= '19:00') OR (end_time>= '16:00' AND end_time<='19:00'))) OR (date = '2018-04-11'))
        */
        if(count($auth_arr)==2){
            $schedule_query = $this->db->query('SELECT housekeeper_id FROM housekeeper_schedule WHERE ((date IS NULL) AND ((start_time >= \'16:00\' AND start_time <= \'19:00\') OR (end_time>= \'16:00\' AND end_time<= \'19:00\'))) OR (date = \'2018-04-11\')');
            
            $values = array();
            foreach($schedule_query->result_array() as $row ){
                array_push($values, $row['housekeeper_id']);
            }
            $list_query = $this->db->select('*')
                                    ->from('housekeeper')
                                    ->where_not_in('housekeeper_id',$values)
                                    ->get()
                                    ->result();

            $this->output->set_status_header(200)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($list_query));
        }
        else{
            $message = array("message"=>"Bad request");
            $this->output->set_status_header(400)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($message));
        }
        
    }
}