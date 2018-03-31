<?php 

class Payments extends CI_Controller{
    public function api_get(){
        
        $locations = array(
            "0" => array(
                "payment_id" => 001,
                "credit_card_number" => "1234567812345678",
            ),
            "1" => array(
                "payment_id" => 002,
                "credit_card_number" => "8765432187654321",
            )
        );

        $this->output->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($locations));
    }
}