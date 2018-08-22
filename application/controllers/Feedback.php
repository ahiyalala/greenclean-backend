<?php
include 'Api_Controller.php';
class Feedback extends Api_Controller{
  public function add(){
    if(!$this->isAuth)
      return $this->output->set_status_header($this->header);

    $post_data = json_decode(file_get_contents('php://input'),true);

    //Post Data
    /*
      {
        service_cleaning_id:uuid,
        service:{
          service_type_key:string,
          service_description:string,
          service_price:int,
          service_duration:float,
          service_image:string,
          deleted:tinyint
        },
        location:{
          location_id:int,
          customer_id:int,
          location_type:string,
          location_street:string,
          location_barangay:string,
          location_city:string
        },
        housekeeper:{
          housekeeper_id:int,
          first_name:string,
          last_name:string,
          middle_name:string,
          birth_date:date,
          email_address:string,
          contact_number:string,
          gender:string,
          rating:float,
          schedule_dates:string (json),
          relieved:tinyint,
          globe_access_token:string
        },
        date:date,
        start_time:time,
        end_time:time,
        payment_type:string,
        is_paid:tinyint,
        is_finished:tinyint,
        rating:float,
        comment:string
      }
    */

    //transaction for rating
    $this->db->trans_begin();
    $housekeeper_ids = array();
    foreach($post_data['housekeeper'] as $housekeeper){
      array_push($housekeeper_ids, $housekeeper); //push id from list of housekeepers
    }
    $service_cleaning_query_string = "UPDATE service_cleaning as s
                                      SET b.rating = ?, b.comment = ?
                                      INNER JOIN payment_transaction as t ON s.transaction_id = t.transaction_id
                                      INNER JOIN booking_request as b ON t.booking_request_id = b.booking_request_id
                                      WHERE s.service_cleaning_id = ?";
    $housekeeper_update_string = "UPDATE housekeeper
                                  SET rating = ((? + rating)/2)
                                  WHERE housekeeper_id IN ?";

    $this->db->query($housekeeper_query_string, array($post_date["rating"],$housekeeper_ids));
    $affected_housekeeper = $this->db->affected_rows()
    $this->db->query($service_cleaning_query, array($post_data["rating"],$post_data["comment"],$post_data['service_cleaning_id']));
    $affected_appointment = $this->db->affected_rows();
    if($this->db->trans_status() && $affected_housekeeper && $affected_appointment){
      $this->db->trans_commit();
      return $this->output->set_status_header(200);
    }
    else{
      $this->db->trans_rollback();
      return $this->output->set_status_header(500);
    }
  }
}
