<div class="container">
	<h4>حساب الزجاج</h4><hr>
	  <ol class="breadcrumb">
	    <li><a href="#" onclick="loadCutomersituation();"><i class="fa fa-dashboard"></i> الرئيسية</a>&nbsp;&nbsp;</li>
	    <li class="active">حساب الزجاج</li>
	  </ol>
		<form id="frm_update" action="" method="post">
			<div class="col-md-10" id="id_pro">
			</div>
		</form>
	  <div class="row">
	  	<div class="col-md-3">
	  		<label><b>نوع قطعة الزجاج</b></label>
	  		<select class="form-control" style="width: 100%;" name="glassType" onchange="selectType();">
	  			<option value="">اختر نوع قطعة الزجاج</option>
	  			<option value="سنجل">سنجل</option>
	  			<option value="دبل">دبل</option>
	  		</select>
	  	</div>
	  </div>
	  <br>
	  <div id="single" style="display: none;">
		  <form action="" method="POST" id="frmSingle">
			  <div class="row">
				  	<div class="col-md-3">
				  		<label><b>اسم الزجاج</b></label>
				  		<select class="form-control select2" style="width: 100%;" name="" id="">
				  			<option value="">نوع الزجاج</option>
				  		</select>
				  	</div>
				  	<div class="col-md-2">
				  		<label><b>العرض</b></label>
				  		<input type="number" step="1" min="20" max="1000" name="" class="form-control">
				  	</div>
				  	<div class="col-md-2">
				  		<label><b>اﻻرتفاع</b></label>
				  		<input type="number" name="" step="20" min="1" max="1000" class="form-control">
				  	</div>
				  	<div class="col-md-1">
				  		<label><b>العدد</b></label>
				  		<input type="number" name="" step="1" min="1" max="1000000" class="form-control">
				  	</div>
				  	<div class="col-md-2">
				  		<label><b>سعر الزجاج</b></label>
				  		<input type="text" name="" class="form-control" readonly="">
				  	</div>
				  	<div class="col-md-2">
				  		<label><b>اﻻجمالي</b></label>
				  		<input type="text" name="" class="form-control" readonly="">
				  	</div>
			  </div>
		  </form>
		  <br>
		  <button class="btn btn-success" name="">اضافة</button>
		  <button class="btn btn-info">طباعة</button>
	  </div>
	  <div id="double" style="display: none;">
		  	<form action="" method="POST" id="frmDouble">
			  <div class="row">
				  	<div class="col-md-3">
				  		<label><b>اسم الزجاج الداخلي</b></label>
				  		<select class="form-control select2" style="width: 100%;" name="" id="">
				  			<option value="">نوع الزجاج الداخلي</option>
				  		</select>
				  	</div>
				  	<div class="col-md-3">
				  		<label><b>اسم الزجاج الخارجي</b></label>
				  		<select class="form-control select2" style="width: 100%;" name="" id="">
				  			<option value="">نوع الزجاج الخارجي</option>
				  		</select>
				  	</div>
				  	<div class="col-md-2">
				  		<label><b>نوع الفراغ</b></label>
				  		<select class="form-control select2" style="width: 100%;" name="" id="">
				  			<option value="">نوع الفراغ</option>
				  			<option value="6">6</option>
				  			<option value="9">9</option>
				  		</select>
				  	</div>
			  </div>
			  <br>
			  <div class="row">
			  	<div class="col-md-1">
			  		<label><b>العرض</b></label>
			  		<input type="text" name="" class="form-control">
			  	</div>
			  	<div class="col-md-1">
			  		<label><b>اﻻرتفاع</b></label>
			  		<input type="text" name="" class="form-control">
			  	</div>
			  	<div class="col-md-1">
			  		<label><b>العدد</b></label>
			  		<input type="text" name="" class="form-control">
			  	</div>
			  	<div class="col-md-1">
			  		<label><b>الداخلي</b></label>
			  		<input type="text" name="" class="form-control" readonly="">
			  	</div>
			  	<div class="col-md-1">
			  		<label><b>الخارجي</b></label>
			  		<input type="text" name="" class="form-control" readonly="">
			  	</div>
			  	<div class="col-md-1">
			  		<label><b>سعر الفراغ</b></label>
			  		<input type="text" name="" class="form-control">
			  	</div>
			  	<div class="col-md-2">
			  		<label><b>تكلفة الفراغ</b></label>
			  		<input type="text" name="" class="form-control" readonly="">
			  	</div>
			  	<div class="col-md-2">
			  		<label><b>سعر القطعة</b></label>
			  		<input type="text" name="" class="form-control">
			  	</div>
			  	<div class="col-md-2">
			  		<label><b>اﻻجمالي</b></label>
			  		<input type="text" name="" class="form-control">
			  	</div>
			  </div>
		  	</form>
		  	<br>
		  	<button class="btn btn-success">اضافة</button>
		  	<button class="btn btn-info">طباعة</button>
	  </div>

</div>
<script type="text/javascript">
	function selectType()
	{
		if ($('select[name=glassType]').val() == 'سنجل')
		{
			$('#single').show();
			$('#double').hide();
		}
		else
		{
			$('#single').hide();
			$('#double').show();
		}
		if ($('select[name=glassType]').val() == '')
		{
			$('#single').hide();
			$('#double').hide();
		}
	}
	$("document").ready(function ()
	{
		var id = $('input[name=id_pro]').val();
		$.ajax({
			type:'ajax',
			method:'get',
			url:'<?php echo base_url() ?>Offer/getdatabyid_offer_details',
			data:{id:id},
			async:false,
			dataType:'json',
			success:function(data){
				$('#offerDetails_table').html(data);
			}
		});
	})
</script>
