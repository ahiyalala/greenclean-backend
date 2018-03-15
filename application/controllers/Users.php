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
            'contact_number' => $user['mobile'],
            'user_token'=> bin2hex(openssl_random_pseudo_bytes(64))
        );

        if($this->db->insert('customer',$data)){

            $this->output->set_status_header(200)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($user));
        }
        else{
            $q = array('message'=>'Sign up unsuccessful');
            $this->output->set_status_header(400)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($user));
        }
    }

    public function api_login(){
        $user = json_decode(file_get_contents('php://input'),true);

        $query = $this->db->from('customer')
                    ->where('email_address',$user['email'])
                ->count_all_results();

        if($query){
            $pwquery = $this->db->from('customer')
                                ->select('password')
                                ->where('email_address',$user['email'])
                                ->get();

            foreach($pwquery->result() as $row){
                if($row->password == $user['password']){
                    $this->output->set_status_header(200);
                }
                else{
                    $this->output->set_status_header(400)
                                    ->set_output("Password is invalid");
                }
            }
        }
        else{
            $this->output->set_status_header(400)
                            ->set_output("User does not exist");
        }

    }
}