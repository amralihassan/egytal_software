<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Vendor_model
*/
class Vendor_model extends CI_model
{
	
	function __construct()
	{
		parent ::__construct();
	}
	function add_vendor()
	{
		if (isset($_POST['ven_name']) && isset($_POST['mobile']) && isset($_POST['address']) && isset($_POST['commissioner']))
		{
			$data = array
			('ven_name' => $this->input->post('ven_name'),
			 'mobile' => $this->input->post('mobile'),
			 'address' => $this->input->post('address'),
			 'commissioner' => $this->input->post('commissioner')
			 
			);
			$this->db->insert('vendor',$data);
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
		$query = $this->db->get('vendor');
		return $query->num_rows();
	}
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->order_by('ven_name');
		$this->db->limit($limit,$start);
		$query = $this->db->get('vendor');
		$n=1;
		$output .='
			<table  dir="rtl" class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
					<tr class="bgTable">
						<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>					
						<th scope="col">#</th>
						<th scope="col">اسم المورد</th>
						<th scope="col">رقم الموبايل</th>
						<th scope="col">العنوان</th>
						<th scope="col">اسم المفوض</th>
						<th scope="col">تعديل</th>
						
					</tr>
				</thead>
		';
		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$output .='
				<tr>
					<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->venID.'" name="venID[]"></td>
					<td  align="right">'.$n.'</td>
					<td  align="right">'.$row->ven_name.'</td>
					<td  align="right">'.$row->mobile.'</td>
					<td  align="right">'.$row->address.'</td>
					<td  align="right">'.$row->commissioner.'</td>
					<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_vendor('.$row->venID.')"></a></td>
					
				</tr>
				';
				$n++;
			}	
			$output .='</table>';					
		}
		else
		{
			$output = '<div class="alert alert w3-red">ﻻ يوجد اي موردين</div>';
		}


		return $output;
	}	
	function getdatabyid()
	{
		if ($_GET['id'])
		{
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('venID',$id);
			$query = $this->db->get('vendor');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
	}	
	function update_vendor()
	{
		if (isset($_POST['venID_update']) && isset($_POST['ven_name_update']) && isset($_POST['mobile_update']) && isset($_POST['address_update']) && isset($_POST['commissioner_update']))
		{
			$id = filter_var($this->input->post('venID_update'),FILTER_SANITIZE_NUMBER_INT);
			$data = array
			('ven_name' => $this->input->post('ven_name_update'),
			 'mobile' => $this->input->post('mobile_update'),
			 'address' => $this->input->post('address_update'),
			 'commissioner' => $this->input->post('commissioner_update')
			);
			$this->db->where('venID',$id);
			$this->db->update('vendor',$data);
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
			$value = filter_var($this->input->get('name'),FILTER_SANITIZE_STRING);
			$this->db->like('ven_name',$value);
			$this->db->or_like('mobile',$value);
			$this->db->or_like('address',$value);
			$query = $this->db->get('vendor');
			return $query->num_rows();
		}
	}	
	function fetch_details_search($limit,$start)
	{
		if ($_GET['name'])
		{
			$value = filter_var($this->input->get('name'),FILTER_SANITIZE_STRING);
			$output = '';
			$this->db->order_by('ven_name');
			$this->db->like('ven_name',$value);
			$this->db->or_like('mobile',$value);
			$this->db->or_like('address',$value);
			$this->db->limit($limit,$start);
			$query = $this->db->get('vendor');
			$n=1;
			$output .='
				<table  dir="rtl" class="table table-hover table-bordered table-sm">
					<thead class="thead-dark">
						<tr class="bgTable">
							<th scope="col"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>					
							<th scope="col">#</th>
							<th scope="col">اسم المورد</th>
							<th scope="col">رقم الموبايل</th>
							<th scope="col">العنوان</th>
							<th scope="col">اسم المفوض</th>
							<th scope="col">تعديل</th>
							
						</tr>
					</thead>
			';
			if ($query ->num_rows()>0) {
				foreach ($query->result() as $row) 
				{
					$output .='
					<tr>
						<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->venID.'" name="venID[]"></td>
						<td  align="right">'.$n.'</td>
						<td  align="right">'.$row->ven_name.'</td>
						<td  align="right">'.$row->mobile.'</td>
						<td  align="right">'.$row->address.'</td>
						<td  align="right">'.$row->commissioner.'</td>
						<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_vendor('.$row->venID.')"></a></td>
						
					</tr>
					';
					$n++;
				}	
				$output .='</table>';					
			}
			else
			{
				$output = '<div class="alert alert w3-red">No results found</div>';
			}
			return $output;
		}
		else
		{
			$output = '<div class="alert alert w3-red">لم يتم العثور على اي نتائج</div>';
			return $output;			
		}

	}
	function delete_more_one_vendor($id)
	{
		$this->db->where('venID',$id);
		$this->db->delete('vendor');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}			
	}
	function retrive_vendors()
	{
		$query = $this->db->get('vendor');
		return $query->result();		
	}		
}
 ?>