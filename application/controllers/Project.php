<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Controller
*/
class Project extends CI_controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model('Project_model','pro');
	}
}
 ?>