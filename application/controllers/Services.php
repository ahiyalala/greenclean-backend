<?php

class Services extends CI_Controller{

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
            $this->load->helper('admin_verify_helper');
    }

    public function api_get(){

        $services = $this->db->get_where('services',array('deleted'=>0))->result();

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
        $this->load->model('servicesmodel');

        if($this->servicesmodel->add()){
            $this->session->set_flashdata('status',true);
        }
        else{
            $this->session->set_flashdata('status',false);
        }

        redirect('admin/management','location');
    }

    public function update(){
      admin_verify();

      $this->load->model('servicesmodel');

      if($this->servicesmodel->update()){
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

      $this->load->model('servicesmodel');

      if($this->servicesmodel->delete()){
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
