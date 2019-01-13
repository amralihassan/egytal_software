<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Controller
*/
class Employee extends CI_controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model('Employee_model','emp');
	}
    function get_current_salary_period()
    {
        $result = $this->emp->get_current_salary_period();
        echo json_encode($result);
    } 
    function update_salary_period()
    {
        $result = $this->emp->update_salary_period();
        $msg['success'] = false;
        if ($result) {
                $msg['success']= true;
        }
        echo json_encode($msg);          
    }  
    function get_total_fees()
    {
        $total = $this->emp->get_total_fees();
        echo json_encode($total);         
    }   
    function get_total_punish()
    {
        $total = $this->emp->get_total_punish();
        echo json_encode($total);         
    } 
    function get_total_lent()
    {
        $total = $this->emp->get_total_lent();
        echo json_encode($total);         
    } 
    function get_total_overtime()
    {
        $total = $this->emp->get_total_overtime();
        echo json_encode($total);         
    }                   
    function get_cash()
    {
        $total = $this->emp->get_cash();
        echo json_encode($total);         
    }
    function get_fees()
    {
        $total = $this->emp->get_fees();
        echo json_encode($total);         
    }  
    function get_punish()
    {
        $total = $this->emp->get_punish();
        echo json_encode($total);         
    }  
    function get_overtime()
    {
        $total = $this->emp->get_overtime();
        echo json_encode($total);         
    } 
    function get_lent()
    {
        $total = $this->emp->get_lent();
        echo json_encode($total);         
    }   
    function get_total()
    {
        $total = $this->emp->get_total();
        echo json_encode($total);         
    }                          
    // retrive employee
    function retrive_employee()
    {
        $titles = $this->emp->retrive_employee();
        // titles
        if (count($titles)>0) // fill select box
        {
            $pro_select_box = "";
            $pro_select_box .= '<option value="">اختار اسم الموظف</option>' ;
            foreach ($titles as $row) {
                $pro_select_box .= '<option value="'. $row->empID .'">'.$row->emp_full_name.'</option>' ;
            }
            echo json_encode($pro_select_box);
        }           
    }      
    function retrive_employee_by_empID()
    {
        $id = $this->input->get('empid');

        $titles = $this->emp->retrive_employee();
        // grades
        if (count($titles)>0) // fill select box
        {
            $checked = "";
            $pro_select_box = "";
            $pro_select_box .= '<option value="">اختار اسم الموظف</option>' ;
            foreach ($titles as $row) {
                if($row->empID == $id){$checked ="selected";}else{$checked="";}
                $pro_select_box .= '<option '. $checked .' value ="'. $row->empID .'">'.$row->emp_full_name.'</option>' ;
            }
            echo json_encode($pro_select_box);
        }        
    }    
    function load_employee()
    {
            $data['pagetitle'] = 'الموظفين';
            $data['page']=$this->load->view('pages/employee/employee_view',NULL,TRUE);
            echo json_encode($data);
    }	
    function load_fees()
    {
            $data['pagetitle'] = 'مصاريف الموظفيين';
            $data['page']=$this->load->view('pages/employee/fees_view',NULL,TRUE);
            echo json_encode($data);
    }
    function load_lent()
    {
            $data['pagetitle'] = 'السلف';
            $data['page']=$this->load->view('pages/employee/lent_view',NULL,TRUE);
            echo json_encode($data);
    }	
    function load_punish()
    {
            $data['pagetitle'] = 'الخصومات';
            $data['page']=$this->load->view('pages/employee/punish_view',NULL,TRUE);
            echo json_encode($data);
    }	
    function load_overtime()
    {
            $data['pagetitle'] = 'حساب الوقت الإضافي';
            $data['page']=$this->load->view('pages/employee/overtime_view',NULL,TRUE);
            echo json_encode($data);
    }	    
    function load_salary()
    {
        $data['pagetitle'] = 'الرواتب';
        $data['page']=$this->load->view('pages/employee/salary_view',NULL,TRUE);
        echo json_encode($data);
    }		
    function pagination()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->emp->count_all();
        $config['per_page'] = 150;
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
                'employee_pagination_link' => $this->pagination->create_links(),
                'employee_table'	  => $this->emp->fetch_details($config['per_page'],$start)
        );
        echo json_encode($output);
    }
    function pagination_salary()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->emp->count_all_salary();
        $config['per_page'] = 150;
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
                'salary_pagination_link' => $this->pagination->create_links(),
                'salary_table'      => $this->emp->fetch_details_salary($config['per_page'],$start)
        );
        echo json_encode($output);
    } 
    function pagination_search_salary()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->emp->count_all_search_salary();
        $config['per_page'] = 150;
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
                'salary_pagination_link' => $this->pagination->create_links(),
                'salary_table'      => $this->emp->fetch_details_search_salary($config['per_page'],$start)
        );
        echo json_encode($output);
    }  
    function pagination_search_salary_each_emplyee()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->emp->count_all_search_salary();
        $config['per_page'] = 150;
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
                'salary_pagination_link' => $this->pagination->create_links(),
                'salary_table'      => $this->emp->fetch_details_search_salary_each_employee($config['per_page'],$start)
        );
        echo json_encode($output);
    }  
    function getdata_fees_employee()
    {
        $id = $this->input->get('id');
        $fDate = $this->input->get('fDate');
        $tDate = $this->input->get('tDate');
        $titles = $this->emp->getdata_fees_employee($id,$fDate,$tDate);
        $output = "";
        $n=1;
        $output .='
            <table  dir="rtl" class="table table-responsive table-hover table-bordered">
                <thead>
                    <tr class="bgTable">
                        <th class="col-lg-0">#</th> 
                        <th class="col-lg-3">التاريخ</th>                                             
                        <th class="col-lg-2">المبلغ</th>                     
                        <th class="col-lg-7">ملاحظات</th> 
                    </tr>
                </thead>
        ';        
        if (count($titles)>0) // fill select box
        {
            foreach ($titles as $row) {
                $output .='
                    <tr>
                        <td  align="right">'.$n.'</td>  
                        <td  align="right">'.$row->date_action.'</td>                    
                        <td  align="right">'.$row->amount.'</td>                    
                        <td  align="right">'.$row->notes.'</td>
                    </tr>
                    ';  
                    $n++;              
            };
            $output .='</table>';
            
        }
        echo json_encode($output);
    } 
    function getdata_lent_employee()
    {
        $id = $this->input->get('id');
        $fDate = $this->input->get('fDate');
        $tDate = $this->input->get('tDate');
        $titles = $this->emp->getdata_lent_employee($id,$fDate,$tDate);
        $output = "";
        $n=1;
        $output .='
            <table  dir="rtl" class="table table-responsive table-hover table-bordered">
                <thead>
                    <tr class="bgTable">
                        <th class="col-lg-0">#</th> 
                        <th class="col-lg-3">التاريخ</th>                                             
                        <th class="col-lg-2">المبلغ</th>                     
                        <th class="col-lg-7">ملاحظات</th> 
                    </tr>
                </thead>
        ';        
        if (count($titles)>0) // fill select box
        {
            foreach ($titles as $row) {
                $output .='
                    <tr>
                        <td  align="right">'.$n.'</td>  
                        <td  align="right">'.$row->date_action.'</td>                    
                        <td  align="right">'.$row->amount.'</td>                    
                        <td  align="right">'.$row->notes.'</td>
                    </tr>
                    ';  
                    $n++;              
            };
            $output .='</table>';
            
        }
        echo json_encode($output);
    } 
    function getdata_punish_employee()
    {
        $id = $this->input->get('id');
        $fDate = $this->input->get('fDate');
        $tDate = $this->input->get('tDate');
        $titles = $this->emp->getdata_punish_employee($id,$fDate,$tDate);
        $output = "";
        $n=1;
        $output .='
            <table  dir="rtl" class="table table-responsive table-hover table-bordered">
                <thead>
                    <tr class="bgTable">
                        <th class="col-lg-0">#</th> 
                        <th class="col-lg-3">التاريخ</th>                                             
                        <th class="col-lg-2">المبلغ</th>                     
                        <th class="col-lg-7">ملاحظات</th> 
                    </tr>
                </thead>
        ';        
        if (count($titles)>0) // fill select box
        {
            foreach ($titles as $row) {
                $output .='
                    <tr>
                        <td  align="right">'.$n.'</td>  
                        <td  align="right">'.$row->date_action.'</td>                    
                        <td  align="right">'.$row->amount.'</td>                    
                        <td  align="right">'.$row->notes.'</td>
                    </tr>
                    ';  
                    $n++;              
            };
            $output .='</table>';
            
        }
        echo json_encode($output);
    }  
    function getdata_overtime_employee()
    {
        $id = $this->input->get('id');
        $fDate = $this->input->get('fDate');
        $tDate = $this->input->get('tDate');
        $titles = $this->emp->getdata_overtime_employee($id,$fDate,$tDate);
        $output = "";
        $n=1;
        $output .='
            <table  dir="rtl" class="table table-responsive table-hover table-bordered">
                <thead>
                    <tr class="bgTable">
                        <th class="col-lg-0">#</th> 
                        <th class="col-lg-3">التاريخ</th>                                             
                        <th class="col-lg-2">المبلغ</th>                     
                        <th class="col-lg-7">ملاحظات</th> 
                    </tr>
                </thead>
        ';        
        if (count($titles)>0) // fill select box
        {
            foreach ($titles as $row) {
                $output .='
                    <tr>
                        <td  align="right">'.$n.'</td>  
                        <td  align="right">'.$row->date_action.'</td>                    
                        <td  align="right">'.$row->amount.'</td>                    
                        <td  align="right">'.$row->notes.'</td>
                    </tr>
                    ';  
                    $n++;              
            };
            $output .='</table>';
            
        }
        echo json_encode($output);
    }                                  
    function pagination_search()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->emp->count_all_search();
        $config['per_page'] = 150;
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
                'employee_pagination_link' => $this->pagination->create_links(),
                'employee_table'	  => $this->emp->fetch_details_search($config['per_page'],$start)
        );
        echo json_encode($output);
    }
    function pagination_search_fees()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->emp->count_all_search_fees();
        $config['per_page'] = 150;
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
                'fees_pagination_link' => $this->pagination->create_links(),
                'fees_table'      => $this->emp->fetch_details_search_fees($config['per_page'],$start)
        );
        echo json_encode($output);
    }   
    function pagination_search_total_fees()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->emp->count_all_search_total_fees();
        $config['per_page'] = 150;
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
                'fees_pagination_link' => $this->pagination->create_links(),
                'fees_table'      => $this->emp->fetch_details_search_total_fees($config['per_page'],$start)
        );
        echo json_encode($output);
    } 
    function pagination_search_total_punish()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->emp->count_all_search_total_punish();
        $config['per_page'] = 150;
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
                'punish_pagination_link' => $this->pagination->create_links(),
                'punish_table'      => $this->emp->fetch_details_search_total_punish($config['per_page'],$start)
        );
        echo json_encode($output);
    }      
    function pagination_search_total_lent()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->emp->count_all_search_total_lent();
        $config['per_page'] =150;
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
                'lent_pagination_link' => $this->pagination->create_links(),
                'lent_table'      => $this->emp->fetch_details_search_total_lent($config['per_page'],$start)
        );
        echo json_encode($output);
    }      
    function pagination_search_total_overtime()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->emp->count_all_search_total_overtime();
        $config['per_page'] = 150;
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
                'overtime_pagination_link' => $this->pagination->create_links(),
                'overtime_table'      => $this->emp->fetch_details_search_total_overtime($config['per_page'],$start)
        );
        echo json_encode($output);
    }        
    function pagination_search_lent()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->emp->count_all_search_lent();
        $config['per_page'] = 150;
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
                'lent_pagination_link' => $this->pagination->create_links(),
                'lent_table'      => $this->emp->fetch_details_search_lent($config['per_page'],$start)
        );
        echo json_encode($output);
    }      
    function pagination_search_punish()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->emp->count_all_search_punish();
        $config['per_page'] = 150;
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
                'punish_pagination_link' => $this->pagination->create_links(),
                'punish_table'      => $this->emp->fetch_details_search_punish($config['per_page'],$start)
        );
        echo json_encode($output);
    }      
    function pagination_search_overtime()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->emp->count_all_search_overtime();
        $config['per_page'] = 150;
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
                'overtime_pagination_link' => $this->pagination->create_links(),
                'overtime_table'      => $this->emp->fetch_details_search_overtime($config['per_page'],$start)
        );
        echo json_encode($output);
    }           
    function add_employee()
    {
        $result = $this->emp->add_employee();

        $msg['success'] = false;
        if ($result) {
                $msg['success']= true;
        }
        echo json_encode($msg);			
    }
    function add_salary()
    {
        $result = $this->emp->add_salary();

        $msg['success'] = false;
        if ($result) {
                $msg['success']= true;
        }
        echo json_encode($msg);         
    }    
    function add_fees()
    {
        $result = $this->emp->add_fees();

        $msg['success'] = false;
        if ($result) {
                $msg['success']= true;
        }
        echo json_encode($msg);         
    }
    function add_lent()
    {
        $result = $this->emp->add_lent();

        $msg['success'] = false;
        if ($result) {
                $msg['success']= true;
        }
        echo json_encode($msg);         
    }
    function add_punish()
    {
        $result = $this->emp->add_punish();

        $msg['success'] = false;
        if ($result) {
                $msg['success']= true;
        }
        echo json_encode($msg);         
    }    
    function add_overtime()
    {
        $result = $this->emp->add_overtime();

        $msg['success'] = false;
        if ($result) {
                $msg['success']= true;
        }
        echo json_encode($msg);         
    }            
    function getdatabyid()
    {
            $result = $this->emp->getdatabyid();
            echo json_encode($result);
    }	
    function getdatabyid_fees()
    {
            $result = $this->emp->getdatabyid_fees();
            echo json_encode($result);
    }   
    function getdatabyid_lent()
    {
            $result = $this->emp->getdatabyid_lent();
            echo json_encode($result);
    }   
    function getdatabyid_overtime()
    {
            $result = $this->emp->getdatabyid_overtime();
            echo json_encode($result);
    }   
    function getdatabyid_punish()
    {
            $result = $this->emp->getdatabyid_punish();
            echo json_encode($result);
    }                   
    function update_employee()
    {
            $result = $this->emp->update_employee();
            $msg['success'] = false;
            if ($result) {
                    $msg['success']= true;
            }
            echo json_encode($msg);			
    }
    function update_fees()
    {
            $result = $this->emp->update_fees();
            $msg['success'] = false;
            if ($result) {
                    $msg['success']= true;
            }
            echo json_encode($msg);         
    }
    function update_lent()
    {
            $result = $this->emp->update_lent();
            $msg['success'] = false;
            if ($result) {
                    $msg['success']= true;
            }
            echo json_encode($msg);         
    }
    function update_overtime()
    {
            $result = $this->emp->update_overtime();
            $msg['success'] = false;
            if ($result) {
                    $msg['success']= true;
            }
            echo json_encode($msg);         
    }
    function update_punish()
    {
            $result = $this->emp->update_punish();
            $msg['success'] = false;
            if ($result) {
                    $msg['success']= true;
            }
            echo json_encode($msg);         
    }                
    function Delete_more_one_employee()
    {
        foreach ($_POST['empID'] as $id) {
                $result = $this->emp->delete_more_one_employee($id);
        }
        $msg['success']=false;
        if ($result) {
                $msg['success']=true;
        }
        echo json_encode($msg);		
    } 
    function Delete_more_one_salary()
    {
        foreach ($_POST['id'] as $id) {
                $result = $this->emp->delete_more_one_salary($id);
        }
        $msg['success']=false;
        if ($result) {
                $msg['success']=true;
        }
        echo json_encode($msg);     
    }    
    function Delete_more_one_lent()
    {
        foreach ($_POST['id'] as $id) {
                $result = $this->emp->delete_more_one_lent($id);
        }
        $msg['success']=false;
        if ($result) {
                $msg['success']=true;
        }
        echo json_encode($msg);     
    } 
    function Delete_more_one_fees()
    {
        foreach ($_POST['id'] as $id) {
                $result = $this->emp->delete_more_one_fees($id);
        }
        $msg['success']=false;
        if ($result) {
                $msg['success']=true;
        }
        echo json_encode($msg);     
    } 
    function Delete_more_one_punish()
    {
        foreach ($_POST['id'] as $id) {
                $result = $this->emp->delete_more_one_punish($id);
        }
        $msg['success']=false;
        if ($result) {
                $msg['success']=true;
        }
        echo json_encode($msg);     
    } 
    function Delete_more_one_overtime()
    {
        foreach ($_POST['id'] as $id) {
                $result = $this->emp->delete_more_one_overtime($id);
        }
        $msg['success']=false;
        if ($result) {
                $msg['success']=true;
        }
        echo json_encode($msg);     
    }  	
}
 ?>