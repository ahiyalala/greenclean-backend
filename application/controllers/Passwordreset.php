<?php

class Passwordreset extends CI_Controller {
  function index(){
    $this->load->helper('form');
    $this->load->view('password-reset');
  }

  function change(){
    $token = $this->input->get('token');
    $email = $this->input->get('email');
    $search_token = "SELECT * FROM customer WHERE reset_token = ? AND email_address = ?";
    $query = $this->db->query($search_token, array($token, $email));
    $count = $query->num_rows();

    if($count == 1){
      $this->load->helper('form');
      $data['token'] = $token;
      $data['email'] = $email;
      $this->load->view('password-reset-form', $data);
    }
    else{
      $this->output->set_status_header('404');
      $data['title'] = "Invalid link";
      $data['subtext'] = "This resource does not exist";
      $this->load->view('password-reset-response', $data);
    }
  }

  function reset(){
    $password = $this->input->post('password');
    $retype = $this->input->post('confirm_password');
    $token = $this->input->get('token');
    $email = $this->input->get('email');
    $search_token = "SELECT * FROM customer WHERE reset_token = ? AND email_address = ?";
    $query = $this->db->query($search_token, array($token, $email));
    $count = $query->num_rows();
    if($count != 1){
      $this->output->set_status_header('404');
      $data['title'] = "Invalid link";
      $data['subtext'] = "This resource does not exist";
      $this->load->view('password-reset-response', $data);
      return;
    }

    if($password != $retype){
      $this->output->set_status_header(403);
      $data['title'] = "Something went wrong";
      $data['subtext'] = 'Try clicking <a href='.base_url('/passwordreset/change?email='.$email.'&token='.$token).'>here</a> to reset your password again';
      $this->load->view('password-reset-response', $data);
      return;
    }
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $this->db->trans_start();
    $update = array(
      "reset_token"=>NULL,
      "password"=>$hashed_password
    );
    $this->db->update('customer', $update, array("email_address" => $email, "reset_token"=>$token));
    $this->db->trans_complete();
    if(!$this->db->trans_status()){
    $data['title'] = "Something went wrong";
    $data['subtext'] = 'Try clicking <a href='.base_url('/passwordreset/change?email='.$email.'&token='.$token).'>here</a> to reset your password again';
    $this->output->set_status_header(403);
    $this->load->view('password-reset-response', $data);
    return;
    }
    else{
      $this->output->set_status_header(200);
      $data['title'] = "Reset successful";
      $data['subtext'] = 'You may now close this window';
      $this->load->view('password-reset-response', $data);
      return;
    }
  }

  function submit(){
    $email = $this->input->post('email_address');
    $query = "SELECT * FROM customer WHERE email_address = ?";
    $result = $this->db->query($query, array($email));
    $count = $result->num_rows();
    $data['title'] = "Password reset submitted";
    $data['subtext'] = "You will receive an email with a reset link";
    if($count == 1){
      $this->load->library('email');
      $user = $result->row();
      $token_id = $user->reset_token;
      if(!$token_id){
        $this->db->trans_start();
        $token_query = $this->db->select('UUID() as id')->get()->row();
        $token_id = $token_query->id;
        $update = array(
          "reset_token" => $token_id
        );
        $this->db->update('customer',$update, array("email_address" => $email));
        $this->db->trans_complete();
        if(!$this->db->trans_status()){
          $this->load->view('password-reset-response');
          return;
        }
      }
        $message = '<p>Hello '.$user->first_name.'!</p>'
                  .'<p>A link is provided below to update your password.'
                  .'</br>If you didn\'t request for password change, ignore this message.</p>'
                  .'<br /><br />'
                  .'<a href='.base_url('/passwordreset/change?token='.$token_id.'&email='.$email).'>Click here!</a>';
        $markup = '<html><head><title>Need to change your password?</title></head><body>'.$message.'</body></html>';
        $this->email->to($email);
        $this->email->from('noreply@localhost.com','Greenklean Service');
        $this->email->subject("Need to change your password?");
        $this->email->message($message);
        $this->email->send();
        $debug = $this->email->print_debugger();
        log_message('ERROR', $debug);
    }
    $this->load->view('password-reset-response',$data);
  }
}
