<?php

class Places extends CI_Controller{
    public function api_get(){
        $auth = $this->input->get_request_header('Authentication');
        $auth_arr = explode(" ",$auth);

        if(count($auth_arr)<2){
            $result = array(
                "message" => "Unauthorized access"
            );
            $this->output->set_status_header(400)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($result));
        }
        else{
            $query = $this->db->from('customer')
                            ->where(array('email_address'=>$auth_arr[0],'user_token'=>$auth_arr[1]));

            if($query->count_all_results() >0){
                $result = array(
                    "0" => array(
                        "location_id" => 001,
                        "name" => "Home",
                        "street_address" => "B1 L1 Imaginary Street",
                        "barangay" => "Brgy. Example",
                        "city_address" => "Quezon City"
                    ),
                    "1" => array(
                        "location_id" => 002,
                        "name" => "Work",
                        "street_address" => "20th flr 1650 Imaginary Tower Opal Rd",
                        "barangay" => "Brgy. Test",
                        "city_address" => "Ortigas City"
                    )
                );

                $this->output->set_status_header(200)
                                ->set_content_type('application/json', 'utf-8')
                                ->set_output(json_encode($result));
            }
            else{
                $result = array(
                    "message" => "Unknown user"
                );
                $this->output->set_status_header(400)
                                ->set_content_type('application/json', 'utf-8')
                                ->set_output(json_encode($result));
            }      
        }
    }
}