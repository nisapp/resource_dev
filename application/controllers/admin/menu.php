<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
	public function __construct() {   
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('menu_model','',TRUE);
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
		$session_login_user=$this->session->userdata('logged_in');
		if (!($session_login_user['login_state'] == 'active' && $session_login_user['role'] == 'admin')) {
			redirect('login', 'refresh');
		}
	}
	public function index(){
		$this->data['query']=  $this->menu_model->getMenuData();
		$this->data['subview']=  'admin/menu/menu_listing';
		$this->load->view('admin/_layout_main.php', $this->data);
	}

	function edit($menuid){
		if($this->input->post('update_menu'))
		{
			$statusupdate = $this->menu_model->updateMenu($menuid);  
			if($statusupdate==1)
				$this->data['status']="updatesuccess";
			else
				$this->data['status']="updatefailure";	
				// $query= $this->video->GetPureLevVideoData($updateid);
				// $queryresult =$query->result();
				// $this->data['videodataarray'] =$queryresult[0];
				$this->data['query']=  $this->menu_model->getMenuData();
				$this->data['subview']=  'admin/menu/menu_listing';
				$this->load->view('admin/_layout_main.php', $this->data);					
		}
		else
		{
			// echo 'I m hgjhghj';die();
			$query= $this->menu_model->getMenuData($menuid);  
			$queryresult =$query->result();
			$this->data['menudataarray'] =$queryresult[0];
			$this->data['subview']=  'admin/menu/menu_edit_view';
			$this->load->view('admin/_layout_main.php', $this->data);
		}
	}
		
}
