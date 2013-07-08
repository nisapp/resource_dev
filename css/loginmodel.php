<?php
	class Loginmodel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->library('email');		
	}
	
	function insert_signup_data(){	//var_dump($_POST);	
			$wholedata=array();		
			$fullname = $this->input->post('login_fullname');
			$username = $this->input->post('login_username');
			$loginemail = $this->input->post('login_email');
			$companyorg = $this->input->post('company_org');
			$loginpassword=$this->input->post('login_password');
			$encryptpass=md5($loginpassword);
			$data=array('full_name' => $fullname ,'user_name' => $username ,'password' => $encryptpass ,'real_password' => $loginpassword ,'user_email' => $loginemail,'organisation' => $companyorg );		
			
		if($this->db->insert('users',$data)){
			$lastuserid = $this->db->insert_id();
			$userarray = array(
						   'id' => $lastuserid,
						   'user_name'=> $data['user_name'],
						   'full_name' =>$data['full_name']
						);
			$this->send_signup_mail($loginemail);			
			$this->session->set_userdata('user_info', $userarray);	
			echo 'Thanks for signup,This site is under construction now';	
		}else{
			  echo 'Some Technical Error Occur, Please try again later';
			 }
			
	}
	public function send_signup_mail($email){		 
				$this->email->from(ADMIN_EMAIL,ADMIN_NAME);
				//$this->email->to(TESTING_EMAIL);
				$this->email->to($email);			
				$this->email->subject('Email Test');
				$this->email->message('Thanks for signup.');
				$this->email->send();
				//$this->email->print_debugger();
	  }
			
			
		
}
?>