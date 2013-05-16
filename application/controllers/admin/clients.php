<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
	class Clients extends CI_Controller {
	 
	 function __construct()
	 {
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('client','',TRUE);
		$this->load->helper(array('url', 'form'));
		// check for validate user login
		$session_login_user=$this->session->userdata('logged_in');
		if (!($session_login_user['login_state'] == 'active' && $session_login_user['role'] == 'admin')) {
			redirect('login', 'refresh');
		}
	 }
	 
	function index()
	{
		$this->data['query'] = $this->client->GetClientData();
		$this->data['subview']=  'admin/clients/clients_listing';
		$this->load->view('admin/_layout_main.php', $this->data);
	}
	
	
	function deleteclient($id){
		// echo $id;
		if(isset($id)){
			$statusdelete = $this->client->remove_client($id);	

			if($statusdelete==true)
				$this->data['status']="deletesuccess";
			else if($statusdelete==false)
				$this->data['status']="deletefailure";
		}
		$this->index();
		
	}
	
	 
}
	 
	
	 
	?>