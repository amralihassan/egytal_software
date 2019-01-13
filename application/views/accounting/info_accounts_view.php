<div class="se-pre-con"></div>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h4>دليل الحسابات</h4>
		</div>
		<div class="col-md-4">
			<!-- search -->
			<input class="form-control" type="search" name="txtSearch"  placeholder="بحث ..." id="id_of_textbox">				
		</div>
	</div>	
	<hr>
  <ol class="breadcrumb">
    <li><a href="#" onclick="loadCutomersituation();"><i class="fa fa-dashboard"></i> الرئيسية</a>&nbsp;&nbsp;</li>
    <li class="active">دليل الحسابات</li>
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
	    <button id="load_accounts" class="w3-bar-item w3-button tablink w3-amber  pull-right" onclick="openCity(event,'display_accounts')">دليل الحسابات</button>		
	    <button class="w3-bar-item w3-button tablink  pull-right" onclick="openCity(event,'new')">حساب جديد</button>
	</div> 	
	<!-- display accounts -->
	<div id="display_accounts" class="w3-container w3-border city">	
		<br>
		<form action="Accounting/Delete_more_one_accounts" method="post"  id="form_accounts" name="frm">
            <a href="#" class="btn btn-danger" onclick="delete_accounts();">حذف حساب</a>	
            <a href="#" class="btn btn-primary" onclick="finanicail_period();">الفترة المالية</a>	
            <br><br>
             <!-- tables -->
            <div class="table table-responsive" id="accounts_table"></div>
            <div align="center" id="accounts_pagination_link"></div> 
		</form>		
	</div>	
	<!-- new account -->
	<div id="new" class="w3-container w3-border city" style="display:none">
		<br>
		<form class="w3-container" id="form_add_account">
			<div class="row">
				 <div class="col-md-4">
		            <label><b>اسم الحساب</b></label>
		            <input class="form-control" type="text" name="acc_name">				 	
				 </div>
			</div>
			<div class="row">
				 <div class="col-md-4">
		            <label><b>الفئة</b></label>
		            <select class="form-control" name="category">
		                <option value="">اختار الفئه</option> 	
		                <option value="جاري الشركاء">جاري الشركاء</option> 	
		                <option value="البنوك والخزينة">البنوك والخزينة</option> 	                        
		                <option value="الإيرادات">الإيرادات</option> 	                        
		                <option value="المصروفات">المصروفات</option> 	
		                <option value="العملاء">العملاء</option> 	
		                <option value="الموردين">الموردين</option> 	
		            </select>  				 	
				 </div>
			</div>
			<div class="row">
				 <div class="col-md-4">
		            <label><b>طبيعة الحساب</b></label>
		            <select class="form-control" name="acc_type">
		                <option value="">طبيعة الحساب</option> 	
		                <option value="دائن">دائن</option> 	
		                <option value="مدين">مدين</option> 	
		            </select> 				 	
				 </div>
			</div>
		  	<br>
		</form>  
		  	<button class="btn btn-success" id="btn_save">حفظ</button>		
		  	<br><br>
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
				<button type="button" id="btnDelete" class="btn btn-danger">حذف</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->

<!-- update-->
<div class="modal fade" id="updateModel" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				<form method="post" action="" id="updateform">
					<input type="text" name="accID_update" hidden="">
                    <label><b>اسم الحساب</b></label>
                    <input class="form-control" type="text" name="acc_name_update">
                    <br>
                    <label><b>الفئة</b></label>
                    <select class="form-control" name="category_update">
                        <option value="">اختار الفئه</option> 	
                        <option value="جاري الشركاء">جاري الشركاء</option> 	
                        <option value="البنوك والخزينة">البنوك والخزينة</option> 	                        
                        <option value="الإيرادات">الإيرادات</option> 	                        
                        <option value="المصروفات">المصروفات</option> 	
                        <option value="العملاء">العملاء</option> 	
                        <option value="الموردين">الموردين</option> 	
                    </select>    
                    <br><br>
                    <label><b>طبيعة الحساب</b></label>
                    <select class="form-control" name="acc_type_update">
                        <option value="">طبيعة الحساب</option> 	
                        <option value="دائن">دائن</option> 	
                        <option value="مدين">مدين</option> 	
                    </select>   		
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

