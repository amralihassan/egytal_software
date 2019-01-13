<div class="se-pre-con"></div>
<div class="container">
	<h4>الخصومات</h4><hr>
	  <ol class="breadcrumb">
	    <li><a href="#" onclick="loadCutomersituation();"><i class="fa fa-dashboard"></i> الرئيسية</a>&nbsp;&nbsp;</li>
	    <li><a href="#" onclick="salary();"><i class="fa fa-dashboard"></i> المرتبات</a>&nbsp;&nbsp;</li>
	    <li class="active">الخصومات</li>
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
		<button class="w3-bar-item w3-button tablink w3-amber pull-right"  id="btn_display"  onclick="openCity(event,'all')">خصومات الموظفين</button>
	    <button class="w3-bar-item w3-button tablink  pull-right" onclick="openCity(event,'new')">تسجيل خصم جديد</button>
	</div>
  	<!-- display all customers -->
	<div id="all" class="w3-container w3-border city">
		<br>	
		<!-- search -->
		<input class="form-control" type="search" name="txtSearch"  placeholder="بحث ..." id="id_of_textbox">		
		<br>
		<div class="row">
			<div class="col-md-3 pull-right">
				<input type="date" name="from_date" class="form-control" style="text-align: right;">
			</div>
			<div class="col-md-3 pull-right">
				<input type="date" name="to_date" class="form-control" style="text-align: right;">
			</div>					
			<div class="col-md-1 pull-right">
				<a href="#" class="btn btn-warning" onclick="getTotal();">عرض</a>					
			</div>	
			<div class="col-md-5">
				<!-- search -->
				<input class="form-control" type="search" name="txtSearch"  placeholder="بحث باسم الموظف ..." id="id_of_textbox">					
			</div>		
		</div>
		<br>
		<div class="row">
			<div class="col-md-1 pull-right">
				<label><b>الاجمالي</b></label>	
			</div>
			<div class="col-md-2 pull-right"> 
				<input class="form-control" type="text" name="total" id="total">	
			</div>
		</div>		
		<br>		
		<form action="" method="post"  id="form_delete" name="frm">
			<a href="#" class="btn btn-danger" onclick="delete_punish();">حذف خصم</a>	
			<a href="#" class="btn btn-info" id="print_page">طباعة</a>			
			<br><br>	
			<!-- tables -->
			<div class="table table-responsive" id="punish_table"></div>
			<div align="center" id="punish_pagination_link"></div> 
		</form>
		<br>
	</div>
	<!-- new customer -->
	<div id="new" class="w3-container w3-border city" style="display:none">
		<br>
		<form class="w3-container" id="form_add">
			<div class="row">
				<div class="col-md-4">
				  	<label><b>اسم الموظف</b></label>
				    <select style="width: 100%" class="form-control select2" name="emp_full_name" id="emp_full_name_id">
				        <option value="">اختار اسم الموظف</option> 	
				    </select>			  						
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
				  	<label><b>التاريخ</b></label>
				  	<input class="form-control" type="date" name="date_action" style="text-align: right;">					
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
				  	<label><b>المبلغ</b></label>
				  	<input class="form-control" type="text" name="amount" id="amountID">					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				  	<label><b>ملاحظات</b></label>
				  	<input class="form-control" type="text" name="notes">    					
				</div>
			</div>					        
		  	<br>
		</form>  
		  	<button class="btn btn-success" id="btn_save">حفظ</button>		
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
					<input type="text" name="id_update" hidden="">
                    <label><b>اسم الموظف</b></label>

				    <select class="form-control" name="emp_full_name_update" id="emp_fullname_id">
				        <option value="">اختار اسم الموظف</option> 	
				    </select>	                    

                    <label><b>التاريخ</b></label>
                    <input class="form-control" type="date" name="date_action_update" style="text-align: right;">

                    <label><b>المبلغ</b></label>
                    <input class="form-control" type="text" name="amount_update" id="amount_updateID">

                    <label><b>ملاحظات</b></label>
                    <input class="form-control" type="text" name="notes_update">  			
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
			<div class="modal-header" style="background-color: #337ab7; color: white;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
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
     <!-- print -->
