<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Home_model extends CI_Model{
    function __construct() {
        parent::__construct();
        
    }
    function getProgram($id = 0){
        $session_data = $this->session->userdata('client_login');
        $this->db->select("mp.*, sp.userid as uid, sp.affilateid as affiliateid");//COALESCE(,0)
        $this->db->from('marketing_programs as mp');
        $this->db->join('stored_programs as sp','mp.id = sp.programid','LEFT');
        $where="( sp.userid = $session_data[id] OR sp.userid IS NULL )";
        if($id!=0){
            $where.="AND mp.id >=$id";
        }
        $this->db->where($where);
        $this -> db -> limit(2);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query;
    }
    function storeProgram($id){
        $session_data = $this->session->userdata('client_login');
        $data=array(
            'userid'=>$session_data['id'],
            'programid'=>$id
        );
        $this->db->insert('stored_programs',$data);
        return ($this->db->affected_rows()>0)?TRUE:FALSE;
    }
    function addAffiliateID($id){
        $session_data = $this->session->userdata('client_login');
        $data = array('affilateid'=>$this->input->post('affiliateid'));
        $this->db->where('userid',$session_data['id']);
        $this->db->where('programid',$id);
        $this->db->update('stored_programs',$data);
        return ($this->db->affected_rows()>0)?TRUE:FALSE;
    }
}

?>
