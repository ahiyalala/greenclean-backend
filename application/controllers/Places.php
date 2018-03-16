<?php

class Places extends CI_Controller{
    public function api_get_specific(){
        
        $array = $this->uri->uri_to_assoc(1);

        $locations = array(
            "user_id" => $array["id"],
            "0" => array(
                "location_id" => 001,
                "name" => "Home",
                "street" => "B1 L1 Imaginary Street",
                "barangay" => "Brgy. Example",
                "city" => "Quezon City"
            ),
            "1" => array(
                "location_id" => 002,
                "name" => "Work",
                "street" => "20th flr 1650 Imaginary Tower Opal Rd",
                "barangay" => "Brgy. Test",
                "city" => "Ortigas City"
            )
        );

        $this->output->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($locations));
    }
}