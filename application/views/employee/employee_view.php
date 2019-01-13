<div class="se-pre-con"></div>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h4>الموظفين</h4>
		</div>
		<div class="col-md-4">
			<!-- search -->
			<input class="w3-input w3-border w3-light-grey" type="search" name="txtSearch"  placeholder="بحث ..." id="id_of_textbox">				
		</div>
	</div>
	<hr>
  <ol class="breadcrumb">
    <li><a href="#" onclick="loadCutomersituation();"><i class="fa fa-dashboard"></i> الرئيسية</a>&nbsp;&nbsp;</li>
    <li class="active">الموظفين</li>
  </ol>
	<!-- alert -->
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success w3-green" style="display: none;"></div>
			<div class="alert alert-danger w3-red" style="display: none;"></div>
		</div>
	</div>	

 	<!-- tab -->
	<div class="w3-bar w3-dark-grey">
		<button class="w3-bar-item w3-button tablink w3-amber pull-right"  id="btn_display"  onclick="openCity(event,'all')">الموظفين</button>
	    <button class="w3-bar-item w3-button tablink  pull-right" onclick="openCity(event,'new')">موظف جديد</button>
	</div>
  	<!-- display all customers -->
	<div id="all" class="w3-container w3-border city">
	 	<br>
		<form action="" method="post"  id="form_employee" name="frm">
			<a href="#" class="btn btn-danger" onclick="delete_employee();">حذف موظف</a>	
			<a href="#" class="btn btn-info" id="print_page">طباعة</a>	
			<br><br>
			<!-- tables -->
			<div class="table table-responsive" id="employee_table"></div>
			<div align="center" id="employee_pagination_link"></div> 
		</form>
		<br>
	</div>
	<!-- new employee -->
	<div id="new" class="w3-container w3-border city" style="display:none">
			<h4>تسجيل موظف جديد</h4>
			<div class="row">
				<div class="col-md-6">
					<form class="w3-container" id="form_add">
					  	<label><b>اسم الموظف</b></label>
					  	<input class="form-control" type="text" name="emp_full_name">

					  	<label><b>الوظيفة</b></label>
			            <select class="form-control" name="job_title">
			                <option value="">اختار الوظيفة</option> 	
			                <option value="مهندس">مهندس</option> 	
			                <option value="مسئول الحاسب الآلي">مسئول الحاسب الآلي</option> 	
			                <option value="مساعد مهندس">مساعد مهندس</option> 	
			                <option value="فني">فني</option> 	
			                <option value="مساعد فني">مساعد فني</option> 	
			                <option value="مسئول مشتريات">مسئول مشتريات</option> 	
			                <option value="لا يعمل">محاسب</option> 	
			                <option value="مسئول مخزون">مسئول مخزون</option> 	
			                <option value="عامل">عامل</option> 	
			            </select>  		  	

					  	<label><b>رقم الموبايل</b></label>
					  	<input class="form-control" type="text" name="mobile">

					  	<label><b>الاجر في الاسبوع</b></label>
					  	<input class="form-control" type="text" name="salary_per_week">

					  	<label><b>رقم البصمة</b></label>
					  	<input class="form-control" type="text" name="finger_print">

			            <label><b>حالة العمل</b></label>
			            <select class="form-control" name="work_status">
			                <option value="">اختار حالة العمل</option> 	
			                <option value="يعمل">يعمل</option> 	
			                <option value="لا يعمل">لا يعمل</option> 	
			            </select>  		  			  	
					  	<br><br>
					</form>  					
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
		  			<button class="btn btn-success" id="btn_save">حفظ</button>							
				</div>
			</div>
		  	<br><br>
  	</div>	
</div>

