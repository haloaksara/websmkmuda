<?php 
 
class M_transaction extends CI_Model{	

	function list()
    {		
		return $this->db->get('transaction');
	}	

    public function input_data($data,$table) 
    {
        $this->db->insert($table,$data);    
    }

    public function edit($id,$table) 
    {
        return $this->db->get_where($table,array('id'=>$id));
    }
    
    public function detail_transaction($id,$table) 
    {
        return $this->db->get_where($table,array('transaction_id'=>$id));
    }
}