<?php 

class Users extends CI_Controller{
    public function api_get(){
        
        $this->output->set_content_type('application/json')
                    ->set_output(json_encode(array('foo'=>'bar')));
    }

    public function api_set(){
        $user = json_decode(file_get_contents('php://input'),true);
        
        $data = array(
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'birth_date' => $user['birth_date'],
            'email_address' => $user['email_address'],
            'password' => $user['password'],
            'contact_number' => $user['contact_number'],
            'user_token'=> bin2hex(openssl_random_pseudo_bytes(64))
        );

        if($this->db->insert('customer',$data)){
            
            $this->output->set_status_header(200)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($result));
        }
        else{
            $q = $this->db->error();
            $this->output->set_status_header(400)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($q));
        }
    }

    public function api_login(){
        $user = json_decode(file_get_contents('php://input'),true);

        $query = $this->db->from('customer')
                    ->where('email_address',$user['email_address'])
                ->count_all_results();

        if($query){
            $pwquery = $this->db->from('customer')
                                ->where('email_address',$user['email_address'])
                                ->get();


            $result = $pwquery->row();

            if(password_verify($user['password'],$result->password)){
                $this->output->set_status_header(200)
                                ->set_output(json_encode($result));
            }
            else{
                $this->output->set_status_header(400)
                                ->set_output("Password is invalid");
            }
        }
        else{
            $this->output->set_status_header(400)
                            ->set_output("User does not exist");
        }

    }
}