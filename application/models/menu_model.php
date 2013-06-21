<?php
class Menu_model extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
   
    public function getMenuData_array(){
		$this->db->select('*');
        $this->db->from('tblmenu as m');
		$this->db->where('m.menu_type','main_menu');
		$this->db->order_by("position", "asc");
        $query = $this->db->get();
		foreach($query->result() as $menu ){
			$menu_array[]=$menu;
		}
		return $menu_array;
		// echo '<pre>';
		// print_r($menu_array);
		// echo '</pre>';
		// echo $menu_array[0]->menu_title;
	}
    
	public function getMenuData($id=false){
        $this->db->select('*');
        $this->db->from('tblmenu as m');
		$this->db->where('m.menu_type','main_menu');
		if(isset($id) && ($id!=false)){
			$this->db->where('m.id',$id);
		}
        $query = $this->db->get();
		// echo $this->db->last_query(); 
        return $query;
    }
	function updateMenu($id){
		$data = array(
            'menu_title'=> $this->input->post('txtTitle'),
            'position'=> $this->input->post('txtPosition'),
        );
		$this->db->where('id',$id);
		$res=$this->db->update('tblmenu',$data);
        // echo ($this->db->affected_rows() > 0) ? TRUE : FALSE;
		if($res){
			return 1;
		}else{
			return 0;
		}
	}
    
/*=======================================================================================*/	
  
    function editText($id){
        $data = array(
            'training_text'=> $this->input->post('training_text')
        );
        $this->db->where('training_id',$id);
        $this->db->update('training_text',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function editVideo($id){
        $config['upload_path'] = './uploads/training/video/';
        $config['allowed_types'] = 'avi|flv|wmv|mp4|mp3';
        $config['max_size'] = '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        $source = $this->input->post('source');
        if($source==="youtube"){
            $video=$this->input->post('video_youtube');
        }
        elseif($source==="upload"){
            if($this->upload->do_upload('video')){
                $info=$this->upload->data();
                $video=$info['file_name'];
            }
            else{
                return false;
            }
        }
        else{
            return FALSE;
        }
        $data = array('training_video'=>$video);
        $this->db->where('training_id',$id);
        $this->db->update('training_video',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function addImages($id) {
        //echo 'function started.';
        $config['upload_path'] = './uploads/training/images/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        $errors = false;
        $files = $_FILES;
        $cpt = count($_FILES['images']['name']);
        $this->db->trans_start();
        for ($i = 0; $i < $cpt; $i++) {

            $_FILES['images']['name'] = $files['images']['name'][$i];
            $_FILES['images']['type'] = $files['images']['type'][$i];
            $_FILES['images']['tmp_name'] = $files['images']['tmp_name'][$i];
            $_FILES['images']['error'] = $files['images']['error'][$i];
            $_FILES['images']['size'] = $files['images']['size'][$i];
            $this->upload->initialize($config);
            if(move_uploaded_file($_FILES["images"]["tmp_name"], $config['upload_path'].$_FILES['images']['name'])){
                $data = array(
                    'training_id' => $id,
                    'training_image' => $_FILES['images']['name']
                );
                $this->db->insert('training_images', $data);
            }
            else{
                $errors = TRUE;
            }
        }
        $this->db->trans_complete();
        return !$errors;
    }
    function getCategories($id=0){
        $this->db->select('*');
        $this->db->from('training_category');
        if($id!==0){
            $this->db->where('id',$id);
        }
        $query = $this->db->get();
        return $query;
    }
    function getCurrentCategories($tid=1){
        $this->db->select('tc.*');
        $this->db->from('training as t');
        $this->db->join('training_category as tc',"t.training_category=tc.id");
        $this->db->where('training_type',$tid);
        $this->db->group_by('training_category');
        $query = $this->db->get();
        return $query;
    }
    function getTypes($id=0){
        $this->db->select('*');
        $this->db->from('training_type');
        if($id!==0){
            $this->db->where('id',$id);
        }
        $query = $this->db->get();
        return $query;
    }
    function addCategory(){
        $data=array(
            'category_name'=>$this->input->post('category_name')
        );
        $this->db->insert('training_category',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function editCategory($id){
        $data=array(
            'category_name'=>$this->input->post('category_name')
        );
        $this->db->where('id',$id);
        $this->db->update('training_category',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function deleteCategory($id){
        $this->db->where('id',$id);
        $this->db->delete('training_category');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function deleteTraining($id){
        $this->db->select('tv.training_video as video');
        $this->db->from('training as t');
        $this->db->join('training_video as tv','t.id=tv.training_id','LEFT');
        $this->db->where('t.id',$id);
        $query = $this->db->get();
        var_dump($query);
        if($query->num_rows>0){
        foreach($query->result() as $row){
            if(empty($row))continue;
            if(file_exists('./uploads/training/video/'.$row->video)){
                unlink('./uploads/training/video/'.$row->video);
            }
        }
        }
        $this->db->select('ti.training_image as images');
        $this->db->from('training as t');
        $this->db->join('training_images as ti','t.id=ti.training_image','LEFT');
        $this->db->where('t.id',$id);
        var_dump($query1);
        $query1 = $this->db->get();
        echo $this->db->last_query();
        if($query1->num_rows>0){
        foreach($query1->result() as $row1){
            var_dump($row1);
            if(file_exists('./uploads/training/images/'.$row->images)){
                unlink('./uploads/training/images/'.$row->images);
            }
        }
        }
        $this->db->where('id',$id);
        $this->db->delete('training');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function editTraining($id){
        $data=array(
            'title'=>$this->input->post('title'),
            'link'=>$this->input->post('link'),
            'training_category'=>$this->input->post('category'),
            'training_type'=>$this->input->post('type')
        );
        $this->db->where('id',$id);
        $this->db->update('training',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
}