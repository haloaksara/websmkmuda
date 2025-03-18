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

         // cek apakah terdapat parameter get_by_custom
        if (isset($param['get_by_custom']) && !is_null($param['get_by_custom'])) {
            $this->db->where($param['custom_param'], $param['get_by_custom']); //jika ya maka tambahkan klausa where berdasarkan id
        }

        // lakukan get data pada query dan masukkan dalam variable query
        $query = $this->db->get(); 

        // kembalikan hasil query yang ada pada variabel $query
        return $query;
    }
    
    public function getDataStudentFile($table, $filter_class = null, $filter_major = null, $filter_status = null, $file_type_id = null)
    {
        $this->db->select('
            student.id, student.nis, student.full_name, 
            class.name as class_name, major.name as major_name, 
            file_type.id as file_type_id, file_type.name as file_type_name, 
            student_file.file
        ');
        $this->db->from($table);
        $this->db->join('class', 'student.class_id = class.id', 'left');
        $this->db->join('major', 'student.major_id = major.id', 'left');
        $this->db->join('file_type', '1=1', 'left'); // Gabungkan semua file_type untuk setiap siswa
        $this->db->join('student_file', 'student.id = student_file.student_id AND student_file.file_type_id = file_type.id', 'left');
        $this->db->group_by(['student.id', 'file_type.id']);
    
        // Terapkan filter jika ada
        if (!empty($filter_class)) {
            $this->db->where('student.class_id', $filter_class);
        }
        if (!empty($filter_major)) {
            $this->db->where('student.major_id', $filter_major);
        }
        if (!empty($filter_status)) {
            $this->db->where('student.status', $filter_status);
        }
    
        return $this->db->get();
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