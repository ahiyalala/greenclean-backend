<?php 

class Services extends CI_Controller{
    public function api_get(){

        $services = array(
            '0' => json_encode(array(
                "id" => 0,
                "name" => "Service Cleaning A",
                "description" => "Lorem ipsum dolor sit amet",
                "price" => "300"
            )),
            '1' => json_encode(array(
                "id" => 1,
                "name" => "Service Cleaning B",
                "description" => "You make me feel like",
                "price" => "500"
            )),
            '2' => json_encode(array(
                "id" => 2,
                "name" => "Service Cleaning C",
                "description" => "I've been locked out of heaven",
                "price" => "700"
            )),
        );

        $this->output->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($services));
    }
}