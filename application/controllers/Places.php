<?php
include 'Api_Controller.php';
class Places extends Api_Controller{
    public function api_get(){
      if(!$this->isAuth)
        return $this->output->set_status_header($this->header)
                            ->set_content_type('application/json','utf-8')
                            ->set_output(json_encode(array(
                              "message"=>"Unauthorized"
                            )));

            $query = $this->db->select('location.*')
                                ->from('location')
                                ->join('customer','location.customer_id = customer.customer_id','inner')
                                ->where($this->whereIs)
                                ->get();


            $this->output->set_status_header(200)
                         ->set_content_type('application/json', 'utf-8')
                         ->set_output(json_encode($query->result()));

    }

    public function api_set(){
      if(!$this->isAuth)
        return $this->output->set_status_header($this->header)
                            ->set_content_type('application/json','utf-8')
                            ->set_output(json_encode(array(
                              "message"=>"Unauthorized"
                            )));

        $data = json_decode(file_get_contents('php://input'),true);

        if($this->db->insert('location',$data)){
            $data["location_id"] = $this->db->insert_id();
            $this->output->set_status_header(200)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($data));
        }
        else{
            $result = $this->db->error();
            $this->output->set_status_header(500)
                      ->set_content_type('application/json', 'utf-8')
                      ->set_output(json_encode($result));
        }
    }

    public function get_location_dictionary(){
      if(!$this->isAuth)
      return $this->output->set_status_header($this->header)
                          ->set_content_type('application/json','utf-8')
                          ->set_output(json_encode(array(
                            "message"=>"Unauthorized"
                          )));

      $cities = $this->db->query('SELECT * FROM cities')->result();

      return $this->output->set_status_header(200)
                          ->set_content_type('application/json', 'utf-8')
                          ->set_output(json_encode($cities));
    }

}
