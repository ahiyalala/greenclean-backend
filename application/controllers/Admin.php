<?php
class Admin extends CI_Controller {

      public function __construct()
      {
              parent::__construct();
              // Your own constructor code
              $this->load->helper('admin_verify_helper');
      }

    private function _get_super_count(){
          return $this->db->select('*')->from('admin')
                    ->where(array('is_super'=>1))->count_all_results();
    }

    public function index(){
      $this->load->helper('form');
        $count = $this->_get_super_count();
      if($count == 0){
        $this->load->view('admin-1-register');
      }
      else{
        $has_data = $this->session->has_userdata('user');
        if($has_data){
          redirect('/admin/dashboard','location');
        }
        $this->load->view('admin-0-login');
      }
    }

    public function login(){
      $data = $this->input->post(NULL,TRUE);
      $user = $this->db->select('*')
                        ->from('admin')
                        ->where(array('email_address'=>$data['email_address']))
                        ->get()
                        ->row_array();
      $verified = ($user)? password_verify($data['password'],$user['password']): false;
      if($verified){
        $user['password'] = null;
        $this->session->set_userdata('user', $user);
      }

      redirect('/admin','location');

    }

    public function dashboard(){

      admin_verify();


      redirect('/admin/management','location');
      $services = $this->db->select('*')->from('services')->get()->result();
      $user = $this->session->user;
      $data = array(
        'services'=>$services,
        'admin'=>$user
      );
      if($user['is_super']){
        $this->load->view('admin-2-dashboard',$data);
      }
      else{
        $this->load->view('admin-3-service',$data);
      }
    }

    public function register_admin(){
      $data = $this->input->post(NULL,TRUE);
      $count = $this->_get_super_count();
      $this->db->trans_begin();
      $data['password'] = password_hash($data['password'],PASSWORD_BCRYPT);
      if($count == 0){
        $data['is_super'] = 1;
        $this->db->insert('admin',$data);
      }
      else{
        $this->db->insert('admin',$data);
      }

      if(!$this->db->trans_status() && !admin_verify(true)){
        $this->db->trans_rollback();

        log_message('debug',$this->db->trans_status().' '.admin_verify(true));
        $this->session->set_flashdata('message','Invalid registration');
      }
      else{
        $this->db->trans_commit();
      }
      redirect('/admin','location');
    }

    public function management(){
      admin_verify();

        $this->load->helper('form');
        $services = $this->db->select('*')->from('services')->where(array('deleted'=>0))->get()->result();
        $data = array(
            'services'=>$services,
            'admin' => $this->session->user
        );
        $this->load->view('admin-3-service',$data);
    }

    public function delete_employee($id){
      admin_verify();

      $query = "UPDATE housekeeper
                SET relieved = 1
                WHERE housekeeper_id = ?";

      $this->db->trans_start();
      $this->db->query($query, array($id));
      if(!$this->db->trans_status()){
        log_message('error','Employee deletion failed');
        $this->db->trans_rollback();
      }
      else{
        $this->db->trans_commit();
      }


    }

    public function update_employee($id){
      admin_verify();
      $contact_number = $this->input->post('contact_number');
      $email = $this->input->post('email');
      $schedules = $this->input->post('work_schedule');
      $query = "UPDATE housekeeper
                SET contact_number = ?,
                    email_address =?,
                    schedule_dates = ?
                WHERE housekeeper_id = ?";

      $this->db->trans_start();
      if($schedules){
      foreach($schedules as $schedule){
          $date = new DateTime('today');
          for($x = 0; $x < 12; $x++){
              $date->modify('next '.$schedule);

              $this->db->insert('housekeeper_schedule',array(
                  'housekeeper_id'=>$id,
                  'date'=>$date->format('Y-m-d'),
                  'availability'=>0
              ));
          }
      }
      }
      $this->db->query($query, array($contact_number, $email, json_encode($schedules), $id));
      if(!$this->db->trans_status()){
        log_message('error','Employee deletion failed');
        $this->db->trans_rollback();
      }
      else{
        $this->db->trans_commit();
      }
      redirect('/admin/employee'.$id,'location');
    }

    public function employee($id=null){
        admin_verify();

        $this->load->helper('form');
        $this->load->model('housekeeper');
        $user = $this->session->user;
        $data = array(
            'admin' => $user
        );
        if($id){
            $query = "select h.first_name as h_first_name, h.last_name as h_last_name, c.first_name as c_first_name, c.last_name as c_last_name, hs.date, hs.start_time, hs.end_time
                      from housekeeper_schedule as hs
                      left join housekeeper as h on h.housekeeper_id=hs.housekeeper_id
                      left join booking_request as b on b.booking_request_id=hs.booking_request_id
                      left join customer as c on c.customer_id=b.customer_id
                      left join payment_transaction as t on t.booking_request_id = b.booking_request_id
                    where h.housekeeper_id = ".$this->db->escape_like_str($id)." and t.is_finished = 0";
            $data['housekeepers'] = $this->housekeeper->get_specific($id);
            $data['appointments'] = $this->db->query($query)->result();
            $view = 'admin-5-employee-profile';
        }
        else{
            $query = 'select h.first_name as h_first_name, h.last_name as h_last_name, c.first_name as c_first_name, c.last_name as c_last_name, hs.date, hs.start_time, hs.end_time
                      from housekeeper_schedule as hs
                      left join housekeeper as h on h.housekeeper_id=hs.housekeeper_id
                      left join booking_request as b on b.booking_request_id=hs.booking_request_id
                      left join customer as c on c.customer_id=b.customer_id
                      left join payment_transaction as p on p.booking_request_id = b.booking_request_id
                      where p.is_finished = 0';
            $data['housekeeper_schedules'] = $this->db->query($query)->result();
            $data['housekeepers'] = $this->housekeeper->get_all();
            $view = 'admin-4-employee';
        }
        $this->load->view($view,$data);
    }


	public function appointments(){
    admin_verify();
        $this->load->helper('form');
        $this->load->model('housekeeper');


        $query = 'select t.is_finished, b.service_type_key, h.first_name as h_first_name, h.last_name as h_last_name, c.first_name as c_first_name, c.last_name as c_last_name, hs.date, hs.start_time, hs.end_time
        from housekeeper_schedule as hs
        left join housekeeper as h on h.housekeeper_id=hs.housekeeper_id
        left join booking_request as b on b.booking_request_id=hs.booking_request_id
        left join customer as c on c.customer_id=b.customer_id
        left join payment_transaction as t on t.booking_request_id = b.booking_request_id
        where hs.availability <> 0
        order by t.is_finished asc, hs.date desc, hs.start_time, hs.end_time';
        $data['schedules'] = $this->db->query($query)->result();
        $data['admin'] = $this->session->user;
		$this->load->view('admin-6-client',$data);

	}

  public function logout(){
    admin_verify();

    $this->session->sess_destroy();
    redirect('/admin','location');
  }

  public function log($log_date = NULL)
  {
    admin_verify();
    $this->load->library('log_library');
        if ($log_date == NULL)
        {
          // default: today
          $log_date = date('Y-m-d');
        }
        $data['cols'] = $this->log_library->get_file('log-'. $log_date . '.php');
        $data['log_date'] = $log_date;
    $this->load->view('log_view', $data);
  }
}
