<div class="se-pre-con"></div>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h4>الحركة اليومية</h4>
		</div>
		<div class="col-md-4">
			<!-- search -->
			<input class="form-control" type="search" name="txtSearch"  placeholder="بحث ..." id="id_of_textbox">				
		</div>
	</div>	
	<hr>
  <ol class="breadcrumb">
    <li><a href="#" onclick="loadCutomersituation();"><i class="fa fa-dashboard"></i> الرئيسية</a>&nbsp;&nbsp;</li>
    <li class="active">الحركة اليومية</li>
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
		<button class="w3-bar-item w3-button tablink w3-amber pull-right"  id="btn_display"  onclick="openCity(event,'all')">اليومية</button>
	    <button id="new_action" class="w3-bar-item w3-button tablink  pull-right" onclick="openCity(event,'new')">حركة جديدة</button>
	</div>
	<!-- page 1 -->
    <div id="all" class="w3-container w3-border city">
   		<br>
       	<div class="row">
       		<div class="col-md-12">
				<form action="" method="post"  id="form_daily_actions" name="frm_daily_actions">	
			        <a href="#" class="btn btn-danger" onclick="delete_daily_actions();">حذف حركة يومية</a>	
					<br><br>
			        <!-- tables -->
			        <div class="table table-responsive " id="daily_actions_table"></div>
				</form>       			
       		</div>
       	</div>
    </div>
    <!-- page 2 -->
    <div id="new" class="w3-container w3-border city" style="display:none">
    	<br>
		<form method="post" action="" id="new_action_form">	
			<div class="row">
				<div class="col-md-3">
					<label><b>تاريخ الحركة</b></label>
					<input type="date" name="date_action" class="form-control" style="text-align: right;">					 
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-3 pull-right">
                    <label><b>اسم الحساب</b></label>
                    <select  style="width: 100%" class="form-control select2" name="accID_to" id="accounts_name_to">
                        <option value="">اسم الحساب</option> 	
                    </select>							
				</div>
				<div class="col-md-3 pull-right">
				  	<label class="w3-text-black"><b>طبيعة العملية</b></label>
                    <select class="form-control" name="action_type_to" id="action_type_to">
                        <option value="">اختار طبيعة العملية</option> 	
                        <option value="دائن">دائن</option> 	
                        <option value="مدين">مدين</option> 	
                    </select> 						
				</div>
			</div>						
		  	<br>
		  	<div class="row">
		  		<div class="col-md-3 pull-right">
                    <label><b>اسم الحساب</b></label>
                    <select style="width: 100%" class="form-control select2" name="accID_from" id="accounts_name_from">
                        <option value="">اسم الحساب</option> 	
                    </select>					  			
		  		</div>
		  		<div class="col-md-3 pull-right">
				  	<label><b>طبيعة العملية</b></label>
                    <select class="form-control" name="action_type_from" id="action_type_from" d>
                        <option value="">اختار طبيعة العملية</option> 	
                        <option value="دائن">دائن</option> 	
                        <option value="مدين">مدين</option> 	
                    </select> 					  			
		  		</div>
		  	</div>
		  	<br>
		  	<div class="row">
		  		<div class="col-md-2 pull-right">
				  	<label><b>المبلغ</b></label>
				  	<input class="form-control" type="text" name="creditor" id="creditor_id">	
					<input class="form-control" type="text" name="debit" id="debit_id" style="display: none;">		  		
		  		</div>	
		  		<div class="col-md-10 pull-right">
		  			<label><b>البيان</b></label>
		  			<input class="form-control" type="text" name="remarks">   
		  		</div>			  						  		
		  	</div>
		</form>	  
		<br>
		<button type="button" id="btnNew" class="btn btn-success">حفظ</button>	 	
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
					<input type="text" name="id_update" hidden="">
					<label><b>تاريخ الحركة</b></label>
					<input type="date" name="date_action_update" class="form-control" style="text-align: right;">					
                    <label><b>اسم الحساب</b></label>
                    <select class="form-control" name="accID_update" id="accounts_name_update">
                        <option value="">اسم الحساب</option> 	
                    </select>
				  	<br>
				  	<label><b>طبيعة العملية</b></label>
                    <select class="form-control" name="action_type_update" id="actionType_update">
                        <option value="">اختار طبيعة العملية</option> 	
                        <option value="دائن">دائن</option> 	
                        <option value="مدين">مدين</option> 	
                    </select> 	
				  	<br>
				  	<div class="row">
				  		<div class="col-md-6 pull-right">
						  	<label><b>دائن</b></label>
						  	<input class="form-control" type="text" name="creditor_update" id="creditor_id_update">				
				  		</div>
				  		<div class="col-md-6 pull-right">
						  	<label><b>مدين</b></label>
						  	<input class="form-control" type="text" name="debit_update" id="debit_id_update">		  		
				  		</div>				  		
				  	</div>
				  	<br>
				  	<label><b>البيان</b></label>
				  	<input class="form-control" type="text" name="remarks_update">  		
				</form>	
			</div>
			<div class="modal-footer">
				<button type="button" id="btnUpdate" class="btn btn-success">حفظ التعديل</button>
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

	load_daily_action_data(1);
	//update
	function update_daily_operation(data)
	{
		var id = data;
		var accountID = "";	
		$('#updateModel').modal('show');
  		$('#updateModel').find('.modal-title').text('تعديل');
  		$('#updateform').attr('action','<?php echo base_url() ?>Accounting/update_daily_action');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Accounting/getdatabyid_daily_action',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=id_update]').val(data.id);
  				$('input[name=date_action_update]').val(data.date_action);
  				$('select[name=action_type_update]').val(data.action_type);
  				$('input[name=creditor_update]').val(data.creditor);
  				$('input[name=debit_update]').val(data.debit);
  				$('input[name=remarks_update]').val(data.remarks);
  				accountID = data.accID;  				
  			}
  		});
  		// load accounts
		$.ajax({
			type:'ajax',
			method:'get',
			data:{accid:accountID},
			url:'<?php echo base_url() ?>Accounting/retrive_accounts_by_accID',
			dataType:'json',
			success:function(data)
			{
				$('#accounts_name_update').html(data);
			}
		});  		
	}	
	// update
  	$('#btnUpdate').click(function(){
  		
		var url = $('#updateform').attr('action'); // action
		var data = $('#updateform').serialize();
		// validation
		var accID = $('select[name=accID_update]');
		var action_type = $('select[name=action_type_update]');
		var creditor = $('input[name=creditor_update]');
		var debit = $('input[name=debit_update]');
		var remarks = $('input[name=remarks_update]');
		var result = '';

		if (accID.val() == '') {
			accID.parent().parent().addClass('has-error');
			return;
		}else{
			accID.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (action_type.val() == '') {
			action_type.parent().parent().addClass('has-error');
			return;
		}else{
			action_type.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (creditor.val() == '') {
			creditor.parent().parent().addClass('has-error');
			return;
		}else{
			creditor.parent().parent().removeClass('has-error');
			result +='3';
		}		
		if (debit.val() == '') {
			debit.parent().parent().addClass('has-error');
			return;
		}else{
			debit.parent().parent().removeClass('has-error');
			result +='4';
		}			
		if (remarks.val() == '') {
			remarks.parent().parent().addClass('has-error');
			return;
		}else{
			remarks.parent().parent().removeClass('has-error');
			result +='5';
		}	
		if (result == '12345') 
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
						load_daily_action_data(1);
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
			url:'<?php echo base_url() ?>Accounting/pagination_search_accounting/' + page,
			method:'get',
			data:{name:searchtxt.val()},
			dataType:'json',
			success:function(data){
				$('#daily_actions_table').html(data.daily_actions_table);
				
			}
		});
	}	
	$('#action_type_to').on('change', function(){
		var value = $(this).val();  //set country = country_id
		
		if (value == 'دائن') // is empty
		{
			 $('select[name=action_type_from]').val("مدين");

		}
		else // is not empty
		{
 			 $('select[name=action_type_from]').val("دائن");
		}
	});
	$('#action_type_from').on('change', function(){
		var value = $(this).val();  //set country = country_id
		
		if (value == 'دائن') // is empty
		{
			 $('select[name=action_type_to').val("مدين");

		}
		else // is not empty
		{
 			 $('select[name=action_type_to]').val("دائن");
		}
	});	
	$('#creditor_id').keyup(function(event){
		var value = $(this).val(); 
		$('input[name=debit]').val(value);
	})	
	function delete_daily_actions()
	{
		var data = $('#form_daily_actions').serialize();
		if (data == "") {alert("لم يتم تحديد اي سجلات للحذف");return;}
  		$('#deleteModal').modal('show');
  		$('#deleteModal').find('.modal-title').text('حذف');
  		$('#btnDelete').click(function(){
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>Accounting/Delete_more_one_daily_actions',
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('.alert-success').html('تم الحذف بنجاح').fadeIn().delay(4000).fadeOut('slow');
						$('#deleteModal').modal('hide');	
						load_daily_action_data(1);

					}
				}
			});
  		});
	}
	$('#new_action').click(function(){
		$('#new_action_model').modal('show');	
		$('#new_action_model').find('.modal-title').text('حركة يومية جديدة');
		// retrive accounts
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Accounting/retrive_accounts',
            dataType:'json',
            success:function(data)
            {
                $('#accounts_name_to').html(data);
                $('#accounts_name_from').html(data);
            }
        }); 		
	}) 
	//saving
	$('#btnNew').click(function(){
		var url = '<?php echo base_url() ?>Accounting/add_new_action';
		var data = $('#new_action_form').serialize();
		// validation
		var accID = $('select[name=accID_to]');
		var action_type_to = $('select[name=action_type_to]');
		var action_type_from = $('select[name=action_type_from]');
		var creditor = $('input[name=creditor]');
		var debit = $('input[name=debit]');
		var remarks = $('input[name=remarks]');
		var result = '';

		if (accID.val() == '') {
			accID.parent().parent().addClass('has-error');
			return;
		}else{
			accID.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (action_type_to.val() == '') {
			action_type_to.parent().parent().addClass('has-error');
			return;
		}else{
			action_type_to.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (action_type_from.val() == '') {
			action_type_from.parent().parent().addClass('has-error');
			return;
		}else{
			action_type_from.parent().parent().removeClass('has-error');
			result +='3';
		}		
		if (creditor.val() == '') {
			creditor.parent().parent().addClass('has-error');
			return;
		}else{
			creditor.parent().parent().removeClass('has-error');
			result +='4';
		}		
		if (debit.val() == '') {
			debit.parent().parent().addClass('has-error');
			return;
		}else{
			debit.parent().parent().removeClass('has-error');
			result +='5';
		}			
		if (remarks.val() == '') {
			remarks.parent().parent().addClass('has-error');
			return;
		}else{
			remarks.parent().parent().removeClass('has-error');
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
						$('#new_action_form')[0].reset();
						$('#new_action_model').modal('hide');	
						$('.alert-success').html('تمت الإضافة بنجاح').fadeIn().delay(2000).fadeOut('slow');
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
						load_daily_action_data(1);
					}

				}
			});	
			// retrive accounts
	        $.ajax({
	            type:'ajax',
	            url:'<?php echo base_url() ?>Accounting/retrive_accounts',
	            dataType:'json',
	            success:function(data)
	            {
	                $('#accounts_name_to').html(data);
	                $('#accounts_name_from').html(data);
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

			if (elementName!=undefined & elementName.indexOf("id")!= -1)
			{
				document.forms[0].elements[i].checked = document.frm_daily_actions.chk_all.checked;
			}
		}
	}	
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
      }) 	
	function load_daily_action_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>Accounting/pagination/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#daily_actions_table').html(data.daily_actions_table);
				$('#daily_actions_pagination_link').html(data.daily_actions_pagination_link);
				$(".se-pre-con").fadeOut("slow"); 
			}
		});
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
	$("#creditor_id").ForceNumericOnly();										    		
	$("#creditor_id_update").ForceNumericOnly();										    		
	$("#debit_id").ForceNumericOnly();										    		
	$("#debit_id_update").ForceNumericOnly();										    		
	// tab
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