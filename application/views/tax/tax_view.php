<div class="se-pre-con"></div>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h4>حساب ضريبة القيمة المضافة</h4>
		</div>
		<div class="col-md-4">
			<!-- search -->
			<input class="form-control" type="search" name="txtSearch"  placeholder="بحث ..." id="id_of_textbox">				
		</div>
	</div>	
	<hr>
	  <ol class="breadcrumb">
	    <li><a href="#" onclick="loadCutomersituation();"><i class="fa fa-dashboard"></i> الرئيسية</a>&nbsp;&nbsp;</li>
	    <li class="active">حساب ضريبة القيمة المضافة</li>
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
		<button class="w3-bar-item w3-button tablink w3-amber pull-right"  id="btn_display"  onclick="openCity(event,'all')">ضريبة القيمة المضافة</button>
		<button class="w3-bar-item w3-button tablink  pull-right" onclick="openCity(event,'newInvoice')">اضافة فواتير ضريبية</button>
	    <button class="w3-bar-item w3-button tablink  pull-right" onclick="openCity(event,'printTax')">طباعة</button>
	</div>
  	<!-- display all taxs -->
	<div id="all" class="w3-container w3-border city">
		<br>
		<form action="tax/Delete_more_one_tax" method="post"  id="form_tax" name="frm">
			<a href="#" class="btn btn-danger" onclick="delete_taxes();">حذف</a>	
			<br><br>
			<!-- tables -->
			<div class="table table-responsive" id="tax_table"></div>
			<div align="center" id="tax_pagination_link"></div> 
		</form>
		<br>
	</div>
	<!-- new -->
	<div id="newInvoice" class="w3-container w3-border city" style="display:none">
		<form method="post" action="" id="newform_tax">
			<div class="row">
				<div class="col-md-4 pull-right">
					<label class="w3-text-black"><b>اسم المورد</b></label>	
                    <select class="form-control" name="venID" id="ven_name">
                        <option value="">اختار اسم المورد</option> 	
                    </select>							
				</div>
			</div>
			<br>
			<div class="row">
				 <div class="col-md-3 pull-right">
				  	<label><b>تاريخ الفاتورة</b></label>
					<input type="date" name="invoice_date" class="form-control" style="text-align: right;">						 
				 </div>
			</div>
			<br>
			<div class="row">
				 <div class="col-md-2 pull-right">
				  	<label><b>رقم الفاتورة</b></label>
					<input type="text" name="invoice_number" class="form-control" id="invNum" style="text-align: right;">			 	
				 </div>
			</div>
			<br>					
			<div class="row">
				<div class="col-md-3 pull-right">
				  	<label><b>قيمة الفاتورة</b></label>
				  	<input class="form-control" type="text" name="invoice_amount" id="invoice_amount" >							
				</div>
				<div class="col-md-3 pull-right">
				  	<label><b>نسبة القيمة المضافة [%]</b></label>
				  	<input class="form-control" type="text" name="invoice_percentage" id="invoice_percentage">					
				</div>
				<div class="col-md-3 pull-right">
				  	<label><b>القيمة المضافة</b></label>
				  	<input class="form-control" type="text" name="tax_amount" id="tax_amount" >							
				</div>	
				<div class="col-md-3 pull-right">
				  	<label><b>قيمة الفاتورة بعد حساب الضريبة</b></label>
				  	<input class="form-control" type="text" name="total_invoice" id="total_invoice" readonly="">			
				</div>															
			</div>
			<br>	
		</form>	
	<button type="button" id="btn_save" class="btn btn-success">حفظ</button>				
	<br><br>
	</div>
	<div id="printTax" class="w3-container w3-border city" style="display:none">
		<br>			
		<div class="row">
			<div class="col-md-2 pull-right">
				<label class="pull-right"><b>من تاريخ</b></label>				
			</div>
			<div class="col-md-3 pull-right">
				<input type="date" name="from_date" class="form-control" style="text-align: right;">
			</div>
			<div class="col-md-2 pull-right">
				<label class="w3-text-black 	"><b>الى تاريخ</b></label>				
			</div>
			<div class="col-md-3 pull-right">
				<input type="date" name="to_date" class="form-control" style="text-align: right;">
			</div>
			<div class="col-md-2 pull-right">
				<a href="#" class="btn btn-warning" id="view_invoices">عرض</a>		
				<a href="#" class="btn btn-info" onclick="printTaxreport();">طباعة</a>			
			</div>					
		</div>
		<br>
	    <!-- tables -->
	    <div class="table table-responsive " id="tax_print_table"></div>
	    <div align="center" id="tax_print_pagination_link"></div> 		
  	</div>		  
