<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
class Email extends CI_Controller {
	 
	function __construct()
	{
		parent::__construct();
		// check for validate user login
		$session_login_client=$this->session->userdata('client_login');
		if (!($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user')) {
			$this->show_error_view();
		}
		$this->load->model('client','',TRUE);
		$this->load->library('form_validation');
	}

	function show_error_view(){
		$this->data['error_message']='Please First Login to access this page';
		$this->data['error_redirect']=base_url().'login';
		$this->load->view('clientadmin/error_view.php',$this->data);
	}
	 
	function index()
	{	
		// check for validate user login
		$session_login_client=$this->session->userdata('client_login');
		if (($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user')) {
			$this->data['welcome_mail_data']= $this->client->get_welcome_email_data();  
			$this->data['subview']=  'clientadmin/email/welcome_email_rule_view';
			$this->load->view('clientadmin/_layout_main.php', $this->data);
		}	
	}

	function femail(){
		$session_login_client=$this->session->userdata('client_login');
		if (($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user'))
		{
			$this->data['followup_mail_data']= $this->client->get_followup_email_data();  
			$this->data['subview']=  'clientadmin/email/followup_email_rule_view';
			$this->load->view('clientadmin/_layout_main.php', $this->data);
		}
	}
	
	function setfollowrule(){
		$this->form_validation->set_rules('txtSubject', 'Email Subject', 'required|xss_clean');
		$this->form_validation->set_rules('txtFromEmail', 'From Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('txtMessage', 'Email Message', 'required|xss_clean|');
		if($this->form_validation->run() == FALSE)
		{	
			$this->data['followup_mail_data']= $this->client->get_followup_email_data(); 
			$this->data['subview']=  'clientadmin/email/followup_email_rule_view';
			$this->load->view('clientadmin/_layout_main.php', $this->data);
		}else{
			$statusupdate = $this->client->set_followup_email_rule();  
			if($statusupdate){
				$this->data['status']="success";
				$this->data['followup_mail_data']= $this->client->get_followup_email_data(); 
				$this->data['subview']= 'clientadmin/email/followup_email_rule_view';
				$this->load->view('clientadmin/_layout_main.php', $this->data);
			}else{
				$this->data['status']="failure";
				$this->data['subview']= 'clientadmin/email/followup_email_rule_view';
				$this->load->view('clientadmin/_layout_main.php', $this->data);
			}	
		}
	
	}
	function setrules(){
		$this->form_validation->set_rules('txtSubject', 'Email Subject', 'required|xss_clean');
		$this->form_validation->set_rules('txtFromEmail', 'From Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('txtMessage', 'Email Message', 'required|xss_clean|');
		if($this->form_validation->run() == FALSE)
		{	
			$this->data['welcome_mail_data']= $this->client->get_welcome_email_data(); 
			$this->data['subview']=  'clientadmin/email/welcome_email_rule_view';
			$this->load->view('clientadmin/_layout_main.php', $this->data);
		}else{
			$statusupdate = $this->client->set_welcome_email_rule();  
			if($statusupdate){
				$this->data['status']="success";
				$this->data['welcome_mail_data']= $this->client->get_welcome_email_data(); 
				$this->data['subview']= 'clientadmin/email/welcome_email_rule_view';
				$this->load->view('clientadmin/_layout_main.php', $this->data);
			}else{
				$this->data['status']="failure";
				$this->data['subview']= 'clientadmin/email/welcome_email_rule_view';
				$this->load->view('clientadmin/_layout_main.php', $this->data);
			}	
		}
	}
	
}
	 
	?>