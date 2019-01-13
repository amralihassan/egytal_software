<div class="se-pre-con"></div>
<div class="container">
<h4>كشف حساب حركة</h4><hr>
  <ol class="breadcrumb">
    <li><a href="#" onclick="loadCutomersituation();"><i class="fa fa-dashboard"></i> الرئيسية</a>&nbsp;&nbsp;</li>
    <li class="active">كشف حساب حركة</li>
  </ol>
	<div class="row">
		<div class="col-md-4 pull-right">
			<label><b>اسم الحساب</b></label>
		    <select style="width: 100%" class="form-control select2" name="accID" id="accounts_name" onchange="searchData(1);">
		        <option value="">اسم الحساب</option> 	
		    </select>				
		</div>
		<div class="col-md-2 pull-right">
			<label><b>من تاريخ</b></label>		
			<input type="date" name="from_date" class="form-control" style="text-align: right;">					
		</div>
		<div class="col-md-2 pull-right">
			<label><b>الى تاريخ</b></label>	
			<input type="date" name="to_date" class="form-control" style="text-align: right;">						
		</div>
		<div class="col-md-2 pull-right">
			<a style="margin-top: 22px;" href="#" class="btn btn-success" onclick="searchData(1);">تحديث الصفحة</a>	
			<a style="margin-top: 22px;" href="#" class="btn btn-info"  onclick="printInvoice();">طباعة</a>					
		</div>					
	</div> 
	<br>
	<div class="row">
		<div class="col-md-12">
		    <!-- tables -->
		    <div class="table table-responsive " id="accounts_table"></div>
		    <div align="center" id="accounts_pagination_link"></div> 			
		</div>
	</div> 
</div>
<script type="text/javascript">
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
      }) 	
	// get finicial period
	get_finicial_period();
	function get_finicial_period()
	{
		// retrive accounts
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Accounting/retrive_accounts',
            dataType:'json',
            success:function(data)
            {
                $('#accounts_name').html(data);
            }
        }); 		
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Accounting/get_current_finicial_period',
  			async:false,
  			dataType:'json',
  			success:function(data){
  				$('input[name=from_date]').val(data.start_date);
  				$('input[name=to_date]').val(data.end_date);
  				$(".se-pre-con").fadeOut("slow"); 
  			}
  		});			
	}
	// search
	$('#view').click(function(){
		searchData(1);
	})
	function searchData(page) 
	{
		// search
		var searchtxt = $('select[name=accID]').val();
		var fromDate = $('input[name=from_date]').val();
		var toDate = $('input[name=to_date]').val();

		// get word search
		$.ajax({
			url:'<?php echo base_url() ?>Accounting/pagination_accounts_search/' + page,
			method:'get',
			data:{name:searchtxt,fDate:fromDate,tDate:toDate},
			dataType:'json',
			success:function(data){
				$('#accounts_table').html(data.accounts_table);
				$('#accounts_pagination_link').html(data.accounts_pagination_link);
			}
		});          			
              	
	}	
	function printInvoice()
	{
		var searchtxt = $('select[name=accID]').val();
		var fromDate = $('input[name=from_date]').val();
		var toDate = $('input[name=to_date]').val();
		window.open("<?php echo base_url() ?>Accounting/printInv/"+searchtxt+"/"+fromDate+"/"+toDate,'_blank');
	}	
</script>