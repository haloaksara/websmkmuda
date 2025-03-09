<?php 
 
class M_product extends CI_Model{	

	function show($limit=null)
    {		
		return $this->db->get('product', $limit);
	}	

    public function input_data($data,$table) 
    {
        $this->db->insert($table,$data);    
    }

    public function edit($id,$table) 
    {
        return $this->db->get_where($table,array('id'=>$id));
    }

    public function count_all()
    {
        return $this->db->count_all('product');
    }

    public function get_products($limit, $offset)
    {
        return $this->db->limit($limit, $offset)
                        ->get('product'); // Ganti 'products' dengan nama tabel Anda
    }

    public function detail($id, $table) 
    {
        return $this->db->get_where($table,array('id'=>$id));
    }
}