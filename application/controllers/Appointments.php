<?php 

class Appointments extends CI_Controller{

    public function api_get(){
        $booking_info = array(
            "booking_id" => 439,
            "housekeeper" => array(
                "housekeeper_id" => 000,
                "first_name" => "Juan",
                "last_name" => "dela Cruz",

            ),
            "date" => "04/13/2018 2:00PM",
            "service_type" => "Cleaning Service A",
            "place" => array(
                "place_id" => 000,
                "street_address" => "B1 L1 Imaginary St.",
                "barangay" => "Brgy. Example",
                "city" => "Quezon City"
            ),
            "payment" => array(
                "type" => "cash"
            ),
            "amount_due" => "900"
        );

        $this->output->set_status_header(201)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($booking_info));
    }
}