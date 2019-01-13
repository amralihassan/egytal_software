<div class="container">
	<h4>حساب الزجاج</h4><hr>
	  <ol class="breadcrumb">
	    <li><a href="#" onclick="loadCutomersituation();"><i class="fa fa-dashboard"></i> الرئيسية</a>&nbsp;&nbsp;</li>
	    <li class="active">حساب الزجاج</li>
	  </ol>
	  <!-- new glass for customer -->
	  
		  <form action="" method="POST" id="frmNew">
		  	<div class="row">
			  <div class="col-md-3">
				  	<div class="form-group">
				  		<label><b>اسم العميل</b></label>
				  		<select class="form-control select2" name="">
				  			<option value="">اسم العميل</option>
				  		</select>
				  	</div>
			  </div>
			  <div class="col-md-3">
				  	<div class="form-group">
				  		<label><b>اسم المشروع</b></label>
				  		<input type="text" name="" class="form-control" required="" placeholder="اسم المشروع">
				  	</div>
			  </div>	 
			  <div class="col-md-5">
				  	<div class="form-group">
				  		<label><b>ملاحظات</b></label>
				  		<input type="text" name="" class="form-control" placeholder="ملاحظات">
				  	</div>
			  </div>
			  <div class="col-md-1">
			  		<div class="form-group">
			  			<br>
	  					<button class="btn btn-success" name="">حفظ</button>			  			
			  		</div>
			  </div>	
		   </div>	   	
		  </form>	  	
	  <br>
</div>
<script type="text/javascript">
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
      }) 
</script>