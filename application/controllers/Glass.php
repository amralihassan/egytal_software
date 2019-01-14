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
	function add_glass_project()
	{
        $this->load->library('form_validation');
        $this->form_validation->set_rules("ctm_id", "اسم العميل", 'required');
        $this->form_validation->set_rules("project_name", "اسم المشروع", 'required');
        if ($this->form_validation->run() == true)
        {
            $result = $this->gla->add_glass_project();
            $msg['success'] = false;
            if ($result) {
                $msg['success'] = true;
            }
            echo json_encode($msg);
        }
        else
        {
            $msg['success'] = false;
            echo json_encode($msg);
        }
	}
  function update_glass_project()
  {
      $this->load->library('form_validation');
      $this->form_validation->set_rules("ctm_id_update", "اسم العميل", 'required');
      $this->form_validation->set_rules("project_name_update", "اسم المشروع", 'required');
      if ($this->form_validation->run() == true)
      {
          $result = $this->gla->update_glass_project();
          $msg['success'] = false;
          if ($result) {
              $msg['success'] = true;
          }
          echo json_encode($msg);
      }
      else
      {
          $msg['success'] = false;
          echo json_encode($msg);
      }
  }
  function pagination()
  {
      $this->load->library('pagination');
      $config = array();
      $config['base_url'] = '#';
      $config['total_rows'] = $this->gla->count_all();
      $config['per_page'] = 15;
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
              'glass_projects_pagination_link' => $this->pagination->create_links(),
              'glass_projects_table'	  => $this->gla->fetch_details($config['per_page'],$start)
      );
      echo json_encode($output);
  }
	function delete_glass_project()
	{
		$result = $this->gla->delete_glass_project();

		$msg['success'] = false;
		if ($result) {
			$msg['success']= true;
		}
		echo json_encode($msg);
	}
	function printGlassreport()
	{
        $id = $this->uri->segment(3);
        $data['id'] = $id;
        $this->load->view('glass/print_glass_report',$data);
	}
	function printGlassdetails()
  {
      $this->load->library('pagination');
      $config = array();
      $config['base_url'] = '#';
      $config['total_rows'] = $this->gla->count_all();
      $config['per_page'] = 50;
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
              'glass_projects_pagination_link' => $this->pagination->create_links(),
              'glass_projects_table'	  => $this->gla->fetch_details_print($config['per_page'],$start)
      );
      echo json_encode($output);
  }
  function getdatabyid()
  {
      $result = $this->gla->getdatabyid();
      echo json_encode($result);
  }
	function loadGlass_project_details()
	{
			$data['pagetitle'] = 'مقايسة اعمال زجاج';
			$data['id_pro'] = $this->input->get('id_pro');
			$data['page']=$this->load->view('glass/glass_calc_view',NULL,TRUE);
			echo json_encode($data);
	}

}
 ?>
