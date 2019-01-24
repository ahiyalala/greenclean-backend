<?php

class Api_Controller extends CI_Controller{
    public $auth;
    public $whereIs;
    public $header;
    public $isAuth;

    public function __construct(){
        parent::__construct();
        $this->header = 200;
        $this->isAuth = true;
        $this->auth = $this->input->get_request_header('Authentication');
        $auth_arr = explode(" ",$this->auth);

        if(count($auth_arr)!=2){ //false if invalid authentication header
            $this->header = 401;
            $this->isAuth = false;
            return null;
        }

        $this->whereIs = array('email_address'=>$auth_arr[0],'user_token'=>$auth_arr[1]);


        $query = $this->db->from('customer')
                    ->where($this->whereIs);

        if($query->count_all_results() != 1){ //false if user doesn't exist
          $this->header = 401;
          $this->isAuth = false;
          return null;
        }


    }

    public function api_options(){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
    }
}

?>
