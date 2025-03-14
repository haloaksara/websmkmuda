<?php 
 
class M_user extends CI_Model{	
	function cek_email($table,$where)
    {		
		return $this->db->get_where($table,$where);
	}	

	public function input_data($data,$table) 
    {
        $this->db->insert($table,$data);    
    }
}