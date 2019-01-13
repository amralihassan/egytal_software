<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * 
 */
class Page extends CI_controller
{
	
	function __construct()
	{
		parent :: __construct();
	}

	function index()
	{
		$data['msg'] = '';
		$data['hide']='display:none';		
		$this->load->view("login",$data);
	}
	function loadCustomersituationpage()
	{
        $data['pagetitle'] = 'مصنع ايجي تال';
        $data['page']=$this->load->view('customer/ctm_situation_view',NULL,TRUE);
        echo json_encode($data);  		
	}
	function loadUserspage()
	{
        $data['pagetitle'] = 'المستخدمين';
        $data['page']=$this->load->view('user/users_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadCustomerspage()
	{
        $data['pagetitle'] = 'العملاء';
        $data['page']=$this->load->view('customer/customer_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadVendorspage()
	{
        $data['pagetitle'] = 'الموردين';
        $data['page']=$this->load->view('vendor/vendor_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadEmployeespage()
	{
        $data['pagetitle'] = 'الموظفين';
        $data['page']=$this->load->view('employee/employee_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadOfferspage()
	{
        $data['pagetitle'] = 'عروض اﻻسعار';
        $data['page']=$this->load->view('offer/offer_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadProjectspage()
	{
        $data['pagetitle'] = 'المقايسات';
        $data['page']=$this->load->view('projects/projects_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadInfo_accountsspage()
	{
        $data['pagetitle'] = 'دليل الحسابات';
        $data['page']=$this->load->view('accounting/info_accounts_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadAccountingpage()
	{
        $data['pagetitle'] = 'الحركة اليومية';
		$data['page']=$this->load->view('accounting/accounting_view',NULL,TRUE);               
        echo json_encode($data);     
	}
	function loadAccounts_reportpage()
	{
        $data['pagetitle'] = 'كشف حساب حركة';
        $data['page']=$this->load->view('accounting/account_report_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadTaxspage()
	{
        $data['pagetitle'] = 'حساب ضريبة القيمة المضافة';
        $data['page']=$this->load->view('tax/tax_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadAccessorypage()
	{
        $data['pagetitle'] = 'حساب اﻻكسسوار';
        $data['page']=$this->load->view('accessories/accessories_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadGlasspage()
	{
        $data['pagetitle'] = 'حساب الزجاج';
        $data['page']=$this->load->view('glass/glass_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadPurchasepage()
	{
        $data['pagetitle'] = 'المشتريات';
        $data['page']=$this->load->view('purchases/purchases_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadSalarypage()
	{
        $data['pagetitle'] = 'المرتبات';
        $data['page']=$this->load->view('salary/salary_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadLabour_feespage()
	{
        $data['pagetitle'] = 'مصاريف العمال';
        $data['page']=$this->load->view('salary/labour_fees_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadPunishpage()
	{
        $data['pagetitle'] = 'الخصومات';
        $data['page']=$this->load->view('salary/punish_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadLentpage()
	{
        $data['pagetitle'] = 'السلف';
        $data['page']=$this->load->view('salary/lent_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function loadOvertimepage()
	{
        $data['pagetitle'] = 'الاضافي';
        $data['page']=$this->load->view('salary/overtime_view',NULL,TRUE);
        echo json_encode($data);     
	}
	function disable() // fail login
	{
		$data['msg'] = 'اسم المستخدم غير مفعل. الرجاء التواصل مع مدير النظام';
		$data['hide']='display:inline-block';
		$this->load->view('login',$data);
	}
	function fail() // fail login
	{
		$data['msg'] = 'اسم المستخدم او كلمة المرور غير صحيح';
		$data['hide']='display:inline-block';
		$this->load->view('login',$data);
	}	
	function empty() // fail login
	{
		$data['msg'] = 'يجب ادخال اسم المستخدم وكلمة المرور';
		$data['hide']='display:inline-block';
		$this->load->view('login',$data);
	}	
}

 ?>