<!-- update-->
<div class="modal fade" id="updateModel" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white; height: 55px;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				<form method="post" action="" id="updateform">
					<input type="text" name="empID_update" hidden="">
				  	<label><b>اسم الموظف</b></label>
				  	<input class="form-control" type="text" name="emp_full_name_update">

				  	<label><b>الوظيفة</b></label>
		            <select class="form-control" name="job_title_update">
		                <option value="">اختار الوظيفة</option> 	
		                <option value="مهندس">مهندس</option> 	
		                <option value="مسئول الحاسب الآلي">مسئول الحاسب الآلي</option> 	
		                <option value="مساعد مهندس">مساعد مهندس</option> 	
		                <option value="فني">فني</option> 	
		                <option value="مساعد فني">مساعد فني</option> 	
		                <option value="مسئول مشتريات">مسئول مشتريات</option> 	
		                <option value="لا يعمل">محاسب</option> 	
		                <option value="مسئول مخزون">مسئول مخزون</option> 	
		                <option value="عامل">عامل</option> 	
		            </select>  		  	

				  	<label><b>رقم الموبايل</b></label>
				  	<input class="form-control" type="text" name="mobile_update">

				  	<label><b>الاجر في الاسبوع</b></label>
				  	<input class="form-control" type="text" name="salary_per_week_update">

				  	<label><b>رقم البصمة</b></label>
				  	<input class="form-control" type="text" name="finger_print_update">

		            <label><b>حالة العمل</b></label>
		            <select class="form-control" name="work_status_update">
		                <option value="">اختار حالة العمل</option> 	
		                <option value="يعمل">يعمل</option> 	
		                <option value="لا يعمل">لا يعمل</option> 	
		            </select>  		  			  	
				  	<br><br>		
				</form>	
			</div>
			<div class="modal-footer">
				<button type="button" id="btnUpdate" class="btn btn-success">حفظ التعديل</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>
<!-- end update-->

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
<!-- end delete modal -->

