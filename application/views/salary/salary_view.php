<div class="se-pre-con"></div>
<div class="container">
	<h4>المرتبات</h4><hr>
	  <ol class="breadcrumb">
	    <li><a href="#" onclick="loadCutomersituation();"><i class="fa fa-dashboard"></i> الرئيسية</a>&nbsp;&nbsp;</li>
	    <li class="active">المرتبات&nbsp;&nbsp;</li>
	    <li><a href="#" onclick="labour_fees();"> مصاريف العمال</a>&nbsp;&nbsp;</li>
	    <li><a href="#" onclick="punish();"> الخصومات</a>&nbsp;&nbsp;</li>
	    <li><a href="#" onclick="lent();"> السلف</a>&nbsp;&nbsp;</li>
	    <li><a href="#" onclick="overtime();"> اﻻضافي</a>&nbsp;&nbsp;</li>
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
		<button class="w3-bar-item w3-button tablink w3-amber pull-right"  id="btn_display"  onclick="openCity(event,'all')">رواتب الموظفين</button>
	    <button class="w3-bar-item w3-button tablink  pull-right" onclick="openCity(event,'new')">تسجيل راتب موظف</button>
		<button class="w3-bar-item w3-button tablink  pull-right" onclick="openCity(event,'print_salary')">طباعة رواتب الموظفين</button>	    
	</div>
  	<!-- display all customers -->
	<div id="all" class="w3-container w3-border city">
		<br>	
			<div class="row">
				<div class="col-md-3 pull-right">
					<input type="date" name="from_date_find" class="form-control" style="text-align: right;">
				</div>
				<div class="col-md-3 pull-right">
					<input type="date" name="to_date_find" class="form-control" style="text-align: right;">
				</div>
				<div class="col-md-1 pull-right">
					<a href="#" class="btn btn-warning" id="view">عرض</a>					
				</div>			
			</div>	
		<br>	
		<form action="Employee/Delete_more_one_salary" method="post"  id="form_delete" name="frm">
			<a href="#" class="btn btn-success" onclick="salary_period();">تعديل فترة الراتب</a>			
			<a href="#" class="btn btn-danger" onclick="delete_salary();">حذف راتب</a>	
			<a href="#" class="btn btn-info" id="print_page">طباعة</a>
			<br><br>
			<!-- tables -->
			<div class="table table-responsive " id="salary_table"></div>
			<div align="center" id="salary_pagination_link"></div> 
		</form>
		<br>

	</div>
	<!-- new salary -->
	<div id="new" class="w3-container w3-border city" style="display:none">
		<br>
		<form class="w3-container" id="form_add">
			<div class="row">
				<div class="col-md-4 pull-right">
					<label><b>اسم الموظف</b></label>	
				    <select style="width: 100%" class="form-control select2" name="emp_full_name" id="emp_full_name_id" onchange="get_employee_data();">
				        <option value="">اختار اسم الموظف</option> 	
				    </select>						
				</div>
				<div class="col-md-2">
					<label><b>عدد الفترات / اﻻسبوع</b></label>					
					<input type="text" name="count_period" class="form-control" id="period_id">
				</div>				
				<div class="col-md-3 pull-right">
					<label><b>تاريخ استحقاق الراتب</b></label>
					<input type="date" name="date_action" class="form-control" style="text-align: right;">
				</div>				
			</div>		
			<br>				
			<div class="row">
				<div class="col-md-3 pull-right">
					<label><b>من تاريخ</b></label>	
					<input type="date" name="from_date" class="form-control" style="text-align: right;">
				</div>
				<div class="col-md-3 pull-right">
					<label><b>الى تاريخ</b></label>		
					<input type="date" name="to_date" class="form-control" style="text-align: right;">
				</div>						
			</div>				
		    <br>	  	
			<div class="row">
				<div class="col-md-2 pull-right">
					<a><b>المرتب</b></a>					  	
				  	<input class="form-control" type="text" name="cash" id="cash">	  		
				</div>				
				<div class="col-md-2 pull-right">
					<a href="#" onclick="show_fees();"><b>المصاريف</b></a>
				  	<input class="form-control" type="text" name="fees" id="fees">	
				</div>
				<div class="col-md-2 pull-right">
					<a href="#"  onclick="show_punish();"><b>الخصومات</b></a>				  	
				  	<input class="form-control" type="text" name="punish" id="punish">		
				</div>
				<div class="col-md-2 pull-right">
					<a href="#"  onclick="show_lent();"><b>السلف</b></a>					  	
				  	<input class="form-control" type="text" name="lent" id="lent">			
				</div>
				<div class="col-md-2 pull-right">
					<a href="#" onclick="show_overtime();"><b>الإضافي</b></a>					  	
				  	<input class="form-control" type="text" name="overtime" id="overtime">		
				</div>			
				<div class="col-md-2 pull-right">
					<a><b>إجمالي المستحق</b></a>				  	
				  	<input class="form-control" type="text" name="total" id="total">			
				</div>	
			</div>           
		  	<label><b>ملاحظات</b></label>
		  	<input class="form-control" type="text" name="notes">                        
		  	<br>
		</form>  
	  	<button class="btn btn-success" id="btn_save">حفظ</button>		
	  	<br><br>
  	</div>
  	<!-- print salary for employee -->
  	<div id="print_salary" class="w3-container w3-border city" style="display: none;">
		<br> 
		<!-- search -->
		<div class="w3-card-4 w3-container">
			<br>	
			<div class="row">
				<div class="col-md-3 pull-right">
					<input type="date" name="from_date_print" class="form-control" style="text-align: right;">
				</div>

				<div class="col-md-3 pull-right">
					<input type="date" name="to_date_print" class="form-control" style="text-align: right;">
				</div>					
				<div class="col-md-3 pull-right">
					<a href="#" class="btn btn-warning" id="view_print">عرض</a>	
					<a href="#" class="btn btn-info" id="print_salary_each_employee">طباعة</a>					
				</div>							
			</div>
			<br>		
		</div>		
		<br>
		<!-- tables -->
		<div class="table table-responsive " id="salary_table_print"></div>
		<br>
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
				<button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->
