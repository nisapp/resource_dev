<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
	class Clientdashboard extends CI_Controller {
	 
	 function __construct()
	 {
	  	 parent::__construct();

		// check for validate user login
		$session_login_client=$this->session->userdata('client_login');
		if (!($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user')) {
			redirect('login/clientlogin', 'refresh');
		}
	 }
	 
	 function index()
	 {
		if($this->session->userdata('client_login'))
		{
			$session_data = $this->session->userdata('client_login');
			$this->data['username'] = $session_data['username'];
			$this->data['subview']=  'clientadmin/clientdashboard';
			$this->load->view('clientadmin/_layout_main.php', $this->data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	 
	 function logout()
	 {
		session_start();
		$this->session->unset_userdata('client_login');
		session_destroy();
		redirect('login/clientlogin', 'refresh');
	 }
	 
	}
	 
	?>