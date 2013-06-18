<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
	class Setting extends CI_Controller {
	 
	 function __construct()
	 {
	  	 parent::__construct();

		// check for validate user login
		$this->load->model('menu_model','',TRUE);
		$session_login_client=$this->session->userdata('client_login');
		if (!($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user')) {
			redirect('login', 'refresh');
		}else{
			$strMenus=$this->menu_model->getMenuData_array();
			$this->session->set_userdata('menu_data_in_session', $strMenus);
		}
		
		$this->load->model('client','',TRUE);
		$this->load->model('programs_model','',TRUE);
		$this->load->library('form_validation');
	 }
	 
	 function index()
	 {
		if($this->session->userdata('client_login'))
		{
			$this->data['account_detail'] = $this->client->get_current_login_client_detail();
			$this->data['program_detail'] = $this->programs_model->getProgram_for_clentdashboard();
			
			$this->data['metatitle'] = 'Account Setting';
			$this->data['subview']=  'clientadmin/client_account_setting_view';
			$this->load->view('clientadmin/_layout_main', $this->data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	 
	function contactsupport(){
		$statusupdate = $this->client->send_contact_support_data();  
		if($statusupdate==1){
			echo 1;
		}else{
			echo 0;
		}	
	}
	
	function setpassword(){
		$this->form_validation->set_rules('txtCurrent', 'Current Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txtNewpwd', 'New Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txtConfirmpwd', 'Confirm Password', 'trim|required|xss_clean|matches[txtNewpwd]');
		$this->data['metatitle'] = 'Change Password';
		if($this->form_validation->run() == FALSE)
		{
			$this->data['subview']=  'clientadmin/change_password_view';
			$this->load->view('clientadmin/_layout_main.php', $this->data);
		}else{
			$statusupdate = $this->client->set_password();  
			if($statusupdate=='success'){
				$this->data['status']="updatesuccess";
				$this->data['subview']=  'clientadmin/change_password_view';
				$this->load->view('clientadmin/_layout_main.php', $this->data);
			}else{
				$this->data['status']=$statusupdate;
				$this->data['subview']=  'clientadmin/change_password_view';
				$this->load->view('clientadmin/_layout_main.php', $this->data);
			}	
		}
	}
	function changepassword(){
			$this->data['metatitle'] = 'Change Password';
			$this->data['subview']=  'clientadmin/change_password_view';
			$this->load->view('clientadmin/_layout_main.php', $this->data);
	}
	
	function updatesetting(){
		$this->form_validation->set_rules('txtFname', 'first name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txtLname', 'last name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txtPhone', 'phone number', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txtEmail', 'email','trim|required|valid_email|xss_clean');
		// $this->form_validation->set_rules('txt_gvo_user', 'GVO Username', 'trim|xss_clean');
		// $this->form_validation->set_rules('txt_lev_user', 'Pure Leverage Username', 'trim|xss_clean');
		// $this->form_validation->set_rules('txt_emp_user', 'Empower Network Username', 'trim|xss_clean');
		
		if($this->form_validation->run() == FALSE)
		{
			//redirected when validation failed.
			$this->data['account_detail'] = $this->client->get_current_login_client_detail();
			$this->data['subview']=  'clientadmin/edit_account_setting_view';
			$this->load->view('clientadmin/_layout_main.php', $this->data);
		}
		else
		{
			$statusupdate = $this->client->update_account_detail();  
			if($statusupdate){
				$this->data['status']="updatesuccess";
				$this->index();
			}else{
				$this->data['status']="updatefailure";			
				$this->index();// echo 'i m in Success';
			}	
		}		
	}

	
	
	function editdetail(){
			$this->data['account_detail'] = $this->client->get_current_login_client_detail();
			$this->data['program_detail'] = $this->programs_model->getProgram_for_clentdashboard();
			$this->data['subview']=  'clientadmin/edit_account_setting_view';
			$this->load->view('clientadmin/_layout_main.php', $this->data);
	}

	 function logout()
	 {
		session_start();
		$this->session->unset_userdata('client_login');
		session_destroy();
		redirect('login', 'refresh');
	 }
	 
	}
	 
	?>