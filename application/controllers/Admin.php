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
        $this->load->view("gc_adm-1-dashboard",$data);
    }
}