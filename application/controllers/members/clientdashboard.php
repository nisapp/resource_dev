<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
	class Clientdashboard extends CI_Controller {
	 
	 function __construct()
	 {
	  	 parent::__construct();

		 $this->load->model('menu_model','',TRUE);
		// check for validate user login
		$session_login_client=$this->session->userdata('client_login');
		if (!($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user')) {
			redirect('/', 'refresh');
		}else{
			$strMenus=$this->menu_model->getMenuData_array();
			$this->session->set_userdata('menu_data_in_session', $strMenus);
		}
		$this->load->model('client','',TRUE);
		$this->load->model('video','',TRUE);
		$this->load->helper('cookie');
	 }
	 
	
	 function index()
	 {
		if($this->session->userdata('client_login'))
		{
			// $session_data = $this->session->userdata('client_login');
			// $this->data['username'] = $session_data['username'];
			$this->data['client_full_data']=$this->client->get_current_login_client_detail();
			$this->data['metatitle'] = 'Setup Videos Step 1';
			$this->data['scriptlist'][]='jwplayer/jwplayer.js';
			// $this->data['scriptlist'][]='scripts/previewplayer.js';
			$this->data['query'] = $this->video->GetAllVideoData();
			
			$this->data['subview']=  'members/clientdashboard';
			$this->load->view('members/_layout_main.php', $this->data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	 
	 function savegvo(){
			if($this->input->post('btnGvo'))
			{	
				$strId=$this->input->post('txtGvoid');
				if(isset($strId) && ($strId!='')){
					$res=$this->client->save_gvo_id_from_dashboard($strId);
					if($res){
						$this->set_redirect_msg('gvo_success');
					}
				}
			}else{
				$this->index();
			}
	 }
	 
	 function saveemp(){
		if($this->input->post('btnEmp'))
		{	
			$strId=$this->input->post('txtEmpid');
			if(isset($strId) && ($strId!='')){
				$res=$this->client->save_emp_id_from_dashboard($strId);
				if($res){
					$this->set_redirect_msg('emp_success');
				}
			}
		}else{
			$this->index();
		}
	 }
	 function savepure(){
			if($this->input->post('btnPure'))
			{	
				$strId=$this->input->post('txtPureid');
				if(isset($strId) && ($strId!='')){
					$res=$this->client->save_pure_id_from_dashboard($strId);
					if($res){
						$this->set_redirect_msg('pure_success');
					}
				}
			}else{
				$this->index();
			}
	 }
	 function set_redirect_msg($state){
			$session_data = $this->session->userdata('client_login');
			$this->data['client_full_data']=$this->client->get_current_login_client_detail();
			$this->data['username'] = $session_data['username'];
			$this->data['metatitle'] = 'Setup Videos Step 1';
			$this->data['scriptlist'][]='jwplayer/jwplayer.js';
			$this->data['query'] = $this->video->GetAllVideoData();
			$this->data['status'] = $state;
			
			$this->data['subview']=  'members/clientdashboard';
			$this->load->view('members/_layout_main.php', $this->data);
	 }
	 
	 function logout()
	 {
		session_start();
		// echo '<pre>';
		// print_r($_COOKIE);
		// echo '</pre>';
		$this->session->unset_userdata('client_login');
		$this->session->unset_userdata('menu_data_in_session');
		  $this->session->set_userdata('client_logut', TRUE);
		delete_cookie("username");
		delete_cookie("password");
		delete_cookie("remeber_me");
		session_destroy();
		// echo '<pre>';
		// print_r($_COOKIE);
		// echo '</pre>';
		redirect('/', 'refresh');
	 }
	 
	}
	 
	?>