<script type="text/javascript">
	load_employee_data(1);
	function delete_employee()
	{
		var data = $('#form_employee').serialize();
		if (data == "") {alert("لم يتم تحديد اي سجلات للحذف");return;}
  		$('#deleteModal').modal('show');
  		$('#deleteModal').find('.modal-title').text('حذف');
  		$('#btnDelete').click(function(){
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>Employee/Delete_more_one_employee',
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('.alert-success').html('تم الحذف بنجاح').fadeIn().delay(4000).fadeOut('slow');
						$('#deleteModal').modal('hide');	
						load_employee_data(1);

					}
				}
			});
  		});
	}	
	function checkall()
	{
		var totalelements = document.forms[0].elements.length;

		for(var i=0; i<totalelements; i++)
		{
			var elementName = document.forms[0].elements[i].name;

			if (elementName!=undefined & elementName.indexOf("empID")!= -1)
			{
				document.forms[0].elements[i].checked = document.frm.chk_all.checked;
			}
		}
	}	
	$('#id_of_textbox').keyup(function(event){
		if (event.keyCode === 13) {
			searchData(1);
		}
	});
	// search
	function searchData(page) 
	{
		// get word search
		var searchtxt = $('input[name=txtSearch]');
		$.ajax({
			url:'<?php echo base_url() ?>Employee/pagination_search/' + page,
			method:'get',
			data:{name:searchtxt.val()},
			dataType:'json',
			success:function(data){
				$('#employee_table').html(data.employee_table);
				$('#employee_pagination_link').html(data.employee_pagination_link);
			}
		});
	}
	//update
	function update_customer(data)
	{
		var id = data;
		$('#updateModel').modal('show');
  		$('#updateModel').find('.modal-title').text('تعديل');
  		$('#updateform').attr('action','<?php echo base_url() ?>Employee/update_employee');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Employee/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=empID_update]').val(data.empID);
  				$('input[name=emp_full_name_update]').val(data.emp_full_name);
  				$('select[name=job_title_update]').val(data.job_title);
  				$('input[name=mobile_update]').val(data.mobile);
  				$('input[name=salary_per_week_update]').val(data.salary_per_week);
  				$('input[name=finger_print_update]').val(data.finger_print);
  				$('select[name=work_status_update]').val(data.work_status);  				
  			}
  		});
	}	
	// update
  	$('#btnUpdate').click(function(){
  		
		var url = $('#updateform').attr('action'); // action
		var data = $('#updateform').serialize();
		// validation
		var emp_full_name = $('input[name=emp_full_name_update]');
		var job_title = $('select[name=job_title_update]');
		var mobile = $('input[name=mobile_update]');
		var salary_per_week = $('input[name=salary_per_week_update]');
		var finger_print = $('input[name=finger_print_update]');
		var work_status = $('select[name=work_status_update]');		
		var result = '';

		if (emp_full_name.val() == '') {
			emp_full_name.parent().parent().addClass('has-error');
			return;
		}else{
			emp_full_name.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (job_title.val() == '') {
			job_title.parent().parent().addClass('has-error');
			return;
		}else{
			job_title.parent().parent().removeClass('has-error');
			result +='2';
		}		
		if (mobile.val() == '') {
			mobile.parent().parent().addClass('has-error');
			return;
		}else{
			mobile.parent().parent().removeClass('has-error');
			result +='3';
		}
		if (salary_per_week.val() == '') {
			salary_per_week.parent().parent().addClass('has-error');
			return;
		}else{
			salary_per_week.parent().parent().removeClass('has-error');
			result +='4';
		}
		if (finger_print.val() == '') {
			finger_print.parent().parent().addClass('has-error');
			return;
		}else{
			finger_print.parent().parent().removeClass('has-error');
			result +='5';
		}
		if (work_status.val() == '') {
			work_status.parent().parent().addClass('has-error');
			return;
		}else{
			work_status.parent().parent().removeClass('has-error');
			result +='6';
		}	
		if (result == '123456') 
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
						$('#updateModel').modal('hide');
						$('#updateform')[0].reset();
						$('.alert-success').html('تم التعديل بنجاح.').fadeIn().delay(2000).fadeOut('slow');
						load_employee_data(1);
					}
				}
			});
		}
  	});	

	function load_employee_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>Employee/pagination/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#employee_table').html(data.employee_table);
				$('#employee_pagination_link').html(data.employee_pagination_link);
				$(".se-pre-con").fadeOut("slow");
			}
		});
	}
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_employee_data(page);
	});	

	$('#btn_save').click(function(){
		var url = '<?php echo base_url() ?>Employee/add_employee';
		var data = $('#form_add').serialize();
		// validation
		var emp_full_name = $('input[name=emp_full_nam]');
		var job_title = $('select[name=job_titl]');
		var mobile = $('input[name=mobil]');
		var salary_per_week = $('input[name=salary_per_wee]');
		var finger_print = $('input[name=finger_prin]');
		var work_status = $('select[name=work_statu]');		
		var result = '';

		if (emp_full_name.val() == '') {
			emp_full_name.parent().parent().addClass('has-error');
			return;
		}else{
			emp_full_name.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (job_title.val() == '') {
			job_title.parent().parent().addClass('has-error');
			return;
		}else{
			job_title.parent().parent().removeClass('has-error');
			result +='2';
		}		
		if (mobile.val() == '') {
			mobile.parent().parent().addClass('has-error');
			return;
		}else{
			mobile.parent().parent().removeClass('has-error');
			result +='3';
		}
		if (salary_per_week.val() == '') {
			salary_per_week.parent().parent().addClass('has-error');
			return;
		}else{
			salary_per_week.parent().parent().removeClass('has-error');
			result +='4';
		}
		if (finger_print.val() == '') {
			finger_print.parent().parent().addClass('has-error');
			return;
		}else{
			finger_print.parent().parent().removeClass('has-error');
			result +='5';
		}
		if (work_status.val() == '') {
			work_status.parent().parent().addClass('has-error');
			return;
		}else{
			work_status.parent().parent().removeClass('has-error');
			result +='6';
		}	
		if (result == '123456') 
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
						$('#form_add')[0].reset();
						$('.alert-success').html('تمت الإضافة بنجاح').fadeIn().delay(2000).fadeOut('slow');
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
						load_employee_data(1);
					}

				}
			});	
		}		
	});	    
	//tab
	function openCity(evt, cityName) {
	  var i, x, tablinks;
	  x = document.getElementsByClassName("city");
	  for (i = 0; i < x.length; i++) {
	      x[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablink");
	  for (i = 0; i < x.length; i++) {
	      tablinks[i].className = tablinks[i].className.replace(" w3-amber", "");
	  }
	  document.getElementById(cityName).style.display = "block";
	  evt.currentTarget.className += " w3-amber";
	}
</script>
