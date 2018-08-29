<?php
class Dashboard extends CI_Controller{

      // https://greenkean.herokuapp.com/dashboard
      public function index(){
        $this->load->view('client-1-dashboard1');
      }

      // https://greenkean.herokuapp.com/dashboard/profile
      public function profile(){
        $this->load->view('client-7-profile');
      }
      public function book(){
        $this->load->view('client-5-booking-complete');
      }


}
