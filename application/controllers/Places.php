<?php
include 'Api_Controller.php';
class Places extends Api_Controller{
    public function api_get(){
      if(!$this->isAuth)
        return $this->output->set_status_header($this->header);

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
        return $this->output->set_status_header($this->header);

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

}
