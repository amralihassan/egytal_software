<div class="se-pre-con"></div>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h4>العملاء</h4>
		</div>
		<div class="col-md-4">
			<!-- search -->
			<input class="w3-input w3-border w3-light-grey" type="search" name="txtSearch"  placeholder="بحث ..." id="id_of_textbox">				
		</div>
	</div>
	<hr>
  <ol class="breadcrumb">
    <li><a href="#" onclick="loadCutomersituation();"><i class="fa fa-dashboard"></i> الرئيسية</a>&nbsp;&nbsp;</li>
    <li class="active">العملاء</li>
  </ol>
	<!-- alert -->
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success w3-green" style="display: none;"></div>
			<div class="alert alert-danger w3-red" style="display: none;"></div>
		</div>
	</div>	
	<br>
	<form action="" method="post"  id="form_customer" name="frm">
		<div class="row">
			 <div class="col-md-12">
				<a href="#" class="btn btn-primary" onclick="new_customer();">عميل جديد</a>	
				<a href="#" class="btn btn-danger" onclick="delete_customer();">حذف عميل</a>				 	
			 </div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<!-- tables -->
				<div class="table table-responsive" id="customers_table"></div>
				<div align="center" id="customers_pagination_link"></div> 				
			</div>
		</div>
	</form>		  
</div>
<!-- new -->
<div class="modal fade" id="model_new_customer" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header model-header-style">
		        <h5 class="modal-title" id="exampleModalLongTitle"></h5>    
		    </div>			
			<div class="modal-body">
				<!-- alert -->
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-danger-model w3-red" style="display: none;"></div>
					</div>
				</div>					
				<form class="w3-container" id="form_add">
				  	<label class="w3-text-black"><b>اسم العميل</b></label>
				  	<input class="w3-input w3-border w3-light-grey" type="text" name="ctm_name">

				  	<label class="w3-text-black"><b>رقم الموبايل</b></label>
				  	<input class="w3-input w3-border w3-light-grey" type="text" name="mobile" id="ctm_mob">

				  	<label class="w3-text-black"><b>العنوان</b></label>
				  	<input class="w3-input w3-border w3-light-grey" type="text" name="address">
				  	<br>
				</form>  
			</div>
			<div class="modal-footer">
				<button type="button" id="btn_save" class="w3-btn w3-green">حفظ</button>
				<button type="button" class="w3-btn w3-grey" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>
<!-- update-->
<div class="modal fade" id="updateModel_customer" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header model-header-style">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				<form method="post" action="" id="updateform_customer">
					<input type="text" name="ctmID_update" hidden="">
				  	<label class="w3-text-black"><b>اسم العميل</b></label>
				  	<input class="w3-input w3-border w3-light-grey" type="text" name="ctm_name_update">

				  	<label class="w3-text-black"><b>رقم الموبايل</b></label>
				  	<input class="w3-input w3-border w3-light-grey" type="text" name="mobile_update" id="ctm_mob_update">

				  	<label class="w3-text-black"><b>العنوان</b></label>
				  	<input class="w3-input w3-border w3-light-grey" type="text" name="address_update">	
								
				</form>	
			</div>
			<div class="modal-footer">
				<button type="button" id="btnUpdate" class="w3-btn w3-green">حفظ التعديل</button>
				<button type="button" class="w3-btn w3-grey" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>

<!-- delete modal -->
<div class="modal fade" id="deleteModal_customer" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">		
			<div class="modal-body">
				هل تريد اتمام عملية الحذف؟
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete_customer" class="w3-btn w3-red">حذف</button>
				<button type="button" class="w3-btn w3-grey" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->
     <!-- print -->

