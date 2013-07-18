<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
	class Plspagesetup extends CI_Controller {
	 
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
		$this->load->model('user','',TRUE);
		$this->load->model('plspagesetup_model','',TRUE);
		$this->load->library('form_validation');
	 }
	
	/**********************************************/ 
	
	function save(){
			
		$this->form_validation->set_rules('txtCampaign', 'Campaign Code', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txtForm', 'Form Id', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txtAffliate', 'Affliate Name', 'trim|required|xss_clean');
		$this->data['metatitle'] = 'Change Password';
		if($this->form_validation->run() == FALSE)
		{
			$this->data['subview']=  'members/plspagesetup_view';
			$this->load->view('members/_layout_main.php', $this->data);
		}else{
			$statusupdate = $this->plspagesetup_model->save_data();  
			if($statusupdate=='success'){
				$this->data['status']="success";
				// $this->data['subview']=  'members/plspagesetup_view';
				// $this->load->view('members/_layout_main.php', $this->data);
				$this->index();
			}else{
				$this->data['status']="failure";
				// $this->data['subview']=  'members/plspagesetup_view';
				// $this->load->view('members/_layout_main.php', $this->data);
				$this->index();
			}	
		}
	 }
	 
	/**********************************************/
	
	 function index()
	 {
		if($this->session->userdata('client_login'))
		{	
			$session_login_client=$this->session->userdata('client_login');
			$plv_data=$this->user->get_pure_leverage_data($session_login_client['user_track_id']);
			$this->data['plv_data']=$plv_data;
			
			// $this->data['campaign_code'] = $this->plspagesetup_model->getCampaignCode();
			// $this->data['form_id'] = $this->plspagesetup_model->getFormID();
			// $this->data['affiliatename'] = $this->plspagesetup_model->getAffiliateName();
			$this->data['metatitle'] = 'PureLeverage Squeeze Page Set Up';
			$this->data['subview']=  'members/plspagesetup_view';
			$this->load->view('members/_layout_main', $this->data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	 
	 
	}
