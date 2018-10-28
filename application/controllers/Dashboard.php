<?php
class Dashboard extends CI_Controller{

      public function __construct(){
        parent::__construct();
        redirect('/admin','refresh',301);
      }

      // https://greenkean.herokuapp.com/dashboard
      public function index(){
        $this->load->view('coming_soon');
      }

      // https://greenkean.herokuapp.com/dashboard/profile
      public function profile(){
        $this->load->view('client-7-profile');
      }
      public function booka(){
        $this->load->view('client-17-bookA');
      }

      public function bookb(){
        $this->load->view('client-18-bookB');
      }

      public function bookc(){
        $this->load->view('client-19-bookC');
      }


}
