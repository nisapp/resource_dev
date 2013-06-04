<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
	Class Client extends CI_Model
	{
		function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->library('email');
		}
		
		function GetClientData($id = false)
		{		
			$this->db->select('c.*');
			$this->db->from('users as c');
			
			$this->db->where('role','user');
			if($id){
				$this->db->where('id',$id);
			}
			$query = $this->db->get();
			return $query;
		}
		
		function client_login($username, $password)
		{
			// echo $username;
			// echo $password;
			// die(">>>>>>>>>>");
			$this -> db -> select('*');
			$this -> db -> from('users');
			$this -> db -> where('user_name', $username);
			$this -> db -> where('password', md5($password));
			$this -> db -> where("role !="."'admin'");
			// $this -> db -> limit(1);
			$query = $this->db->get();
			// echo $this->db->last_query();
			// die();
			if($query->num_rows == 1) {
				return $query->result();			
			}else{
				return false;
			}
		}
		
		
		function get_current_login_client_detail(){
			$t=$this->session->userdata('client_login');
			$this -> db -> select('*');
			$this -> db -> from('users');
			$this -> db -> where('user_name', $t['username']);
			$this -> db -> where('id', $t['id']);
			$this -> db -> where('user_track_id', $t['user_track_id']);
			$query = $this->db->get();
			if($query->num_rows == 1) {
				return $query->row_array();			
			}else{
				return false;
			}
		}
		function send_invitation($insert_data = array()){
				$t2=$this->get_current_login_client_detail();
				$config['protocol'] = 'mail';
				$config['wordwrap'] = FALSE;
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['crlf'] = "\r\n";
				$config['newline'] = "\r\n";
				$this->email->initialize($config);
				
				$mail_rules=$this->get_welcome_email_data();
				// $this->email->from(ADMIN_EMAIL,ADMIN_NAME);
				$this->email->from($mail_rules['from_email']);
				$this->email->subject($mail_rules['email_subject']);
				$to=$insert_data['invite_user_email'];
				// $to='vipinwebguru@gmail.com';
				$this->email->to($to);
					
				// echo '<pre>';
				// print_r($mail_rules);
				// echo '</pre>';
				 $mail_template=$mail_rules['message'];
				
				// $msg="<p>Hello<b> ".$insert_data['fname']." ".$insert_data['lname']."</b></p>";
				// $msg.="<p><b>".$t2['first_name']." ".$t2['last_name']."</b> invite you to join resorce bay to promote website.To sign up the account click on the following link or copy-paste it in your browser: </p>";
				$strLink=base_url()."landing/affuser/".$t2['user_track_id'];
				$receiver_name=$insert_data['fname'].' '.$insert_data['lname'];
				$sender_name=$t2['first_name'].' '.$t2['last_name'];
				$mail_template=str_replace("{{receiver_name}}",$receiver_name,$mail_template); 
				$mail_template=str_replace("{{sender_name}}",$sender_name,$mail_template); 
				$mail_template=str_replace("{{my_afflitate_link}}",$strLink,$mail_template); 
				
				// echo $mail_template;
				// die("dddd");
				$this->email->message($mail_template);
				$response=$this->email->send();
				if($response){
					return true;
				}
				// return true;
				//$this->email->print_debugger();
		}
		
		function save_emp_id_from_dashboard($gvoid = false){
			$login_client=$this->get_current_login_client_detail();
					
			$datatoupdate = array(
									'emp_netwrok_user_name'=>$gvoid
								);
			$this->db->where('id', $login_client['id']);
			$this->db->where('user_track_id', $login_client['user_track_id']);
			$this->db->trans_start();
			$status = $this->db->update('users', $datatoupdate);
			$this->db->trans_complete();
			if($status){
				return true;
			};
		}
		
		function save_pure_id_from_dashboard($gvoid = false){
			$login_client=$this->get_current_login_client_detail();
					
			$datatoupdate = array(
									'leverage_user_name'=>$gvoid
								);
			$this->db->where('id', $login_client['id']);
			$this->db->where('user_track_id', $login_client['user_track_id']);
			$this->db->trans_start();
			$status = $this->db->update('users', $datatoupdate);
			$this->db->trans_complete();
			if($status){
				return true;
			};
		}
		function save_gvo_id_from_dashboard($gvoid = false){
				$login_client=$this->get_current_login_client_detail();
					
				$datatoupdate = array(
										'gvo_user_name'=>$gvoid
									);
				$this->db->where('id', $login_client['id']);
				$this->db->where('user_track_id', $login_client['user_track_id']);
				$this->db->trans_start();
				$status = $this->db->update('users', $datatoupdate);
				$this->db->trans_complete();
				if($status){
					return true;
				};
				
				// echo '<pre>';
				// print_r($info);
				// echo '</pre>';
				// die();
				// return true;
		}	
		
		function remove_client($deleteid = false)
		{
			$this->db->delete('users', array('id' => $deleteid,'role'=>'user')); 
			// echo $this->db->last_query(); 
			return ($this->db->affected_rows() > 0) ? TRUE : FALSE;	
		}
		function set_password(){
			$login_client=$this->get_current_login_client_detail();
			$old_pwd=$login_client['password'];
			// echo '<pre>';
			// print_r($session_login_client);
			// echo '</pre>';die();
			$current_pwd = $this->input->post('txtCurrent');
			$new_pwd = $this->input->post('txtNewpwd');
			$confirm_pwd = $this->input->post('txtConfirmpwd');
			
			if($old_pwd==md5($current_pwd)){
				// echo 'pss mat';
				if($new_pwd==$confirm_pwd){
					$my_password=md5($confirm_pwd);
					$datatoupdate = array(
											'password'=>$my_password,
											'real_password'=>$new_pwd
										);
					$this->db->where('id', $login_client['id']);
					$this->db->where('user_track_id', $login_client['user_track_id']);
					$this->db->trans_start();
					$status = $this->db->update('users', $datatoupdate);
					$this->db->trans_complete();
					if($status){
						return 'success';
					};
				}else{
					return 'notconfirm';
					// die();
				}
			}else{
				// echo '<h1>Opps!! Your current password does not match.</h1>';
				return 'notmatch';
			}
			return false;
		}
			
		function update_account_detail(){
			$session_login_client=$this->session->userdata('client_login');

			$fname = $this->input->post('txtFname');
			$lname = $this->input->post('txtLname');
			$phone = $this->input->post('txtPhone');
			$email = $this->input->post('txtEmail');
			$gvo_name = $this->input->post('txt_gvo_user');
			$leverage_name = $this->input->post('txt_lev_user');
			$empower_name = $this->input->post('txt_emp_user');
			
			$datatoupdate = array(
								'first_name'=>$fname,
								'last_name'=>$lname,
								'phone_number'=>$phone,
								'user_email'=>$email,
								'gvo_user_name'=>$gvo_name,
								'leverage_user_name'=>$leverage_name,
								'emp_netwrok_user_name'=>$empower_name
							);
			
			$this->db->where('id', $session_login_client['id']);
			$this->db->where('user_track_id', $session_login_client['user_track_id']);
			$this->db->trans_start();
			$status = $this->db->update('users', $datatoupdate); 
			$this->db->trans_complete();
			// echo $this->db->last_query();
			return $status;
		
		}
		function GetUnderClient()
		{		
			$t=$this->session->userdata('client_login');
			$affid=$t['user_track_id'];
			$this->db->select('*');
			$this->db->from('users' );
			$this->db->where('role','user');
			$this->db->where('affiliate_user_id',$affid);
			$query = $this->db->get();
			// echo $this->db->last_query();
			// die();
			return $query;
		}
	/* ### **** ### *** ###-- Code to set Email rules --### **** ### *** ###  **** ### **** ### ****/

		function get_welcome_email_data(){
			// code to check whether client allready set welcome email rules
			$result=$this->get_client_welcome_email();
			
			$is_welcome_email=count($result);
			// proceed if client allready set welcome email rules
			if($is_welcome_email){
				$mail_data=array(
							'email_subject'=>$result['subject'],	
							'from_email'=>$result['from_email'],	
							'message'=>$result['message'],	
							'email_type'=>$result['email_type'],
							'is_welcome_email_data_exist'=>1
							);
			}else{
				// case when client not set welcome email rules
				$mail_data=$this->get_default_welcome_email_array();
			}
			// echo '<pre>';
			// print_r($mail_data);
			// echo '</pre>';
			return $mail_data;
		}
		
		function get_default_welcome_email_array(){
			$this -> db -> select('*');
			$this -> db -> from('email_rules');
			$this -> db -> where('email_type', 'default');
			$this -> db -> limit(1);
			$query = $this->db->get();
			$res=$query->row_array(); 
			$default=array(
							'email_subject'=>$res['subject'],	
							'from_email'=>$res['from_email'],	
							'message'=>$res['message'],	
							);
			return $default;
		}
		
		function get_client_welcome_email(){
			$t=$this->session->userdata('client_login');
			$this -> db -> select('*');
			$this -> db -> from('email_rules');
			$this -> db -> where('email_type', 'welcome');
			$this -> db -> where('user_track_id', $t['user_track_id']);
			$this -> db -> where('user_id', $t['id']);
			$this -> db -> limit(1);
			$query = $this->db->get();
			return $query->row_array(); 
		}
		
		
		function set_welcome_email_rule(){
			$login_client=$this->get_current_login_client_detail();
			$email_sub = $this->input->post('txtSubject');
			$from_email = $this->input->post('txtFromEmail');
			$email_content = $this->input->post('txtMessage');
			$is_update = $this->input->post('is_update');
			$data = array(
                        'subject'=>$email_sub,
                        'from_email'=>$from_email,
                        'message'=>$email_content,
                        'email_type'=>'welcome',
                        'user_id'=>$login_client['id'],
                        'user_track_id'=>$login_client['user_track_id'],
                        'inserted_on'=>date("Y-m-d h:i:s") 
						);
			//start of the transaction 
			$this->db->trans_start();
			if(isset($is_update) && $is_update=='1'){ 
				$this->db->where('user_id', $login_client['id']);
				$this->db->where('user_track_id', $login_client['user_track_id']);
				$this->db->where('email_type', 'welcome');
				$result = $this->db->update('email_rules', $data); 
			}else{
				$result=$this->db->insert('email_rules',$data);
			}
			$this->db->trans_complete();
			// echo $this->db->last_query(); 
			// die();
			return $result;
		}
			
	/*===============Code for follow up email rule ====================*/
		function get_followup_email_data(){
			// code to check whether client allready set follow_up email rules
			$result=$this->get_client_followup_email();
			
			$is_followup_email=count($result);
			// proceed if client allready set welcome email rules
			if($is_followup_email){
				$mail_data=array(
							'email_subject'=>$result['subject'],	
							'from_email'=>$result['from_email'],	
							'message'=>$result['message'],	
							'email_type'=>$result['email_type'],
							'is_followup_email_data_exist'=>1
							);
			}else{
				// case when client not set welcome email rules
				$mail_data=$this->get_default_welcome_email_array();
			}
			// echo '<pre>';
			// print_r($mail_data);
			// echo '</pre>';
			return $mail_data;
		}
		
		
		function get_client_followup_email($track_id=false){
			$t=$this->session->userdata('client_login');
			$this -> db -> select('*');
			$this -> db -> from('email_rules');
			$this -> db -> where('email_type', 'follow');
			if(isset($track_id) && ($track_id!='')){
				$this -> db -> where('user_track_id', $track_id);
			}else{
				$this -> db -> where('user_track_id', $t['user_track_id']);
				$this -> db -> where('user_id', $t['id']);
			}
			$this -> db -> limit(1);
			$query = $this->db->get();
			return $query->row_array(); 
		}
		
		function set_followup_email_rule(){
			$login_client=$this->get_current_login_client_detail();
			$email_sub = $this->input->post('txtSubject');
			$from_email = $this->input->post('txtFromEmail');
			$email_content = $this->input->post('txtMessage');
			$is_update = $this->input->post('is_update');
			$data = array(
                        'subject'=>$email_sub,
                        'from_email'=>$from_email,
                        'message'=>$email_content,
                        'email_type'=>'follow',
                        'user_id'=>$login_client['id'],
                        'user_track_id'=>$login_client['user_track_id'],
                        'inserted_on'=>date("Y-m-d h:i:s") 
						);
			//start of the transaction 
			$this->db->trans_start();
			if(isset($is_update) && $is_update=='1'){ 
				$this->db->where('user_id', $login_client['id']);
				$this->db->where('user_track_id', $login_client['user_track_id']);
				$this->db->where('email_type', 'follow');
				$result = $this->db->update('email_rules', $data); 
			}else{
				$result=$this->db->insert('email_rules',$data);
			}
			$this->db->trans_complete();
			// echo $this->db->last_query(); 
			// die();
			return $result;
		}
		/*===============End of Code for follow up email rule ====================*/
		function save_program_affliate_id($progid){
			$login_client=$this->get_current_login_client_detail();
			$user_id=$login_client['id'];
			$affliate_id=$this->input->post('aff_id');
			$program_id=$this->input->post('prog_id');
			$data = array(
                        'userid'=>$user_id,
                        'programid'=>$program_id,
                        'affilateid'=>$affliate_id,
						);
			// check for duplicate
			$this->db->select('s.*');
			$this->db->from('stored_programs as s');
			$this->db->where('userid',$user_id);
			$this->db->where('programid',$program_id);
			$query = $this->db->get();
			$is_record_exist=$query->num_rows;
			// echo $this->db->last_query(); 
			$this->db->trans_start();
			if(isset($is_record_exist) && $is_record_exist=='0'){ 
				$result=$this->db->insert('stored_programs',$data);
			}else{
				$result = $this->db->update('stored_programs', $data); 
			}
			$this->db->trans_complete();
			// echo $result;
			if($result){
				return true;
			}else{
				return false;
			}
			// return $query;			
			// echo '<pre>';
			// print_r($login_client);
			// echo '</pre>';die();

		}	


		
	/* ### **** ### *** ###-- End of Code to set Email rules --### *** ### *** ### **** ### *** ### ****/
		function send_followup_email($user_detail=array())
		{
			// echo '<pre>';
			// print_r($user_detail);
			// echo '</pre>';
			// fetch follow up mail template of affliatate user 
			$result=$this->get_client_followup_email($user_detail['affiliate_user_id']);
			$is_followup_email=count($result);
			// proceed if client allready set welcome email rules
			if($is_followup_email){
				$s1=$result;
				$send=array(
						'from_email'=>$s1['from_email'],
						'email_subject'=>$s1['subject'],
						'message'=>$s1['message'],
						);
			}else{
				// case when client not set welcome email rules
				$send=$this->get_default_welcome_email_array();
			}
			
			$config['protocol'] = 'mail';
			$config['wordwrap'] = FALSE;
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['crlf'] = "\r\n";
			$config['newline'] = "\r\n";
			$this->email->initialize($config);
				
			$this->email->from($send['from_email']);
			$this->email->subject($send['email_subject']);
			$this->email->to($user_detail['user_email']);
			$mail_temp=$send['message'];
			$strLink=base_url()."landing/affuser/".$user_detail['affiliate_user_id'];
			$receiver_name=$user_detail['first_name'].' '.$user_detail['last_name'];
			// $sender_name=$t2['first_name'].' '.$t2['last_name'];
			$mail_temp=str_replace("{{receiver_name}}",$receiver_name,$mail_temp); 
			// $mail_temp=str_replace("{{sender_name}}",$sender_name,$mail_temp); 
			$mail_temp=str_replace("{{my_afflitate_link}}",$strLink,$mail_temp); 
			$this->email->message($mail_temp);
			$this->email->send();
			return true;
			
			// echo '<pre>';
			// print_r($res);
			// echo '</pre>';
			
			
		}	
	}
	?>