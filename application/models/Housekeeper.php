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

    public function get_all(){
        return $this->db->select('*')
                            ->from('housekeeper')
                            ->get()->result();
    }
}