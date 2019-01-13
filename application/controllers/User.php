<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Controller
*/
class User extends CI_controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model('User_model','us');
	}
    function pagination()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->us->count_all();
        $config['per_page'] = 15;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = 'الاول';
        $config['next_link'] = '&gt';
        $config['next_link'] = 'التالي';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'السابق';
        $config['last_link'] = 'الأخير';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['num_links'] = 1;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start =($page - 1) * $config['per_page'];
        $output = array(
                'user_pagination_link' => $this->pagination->create_links(),
                'user_table'	  => $this->us->fetch_details($config['per_page'],$start)
        );
        echo json_encode($output);
    }	
    function add_user()
    {
        $this->form_validation->set_rules("fullName", "اسم الموظف", 'required');
        $this->form_validation->set_rules("username", "اسم المستخدم", 'required');
        $this->form_validation->set_rules("password", "كلمة المرور", 'required');
        $this->form_validation->set_rules("passwordC", "تأكيد كلمة السر", 'required|matches[password]');
        $this->form_validation->set_rules("status", "حالة الحساب", 'required'); 
        if ($this->form_validation->run() == true) 
        {
            $result = $this->us->add_user();

            $msg['success'] = false;
            if ($result) {
                    $msg['success']= true;
            }
            echo json_encode($msg); 
        } 
        else
        {
            $msg['success'] = false;
            echo json_encode($msg);
        }              
    }
    function getdatabyid()
    {
            $result = $this->us->getdatabyid();
            echo json_encode($result);
    }	
    function update_user()
    {
        $this->form_validation->set_rules("fullName_update", "اسم الموظف", 'required');
        $this->form_validation->set_rules("username_update", "اسم المستخدم", 'required');
        $this->form_validation->set_rules("status_update", "حالة الحساب", 'required'); 
        if ($this->form_validation->run() == true) 
        {
            $result = $this->us->update_user();
            $msg['success'] = false;
            if ($result) {
                    $msg['success']= true;
            }
            echo json_encode($msg); 
        } 
        else
        {
            $msg['success'] = false;
            echo json_encode($msg);
        }        	
    }
    function update_password()
    {
        $this->form_validation->set_rules("password_update", "كلمة المرور", 'required');
        $this->form_validation->set_rules("passwordC_update", "تأكيد كلمة السر", 'required|matches[password_update]');
        if ($this->form_validation->run() == true) 
        {
            $result = $this->us->update_password();

            $msg['success'] = false;
            if ($result) {
                    $msg['success']= true;
            }
            echo json_encode($msg); 
        } 
        else
        {
            $msg['success'] = false;
            echo json_encode($msg);
        }             
    }    
    function delete_more_one_row()
    {
        foreach ($_POST['user_id'] as $id) {
                $result = $this->us->delete_more_one_row($id);
        }
        $msg['success']=false;
        if ($result) {
                $msg['success']=true;
        }
        echo json_encode($msg);		
    }   	
}
 ?>