<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Student extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_crud');
		$this->load->model('m_student');
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
		$data['title'] = 'Data Siwa';
		$data['breadcrumb1'] = 'Siwa';
		$data['breadcrumb2'] = 'Data Siwa';
		$data['class'] = $this->m_crud->getData('class')->result();
		$data['major'] = $this->m_crud->getData('major')->result();

		$this->loadContent('admin/student/index', $data);
	}

	public function list()
	{
		$list = $this->m_student->getData('student')->result();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $dt) {
			$no++;
			$row = array();
			$row[] = $no;

			$row[] = $dt->nis;
			$row[] = $dt->full_name;

			if ($dt->gender == '0') {
				$gender = 'Perempuan';
			} else if ($dt->gender == '1') {
				$gender = 'Laki-laki';
			}else{
				$gender = '-';
			}
			$row[] = $gender;

			if ($dt->status == '1') {
				$status = '<span class="badge rounded-pill bg-primary">Aktif</span>';
			} else if ($dt->status == '2') {
				$status = '<span class="badge rounded-pill bg-warning">Lulus</span>';
			} else if ($dt->status == '3') {
				$status = '<span class="badge rounded-pill bg-danger">Keluar</span>';
			}else{
				$status = '-';
			}

			$row[] = $dt->class_name . ' / ' . $dt->major_name;
			$row[] = $status;

			$row[] =  anchor('admin/master/student/edit/' . $dt->id, ' Edit ', ' class="btn btn-warning btn-sm" ') .
			
			'  <button class="btn btn-danger btn-sm delete" data-id=' . "'" . $dt->id . "'" . '>Hapus</button>';
			
			$data[] = $row;
		}

		$output = array(
			"draw" => @$_POST['draw'],
			"data" => $data,
		);

		//output to json format
		echo json_encode($output);
	}

	public function add()
	{
		$data['title'] = 'Tambah Data Siwa';
		$data['breadcrumb1'] = 'Siwa';
		$data['breadcrumb2'] = 'Tambah Data Siwa';

		$data['class'] = $this->m_crud->getData('class')->result();
		$data['major'] = $this->m_crud->getData('major')->result();

		$this->loadContent('admin/student/add', $data);
	}

	public function store() 
	{
		$email_session 	= $this->session->userdata('email');
		$param			= [
			'custom_param' => 'email',
			'get_by_custom' => $email_session
		];

		$session		= $this->m_crud->getData('users', $param)->row();

		$nis 				= $this->input->post('nis');
		$nisn 				= $this->input->post('nisn');
		$full_name 			= $this->input->post('full_name');
		$gender 			= $this->input->post('gender');
		$place_of_birth 	= $this->input->post('place_of_birth');
		$date_of_birth 		= $this->input->post('date_of_birth');
		$address 			= $this->input->post('address');
		$phone 				= $this->input->post('phone');
		$email 				= $this->input->post('email');
		$class_id 			= $this->input->post('class_id');
		$major_id 			= $this->input->post('major_id');
		$status 			= $this->input->post('status');
		$mother_name 		= $this->input->post('mother_name');
		$mother_phone 		= $this->input->post('mother_phone');
		$mother_job 		= $this->input->post('mother_job');
		$father_name 		= $this->input->post('father_name');
		$father_job 		= $this->input->post('father_job');
		$father_phone 		= $this->input->post('father_phone');
		$created_by 		= $session->id;
		$created_date 		= date('Y-m-d H:i:s');

		// insert data ke tabel users
		$data_user = array(
			'name' => $full_name,
			'email' => $email,
			'username' => $nis,
			'password' => sha1($nis),
			'phone' => $phone,
			'gender' => $gender,
			'is_active' => 1,
			'address' => $address,
			'created_at' => $created_date
		);
		$this->m_crud->input($data_user, 'users');
		
		$user_id = $this->db->insert_id();

		// buat array data untuk disimpan ke database tb student
		$data = array(
			'user_id' => $user_id,
			'nis' => $nis,
			'nisn' => $nisn,
			'full_name' => $full_name,
			'gender' => $gender,
			'place_of_birth' => $place_of_birth,
			'date_of_birth' => $date_of_birth,
			'address' => $address,
			'phone' => $phone,
			'email' => $email,
			'class_id' => $class_id,
			'major_id' => $major_id,
			'status' => $status,
			'mother_name' => $mother_name,
			'mother_phone' => $mother_phone,
			'mother_job' => $mother_job,
			'father_name' => $father_name,
			'father_job' => $father_job,
			'father_phone' => $father_phone,
			'created_at' => $created_date,
			'created_by' => $created_by
		);

		$this->m_crud->input($data, 'student');
		redirect(site_url('admin/master/student'));	
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Data Siwa';
		$data['breadcrumb1'] = 'Siwa';
		$data['breadcrumb2'] = 'Edit Data Siwa';

		$param = ['get_by_id' => $id];
		$data['student'] = $this->m_crud->getData('student', $param)->row();
		$data['class'] = $this->m_crud->getData('class')->result();
		$data['major'] = $this->m_crud->getData('major')->result();

		$this->loadContent('admin/student/edit', $data);
	}

	public function update() 
	{
		$email_session 	= $this->session->userdata('email');
		$param			= [
			'custom_param' => 'email',
			'get_by_custom' => $email_session
		];

		$id 			= $this->input->post('id');
		$session		= $this->m_crud->getData('users', $param)->row();

		$nis 				= $this->input->post('nis');
		$nisn 				= $this->input->post('nisn');
		$full_name 			= $this->input->post('full_name');
		$gender 			= $this->input->post('gender');
		$place_of_birth 	= $this->input->post('place_of_birth');
		$date_of_birth 		= $this->input->post('date_of_birth');
		$address 			= $this->input->post('address');
		$phone 				= $this->input->post('phone');
		$email 				= $this->input->post('email');
		$class_id 			= $this->input->post('class_id');
		$major_id 			= $this->input->post('major_id');
		$status 			= $this->input->post('status');
		$mother_name 		= $this->input->post('mother_name');
		$mother_phone 		= $this->input->post('mother_phone');
		$mother_job 		= $this->input->post('mother_job');
		$father_name 		= $this->input->post('father_name');
		$father_job 		= $this->input->post('father_job');
		$father_phone 		= $this->input->post('father_phone');
		$updated_by 		= $session->id;
		$updated_date 		= date('Y-m-d H:i:s');

		// buat array data untuk disimpan ke database
		$data = array(
			'nis' => $nis,
			'nisn' => $nisn,
			'full_name' => $full_name,
			'gender' => $gender,
			'place_of_birth' => $place_of_birth,
			'date_of_birth' => $date_of_birth,
			'address' => $address,
			'phone' => $phone,
			'email' => $email,
			'class_id' => $class_id,
			'major_id' => $major_id,
			'status' => $status,
			'mother_name' => $mother_name,
			'mother_phone' => $mother_phone,
			'mother_job' => $mother_job,
			'father_name' => $father_name,
			'father_job' => $father_job,
			'father_phone' => $father_phone,
			'updated_at' => $updated_date,
			'updated_by' => $updated_by
		);

		$this->m_student->update('student', $data, ['id' => $id]);
		redirect(site_url('admin/master/student'));	
	}

	public function delete() 
    {
		$id = $_POST['id'];

		$where = [
			'id'     => $id,
		];

		$result = $this->m_crud->delete('student', $where);
        
        if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
    }

	public function import() {
		$session = $this->session->userdata('email');
		$param = [
			'custom_param' => 'email',
			'get_by_custom' => $session
		];
		$session = $this->m_crud->getData('users', $param)->row();

		// buatkan kode untuk import data dari excel dari inputan ajax di halaman student
		if (isset($_FILES['import_file']['name'])) {
			$path = $_FILES['import_file']['tmp_name'];
			$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($path);
			$spreadsheet = $reader->load($path);
			$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true, true);

			$data = [];
			foreach ($sheetData as $key => $value) {
				if ($key == 1) continue; // Skip header row
				$data_user = [
					'name' => $value['C'] ?? null,
					'username' => $value['A'] ?? null,
					'password' => sha1($value['A']) ?? null,
					'phone' => $value['G'] ?? null,
					'gender' => $value['D'] ?? null,
					'is_active' => 1,
					'created_at' => date('Y-m-d H:i:s')
				];
				$this->m_crud->input($data_user, 'users');
				$user_id = $this->db->insert_id();

				$data[] = [
					'user_id' => $user_id,
					'class_id' => $_POST['class_id'],
					'major_id' => $_POST['major_id'],
					'status' => 1,
					'nis' => $value['A'] ?? null,
					'nisn' => $value['B'] ?? null,
					'full_name' => $value['C'] ?? null,
					'gender' => $value['D'] ?? null,
					'place_of_birth' => $value['E'] ?? null,
					'date_of_birth' => $value['F'] ?? null,
					'phone' => $value['G'] ?? null,
					'mother_name' => $value['H'] ?? null,
					'father_name' => $value['I'] ?? null,
					'created_at' => date('Y-m-d H:i:s'),
					'created_by' => $session->id
				];
			}

			// input data ke database tb student
			$this->m_student->add_batch('student', $data);

			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}

	public function upload_config($path) {
		if (!is_dir($path)) 
			mkdir($path, 0777, TRUE);		
		$config['upload_path'] 		= './'.$path;		
		$config['allowed_types'] 	= 'csv|CSV|xlsx|XLSX|xls|XLS';
		$config['max_filename']	 	= '255';
		$config['encrypt_name'] 	= TRUE;
		$config['max_size'] 		= 4096; 
		$this->load->library('upload', $config);
	}
}
