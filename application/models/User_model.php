<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* User_model
*/
class User_model extends CI_model
{
	
	function __construct()
	{
		parent ::__construct();
	}
	function count_all()
	{
		// get number of rows
		$query = $this->db->get('user');
		return $query->num_rows();
	}
	function fetch_details($limit,$start)
	{
		$output = '';
		$this->db->order_by('fullName');
		$this->db->limit($limit,$start);
		$query = $this->db->get('user');
		$n=1;
		$output .='
			<table dir="rtl" class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
					<tr class="bgTable">
						<th scope="row"><input type="checkbox" value="" name="chk_all" onchange= "checkall()"></th>					
						<th scope="row">#</th>
						<th scope="col">اسم الموظف</th>
						<th scope="col">اسم المستخدم</th>
						<th scope="col">حالة الحساب</th>
						<th scope="col">تعديل</th>
						<th scope="col">تغيير كلمة المرور</th>
						
					</tr>
				</thead>
		';
		if ($query ->num_rows()>0) {
			foreach ($query->result() as $row) 
			{
				$output .='
				<tr>
					<td  align="right"><input type="checkbox" class="chkCheckBoxId" value="'.$row->user_id.'" name="user_id[]"></td>
					<td  align="right">'.$n.'</td>
					<td  align="right">'.$row->fullName.'</td>
					<td  align="right">'.$row->username.'</td>
					<td  align="right">'.$row->status.'</td>
					<td  align="right"><a href="#" class="system-color fa fa-edit" onclick="update_user('.$row->user_id.')"></a></td>
					<td  align="right"><a href="#" class="system-color fa fa-key" onclick="change_password('.$row->user_id.')"></a></td>					
					
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
	function delete_more_one_row($id)
	{
		$this->db->where('user_id',$id);
		$this->db->delete('user');
		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}			
	}		
	function add_user()
	{
		if (isset($_POST['fullName']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['status']))
		{
			$encrypt = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			if (password_verify($this->input->post('password'),$encrypt)) {
				$data = array
				('fullName' => $this->input->post('fullName'),
				 'username' => $this->input->post('username'),
				 'password' => $encrypt,
				 'status' => $this->input->post('status')		 
				);
			}

			$this->db->insert('user',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else
			{
				return false;
			}
		}
	}
	function getdatabyid()
	{
		$id = $this->input->get('id');
		$this->db->where('user_id',$id);
		$query = $this->db->get('user');
		if ($query ->num_rows()>0) {
			return $query->row();
		}else{
			return false;
		}
	}	
	function update_user()
	{
		if (isset($_POST['fullName_update']) && isset($_POST['username_update']) && isset($_POST['status_update']) && isset($_POST['user_id_update']))
		{
			$id = $this->input->post('user_id_update');
			$data = array
			('fullName' => $this->input->post('fullName_update'),
			 'username' => $this->input->post('username_update'),
			 'status' => $this->input->post('status_update')		 
			);
			$this->db->where('user_id',$id);
			$this->db->update('user',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}
	}	
	function update_password()
	{
		if (isset($_POST['user_id_update_password']) && isset($_POST['password_update']))
		{
			$id = $this->input->post('user_id_update_password');
			$encrypt = password_hash($this->input->post('password_update'), PASSWORD_DEFAULT);
			$data = array
				('password' => $encrypt 
			);
			$this->db->where('user_id',$id);
			$this->db->update('user',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}

	}		
}
 ?>