<!-- finicail period modal -->
<div class="modal fade" id="finanicail_Modal" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				<form action="" method="post" id="update_finicial_form">
					<div class="row">
						<div class="col-md-2 pull-right">
							<label><b>من تاريخ</b></label>				
						</div>
						<div class="col-md-4 pull-right">
							<input type="date" name="start_date" class="form-control" style="text-align: right;">
						</div>
						<div class="col-md-2 pull-right">
							<label><b>الى تاريخ</b></label>				
						</div>
						<div class="col-md-4 pull-right">
							<input type="date" name="end_date" class="form-control" style="text-align: right;">
						</div>		
					</div>						
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnUpdate_period" class="btn btn-success">تحديث</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	//update
	function update_accounts(data)
	{
		var id = data;
		$('#updateModel').modal('show');
  		$('#updateModel').find('.modal-title').text('تعديل');
  		$('#updateform').attr('action','<?php echo base_url() ?>Accounting/update_account');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Accounting/getdatabyid_account',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=accID_update]').val(data.accID);
  				$('input[name=acc_name_update]').val(data.acc_name);
  				$('select[name=category_update]').val(data.category);
  				$('select[name=acc_type_update]').val(data.acc_type);
  			}
  		});
	}	
	// update
  	$('#btnUpdate').click(function(){
  		
		var url = $('#updateform').attr('action'); // action
		var data = $('#updateform').serialize();
		// validation
		var acc_name = $('input[name=acc_name_update]');
		var category = $('select[name=category_update]');
		var acc_type = $('select[name=acc_type_update]');
		var result = '';

		if (acc_name.val() == '') {
			acc_name.parent().parent().addClass('has-error');
			return;
		}else{
			acc_name.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (category.val() == '') {
			category.parent().parent().addClass('has-error');
			return;
		}else{
			category.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (acc_type.val() == '') {
			acc_type.parent().parent().addClass('has-error');
			return;
		}else{
			acc_type.parent().parent().removeClass('has-error');
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
						$('#updateModel').modal('hide');
						$('#updateform')[0].reset();
						$('.alert-success').html('تم التعديل بنجاح.').fadeIn().delay(2000).fadeOut('slow');
						load_accounts_data(1);
					}else{
					
					}
				}
			});
		}
  	});			
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
			url:'<?php echo base_url() ?>Accounting/pagination_search_accounts/' + page,
			method:'get',
			data:{name:searchtxt.val()},
			dataType:'json',
			success:function(data){
				$('#accounts_table').html(data.accounts_table);
			}
		});
	}		
	function delete_accounts()
	{
		var data = $('#form_accounts').serialize();
		if (data == "") {alert("لم يتم تحديد اي سجلات للحذف");return;}
  		$('#deleteModal').modal('show');
  		$('#deleteModal').find('.modal-title').text('حذف');
  		$('#btnDelete').click(function(){
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>Accounting/Delete_more_one_accounts',
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('.alert-success').html('تم الحذف بنجاح').fadeIn().delay(4000).fadeOut('slow');
						$('#deleteModal').modal('hide');	
						load_accounts_data(1);

					}
				}
			});
  		});
	}	
	function finanicail_period()
	{
  		$('#finanicail_Modal').modal('show');
  		$('#finanicail_Modal').find('.modal-title').text('تحديث الفترة المالية');		
		// get current finicial period
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Accounting/get_current_finicial_period',
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=start_date]').val(data.start_date);
  				$('input[name=end_date]').val(data.end_date);
  			}
  		});		


  		$('#btnUpdate_period').click(function(){
			var data = $('#update_finicial_form').serialize();  			
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>Accounting/update_finicail_period',
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('.alert-success').html('تم تحديث الفترة المالية').fadeIn().delay(4000).fadeOut('slow');
						$('#finanicail_Modal').modal('hide');	
						

					}
				}
			});
  		});		
	}
	load_accounts_data(1);
	$('#load_accounts').click(function(){
		load_accounts_data(1);
	});
	//add new account
	$('#btn_save').click(function(){
		var url = '<?php echo base_url() ?>Accounting/add_new_account';
		var data = $('#form_add_account').serialize();
		// validation
		var acc_name = $('input[name=acc_name]');
		var category = $('select[name=category]');
		var acc_type = $('select[name=acc_type]');
		var result = '';

		if (acc_name.val() == '') {
			acc_name.parent().parent().addClass('has-error');
			return;
		}else{
			acc_name.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (category.val() == '') {
			category.parent().parent().addClass('has-error');
			return;
		}else{
			category.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (acc_type.val() == '') {
			acc_type.parent().parent().addClass('has-error');
			return;
		}else{
			acc_type.parent().parent().removeClass('has-error');
			result +='3';
		}				

		if (result == '123') 
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
						$('#form_add_account')[0].reset();
						$('.alert-success').html('تمت الإضافة بنجاح').fadeIn().delay(2000).fadeOut('slow');
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
						load_accounts_data(1);
					}

				}
			});	
		}		
	});	 	
	function checkall()
	{
		var totalelements = document.forms[0].elements.length;

		for(var i=0; i<totalelements; i++)
		{
			var elementName = document.forms[0].elements[i].name;
			if (elementName!=undefined & elementName.indexOf("accID")!= -1)
			{
				document.forms[0].elements[i].checked = document.frm.chk_all.checked;
			}
		}
	}	
	function load_accounts_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>Accounting/pagination_accounts/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#accounts_table').html(data.accounts_table);
				$('#accounts_pagination_link').html(data.accounts_pagination_link);
				$(".se-pre-con").fadeOut("slow"); 
			}
		});
	}	
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_accounts_data(page);
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
