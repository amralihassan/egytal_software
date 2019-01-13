<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Employee_model
*/
class Employee_model extends CI_model
{
	
	function __construct()
	{
		parent ::__construct();
	}
	function get_current_salary_period()
	{
		$this->db->limit(1);
		$query = $this->db->get('salary_period');
		if ($query ->num_rows()>0) {
			return $query->row();
		}else{
			return false;
		}
	}	
	function update_salary_period()
	{
		if (isset($_POST['start_date_add']) && isset($_POST['end_date_add']))
		{
			$data = array
			('start_date' => $this->input->post('start_date_add'),
			 'end_date' => $this->input->post('end_date_add')
			);
			$this->db->update('salary_period',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}	
		}
	}	
	function get_total_cash()
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			// get number of rows
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$sql = "SELECT SUM(`total`) AS total FROM salary WHERE date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
			return $this->db->query($sql)->row('total');	
		}
	}		
	function get_total_fees()
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			// get number of rows
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$sql = "SELECT SUM(`amount`) AS total FROM labor_fees WHERE date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
			return $this->db->query($sql)->row('total');				
		}
	}	
	function get_total_punish()
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			// get number of rows
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$sql = "SELECT SUM(`amount`) AS total FROM labor_punish WHERE date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
			return $this->db->query($sql)->row('total');
		}		
	}	
	function get_total_lent()
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			// get number of rows
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$sql = "SELECT SUM(`amount`) AS total FROM labor_lent WHERE date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
			return $this->db->query($sql)->row('total');			
		}		
	}
	function get_total_overtime()
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			// get number of rows
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$sql = "SELECT SUM(`amount`) AS total FROM labor_overtime WHERE date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
			return $this->db->query($sql)->row('total');			
		}		
	}			
	// cash
	function get_cash()
	{
		if ($_GET['name'])
		{
			// get number of rows
			$id = $this->input->get('name');
			$sql = "SELECT salary_per_week FROM employee WHERE `empID`=". $id;
			return $this->db->query($sql)->row('salary_per_week');			
		}		
	}	
	// total fees
	function get_fees()
	{
		if ($_GET['name'] && $_GET['fDate'] && $_GET['tDate']) 
		{
			// get number of rows
			$id = $this->input->get('name');
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$sql = "SELECT SUM(`amount`) AS total FROM labor_fees WHERE `empID`=". $id ." AND date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
			return $this->db->query($sql)->row('total');	
		}		
	}

	function get_punish()
	{
		if ($_GET['name'] && $_GET['fDate'] && $_GET['tDate']) 
		{
			// get number of rows
			$id = $this->input->get('name');
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$sql = "SELECT SUM(`amount`) AS total FROM labor_punish WHERE `empID`=". $id ." AND date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
			return $this->db->query($sql)->row('total');			
		}		
	}	
	function get_lent()
	{
		// get number of rows
		$id = $this->input->get('name');
		$from_date = $this->input->get('fDate');
		$to_date = $this->input->get('tDate');
		$sql = "SELECT SUM(`amount`) AS total FROM labor_lent WHERE `empID`=". $id ." AND date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
		return $this->db->query($sql)->row('total');		
	}	
	function get_overtime()
	{
		if ($_GET['name'] && $_GET['fDate'] && $_GET['tDate']) 
		{
			// get number of rows
			$id = $this->input->get('name');
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$sql = "SELECT SUM(`amount`) AS total FROM labor_overtime WHERE `empID`=". $id ." AND date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
			return $this->db->query($sql)->row('total');				
		}		
	}
	function get_total()
	{
		if ($_GET['name'] && $_GET['fDate'] && $_GET['tDate']) 
		{
			// get number of rows
			$total = "";
			$id = $this->input->get('name');
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');

			// cash
			$sql_cash = "SELECT salary_per_week FROM employee WHERE `empID`=". $id;
			$cash =  $this->db->query($sql_cash)->row('salary_per_week');			
			// fees
			$sql_fees = "SELECT SUM(`amount`) AS total FROM labor_fees WHERE `empID`=". $id ." AND date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
			$fees =  $this->db->query($sql_fees)->row('total');
			// punish
			$sql_punish = "SELECT SUM(`amount`) AS total FROM labor_punish WHERE `empID`=". $id ." AND date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
			$punish =  $this->db->query($sql_punish)->row('total');		
			// lent
			$sql_lent = "SELECT SUM(`amount`) AS total FROM labor_lent WHERE `empID`=". $id ." AND date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
			$lent =  $this->db->query($sql_lent)->row('total');	
			// overtime
			$sql_overtime = "SELECT SUM(`amount`) AS total FROM labor_overtime WHERE `empID`=". $id ." AND date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
			$overtime =  $this->db->query($sql_overtime)->row('total');				
			
			$total =$cash - $fees + $overtime - $punish - $lent ;
			return $total;			
		}		
	}				
	function retrive_employee()
	{
		$this->db->where('work_status','يعمل');
		$query = $this->db->get('employee');
		return $query->result();			
	}
	function add_employee()
	{
		if (isset($_POST['emp_full_name']) && isset($_POST['job_title']) && isset($_POST['mobile']) && isset($_POST['salary_per_week']) && isset($_POST['finger_print']) && isset($_POST['work_status']))
		{
			$data = array
			('emp_full_name' => $this->input->post('emp_full_name'),
			 'job_title' => $this->input->post('job_title'),
			 'mobile' => $this->input->post('mobile'),
			 'salary_per_week' => $this->input->post('salary_per_week'),
			 'finger_print' => $this->input->post('finger_print'),
			 'work_status' => $this->input->post('work_status')
			 
			);
			$this->db->insert('employee',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}	
		}
	}
	function add_salary()
	{	
		if (isset($_POST['emp_full_name']) && isset($_POST['date_action']) && isset($_POST['fees']) && isset($_POST['punish']) && isset($_POST['lent']) && isset($_POST['overtime']) && isset($_POST['total']) && isset($_POST['notes']))
		{
			$data = array
			('empID' => $this->input->post('emp_full_name'),
			 'date_action' => $this->input->post('date_action'),
			 'fees' => $this->input->post('fees'),
			 'punish' => $this->input->post('punish'),
			 'lent' => $this->input->post('lent'),
			 'overtime' => $this->input->post('overtime'),
			 'total' => $this->input->post('total'),
			 'notes' => $this->input->post('notes')
			);
			$this->db->insert('salary',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}	
		}	
	}	
	function add_fees()
	{
		if (isset($_POST['emp_full_name']) && isset($_POST['amount']) && isset($_POST['date_action']) && isset($_POST['notes']))
		{
			$data = array
			('empID' => $this->input->post('emp_full_name'),
			 'amount' => $this->input->post('amount'),
			 'date_action' => $this->input->post('date_action'),
			 'notes' => $this->input->post('notes')
			);
			$this->db->insert('labor_fees',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}	
		}
	}
	function add_lent()
	{
		if (isset($_POST['emp_full_name']) && isset($_POST['amount']) && isset($_POST['date_action']) && isset($_POST['notes']))
		{
			$data = array
			('empID' => $this->input->post('emp_full_name'),
			 'amount' => $this->input->post('amount'),
			 'date_action' => $this->input->post('date_action'),		 
			 'notes' => $this->input->post('notes')
			);
			$this->db->insert('labor_lent',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}			
		}
	}
	function add_punish()
	{
		if (isset($_POST['emp_full_name']) && isset($_POST['amount']) && isset($_POST['date_action']) && isset($_POST['notes']))
		{
			$data = array
			('empID' => $this->input->post('emp_full_name'),
			 'amount' => $this->input->post('amount'),
			 'date_action' => $this->input->post('date_action'),		 
			 'notes' => $this->input->post('notes')
			);
			$this->db->insert('labor_punish',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}				
		}
	}	
	function add_overtime()
	{
		if (isset($_POST['emp_full_name']) && isset($_POST['amount']) && isset($_POST['date_action']) && isset($_POST['notes']))
		{
			$data = array
			('empID' => $this->input->post('emp_full_name'),
			 'amount' => $this->input->post('amount'),
			 'date_action' => $this->input->post('date_action'),		 
			 'notes' => $this->input->post('notes')
			);
			$this->db->insert('labor_overtime',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}				
		}
	}				
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('employee');
		return $query->num_rows();
	}
	function count_all_search_overtime()
	{
		if ($_GET['name'])
		{
			// get number of rows
			$value = $this->input->get('name');
			$this->db->order_by('date_action');
			$this->db->like('emp_full_name',$value);
			$this->db->or_like('notes',$value);
			$this->db->or_like('date_action',$value);
			$query = $this->db->get('full_labor_overtime');
			return $query->num_rows();
		}
	}	
	function count_all_search_salary()
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$this->db->order_by('id');
			$this->db->where('date_action >=', $from_date);
			$this->db->where('date_action <=', $to_date);	
			$query = $this->db->get('full_salary');
			return $query->num_rows();
		}
	}	
	function fetch_details_search_salary($limit,$start)
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			$output = '';
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$this->db->order_by('id');
			$this->db->where('date_action >=', $from_date);
			$this->db->where('date_action <=', $to_date);	
			$this->db->limit($limit,$start);
			$query = $this->db->get('full_salary');
			$n=1;
			$output .='
				<table  dir="rtl" class="table table-hover table-bordered table-sm">
					<thead class="thead-dark">
						<tr class="bgTable">
							<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>	
							<th scope="col">#</th>
							<th scope="col">اسم الموظف</th>
							<th scope="col">الأجر في الأسبوع</th>						
							<th scope="col">المصاريف</th>
							<th scope="col">الخصومات</th>
							<th scope="col">السلف</th>
							<th scope="col">الإضافي</th>
							<th scope="col">الإجمالي المستحق</th>							
						</tr>
					</thead>
			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
					<tr>
						<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->id.'" name="id[]"></td>
						<td  align="right">'.$n.'</td>
						<td  align="right">'.$row->emp_full_name.'</td>
						<td  align="right">'.$row->salary_per_week.'</td>
						<td  align="right">'.$row->fees.'</td>
						<td  align="right">'.$row->punish.'</td>
						<td  align="right">'.$row->lent.'</td>
						<td  align="right">'.$row->overtime.'</td>
						<td  align="right">'.$row->total.'</td>
					</tr>
					';
					$n++;
				}	

				// total cash
				$sql_total = "SELECT SUM(`salary_per_week`) AS total FROM full_salary WHERE date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
				$total = $this->db->query($sql_total)->row('total');			

				// total fees
				$sql_fees = "SELECT SUM(`fees`) AS total FROM full_salary WHERE date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
				$fees = $this->db->query($sql_fees)->row('total');

				// total punish
				$sql_punish = "SELECT SUM(`punish`) AS total FROM full_salary WHERE date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
				$punish = $this->db->query($sql_punish)->row('total');

				// total lent
				$sql_lent = "SELECT SUM(`lent`) AS total FROM full_salary WHERE date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
				$lent = $this->db->query($sql_lent)->row('total');

				// total overtime
				$sql_overtime = "SELECT SUM(`overtime`) AS total FROM full_salary WHERE date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
				$overtime = $this->db->query($sql_overtime)->row('total');									

				// total total
				$sql_final = "SELECT SUM(`total`) AS total FROM full_salary WHERE date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
				$total_final = $this->db->query($sql_final)->row('total');
				$output .='
					<tr>
						<td colspan="3" align="center"><b>الاجمالي</b></td>
						<td  align="right"><b>'.$total.'</b></td>
						<td  align="right"><b>'.$fees.'</b></td>
						<td  align="right"><b>'.$punish.'</b></td>
						<td  align="right"><b>'.$lent.'</b></td>
						<td  align="right"><b>'.$overtime.'</b></td>
						<td  align="right"><b>'.$total_final.'</b></td>
					</tr>				
				';
				$output .='</table>';					
			}
			else
			{
				$output = '<div class="alert alert w3-red">لا توجد اي نتائج</div>';
			}
			return $output;
		}		
	}	
	function fetch_details_search_salary_each_employee($limit,$start)
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			$output = '';
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$this->db->order_by('id');
			$this->db->where('date_action >=', $from_date);
			$this->db->where('date_action <=', $to_date);	
			$this->db->limit($limit,$start);
			$query = $this->db->get('full_salary');
			$n=1;
			$output .='

			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
				<table  dir="rtl" class="table  table-hover table-bordered">
					<thead class="thead-dark">
						<tr class="bgTable">
							<th scope="col">#</th>
							<th scope="col">اسم الموظف</th>
							<th scope="col">الأجر في الأسبوع</th>						
							<th scope="col">المصاريف</th>
							<th scope="col">الخصومات</th>
							<th scope="col">السلف</th>
							<th scope="col">الإضافي</th>
							<th scope="col">الإجمالي المستحق</th>							
						</tr>
					</thead>				
					<tr>
						<td  align="right">'.$n.'</td>
						<td  align="right">'.$row->emp_full_name.'</td>
						<td  align="right">'.$row->salary_per_week.'</td>
						<td  align="right">'.$row->fees.'</td>
						<td  align="right">'.$row->punish.'</td>
						<td  align="right">'.$row->lent.'</td>
						<td  align="right">'.$row->overtime.'</td>
						<td  align="right">'.$row->total.'</td>
					</tr>
					';
					$n++;

				}	
				$output .='</table>';					
			}
			else
			{
				$output = '<div class="alert alert w3-red">لا توجد اي نتائج</div>';
			}
			return $output;
		}		
	}	
	function getdata_fees_employee($id,$fDate,$tDate)
	{
		$this->db->order_by('date_action');
		$this->db->where('empID',$id);
		$this->db->where('date_action >=', $fDate);
		$this->db->where('date_action <=', $tDate);			
		$query = $this->db->get('full_labor_fees');
		return $query->result();
	}
	function getdata_punish_employee($id,$fDate,$tDate)
	{
		$this->db->order_by('date_action');
		$this->db->where('empID',$id);
		$this->db->where('date_action >=', $fDate);
		$this->db->where('date_action <=', $tDate);			
		$query = $this->db->get('full_labor_punish');
		return $query->result();
	}
	function getdata_lent_employee($id,$fDate,$tDate)
	{
		$this->db->order_by('date_action');
		$this->db->where('empID',$id);
		$this->db->where('date_action >=', $fDate);
		$this->db->where('date_action <=', $tDate);			
		$query = $this->db->get('full_labor_lent');
		return $query->result();
	}
	function getdata_overtime_employee($id,$fDate,$tDate)
	{
		$this->db->order_by('date_action');
		$this->db->where('empID',$id);
		$this->db->where('date_action >=', $fDate);
		$this->db->where('date_action <=', $tDate);			
		$query = $this->db->get('full_labor_overtime');
		return $query->result();
	}				
	function count_all_salary()
	{
		// get number of rows
		$query = $this->db->get('salary');
		return $query->num_rows();
	}				
	function getdatabyid()
	{
		if ($_GET['id'])
		{
			$id = $this->input->get('id');
			$this->db->where('empID',$id);
			$query = $this->db->get('employee');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}
	function getdatabyid_salary()
	{
		if ($_GET['id'])
		{
			$id = $this->input->get('id');
			$this->db->where('id',$id);
			$query = $this->db->get('full_salary');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}	
	function getdatabyid_fees()
	{
		if ($_GET['id'])
		{
			$id = $this->input->get('id');
			$this->db->where('id',$id);
			$query = $this->db->get('labor_fees');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}
	function getdatabyid_lent()
	{
		if ($_GET['id'])
		{
			$id = $this->input->get('id');
			$this->db->where('id',$id);
			$query = $this->db->get('labor_lent');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}
	function getdatabyid_overtime()
	{
		if ($_GET['id'])
		{
			$id = $this->input->get('id');
			$this->db->where('id',$id);
			$query = $this->db->get('labor_overtime');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}
	function getdatabyid_punish()
	{
		if ($_GET['id'])
		{
			$id = $this->input->get('id');
			$this->db->where('id',$id);
			$query = $this->db->get('labor_punish');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}					
	function update_salary()
	{
		if (isset($_POST['empID_update']) && isset($_POST['emp_full_name_update']) && isset($_POST['date_action_update']) && isset($_POST['fees_update']) && isset($_POST['punish_update']) && isset($_POST['lent_update']) && isset($_POST['overtime_update']) && isset($_POST['total_update']) && isset($_POST['notes_update']))
		{
			$id = $this->input->post('empID_update');
			$data = array
			('empID' => $this->input->post('emp_full_name_update'),
			 'date_action' => $this->input->post('date_action_update'),
			 'fees' => $this->input->post('fees_update'),
			 'punish' => $this->input->post('punish_update'),
			 'lent' => $this->input->post('lent_update'),
			 'overtime' => $this->input->post('overtime_update'),
			 'total' => $this->input->post('total_update'),
			 'notes' => $this->input->post('notes_update')
			);
			$this->db->where('id',$id);
			$this->db->update('salary',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}	
	function update_employee()
	{
		if (isset($_POST['empID_update']) && isset($_POST['emp_full_name_update']) && isset($_POST['job_title_update']) && isset($_POST['mobile_update']) && isset($_POST['salary_per_week_update']) && isset($_POST['finger_print_update']) && isset($_POST['work_status_update']))
		{
			$id = $this->input->post('empID_update');
			$data = array
			('emp_full_name' => $this->input->post('emp_full_name_update'),
			 'job_title' => $this->input->post('job_title_update'),
			 'mobile' => $this->input->post('mobile_update'),
			 'salary_per_week' => $this->input->post('salary_per_week_update'),
			 'finger_print' => $this->input->post('finger_print_update'),
			 'work_status' => $this->input->post('work_status_update')
			 
			);
			$this->db->where('empID',$id);
			$this->db->update('employee',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}		
	function update_lent()
	{
		if (isset($_POST['id_update']) && isset($_POST['emp_full_name_update']) && isset($_POST['amount_update']) && isset($_POST['date_action_update']) && isset($_POST['notes_update']))
		{
			$id = $this->input->post('id_update');
			$data = array
			('empID' => $this->input->post('emp_full_name_update'),
			 'amount' => $this->input->post('amount_update'),
			 'date_action' => $this->input->post('date_action_update'),			 
			 'notes' => $this->input->post('notes_update')
			);
			$this->db->where('id',$id);
			$this->db->update('labor_lent',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}	
	function update_fees()
	{
		if (isset($_POST['id_update']) && isset($_POST['emp_full_name_update']) && isset($_POST['amount_update']) && isset($_POST['date_action_update']) && isset($_POST['notes_update']))
		{
			$id = $this->input->post('id_update');
			$data = array
			('empID' => $this->input->post('emp_full_name_update'),
			 'amount' => $this->input->post('amount_update'),
			 'date_action' => $this->input->post('date_action_update'),			 
			 'notes' => $this->input->post('notes_update')
			);
			$this->db->where('id',$id);
			$this->db->update('labor_fees',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}	
	function update_punish()
	{
		if (isset($_POST['id_update']) && isset($_POST['emp_full_name_update']) && isset($_POST['amount_update']) && isset($_POST['date_action_update']) && isset($_POST['notes_update']))
		{
			$id = $this->input->post('id_update');
			$data = array
			('empID' => $this->input->post('emp_full_name_update'),
			 'amount' => $this->input->post('amount_update'),
			 'date_action' => $this->input->post('date_action_update'),			 		 
			 'notes' => $this->input->post('notes_update')
			);
			$this->db->where('id',$id);
			$this->db->update('labor_punish',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}	
	function update_overtime()
	{
		if (isset($_POST['id_update']) && isset($_POST['emp_full_name_update']) && isset($_POST['amount_update']) && isset($_POST['date_action_update']) && isset($_POST['notes_update']))
		{
			$id = $this->input->post('id_update');
			$data = array
			('empID' => $this->input->post('emp_full_name_update'),
			 'amount' => $this->input->post('amount_update'),
			 'date_action' => $this->input->post('date_action_update'),			 		 
			 'notes' => $this->input->post('notes_update')
			);
			$this->db->where('id',$id);
			$this->db->update('labor_overtime',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}				
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->order_by('emp_full_name');
		$this->db->limit($limit,$start);
		$query = $this->db->get('employee');
		$n=1;
		$output .='
			<table  dir="rtl" class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
					<tr class="bgTable">
						<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>	
						<th scope="col">#</th>
						<th scope="col">اسم الموظف</th>
						<th scope="col">الوظيفة</th>
						<th scope="col">رقم الموبايل</th>
						<th scope="col">الاجر في الاسبوع</th>
						<th scope="col">رقم البصمة</th>
						<th scope="col">حالة العمل</th>				
						<th scope="col">تعديل</th>				
					</tr>
				</thead>
		';
		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$output .='
				<tr>
					<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->empID.'" name="empID[]"></td>
					<td  align="right">'.$n.'</td>
					<td  align="right">'.$row->emp_full_name.'</td>
					<td  align="right">'.$row->job_title.'</td>
					<td  align="right">'.$row->mobile.'</td>
					<td  align="right">'.$row->salary_per_week.'</td>
					<td  align="right">'.$row->finger_print.'</td>
					<td  align="right">'.$row->work_status.'</td>
					<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_customer('.$row->empID.')"></a></td>
				</tr>
				';
				$n++;
			}	
			$output .='</table>';					
		}
		else
		{
			$output = '<div class="alert alert w3-red">لم يتم تسجيل اي موظف</div>';
		}
		return $output;
	}	
	function fetch_details_salary($limit,$start)
	{
		$output = '';
		$this->db->order_by('emp_full_name');
		$this->db->limit($limit,$start);
		$query = $this->db->get('full_salary');
		$n=1;
		$output .='
			<table  dir="rtl" class="table  table-hover table-bordered">
				<thead class="thead-dark">
					<tr class="bgTable">
						<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>	
						<th scope="col">#</th>
						<th scope="col">اسم الموظف</th>
						<th scope="col">الأجر في الأسبوع</th>						
						<th scope="col">المصاريف</th>
						<th scope="col">الخصومات</th>
						<th scope="col">السلف</th>
						<th scope="col">الإضافي</th>
						<th scope="col">الإجمالي المستحق</th>							
					</tr>
				</thead>
		';

		$output .='</table>';

		return $output;
	}		
	function count_all_search()
	{
		if ($_GET['name'])
		{
			// get number of rows
			$value = $this->input->get('name');
			$this->db->like('emp_full_name',$value);
			$this->db->or_like('mobile',$value);
			$this->db->or_like('job_title',$value);
			$this->db->or_like('finger_print',$value);
			$query = $this->db->get('employee');
			return $query->num_rows();
		}
	}	
	function count_all_search_fees()
	{
		if ($_GET['name'])
		{
			// get number of rows
			$value = $this->input->get('name');
			$this->db->order_by('date_action');
			$this->db->like('emp_full_name',$value);
			$this->db->or_like('notes',$value);
			$this->db->or_like('date_action',$value);
			$query = $this->db->get('full_labor_fees');
			return $query->num_rows();
		}
	}	
	function count_all_search_total_fees()
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			// get number of rows
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$this->db->order_by('date_action');
			$this->db->where('date_action >=', $from_date);
			$this->db->where('date_action <=', $to_date);	
			$query = $this->db->get('full_labor_fees');
			return $query->num_rows();
		}
	}
	function count_all_search_total_punish()
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			// get number of rows
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$this->db->order_by('date_action');
			$this->db->where('date_action >=', $from_date);
			$this->db->where('date_action <=', $to_date);	
			$query = $this->db->get('full_labor_punish');
			return $query->num_rows();
		}
	}
	function count_all_search_total_lent()
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			// get number of rows
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$this->db->order_by('date_action');
			$this->db->where('date_action >=', $from_date);
			$this->db->where('date_action <=', $to_date);	
			$query = $this->db->get('full_labor_lent');
			return $query->num_rows();
		}		
	}
	function count_all_search_total_overtime()
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			// get number of rows
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$this->db->order_by('date_action');
			$this->db->where('date_action >=', $from_date);
			$this->db->where('date_action <=', $to_date);	
			$query = $this->db->get('full_labor_overtime');
			return $query->num_rows();
		}		
	}				
	function fetch_details_search_total_fees($limit,$start)
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			$output = '';
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$this->db->order_by('id','desc');
			$this->db->where('date_action >=', $from_date);
			$this->db->where('date_action <=', $to_date);
			$this->db->limit($limit,$start);
			$query = $this->db->get('full_labor_fees');
			$n=1;
			$output .='
				<table  dir="rtl" class="table table-hover table-bordered table-sm">
					<thead class="thead-dark">
						<tr class="bgTable">
							<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>	
							<th scope="col">#</th>
	                        <th scope="col">التاريخ</th>
							<th scope="col">اسم الموظف</th>
							<th scope="col">المبلغ</th>
							<th scope="col">الملاحظات</th>			
							<th scope="col">تعديل</th>				
						</tr>
					</thead>
			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
					<tr>
						<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->id.'" name="id[]"></td>
						<td  align="right">'.$n.'</td>
						<td  align="right">'.$row->date_action.'</td>
						<td  align="right">'.$row->emp_full_name.'</td>
						<td  align="right">'.$row->amount.'</td>
						<td  align="right">'.$row->notes.'</td>
						<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_fees('.$row->id.')"></a></td>
					</tr>
					';
					$n++;
				}	
				$output .='</table>';					
			}
			else
			{
				$output = '<div class="alert alert w3-red">لا توجد اي نتائج</div>';
			}
			return $output;			
		}		
	}	
	function fetch_details_search_total_punish($limit,$start)
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			$output = '';
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$this->db->order_by('date_action');
			$this->db->where('date_action >=', $from_date);
			$this->db->where('date_action <=', $to_date);
			$this->db->limit($limit,$start);
			$query = $this->db->get('full_labor_punish');
			$n=1;
			$output .='
				<table  dir="rtl" class="table table-hover table-bordered table-sm">
					<thead class="thead-dark">
						<tr class="bgTable">
							<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>	
							<th scope="col">#</th>
	                        <th scope="col">التاريخ</th>
							<th scope="col">اسم الموظف</th>
							<th scope="col">المبلغ</th>
							<th scope="col">الملاحظات</th>			
							<th scope="col">تعديل</th>				
						</tr>
					</thead>
			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
					<tr>
						<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->id.'" name="id[]"></td>
						<td  align="right">'.$n.'</td>
						<td  align="right">'.$row->date_action.'</td>
						<td  align="right">'.$row->emp_full_name.'</td>
						<td  align="right">'.$row->amount.'</td>
						<td  align="right">'.$row->notes.'</td>
						<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_punish('.$row->id.')"></a></td>
					</tr>
					';
					$n++;
				}	
				$output .='</table>';					
			}
			else
			{
				$output = '<div class="alert alert w3-red">لا توجد اي نتائج</div>';
			}
			return $output;
		}		
	}
	function fetch_details_search_total_lent($limit,$start)
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			$output = '';
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$this->db->order_by('date_action');
			$this->db->where('date_action >=', $from_date);
			$this->db->where('date_action <=', $to_date);
			$this->db->limit($limit,$start);
			$query = $this->db->get('full_labor_lent');
			$n=1;
			$output .='
				<table  dir="rtl" class="table table-hover table-bordered table-sm">
					<thead class="thead-dark">
						<tr class="bgTable">
							<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>	
							<th scope="col">#</th>
	                        <th scope="col">التاريخ</th>
							<th scope="col">اسم الموظف</th>
							<th scope="col">المبلغ</th>
							<th scope="col">الملاحظات</th>			
							<th scope="col">تعديل</th>				
						</tr>
					</thead>
			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
					<tr>
						<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->id.'" name="id[]"></td>
						<td  align="right">'.$n.'</td>
						<td  align="right">'.$row->date_action.'</td>
						<td  align="right">'.$row->emp_full_name.'</td>
						<td  align="right">'.$row->amount.'</td>
						<td  align="right">'.$row->notes.'</td>
						<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_lent('.$row->id.')"></a></td>
					</tr>
					';
					$n++;
				}	
				$output .='</table>';					
			}
			else
			{
				$output = '<div class="alert alert w3-red">لا توجد اي نتائج</div>';
			}
			return $output;
		}		
	}
	function fetch_details_search_total_overtime($limit,$start)
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			$output = '';
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$this->db->order_by('date_action');
			$this->db->where('date_action >=', $from_date);
			$this->db->where('date_action <=', $to_date);
			$this->db->limit($limit,$start);
			$query = $this->db->get('full_labor_overtime');
			$n=1;
			$output .='
				<table  dir="rtl" class="table table-hover table-bordered table-sm">
					<thead class="thead-dark">
						<tr class="bgTable">
							<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>	
							<th scope="col">#</th>
	                        <th scope="col">التاريخ</th>
							<th scope="col">اسم الموظف</th>
							<th scope="col">المبلغ</th>
							<th scope="col">الملاحظات</th>			
							<th scope="col">تعديل</th>				
						</tr>
					</thead>
			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
					<tr>
						<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->id.'" name="id[]"></td>
						<td  align="right">'.$n.'</td>
						<td  align="right">'.$row->date_action.'</td>
						<td  align="right">'.$row->emp_full_name.'</td>
						<td  align="right">'.$row->amount.'</td>
						<td  align="right">'.$row->notes.'</td>
						<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_overtime('.$row->id.')"></a></td>
					</tr>
					';
					$n++;
				}	
				$output .='</table>';					
			}
			else
			{
				$output = '<div class="alert alert w3-red">لا توجد اي نتائج</div>';
			}
			return $output;
		}		
	}								
	function count_all_search_lent()
	{
		if ($_GET['name'])
		{
			// get number of rows
			$value = $this->input->get('name');
			$this->db->order_by('date_action');
			$this->db->like('emp_full_name',$value);
			$this->db->or_like('notes',$value);
			$this->db->or_like('date_action',$value);
			$query = $this->db->get('full_labor_lent');
			return $query->num_rows();
		}
	}	
	function count_all_search_punish()
	{
		if ($_GET['name'])
		{
			// get number of rows
			$value = $this->input->get('name');
			$this->db->order_by('date_action');
			$this->db->like('emp_full_name',$value);
			$this->db->or_like('notes',$value);
			$this->db->or_like('date_action',$value);
			$query = $this->db->get('full_labor_punish');
			return $query->num_rows();
		}
	}								
	function fetch_details_search($limit,$start)
	{
		if ($_GET['name'])
		{
			$value = $this->input->get('name');
			$output = '';
			$this->db->order_by('emp_full_name');
			$this->db->like('emp_full_name',$value);
			$this->db->or_like('mobile',$value);
			$this->db->or_like('job_title',$value);
			$this->db->or_like('finger_print',$value);
			$this->db->limit($limit,$start);
			$query = $this->db->get('employee');
			$n=1;
			$output .='
				<table  dir="rtl" class="table table-hover table-bordered table-sm">
					<thead class="thead-dark">
						<tr class="bgTable">
							<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>	
							<th scope="col">#</th>
							<th scope="col">اسم الموظف</th>
							<th scope="col">الوظيفة</th>
							<th scope="col">رقم الموبايل</th>
							<th scope="col">الاجر في الاسبوع</th>
							<th scope="col">رقم البصمة</th>
							<th scope="col">حالة العمل</th>				
							<th scope="col">تعديل</th>				
						</tr>
					</thead>
			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
					<tr>
						<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->empID.'" name="empID[]"></td>
						<td  align="right">'.$n.'</td>
						<td  align="right">'.$row->emp_full_name.'</td>
						<td  align="right">'.$row->job_title.'</td>
						<td  align="right">'.$row->mobile.'</td>
						<td  align="right">'.$row->salary_per_week.'</td>
						<td  align="right">'.$row->finger_print.'</td>
						<td  align="right">'.$row->work_status.'</td>
						<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_customer('.$row->empID.')"></a></td>				
					</tr>
					';
					$n++;
				}	
				$output .='</table>';					
			}
			else
			{
				$output = '<div class="alert alert w3-red">لم يتم العثور على اي نتائج</div>';
			}
			return $output;
		}
	}
	function fetch_details_search_fees($limit,$start)
	{
		if ($_get['name'])
		{
			$value = $this->input->get('name');
			$output = '';
			$this->db->order_by('date_action');
			$this->db->like('emp_full_name',$value);
			$this->db->or_like('notes',$value);
			$this->db->or_like('date_action',$value);
			$this->db->limit($limit,$start);
			$query = $this->db->get('full_labor_fees');
			$n=1;
			$output .='
				<table  dir="rtl" class="table table-hover table-bordered table-sm">
					<thead class="thead-dark">
						<tr class="bgTable">
							<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>	
							<th scope="col">#</th>
	                        <th scope="col">التاريخ</th>
							<th scope="col">اسم الموظف</th>
							<th scope="col">المبلغ</th>
							<th scope="col">الملاحظات</th>			
							<th scope="col">تعديل</th>				
						</tr>
					</thead>
			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
					<tr>
						<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->id.'" name="id[]"></td>
						<td  align="right">'.$n.'</td>
						<td  align="right">'.$row->date_action.'</td>
						<td  align="right">'.$row->emp_full_name.'</td>
						<td  align="right">'.$row->amount.'</td>
						<td  align="right">'.$row->notes.'</td>
						<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_fees('.$row->id.')"></a></td>
					</tr>
					';
					$n++;
				}	
				$output .='</table>';					
			}
			else
			{
				$output = '<div class="alert alert w3-red">لا توجد اي نتائج</div>';
			}
			return $output;
		}
	}	
	function fetch_details_search_lent($limit,$start)
	{
		if ($_GET['name'])
		{
			$value = $this->input->get('name');
			$output = '';
			$this->db->order_by('date_action');
			$this->db->like('emp_full_name',$value);
			$this->db->or_like('notes',$value);
			$this->db->or_like('date_action',$value);
			$this->db->limit($limit,$start);
			$query = $this->db->get('full_labor_lent');
			$n=1;
			$output .='
				<table  dir="rtl" class="table table-hover table-bordered table-sm">
					<thead class="thead-dark">
						<tr class="bgTable">
							<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>	
							<th scope="col">#</th>
	                        <th scope="col">التاريخ</th>
							<th scope="col">اسم الموظف</th>
							<th scope="col">المبلغ</th>
							<th scope="col">الملاحظات</th>			
							<th scope="col">تعديل</th>				
						</tr>
					</thead>
			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
					<tr>
						<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->id.'" name="id[]"></td>
						<td  align="right">'.$n.'</td>
						<td  align="right">'.$row->date_action.'</td>
						<td  align="right">'.$row->emp_full_name.'</td>
						<td  align="right">'.$row->amount.'</td>
						<td  align="right">'.$row->notes.'</td>
						<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_lent('.$row->id.')"></a></td>
					</tr>
					';
					$n++;
				}	
				$output .='</table>';					
			}
			else
			{
				$output = '<div class="alert alert w3-red">لا توجد اي نتائج</div>';
			}
			return $output;
		}
	}	
	function fetch_details_search_punish($limit,$start)
	{
		if ($_get['name'])
		{
			$value = $this->input->get('name');
			$output = '';
			$this->db->order_by('date_action');
			$this->db->like('emp_full_name',$value);
			$this->db->or_like('notes',$value);
			$this->db->or_like('date_action',$value);
			$this->db->limit($limit,$start);
			$query = $this->db->get('full_labor_punish');
			$n=1;
			$output .='
				<table  dir="rtl" class="table table-hover table-bordered table-sm">
					<thead class="thead-dark">
						<tr class="bgTable">
							<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>	
							<th scope="col">#</th>
	                        <th scope="col">التاريخ</th>
							<th scope="col">اسم الموظف</th>
							<th scope="col">المبلغ</th>
							<th scope="col">الملاحظات</th>			
							<th scope="col">تعديل</th>				
						</tr>
					</thead>
			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
					<tr>
						<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->id.'" name="id[]"></td>
						<td  align="right">'.$n.'</td>
						<td  align="right">'.$row->date_action.'</td>
						<td  align="right">'.$row->emp_full_name.'</td>
						<td  align="right">'.$row->amount.'</td>
						<td  align="right">'.$row->notes.'</td>
						<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_punish('.$row->id.')"></a></td>
					</tr>
					';
					$n++;
				}	
				$output .='</table>';					
			}
			else
			{
				$output = '<div class="alert alert w3-red">لا توجد اي نتائج</div>';
			}
			return $output;
		}
	}	
	function fetch_details_search_overtime($limit,$start)
	{
		if ($_GET['name'])
		{
			$value = $this->input->get('name');
			$output = '';
			$this->db->order_by('date_action');
			$this->db->like('emp_full_name',$value);
			$this->db->or_like('notes',$value);
			$this->db->or_like('date_action',$value);
			$this->db->limit($limit,$start);
			$query = $this->db->get('full_labor_overtime');
			$n=1;
			$output .='
				<table  dir="rtl" class="table table-hover table-bordered table-sm">
					<thead class="thead-dark">
						<tr class="bgTable">
							<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>	
							<th scope="col">#</th>
	                        <th scope="col">التاريخ</th>
							<th scope="col">اسم الموظف</th>
							<th scope="col">المبلغ</th>
							<th scope="col">الملاحظات</th>			
							<th scope="col">تعديل</th>				
						</tr>
					</thead>
			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
					<tr>
						<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->id.'" name="id[]"></td>
						<td  align="right">'.$n.'</td>
						<td  align="right">'.$row->date_action.'</td>
						<td  align="right">'.$row->emp_full_name.'</td>
						<td  align="right">'.$row->amount.'</td>
						<td  align="right">'.$row->notes.'</td>
						<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_overtime('.$row->id.')"></a></td>
					</tr>
					';
					$n++;
				}	
				$output .='</table>';					
			}
			else
			{
				$output = '<div class="alert alert w3-red">لا توجد اي نتائج</div>';
			}
			return $output;
		}
	}	
	function delete_more_one_employee($id)
	{
		$this->db->where('empID',$id);
		$this->db->delete('employee');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}			
	}	
	function delete_more_one_salary($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('salary');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}			
	}	
	function delete_more_one_fees($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('labor_fees');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}			
	}
	function delete_more_one_lent($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('labor_lent');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}			
	}
	function delete_more_one_punish($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('labor_punish');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}			
	}
	function delete_more_one_overtime($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('labor_overtime');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}			
	}		
}
 ?>