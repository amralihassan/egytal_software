<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Controller
*/
class Accessories extends CI_controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model('Accessories_model','acce');
	}
}
 ?>