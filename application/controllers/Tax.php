<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Controller
*/
class Tax extends CI_controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model('Tax_model','tax');
	}
	function load_tax()
	{
        $data['pagetitle'] = 'ضريبة القيمة المضافة';
        $data['page']=$this->load->view('pages/tax/tax_view',NULL,TRUE);
        echo json_encode($data);		
	}
    function printInv()
    {
        $fromDate = $this->uri->segment(3);
        $toDate = $this->uri->segment(4);
        $data['fromDate'] = $fromDate;
        $data['toDate'] = $toDate;
        $this->load->view('tax/printTaxReprot',$data);   
    }
	function pagination()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->tax->count_all();
		$config['per_page'] = 500;
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
			'tax_pagination_link' => $this->pagination->create_links(),
			'tax_table'	  => $this->tax->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}
    function pagination_search()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->tax->count_all_search();
        $config['per_page'] = 500;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&gt';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lt';
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
                'tax_pagination_link' => $this->pagination->create_links(),
                'tax_table'	  => $this->tax->fetch_details_search($config['per_page'],$start)
        );
        echo json_encode($output);
    }
    function pagination_search_print()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->tax->count_all_print();
        $config['per_page'] = 500;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&gt';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lt';
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
                'tax_print_pagination_link' => $this->pagination->create_links(),
                'tax_print_table'	  => $this->tax->fetch_details_print($config['per_page'],$start)
        );
        echo json_encode($output);
    }	    	
	function add_tax()
	{
		$result = $this->tax->add_tax();

		$msg['success'] = false;
		if ($result) {
			$msg['success']= true;
		}
		echo json_encode($msg);				
	}
	function Delete_more_one_tax()
	{
		foreach ($_POST['taxID'] as $id) {
			$result = $this->tax->Delete_more_one_tax($id);
		}
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);			
	}	
    function getdatabyid()
    {
            $result = $this->tax->getdatabyid();
            echo json_encode($result);
    }    
    function update_tax()
    {
        $result = $this->tax->update_tax();
        $msg['success'] = false;
        if ($result) {
            $msg['success']= true;
        }
        echo json_encode($msg);         
    }   	
}
 ?>