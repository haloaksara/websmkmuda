<?php 
 
class M_crud extends CI_Model{	
	// fungsi mengambil data user dengan berbagai parameter
    public function getData($table, $param = []) //berikan nilai parameter [] sbg default
    {
        // ambil data dengan join tabel
        $this->db->select('*');
        $this->db->from($table);

        // cek apakah terdapat parameter get_by_id
        if (isset($param['get_by_id']) && !is_null($param['get_by_id'])) {
            $this->db->where('id', $param['get_by_id']); //jika ya maka tambahkan klausa where berdasarkan id
        }

        // lakukan get data pada query dan masukkan dalam variable query
        $query = $this->db->get(); 

        // kembalikan hasil query yang ada pada variabel $query
        return $query;
    }	

	public function input($data,$table) 
    {
        $this->db->insert($table,$data);    
    }

    // fungsi untuk update data pada database
    public function update($table, $data, $where) 
    {
        $this->db->where($where);
		$this->db->update($table,$data);
    }
    
    // fungsi untuk hapus data pada database
    public function delete($table, $where) 
    {
        $this->db->where($where);
		$this->db->delete($table);
    }
}