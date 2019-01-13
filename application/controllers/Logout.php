<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
	/**
	* 
	*/
	class Logout extends CI_controller
	{
		
		function __construct(){
		parent :: __construct();
		}

		function index(){
			// logout
			$this->session->sess_destroy();
			redirect('Page');
		}
	}
 ?>