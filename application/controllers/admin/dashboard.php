<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
	class Dashboard extends CI_Controller {
	 
	 function __construct()
	 {
	  	 parent::__construct();

		// check for validate user login
		$session_login_user=$this->session->userdata('logged_in');
		if (!($session_login_user['login_state'] == 'active' && $session_login_user['role'] == 'admin')) {
			redirect('/', 'refresh');
		}
	 }
	 
	 function index()
	 {
	   if($this->session->userdata('logged_in'))
	   {
	     $session_data = $this->session->userdata('logged_in');
	     $this->data['username'] = $session_data['username'];
	     $this->data['subview']=  'admin/dashboard';
		 $this->load->view('admin/_layout_main.php', $this->data);
	   }
   else
	   {	
	     //If no session, redirect to login page
			redirect('login', 'refresh');
			// redirect('/home');
	   }
	 }
	 
	 function logout()
	 {
		session_start();
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('login', 'refresh');
	 }
	 
	}
	 
	?>