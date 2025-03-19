<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Announcement extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_crud');
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
		$type = $this->input->get('type');

		$data['title'] = 'Data Pengumuman ' . ucfirst($type);
		$data['breadcrumb1'] = 'Pengumuman' . ucfirst($type);
		$data['breadcrumb2'] = 'Data Pengumuman ' . ucfirst($type);
		$data['type'] = $type;

		$this->loadContent('admin/announcement/index', $data);
	}

	public function list()
	{
		$type = $this->input->get('type');
		if ($type == 'private') {
			$get_by = '1';
		}else{
			$get_by = '2';
		}

		$params = ['get_by_custom' => $get_by, 'custom_param' => 'type'];
		$list = $this->m_crud->getData('announcement', $params)->result();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $dt) {
			$no++;
			$row = array();
			$row[] = $no;

			if ($type == 'private') {
				$row[] = $dt->title;
				$row[] = substr($dt->description, 0, 100) . '...' ?? '-';
				if ($dt->status_exam == 0) {
					$row[] = 'Tidak Lulus';
				}elseif($dt->status_exam == 1){
					$row[] = 'Lulus';
				}else{
					$row[] = 'Belum Ada Status';
				}
				
			}else{
				$row[] = $dt->title;
				$row[] = substr($dt->description, 0, 100) . '...';

				if ($dt->status == 0) {
					$row[] = 'Draft';
				}elseif($dt->status == 1){
					$row[] = 'Publish';
				}else{
					$row[] = 'Arsip';
				}
				
				if ($dt->attachment == null) {
					$row[] = 'Tidak Ada File';
				}else{
					$row[] = '<a href="' . base_url('upload/announcement/' . rawurlencode($dt->attachment)) . '" target="_blank" class="btn btn-xs btn-success mb-1">Download </a> ';
				}
			}
			
			$row[] =  anchor('admin/announcement/edit/' . $dt->id . '?type=' . $type, ' Edit ', ' class="btn btn-warning btn-sm" ') .
			
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
		$type = $this->input->get('type');

		$data['title'] = 'Tambah Data Pengumuman';
		$data['breadcrumb1'] = 'Pengumuman';
		$data['breadcrumb2'] = 'Tambah Data Pengumuman';
		$data['type'] = $type;
		$data['students'] = $this->m_crud->getData('student')->result();

		$this->loadContent('admin/announcement/add', $data);
	}

	public function store() 
	{
		$email_session 	= $this->session->userdata('email');
		$param			= [
			'custom_param' => 'email',
			'get_by_custom' => $email_session
		];
		$session		= $this->m_crud->getData('users', $param)->row();

		$type 				= $this->input->post('type');
		$student_id 		= $this->input->post('student_id');
		$title 				= $this->input->post('title');
		$description 		= $this->input->post('description');
		$status_exam 		= $this->input->post('status_exam');
		$status 			= $this->input->post('status');

		// cek apakah type private atau public
		if ($type == 'private') {
			$student = $this->m_crud->getData('student', ['get_by_id' => $student_id])->row();

			$data = array(
				'student_id' => $student_id,
				'class_id' => $student->class_id,
				'title' => $title,
				'description' => $description,
				'status_exam' => $status_exam,
				'type' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $session->id,
			);

		// jika type public
		}else{
			$data = array(
				'title' => $title,
				'description' => $description,
				'type' => 2,
				'status' => $status,
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $session->id,
			);
			// var_dump($_FILES['attachment']);die;

			if ($_FILES['attachment']['name'] != '' && $_FILES['attachment']['name'] != null && isset($_FILES['attachment']['name'])) {
				$file_name 	= 'attachment' . date('ymd') . '-' . substr(md5(rand()), 0, 10);	
				
				$config['upload_path'] = './upload/announcement/';
				$config['allowed_types'] = 'pdf|doc|docx|xls|gif|jpg|png|jpeg';
				$config['max_size'] = '3000'; //maksimum besar file 2M
				$config['file_name'] = $file_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
	
				if ($this->upload->do_upload('attachment')) {
					$gbr = $this->upload->data();
					$data['attachment'] = $file_name . $gbr['file_ext'];
				} else {
					redirect('admin/announcement/add?type='.$type);
				}
			}
		}
		
		$this->m_crud->input($data, 'announcement');
		redirect(site_url('admin/announcement?type='.$type));	
	}

	public function edit($id)
	{
		$type = $this->input->get('type');
		$data['title'] = 'Edit Data Pengumuman';
		$data['breadcrumb1'] = 'Pengumuman';
		$data['breadcrumb2'] = 'Edit Data Pengumuman';

		$data['type'] = $type;
		$data['students'] = $this->m_crud->getData('student')->result();

		$param = ['get_by_id' => $id];
		$data['announcement'] = $this->m_crud->getData('announcement', $param)->row();

		$this->loadContent('admin/announcement/edit', $data);
	}

	public function update() 
	{
		$email_session 	= $this->session->userdata('email');
		$param			= [
			'custom_param' => 'email',
			'get_by_custom' => $email_session
		];
		$session		= $this->m_crud->getData('users', $param)->row();

		$id 				= $this->input->post('id');
		$type 				= $this->input->post('type');
		$student_id 		= $this->input->post('student_id');
		$title 				= $this->input->post('title');
		$description 		= $this->input->post('description');
		$status_exam 		= $this->input->post('status_exam');
		$status 			= $this->input->post('status');

		if ($type == 'private') {
			$student = $this->m_crud->getData('student', ['get_by_id' => $student_id])->row();

			$data = array(
				'student_id' => $student_id,
				'class_id' => $student->class_id,
				'title' => $title,
				'description' => $description,
				'status_exam' => $status_exam,
				'type' => 1,
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $session->id,
			);
		}else{
			$data = array(
				'title' => $title,
				'description' => $description,
				'type' => 2,
				'status' => $status,
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $session->id,
			);

			if ($_FILES['attachment']['name'] != '' && $_FILES['attachment']['name'] != null && isset($_FILES['attachment']['name'])) {
				$file_name 	= 'attachment' . date('ymd') . '-' . substr(md5(rand()), 0, 10);	
				
				$config['upload_path'] = './upload/announcement/';
				$config['allowed_types'] = 'pdf|doc|docx|xls|gif|jpg|png|jpeg';
				$config['max_size'] = '3000'; //maksimum besar file 2M
				$config['file_name'] = $file_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
	
				if ($this->upload->do_upload('attachment')) {
					$gbr = $this->upload->data();
					$data['attachment'] = $file_name . $gbr['file_ext'];
				} else {
					redirect('admin/announcement/add?type='.$type);
				}
			}
		}

		$where = [
			'id' => $id
		];

		$this->m_crud->update('announcement', $data, $where);
		redirect(site_url('admin/announcement?type='.$type));
	}

	public function delete() 
    {
		$id = $_POST['id'];

		$where = [
			'id'     => $id,
		];

		$result = $this->m_crud->delete('announcement', $where);
        
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
				$param = [
					'get_by_custom' => $value['A'], 
					'custom_param' => 'nis'
				];
				$student = $this->m_crud->getData('student', $param)->row();

				$data[] = [
					'student_id' 	=> $student->id,
					'class_id' 		=> $student->class_id,
					'title' 		=> $value['D'] ?? null,
					'description' 	=> $value['E'] ?? null,
					'status_exam' 	=> $value['F'] ?? null,
					'type' 			=> 1,
					'created_at' 	=> date('Y-m-d H:i:s'),
					'created_by' 	=> $session->id,
				];
			}

			// input data ke database tb student
			$this->m_crud->add_batch('announcement', $data);

			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}
}
