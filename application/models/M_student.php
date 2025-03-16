<?php 
 
class M_student extends CI_Model{	
	// fungsi mengambil data user dengan berbagai parameter
    public function getData($table, $param = []) //berikan nilai parameter [] sbg default
    {
        // ambil data dengan join tabel
        $this->db->select('student.*, major.name as major_name, class.name as class_name');
        $this->db->from($table);
        $this->db->join('major', 'major.id = student.major_id', 'left');
        $this->db->join('class', 'class.id = student.class_id', 'left');

        // cek apakah terdapat parameter get_by_id
        if (isset($param['get_by_id']) && !is_null($param['get_by_id'])) {
            $this->db->where('id', $param['get_by_id']); //jika ya maka tambahkan klausa where berdasarkan id
        }

         // cek apakah terdapat parameter get_by_custom
        if (isset($param['get_by_custom']) && !is_null($param['get_by_custom'])) {
            $this->db->where($param['custom_param'], $param['get_by_custom']); //jika ya maka tambahkan klausa where berdasarkan id
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