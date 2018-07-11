<?php
class Admin extends CI_Controller {

    private function get_super_count(){
          return $this->db->select('*')->from('admin')
                    ->where(array('is_super'=>1))->count_all_results();
    }

    public function index(){
      $this->load->helper('form');
        $count = $this->get_super_count();
      if($count == 0){
        $this->load->view('admin-1-register');
      }
      else{
        $has_data = $this->session->has_userdata('user');
        if($has_data){
          redirect('/admin/dashboard','refresh');
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

      redirect('/admin','refresh');

    }

    public function dashboard(){
      $has_data = $this->session->has_userdata('user');
      if($has_data){
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
      else{
        redirect('/admin','refresh');
      }

    }

    public function register_admin(){
      $data = $this->input->post(NULL,TRUE);
      $count = $this->get_super_count();
      $this->db->trans_begin();
      $data['password'] = password_hash($data['password'],PASSWORD_BCRYPT);
      if($count == 0){
        $data['is_super'] = 1;
        $this->db->insert('admin',$data);
      }
      else{
        $this->db->insert('admin',$data);
      }

      if(!$this->db->trans_status()){
        $this->db->trans_rollback();
        $this->session->set_flashdata('message','Invalid registration');
      }
      else{
        $this->db->trans_commit();
      }
      redirect('/admin','refresh');
    }

    public function management(){
        $this->load->helper('form');
        $services = $this->db->select('*')->from('services')->get()->result();
        $data = array(
            'services'=>$services,
            'admin' => array(
                'first_name' => "Kuroneko",
                'middle_name' => "Kuro",
                'last_name' => "Kuroro",
                "is_super" => 0
            )
        );
        $this->load->view('admin-3-service',$data);
    }

    public function employee($id=null){
        $this->load->helper('form');
        $this->load->model('housekeeper');
        $data = array(
            'admin' => array(
                'first_name' => "Kuroneko",
                'middle_name' => "Kuro",
                'last_name' => "Kuroro",
                "is_super" => 0
            )
        );
        if($id){
            $data['housekeepers'] = $this->housekeeper->get_specific($id);
            $view = 'admin-5-employee-profile';
        }
        else{
            $query = 'select h.first_name as h_first_name, h.last_name as h_last_name, c.first_name as c_first_name, c.last_name as c_last_name, hs.date, hs.start_time, hs.end_time
                      from housekeeper_schedule as hs
                      left join housekeeper as h on h.housekeeper_id=hs.housekeeper_id
                      left join booking_request as b on b.schedule_id=hs.schedule_id
                      left join customer as c on c.customer_id=b.customer_id
                      where hs.availability <> 0';
            $data['housekeeper_schedules'] = $this->db->query($query)->result();
            $data['housekeepers'] = $this->housekeeper->get_all();
            $view = 'admin-4-employee';
        }
        $this->load->view($view,$data);
    }
	public function customer(){

		$this->load->view('admin-6-client');

	}
	public function appointment(){
        $this->load->helper('form');
        $this->load->model('housekeeper');
        $query = 'select h.first_name as h_first_name, h.last_name as h_last_name, c.first_name as c_first_name, c.last_name as c_last_name, hs.date, hs.start_time, hs.end_time
        from housekeeper_schedule as hs
        left join housekeeper as h on h.housekeeper_id=hs.housekeeper_id
        left join booking_request as b on b.schedule_id=hs.schedule_id
        left join customer as c on c.customer_id=b.customer_id
        where hs.availability <> 0';
        $data['housekeeper_schedules'] = $this->db->query($query)->result();
        $data['housekeepers'] = $this->housekeeper->get_all();

		$this->load->view('admin-8-appointment',$data);

	}

  public function logout(){
    $this->session->sess_destroy();
    redirect('/admin','refresh');
  }
}
