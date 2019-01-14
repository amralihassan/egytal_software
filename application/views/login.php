<!DOCTYPE html>
<html lang="ar" dir="rtl">
	<head>
		<title>تسجيل الدخول</title>
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- w3 -->
	    <link href="<?php echo base_url();?>public/dist/css/w3.css" rel="stylesheet">   		
		<!-- bootstrap -->
	    <link href="<?php echo base_url();?>public/dist/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
	    <script type="text/javascript" src="<?php echo base_url();?>public/dist/js/jquery.min.js"></script>
	    <script type="text/javascript" src="<?php echo base_url();?>public/dist/js/popper.min.js"></script>
	    <script type="text/javascript" src="<?php echo base_url();?>public/dist/js/bootstrap.min.js"></script>
	    <!-- Font awesome -->
        <link href="<?php echo base_url();?>public/dist/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">    
	    <!-- logo -->
	    <link rel="shortcut icon" href="<?php echo base_url();?>public/logo/logo.ico">
		<!-- custom css -->
		<link href="<?php echo base_url();?>public/dist/css/style.css" rel="stylesheet">      
	</head>
<body  style="background-color: #eae9e9;">
	<div class="center">
		<img src="<?php echo base_url();?>public/images/logo2.png">	
	</div>
	
	<h4 style="text-align: center;margin-top: 50px;font-weight: bold;">الشركة الهندسية للأعمال المعدنية</h4>
	<h5 style="text-align: center;margin-top: 50px; font-weight: bold;color: #c01010;">مصنع ايجي تال</h5>
	<br>
	<div class="w3-container w3-card-2" style="width: 335px;margin: auto;">
		<br>
		<form action="<?php echo base_url('Login'); ?>" method="POST">
			<div class="row">
				 <div class="col-md-12">
				 	<label><b>اسم المستخدم</b></label>	
				 </div>
			</div>
			<div class="row">
				 <div class="col-md-12">
				 	<input style="width: 300px;" class="form-control" type="text" name="username" placeholder="اسم المستخدم">
				 </div>
			</div>				
			<br>
			<div class="row">
				 <div class="col-md-12">
				 	<label><b>كلمة المرور</b></label>	
				 </div>
			</div>
			<div class="row">
				 <div class="col-md-12">
				 	<input style="width: 300px;" class="form-control" type="password" name="password" placeholder="كلمة المرور">
				 </div>
			</div>	
			<br>
			<div class="row">
				 <div class="col-md-12">
				 	<input name="submit" type="submit" class="btn btn-success pull-left" value="تسجيل دخول"/>
				 </div>
			</div>					
		<br>				
		</form>	
        <div class="alert alert-danger" style="<?php echo $hide; ?>">
            <?php echo $msg; ?>
        </div>		


	</div>
</body>
</html>