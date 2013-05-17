<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
	class Videos extends CI_Controller {
	 
	 function __construct()
	 {
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('video','',TRUE);
		// $this->load->model('job','',TRUE);
		$this->load->helper(array('url', 'form'));
		// check for validate user login
		$session_login_user=$this->session->userdata('logged_in');
		if (!($session_login_user['login_state'] == 'active' && $session_login_user['role'] == 'admin')) {
			redirect('login', 'refresh');
		}
	 }
	 
	function index()
	{
		$this->data['query'] = $this->video->GetVideoData();
		$this->data['subview']=  'admin/videos/listing';
		$this->load->view('admin/_layout_main.php', $this->data);
	}
	
	function addvideo()
	{	
		$this->data['subview']=  'admin/videos/addvideo';
		$this->load->view('admin/_layout_main.php', $this->data);
	 }
	/*** Welcome Video Area ****/
	function welcome_video(){
		$this->data['query'] = $this->video->GetWelVideoData();
		$this->data['subview']=  'admin/videos/welcome_list';
		$this->load->view('admin/_layout_main.php', $this->data);
	}
	
	function change_welcome_video($updateid){
		//echo $updateid;
		if($this->input->post('update_video'))
			{
				$statusupdate = $this->video->UpdateWelcomeVideoData($updateid);  
				if($statusupdate)
					$this->data['status']="updatesuccess";
				else
					$this->data['status']="updatefailure";			
				$this->welcome_video();
			}
			else
			{
				$query= $this->video->GetWelVideoData($updateid);
				$queryresult =$query->result();
				$this->data['videodataarray'] =$queryresult[0];
				$this->data['todo'] = "updation";
				$this->data['subview']=  'admin/videos/addwelvideo';
				$this->load->view('admin/_layout_main.php', $this->data);
			}
	}
	/*** End of Welcome Video Area****/

	function savevideo()
	{
            if($this->input->post('save_video')){
                $statusinsert = $this->video->InsertVideoData();  
				if($statusinsert)
					$this->data['status']="success";
				else
					$this->data['status']="failure";			
                }
			$this->index();		 
	}
			
	
	function change_login_video($updateid){
		//echo $updateid;
		if($this->input->post('update_video'))
			{
				$statusupdate = $this->video->UpdateVideoData($updateid);  
				if($statusupdate)
				$this->data['status']="updatesuccess";
				else
				$this->data['status']="updatefailure";			
				$this->index();
			}
			else
			{
				$query= $this->video->GetVideoData($updateid);
				$queryresult =$query->result();
				$this->data['videodataarray'] =$queryresult[0];
				$this->data['todo'] = "updation";
				$this->data['subview']=  'admin/videos/addvideo';
				$this->load->view('admin/_layout_main.php', $this->data);
			}
	}
	 
	 
 }
	 
	
	 
	?>