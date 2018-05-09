<?php

class Sms extends CI_Controller{
    public function index(){
        if($this->input->method(TRUE)=='POST'){
            $post_data = json_decode(file_get_contents('php://input'),true);

            $this->unsubscribe($post_data['unsubscribed']);
        }
        else if($this->input->method(TRUE)=='GET'){
            $data = array(
                'token'=>$this->input->get('access_token',FALSE),
                'subscriber_number'=>$this->input->get('subscriber_number',FALSE)
            );

            $this->get_receiver($data);
        }
    }

    private function unsubscribe($data){
        $this->db->trans_start();
        $this->db->update('housekeeper', array('globe_access_token'=>null),array('contact_number'=>$data['subscriber_number']));
        $count = $this->db->affected_rows();
        $this->db->trans_complete();
        if($this->db->trans_status() == FALSE){

            $message = 'Server failed to register employee\'s subscription details:\n'.json_encode(array('access_token'=>$data['access_token'],'subscriber_number'=>$data['subscriber_number']));
            log_message('error', $message);
            return $this->output->set_status_header(500);
        }
        else if($count == 0){
            return $this->output->set_status_header(400);
        }
        else{
            log_message('info',json_encode($data));
            return $this->output->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data));
            
        }
    }

    private function get_receiver($data){
        $token = $data['token'];
        $number = $data['subscriber_number'];

        /*
        {
            "access_token":"1ixLbltjWkzwqLMXT-8UF-UQeKRma0hOOWFA6o91oXw",
            "subscriber_number":"9171234567"
        }
        */
        $this->db->trans_start();
        $this->db->update('housekeeper', array('globe_access_token'=>$token),array('contact_number'=>$number));
        $count = $this->db->affected_rows();
        $this->db->trans_complete();
        if($this->db->trans_status() == FALSE){

            $message = 'Server failed to register employee\'s subscription details:\n'.json_encode(array('access_token'=>$token,'subscriber_number'=>$number));
            log_message('error', $message);
            return $this->output->set_status_header(500);
        }
        else if($count == 0){
            return $this->output->set_status_header(400);
        }
        else{
            log_message('info',json_encode($data));
            return $this->output->set_status_header(200);
            
        }
    }
}