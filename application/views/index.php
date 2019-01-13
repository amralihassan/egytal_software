<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
      <title id="pagetitle">ايجي تال</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- w3 -->
      <link href="<?php echo base_url();?>public/dist/css/w3.css" rel="stylesheet">       
      <!-- bootstrap -->
      <link href="<?php echo base_url();?>public/dist/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
      <script type="text/javascript" src="<?php echo base_url();?>public/dist/js/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>public/dist/js/popper.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>public/dist/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>public/dist/js/printThis.js"></script>
      <!-- Font awesome -->
      <link href="<?php echo base_url();?>public/dist/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">    
      <!-- logo -->
      <link rel="shortcut icon" href="<?php echo base_url();?>public/logo/logo.ico">
       <!-- Select2 -->
      <link rel="stylesheet" href="<?php echo base_url();?>public/dist/select2/dist/css/select2.min.css"> 
      <!-- custom css -->
      <link href="<?php echo base_url();?>public/dist/css/style.css" rel="stylesheet">      
      <style type="text/css">
          /* Paste this css to your style sheet file or under head tag */
          /* This only works with JavaScript, 
          if it's not present, don't show loader */
          /*.no-js #loader { display: none;  }*/
          /*.js #loader { display: block; position: absolute; left: 100px; top: 0; }*/
          .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(<?php echo base_url('public/images/loader-64x/Preloader_7.gif') ?>) center no-repeat #fff;        }
      </style>      
  </head>
  <body>
    <div class="se-pre-con"></div>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark ">
        <a class="navbar-brand" href="#" onclick="loadCutomersituation();">ايجي تال</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse pull-right" id="navbarCollapse">
          <ul class="navbar-nav ">
                <li class="dropdown">
                    <a class="dropdown-toggle nav-link"  data-toggle="dropdown" href="#"  >الرئيسية
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu list-menu pull-right">
                        <li><a href="#" onclick="users();" class="w3-button w3-padding make-block">المستخدمين</a></li>                        
                        <li><a href="#" onclick="customers();" class="w3-button w3-padding make-block">العملاء</a></li>
                        <li><a href="#" onclick="vendors();" class="w3-button w3-padding make-block">الموردين</a></li>
                        <li><a href="#" onclick="employee();" class="w3-button w3-padding make-block">الموظفيين</a></li>   
                    </ul>
                </li>                
                <li class="nav-link" onclick="offer();"><a href="#">عروض اﻻسعار</a></li>
                <li class="nav-link" onclick="projects();"><a href="#">المقايسات</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle nav-link"  data-toggle="dropdown" href="#">الحسابات
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu list-menu pull-right">
                        <li><a href="#" onclick="info_accounts();" class="w3-button w3-padding make-block">دليل الحسابات</a></li>
                        <li><a href="#" onclick="accounting();" class="w3-button w3-padding make-block">الحركة اليومية</a></li>
                        <li><a href="#" onclick="accounts_report();" class="w3-button w3-padding make-block">كشف حساب حركة</a></li>
                        <li><a href="#" onclick="tax();" class="w3-button w3-padding make-block">حساب ضريبة القيمة المضافة</a></li>
                    </ul>
                </li>     
                <li class="dropdown">
                    <a class="dropdown-toggle nav-link"  data-toggle="dropdown" href="#">حركة العملاء والموردين 
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu list-menu pull-right">
                        <li><a href="#" onclick="accessory();" class="w3-button w3-padding make-block">حساب اﻻكسسوار</a></li>
                        <li><a href="#" onclick="glass();" class="w3-button w3-padding make-block">حساب الزجاج</a></li>
                        <li><a href="#" onclick="purchase();" class="w3-button w3-padding make-block">مدفوعات العملاء</a></li>
                        <li><a href="#" onclick="purchase();" class="w3-button w3-padding make-block">مشتريات العملاء</a></li>
                    </ul>
                </li>                  
                <li class="dropdown">
                    <a class="dropdown-toggle nav-link"  data-toggle="dropdown" href="#">اﻷجور و الرواتب
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu list-menu pull-right">
                        <li><a href="#" onclick="salary();" class="w3-button w3-padding make-block">المرتبات</a></li>
                        <li><a href="#" onclick="labour_fees();" class="w3-button w3-padding make-block">مصاريف العمال</a></li>
                        <li><a href="#" onclick="punish();" class="w3-button w3-padding make-block">الخصومات</a></li>
                        <li><a href="#" onclick="lent();" class="w3-button w3-padding make-block">السلف</a></li>
                        <li><a href="#" onclick="overtime();" class="w3-button w3-padding make-block">اﻻضافي</a></li>
                    </ul>
                </li>         
                <li class="nav-link"><a href="<?php echo site_url("Logout"); ?>">تسجيل خروج</a></li>                          
          </ul>
      </div>
    </nav>
  <!-- !PAGE CONTENT! -->
  <div class=""  id="page-content" style="margin-top: 60px;float: right;">

  </div>   
  <script type="text/javascript">
  $( document ).ready(function() {$(".se-pre-con").fadeOut("slow"); });    
    loadCutomersituation();
    function loadCutomersituation()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadCustomersituationpage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });        
    }
    function users()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadUserspage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });         
    }   
    function customers()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadCustomerspage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });         
    } 
    function vendors()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadVendorspage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });         
    }
    function employee()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadEmployeespage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });         
    }    
    function offer()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadOfferspage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });         
    }    
    function projects()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadProjectspage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });         
    }    
    function info_accounts()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadInfo_accountsspage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });         
    }    
    function accounting()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadAccountingpage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });         
    }    
    function accounts_report()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadAccounts_reportpage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });         
    }    
    function tax()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadTaxspage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });         
    }    
    function accessory()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadAccessorypage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });         
    }    
    function glass()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadGlasspage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });         
    }
    function purchase()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadPurchasepage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });         
    }
    function salary()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadSalarypage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });     
        // retrive employee
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Employee/retrive_employee',
            dataType:'json',
            success:function(data)
            {
                $('#emp_full_name_id').html(data);
            }
        });              
    }
    function labour_fees()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadLabour_feespage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });     
        // retrive employee
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Employee/retrive_employee',
            dataType:'json',
            success:function(data)
            {
                $('#emp_full_name_id').html(data);
            }
        });             
    }
    function punish()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadPunishpage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });  
        // retrive employee
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Employee/retrive_employee',
            dataType:'json',
            success:function(data)
            {
                $('#emp_full_name_id').html(data);
            }
        });                
    }
    function lent()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadLentpage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });   
        // retrive employee
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Employee/retrive_employee',
            dataType:'json',
            success:function(data)
            {
                $('#emp_full_name_id').html(data);
            }
        });               
    }
    function overtime()
    {
        $.ajax({
          type:'ajax',
          method:'get',
          url:'<?php echo base_url() ?>Page/loadOvertimepage',
          async:false,
          dataType:'json',
          success:function(response){
            $('#pagetitle').html(response.pagetitle);            
            $('#page-content').html(response.page);
            // go to top page
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        });  
        // retrive employee
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Employee/retrive_employee',
            dataType:'json',
            success:function(data)
            {
                $('#emp_full_name_id').html(data);
            }
        });                
    }                      
  </script> 
<!-- Select2 -->
<script src="<?php echo base_url();?>public/dist/select2/dist/js/select2.full.min.js"></script>  
  </body>
</html>