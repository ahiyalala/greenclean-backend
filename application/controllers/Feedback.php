<?php

class Feedback extends CI_Controller{
  public function add(){
    $post_data = json_decode(file_get_contents('php://input'),true);
    $auth = $this->input->get_request_header('Authentication');
    $auth_arr = explode(" ",$auth);

    if(count($auth_arr)!=2){
        return $this->output->set_status_header(401);
    }

    $whereIs = array('email_address'=>$auth_arr[0],'user_token'=>$auth_arr[1]);
    $whereIs['customer_id'] = $post_data['customer_id'];

    $query = $this->db->select('*')->from('customer')
                ->where($whereIs)->count_all_results();

    if(!$query){
        return $this->output->set_status_header(401);
    }

    //transaction for rating
    $this->db->trans_begin();
    $transaction = $this->db->select('transaction_id')->from('service_cleaning')->where(array('service_cleaning_id'=>$post_data['service_cleaning_id']))->row();
    $this->db->where(array('transaction_id'=>$transaction->transaction_id,'is_finished'=>1));
    $this->db->update('payment_transaction', array(
                          'rating'=>$post_data['rating'],
                          'comment'=>$post_data['comment']
                        ));
    $affected_transaction = $this->db->affected_rows();
    $housekeeper_rating =$this->db->select('AVG(rating) as average_rating')->from('payment_transaction')->where(array('housekeeper_id'=>$post_data['housekeeper_id']));
    $this->db->where(array('housekeeper_id'=>$post_data['housekeeper_id']));
    $this->db->update('housekeeper',array('rating'=>$housekeeper_rating->average_rating));
    $affected_housekeeper = $this->db->affected_rows();
    if($this->db->trans_status() && $affected_housekeeper && $affected_housekeeper){
      $this->db->trans_commit();
      return $this->output->set_status_header(200);
    }
    else{
      $this->db->trans_rollback();
      return $this->output->set_status_header(500);
    }
  }
}
