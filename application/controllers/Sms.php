<?php

class Sms extends CI_Controller{
    public function index(){
        if($this->input->method(TRUE)=='POST'){
            $post_data = json_decode(file_get_contents('php://input'),true);

            $this->_unsubscribe($post_data['unsubscribed']);
        }
        else if($this->input->method(TRUE)=='GET'){
            $data = array(
                'token'=>$this->input->get('access_token',FALSE),
                'subscriber_number'=>$this->input->get('subscriber_number',FALSE)
            );

            $this->_get_receiver($data);
        }
    }

    private function _unsubscribe($data){
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

    private function _get_receiver($data){
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
            $this->load->helper('sms_helper');
            $message =  "Nakasubscribe ka na sa Housekeeper Notifier ng GreenKlean!\n\n".
                        "Se-sendan ka namin ng text sakaling makatanggap ka ng appointment.\n\n".
                        "Paalala:\n".
                        "- Sa bawat appointment na iyong matatanggap ay may kaakibat na [Assignment Code] na gagamitin lamang pagkatapos ng iyong appointment.\n\n".
                        "- Upang magamit ang [Assignment Code], i-text ang: END [Assignment Code]\n\n".
                        "- Sa panahong magkaroon ng problema sa customer, mag-text o tumawag sa [[insert cellphone number here]]."
            send_general_message($number,$token,$message);
            log_message('info',json_encode($data));
            return $this->output->set_status_header(200);
        }
    }


    public function notify(){
      /*
        {
          "inboundSMSMessageList":{
              "inboundSMSMessage":[
                 {
                    "dateTime":"Fri Nov 22 2013 12:12:13 GMT+0000 (UTC)",
                    "destinationAddress":"tel:21581234",
                    "messageId":null,
                    "message":"END 037950",
                    "resourceURL":null,
                    "senderAddress":"tel:+639171234567"
                 }
               ],
               "numberOfMessagesInThisBatch":1,
               "resourceURL":null,
               "totalNumberOfPendingMessages":null
           }
        }
      */

      $data = json_decode(file_get_contents('php://input'),true);

      $messages = $data['inboundSMSMessageList']['inboundSMSMessage'];
      foreach ($messages as $message) {
        $command = explode(" ",$message["message"]);
        switch($command[0]){
          case "END":
              $this->load->model('AppointmentModel');
              $contact_number = str_replace('tel:','',$message['senderAddress']);
              $status = $this->AppointmentModel->close_appointment($command[1],$contact_number);
        }
        log_message("debug","command: ".$command[0]." target: ".$command[1]);
        log_message('debug',$message["senderAddress"]);
        log_message('debug',$message["dateTime"]);
        log_message('debug',$message['messageId']);
      }

      return $this->output->set_status_header(200);
    }
}
