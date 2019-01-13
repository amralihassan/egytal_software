	<?php 
/**
 * Accounting_model
 */
class Accounting_model extends CI_model
{
	
	function __construct()
	{
		parent :: __construct();
	}
	function count_all_search_accounting()
	{
		if ($_GET['name'])
		{
			// get number of rows
			$value = filter_var($this->input->get('name'),FILTER_SANITIZE_STRING);
			$this->db->like('acc_name',$value);
			$this->db->or_like('action_type',$value);
			$this->db->or_like('remarks',$value);
			$query = $this->db->get('full_daily_action');
			return $query->num_rows();
		}
	}	
	function fetch_details_search_accounting($limit,$start)
	{
		if ($_GET['name'])
		{
			$value = filter_var($this->input->get('name'),FILTER_SANITIZE_STRING);
			$output = '';
			$this->db->order_by('id','desc');
			$this->db->like('acc_name',$value);
			$this->db->or_like('action_type',$value);
			$this->db->or_like('date_action',$value);
			$this->db->or_like('creditor',$value);
			$this->db->or_like('debit',$value);
			$this->db->or_like('remarks',$value);
			$this->db->limit($limit,$start);
			$query = $this->db->get('full_daily_action');
			$output .='
				<table  dir="rtl" class="table table-hover table-bordered table-sm">
					<thead class="thead-dark">
						<tr class="bgTable">
	                        <th><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>			
	                        <th scope="col">التاريخ</th>						
	                        <th scope="col">اسم الحساب</th>
	                        <th scope="col">الطبيعة</th>
	                        <th scope="col">الدائن</th>
	                        <th scope="col">المدين</th>                                                
	                        <th scope="col">البيان</th>                                                
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
	        				<td align="right">'.$row->date_action.'</td>
						<td  align="right">'.$row->acc_name.'</td>
						<td  align="right">'.$row->action_type.'</td>
	        				<td  align="right">'.$row->creditor.'</td>
						<td  align="right">'.$row->debit.'</td>
						<td  align="right">'.$row->remarks.'</td>                                            
						<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_daily_operation('.$row->id.')"></a></td>
						
					</tr>
					';
				}	
				$output .='</table>';					
			}
			else
			{
				$output = '<div class="alert w3-red">لا توجد اي نتائج</div>';
			}
			return $output;
		}
	}	
	function count_all_search_accounts()
	{
		if ($_GET['name'])
		{
			// get number of rows
			$value = filter_var($this->input->get('name'),FILTER_SANITIZE_STRING);
			$this->db->like('acc_name',$value);
			$this->db->or_like('category',$value);
			$this->db->or_like('acc_type',$value);
			$query = $this->db->get('accounts');
			return $query->num_rows();
		}
	}
	function delete_more_one_daily_actions($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('daily_action');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}			
	}	
	function delete_more_one_accounts($id)
	{
		$this->db->where('accID',$id);
		$this->db->delete('accounts');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}			
	}	
	function count_all()
	{
		$todayDate = date('Y.m.d'); // today date		
		$this->db->where(array('date_action'=>$todayDate));				
		// get number of rows
		$query = $this->db->get('full_daily_action');
		return $query->num_rows();
	}
	function fetch_details($limit,$start)
	{
		$todayDate = date('Y.m.d'); // today date	
		$output = '';
		$this->db->order_by('id','desc');
		//$this->db->where(array('date_action'=>$todayDate));		
		$this->db->limit($limit,$start);
		$query = $this->db->get('full_daily_action');
		$output .='
			<table  dir="rtl" class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
					<tr class="bgTable">
                        <th><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>			
                        <th scope="col">التاريخ</th>						
                        <th scope="col">اسم الحساب</th>
                        <th scope="col">الطبيعة</th>
                        <th scope="col">الدائن</th>
                        <th scope="col">المدين</th>                                                
                        <th scope="col">البيان</th>                                                
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
        				<td align="right">'.$row->date_action.'</td>
					<td  align="right">'.$row->acc_name.'</td>
					<td  align="right">'.$row->action_type.'</td>
        				<td  align="right">'.$row->creditor.'</td>
					<td  align="right">'.$row->debit.'</td>
					<td  align="right">'.$row->remarks.'</td>                                            
					<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_daily_operation('.$row->id.')"></a></td>					
				</tr>
				';
			}	
			$output .='</table>';					
		}
		else
		{
			$output = '<div class="alert w3-red">لا توجد اي نتائج</div>';
		}
		return $output;
	}	
	function retrive_accounts()
	{
		$query = $this->db->get('accounts');
		return $query->result();		
	}	
	function add_new_action()
	{
		if (isset($_POST['creditor']) && isset($_POST['debit']) && isset($_POST['action_type_to']) &&isset($_POST['accID_to']) &&isset($_POST['action_type_to']) && isset($_POST['remarks']))
		{
			$creditor=$this->input->post('creditor');
			$debit = $this->input->post('debit');
			$todayDate = $this->input->post('date_action');
			if ($todayDate == '') {
				$todayDate = date('Y.m.d'); // today date	
			}

			if ($this->input->post('action_type_to') == "دائن") {
				$debit = 0;
			}
			else
			{
				$creditor = 0;
			}

			$data = array
			('date_action' => $todayDate,
			 'accID' => $this->input->post('accID_to'),
			 'action_type' => $this->input->post('action_type_to'),
			 'creditor' => $creditor,
			 'debit' => $debit,		 
			 'userID' => $_SESSION['user_id'],
			 'remarks' => $this->input->post('remarks')
			 
			);
			$this->db->insert('daily_action',$data);

			if ($this->db->affected_rows() > 0) {
			$creditor_from=$this->input->post('creditor');
			$debit_from = $this->input->post('debit');
			
				if ($this->input->post('action_type_from') == "دائن") {
					$debit_from = 0;
				}
				else
				{
					$creditor_from = 0;
				}			
				$data = array
				('date_action' => $todayDate,
				 'accID' => $this->input->post('accID_from'),
				 'action_type' => $this->input->post('action_type_from'),
				 'creditor' => $creditor_from,
				 'debit' => $debit_from,		 
				 'userID' => 1,
				 'remarks' => $this->input->post('remarks')
				 
				);
				$this->db->insert('daily_action',$data);			


				return true;
			}else
			{
				return false;
			}	
		}		
	}
	function update_daily_action()
	{
		if (isset($_POST['id_update']) && isset($_POST['date_action_update']) && isset($_POST['accID_update']) && isset($_POST['action_type_update']) && isset($_POST['creditor_update']) && isset($_POST['debit_update']) && isset($_POST['remarks_update']))
		{
			$id = filter_var($this->input->post('id_update'),FILTER_SANITIZE_NUMBER_INT);
			$todayDate = $this->input->post('date_action_update');
			if ($todayDate == '') {
				$todayDate = date('Y.m.d'); // today date	
			}		
			$data = array
			('date_action' => $todayDate,
			 'accID' => $this->input->post('accID_update'),
			 'action_type' => $this->input->post('action_type_update'),
			 'creditor' => $this->input->post('creditor_update'),
			 'debit' => $this->input->post('debit_update'),		 
			 'userID' => 1,
			 'remarks' => $this->input->post('remarks_update')
			);
			$this->db->where('id',$id);
			$this->db->update('daily_action',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}	
		}		
	}
	function update_finicail_period()
	{
		if (isset($_POST['start_date']) && isset($_POST['end_date']))
		{
			$data = array
			('start_date' => $this->input->post('start_date'),
			 'end_date' => $this->input->post('end_date')
			);
			$this->db->update('finanicail_period',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}
		}			
	}			
	function getdatabyid_daily_action()
	{
		if ($_GET['id'])
		{
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$query = $this->db->get('daily_action');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}	
	function add_new_account()
	{
		if (isset($_POST['acc_name']) && isset($_POST['category']) && isset($_POST['acc_type']))
		{
			$data = array
			('acc_name' => $this->input->post('acc_name'),
			 'category' => $this->input->post('category'),
			 'acc_type' => $this->input->post('acc_type')
			);
			$this->db->insert('accounts',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}	
		}		
	}	
	function update_account()
	{
		if (isset($_POST['accID_update']) && isset($_POST['acc_name_update']) && isset($_POST['category_update']) && isset($_POST['acc_type_update']))
		{
			$id = filter_var($this->input->post('accID_update'),FILTER_SANITIZE_NUMBER_INT);
			$data = array
			('acc_name' => $this->input->post('acc_name_update'),
			 'category' => $this->input->post('category_update'),
			 'acc_type' => $this->input->post('acc_type_update')
			);
			$this->db->where('accID',$id);
			$this->db->update('accounts',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}	
		}
	}	
	function getdatabyid_account()
	{
		if ($_GET['id'])
		{
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('accID',$id);
			$query = $this->db->get('accounts');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}
	function get_current_finicial_period()
	{
		$this->db->limit(1);
		$query = $this->db->get('finanicail_period');
		if ($query ->num_rows()>0) {
			return $query->row();
		}else{
			return false;
		}
	}				
	function count_all_accounts()
	{
		// get number of rows
		$query = $this->db->get('accounts');
		return $query->num_rows();
	}
	function fetch_details_search_accounts($limit,$start) //-------------
	{
		if ($_GET['name'])
		{
			$value = filter_var($this->input->get('name'),FILTER_SANITIZE_STRING);
			$output = '';
			$this->db->order_by('acc_name,category');
			$this->db->like('acc_name',$value);
			$this->db->or_like('category',$value);
			$this->db->or_like('acc_type',$value);
			$this->db->limit($limit,$start);
			$query = $this->db->get('accounts');
			$output .='
				<table  dir="rtl" class="table table-hover table-bordered table-sm">
					<thead class="thead-dark">
						<tr class="bgTable">
	                        <th><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>
	                        <th scope="col">اسم الحساب</th>
	                        <th scope="col">الفئة</th>
	                        <th scope="col">طبيعة الحساب</th>
	                        <th scope="col">تعديل</th>					
						</tr>
					</thead>
			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
					<tr>
						<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->accID.'" name="accID[]"></td>
	        			<td  align="right">'.$row->acc_name.'</td>
						<td  align="right">'.$row->category.'</td>
						<td  align="right">'.$row->acc_type.'</td>                                         
						<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_accounts('.$row->accID.')"></a></td>
					</tr>
					';
				}	
				$output .='</table>';					
			}
			else
			{
				$output = '<div class="alert w3-red">لا توجد اي نتائج</div>';
			}
			return $output;
		}
	}	
	function fetch_details_accounts($limit,$start)//----------------------
	{
		$output = '';
		$this->db->order_by('acc_name,category');
		$this->db->limit($limit,$start);
		$query = $this->db->get('accounts');
		$output .='
			<table  dir="rtl" class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
					<tr class="bgTable">
                        <th><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>
                        <th scope="col">اسم الحساب</th>
                        <th scope="col">الفئة</th>
                        <th scope="col">طبيعة الحساب</th>
                        <th scope="col">تعديل</th>					
					</tr>
				</thead>
		';
		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$output .='
				<tr>
					<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->accID.'" name="accID[]"></td>
        			<td  align="right">'.$row->acc_name.'</td>
					<td  align="right">'.$row->category.'</td>
					<td  align="right">'.$row->acc_type.'</td>                                         
					<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_accounts('.$row->accID.')"></a></td>
				</tr>
				';
			}	
			$output .='</table>';					
		}
		else
		{
			$output = '<div class="alert alert w3-red">لا توجد اي نتائج</div>';
		}
		return $output;
	}	
	function count_accounts_report_search()
	{
		if ($_GET['name'] && $_GET['fDate'] && $_GET['tDate']) 
		{
			// get number of rows
			$id = filter_var($this->input->get('name'),FILTER_SANITIZE_NUMBER_INT);
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$this->db->order_by('id');
			$this->db->where('accID',$id);
			$this->db->where('date_action >=', $from_date);
			$this->db->where('date_action <=', $to_date);		
			$query = $this->db->get('daily_action');
			return $query->num_rows();
		}
	}
	function fetch_details_accounts_report_search($limit,$start)
	{
		$output = '';
		// get number of rows
		$id = $this->input->get('name');
		$from_date = $this->input->get('fDate');
		$to_date = $this->input->get('tDate');
		$this->db->order_by('date_action,id');
		$this->db->where('accID',$id);
		$this->db->where('date_action >=', $from_date);
		$this->db->where('date_action <=', $to_date);	
		$this->db->order_by('date_action');
		$this->db->limit($limit,$start);
		$query = $this->db->get('full_daily_action');

		$acc_name = $this->db->select('*')->from('accounts')->where('accID',$id)->get()->row('acc_name');	

		// total creditor
		$sql_creditor = "SELECT SUM(`creditor`) AS total FROM daily_action WHERE `accID`=". $id ." AND date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
		$creditor =  $this->db->query($sql_creditor)->row('total');	

		// total debit
		$sql_debit = "SELECT SUM(`debit`) AS total FROM daily_action WHERE `accID`=". $id ." AND date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
		$debit =  $this->db->query($sql_debit)->row('total');

		$result_creditor = '';
		$result_debit = '';
		// final creditor
		if ($creditor > $debit) 
		{
			$result_creditor = $creditor - $debit;
		}
		else
		{
			$result_creditor = 0;
		}
		// finale debit
		if ($debit > $creditor) 
		{
			$result_debit = $debit - $creditor;
		}
		else
		{
			$result_debit = 0;
		}				
		$output .='
			<table  dir="rtl" class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
					<tr class="bgTable">	
                        <th scope="col">اسم الحساب</th>	
                        <th scope="col">إجمالي المدين</th>					
                        <th scope="col">إجمالي الدائن</th>
                        <th scope="col">رصيد مدين</th> 
                        <th scope="col">رصيد دائن</th>                                                
                                                                      		
					</tr>
				</thead>
				<tr>
					<td align="right">'.$acc_name.'</td>
					<td align="right">'.$debit.'</td>
					<td align="right">'.$creditor.'</td>
					<td align="right">'.$result_debit.'</td>
					<td align="right">'.$result_creditor.'</td>
					
				</tr>
			</table>
		';
		$n=1;
		$output .='
			<table  dir="rtl" class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
					<tr class="bgTable">	
                        <th scope="col">#</th>						
                        <th scope="col">التاريخ</th>						
                        <th scope="col">الطبيعة</th>
                        <th scope="col">مدين</th>                           
                        <th scope="col">دائن</th>                                             
                        <th scope="col">البيان</th>                                                			
					</tr>
				</thead>
		';
		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$acc_name = $row->acc_name;
				$output .='
				<tr>
       				<td align="right">'.$n.'</td>
       				<td align="right">'.$row->date_action.'</td>
					<td align="right">'.$row->action_type.'</td>
					<td align="right">'.$row->debit.'</td>					
        			<td align="right">'.$row->creditor.'</td>
					<td align="right">'.$row->remarks.'</td>                                            
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
	function accounts_report_search($limit,$start)
	{
		$output = '';
		// get number of rows
		$id = $this->input->get('name');
		$from_date = $this->input->get('fDate');
		$to_date = $this->input->get('tDate');
		$this->db->order_by('date_action,id');
		$this->db->where('accID',$id);
		$this->db->where('date_action >=', $from_date);
		$this->db->where('date_action <=', $to_date);	
		$this->db->order_by('date_action');
		$this->db->limit($limit,$start);
		$query = $this->db->get('full_daily_action');

		$acc_name = $this->db->select('*')->from('accounts')->where('accID',$id)->get()->row('acc_name');	

		// total creditor
		$sql_creditor = "SELECT SUM(`creditor`) AS total FROM daily_action WHERE `accID`=". $id ." AND date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
		$creditor =  $this->db->query($sql_creditor)->row('total');	

		// total debit
		$sql_debit = "SELECT SUM(`debit`) AS total FROM daily_action WHERE `accID`=". $id ." AND date_action BETWEEN '". $from_date ."' AND '". $to_date ."'";
		$debit =  $this->db->query($sql_debit)->row('total');

		$result_creditor = '';
		$result_debit = '';
		// final creditor
		if ($creditor > $debit) 
		{
			$result_creditor = $creditor - $debit;
		}
		else
		{
			$result_creditor = 0;
		}
		// finale debit
		if ($debit > $creditor) 
		{
			$result_debit = $debit - $creditor;
		}
		else
		{
			$result_debit = 0;
		}				
		$output .='
			<table  dir="rtl" class="table table-hover table-bordered table-sm">
				<thead>
					<tr class="bgTable">	
                        <th scope="col">اسم الحساب</th>	
                        <th scope="col">إجمالي المدين</th>					
                        <th scope="col">إجمالي الدائن</th>
                        <th scope="col">رصيد مدين</th> 
                        <th scope="col">رصيد دائن</th>                                                
                                                                      		
					</tr>
				</thead>
				<tr>
					<td align="right">'.$acc_name.'</td>
					<td align="right">'.$debit.'</td>
					<td align="right">'.$creditor.'</td>
					<td align="right">'.$result_debit.'</td>
					<td align="right">'.$result_creditor.'</td>
					
				</tr>
			</table>
		';
		$n=1;
		$output .='
			<table  dir="rtl" class="table table-hover table-bordered table-sm">
				<thead>
					<tr class="bgTable">	
                        <th scope="col">#</th>						
                        <th scope="col">التاريخ</th>						
                        <th scope="col">الطبيعة</th>
                        <th scope="col">مدين</th>                           
                        <th scope="col">دائن</th>                                             
                        <th scope="col">البيان</th>                                                			
					</tr>
				</thead>
		';
		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$acc_name = $row->acc_name;
				$output .='
				<tr>
       				<td align="right">'.$n.'</td>
       				<td align="right">'.$row->date_action.'</td>
					<td align="right">'.$row->action_type.'</td>
					<td align="right">'.$row->debit.'</td>					
        			<td align="right">'.$row->creditor.'</td>
					<td align="right">'.$row->remarks.'</td>                                            
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
 ?>