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
    }
    public function index(){
        $this->data['query'] = $this->programs_model->getProgram();
        $this->data['subview']=  'admin/programs/programs';
        $this->load->view('admin/_layout_main.php', $this->data);
    }
    public function add(){
        $info=$this->programs_model->getVideos(); 
        $this->data['videos']=$info->result();
        if($this->input->post('submit_program')!==FALSE){
            if($this->programs_model->addProgram()){
                redirect('admin/programs');
            }
        }
        $this->data['subview']=  'admin/programs/add';
        $this->load->view('admin/_layout_main.php', $this->data);
    }
    public function edit($pid=0){
        if($pid==0){
            redirect('admin/programs');
        }
        if($this->input->post('submit_save')!==FALSE){
            if($this->programs_model->addProgram($pid)){
                redirect('admin/programs');
            }
        }
        $info=$this->programs_model->getVideos(); 
        $this->data['videos']=$info->result();
        $this->data['program']=$this->programs_model->getProgram($pid);
        $this->data['subview']=  'admin/programs/edit';
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
}