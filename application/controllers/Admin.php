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
        $this->load->view("admin-2-dashboard",$data);
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
        $this->load->view('admin-2-dashboard',$data);
    }

    public function employee($id=null){
        $this->load->model('housekeeper');
        
        $data = array(
            'admin' => array(
                'first_name' => "Kuroneko",
                'middle_name' => "Kuro",
                'last_name' => "Kuroro",
                "is_super" => 0
            )
        );
        if($id){
            $data['housekeepers'] = $this->housekeeper->get_specific($id);
            $view = 'admin-5-employee-profile';
        }
        else{
            $data['housekeepers'] = $this->housekeeper->get_all();
            $view = 'admin-4-employee';
        }

        $this->load->view($view,$data);
    }
}