<!-- finicail period modal -->
<div class="modal fade" id="salary_Modal" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				<form action="" method="post" id="update_salary_form">
					<div class="row">
						<div class="col-lg-2 pull-right">
							<label><b>من تاريخ</b></label>				
						</div>
						<div class="col-lg-4 pull-right">
							<input type="date" name="start_date_add" class="form-control" style="text-align: right;">
						</div>
						<div class="col-lg-2 pull-right">
							<label><b>الى تاريخ</b></label>				
						</div>
						<div class="col-lg-4 pull-right">
							<input type="date" name="end_date_add" class="form-control" style="text-align: right;">
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
<!-- show fees model -->
<div class="modal fade" id="show_fees_model" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document" >
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
					<div class="table table-responsive"  id="show_fees_table">	
					</div>
			</div>
			<div class="modal-footer">				
				<button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>
<!-- show punish model -->
<div class="modal fade" id="show_punish_model" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document" >
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
					<div class="table table-responsive"  id="show_punish_table">	
					</div>
			</div>
			<div class="modal-footer">				
				<button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>
<!-- show lent model -->
<div class="modal fade" id="show_lent_model" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document" >
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
					<div class="table table-responsive"  id="show_lent_table">	
					</div>
			</div>
			<div class="modal-footer">				
				<button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>
