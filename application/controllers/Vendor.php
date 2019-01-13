<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Controller
*/
class Vendor extends CI_controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model('Vendor_model','ven');
	}
	function pagination()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->ven->count_all();
		$config['per_page'] = 10;
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
			'vendors_pagination_link' => $this->pagination->create_links(),
			'vendors_table'	  => $this->ven->fetch_details($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function pagination_search()
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->ven->count_all_search();
		$config['per_page'] = 10;
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
			'vendors_pagination_link' => $this->pagination->create_links(),
			'vendors_table'	  => $this->ven->fetch_details_search($config['per_page'],$start)
		);
		echo json_encode($output);
	}
	function add_vendor()
	{
		$result = $this->ven->add_vendor();

		$msg['success'] = false;
		if ($result) {
			$msg['success']= true;
		}
		echo json_encode($msg);			
	}
	function getdatabyid()
	{
		$result = $this->ven->getdatabyid();
		echo json_encode($result);
	}	
	function update_vendor()
	{
		$result = $this->ven->update_vendor();
		$msg['success'] = false;
		if ($result) {
			$msg['success']= true;
		}
		echo json_encode($msg);			
	}
	function Delete_more_one_vendor()
	{
		foreach ($_POST['venID'] as $id) {
			$result = $this->ven->delete_more_one_vendor($id);
		}
		$msg['success']=false;
		if ($result) {
			$msg['success']=true;
		}
		echo json_encode($msg);		
	}
	function retrive_vendors()
	{
        $titles = $this->ven->retrive_vendors();
        // titles
        if (count($titles)>0) // fill select box
        {
            $pro_select_box = "";
            $pro_select_box .= '<option value="">اختار اسم المورد</option>' ;
            foreach ($titles as $row) {
                $pro_select_box .= '<option value="'. $row->venID .'">'.$row->ven_name.'</option>' ;
            }
            echo json_encode($pro_select_box);
        } 		
	}
    function retrive_vendors_by_venID()
    {
        $id = $this->input->get('venid');
        $titles = $this->ven->retrive_vendors();
        // titles
        if (count($titles)>0) // fill select box
        {
            $checked = "";
            $pro_select_box = "";
            $pro_select_box .= '<option value="">اختار اسم المورد</option>' ;
            foreach ($titles as $row) {
                if($row->venID == $id){$checked ="selected";}else{$checked="";}
                $pro_select_box .= '<option '. $checked .' value="'. $row->venID .'">'.$row->ven_name.'</option>' ;
            }
            echo json_encode($pro_select_box);
        }          
    }  		
}
 ?>