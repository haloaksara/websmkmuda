<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentFile extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_crud');
		date_default_timezone_set('Asia/Jakarta');
		check_not_login();
	}

	public function loadContent($page, $data = [])
	{
		$this->load->view('admin/partials/head', $data);
		$this->load->view('admin/partials/sidebar', $data);
		$this->load->view('admin/partials/navbar', $data);

		$this->load->view('admin/partials/js', $data);
		$this->load->view($page, $data);

		$this->load->view('admin/partials/footer', $data);
	}

	public function index()
	{
		$data['title'] = 'Data File Siwa';
		$data['breadcrumb1'] = 'File Siwa';
		$data['breadcrumb2'] = 'Data File Siwa';
		$data['class'] = $this->m_crud->getData('class')->result();
		$data['major'] = $this->m_crud->getData('major')->result();

		$this->loadContent('admin/student_file/index', $data);
	}

	public function list()
	{
		$filter_class = $this->input->post('filter_class');
		$filter_major = $this->input->post('filter_major');
		$filter_status = $this->input->post('filter_status');

		$list = $this->m_crud->getDataStudentFile('student', $filter_class, $filter_major, $filter_status)->result();

		$data = [];
		$students = [];

		foreach ($list as $dt) {
			$students[$dt->id]['nis'] = $dt->nis;
			$students[$dt->id]['full_name'] = $dt->full_name;
			$students[$dt->id]['class_name'] = $dt->class_name;
			$students[$dt->id]['major_name'] = $dt->major_name;

			// Format file
			$fileStatus = "";
			if (!empty($dt->file)) {
				$fileStatus .= '<a href="' . base_url('upload/student_file/' . rawurlencode($dt->file)) . '" target="_blank" class="btn btn-xs btn-success mb-1">Download ' . $dt->file_type_name . '</a> ';
			} else {
				$fileStatus .= '<span class="badge bg-danger mb-1">Belum diunggah (' . $dt->file_type_name . ')</span> ';
			}

			$students[$dt->id]['files'][] = $fileStatus;

			// Tombol upload untuk setiap jenis file
			$uploadButton = '<button class="btn btn-primary btn-sm upload-btn" data-id="' . $dt->id . '" data-file-type-id="' . $dt->file_type_id . '">Upload ' . $dt->file_type_name . '</button> ';
			$students[$dt->id]['upload_buttons'][] = $uploadButton;
		}
		// var_dump($students); die;

		// Menyusun data untuk DataTables
		$no = 1;
		foreach ($students as $id => $student) {
			$row = [];
			$row[] = $no++;
			$row[] = $student['nis'];
			$row[] = $student['full_name'];
			$row[] = $student['class_name'] . ' / ' . $student['major_name'];
			$row[] = implode("<br>", $student['files']); // Menampilkan semua file dalam satu sel
			$row[] = implode(" ", $student['upload_buttons']); // Menampilkan semua tombol upload dalam satu sel
			$data[] = $row;
		}

		$output = [
			"draw" => @$_POST['draw'],
			"data" => $data,
		];

		echo json_encode($output);
	}


	public function upload_file()
	{
		$student_id = $this->input->post('id');
		$file_type_id = $this->input->post('file_type_id');
		$type = $this->m_crud->getData('file_type', ['get_by_id' => $file_type_id])->row();
		$student = $this->m_crud->getData('student', ['get_by_id' => $student_id])->row();

		$file_name 	= $type->name . '_' . $student->nis . '_' .  str_replace(" ", "_", $student->full_name);

		$config['upload_path'] = './upload/student_file/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx|xlsx';
		$config['max_size'] = '3000'; //maksimum besar file 2M
		$config['file_name'] = $file_name;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload('file')) {
			$gbr = $this->upload->data();
			$data = [
				'student_id' => $student_id,
				'file_type_id' => $file_type_id,
				'file' => $file_name.$gbr['file_ext'],
			];
			$this->db->insert('student_file', $data);

			$response = ['status' => 'success', 'message' => 'File berhasil diunggah'];
		} else {
			$response = ['status' => 'error', 'message' => $this->upload->display_errors()];
		}

		echo json_encode($response);
	}

}
