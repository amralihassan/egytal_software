<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Controller
*/
class Purchases extends CI_controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model('Purchases_model','pur');
	}
}
 ?>