<script type="text/javascript">
	function new_customer()
	{
		$('#model_new_customer').modal('show');	
		$('#model_new_customer').find('.modal-title').text('تسجيل عميل جديد');
	}		
	function delete_customer()
	{
		var data = $('#form_customer').serialize();
		if (data == "") {$('.alert-danger').html('لم يتم تحديد اي سجلات للحذف').fadeIn().delay(4000).fadeOut('slow');return;}
  		$('#deleteModal_customer').modal('show');
  		$('#btnDelete_customer').click(function(){
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>Customer/Delete_more_one_customer',
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('.alert-success').html('تم الحذف بنجاح').fadeIn().delay(4000).fadeOut('slow');
						$('#deleteModal_customer').modal('hide');	
						load_customers_data(1);

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

			if (elementName!=undefined & elementName.indexOf("ctmID")!= -1)
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
			url:'<?php echo base_url() ?>Customer/pagination_search/' + page,
			method:'get',
			data:{name:searchtxt.val()},
			dataType:'json',
			success:function(data){
				$('#customers_table').html(data.customers_table);
				$('#customers_pagination_link').html(data.customers_pagination_link);
			}
		});
	}
	//update
	function update_customer(data)
	{
		var id = data;
		$('#updateModel_customer').modal('show');
  		$('#updateModel_customer').find('.modal-title').text('تعديل');
  		$('#updateform_customer').attr('action','<?php echo base_url() ?>Customer/update_customer');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Customer/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=ctmID_update]').val(data.ctmID);
  				$('input[name=ctm_name_update]').val(data.ctm_name);
  				$('input[name=mobile_update]').val(data.mobile);
  				$('input[name=address_update]').val(data.address);
  			}
  		});
	}	
	// update
  	$('#btnUpdate').click(function(){
  		
		var url = $('#updateform_customer').attr('action'); // action
		var data = $('#updateform_customer').serialize();
		// validation
		var ctm_name = $('input[name=ctm_name_update]');
		var mobile = $('input[name=mobile_update]');
		var address = $('input[name=address_update]');
		var result = '';

		if (ctm_name.val() == '') {
			ctm_name.parent().parent().addClass('has-error');
			return;
		}else{
			ctm_name.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (mobile.val() == '') {
			mobile.parent().parent().addClass('has-error');
			return;
		}else{
			mobile.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (address.val() == '') {
			address.parent().parent().addClass('has-error');
			return;
		}else{
			address.parent().parent().removeClass('has-error');
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
						
						$('#updateModel_customer').modal('hide');
						$('#updateform_customer')[0].reset();
						$('.alert-success').html('تم التعديل بنجاح.').fadeIn().delay(2000).fadeOut('slow');
						load_customers_data(1);
					}else{
					
					}
				}
			});
		}
  	});	
	load_customers_data(1);
	function load_customers_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>Customer/pagination/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#customers_table').html(data.customers_table);
				$('#customers_pagination_link').html(data.customers_pagination_link);
				$(".se-pre-con").fadeOut("slow");
			}
		});
	}
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_customers_data(page);
	});	

	$('#btn_save').click(function(){
		var url = '<?php echo base_url() ?>Customer/add_customer';
		var data = $('#form_add').serialize();
		// validation
		var ctm_name = $('input[name=ctm_name]');
		var mobile = $('input[name=mobile]');
		var address = $('input[name=address]');
		var result = '';

		if (ctm_name.val() == '') {
			ctm_name.parent().parent().addClass('has-error');
			return;
		}else{
			ctm_name.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (mobile.val() == '') {
			mobile.parent().parent().addClass('has-error');
			return;
		}else{
			mobile.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (address.val() == '') {
			address.parent().parent().addClass('has-error');
			return;
		}else{
			address.parent().parent().removeClass('has-error');
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
						$('#model_new_customer').modal('hide');	
						$('.alert-success').html('تمت الإضافة بنجاح').fadeIn().delay(2000).fadeOut('slow');
						// go to top page
	              		$('html, body').animate({ scrollTop: 0 }, 0);
						load_customers_data(1);
					}

				}
			});	
		}		
	});	 
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
	$("#ctm_mob").ForceNumericOnly();										    		   
	$("#ctm_mob_update").ForceNumericOnly();										    		   

</script>