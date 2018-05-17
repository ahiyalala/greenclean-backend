<?php

class Housekeeper extends CI_Model{
    public $service_type_key;
    public $service_description;
    public $service_price;
    public $service_duration;

    public function add(){
        $this->service_type_key = $this->input->post('service_type');
        $this->service_description = $this->input->post('service_description');
        $this->service_price = $this->input->post('service_price');
        $this->service_duration = $this->input->post('service_duration');

        $this->db->trans_start();
        $this->db->insert('housekeeper',$this);
        $id = $this->db->insert_id();
        $this->db->trans_complete();

        if($this->db->trans_status()){
            return $id;
        }
        else{
            $message = $this->db->error();
            log_message('Error',json_encode($message));
            return false;
        }
    }
}