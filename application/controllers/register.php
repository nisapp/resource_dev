<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 
	class Register extends CI_Controller {
		 
	 function __construct()
	 {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('logo','',TRUE);
		$this->load->model('client','',TRUE);
		$this->load->model('user','',TRUE);
	}
	 	 
	 function index()
	 {
		$this->load->helper(array('form'));
		$this->data['query'] = $this->logo->GetInitData();
		$this->load->view('user_registration',$this->data);
	 }
	 
	 
	function chkUserName($name=false){
		if(isset($name) && ($name!='')){
			$is_username_exist=$this->user->check_username_exists($name);
		}else{
			$is_username_exist=$this->user->check_username_exists($_POST['username']);
		}
		if($is_username_exist==0){
			echo 1;
		}else{
			echo 0;
		}
		die();
	}
		
	 //to verify the login 
	 function verifylogin(){
	 
	   $this->load->library('form_validation');
	 
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
				redirect('home', 'refresh');
		 }
	   }		
					
				 
				 
				 
	 }
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
	 
	 
	 function verifysignup(){
               $this->form_validation->set_rules('login_firstname','FirstName','required|xss_clean');
               $this->form_validation->set_rules('login_lastname','LastName','required|xss_clean');
			   $this->form_validation->set_rules('login_username','Username','trim|required|min_length[5]|xss_clean');			   
               $this->form_validation->set_rules('login_email','Email','required|valid_email|xss_clean');
               $this->form_validation->set_rules('login_password','Password','required|min_length[5]|xss_clean|callback_insert_database');
				// echo '>>>>>>>--'.$this->form_validation->run();
				// die();
                    if($this->form_validation->run()==FALSE){
						// echo 'I m in error';
						$this->data['query'] = $this->logo->GetInitData();
						$this->load->view('user_registration',$this->data);
                     }else{
							// echo 'I m Not in error';
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
		$loginphone = $this->input->post('login_phone');
		$loginemail = $this->input->post('login_email');
		$encryptpass=md5($loginpassword);
		$strdate=date("Y-m-d h:i:s");
		$is_username_exist=$this->user->check_username_exists($username);
		if($is_username_exist==0)
		{
			$is_afflitate_user=$this->session->userdata('affuserid');
			$wholedata1=array(	
								'first_name' => $firstname ,
								'last_name' => $lastname ,
								'user_name' => $username ,
								'password' => $encryptpass ,
								'real_password' => $loginpassword ,
								'role'       => 'user',
								'user_email' => $loginemail,										
								'phone_number' => $loginphone, 	
								'signup_date' => $strdate 	
							);
			if(isset($is_afflitate_user) && $is_afflitate_user!=''){
				$affuser=array('affiliate_user_id'=>$this->input->post('afflitate_user_id'));
				$wholedata = array_merge($affuser,$wholedata1);
			}else{
				$wholedata = $wholedata1;
			}

			//calling the modal class
			$result = $this->user->signup($wholedata);
				
			if($result=='invalid_affliate_id')
			{	
				// echo 'invalid_affliate_id_eeeeeeeeee';
				$this->data['error_message']='Either invalid Link or Some error occur';
				$this->data['error_redirect']=base_url().'register';
				$this->load->view('error_view.php',$this->data);
				return false;
				die();
				
			}else if($result=='allready_signup'){
				// echo 'allready_signup_error_eeeeeeeeeee';
				$this->data['error_message']='You allready signup using this link<br/>Click below link for login';
				$this->data['error_redirect']=base_url().'login/clientlogin';
				$this->load->view('error_view.php',$this->data);
				return false;
				die();
			}else{
				// send follow up email after user sign up by affliate user
				if (array_key_exists('affiliate_user_id', $wholedata)){
					$this->client->send_followup_email($wholedata);
				}
				$this->session->unset_userdata('affuserid');
				
				// $t=$this->session->all_userdata();
				// echo '<pre>';
				// print_r($t);
				// echo '</pre>';
				// die(">>>>>>");
				$sess_array = array();
				$sess_array = array(
									'id' => $result['id'],
									'username' => $result['user_name'],
									'fullname' => $result['full_name'],
									'role' => $result['role'],
									'user_track_id' => $result['user_track_id'],
									'login_state' => 'active',
									);
				$this->session->set_userdata('client_login', $sess_array);
				return TRUE;
				die();
				
			}
		}else{
			// echo 'user name allready exist error';
			$this->data['error_message']='Opps! User name allready exist error<br/>Click below link for login';
			$this->data['error_redirect']=base_url();
			$this->load->view('error_view.php',$this->data);
			return false;
			return false;
			die();
		}
	}
}