<?php 

class Payments extends CI_Controller{
    public function api_get(){

        $this->output->set_status_header(200);
    }

    public function register_card_to_customer(){
        /*
        {
            "state": "AVAILABLE",
            "paymentTokenId": "4rbRMZNNXklgNImHlw8P9tqgl7HWdyF91j0UahDHyhXJyICPHyATnd8yZ9Y5xV0g6wNxN6dthTownhFqOf5a0QJbpCpC7rgNHfbEF8Esb2TWoWMMDWfvYJgGduA9zQCs09rokkeytXgiBnWMOfB2rEJyDtwilO8xHBmz3k",
            "createdAt": "2016-11-08T02:18:56.000Z",
            "updatedAt": "2016-11-08T02:18:56.000Z"
        }
        */
        $paymentToken = json_decode(file_get_contents('php://input'),true);

        $auth = $this->input->get_request_header('Authentication');
        $auth_arr = explode(" ",$auth);
        

        if(count($auth_arr)!=2){ //false if invalid authentication header
            return $this->output->set_status_header(400)
                            ->set_content_type('application/json', 'utf-8')
                            ->set_output(json_encode($message));
        }
        
        $whereIs = array('email_address'=>$auth_arr[0],'user_token'=>$auth_arr[1]);
        $message = array("message"=>"Bad request");
        
        $query = $this->db->from('customer')
                    ->where($whereIs);

        if($query->count_all_results() != 1){ //false if user doesn't exist
            return $this->output->set_status_header(403)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($message));
        }

        //retrieve user information

        $user_result = $this->db->select('*')
                            ->from('customer')
                            ->where($whereIs)
                            ->get()
                            ->row();

        $card_by_customer_query = $this->db->select('*')
                                            ->from('paymaya_card_vaults')
                                            ->where(array(
                                                'paymaya_customer_id' => $user_result->paymaya_customer_id
                                            ))
                                            ->count_all_results();

        //initialize paymaya data
        $paymaya_data = array(
            'paymentTokenId' => $paymentToken['paymentTokenId'],
            'isDefault'=>($card_by_customer_query)?true:false
        );
    
        $curl = curl_init(PAYMAYA_URL.'/customers/'.$user_result->paymaya_customer_id.'/cards');
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,json_encode($paymaya_data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array(
            'Content-Type: application/json',
            'Authorization: Basic '.base64_encode(PAYMAYA_SECRET.':') 
        ));

        $result = curl_exec($curl);
        $httpResponse = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        $arr = json_decode($result,true);
        curl_close($curl);

        if($httpResponse != 200){
            return $this->output->set_status_header(500)
                                ->set_output($result);
        }

        $this->db->trans_start();
        $uuid = $this->db->select('UUID() as id')
                            ->get()
                            ->row();
        $this->db->insert('paymaya_card_vaults', array(
            'payment_id'=>$uuid->id,
            'pcv_id'=>$arr['cardTokenId'],
            'paymaya_customer_id'=>$user_result->paymaya_customer_id,
            'masked_number'=>$arr['maskedPan'],
            'verification_url'=>$arr['verificationUrl']
        ));
        $recent_data = $this->db->select('payment_id,masked_number')
                                ->from('paymaya_card_vaults')
                                ->where(array(
                                    'payment_id'=>$uuid->id
                                ))
                                ->get();
        $this->db->trans_complete();
        if ($this->db->trans_status()){
            return $this->output->set_status_header(200)
                        ->set_content_type('application/json', 'utf-8')
                        ->set_output(json_encode($recent_data->row()));
        }
        else{
            $curl = curl_init(PAYMAYA_URL.'/customers/'.$user_result->paymaya_customer_id.'/cards/'.$arr['cardTokenId']);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST,"DELETE");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_HTTPHEADER,array(
                'Content-Type: application/json',
                'Authorization: Basic '.base64_encode(PAYMAYA_SECRET.':') 
            ));

            $result = curl_exec($curl);
            $httpResponse = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            return $this->output->set_status_header($httpResponse)
                                ->set_output($result);
        }
    }
}