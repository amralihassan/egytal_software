<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Login_model model
*/
class Login_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function check_user($username,$password)
	{

		$encrypt_password = $this->db->select('*')->from('user')->where('username',$username)->limit(1)->get()->row('password');

		if (password_verify($password,$encrypt_password)) {
			// Administrator users
			$query = $this->db->get_where('user',array('username' =>$username));
			return $query->result();	
	    	if ($query->num_rows > 0) {
				return $query->result();	
			}				
		}
		else
		{
			return false;
		}
	}

}
 ?>