<?php
class Programs_Model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getVideos(){
        
        
        $this->db->select('*');
        $this->db->from("tblfiles");
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query;
    }
    public function getProgram($id = 0){
        $this->db->select('p.id as id, p.title as title, t.file_name as video, general_link as link, 
            affiliate_id, logo, t.id as vid, t.file_name_in_folder as video_file');
        $this->db->from('programs as p');
        $this->db->join('tblfiles as t','p.video_id = t.id');
        if($id!=0){
            $this->db->where('p.id',$id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function addProgram($pid = 0){
        $config['upload_path'] = './uploads/logo/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        $link = $this->input->post('link');
        $video = $this->input->post('video');
        $title = $this->input->post('title');
        $affiliate_id = $this->input->post('affiliate_id');
        $errors=FALSE;
        $data = array(
            'title'=>$title,
            'video_id'=>$video,
            'general_link'=>$link,
            'affiliate_id'=>$affiliate_id
        );
        if (!$this->upload->do_upload('logo')) {
            $errors = "<p>You don't select correct LOGO file!</p>";
        }
        else {
            $logo = $this->upload->data();
        }
        if($errors && $pid===0){
            return FALSE;
        }
        elseif(!$errors){
            $data['logo']=$logo['file_name'];
        }
        if($pid!==0){
            $this->db->where('id',$pid);
            $this->db->update('programs',$data);
        }
        else{
            $this->db->insert('programs',$data);
        }
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    
    public function deleteProgram($pid){
        $this->db->where('id',$pid);
        $this->db->delete('programs');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
	/***********Code added By Nisappian *****************/
	
	/***********End of Code added By Nisappian *****************/
}

