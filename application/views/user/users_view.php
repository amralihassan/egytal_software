<div class="se-pre-con"></div>
<div class="container">
	<h4>المستخدمين</h4><hr>
	  <ol class="breadcrumb">
	    <li><a href="#" onclick="loadCutomersituation();"><i class="fa fa-dashboard"></i> الرئيسية</a>&nbsp;&nbsp;</li>
	    <li class="active">المستخدمين</li>
	  </ol>
	<!-- alert -->
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-success w3-green" style="display: none;"></div>
			<div class="alert alert-danger w3-red" style="display: none;"></div>
		</div>
	</div>		  
	  <div class="row">
	  	<div class="col-md-12">
			<form action="" method="post"  id="form_user" name="frm">
				<a href="#" class="btn btn-primary" onclick="new_user();">مستخدم جديد</a>	
				<a href="#" class="btn btn-danger" onclick="delete_user();">حذف مستخدم</a>	
				<br><br>
				<!-- tables -->
				<div class="" id="user_table"></div>
				<div align="center" id="user_pagination_link"></div> 
			</form>		  		
	  	</div>
	  </div>
</div>
<!-- model new user -->
<div class="modal fade" id="model_new_user" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header model-header-style">
		        <h5 class="modal-title" id="exampleModalLongTitle"></h5>    
		    </div>			
			<div class="modal-body">
			<!-- alert -->
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-danger-model w3-red" style="display: none;"></div>
				</div>
			</div>					
				<form name="new_form" action="" method="POST" id="new_form" class="w3-container">
					<div class="row">
						<div class="col-lg-12">
							<label class="w3-text-black"><b>اسم الموظف</b></label>
							<input class="w3-input w3-border w3-light-grey" type="text" name="fullName" >
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<label class="w3-text-black"><b>اسم المستخدم</b></label>
							<input class="w3-input w3-border w3-light-grey" type="text" name="username" >
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-12">
							<label class="w3-text-black"><b>كلمة المرور</b></label>
							<input class="w3-input w3-border w3-light-grey" type="password" name="password" >
						</div>
					</div>	
					<div class="row">
						<div class="col-lg-12">
							<label class="w3-text-black"><b>تأكيد كلمة السر</b></label>
							<input class="w3-input w3-border w3-light-grey" type="password" name="passwordC" >
						</div>
					</div>					
					<div class="row">
						 <div class="col-lg-12">
		                    <label class="w3-text-black"><b>حالة الحساب</b></label>
		                    <select class="w3-select w3-border" name="status" >
		                        <option value="">-- اختر --</option> 	
		                        <option value="مفعل">مفعل</option> 	
		                        <option value="ايقاف">ايقاف</option> 	
		                    </select>						 	
						 </div>
					</div>					
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btn_save" class="w3-btn w3-green">حفظ</button>
				<button type="button" class="w3-btn w3-grey" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>
<!-- delete modal -->
<div class="modal fade" id="deleteModal" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">		
			<div class="modal-body">
				هل تريد اتمام عملية الحذف؟
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete" class="w3-btn w3-red">حذف</button>
				<button type="button" class="w3-btn w3-grey" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>
<!-- model update user -->
<div class="modal fade" id="model_update_user" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header model-header-style">
		        <h5 class="modal-title" id="exampleModalLongTitle"></h5>    
		    </div>			
			<div class="modal-body">
			<!-- alert -->
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-danger-model w3-red" style="display: none;"></div>
				</div>
			</div>					
				<form name="update_form" action="" method="POST" id="update_form">
					<div class="row">
						<div class="col-lg-12">
							<input type="text" hidden="" name="user_id_update">
							<label class="w3-text-black"><b>اسم الموظف</b></label>
							<input class="w3-input w3-border w3-light-grey" type="text" name="fullName_update" >
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<label class="w3-text-black"><b>اسم المستخدم</b></label>
							<input class="w3-input w3-border w3-light-grey" type="text" name="username_update" >
						</div>
					</div>										
					<div class="row">
						 <div class="col-lg-12">
		                    <label class="w3-text-black"><b>حالة الحساب</b></label>
		                    <select class="w3-select w3-border" name="status_update" >
		                        <option value="">-- اختر --</option> 	
		                        <option value="مفعل">مفعل</option> 	
		                        <option value="ايقاف">ايقاف</option> 	
		                    </select>						 	
						 </div>
					</div>					
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btn_update" class="w3-btn w3-green">حفظ التعديل</button>
				<button type="button" class="w3-btn w3-grey" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>
