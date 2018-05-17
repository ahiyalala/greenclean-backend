<?php

class Places extends CI_Controller{
    public function api_get(){
        $auth = $this->input->get_request_header('Authentication');
        $auth_arr = explode(" ",$auth);
        $whereIs = array('email_address'=>$auth_arr[0],'user_token'=>$auth_arr[1]);

        $query = $this->db->from('customer')
                        ->where($whereIs);

        if($query->count_all_results() > 0){
            $query = $this->db->select('location.*')
                                ->from('location')
                                ->join('customer','location.customer_id = customer.customer_id','inner')
                                ->where($whereIs)
                                ->get();


            $this->output->set_status_header(200)
                         ->set_content_type('application/json', 'utf-8')
                         ->set_output(json_encode($query->result()));
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
        $auth = $this->input->get_request_header('Authentication');
        $auth_arr = explode(" ",$auth);
        $whereIs = array('email_address'=>$auth_arr[0],'user_token'=>$auth_arr[1]);

        $data = json_decode(file_get_contents('php://input'),true);

        $query = $this->db->from('customer')
                            ->where($whereIs);

        if($query->count_all_results() > 0){
            if($this->db->insert('location',$data)){
                $result = array_push($data,array("location_id"=>$this->db->insert_id()));
                $this->output->set_status_header(200)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($result));
            }
            else{
                $result = $this->db->error();
                $this->output->set_status_header(500)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($result));
            }


            
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

}