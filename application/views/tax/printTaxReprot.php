<!DOCTYPE html>
<html dir="rtl">
<head>
	<title>كشف بالفواتير الضريبية خلال فترة</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<!-- bootstrap -->
	<link href="<?php echo base_url();?>public/dist/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
	<script type="text/javascript" src="<?php echo base_url();?>public/dist/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/dist/js/bootstrap.min.js"></script>
	<!-- logo -->
	<link rel="shortcut icon" href="<?php echo base_url();?>public/logo/logo.ico">    
	<!-- custom css -->
	<link href="<?php echo base_url();?>public/dist/css/style.css" rel="stylesheet">   	
</head>
<body>
	
	<input type="date" name="fromDate" hidden="" value="<?php echo $fromDate; ?>">
	<input type="date" name="toDate" hidden="" value="<?php echo $toDate; ?>">
	<div class="container" style="margin-top: 15px;padding: 15px; background-color: white;">
		<h3 style="text-align: center;">كشف بالفواتير الضريبية خلال فترة</h3>
		<div class="row">
			<div class="col-md-12">
				<!-- tables -->
	    		<div class="table table-responsive " id="tax_print_table" style="font-size: 14px;"></div>
	    		<div align="center" id="tax_print_pagination_link"></div>
			</div>
		</div>			
	</div>

</body>
</html>
<script type="text/javascript">
	printReport(1);
	function printReport(page)
	{
		// dispaly account name
		var fromDate = $('input[name=fromDate]').val();
		var toDate = $('input[name=toDate]').val();
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
</script>