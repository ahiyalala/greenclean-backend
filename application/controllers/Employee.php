<?php

class Employee extends CI_Controller{
    public function add(){
        $this->load->helper('url');
        $this->load->model('housekeeper');
        $housekeeper = $this->housekeeper->add();
        if($housekeeper){
            $schedules = $this->input->post('work_schedule');
            $this->db->trans_start();
            foreach($schedules as $schedule){
                $date = new DateTime('today');
                for($x = 0; $x < 12; $x++){
                    $date->modify('next '.$schedule);
    
                    $this->db->insert('housekeeper_schedule',array(
                        'housekeeper_id'=>$housekeeper,
                        'date'=>$date->format('Y-m-d'),
                        'availability'=>0
                    ));
                }
            }
            $this->db->trans_complete();
            if($this->db->trans_status()){
                $this->session->set_flashdata('message','Successfully added employee');
            }
            else{
                $this->session->set_flashdata('message','Something went wrong');
            }
        }
        else{
            $this->session->set_flashdata('message','Something went wrong');
        }

        redirect('admin/employee');
    }
}