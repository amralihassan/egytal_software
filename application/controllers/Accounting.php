<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accounting
 *
 * @author Developer
 */
class Accounting extends CI_Controller 
{
    function __construct()
    {
            parent :: __construct();
            $this->load->model('Accounting_model','acc');
    }    
    function load_accounting()
    {
            $data['pagetitle'] = 'الحركة اليومية';
            $data['page']=$this->load->view('pages/accounting/accounting_view',NULL,TRUE);
            echo json_encode($data);
    } 
    function load_accounts()
    {
        $data['pagetitle'] = 'دليل الحسابات';
        $data['page']=$this->load->view('pages/accounting/accounts_view',NULL,TRUE);
        echo json_encode($data);
    }  
    function load_accounts_report()
    {
        $data['pagetitle'] = 'كشف حساب';
        $data['page']=$this->load->view('pages/accounting/accounts_report_view',NULL,TRUE);
        echo json_encode($data);
    }  
    function printInv()
    {
        $accID = $this->uri->segment(3);
        $fromDate = $this->uri->segment(4);
        $toDate = $this->uri->segment(5);
        $data['accID'] = $accID;
        $data['fromDate'] = $fromDate;
        $data['toDate'] = $toDate;

        $this->load->view('accounting/accReportview',$data);          
    }      
    function pagination()
    {
            $this->load->library('pagination');
            $config = array();
            $config['base_url'] = '#';
            $config['total_rows'] = $this->acc->count_all();
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
                    'daily_actions_pagination_link' => $this->pagination->create_links(),
                    'daily_actions_table'     => $this->acc->fetch_details($config['per_page'],$start)
            );
            echo json_encode($output);
    }     
    function pagination_accounts()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->acc->count_all_accounts();
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
                'accounts_pagination_link' => $this->pagination->create_links(),
                'accounts_table'     => $this->acc->fetch_details_accounts($config['per_page'],$start)
        );
        echo json_encode($output);
    }  
    function pagination_accounts_search()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->acc->count_accounts_report_search();
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
            'accounts_pagination_link' => $this->pagination->create_links(),
            'accounts_table'      => $this->acc->fetch_details_accounts_report_search($config['per_page'],$start)
        );
        echo json_encode($output);
    }  
    function printAccountreport()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->acc->count_accounts_report_search();
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
            'accounts_pagination_link' => $this->pagination->create_links(),
            'accounts_table'      => $this->acc->accounts_report_search($config['per_page'],$start)
        );
        echo json_encode($output);
    }      
    function pagination_search_accounting()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->acc->count_all_search_accounting();
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
                'daily_actions_pagination_link' => $this->pagination->create_links(),
                'daily_actions_table'     => $this->acc->fetch_details_search_accounting($config['per_page'],$start)
        );
        echo json_encode($output);
    }   
    function pagination_search_accounts()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->acc->count_all_search_accounts();
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
                'accounts_pagination_link' => $this->pagination->create_links(),
                'accounts_table'     => $this->acc->fetch_details_search_accounts($config['per_page'],$start)
        );
        echo json_encode($output);
    }            
    // retrive accounts name
    function retrive_accounts()
    {
        $titles = $this->acc->retrive_accounts();
        // titles
        if (count($titles)>0) // fill select box
        {
            $pro_select_box = "";
            $pro_select_box .= '<option value="">اسم الحساب</option>' ;
            foreach ($titles as $row) {
                $pro_select_box .= '<option value="'. $row->accID .'">'.$row->acc_name.'</option>' ;
            }
            echo json_encode($pro_select_box);
        }           
    }   
    function retrive_accounts_by_accID()
    {
        $id = $this->input->get('accid');

        $titles = $this->acc->retrive_accounts();
        // grades
        if (count($titles)>0) // fill select box
        {
            $checked = "";
            $pro_select_box = "";
            $pro_select_box .= '<option value="">اسم الحساب</option>' ;
            foreach ($titles as $row) {
                if($row->accID == $id){$checked ="selected";}else{$checked="";}
                $pro_select_box .= '<option '. $checked .' value ="'. $row->accID .'">'.$row->acc_name.'</option>' ;
            }
            echo json_encode($pro_select_box);
        }
    }       
    function add_new_action()    
    {
        $result = $this->acc->add_new_action();

        $msg['success'] = false;
        if ($result) {
                $msg['success']= true;
        }
        echo json_encode($msg);         
    }
    function add_new_account()
    {
        $result = $this->acc->add_new_account();

        $msg['success'] = false;
        if ($result) {
                $msg['success']= true;
        }
        echo json_encode($msg);          
    }
    function Delete_more_one_daily_actions()
    {
        foreach ($_POST['id'] as $id) {
                $result = $this->acc->delete_more_one_daily_actions($id);
        }
        $msg['success']=false;
        if ($result) {
                $msg['success']=true;
        }
        echo json_encode($msg);     
    }    
    function Delete_more_one_accounts()
    {
        foreach ($_POST['accID'] as $id) {
                $result = $this->acc->delete_more_one_accounts($id);
        }
        $msg['success']=false;
        if ($result) {
                $msg['success']=true;
        }
        echo json_encode($msg);     
    }  
    function update_account()
    {
            $result = $this->acc->update_account();
            $msg['success'] = false;
            if ($result) {
                    $msg['success']= true;
            }
            echo json_encode($msg);         
    }   
    function getdatabyid_account()
    {
            $result = $this->acc->getdatabyid_account();
            echo json_encode($result);
    }  
    function get_current_finicial_period()
    {
            $result = $this->acc->get_current_finicial_period();
            echo json_encode($result);
    }       
    function update_daily_action()
    {
            $result = $this->acc->update_daily_action();
            $msg['success'] = false;
            if ($result) {
                    $msg['success']= true;
            }
            echo json_encode($msg);         
    }  
    function update_finicail_period()
    {
        $result = $this->acc->update_finicail_period();
        $msg['success'] = false;
        if ($result) {
                $msg['success']= true;
        }
        echo json_encode($msg);          
    } 
    function getdatabyid_daily_action()
    {
            $result = $this->acc->getdatabyid_daily_action();
            echo json_encode($result);
    }                
}
