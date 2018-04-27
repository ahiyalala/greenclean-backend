<?php

class Admin extends CI_Controller {
    public function index(){
        $housekeepers = $this->db->count_all_results('housekeeper');
        $customers = $this->db->count_all_results('customer');
        $data = array(
            'housekeeper' => $housekeepers,
            'customer' => $customers,
            'admin' => array(
                'first_name' => "Kuroneko",
                'middle_name' => "Kuro",
                'last_name' => "Kuroro",
                "is_super" => 0
            )
        );
        $this->load->view("_header",$data);
        $this->load->view("admin_dashboard",$data);
        $this->load->view("_footer");
    }

    public function management(){
        $this->load->helper('form');
        $services = $this->db->select('*')->from('services')->get()->result();
        $data = array(
            'services'=>$services,
            'admin' => array(
                'first_name' => "Kuroneko",
                'middle_name' => "Kuro",
                'last_name' => "Kuroro",
                "is_super" => 0
            )
        );
        $this->load->view("_header",$data);
        $this->load->view('admin_service',$data);
        $this->load->view("_footer");
    }

    public function employee(){
        $this->load->model('housekeeper');

        $employee_list = $this->housekeeper->get_all();

        $data = array(
            'housekeepers' => $employee_list,
            'admin' => array(
                'first_name' => "Kuroneko",
                'middle_name' => "Kuro",
                'last_name' => "Kuroro",
                "is_super" => 0
            )
        );
        $this->load->view("_header",$data);
        $this->load->view('admin_employee',$data);
        $this->load->view("_footer");
    }
}