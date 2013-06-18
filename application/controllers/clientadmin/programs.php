<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
class Programs extends CI_Controller {
	 
	 function __construct()
	 {
	  	 parent::__construct();
		$this->load->model('menu_model','',TRUE);
		// check for validate user login
		$session_login_client=$this->session->userdata('client_login');
		if (!($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user')) {
			redirect('/', 'refresh');
		}else{
			$strMenus=$this->menu_model->getMenuData_array();
			$this->session->set_userdata('menu_data_in_session', $strMenus);
		}
		
		$this->load->model('programs_model','',TRUE);
		$this->load->model('client','',TRUE);
		$this->load->model('video','',TRUE);
	 
	 }
	 
	
	
	 function index()
	 {
		if($this->session->userdata('client_login'))
		{
			$this->data['client_full_data']=$this->client->get_current_login_client_detail();
			$this->data['metatitle'] = 'Programs Sign-Up ';
			$this->data['scriptlist'][]='jwplayer/jwplayer.js';
			$this->data['query'] = $this->programs_model->getProgram_for_clentdashboard();
			$this->data['video_query'] = $this->video->GetAllVideoData();
			// echo $this->db->last_query(); 
			// $this->data['query'] = $this->video->GetAllVideoData();
			$this->data['subview']=  'clientadmin/programs/programs_view';
			$this->load->view('clientadmin/_layout_main.php', $this->data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	 function save($id){
			// $this->data['client_full_data']=$this->client->get_current_login_client_detail();
			// $d=$this->client->get_current_login_client_detail();
			$statusupdate = $this->client->save_program_user_name($id);  
			if($statusupdate){
				echo 1;
			}else{
				echo 0;
			}	
			// echo '<pre>';
			// print_r($d);
			// echo '</pre>';
			// die();
			// echo $id;
	 }
	 
}
	 
?>