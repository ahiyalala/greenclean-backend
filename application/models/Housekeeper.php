<?php

class Housekeeper extends CI_Model{
    public $housekeeper_id;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $birth_date;
    public $email_address;
    public $contact_number;
    public $gender;
    public $schedule_dates;

    public function get_all(){
        return $this->db->select('*')
                            ->from('housekeeper')
                            ->order_by('last_name')
                            ->get()->result();
    }

    public function get_specific($id){
        return $this->db->select('*')
                        ->from('housekeeper')
                        ->where(array('housekeeper_id'=>$id))
                        ->get()
                        ->row();
    }

    public function add(){
        $this->first_name = $this->input->post('first_name');

        if(isset($_POST['middle_name']))
        $this->middle_name = $this->input->post('middle_name');

        $this->last_name = $this->input->post('last_name');

        $this->birth_date = $this->input->post('birth_date');
        $this->email_address = $this->input->post('email_address');
        $this->contact_number = $this->input->post('contact_number');
        $schedule = $this->input->post('work_schedule');
        $this->schedule_dates = json_encode($schedule);
        $this->gender = $this->input->post('gender');

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
