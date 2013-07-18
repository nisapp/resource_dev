<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
class Promotesite extends CI_Controller {
	 
	 function __construct()
	 {
		parent::__construct();
		$this->load->model('menu_model','',TRUE);
		// check for validate user login
		$session_login_client=$this->session->userdata('client_login');
		if (!($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user')) {
			redirect('login', 'refresh');
		}else{
			$strMenus=$this->menu_model->getMenuData_array();
			$this->session->set_userdata('menu_data_in_session', $strMenus);
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
			$this->data['subview']=  'members/promote_site_view';
			$this->load->view('members/_layout_main.php', $this->data);
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
		$this->data['subview']=  'members/under_client_listing';
		$this->load->view('members/_layout_main.php', $this->data);
	}
        function download_downline(){
            $query = $this->client->GetUnderClient();
            if($query->num_rows===0){
                redirect('members/promotesite/downclient');
                return;
            }
            $datalist=array();
            $i=0;
            foreach ($query->result_array()as $row){
                $temp_row = array(
                    'N'=>++$i,
                    'First Name'=>$row['first_name'],
                    'Last Name'=>$row['last_name'],
                    'Email'=>$row['user_email'],
                    'Phone'=>$row['phone_number'],
                    'Signup Date'=>$row['signup_date'],
                );//*/
                $datalist[]=$temp_row;
            }            
            $this->load->model('training_model','',TRUE);
            $this->training_model->download_send_headers("User_downline_export_" . date("Y-m-d") . ".csv");
            echo $this->training_model->array2csv($datalist);
        }
		
	/******* End of Code to show undersignup client **********/
	
	/* function test(){
		$this->load->model('training_model','',TRUE);
		$datalist=array(array("a"=>'applaw',"a2"=>'frusssit',"a3"=>'fruitww'),array("a"=>'fruit1',"a2"=>'fruit2',"a3"=>'fruit3'));
		$this->training_model->download_send_headers("User_downline_export_" . date("Y-m-d") . ".csv");
		echo $this->training_model->array2csv($datalist);
	}	 */
	
	function invite()
	{
		$this->form_validation->set_rules('txtFname', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txtLname', 'Last Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txtEmail', 'Email', 'trim|required|valid_email|xss_clean|callback_send_afflate_link');
		if($this->form_validation->run() == FALSE)
		{
			// echo 'i m in error';
			//Field validation failed.  User redirected to login page
			$this->data['subview']=  'members/promote_site_view';
			$this->load->view('members/_layout_main.php', $this->data);
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