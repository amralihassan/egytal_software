<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Login controller
*/

class Login extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
		// load login model
		$this->load->model('Login_model');
	}

	function index()
	{
		// check session
		if ($this->session->userdata('logged_in')==True) {
			$this->load->view('index');
		}
		else
		{
			// check submit post
			if ($this->input->post('submit')) {
				// form validation
				$this->form_validation->set_rules("username", "اسم المستخدم", 'required');
				$this->form_validation->set_rules("password", "كلمة المرور", 'required');
				if ($this->form_validation->run() != true) 
				{
					redirect('Page/empty'); 
				}

				// recieve input post
				//---------------------
				if ($this->input->post('username') == '' || $this->input->post('password') == '' ) {
					redirect('Page'); 
				}				
				$username = $this->input->post('username');
				// don't forget to use md5 for encrypt
				$password = $this->input->post('password');

				//log in administrator users
				if ($this->Login_model->check_user($username,$password)) 
				{
					$myData['records']=$this->Login_model->check_user($username,$password);
					// create session
					foreach ($myData['records'] as $row) {

						$userData = array(
						'user_id'=> $row->user_id,
						'fullName'=>  $row->fullName,
						'username'=> $row->username,
						'status'=> $row->status,
						'logged_in'=>TRUE
						
						);
					}

					$this->session->set_userdata($userData);
					
					// if account is diabled
					if ($this->session->userdata('status')=='ايقاف'){
							$this->session->sess_destroy();
							
							redirect('Page/disable');
						}
					$this->load->view('index');
				}
				else{
					// in case falied login
					redirect('Page/fail'); 
				}
						
			}
			else
			{
				redirect('Page'); 
			}			
		}		
	}
}
 ?>