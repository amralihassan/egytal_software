<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Tax_model
*/
class Tax_model extends CI_model
{
	
	function __construct()
	{
		parent ::__construct();
	}
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('full_tax');
		return $query->num_rows();
	}
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->order_by('taxID','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get('full_tax');
		$n=1;
		$output .='
			<table  dir="rtl" class="table  table-hover table-bordered table-sm">
				<thead class="thead-dark">
					<tr class="bgTable">
						<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>					
						<th scope="col">#</th>
						<th scope="col">تاريخ الفاتورة</th>
						<th scope="col">اسم المورد</th>	
						<th scope="col">رقم الفاتورة</th>											
						<th scope="col">قيمة الفاتورة</th>
						<th scope="col">قيمة الضريبة</th>
						<th scope="col">اجمالي الفاتورة</th>
						<th scope="col">تعديل</th>
					</tr>
				</thead>
		';
		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$output .='
				<tr>
					<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->taxID.'" name="taxID[]"></td>
					<td  align="right">'.$n.'</td>
					<td  align="right">'.$row->invoice_date.'</td>
					<td  align="right">'.$row->ven_name.'</td>
					<td  align="right">'.$row->invoice_number.'</td>
					<td  align="right">'.$row->invoice_amount.'</td>
					<td  align="right">'.$row->tax_amount.'</td>
					<td  align="right">'.$row->total_invoice.'</td>
					<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_tax('.$row->taxID.')"></a></td>
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
	function count_all_search()
	{
		if ($_GET['name'])
		{
			// get number of rows
			$value = $this->input->get('name');
			$this->db->like('ven_name',$value);
			$this->db->or_like('invoice_number',$value);
			$this->db->or_like('total_invoice',$value);
			$this->db->or_like('invoice_date',$value);
			$this->db->or_like('invoice_amount',$value);
			$query = $this->db->get('full_tax');
			return $query->num_rows();
		}
	}	
	function fetch_details_search($limit,$start)
	{
		if ($_GET['name'])
		{
			$value = $this->input->get('name');
			$output = '';
			$this->db->order_by('taxID','desc');
			$this->db->like('ven_name',$value);
			$this->db->or_like('invoice_number',$value);
			$this->db->or_like('total_invoice',$value);
			$this->db->or_like('invoice_date',$value);
			$this->db->or_like('invoice_amount',$value);
			$this->db->limit($limit,$start);
			$query = $this->db->get('full_tax');
			$n=1;
			$output .='
				<table  dir="rtl" class="table  table-hover table-bordered table-sm">
					<thead class="thead-dark">
						<tr class="bgTable">
							<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>					
							<th scope="col">#</th>
							<th scope="col">تاريخ الفاتورة</th>
							<th scope="col">اسم المورد</th>	
							<th scope="col">رقم الفاتورة</th>											
							<th scope="col">قيمة الفاتورة</th>
							<th scope="col">قيمة الضريبة</th>
							<th scope="col">اجمالي الفاتورة</th>
							<th scope="col">تعديل</th>
						</tr>
					</thead>
			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
					<tr>
						<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->taxID.'" name="taxID[]"></td>
						<td  align="right">'.$n.'</td>
						<td  align="right">'.$row->invoice_date.'</td>
						<td  align="right">'.$row->ven_name.'</td>
						<td  align="right">'.$row->invoice_number.'</td>
						<td  align="right">'.$row->invoice_amount.'</td>
						<td  align="right">'.$row->tax_amount.'</td>
						<td  align="right">'.$row->total_invoice.'</td>
						<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_tax('.$row->taxID.')"></a></td>
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
	function count_all_print()
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			// get number of rows
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$this->db->where('invoice_date >=', $from_date);
			$this->db->where('invoice_date <=', $to_date);	
			$query = $this->db->get('full_tax');
			return $query->num_rows();
		}
	}	
	function fetch_details_print($limit,$start)
	{
		if ($_GET['fDate'] && $_GET['tDate'])
		{
			$from_date = $this->input->get('fDate');
			$to_date = $this->input->get('tDate');
			$output = '';
			$this->db->order_by('invoice_date');
			$this->db->where('invoice_date >=', $from_date);
			$this->db->where('invoice_date <=', $to_date);	
			$this->db->limit($limit,$start);
			$query = $this->db->get('full_tax');
			$n=1;
			$output .='
				<table  dir="rtl" class="table  table-hover table-bordered">
					<thead>
						<tr class="bgTable">
							<th align="right">من تاريخ</th>
							<td align="right">'.$from_date.'</td>
							<th align="right">الى تاريخ</th>						
							<td align="right">'.$to_date.'</td>
						</tr>
					</thead>
				</table>									
			';		
			$output .='
				<table  dir="rtl" class="table  table-hover table-bordered">
					<thead>
						<tr>					
							<th>#</th>
							<th>تاريخ الفاتورة</th>
							<th>رقم الفاتورة</th>											
							<th>اسم المورد</th>						
							<th>قيمة الفاتورة</th>
							<th>قيمة الضريبة</th>
							<th>اجمالي الفاتورة</th>
						</tr>
					</thead>
			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
					<tr>
						<td  align="right">'.$n.'</td>
						<td  align="right">'.$row->invoice_date.'</td>
						<td  align="right">'.$row->invoice_number.'</td>
						<td  align="right">'.$row->ven_name.'</td>
						<td  align="right">'.$row->invoice_amount.'</td>
						<td  align="right">'.$row->tax_amount.'</td>
						<td  align="right">'.$row->total_invoice.'</td>
					</tr>
					';
					$n++;
				}	

				// total_invoice_amount
				$sql_invoice_amount = "SELECT SUM(`invoice_amount`) AS total FROM full_tax WHERE invoice_date BETWEEN '". $from_date ."' AND '". $to_date ."'";
				$total_invoice_amount = $this->db->query($sql_invoice_amount)->row('total');

				// total_tax_amount
				$sql_tax_amount = "SELECT SUM(`tax_amount`) AS total FROM full_tax WHERE invoice_date BETWEEN '". $from_date ."' AND '". $to_date ."'";
				$total_tax_amount = $this->db->query($sql_tax_amount)->row('total');									

				// final_total
				$sql_final = "SELECT SUM(`total_invoice`) AS total FROM full_tax WHERE invoice_date BETWEEN '". $from_date ."' AND '". $to_date ."'";
				$final_total = $this->db->query($sql_final)->row('total');			
				$output .='
							<tr class="bgTable">
								<th colspan="4" align="center"><b>إجمالي الفواتير</b></th>
								<td align="right"><b>'.$total_invoice_amount.'</b></td>
								<td align="right"><b>'.$total_tax_amount.'</b></td>						
								<td align="right"><b>'.$final_total.'</b></td>
							</tr>
						</thead>
					</table>									
				';
			}
			else
			{
				$output = '<div class="alert alert w3-red">لا توجد اي نتائج</div>';
			}
			return $output;
		}
	}		
	function add_tax()
	{
		if (isset($_POST['venID']) && isset($_POST['invoice_date']) && isset($_POST['invoice_amount']) && isset($_POST['tax_amount']) && isset($_POST['invoice_number']) && isset($_POST['total_invoice']))
		{
			$data = array
			('venID' => $this->input->post('venID'),
			 'invoice_date' => $this->input->post('invoice_date'),
			 'invoice_amount' => $this->input->post('invoice_amount'),
			 'tax_amount' => $this->input->post('tax_amount'),
			 'invoice_number' => $this->input->post('invoice_number'),
			 'total_invoice' => $this->input->post('total_invoice')
			);
			$this->db->insert('tax',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}
		}		
	}
	function Delete_more_one_tax($id)
	{
		$this->db->where('taxID',$id);
		$this->db->delete('tax');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}			
	}	
	function getdatabyid()
	{
		if ($_GET['id']) 
		{
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('taxID',$id);
			$query = $this->db->get('full_tax');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}
	function update_tax()
	{
		if (isset($_POST['taxID_update']) && isset($_POST['venID_update']) && isset($_POST['invoice_date_update']) && isset($_POST['invoice_amount_update']) && isset($_POST['tax_amount_update']) && isset($_POST['invoice_number_update']) && isset($_POST['total_invoice_update']))
		{
			$id = filter_var($this->input->post('taxID_update'),FILTER_SANITIZE_NUMBER_INT);
			$data = array
			('venID' => $this->input->post('venID_update'),
			 'invoice_date' => $this->input->post('invoice_date_update'),
			 'invoice_amount' => $this->input->post('invoice_amount_update'),
			 'tax_amount' => $this->input->post('tax_amount_update'),
			 'invoice_number' => $this->input->post('invoice_number_update'),		 
			 'total_invoice' => $this->input->post('total_invoice_update')
			);
			$this->db->where('taxID',$id);
			$this->db->update('tax',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}		
}
 ?>