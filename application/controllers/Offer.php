<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Controller
*/
class Offer extends CI_controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model('Offer_model','offer');
	}
}
 ?>