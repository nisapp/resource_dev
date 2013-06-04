<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 
	class Login extends CI_Controller {
		 
		function __construct()
		{	
			parent::__construct();
			$this->load->library('session');
			$this->load->model('user','',TRUE);
			$this->load->model('client','',TRUE);
			$this->load->library('email');
			$this->load->library('form_validation');
		}
	 	 
		function admin_login(){//admin login--index
			/*======---- This code is not add by me------=====*/
			if($this->session->userdata('logged_in')){
			//Chek if user has already loged in redirect to dashaboard if role is admin and to home if user 
				$logged_in = $this->session->userdata('logged_in');
				if($logged_in['role']=='admin'){
					redirect('/admin/dashboard');
				}
				else{
					redirect('/home');
				}
			}
                        $this->load->helper(array('form'));
			/*======---- End of the code is not add by me------=====*/

			if($this->input->post('admin_login')!==FALSE){
				$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

				if($this->form_validation->run() == FALSE)
				{
					//Field validation failed.  User redirected to login page
					$this->load->view('login_view');
				}
				else
				{
				//Go to private area
					$sessionarray = $this->session->userdata('logged_in');
					if($sessionarray['role'] == "admin"){
						redirect('admin/dashboard', 'refresh');
					}
					else
					{
						redirect('clientadmin/clientdashboard', 'refresh');
					}
				}		
			}else{
				$this->load->view('login_view');
			}
		}
		//to verify the login 
		
		/*
		function verifylogin(){
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

			if($this->form_validation->run() == FALSE)
			{
				//Field validation failed.  User redirected to login page
				$this->load->view('login_view');
			}
			else
			{
			//Go to private area
				$sessionarray = $this->session->userdata('logged_in');
				if($sessionarray['role'] == "admin"){
					redirect('admin/dashboard', 'refresh');
				}
				else
				{
					redirect('clientadmin/clientdashboard', 'refresh');
				}
			}		
		}//*/
		
		
		//this function is associated with the verification of the user data against database calling the model file from this function 
		function check_database($password)
		 {
		   //Field validation succeeded.  Validate against database
		   $username = $this->input->post('username');
		   $result = $this->user->login($username, $password);
		   if($result)
		   {
			 $sess_array = array();
			 foreach($result as $row)
			 {
			   $sess_array = array(
				 'id' => $row->id,
				 'username' => $row->user_name,
				 'fullname' => $row->first_name." ".$row->last_name,
				 'role' => $row->role,
				 'login_state' => 'active',
			   );
			   $this->session->set_userdata('logged_in', $sess_array);
			   
			 }
			 return TRUE;
		   }
		   else
		   {
			 $this->form_validation->set_message('check_database', 'Invalid username or password');
			 return false;
		   }
		 }
		 
		function index(){//clientlogin
			if($this->input->post('client_login')!==NULL){
				$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_client_database');

				if($this->form_validation->run() == FALSE)
				{
					//Field validation failed.  User redirected to login page
					$this->load->view('client_login_view');
					// echo 'Error';
				}
				else
				{
					$client_sessionarray = $this->session->userdata('client_login');
					// echo '<pre>';
					// print_r($client_sessionarray);
					// echo '</pre>';
					// die("hhhhhhhhhhhhh");
					if($client_sessionarray['role'] == "user"){
						redirect('clientadmin/clientdashboard', 'refresh');
					}
					else
					{
						redirect('login', 'refresh');
					}
					// echo 'sssss';
				}
			}else{
					$this->load->view('client_login_view');
			}
		}
		/*
		function verifyclientlogin(){
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_client_database');

			if($this->form_validation->run() == FALSE)
			{
				//Field validation failed.  User redirected to login page
				$this->load->view('client_login_view');
				// echo 'Error';
			}
			else
			{
				$client_sessionarray = $this->session->userdata('client_login');
				// echo '<pre>';
				// print_r($client_sessionarray);
				// echo '</pre>';
				// die("hhhhhhhhhhhhh");
				if($client_sessionarray['role'] == "user"){
					redirect('clientadmin/clientdashboard', 'refresh');
				}
				else
				{
					redirect('home', 'refresh');
				}
				// echo 'sssss';
			}
		}//*/
		
		function check_client_database($password){
			$username = $this->input->post('username');
			$result = $this->client->client_login($username, $password);
			if($result)
			{
				$sess_array = array();
				foreach($result as $row)
				{
					$response_1 = array(
									'id' => $row->id,
									'username' => $row->user_name,
									'fullname' => $row->first_name." ".$row->last_name,
									'role' => $row->role,
									'login_state' => 'active',
									'user_track_id' => $row->user_track_id,
									);
					if($row->affiliate_user_id!=''){	
						$sponser_qry=$this->client->GetClientData($row->affiliate_user_id);
						$sponser_data=$sponser_qry->row_array();
						$sponser_full_name=$sponser_data['first_name'].' '.$sponser_data['last_name'];
						
						// echo '<pre>';
						// print_r($sponser_data);
						// echo '</pre>';die();

						$is_sponser=array('sponser_full_name'=>$sponser_full_name);		
						
						$sess_array=array_merge($response_1,$is_sponser);			
					}else{
						$sess_array=$response_1;
					}
					$this->session->set_userdata('client_login', $sess_array);
				}
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('check_client_database', 'Invalid username or password');
				return false;
			}
	   }

	 
		function verifysignup(){
			$this->load->helper('url');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('login_firstname',  'FirstName',  'required|xss_clean');
			$this->form_validation->set_rules('login_username',  'Username',  'required|xss_clean');			   
			$this->form_validation->set_rules('login_email',  'Email',  'required|valid_email|xss_clean');
			$this->form_validation->set_rules('login_password',  'Password',  'required|min_length[5]|xss_clean|callback_insert_database');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('login_view');
			}
			else {
				redirect('home', 'refresh');
			}
		}

		//this function is associated with insertion of the user data in the database
		function insert_database($loginpassword)
		{
			$wholedata=array();
			//Field validation succeeded.  insert to database
			$firstname = $this->input->post('login_firstname');
			$lastname = $this->input->post('login_lastname');
			$username = $this->input->post('login_username');
			$loginemail = $this->input->post('login_email');
			// $companyorg = $this->input->post('company_org');
			$encryptpass=md5($loginpassword);
			$wholedata=array(	
				'first_name' => $firstname ,
				'last_name' => $lastname ,
				'user_name' => $username ,
				'password' => $encryptpass ,
				'real_password' => $loginpassword ,
				'role'       => 'user',
				'user_email' => $loginemail,										
			);
			//calling the modal class
			$result = $this->user->signup($wholedata);
			if($result)
			{
				$sess_array = array();
				$sess_array = array(
										'id' => $result['id'],
										'username' => $result['user_name'],
										'fullname' => $result['full_name'],
										'role' => $result['role'],
									);
				$this->session->set_userdata('logged_in', $sess_array);
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('insert_database', 'error saving user data');
				return false;
			}
		}
	 
	}