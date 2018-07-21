<?php

class ServicesModel extends CI_Model{
    public $service_type_key;
    public $service_description;
    public $service_price;
    public $service_duration;
    public $service_image;

    public function add(){
        $this->service_type_key = $this->input->post('service_type');
        $this->service_description = $this->input->post('service_description');
        $this->service_price = $this->input->post('service_price');
        $this->service_duration = $this->input->post('service_duration');

        $config['upload_path'] = "./img/";
        $config['allowed_types'] = "gif|jpg|png";
        $config['max_size'] = "1024";

        $this->load->library('upload',$config);

        if(!$this->upload->do_upload('service_image')){
          log_message('error',$this->upload->display_errors());
          return;
        }

        $data = $this->upload->data();

        $this->service_image = $data['raw_name'].$data['file_ext'];

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
