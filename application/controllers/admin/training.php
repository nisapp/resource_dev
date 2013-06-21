<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Training extends CI_Controller {
	public function __construct() {   
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('training_model','',TRUE);
		$this->load->helper(array('url', 'form'));
                $this->load->library('form_validation');
		// check for validate user login
		$session_login_user=$this->session->userdata('logged_in');
		if (!($session_login_user['login_state'] == 'active' && $session_login_user['role'] == 'admin')) {
			redirect('login', 'refresh');
		}
	}
        public function index(){
            $this->data['styles'][]='css/training.css';
            $this->data['styles'][]='datatable/css/jquery.dataTables.css';
            $this->data['scripts'][]='scripts/training.js';
            $this->data['scripts'][]='datatable/js/jquery.dataTables.min.js';
            $this->data['query']=  $this->training_model->getTrainingData();
            $this->data['subview']=  'admin/training/training';
            $this->load->view('admin/_layout_main.php', $this->data);
        }
        public function add(){
            $new_id = $this->training_model->addNewTraining();
            redirect("admin/training/edit/$new_id");
            /*
            $this->data['categories']=  $this->training_model->getCategories();
            $this->data['types']=  $this->training_model->getTypes();
            if($this->input->post('add_training')!==FALSE){
                $this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('link', 'Link', 'required');
                if($this->form_validation->run() == FALSE){
                    $this->data['subview']=  'admin/training/add';
                    $this->load->view('admin/_layout_main.php', $this->data);
                }
                else{
                    if($this->training_model->addTraining()){
                        redirect("admin/training");
                    }
                    else{
                        $this->data['subview']=  'admin/training/add';
                        $this->load->view('admin/_layout_main.php', $this->data);
                    }
                }
            }
            else{
				$this->data['subview']=  'admin/training/add';
				$this->load->view('admin/_layout_main.php', $this->data);
            }//*/
        }
        public function edit($id){
            //header("X-XSS-Protection: 0");
            $this->data['styles'][]='css/store_programs.css';
            $this->data['styles'][]='css/edit_training.css';
            //$this->data['styles'][]='css/style.css';
            $this->data['categories']=  $this->training_model->getCategories();
            $this->data['types']=  $this->training_model->getTypes();
            $this->data['statuses'] = $this->training_model->getStatus();
            $this->data['scripts'][]='jwplayer/jwplayer.js';
            $this->data['scripts'][]='ckeditor/ckeditor.js';
            $this->data['scripts'][]='scripts/program_video.js';
            $this->data['scripts'][]='scripts/user_registration.js';
            $this->data['trainingdata']=$this->training_model->getTrainingFullData($id);
            $this->data['trainingimages']=$this->training_model->getTrainingAllImages($id);
            if($this->data['trainingdata']->num_rows===0){
                redirect("admin/training");
            }
            if($this->input->post('edit_training')){
                $this->training_model->editText($id);
                $this->training_model->editTraining($id);
                    redirect("admin/training");
                    return;
            }
            elseif($this->input->post('training_text')){
                echo "only text edited.";
                //echo $this->input->post('training_text');
                $this->training_model->editText($id);
            }
            $this->data['trainingdata']=$this->training_model->getTrainingFullData($id);
            $this->data['subview']='admin/training/edit';
            $this->load->view('admin/_layout_main.php', $this->data);
        }
        public function addvideo($id){
            //$this->data['button']='Add Video';
            //$this->data['action']='addvideo';
            $this->data['trainingdata']=$this->training_model->getTrainingData($id);
            if($this->data['trainingdata']->num_rows===0){
                redirect("admin/training");
            }
            if($this->input->post('add_video')){
                if($this->training_model->addVideo($id)){
                    redirect("admin/training/edit/$id");
                }
            }
            redirect("admin/training/edit/$id");
            /*
            $this->data['trainingid']=$id;
            $this->data['subview']='admin/training/addvideo';
            $this->load->view('admin/_layout_main.php', $this->data);//*/
        }
        public function addtext($id){
            $this->data['action']='addtext';
            $this->data['button']='Add Text';
            $this->data['scripts'][]='ckeditor/ckeditor.js';
            //$this->data['scripts'][]='scripts/tinymce.js';
            $this->data['trainingdata']=$this->training_model->getTrainingFullData($id);
            if($this->data['trainingdata']->num_rows===0){
                redirect("admin/training");
            }
            else{
                $tdata = $this->data['trainingdata']->first_row();
            }
            if($this->input->post('add_text')){
                if($this->training_model->addText($id)){
                    redirect("admin/training/edit/$id");
                }
            }
            elseif($this->input->post('training_text')){
                if($tdata->t_text===NULL){
                    $this->training_model->addText($id);
                }
                else{
                    $this->training_model->editText($id);
                }
            }
            $this->data['trainingdata']=$this->training_model->getTrainingFullData($id);
            $this->data['trainingid']=$id;
            $this->data['subview']='admin/training/addtext';
            $this->load->view('admin/_layout_main.php', $this->data);
        }
        public function addimages($id){
            $this->data['trainingdata']=$this->training_model->getTrainingData($id);
            if($this->data['trainingdata']->num_rows===0){
                redirect("admin/training");
            }
            if($this->input->post('add_images')){
                //var_dump($_FILES);
                
                if($this->training_model->addImages($id)){
                    redirect("admin/training/edit/$id");
                }//*/
            }
            $this->data['trainingid']=$id;
            $this->data['subview']='admin/training/addimages';
            $this->load->view('admin/_layout_main.php', $this->data);
        }
        function edittext($id){
            redirect("admin/training/edit/$id");
            /*
            $this->data['action']='edittext';
            $this->data['button']='Save Changes';
            $this->data['scripts'][]='ckeditor/ckeditor.js';
            //$this->data['scripts'][]='scripts/tinymce.js';
            $this->data['trainingdata']=$this->training_model->getTrainingFullData($id);
            if($this->data['trainingdata']->num_rows===0){
                redirect("admin/training");
            }
            else{
                $tdata = $this->data['trainingdata']->first_row();
            }///
            if($this->input->post('add_text')){
                if($this->training_model->editText($id)){
                    //
                    return;
                }///
            }
            elseif($this->input->post('training_text')){
                if($tdata->t_text===NULL){
                    $this->training_model->addText($id);
                }
                else{
                    $this->training_model->editText($id);
                }
            }
            /*
            $this->data['trainingdata']=$this->training_model->getTrainingFullData($id);
            $this->data['trainingid']=$id;
            $this->data['subview']='admin/training/addtext';
            $this->load->view('admin/_layout_main.php', $this->data);//*/
        }
        function editvideo($id){
            //$this->data['button']='Change Video';
            //$this->data['action']='editvideo';
            $this->data['trainingdata']=$this->training_model->getTrainingData($id);
            if($this->data['trainingdata']->num_rows===0){
                redirect("admin/training");
            }
            if($this->input->post('add_video')){
                if($this->training_model->editVideo($id)){
                    redirect("admin/training/edit/$id");
                }
            }
            redirect("admin/training/edit/$id");
            /*
            $this->data['trainingid']=$id;
            $this->data['subview']='admin/training/addvideo';
            $this->load->view('admin/_layout_main.php', $this->data);//*/
        }
        function categories(){
            $this->data['query']=$this->training_model->getCategories();
            $this->data['subview']='admin/training/categories';
            $this->load->view('admin/_layout_main.php', $this->data);
        }
        function addcategory(){
            $this->data['action']="add";
            if($this->input->post('add_category')){
                if($this->training_model->addCategory()){
                    redirect("admin/training/categories");
                }
            }
            $this->data['subview']='admin/training/addcategory';
            $this->load->view('admin/_layout_main.php', $this->data);
        }
        function editcategory($id){
            $this->data['action']="edit";
            if($this->input->post('add_category')){
                if($this->training_model->editCategory($id)){
                    redirect("admin/training/categories");
                }
            }
            $this->data['query']=$this->training_model->getCategories($id);
            $this->data['subview']='admin/training/addcategory';
            $this->load->view('admin/_layout_main.php', $this->data);
        }
        function delete_category($id){
            $this->training_model->deleteCategory($id);
            redirect("admin/training/categories");
        }
        function delete_group(){
            //redirect("admin/training");return;
            if($this->input->post('selected_rows')){
                $trainingstring = $this->input->post('selected_rows');
                //echo $trainingstring."<br>";
                if(preg_match("/^[0-9]+(\/[0-9]+)*/i", $trainingstring)){
                    $trainings = explode('/', $trainingstring);
                    foreach ($trainings as $training){
                        //echo $training."<br>";
                        $this->training_model->deleteTraining($training);
                    }
                    redirect("admin/training");
                }
                else{
                    redirect("admin/training");
                }
            }
            else{
                redirect("admin/training");
            }
        }
        function delete_training($id){
            $this->training_model->deleteTraining($id);
            redirect("admin/training");
        }
        function delete_video($id){
            $this->training_model->delete_video($id);
            redirect("admin/training/edit/$id");
        }
        function download(){
            $query = $this->training_model->getTrainingData();
            if($query->num_rows===0){
                redirect("admin/training");
                return;
            }
            $datalist=array();
            $i=0;
            foreach($query->result_array() as $row){
                $temp_row = array(
                    'N'=>++$i,
                    'title'=>$row['title'],
                    'link'=>$row['link'],
                    'category'=>$row['category'],
                    'type'=>$row['t_type'],
                    'status'=>$row['t_status']
                ); 
                $datalist[]=$temp_row;
            }
            $this->training_model->download_send_headers("data_export_" . date("Y-m-d") . ".csv");
            echo $this->training_model->array2csv($datalist);
        }
    
}