</div>

<!-- update-->
<div class="modal fade" id="updateModel_tax" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<!-- Modal content -->
		<div class="modal-content" style="width: 650px;">
			<div class="modal-header" style="background-color: #337ab7; color: white;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>    
		    </div>			
			<div class="modal-body">
				<form method="post" action="" id="updateform_tax">
					<div class="row">
						<div class="col-md-12 pull-right">
							<input type="text" name="taxID_update" hidden="">
							<label class="w3-text-black"><b>اسم المورد</b></label>	
		                    <select class="form-control" name="venID_update" id="ven_name_update">
		                        <option value="">اختار اسم المورد</option> 	
		                    </select>							
						</div>
					</div>
					<br>
					<div class="row">
						 <div class="col-md-12 pull-right">
						  	<label class="w3-text-black"><b>تاريخ الفاتورة</b></label>
					<input type="date" name="invoice_date_update" class="form-control" style="text-align: right;">						 	
						 </div>
					</div>
					<br>
					<div class="row">
						 <div class="col-md-12 pull-right">
						  	<label class="w3-text-black"><b>رقم الفاتورة</b></label>
							<input type="text" name="invoice_number_update" id="invNum_update" class="form-control" style="text-align: right;">						 	
						 </div>
					</div>
					<br>					
					<div class="row">
						<div class="col-md-4 pull-right">
						  	<label class="w3-text-black"><b>قيمة الفاتورة</b></label>
						  	<input class="form-control" type="text" name="invoice_amount_update" id="invoice_amount_update">								
						</div>
						<div class="col-md-4 pull-right">
						  	<label class="w3-text-black"><b>نسبة القيمة المضافة [%]</b></label>
						  	<input class="form-control" type="text" name="invoice_percentage_update" id="invoice_percentage_update">								
						</div>
						<div class="col-md-4 pull-right">
						  	<label class="w3-text-black"><b>القيمة المضافة</b></label>
						  	<input class="form-control" type="text" name="tax_amount_update" id="tax_amount_update" >							
						</div>												
					</div>
					<br>
					<div class="row">
						<div class="col-md-12 pull-right">
						  	<label class="w3-text-black"><b>قيمة الفاتورة بعد حساب الضريبة</b></label>
						  	<input class="form-control" type="text" name="total_invoice_update" id="total_invoice_update" readonly="">						
						</div>
					</div>		
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
<div class="modal fade" id="deleteModal_tax" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">		
			<div class="modal-body">
				هل تريد اتمام عملية الحذف؟
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete_tax" class="w3-btn w3-red">حذف</button>
				<button type="button" class="w3-btn w3-grey" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>
<!-- end delete modal -->
     <!-- print -->