<!-- model change password -->
<div class="modal fade" id="model_change_password" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header model-header-style">
		        <h5 class="modal-title" id="exampleModalLongTitle"></h5>    
		    </div>			
			<div class="modal-body">
			<!-- alert -->
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-danger-model w3-red" style="display: none;"></div>
				</div>
			</div>					
				<form name="update_form_password" action="" method="POST" id="update_form_password">
					<input type="text" name="user_id_update_password" hidden="">						
					<div class="row">
						<div class="col-lg-12">
							<label class="w3-text-black"><b>كلمة المرور</b></label>
							<input class="w3-input w3-border w3-light-grey" type="password" name="password_update" >
						</div>
					</div>	
					<div class="row">
						<div class="col-lg-12">
							<label class="w3-text-black"><b>تأكيد كلمة السر</b></label>
							<input class="w3-input w3-border w3-light-grey" type="password" name="passwordC_update" >
						</div>
					</div>									
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btn_update_password" class="w3-btn w3-green">تحديث</button>
				<button type="button" class="w3-btn w3-grey" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function change_password(user_id) 
	{
		$('#model_change_password').modal('show');
  		$('#model_change_password').find('.modal-title').text('تغيير كلمة المرور');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>User/getdatabyid',
  			data:{id:user_id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=user_id_update_password]').val(data.user_id);
  			}
  		});  		
	}
	//saving
	$('#btn_update_password').click(function(){
		var url = '<?php echo base_url() ?>User/update_password';
		var data = $('#update_form_password').serialize();
		// validation

		var password = $('input[name=password_update]');
		var passwordC = $('input[name=passwordC_update]')
		var result = '';

		if (password.val() == '') {
			$('.alert-danger-model').html('الرجاء ادخال كلمة المرور').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			result +='1';
		}
		if (passwordC.val() == '') {
			$('.alert-danger-model').html('الرجاء ادخال تأكيد كلمة المرور').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			result +='2';
		}
		if (passwordC.val() != password.val()) {
			$('.alert-danger-model').html('تأكيد كلمة المرور ﻻ تطابق كلمة المرور').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			result +='3';
		}		

		if (result = '123') 
		{
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,//action
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#update_form_password')[0].reset();
						$('#model_change_password').modal('hide');	
						$('.alert-success').html('تمت تحديث كلمة المرور بنجاح').fadeIn().delay(2000).fadeOut('slow');
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
						load_user_data(1);
					}
				}
			});	
		}		
	});	 	
  	$('#btn_update').click(function(){
		var url = $('#update_form').attr('action'); // action
		var data = $('#update_form').serialize();
		// validation
		var fullName = $('input[name=fullName_update]');
		var username = $('input[name=username_update]');
		var status = $('select[name=status_update]');

		var result = '';		
		if (fullName.val() == '') {
			$('.alert-danger-model').html('الرجاء ادخال اسم الموظف').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			result +='1';
		}
		if (username.val() == '') {
			$('.alert-danger-model').html('الرجاء ادخال اسم المستخدم').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			result +='2';
		}		
		if (status.val() == '') {
			$('.alert-danger-model').html('الرجاء اختيار الحالة').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			result +='3';
		}	

		if (result == '123') 
		{
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {				
						$('#model_update_user').modal('hide');
						$('#update_form')[0].reset();
						$('.alert-success').html('تم التعديل بنجاح.').fadeIn().delay(2000).fadeOut('slow');
						load_user_data(1);
					}
				}
			});
		}
  	});		
	function update_user(user_id)
	{
		$('#model_update_user').modal('show');
  		$('#model_update_user').find('.modal-title').text('تعديل');
  		$('#update_form').attr('action','<?php echo base_url() ?>User/update_user');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>User/getdatabyid',
  			data:{id:user_id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=user_id_update]').val(data.user_id);
  				$('input[name=fullName_update]').val(data.fullName);
  				$('input[name=username_update]').val(data.username);
  				$('select[name=status_update]').val(data.status);
  			}
  		});
	}	
	function checkall()
	{
		var totalelements = document.forms[0].elements.length;

		for(var i=0; i<totalelements; i++)
		{
			var elementName = document.forms[0].elements[i].name;

			if (elementName!=undefined & elementName.indexOf("user_id")!= -1)
			{
				document.forms[0].elements[i].checked = document.frm.chk_all.checked;
			}
		}
	}	
	function delete_user()
	{
		var data = $('#form_user').serialize();
		if (data == "") {$('.alert-danger').html('لم يتم تحديد اي سجلات للحذف').fadeIn().delay(4000).fadeOut('slow');return;}
  		$('#deleteModal').modal('show');
  		$('#btnDelete').click(function(){
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>User/delete_more_one_row',
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('.alert-success').html('تم الحذف بنجاح').fadeIn().delay(4000).fadeOut('slow');
						$('#deleteModal').modal('hide');	
						load_user_data(1);
					}
				}
			});
  		});
	}		
	function new_user()
	{
		$('#model_new_user').modal('show');	
		$('#model_new_user').find('.modal-title').text('تسجيل مستخدم جديد');
	}	
	//saving
	$('#btn_save').click(function(){
		var url = '<?php echo base_url() ?>User/add_user';
		var data = $('#new_form').serialize();
		// validation
		var fullName = $('input[name=fullName]');
		var username = $('input[name=username]');
		var password = $('input[name=password]');
		var passwordC = $('input[name=passwordC]');
		var status = $('select[name=status]');

		var result = '';

		if (fullName.val() == '') {
			$('.alert-danger-model').html('الرجاء ادخال اسم الموظف').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			result +='1';
		}
		if (username.val() == '') {
			$('.alert-danger-model').html('الرجاء ادخال اسم المستخدم').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			result +='2';
		}
		if (password.val() == '') {
			$('.alert-danger-model').html('الرجاء ادخال كلمة المرور').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			result +='3';
		}
		if (passwordC.val() == '') {
			$('.alert-danger-model').html('الرجاء ادخال تأكيد كلمة المرور').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			result +='4';
		}
		if (passwordC.val() != password.val()) {
			$('.alert-danger-model').html('تأكيد كلمة المرور ﻻ تطابق كلمة المرور').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			result +='5';
		}		
		if (status.val() == '') {
			$('.alert-danger-model').html('الرجاء اختيار الحالة').fadeIn().delay(2000).fadeOut('slow');
			return;
		}else{
			result +='6';
		}		

		if (result = '123456') 
		{
			$.ajax({
				type:'ajax',
				method:'post',
				url:url,//action
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('#new_form')[0].reset();
						$('#model_new_user').modal('hide');	
						$('.alert-success').html('تمت الإضافة بنجاح').fadeIn().delay(2000).fadeOut('slow');
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
						load_user_data(1);
					}
				}
			});	
		}		
	});	 	
	load_user_data(1);
	function load_user_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>User/pagination/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#user_table').html(data.user_table);
				$('#user_pagination_link').html(data.user_pagination_link);
				$(".se-pre-con").fadeOut("slow");
			}
		});
	}
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_user_data(page);
	});		
</script>