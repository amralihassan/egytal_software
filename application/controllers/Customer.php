<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Controller
*/
class Customer extends CI_controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model('Customer_model','ctm');
	}
    function pagination()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->ctm->count_all();
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
                'customers_pagination_link' => $this->pagination->create_links(),
                'customers_table'	  => $this->ctm->fetch_details($config['per_page'],$start)
        );
        echo json_encode($output);
    }
    function pagination_search()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->ctm->count_all_search();
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
                'customers_pagination_link' => $this->pagination->create_links(),
                'customers_table'	  => $this->ctm->fetch_details_search($config['per_page'],$start)
        );
        echo json_encode($output);
    }
    function add_customer()
    {
        $this->form_validation->set_rules("ctm_name", "اسم العميل", 'required');
        $this->form_validation->set_rules("mobile", "رقم الموبايل", 'required');
        $this->form_validation->set_rules("address", "العنوان", 'required');
        if ($this->form_validation->run() == true) 
        {
            $result = $this->ctm->add_customer();

            $msg['success'] = false;
            if ($result) {
                    $msg['success']= true;
            }
            echo json_encode($msg); 
        } 
        else
        {
            $msg['success'] = false;
            echo json_encode($msg);
        }		
    }
    function getdatabyid()
    {
            $result = $this->ctm->getdatabyid();
            echo json_encode($result);
    }	
    function update_customer()
    {
        $this->form_validation->set_rules("ctm_name_update", "اسم العميل", 'required');
        $this->form_validation->set_rules("mobile_update", "رقم الموبايل", 'required');
        $this->form_validation->set_rules("address_update", "العنوان", 'required');
        if ($this->form_validation->run() == true) 
        {
            $result = $this->ctm->update_customer();

            $msg['success'] = false;
            if ($result) {
                    $msg['success']= true;
            }
            echo json_encode($msg); 
        } 
        else
        {
            $msg['success'] = false;
            echo json_encode($msg);
        }       
    }
    function Delete_more_one_customer()
    {
        foreach ($_POST['ctmID'] as $id) {
                $result = $this->ctm->delete_more_one_customer($id);
        }
        $msg['success']=false;
        if ($result) {
                $msg['success']=true;
        }
        echo json_encode($msg);		
    }
    function retrive_customer()
    {
        $titles = $this->ctm->retrive_customer();
        // titles
        if (count($titles)>0) // fill select box
        {
            $pro_select_box = "";
            $pro_select_box .= '<option value="">اختر اسم العميل</option>' ;
            foreach ($titles as $row) {
                $pro_select_box .= '<option value="'. $row->ctmID .'">'.$row->ctm_name.'</option>' ;
            }
            echo json_encode($pro_select_box);
        }          
    } 
    function retrive_customer_by_ctmID()
    {
        $id = $this->input->get('ctmid');

        $titles = $this->ctm->retrive_customer();
        // grades
        if (count($titles)>0) // fill select box
        {
            $checked = "";
            $pro_select_box = "";
            $pro_select_box .= '<option value="">اسم الحساب</option>' ;
            foreach ($titles as $row) {
                if($row->ctmID == $id){$checked ="selected";}else{$checked="";}
                $pro_select_box .= '<option '. $checked .' value ="'. $row->ctmID .'">'.$row->ctm_name.'</option>' ;
            }
            echo json_encode($pro_select_box);
        }
    }    	
}
 ?>