<script type="text/javascript">

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
			url:'<?php echo base_url() ?>Tax/pagination_search/' + page,
			method:'get',
			data:{name:searchtxt.val()},
			dataType:'json',
			success:function(data){
				$('#tax_table').html(data.tax_table);
				$('#tax_pagination_link').html(data.tax_pagination_link);
			}
		});
	}	
	// search
	$('#view_invoices').click(function(){
		searchData_tax(1);
	})
	function searchData_tax(page) 
	{
		// dispaly account name
		var fromDate = $('input[name=from_date]').val();
		var toDate = $('input[name=to_date]').val();
		// get word search
		$.ajax({
			url:'<?php echo base_url() ?>Tax/pagination_search_print/' + page,
			method:'get',
			data:{fDate:fromDate,tDate:toDate},
			dataType:'json',
			success:function(data){
				$('#tax_print_table').html(data.tax_print_table);
				$('#tax_print_pagination_link').html(data.tax_print_pagination_link);
			}
		});			         	
	}		
	function printTaxreport()
	{
		// dispaly account name
		var fromDate = $('input[name=from_date]').val();
		var toDate = $('input[name=to_date]').val();
		window.open("<?php echo base_url() ?>Tax/printInv/"+fromDate+"/"+toDate,'_blank');
	}	
	$('#btn_save').click(function(){
		var url = '<?php echo base_url() ?>tax/add_tax';
		var data = $('#newform_tax').serialize();
		// validation
		var venID = $('select[name=venID]');
		var invoice_date = $('input[name=invoice_date]');
		var invoice_amount = $('input[name=invoice_amount]');
		var tax_amount = $('input[name=tax_amount]');
		var invoice_number = $('input[name=invoice_number]');
		var total_invoice = $('input[name=total_invoice]');
		var result = '';

		if (venID.val() == '') {
			venID.parent().parent().addClass('has-error');
			return;
		}else{
			venID.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (invoice_date.val() == '') {
			invoice_date.parent().parent().addClass('has-error');
			return;
		}else{
			invoice_date.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (invoice_amount.val() == '') {
			invoice_amount.parent().parent().addClass('has-error');
			return;
		}else{
			invoice_amount.parent().parent().removeClass('has-error');
			result +='3';
		}
		if (tax_amount.val() == '') {
			tax_amount.parent().parent().addClass('has-error');
			return;
		}else{
			tax_amount.parent().parent().removeClass('has-error');
			result +='4';
		}
		if (invoice_number.val() == '') {
			invoice_number.parent().parent().addClass('has-error');
			return;
		}else{
			invoice_number.parent().parent().removeClass('has-error');
			result +='5';
		}		
		if (total_invoice.val() == '') {
			total_invoice.parent().parent().addClass('has-error');
			return;
		}else{
			total_invoice.parent().parent().removeClass('has-error');
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
						$('#newform_tax')[0].reset();
						$('.alert-success').html('تمت الإضافة بنجاح').fadeIn().delay(2000).fadeOut('slow');
						load_taxs_data(1);						
					}

				}
			});	
		}		
	});		
	function delete_taxes()
	{
		var data = $('#form_tax').serialize();
		if (data == "") {$('.alert-danger').html('لم يتم تحديد اي سجلات').fadeIn().delay(2000).fadeOut('slow');;return;}
  		$('#deleteModal_tax').modal('show');
  		$('#deleteModal_tax').find('.modal-title').text('حذف');
  		$('#btnDelete_tax').click(function(){
			$.ajax({
				type:'ajax',
				method:'post',
				url:'<?php echo base_url() ?>tax/Delete_more_one_tax',
				data:data,
				async:false,
				dataType:'json',
				success:function(response){
					if (response.success) {
						$('.alert-success').html('تم الحذف بنجاح').fadeIn().delay(4000).fadeOut('slow');
						$('#deleteModal_tax').modal('hide');	
						load_taxs_data(1);

					}
				}
			});
  		});
	}	
	function cal()
	{
		var invoice_amount = $('input[name=invoice_amount]').val() * 1;
		var invoice_percentage = $('input[name=invoice_percentage]').val() * 1;

		var result = invoice_amount * invoice_percentage / 100;
		$('#tax_amount').val(result) ;	
		$('#total_invoice').val(result + invoice_amount) ;	
	}
	$('#invoice_amount').keyup(function(event){
		cal();
	})
	$('#invoice_percentage').keyup(function(event){
		cal();
	})			
	function checkall()
	{
		var totalelements = document.forms[0].elements.length;

		for(var i=0; i<totalelements; i++)
		{
			var elementName = document.forms[0].elements[i].name;

			if (elementName!=undefined & elementName.indexOf("taxID")!= -1)
			{
				document.forms[0].elements[i].checked = document.frm.chk_all.checked;
			}
		}
	}	
	//update
	function update_tax(data)
	{
		var id = data;
		var venID = "";	
		$('#updateModel_tax').modal('show');
  		$('#updateModel_tax').find('.modal-title').text('تعديل');
  		$('#updateform_tax').attr('action','<?php echo base_url() ?>Tax/update_tax');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>tax/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=taxID_update]').val(data.taxID);
  				$('input[name=invoice_date_update]').val(data.invoice_date);
  				$('input[name=invoice_amount_update]').val(data.invoice_amount);
  				$('input[name=tax_amount_update]').val(data.tax_amount);
  				$('input[name=invoice_number_update]').val(data.invoice_number);
  				$('input[name=total_invoice_update]').val(data.total_invoice);
  				venID = data.venID; 

  				var tax_amount_update = $('input[name=tax_amount_update]').val();
  				var invoice_amount_update = $('input[name=invoice_amount_update]').val();

  				var invoice_percentage_update = (tax_amount_update/invoice_amount_update)*100;


  				$('input[name=invoice_percentage_update]').val(invoice_percentage_update);

  			}
  		});
  		// load vendors
		$.ajax({
			type:'ajax',
			method:'get',
			data:{venid:venID},
			url:'<?php echo base_url() ?>Vendor/retrive_vendors_by_venID',
			dataType:'json',
			success:function(data)
			{
				$('#ven_name_update').html(data);
			}
		});   		
	}	
	// update
  	$('#btnUpdate').click(function(){
  		
		var url = $('#updateform_tax').attr('action'); // action
		var data = $('#updateform_tax').serialize();
		// validation
		var venID = $('select[name=venID_update]');
		var invoice_date = $('input[name=invoice_date_update]');
		var invoice_amount = $('input[name=invoice_amount_update]');
		var tax_amount = $('input[name=tax_amount_update]');
		var invoice_number = $('input[name=invoice_number_update]');
		var total_invoice = $('input[name=total_invoice_update]');
		var result = '';

		if (venID.val() == '') {
			venID.parent().parent().addClass('has-error');
			return;
		}else{
			venID.parent().parent().removeClass('has-error');
			result +='1';
		}
		if (invoice_date.val() == '') {
			invoice_date.parent().parent().addClass('has-error');
			return;
		}else{
			invoice_date.parent().parent().removeClass('has-error');
			result +='2';
		}
		if (invoice_amount.val() == '') {
			invoice_amount.parent().parent().addClass('has-error');
			return;
		}else{
			invoice_amount.parent().parent().removeClass('has-error');
			result +='3';
		}
		if (tax_amount.val() == '') {
			tax_amount.parent().parent().addClass('has-error');
			return;
		}else{
			tax_amount.parent().parent().removeClass('has-error');
			result +='4';
		}
		if (invoice_number.val() == '') {
			invoice_number.parent().parent().addClass('has-error');
			return;
		}else{
			invoice_number.parent().parent().removeClass('has-error');
			result +='5';
		}		
		if (total_invoice.val() == '') {
			total_invoice.parent().parent().addClass('has-error');
			return;
		}else{
			total_invoice.parent().parent().removeClass('has-error');
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
						$('#updateModel_tax').modal('hide');
						$('#updateform_tax')[0].reset();
						$('.alert-success').html('تم التعديل بنجاح.').fadeIn().delay(2000).fadeOut('slow');
						load_taxs_data(1);
					}
				}
			});
		}
  	});	
	function cal_update()
	{
		var invoice_amount_update = $('input[name=invoice_amount_update]').val() * 1;
		var invoice_percentage_update = $('input[name=invoice_percentage_update]').val() * 1;

		var result = invoice_amount_update * invoice_percentage_update / 100;
		$('#tax_amount_update').val(result) ;	
		$('#total_invoice_update').val(result + invoice_amount_update) ;	
	}
	$('#invoice_amount_update').keyup(function(event){
		cal_update();
	})
	$('#invoice_percentage_update').keyup(function(event){
		cal_update();
	})	  	
	load_taxs_data(1);
	function load_taxs_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>tax/pagination/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#tax_table').html(data.tax_table);
				$('#tax_pagination_link').html(data.tax_pagination_link);
				$(".se-pre-con").fadeOut("slow");  	
			}
		});
		// retrive vendors
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Vendor/retrive_vendors',
            dataType:'json',
            success:function(data)
            {
                $('#ven_name').html(data);
            }
        });			
	}
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_taxs_data(page);
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
	$("#invoice_amount").ForceNumericOnly();										    		
	$("#invoice_percentage").ForceNumericOnly();		
	$("#tax_amount").ForceNumericOnly();		
	$("#invoice_amount_update").ForceNumericOnly();		
	$("#invoice_percentage_update").ForceNumericOnly();		
	$("#tax_amount_update").ForceNumericOnly();	
	$("#invNum").ForceNumericOnly();		
	$("#invNum_update").ForceNumericOnly();		
</script>