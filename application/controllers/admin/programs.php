<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Programs extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('user','',TRUE);
        $this->load->model('marketing_model','',TRUE);
        $this->load->model('programs_model','',TRUE);
        $this->load->helper(array('url', 'form'));
        $session_login_user=$this->session->userdata('logged_in');
        if (!($session_login_user['login_state'] == 'active' && $session_login_user['role'] == 'admin')) {
            redirect('/', 'refresh');
        }
		$this->load->library('form_validation');
    }
    public function index(){
        $this->data['query'] = $this->programs_model->getProgram();
        $this->data['subview']=  'admin/programs/programs';
        $this->load->view('admin/_layout_main.php', $this->data);
    }
   
	
   
	
    public function delete_program($pid=0){
        if($pid!=0){
            $this->programs_model->deleteProgram($pid);
        }
        redirect('admin/programs');
    }
	
    public function preview($pid){
        $this->data['query']=$this->programs_model->getProgram($pid);
        $this->data['subview']=  'admin/programs/preview';
        $this->load->view('admin/_layout_main.php', $this->data);
    }
	
	/**************************** Code added By Nisappian **********************************/
	 public function bulkdelete(){
		if($this->input->post('btnDelete')!==FALSE){
			$delete_ids=$this->input->post('chkCategory');
			if($this->programs_model->delete_selected_program($delete_ids)){
				$this->data['query'] =$this->programs_model->getProgram();
				$this->data['status']=  'deletesuccess';
				$this->data['subview']=  'admin/programs/programs';
				$this->load->view('admin/_layout_main.php', $this->data);
            }else{
				$this->data['query'] =$this->programs_model->getProgram();
				$this->data['status']=  'deletefailure';
				$this->data['subview']=  'admin/programs/programs';
				$this->load->view('admin/_layout_main.php', $this->data);
			}
			// echo '<pre>';
			// print_r($this->input->post('chkCategory'));
			// echo '</pre>';

		}
	 }
	 public function add(){
		if($this->input->post('submit_program')!==FALSE){
			if($this->programs_model->addProgram()){
                redirect('admin/programs');
            }
		}	
		$this->data['subview']=  'admin/programs/add';
        $this->load->view('admin/_layout_main.php',$this->data);
    }
	 public function edit($pid=0){
        if($pid==0){
            redirect('admin/programs');
        }
        if($this->input->post('submit_save')!==FALSE){
            $update = $this->programs_model->updProgram($pid);
            if($update===TRUE){
				$this->data['query'] = $this->programs_model->getProgram();
				$this->data['status']=  'updatesuccess';
				$this->data['subview']=  'admin/programs/programs';
				$this->load->view('admin/_layout_main.php', $this->data);
            }
            else{
                $this->data['message']= $update?$update:"update field.";
                $this->data['program']=$this->programs_model->getProgram($pid);
                $this->data['subview']=  'admin/programs/edit';
                $this->load->view('admin/_layout_main.php', $this->data);
            }
        }else{
			$this->data['program']=$this->programs_model->getProgram($pid);
			$this->data['subview']=  'admin/programs/edit';
			$this->load->view('admin/_layout_main.php', $this->data);
		}
    }
	/**************************** End of Code added By Nisappian **********************************/
}