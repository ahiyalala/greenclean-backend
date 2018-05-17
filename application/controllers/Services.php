<?php

class Services extends CI_Controller{

    public function api_get(){

        $services = $this->db->get('services')->result();

        $this->output->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($services));
    }

    public function add(){
        $this->load->model('servicesmodel');

        if($this->servicesmodel->add()){
            $this->session->set_flashdata('message','Successfully added employee');
        }
        else{
            $this->session->set_flashdata('message','Something went wrong');
        }

        redirect('admin/');
    }
}
