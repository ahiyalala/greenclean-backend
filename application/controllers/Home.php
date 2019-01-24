<?php

class Home extends CI_Controller{
    public function index(){
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
                            "Mobile"=>"09361234567",
                            "Landline"=>"02 123 4567",
                            "Email"=>"greenklean.ph@gmail.com"
                          )));
    }
}