<!-- show overtime model -->
<div class="modal fade" id="show_overtime_model" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document" >
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
					<div class="table table-responsive"  id="show_overtime_table">	
					</div>
			</div>
			<div class="modal-footer">				
				<button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
      }) 		

	function show_fees()
	{
		var searchtxt = $('select[name=emp_full_name]').val();
		var fromDate = $('input[name=from_date]').val();
		var toDate = $('input[name=to_date]').val();		
		if (searchtxt == '')
		{
			$('.alert-danger').html('لم يتم تحديد الموظف').fadeIn().delay(2000).fadeOut('slow');
			return;
		}
		$('#show_fees_model').modal('show');
  		$('#show_fees_model').find('.modal-title').text('المصاريف')		
		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Employee/getdata_fees_employee',
  			data:{id:searchtxt,fDate:fromDate,tDate:toDate},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('#show_fees_table').html(data);
  			}
  		});			
	}
	function show_punish()
	{
		var searchtxt = $('select[name=emp_full_name]').val();
		var fromDate = $('input[name=from_date]').val();
		var toDate = $('input[name=to_date]').val();		
		if (searchtxt == '')
		{
			$('.alert-danger').html('لم يتم تحديد الموظف').fadeIn().delay(2000).fadeOut('slow');
			return;
		}
		$('#show_punish_model').modal('show');
  		$('#show_punish_model').find('.modal-title').text('الخصومات')		
		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Employee/getdata_punish_employee',
  			data:{id:searchtxt,fDate:fromDate,tDate:toDate},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('#show_punish_table').html(data);
  			}
  		});			
	}
	function show_lent()
	{
		var searchtxt = $('select[name=emp_full_name]').val();
		var fromDate = $('input[name=from_date]').val();
		var toDate = $('input[name=to_date]').val();		
		if (searchtxt == '')
		{
			$('.alert-danger').html('لم يتم تحديد الموظف').fadeIn().delay(2000).fadeOut('slow');
			return;
		}
		$('#show_lent_model').modal('show');
  		$('#show_lent_model').find('.modal-title').text('السلف');
		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Employee/getdata_lent_employee',
  			data:{id:searchtxt,fDate:fromDate,tDate:toDate},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('#show_lent_table').html(data);
  			}
  		});			
	}	
	function show_overtime()
	{
		var searchtxt = $('select[name=emp_full_name]').val();
		var fromDate = $('input[name=from_date]').val();
		var toDate = $('input[name=to_date]').val();		
		if (searchtxt == '')
		{
			$('.alert-danger').html('لم يتم تحديد الموظف').fadeIn().delay(2000).fadeOut('slow');
			return;
		}
		$('#show_overtime_model').modal('show');
  		$('#show_overtime_model').find('.modal-title').text('الاضافي');	
		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Employee/getdata_overtime_employee',
  			data:{id:searchtxt,fDate:fromDate,tDate:toDate},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('#show_overtime_table').html(data);
  			}
  		});			
	}		

	$('#view').click(function(){
		searchData(1); 
	})
	// search
	function searchData(page) 
	{
		// get word search
		var fromDate = $('input[name=from_date_find]').val();
		var toDate = $('input[name=to_date_find]').val();	
		$.ajax({
			url:'<?php echo base_url() ?>Employee/pagination_search_salary/' + page,
			method:'get',
			data:{fDate:fromDate,tDate:toDate},  
			dataType:'json',
			success:function(data){
				$('#salary_table').html(data.salary_table);
				$('#salary_pagination_link').html(data.salary_pagination_link);
			}
		});
	}
	$('#view_print').click(function(){
		// get word search
		var fromDate = $('input[name=from_date_print]').val();
		var toDate = $('input[name=to_date_print]').val();	
		$.ajax({
			url:'<?php echo base_url() ?>Employee/pagination_search_salary_each_emplyee/' + 1,
			method:'get',
			data:{fDate:fromDate,tDate:toDate},  
			dataType:'json',
			success:function(data){
				$('#salary_table_print').html(data.salary_table);
			}
		});
	})	
	// get salary period
	get_salary_period();
	function get_salary_period()
	{
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Employee/get_current_salary_period',
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=from_date_find]').val(data.start_date);
  				$('input[name=to_date_find]').val(data.end_date);
  				$('input[name=from_date]').val(data.start_date);
  				$('input[name=to_date]').val(data.end_date);
  				$('input[name=from_date_print]').val(data.start_date);
  				$('input[name=to_date_print]').val(data.end_date);  				
  				$('input[name=date_action]').val(data.end_date);
				$(".se-pre-con").fadeOut("slow");  				
  			}
  		});			
	}	
	function salary_period()
	{

  		$('#salary_Modal').modal('show');
  		$('#salary_Modal').find('.modal-title').text('تحديث الفترة المالية');		
		// get current finicial period
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Employee/get_current_salary_period',
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=start_date_add]').val(data.start_date);
  				$('input[name=end_date_add]').val(data.end_date);
  			}
  		});		


  		$('#btnUpdate_period').click(function(){
			var data = $('#update_salary_form').serialize();  			
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>Employee/update_salary_period',
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('.alert-success').html('تم تحديث فترة الراتب').fadeIn().delay(4000).fadeOut('slow');
						$('#salary_Modal').modal('hide');	
						get_salary_period();
					}
				}
			});
  		});		
	}
	function calc()
	{
		var cash = $('input[name=cash]').val() * 1;
		var fees = $('input[name=fees]').val() * 1;
		var punish = $('input[name=punish]').val() * 1;
		var lent = $('input[name=lent]').val() * 1;
		var overtime = $('input[name=overtime]').val() * 1;

		var total = cash + overtime - fees - punish - lent;

		$('#total').val(total) ;		
	}	
	$('#cash').keyup(function(event){
		calc();
	})
	$('#fees').keyup(function(event){
		calc();
	})
	$('#punish').keyup(function(event){
		calc();
	})
	$('#lent').keyup(function(event){
		calc();
	})
	$('#overtime').keyup(function(event){
		calc();
	})		
	$('#period_id').keyup(function(event){

		var searchtxt = $('select[name=emp_full_name]').val();
		// get total cash
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Employee/get_cash',
			method:'get',
			data:{name:searchtxt},         
            dataType:'json',
            success:function(data)
            {
                var cash = data;
				var period = $('input[name=count_period]').val() * 1;
				var total = cash * period;
				$('#cash').val(total) ;	
				calc();                
            }
        }); 

	})				
	function get_employee_data()
	{

		var searchtxt = $('select[name=emp_full_name]').val();
		var fromDate = $('input[name=from_date]').val();
		var toDate = $('input[name=to_date]').val();		

		if (searchtxt == '') {
			alert("من فضلك اختار اسم الموظف");
			return;
		}
		if (fromDate == '') {
			alert("لم يتم تحديد الفترة")
			return;
		}
		if (toDate == 'لم يتم تحديد الفترة') {
			alert("")
			return;
		}			
		// get total cash
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Employee/get_cash',
			method:'get',
			data:{name:searchtxt},         
            dataType:'json',
            success:function(data)
            {
                $('input[name=cash]').val(data);
            }
        }); 
        // get total fees
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Employee/get_fees',
			method:'get',
			data:{name:searchtxt,fDate:fromDate,tDate:toDate},         
            dataType:'json',
            success:function(data)
            {
            	if (data == null)
            	{
            		$('input[name=fees]').val(0);
            	}
            	else
            	{
            		$('input[name=fees]').val(data);
            	}
            }
        });         
        // get total lent
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Employee/get_lent',
			method:'get',
			data:{name:searchtxt,fDate:fromDate,tDate:toDate},         
            dataType:'json',
            success:function(data)
            {
            	if (data == null)
            	{
            		$('input[name=lent]').val(0);
            	}
            	else
            	{
            		$('input[name=lent]').val(data);
            	}

            }
        });         
        // get total punish
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Employee/get_punish',
			method:'get',
			data:{name:searchtxt,fDate:fromDate,tDate:toDate},         
            dataType:'json',
            success:function(data)
            {
            	if (data == null)
            	{
            		$('input[name=punish]').val(0);
            	}
            	else
            	{
            		$('input[name=punish]').val(data);
            	}
            }
        });         
        // get total overtime
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Employee/get_overtime',
			method:'get',
			data:{name:searchtxt,fDate:fromDate,tDate:toDate},         
            dataType:'json',
            success:function(data)
            {
            	if (data == null)
            	{
            		$('input[name=overtime]').val(0);
            	}
            	else
            	{
            		$('input[name=overtime]').val(data);
            	}
            }
        });   
        // get total
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Employee/get_total',
			method:'get',
			data:{name:searchtxt,fDate:fromDate,tDate:toDate},         
            dataType:'json',
            success:function(data)
            {
                $('input[name=total]').val(data);
            }
        });              
	}

	function delete_salary()
	{
		var data = $('#form_delete').serialize();
		if (data == "") {$('.alert-danger').html('لم يتم تحديد سجلات للحذف').fadeIn().delay(4000).fadeOut('slow');return;}
  		$('#deleteModal').modal('show');
  		$('#deleteModal').find('.modal-title').text('حذف');
  		$('#btnDelete').click(function(){
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>Employee/Delete_more_one_salary',
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('.alert-success').html('تم الحذف بنجاح').fadeIn().delay(4000).fadeOut('slow');
						$('#deleteModal').modal('hide');	
						load_salary_data(1);

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

			if (elementName!=undefined & elementName.indexOf("id")!= -1)
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

	function load_salary_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>Employee/pagination_salary/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#salary_table').html(data.salary_table);
				$('#salary_pagination_link').html(data.salary_pagination_link);
			}
		});
	}
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_salary_data(page);
	});	

	$('#btn_save').click(function(){
		var url = '<?php echo base_url() ?>Employee/add_salary';
		var data = $('#form_add').serialize();
		// validation
		var emp_full_name = $('select[name=emp_full_name]');
		var fees = $('input[name=fees]');
		var punish = $('input[name=punish]');		
		var lent = $('input[name=lent]');		
		var overtime = $('input[name=overtime]');						
		var total = $('input[name=total]');								
		var result = '';
		
		if (emp_full_name.val() == '') {
			emp_full_name.parent().parent().addClass('has-error');
			return;
		}else{
			emp_full_name.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (fees.val() == '') {
			fees.parent().parent().addClass('has-error');
			return;
		}else{
			fees.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (punish.val() == '') {
			punish.parent().parent().addClass('has-error');
			return;
		}else{
			punish.parent().parent().removeClass('has-error');
			result +='3';
		}	
		if (lent.val() == '') {
			lent.parent().parent().addClass('has-error');
			return;
		}else{
			lent.parent().parent().removeClass('has-error');
			result +='4';
		}
		if (overtime.val() == '') {
			overtime.parent().parent().addClass('has-error');
			return;
		}else{
			overtime.parent().parent().removeClass('has-error');
			result +='5';
		}
		if (total.val() == '') {
			total.parent().parent().addClass('has-error');
			return;
		}else{
			total.parent().parent().removeClass('has-error');
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
						load_salary_data(1);
						get_salary_period();
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