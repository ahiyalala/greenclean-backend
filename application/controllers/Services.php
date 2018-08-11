<?php

class Services extends CI_Controller{

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
            $this->load->helper('admin_verify_helper');
    }

    public function api_get(){

        $services = $this->db->query("SELECT service_type_key, service_description, service_price, service_duration, service_image FROM services WHERE deleted <> 0")->result();

        $this->output->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($services));
    }

    public function get_specific($key){
      admin_verify();
      $key = urldecode($key);
      $services = $this->db->get_where('services',array('service_type_key'=>$key))->row();

      $this->output->set_status_header(200)
          ->set_content_type('application/json', 'utf-8')
          ->set_output(json_encode($services));
    }

    public function add(){
        admin_verify();
        $this->load->model('ServicesModel');

        if($this->ServicesModel->add()){
            $this->session->set_flashdata('status',true);
        }
        else{
            $this->session->set_flashdata('status',false);
        }

        redirect('admin/management','location');
    }

    public function update(){
      admin_verify();

      $this->load->model('ServicesModel');

      if($this->ServicesModel->update()){
        $this->session->set_flashdata('status',array(
          'is_successful'=>true,
          'message'=>$this->input->post('service_type_key').": Update successful"
        ));
      }
      else{
        $this->session->set_flashdata('status',array(
          'is_successful'=>true,
          'message'=>$this->input->post('service_type_key').": Update failed"
        ));
      }

      redirect('admin/management','location');
    }

    public function delete(){
      admin_verify();

      $this->load->model('ServicesModel');

      if($this->ServicesModel->delete()){
        $this->session->set_flashdata('status',array(
          'is_successful'=>true,
          'message'=>$this->input->post('service_type_key').": Delete successful"
        ));
      }
      else{
        $this->session->set_flashdata('status',array(
          'is_successful'=>true,
          'message'=>$this->input->post('service_type_key').": Delete failed"
        ));
      }

      redirect('admin/management','location');
    }

}
