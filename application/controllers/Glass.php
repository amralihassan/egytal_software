<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Controller
*/
class Glass extends CI_controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model('Glass_model','gla');
	}
}
 ?>