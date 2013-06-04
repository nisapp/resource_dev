<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
class Programs extends CI_Controller {
	 
	 function __construct()
	 {
	  	 parent::__construct();

		// check for validate user login
		$session_login_client=$this->session->userdata('client_login');
		if (!($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user')) {
			redirect('/', 'refresh');
		}
		$this->load->model('programs_model','',TRUE);
		/**----------Code un-necessary should be deleted===----------------------------*/
		$this->load->model('client','',TRUE);
		$this->load->model('video','',TRUE);
		/**----------Code un-necessary should be deleted===----------------------------*/
	 
	 }
	 
	
	
	 function index()
	 {
		if($this->session->userdata('client_login'))
		{
			$this->data['client_full_data']=$this->client->get_current_login_client_detail();
			$this->data['metatitle'] = 'Programs Sign-Up ';
			$this->data['scriptlist'][]='jwplayer/jwplayer.js';
			$this->data['query'] = $this->programs_model->getProgram();
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
			$statusupdate = $this->client->save_program_affliate_id($id);  
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