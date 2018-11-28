<?php

class Home extends CI_Controller{
    public function index(){
        $this->load->view('coming_soon');
    }

    public function faq(){
      $this->load->view('faq');
    }
}
