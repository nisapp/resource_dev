<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Home_model extends CI_Model{
    function __construct() {
        parent::__construct();
        
    }
    function getProgram($id = 0){
        $this->db->select("*");
        $this->db->from('marketing_programs');
        if($id!=0){
            $this -> db -> where('id',">=$id");
        }
        $this -> db -> limit(2);
        $query = $this->db->get();
        return $query;
    }
}

?>
