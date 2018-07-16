<?php
include 'Api_Controller.php';
class Employee extends CI_Controller{

  public function _validate_admin($bool=false){
    $has_data = $this->session->has_userdata('user');

    if(!$has_data && !$bool)
      redirect('/admin','location');

    return $has_data;
  }

    public function add(){
        $this->load->helper('url');
        $this->load->model('housekeeper');
        $housekeeper = $this->housekeeper->add();
        if($housekeeper){
            $schedules = $this->input->post('work_schedule');
            $this->db->trans_start();
            foreach($schedules as $schedule){
                $date = new DateTime('today');
                for($x = 0; $x < 12; $x++){
                    $date->modify('next '.$schedule);

                    $this->db->insert('housekeeper_schedule',array(
                        'housekeeper_id'=>$housekeeper,
                        'date'=>$date->format('Y-m-d'),
                        'availability'=>0
                    ));
                }
            }
            $this->db->trans_complete();
            if($this->db->trans_status()){
                $this->session->set_flashdata('message','Successfully added employee');
            }
            else{
                $this->session->set_flashdata('message','Something went wrong');
            }
        }
        else{
            $this->session->set_flashdata('message','Something went wrong');
        }

        redirect('admin/employee','location');
    }

    public function delete($id){
      $this->db->trans_begin(true);
      $this->db->set(array('relieved'=>1));
      $this->db->where(array('housekeeper_id'=>$id));
      $this->db->update('housekeeper');
      if($this->db->trans_status() || $this->_validate_admin(true)){
        $this->db->trans_commit();
      }
      else{
        $this->db->trans_rollback();
      }
      redirect('admin/employee','location');
    }
}
