<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Customer_model
*/
class Customer_model extends CI_model
{
	
	function __construct()
	{
		parent ::__construct();
	}
	function add_customer()
	{
		if (isset($_POST['ctm_name']) && isset($_POST['mobile']) && isset($_POST['address']))
		{
			$data = array
			('ctm_name' => $this->input->post('ctm_name'),
			 'mobile' => $this->input->post('mobile'),
			 'address' => $this->input->post('address')
			 
			);
			$this->db->insert('customer',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}	
		}
	}
	function retrive_customer()
	{
		$this->db->order_by('ctmID','desc');
		$query = $this->db->get('customer');
		return $query->result();		
	}	
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('customer');
		return $query->num_rows();
	}
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->order_by('ctmID','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get('customer');
		$n=1;
		$output .='
			<table dir="rtl" class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
					<tr class="bgTable">
						<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>					
						<th scope="col">#</th>
						<th scope="col">اسم العميل</th>
						<th scope="col">رقم الموبايل</th>
						<th scope="col">العنوان</th>
						<th scope="col">تعديل</th>
						
					</tr>
				</thead>
		';
		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$output .='
				<tr>
					<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->ctmID.'" name="ctmID[]"></td>
					<td  align="right">'.$n.'</td>
					<td  align="right">'.$row->ctm_name.'</td>
					<td  align="right">'.$row->mobile.'</td>
					<td  align="right">'.$row->address.'</td>
					<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_customer('.$row->ctmID.')"></a></td>
					
				</tr>
				';
				$n++;
			}	
			$output .='</table>';					
		}
		else
		{
			$output = '<div class="alert alert w3-red">ﻻ يوجد اي عملاء مسجلة</div>';
		}


		return $output;
	}	
	function getdatabyid()
	{
		if ($_GET['id'])
		{
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('ctmID',$id);
			$query = $this->db->get('customer');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}	
	function update_customer()
	{
		if (isset($_POST['ctmID_update']) && isset($_POST['ctm_name_update']) && isset($_POST['mobile_update']) && isset($_POST['address_update']))
		{
			$id =filter_var($this->input->post('ctmID_update'),FILTER_SANITIZE_NUMBER_INT);
			$data = array
			('ctm_name' => $this->input->post('ctm_name_update'),
			 'mobile' => $this->input->post('mobile_update'),
			 'address' => $this->input->post('address_update')
			 
			);
			$this->db->where('ctmID',$id);
			$this->db->update('customer',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}	
	function count_all_search()
	{
		if ($_GET['name'])
		{
			// get number of rows
			$value =filter_var($this->input->get('name'),FILTER_SANITIZE_STRING);
			$this->db->like('ctm_name',$value);
			$this->db->or_like('mobile',$value);
			$this->db->or_like('address',$value);
			$query = $this->db->get('customer');
			return $query->num_rows();
		}
	}	
	function fetch_details_search($limit,$start)
	{
		if ($_GET['name']) 
		{
			$value =filter_var($this->input->get('name'),FILTER_SANITIZE_STRING);
			$output = '';
			$this->db->order_by('ctm_name');
			$this->db->like('ctm_name',$value);
			$this->db->or_like('mobile',$value);
			$this->db->or_like('address',$value);
			$this->db->limit($limit,$start);
			$query = $this->db->get('customer');
			$n=1;
			$output .='
				<table dir="rtl" class="table table-hover table-bordered table-sm">
					<thead class="thead-dark">
						<tr class="bgTable">
							<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>		
							<th scope="col">#</th>
							<th scope="col">اسم العميل</th>
							<th scope="col">رقم الموبايل</th>
							<th scope="col">العنوان</th>
							<th scope="col">تعديل</th>
							
						</tr>
					</thead>
			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
						<tr>
							<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->ctmID.'" name="ctmID[]"></td>
							<td  align="right">'.$n.'</td>
							<td  align="right">'.$row->ctm_name.'</td>
							<td  align="right">'.$row->mobile.'</td>
							<td  align="right">'.$row->address.'</td>
							<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_customer('.$row->ctmID.')"></a></td>
							
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
		else
		{
			$output = '<div class="alert alert w3-red">لم يتم العثور على اي نتائج</div>';
			return $output;		
		}
	}
	function delete_more_one_customer($id)
	{
		$this->db->where('ctmID',$id);
		$this->db->delete('customer');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}			
	}		
}
 ?>