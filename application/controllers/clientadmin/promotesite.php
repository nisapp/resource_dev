<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
class Promotesite extends CI_Controller {
	 
	 function __construct()
	 {
		parent::__construct();
		// check for validate user login
		$session_login_client=$this->session->userdata('client_login');
		if (!($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user')) {
			redirect('login', 'refresh');
		}
		$this->load->model('client','',TRUE);
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
	 }
	 
	 
	 function index()
	 {
		if($this->session->userdata('client_login'))
		{
			$session_data = $this->session->userdata('client_login');
			$this->data['username'] = $session_data['username'];
			$this->data['subview']=  'clientadmin/promote_site_view';
			$this->load->view('clientadmin/_layout_main.php', $this->data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	/******* Code to show undersignup client **********/

	function downclient()
	{
		// $session_data = $this->session->userdata('client_login');
		$this->data['query'] = $this->client->GetUnderClient();
		$this->data['subview']=  'clientadmin/under_client_listing';
		$this->load->view('clientadmin/_layout_main.php', $this->data);
	}

	/******* End of Code to show undersignup client **********/
	
	function invite()
	{
		$this->form_validation->set_rules('txtFname', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txtLname', 'Last Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txtEmail', 'Email', 'trim|required|valid_email|xss_clean|callback_send_afflate_link');
		if($this->form_validation->run() == FALSE)
		{
			// echo 'i m in error';
			//Field validation failed.  User redirected to login page
			$this->data['subview']=  'clientadmin/promote_site_view';
			$this->load->view('clientadmin/_layout_main.php', $this->data);
		}
		else
		{
					// echo 'i m in Success';

			//Go to private area
			// $sessionarray = $this->session->userdata('logged_in');
			// if($sessionarray['role'] == "admin"){
				// redirect('admin/dashboard', 'refresh');
			// }
			// else
			// {
				// redirect('home', 'refresh');
			// }
		}		
		
	}
	
	function send_afflate_link($invite_user_email){
		$fname = $this->input->post('txtFname');
		$lname = $this->input->post('txtLname');
		$data=array(
					'fname'=>$fname,
					'lname'=>$lname,
					'invite_user_email'=>$invite_user_email,
				);
		$result = $this->client->send_invitation($data);
		if($result){
			$this->data['status']="success";
			$this->index();
		}	
	}	
	
}
	 
?>