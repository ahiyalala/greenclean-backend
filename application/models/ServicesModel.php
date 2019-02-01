<?php

class ServicesModel extends CI_Model{
    public $service_type_key;
    public $service_description;
    public $service_price;
    public $service_duration;
    public $service_image;

    public function get($service_type_key){
        $service = $this->db->query('SELECT * FROM services WHERE service_type_key = ?', array($service_type_key))->row();
        return $service;
    }

    public function add(){
        $this->service_type_key = $this->input->post('service_type');
        $this->service_description = $this->input->post('service_description');
        $this->service_price = $this->input->post('service_price');
        $this->service_duration = $this->input->post('service_duration');

        $this->db->trans_start();
        $this->db->insert('services',$this);
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

    public function update(){
      $data = array(
        'service_description'=>$this->input->post('service_description'),
        'service_price'=>$this->input->post('service_price'),
        'service_duration'=>$this->input->post('service_duration')
      );
      $id = $this->input->post('service_type_key');
      $this->db->trans_start();
      $this->db->where('service_type_key',$id);
      $this->db->update('services',$data);
      $this->db->trans_complete();

      if($this->db->trans_status()){
          return true;
      }
      else{
          $message = $this->db->error();
          log_message('Error',json_encode($message));
          return false;
      }
    }

    public function delete(){
      $this->db->trans_start();
      $this->db->where('service_type_key',$this->input->post('service_type_key'));
      $this->db->update('services',array('deleted'=>'1'));
      $this->db->trans_complete();

      if($this->db->trans_status()){
          return true;
      }
      else{
          $message = $this->db->error();
          log_message('Error',json_encode($message));
          return false;
      }
    }
}
