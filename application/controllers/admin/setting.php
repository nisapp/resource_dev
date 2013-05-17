<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
	class Setting extends CI_Controller {
	 
	 function __construct()
	 {
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->helper(array('url', 'form'));
		// check for validate user login
		$session_login_user=$this->session->userdata('logged_in');
		if (!($session_login_user['login_state'] == 'active' && $session_login_user['role'] == 'admin')) {
			redirect('login', 'refresh');
		}
		$this->load->library('form_validation');
	 }
	 
	
	function index()
	{
		$this->data['account_detail'] = $this->user->get_admin_login_detail();
		$this->data['subview']=  'admin/account_setting/admin_account_setting_view';
		$this->load->view('admin/_layout_main.php', $this->data);
	}
	
	function edit(){
		$this->data['account_detail'] =$this->user->get_admin_login_detail();
		$this->data['subview']=  'admin/account_setting/edit_account_setting_view';
		$this->load->view('admin/_layout_main.php', $this->data);
	}
	
	function updatesetting(){
		$this->form_validation->set_rules('txtFname', 'first name', 'required|xss_clean');
		$this->form_validation->set_rules('txtLname', 'last name', 'required|xss_clean');
		$this->form_validation->set_rules('txtPhone', 'phone number', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txtEmail', 'email','trim|required|valid_email|xss_clean');
		if($this->form_validation->run() == FALSE)
		{
			//redirected when validation failed.
			$this->data['account_detail'] = $this->user->get_admin_login_detail();
			$this->data['subview']=  'admin/account_setting/edit_account_setting_view';
			$this->load->view('admin/_layout_main.php', $this->data);
		}
		else
		{
			$statusupdate = $this->user->update_account_detail();  
			if($statusupdate){
				$this->data['status']="updatesuccess";
				$this->index();
			}else{
				$this->data['status']="updatefailure";			
				$this->index();// echo 'i m in Success';
			}	
		}		
	}
	
	function changepassword(){
		$this->data['account_detail'] =  $this->user->get_admin_login_detail();
		$this->data['subview']=  'admin/account_setting/change_password_view';
		$this->load->view('admin/_layout_main.php', $this->data);
	}

	function setpassword(){
		$this->form_validation->set_rules('txtCurrent', 'Current Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txtNewpwd', 'New Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txtConfirmpwd', 'Confirm Password', 'trim|required|xss_clean|matches[txtNewpwd]');
		if($this->form_validation->run() == FALSE)
		{
			$this->data['subview']=  'admin/account_setting/change_password_view';
			$this->load->view('admin/_layout_main.php', $this->data);
		}else{
			$statusupdate = $this->user->set_admin_password();  
			if($statusupdate=='success'){
				$this->data['status']="updatesuccess";
				$this->data['subview']=  'admin/account_setting/change_password_view';
				$this->load->view('admin/_layout_main.php', $this->data);
			}else{
				$this->data['status']=$statusupdate;
				$this->data['subview']=  'admin/account_setting/change_password_view';
				$this->load->view('admin/_layout_main.php', $this->data);
			}	
		}
	}

 }
?>