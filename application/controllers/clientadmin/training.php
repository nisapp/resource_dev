<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
	class Training extends CI_Controller {
	 
	 function __construct()
	 {
	  	 parent::__construct();

		// check for validate user login
		$session_login_client=$this->session->userdata('client_login');
		if (!($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user')) {
			redirect('login', 'refresh');
		}
		$this->load->model('training_model','',TRUE);
		$this->load->model('client','',TRUE);
		$this->load->library('form_validation');
	 }
	 
	 function tabs(){
			$this->data['subview']=  'clientadmin/site_dashboard';
			$this->load->view('clientadmin/_layout_main', $this->data);
	 }
	 
	 function index()
	 {
		if($this->session->userdata('client_login'))
		{
			$this->data['account_detail'] = $this->client->get_current_login_client_detail();
			$this->data['metatitle'] = 'EAP Training';
			$this->data['scriptlist'][]='jwplayer/jwplayer.js';
			 $this->data['query']=$this->training_model->getCategories();
             
			$this->data['subview']=  'clientadmin/training_view';
			$this->load->view('clientadmin/_layout_main', $this->data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	 }
	   function showdata($category){
			// echo 'i mmmmmmm';
			echo $html=$this->training_model->get_traing_data_by_category($category);
		}
	
}
	 
	?>