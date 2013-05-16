<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Marketing extends CI_Controller {
	
	public function __construct() 
	{   
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('marketing_model','',TRUE);
		$this->load->helper(array('url', 'form'));
		// check for validate user login
		$session_login_user=$this->session->userdata('logged_in');
		if (!($session_login_user['login_state'] == 'active' && $session_login_user['role'] == 'admin')) {
			redirect('login', 'refresh');
		}
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/home
	 *	- or -  
	 * 		http://example.com/index.php/home/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	//public $layout = 'header_footer'; 
	
	public function index()
	{
		$this->data['query'] = $this->marketing_model->GetMarketingData();
		
		$this->data['subview']=  'admin/marketing/marketing';
		$this->load->view('admin/_layout_main.php', $this->data);
		
		/*
		$this->load->model('marketing_model');
		$data['test'] =  $this->marketing_model->test_test();;
		$data['title'] = "My Real Title";
		$data['heading'] = "My Real Heading";
		$this->load->view('admin/marketing', $data);
		*/
	}
	
	function edit($id = 0){//Edit data of registered videos
            if($id==0){
                redirect("/admin/marketing");
            }
            $this->data['query'] = $this->marketing_model->GetMarketingData($id);
            if($this->data['query']->num_rows===0){
                redirect("/admin/marketing");
            }
            if ($this->input->post('link')) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('link', 'link', 'required');
                if ($this->form_validation->run() == FALSE){
                    $this->data['id']=$id;
                    $this->data['subview'] =  'admin/marketing/edit';
                    $this->load->view('admin/_layout_main.php', $this->data);
                }
                else{
                    $this->marketing_model->editVideoData($id);
                    redirect('/admin/marketing');
                }
            }
            else{


        $this->data['query'] = $this->marketing_model->GetMarketingData($id);
			$this->data['id']=$id;
			$this->data['subview'] =  'admin/marketing/edit';
			$this->load->view('admin/_layout_main.php', $this->data);
            }
		
	}
	
	function add() {//Add video
            //Video can be uploded from pc or link of youtube video
        $config['upload_path'] = './uploads/temp/';
        $config['allowed_types'] = 'avi|flv|wmv|mp4|mp3|gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        if ($this->input->post('link')) {
            $info = array();
            $errors = array();
            if ($this->input->post('source') === 'upload') {
                if (!$this->upload->do_upload('video')) {
                    $errors[] = "<p>You don't select correct VIDEO file!</p>"; //$this->upload->display_errors('video');
                } 
                else {
                    $info['video'] = $this->upload->data();
                }
            }
            elseif($this->input->post('source') === 'youtube'){
                $info['video']['full_path']=$this->input->post('video_youtube');
            }
            else{
                $errors[]="Please don't try to break this site.";
            }
            if (!$this->upload->do_upload('logo')) {
                $errors[] = "<p>You don't select correct LOGO file!</p>";//$this->upload->display_errors('logo');
            } 
            else {
                $info['logo'] = $this->upload->data();
            }
            if(!empty($errors)){
                $this->data['errors']=$errors;
                $this->data['subview'] = 'admin/marketing/add';
                $this->load->view('admin/_layout_main.php', $this->data);
            }
            else{
                $this->marketing_model->add($info);
                redirect('/admin/marketing');
            }
        } 
        else {
            $this->data['subview'] = 'admin/marketing/add';
            $this->load->view('admin/_layout_main.php', $this->data);
        }
    }

    function deletemarketing($id){
		
		if(isset($id)){
			$statusdelete = $this->marketing_model->remove_marketing($id);	

			if($statusdelete==true)
				$this->data['status']="deletesuccess";
			else if($statusdelete==false)
				$this->data['status']="deletefailure";
		}
		$this->index();
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */