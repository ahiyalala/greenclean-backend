<?php

class Home extends CI_Controller{
    public function index(){
        $this->load->helper('form');
        $this->load->view('foundation_index');
    }

    public function faq(){
      $this->load->view('faq');
    }

    public function privacy(){
      $this->load->view('_privacy-policy');
    }

    public function tnc(){
      $this->load->view('_terms-and-conditions');
    }

    public function contacts(){
      return $this->output->set_status_header(200)
                          ->set_content_type('application/json','utf-8')
                          ->set_output(json_encode(array(
                            "Mobile"=>"09365855236",
                            "Email"=>"greenklean.ph@gmail.com"
                          )));
    }

    public function booking(){
      $this->load->view('booking-index');
    }

    public function send_feedback(){
        $this->load->library('email');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $message = html_escape($this->input->post('message'));

        $this->email->from($email, $name);
        $this->email->to('sales@greenklean.ph');

        $this->email->subject("Message from ".$name." via contact form!");
        $this->email->message($message);

        if(!$this->email->send()){
          log_message('ERROR', 'Failed to send');
        }
          redirect('/','location');
    }
}
