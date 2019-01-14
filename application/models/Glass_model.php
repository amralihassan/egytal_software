<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* Glass_model
*/
class Glass_model extends CI_model
{
	
	function __construct()
	{
		parent ::__construct();
	}
	function add_glass_project()
	{
		//adding
		if (isset($_POST['ctm_id']) && isset($_POST['project_name']) && isset($_POST['notes']))
		{
			$data = array(
				'ctm_id'=>filter_input(INPUT_POST,'ctm_id',FILTER_SANITIZE_NUMBER_INT),
				'project_name'=>filter_input(INPUT_POST,'project_name',FILTER_SANITIZE_STRING),
				'notes'=>filter_input(INPUT_POST,'notes',FILTER_SANITIZE_STRING)
			);
			$this->db->insert('glass_projects',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}
		}
		else
		{
			return false;
		}		
	}
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->order_by('id','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get('glass_projects_customername');
		$n=1;
		$output .='
			<table dir="rtl" class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
					<tr class="bgTable">				
						<th scope="col">#</th>
						<th scope="col">رقم المقايسة</th>
						<th scope="col">وقت اﻻنشاء</th>
						<th scope="col">اسم العميل</th>
						<th scope="col">اسم المشروع</th>
						<th scope="col">ملاحظات</th>
						<th scope="col">تفاصيل المقايسة</th>
						<th scope="col">تعديل</th>
						<th scope="col">حذف</th>
						<th scope="col">طباعة</th>
					</tr>
				</thead>
		';
		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$output .='
				<tr>
					<td  align="right">'.$n.'</td>
					<td  align="right">'.$row->id.'</td>
					<td  align="right">'.$row->date.'</td>
					<td  align="right">'.$row->ctm_name.'</td>
					<td  align="right">'.$row->project_name.'</td>
					<td  align="right">'.$row->notes.'</td>
					<td  align="right"><a href="#" onclick="insert_glass_project('.$row->id.')">تفاصيل المقايسة</a></td>	
					<td  align="right"><a href="#" onclick="update_glass_project('.$row->id.')">تعديل</a></td>	
					<td  align="right"><a href="#" onclick="delete_glass_project('.$row->id.')">حذف</a></td>	
					<td  align="right"><a href="#" onclick="print_glass_project('.$row->id.')">طباعة</a></td>					
				</tr>
				';
				$n++;
			}	
			$output .='</table>';					
		}
		else
		{
			$output = '<div class="alert alert w3-red">ﻻ توجد اي مقايسات زجاج</div>';
		}
		return $output;
	}	
	function fetch_details_print()
	{
		$output = '';
		$this->db->order_by('id');
		$this->db->where('id',$this->input->get('id'));
		$query = $this->db->get('print_glass_project_details');
		$n=1;
		$output .='
			<table dir="rtl" class="table table-bordered table-sm">
				<thead>
					<tr>				
						<th scope="col">#</th>
						<th scope="col">نوع الزجاج</th>
						<th scope="col">العدد</th>
						<th scope="col">العرض</th>
						<th scope="col">اﻻرتفاع</th>
					</tr>
				</thead>
		';
		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$type_glass = '';
				if ('سنجل' == $row->type)
				{
					$type_glass = "<td  align='right'>زجاج ".$row->inside_glass."</td>";
				}
				else
				{
					$type_glass = "<td  align='right'>زجاج داخلي ".$row->inside_glass.' / زجاج خارجي '.$row->outside_glass.'/ فراغ '.$row->type_space."</td>";
				}
				$output .='
				<tr>
					<td  align="right">'.$n.'</td>
					'.$type_glass.'
					<td  align="right">'.$row->count.'</td>
					<td  align="right">'.$row->width.'</td>
					<td  align="right">'.$row->height.'</td>				
				</tr>
				';
				$n++;
			}	
			$output .='</table>';					
		}
		return $output;
	}		
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('glass_projects_customername');
		return $query->num_rows();
	}	
	function delete_glass_project()
	{
		if ($_GET['id'])
		{
			$id= filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$this->db->delete('glass_projects');
			if ($this->db->affected_rows() >0) {
				return true;
			}else{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	function getdatabyid()
	{
		if ($_GET['id'])
		{
			$id = filter_var($this->input->get('id'),FILTER_SANITIZE_NUMBER_INT);
			$this->db->where('id',$id);
			$query = $this->db->get('glass_projects');
			if ($query ->num_rows()>0) {
				return $query->row();
			}else{
				return false;
			}
		}
		else
		{
			return false;
		}
	}	
	function update_glass_project()
	{
		if (isset($_POST['id_update']) && isset($_POST['ctm_id_update']) && isset($_POST['project_name_update']))
		{
			$id =filter_var($this->input->post('id_update'),FILTER_SANITIZE_NUMBER_INT);
			$data = array
			('ctm_id' => $this->input->post('ctm_id_update'),
			 'project_name' => $this->input->post('project_name_update'),
			 'notes' => $this->input->post('notes_update')
			 
			);
			$this->db->where('id',$id);
			$this->db->update('glass_projects',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}			
		}
	}	
}
 ?>