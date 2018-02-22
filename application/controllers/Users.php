<?php 

class Users extends CI_Controller{
    public function api_get(){
        
        $this->output->set_content_type('application/json')
                    ->set_output(json_encode(array('foo'=>'bar')));
    }

    public function api_set(){
        $user = json_decode(file_get_contents('php://input'),true);

        $data = array(
            'first_name' => $user['firstname'],
            'last_name' => $user['lastname'],
            'birth_date' => $user['birthdate'],
            'email_address' => $user['email'],
            'password' => $user['password'],
            'contact_number' => $user['mobile']
        );

        if($this->db->insert('customer',$data)){

            $this->output->set_status_header(200)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_decode($user),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
        else{
            $q = array('message'=>'Sign up unsuccessful');
            $this->output->set_status_header(400)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_decode($user),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }
}