<?php
include 'Api_Controller.php';
class Payments extends Api_Controller{
    public function api_get(){
      if(!$this->isAuth)
        return $this->output->set_status_header(401);

        $customer = $this->db->select('*')->from('customer')
                                          ->where($this->whereIs)
                                          ->get()
                                          ->row();

        $curl = curl_init(PAYMAYA_URL.'/customers/'.$customer->paymaya_customer_id.'/cards/');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array(
            'Content-Type: application/json',
            'Authorization: Basic '.base64_encode(PAYMAYA_SECRET.':')
        ));

        $result = curl_exec($curl);
        $httpResponse = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        $paymentToken = json_decode($result,true);
        curl_close($curl);

        if($httpResponse != 200){
            log_message('error','httpResponse: '.$httpResponse);
            return $this->output->set_status_header($httpResponse);
        }

        $cards = json_decode($result,true);

        if(sizeof($cards) == 0){
          return $this->output->set_status_header(404);
        }

        foreach ($cards as $card) {
          $card_db = $this->db->select('*')
                              ->from('paymaya_card_vaults')
                              ->where(array('pcv_id'=>$card['cardTokenId']))
                              ->get()->row();

          if($card_db->status != $card['state']){
              $card_update = array('status'=>$card['state']);
              if($card['state'] != 'PREVERIFICATION'){
                $card_update['verification_url'] = "";
              }
              $this->db->trans_start();
              $this->db->where(array('pcv_id'=>$card['cardTokenId'],'paymaya_customer_id'=>$customer->paymaya_customer_id));
              $this->db->update('paymaya_card_vaults',$card_update);
              $this->db->trans_complete();

              if(!$this->db->trans_status()){
                return $this->output->set_status_header(500);
              }
          }
        }

        $cards_db = $this->db->select('payment_id,masked_number,verification_url,status')
                              ->from('paymaya_card_vaults')
                              ->where(array('paymaya_customer_id'=>$customer->paymaya_customer_id))
                              ->get()
                              ->result();

        return $this->output->set_status_header(200)
                            ->set_content_type('application/json','utf-8')
                            ->set_output(json_encode($cards_db));

    }

    public function api_set(){
      if(!$this->isAuth)
        return $this->output->set_status_header(401);

      $cardDetails = json_decode(file_get_contents('php://input'),true);

        $curl = curl_init(PAYMAYA_URL.'/payment-tokens/');
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,json_encode($cardDetails));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array(
            'Content-Type: application/json',
            'Authorization: Basic '.base64_encode(PAYMAYA_PUBLIC.':')
        ));

        $result = curl_exec($curl);
        $httpResponse = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        $paymentToken = json_decode($result,true);
        curl_close($curl);

        if($httpResponse != 200){
            log_message('error','httpResponse: '.$httpResponse);
            return $this->output->set_status_header(500);
        }
        /*
        {
            "state": "AVAILABLE",
            "paymentTokenId": "4rbRMZNNXklgNImHlw8P9tqgl7HWdyF91j0UahDHyhXJyICPHyATnd8yZ9Y5xV0g6wNxN6dthTownhFqOf5a0QJbpCpC7rgNHfbEF8Esb2TWoWMMDWfvYJgGduA9zQCs09rokkeytXgiBnWMOfB2rEJyDtwilO8xHBmz3k",
            "createdAt": "2016-11-08T02:18:56.000Z",
            "updatedAt": "2016-11-08T02:18:56.000Z"
        }
        */


        //retrieve user information
        $user_result = $this->db->select('*')
                            ->from('customer')
                            ->where($this->whereIs)
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
            'isDefault'=>($card_by_customer_query)?false:true
        );

        $curl = curl_init(PAYMAYA_URL.'/customers/'.$user_result->paymaya_customer_id.'/cards');
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,json_encode($paymaya_data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array(
            'Content-Type: application/json',
            'Authorization: Basic '.base64_encode(PAYMAYA_SECRET.':')
        ));

        $result = curl_exec($curl);
        $httpResponse = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        $arr = json_decode($result,true);
        curl_close($curl);

        if($httpResponse != 200){
            log_message('error',$result);
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
            'verification_url'=>$arr['verificationUrl'],
            'status'=>$arr['state']
        ));
        $recent_data = $this->db->select('payment_id,masked_number,verification_url,status')
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
            //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_HTTPHEADER,array(
                'Content-Type: application/json',
                'Authorization: Basic '.base64_encode(PAYMAYA_SECRET.':')
            ));
            $result = curl_exec($curl);
            $httpResponse = curl_getinfo($curl,CURLINFO_HTTP_CODE);
            curl_close($curl);
            log_message('error',$this->db->error());
            return $this->output->set_status_header(500);
        }
    }
}
