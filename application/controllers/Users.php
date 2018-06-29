<?php

class Users extends CI_Controller{
    public function api_get(){
        $auth = $this->input->get_request_header('Authentication');
        $auth_arr = explode(" ",$auth);
        $whereIs = array('email_address'=>$auth_arr[0],'user_token'=>$auth_arr[1]);

        $query = $this->db->from('customer')
                            ->where($whereIs);

        if($query->count_all_results() > 0){
            $query = $this->db->select('customer_id,first_name,middle_name,last_name,birth_date,email_address,contact_number')
                                ->from('customer')
                                ->where($whereIs)
                                ->get();
                $this->output->set_status_header(200)
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($query->row()));
        }
        else{
            $result = array(
                "message" => "Bad request"
            );
            $this->output->set_status_header(400)
                         ->set_content_type('application/json', 'utf-8')
                         ->set_output(json_encode($result));
        }
    }

    public function api_set(){
        $user = json_decode(file_get_contents('php://input'),true);


        $paymaya_data = array(
            'firstName' => $user['first_name'],
            'middleName'=>(isset($user['middle_name']))? $user['middle_name']:'',
            'lastName' => $user['last_name'],
            'birthday' => $user['birth_date'],
            'contact' => array(
                'email'=>$user['email_address']
            )
        );

        $curl = curl_init(PAYMAYA_URL.'/customers/');
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,json_encode($paymaya_data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array(
            'Content-Type: application/json',
            'Authorization: Basic '.base64_encode(PAYMAYA_SECRET.':')
        ));

        $result = curl_exec($curl);
        $httpResponse = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        $arr = json_decode($result,true);
        curl_close($curl);

        if($httpResponse != 200){
            log_message('error','httpResponse: '.$httpResponse);
            return $this->output->set_status_header(500);
        }

        $data = array(
            'paymaya_customer_id'=>$arr['id'],
            'first_name' => $user['first_name'],
            'middle_name'=>(isset($user['middle_name']))? $user['middle_name']:'',
            'last_name' => $user['last_name'],
            'birth_date' => $user['birth_date'],
            'email_address' => $user['email_address'],
            'password' => $user['password'],
            'contact_number' => $user['contact_number'],
            'user_token'=> bin2hex(openssl_random_pseudo_bytes(64))
        );

        if($this->db->insert('customer',$data)){
            $this->output->set_status_header(200)
                            ->set_content_type('application/json', 'utf-8');
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
