<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
	class Logos extends CI_Controller {
	 
	 function __construct()
	 {
		parent::__construct();
		$this->load->model('logo','',TRUE);
		$this->load->helper(array('url', 'form'));
		// check for validate user login
		$session_login_user=$this->session->userdata('logged_in');
		if (!($session_login_user['login_state'] == 'active' && $session_login_user['role'] == 'admin')) {
			redirect('/', 'refresh');
		}
	 }
	 
	function index()
	{
		$this->data['query'] = $this->logo->GetLogoData();
		$this->data['subview']=  'admin/logo/logolist';
		$this->load->view('admin/_layout_main.php', $this->data);
	}
	
	

	// function savelogo()
	// {
            // if($this->input->post('save_logo')){
                // $statusinsert = $this->logo->InsertVideoData();  
				// if($statusinsert)
					// $this->data['status']="success";
				// else
					// $this->data['status']="failure";			
                // }
			// $this->index();		 
	// }
			
	
	function change_logo($updateid){
		//echo $updateid;
		if($this->input->post('update_logo'))
			{
				$statusupdate = $this->logo->UpdateLogoData($updateid);  
				if($statusupdate)
				$this->data['status']="updatesuccess";
				else
				$this->data['status']="updatefailure";			
				$this->index();
			}
			else
			{
				$query= $this->logo->GetLogoData($updateid);
				$queryresult =$query->result();
				$this->data['logodataarray'] =$queryresult[0];
				$this->data['todo'] = "updation";
				$this->data['subview']=  'admin/logo/addlogo';
				$this->load->view('admin/_layout_main.php', $this->data);
			}
		}
	 
	 }
	 
	
	 
	?>