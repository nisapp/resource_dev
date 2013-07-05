<?php

class Training_model extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function getTrainingData($id = 0){
        $this->db->select('t.id, t.title, t.link,tc.id as cid, 
            tc.category_name as category, tt.id as tid, tt.type_name as t_type, ts.status as t_status');
        $this->db->from('training as t');
        $this->db->join('training_category as tc',"t.training_category = tc.id");
        $this->db->join('training_type as tt',"t.training_type = tt.id");
        $this->db->join('training_status as ts',"t.status = ts.id");
        if($id!=0){
            $this->db->where('t.id',$id);
        }
        $this->db->order_by('t.id', "asc"); 
        $query = $this->db->get();
        return $query;
    }
    function getTrainingAllImages($id){
        $this->db->select('*');
        $this->db->from("training_images");
        $this->db->where('training_id',$id);
        $query = $this->db->get();
        return $query;
    }
    function get_traing_data_by_category($cid,$tid=1){
		$this->db->select('t.id AS id, 
            t.link AS link, 
            t.title AS title, 
            tv.training_video AS video, 
            tt.training_text AS t_text');
        $this->db->from('training AS t');
        $this->db->join('training_video AS tv','t.id=tv.training_id','LEFT');
        $this->db->join('training_text AS tt','t.id=tt.training_id','LEFT');
        $this->db->where('t.training_category',$cid);
        $this->db->where('t.training_type',$tid);
        $this->db->where('t.status',2);
        $query = $this->db->get();
		// echo $this->db->last_query();
		$base_url=base_url();
		$trn_html='';
		$check=0;
		foreach($query->result() as $training ){ 
			++$check;
			if($check==1){
				$trn_html.="
						<input type='hidden' id='first_video' value='{$training->video}'>
						<input type='hidden' id='first_video_index' value='{$training->id}'>
					";
			}
                        if(empty($training->video)){
                            $video="";
                        }
                        elseif(preg_match("/youtube\.com/", $training->video)){
                            $video_str = substr($training->video,-11);
                            $video="
            <iframe width='500' height='300'
                    src='http://www.youtube.com/embed/$video_str?modestbranding=1&rel=0&showsearch=0&controls=0' 
                    frameborder='0' allowfullscreen 
                    style='margin: 27px 40px 30px 40px;'>
            </iframe>
                                ";
                        }
                        else{
                            $video=
             						"<input type='hidden' id='id_videopreview_{$training->id}' value='{$training->video}'>
					
						<div class='video_preveiw' style=''>
									<script type='text/javascript'>jwplayer.key='oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==';</script>
									<div id='videopreview_{$training->id}'>Loading the player...</div>
						</div>";
                       
                        }
	
			$trn_html.="
				<div class='main_tab' >
					<div class='m_t_tab-close tab_close' id='tab_cat_{$check}'  onclick='show_div(this,{$training->id});'>{$training->title}
						<img  src='{$base_url}images/transparent.gif' class='open_close open_tab' width='36' height='29'>
					</div>
					<div class='show-tab-content' id='tab_child_{$check}' style='display:none;' >
						<p>
							{$training->t_text}
						</p>".
                                                                $video
					
						
					."</div>
				</div>
					";	
		}
		
		return $trn_html;
	}
	
    function getTrainingFullData($id){
        $this->db->select('t.id AS id, 
            t.link AS link, 
            t.title AS title, 
            tv.training_video AS video, 
            tt.training_text AS t_text,tc.id as cid, 
            tc.category_name as category, ttp.id as tid, ttp.type_name as t_type,
            ts.id AS sid, ts.status AS t_status');
        $this->db->from('training AS t');
        $this->db->join('training_category as tc',"t.training_category = tc.id");
        $this->db->join('training_type as ttp',"t.training_type = ttp.id");
        $this->db->join('training_video AS tv','t.id=tv.training_id','LEFT');
        $this->db->join('training_text AS tt','t.id=tt.training_id','LEFT');
        $this->db->join('training_status AS ts','t.status=ts.id');
        $this->db->where('t.id',$id);
        $this->db->order_by('t.id', "asc"); 
        $query = $this->db->get();
        return $query;
    }
    function addTraining(){
        $data=array(
            'link'=>$this->input->post('link'),
            'title'=>$this->input->post('title'),
            'training_category'=>$this->input->post('category'),
            'training_type'=>$this->input->post('type')
        );
        $this->db->insert('training',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function addNewTraining(){
        $query=  $this->getCategories();
        $first_category=$query->first_row();
        $query = $this->getTypes();
        $first_type= $query->first_row();
        $query = $this->getStatus();
        $first_status=$query->first_row();
        $data=array(
            'link'=>"New Link",
            'title'=>"New Title",
            'training_category'=>$first_category->id,
            'training_type'=>$first_type->id,
            'status'=>$first_status->id
        );
        $this->db->insert('training',$data);
        return ($this->db->affected_rows() > 0) ? $this->db->insert_id() : FALSE;
    }
    function addVideo($id){
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
        $data = array('training_video'=>$video,'training_id'=>$id);
        $this->db->insert('training_video',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function addText($id){
        $data = array(
            'training_id'=>$id,
            'training_text'=>  $this->input->post('training_text')
        );
        $this->db->insert('training_text',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function editText($id){
        $this->db->select('id');
        $this->db->from('training_text');
        $this->db->where('training_id',$id);
        $query = $this->db->get();
        if($query->num_rows>0){
        $data = array(
            'training_text'=> $this->input->post('training_text')
        );
        $this->db->where('training_id',$id);
        $this->db->update('training_text',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
        }
        else{
            return $this->addText($id);
        }
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
        $this->db->select('id');
        $this->db->from('training_video');
        $this->db->where('training_id',$id);
        $query = $this->db->get();
        if($query->num_rows!==0){
        $data = array('training_video'=>$video);
        $this->db->where('training_id',$id);
        $this->db->update('training_video',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
        }
        else{
        $data = array('training_video'=>$video,'training_id'=>$id);
        $this->db->insert('training_video',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
        }
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
        $this->db->order_by('id', "asc"); 
        $query = $this->db->get();
        return $query;
    }
    function getCurrentCategories($tid=1){
        $this->db->select('tc.*');
        $this->db->from('training as t');
        $this->db->join('training_category as tc',"t.training_category=tc.id");
        $this->db->where('training_type',$tid);
        $this->db->where('t.status',2);
        $this->db->group_by('training_category');
        $this->db->order_by('tc.id', "asc"); 
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
    function getStatus($id=0){
        $this->db->select('*');
        $this->db->from('training_status');
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
        $this->db->select('id');
        $this->db->from('training');
        $this->db->where('training_category',$id);
        $query = $this->db->get();
        foreach($query->result() as $row){
            if($this->trainingExists($row->id)){
                $this->deleteTraining($row->id);
            }
        }
        $this->db->where('id',$id);
        $this->db->delete('training_category');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function trainingExists($id){
        $this->db->select('id');
        $this->db->from('training');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return($query->num_rows>0);
    }
    function deleteTraining($id){
        $this->db->select('tv.training_video as video');
        $this->db->from('training as t');
        $this->db->join('training_video as tv','t.id=tv.training_id','LEFT');
        $this->db->where('t.id',$id);
        $query = $this->db->get();
        if($query->num_rows>0){
        foreach($query->result() as $row){
            if(empty($row->video))continue;
            if(file_exists('./uploads/training/video/'.$row->video)){
                unlink('./uploads/training/video/'.$row->video);
            }
        }
        }
        $this->db->select('ti.training_image as images');
        $this->db->from('training as t');
        $this->db->join('training_images as ti','t.id=ti.training_id','LEFT');
        $this->db->where('t.id',$id);
        $query1 = $this->db->get();
        if($query1->num_rows>0){
        foreach($query1->result() as $row1){
            if(empty($row1->images))continue;
            if(file_exists('./uploads/training/images/'.$row1->images)){
                unlink('./uploads/training/images/'.$row1->images);
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
            'training_type'=>$this->input->post('type'),
            'status'=>$this->input->post('status')
        );
        $this->db->where('id',$id);
        $this->db->update('training',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
	
    function delete_video($id){
        $this->db->where('training_id',$id);
        $this->db->delete('training_video');
    }

    function array2csv($array) {
        if (empty($array)) {
            return null;
        }
        ob_start();
        $df = fopen("php://output", 'w');
        fputcsv($df, array_keys(reset($array)));
        foreach ($array as $row) {
            fputcsv($df, $row);
        }
        fclose($df);
        return ob_get_clean();
    }

    function download_send_headers($filename) {
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename={$filename}");
        header("Content-Transfer-Encoding: binary");
    }

}