<script src="<?php echo base_url();?>public/dist/js/printThis.js"></script>
<script type="text/javascript">

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
  				$('input[name=from_date]').val(data.start_date);
  				$('input[name=to_date]').val(data.end_date);
				$(".se-pre-con").fadeOut("slow");   				
  			}
  		});			
	}		
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
      }) 		
	function getTotal()
	{
		var fromDate = $('input[name=from_date]').val();
		var toDate = $('input[name=to_date]').val();		
	    // get total fees
	    $.ajax({
	        type:'ajax',
	        url:'<?php echo base_url() ?>Employee/get_total_punish',
			method:'get',
			data:{fDate:fromDate,tDate:toDate},         
	        dataType:'json',
	        success:function(data)
	        {
	        	$('input[name=total]').val(data);

	        }
	    }); 
		$.ajax({
			url:'<?php echo base_url() ?>Employee/pagination_search_total_punish/' + 1,
			method:'get',
			data:{fDate:fromDate,tDate:toDate},         
			dataType:'json',
			success:function(data){
				$('#punish_table').html(data.punish_table);
				$('#punish_pagination_link').html(data.punish_pagination_link);
			}
		});	    	
	}	

	$('#print_page').click(function(){
		$('#punish_table').printThis({
			debug: false,               // show the iframe for debugging
	        importCSS: true,            // import parent page css
	        importStyle: false,         // import style tags
	        printContainer: false,       // print outer container/$.selector
	        loadCSS: "<?php echo base_url();?>public/dist/css/print.css",                // path to additional css file - use an array [] for multiple
	        pageTitle: "الخصومات",              // add title to print page
	        removeInline: false,        // remove inline styles from print elements
	        removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
	        printDelay: 333,            // variable print delay
	        header: "<h3 class='w3-center'>الخصومات</h3>",               // prefix to html
	        footer: null,               // postfix to html
	        base: false,                // preserve the BASE tag or accept a string for the URL
	        formValues: true,           // preserve input/form values
	        canvas: false,              // copy canvas content
	        doctypeString: '<!DOCTYPE html>', // enter a different doctype for older markup
	        removeScripts: false,       // remove script tags from print content
	        copyTagClasses: false,      // copy classes from the html & body tag
	        beforePrintEvent: null,     // callback function for printEvent in iframe
	        beforePrint: null,          // function called before iframe is filled
	        afterPrint: null 			
		});
	}) 
	function delete_punish()
	{
		var data = $('#form_delete').serialize();
		if (data == "") {alert("لم يتم تحديد اي سجلات للحذف");return;}
  		$('#deleteModal').modal('show');
  		$('#deleteModal').find('.modal-title').text('حذف');
  		$('#btnDelete').click(function(){
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>Employee/Delete_more_one_punish',
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('.alert-success').html('تم الحذف بنجاح').fadeIn().delay(4000).fadeOut('slow');
						$('#deleteModal').modal('hide');	
						getTotal();

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
	// search
	function searchData(page) 
	{
		// get word search
		var searchtxt = $('input[name=txtSearch]');
		$.ajax({
			url:'<?php echo base_url() ?>Employee/pagination_search_punish/' + page,
			method:'get',
			data:{name:searchtxt.val()},
			dataType:'json',
			success:function(data){
				$('#punish_table').html(data.punish_table);
				$('#punish_pagination_link').html(data.punish_pagination_link);
			}
		});
	}
	//update
	function update_punish(data)
	{
		var id = data;
		var employeeid = '';
		$('#updateModel').modal('show');
  		$('#updateModel').find('.modal-title').text('تعديل');
  		$('#updateform').attr('action','<?php echo base_url() ?>Employee/update_punish');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Employee/getdatabyid_punish',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=id_update]').val(data.id);
  				employeeid = data.empID;
  				$('input[name=date_action_update]').val(data.date_action);
  				$('input[name=amount_update]').val(data.amount);
  				$('input[name=notes_update]').val(data.notes);
  			}
  		});
  		// load employees
		$.ajax({
			type:'ajax',
			method:'get',
			data:{empid:employeeid},
			url:'<?php echo base_url() ?>Employee/retrive_employee_by_empID',
			dataType:'json',
			success:function(data)
			{
				$('#emp_fullname_id').html(data);
			}
		});    		
	}	
	// update
  	$('#btnUpdate').click(function(){
  		
		var url = $('#updateform').attr('action'); // action
		var data = $('#updateform').serialize();
		// validation
		var emp_full_name = $('select[name=emp_full_name_update]');
		var date_action = $('input[name=date_action_update]');
		var amount = $('input[name=amount_update]');
		var result = '';

		if (emp_full_name.val() == '') {
			emp_full_name.parent().parent().addClass('has-error');
			return;
		}else{
			emp_full_name.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (date_action.val() == '') {
			date_action.parent().parent().addClass('has-error');
			return;
		}else{
			date_action.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (amount.val() == '') {
			amount.parent().parent().addClass('has-error');
			return;
		}else{
			amount.parent().parent().removeClass('has-error');
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
						getTotal();
					}
				}
			});
		}
  	});	

	$('#btn_save').click(function(){
		var url = '<?php echo base_url() ?>Employee/add_punish';
		var data = $('#form_add').serialize();
		// validation
		var emp_full_name = $('select[name=emp_full_name]');
		var date_action = $('input[name=date_action]');
		var amount = $('input[name=amount]');
		var result = '';

		if (emp_full_name.val() == '') {
			emp_full_name.parent().parent().addClass('has-error');
			return;
		}else{
			emp_full_name.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (date_action.val() == '') {
			date_action.parent().parent().addClass('has-error');
			return;
		}else{
			date_action.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (amount.val() == '') {
			amount.parent().parent().addClass('has-error');
			return;
		}else{
			amount.parent().parent().removeClass('has-error');
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
						$('#form_add')[0].reset();
						$('.alert-success').html('تمت الإضافة بنجاح').fadeIn().delay(2000).fadeOut('slow');
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
						getTotal();
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
	// Numeric only control handler
	jQuery.fn.ForceNumericOnly =
	function()
	{
	    return this.each(function()
	    {
	        $(this).keydown(function(e)
	        {
	            var key = e.charCode || e.keyCode || 0;
	            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
	            // home, end, period, and numpad decimal
	            return (
	                key == 8 || 
	                key == 9 ||
	                key == 13 ||
	                key == 46 ||
	                key == 110 ||
	                key == 190 ||
	                (key >= 35 && key <= 40) ||
	                (key >= 48 && key <= 57) ||
	                (key >= 96 && key <= 105));
	        });
	    });
	};	
	$("#amountID").ForceNumericOnly();										    		
	$("#amount_updateID").ForceNumericOnly();		
</script>