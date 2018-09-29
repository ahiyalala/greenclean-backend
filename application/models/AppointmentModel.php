<?php
class AppointmentModel extends CI_Model{
    public function close_appointment($drop_code, $sender){
      $this->load->helper('sms_helper');
      $select_housekeeper_by_number = "SELECT * FROM housekeeper WHERE contact_number = ?";
      $verify_appointment_code      = "SELECT p.transaction_id FROM housekeeper_schedule AS h INNER JOIN payment_transaction AS p ON p.booking_request_id = h.booking_request_id INNER JOIN service_cleaning AS s ON s.transaction_id = p.transaction_id WHERE s.drop_code = ? AND (h.date < CURDATE() OR (h.date = CURDATE() AND h.end_time <= DATE_FORMAT(CONVERT_TZ(NOW(),'+00:00','+08:00'),'%H:%i'))) AND h.housekeeper_id = ? AND p.is_finished = 0";
      $update_service_cleaning      = "UPDATE service_cleaning SET drop_code = NULL, dropped_by = ? WHERE transaction_id = ?";
      $update_payment_transaction   = "UPDATE payment_transaction SET is_finished = ? WHERE transaction_id = ?";
      $select_housekeepers_in_appointment = "SELECT contact_number, globe_access_token FROM housekeeper WHERE housekeeper_id IN (SELECT housekeeper_id FROM service_cleaning WHERE transaction_id = ?)";
      $this->db->trans_begin();
      $housekeeper_trigger = $this->db->query($select_housekeeper_by_number, array($sender))->row();
      if(!$housekeeper_trigger){
        $this->db->trans_rollback();
        log_message('error','No housekeeper with number '.$sender);
        return false;
      }
      //Check if appointment with code X exists for housekeeper with number X
      $service_cleaning = $this->db->query($verify_appointment_code, array($drop_code, $housekeeper_trigger->housekeeper_id))->row();
      if(!$service_cleaning){
        $this->db->trans_rollback();
        send_general_message($housekeeper_trigger->contact_number, $housekeeper_trigger->globe_access_token, "Invalid drop code:\nThere is no appointment assigned to you with a code ".$drop_code);
        log_message('error', 'Invalid drop code for '.$housekeeper_trigger->first_name.' '.$housekeeper_trigger->last_name);
        return false;
      }
      $transaction_id = $service_cleaning->transaction_id;

      //Update transaction
      $this->db->query($update_service_cleaning, array($housekeeper_trigger->housekeeper_id, $transaction_id));
      $this->db->query($update_payment_transaction, array(1,$transaction_id));
      $housekeepers = $this->db->query($select_housekeepers_in_appointment, array($transaction_id))->result();
      if($this->db->trans_status()){
        $this->db->trans_commit();
        $message = $housekeeper_trigger->first_name.' '.$housekeeper_trigger->last_name.' ('.$housekeeper_trigger->contact_number.') has marked an appointment ('.$drop_code.') as FINISHED.';
        foreach($housekeepers as $housekeeper){
          send_general_message($housekeeper->contact_number, $housekeeper->globe_access_token, $message);
        }
        log_message('info','Appointment ['.$transaction_id.'] has been marked FINISHED by '.$housekeeper_trigger->first_name.' '.$housekeeper_trigger->last_name);
        return true;
      }
      else{
        $this->db->trans_rollback();
        log_message('error','Error in closing appointment '.$transaction_id);
        return false;
      }
    }
}
