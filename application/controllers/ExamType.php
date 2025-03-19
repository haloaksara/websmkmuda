<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamType extends CI_Controller {
	
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
		$data['title'] = 'Data Jenis Ujian';
		$data['breadcrumb1'] = 'Jenis Ujian';
		$data['breadcrumb2'] = 'Data Jenis Ujian';

		$this->loadContent('admin/exam_type/index', $data);
	}

	public function list()
	{
		$list = $this->m_crud->getData('exam_type')->result();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $user) {
			$no++;
			$row = array();
			$row[] = $no;

			$row[] = $user->name;
			
			$row[] =  anchor('admin/master/exam_type/edit/' . $user->id, ' Edit ', ' class="btn btn-warning btn-sm" ') .
			
			'  <button class="btn btn-danger btn-sm delete" data-id=' . "'" . $user->id . "'" . '>Hapus</button>';
			
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
		$data['title'] = 'Tambah Data Jenis Ujian';
		$data['breadcrumb1'] = 'Jenis Ujian';
		$data['breadcrumb2'] = 'Tambah Data Jenis Ujian';

		$this->loadContent('admin/exam_type/add', $data);
	}

	public function store() 
	{
		$name 		= $this->input->post('name');

		$data = array(
			'name' => $name
		);

		$this->m_crud->input($data, 'exam_type');
		redirect(site_url('admin/master/exam_type'));	
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Data Jenis Ujian';
		$data['breadcrumb1'] = 'Jenis Ujian';
		$data['breadcrumb2'] = 'Edit Data Jenis Ujian';

		$param = ['get_by_id' => $id];
		$data['exam_type'] = $this->m_crud->getData('exam_type', $param)->row();

		$this->loadContent('admin/exam_type/edit', $data);
	}

	public function update() 
	{
		$id 	= $this->input->post('id');
		$name 	= $this->input->post('name');

		$data = array(
			'name' => $name,
		);

		$where = [
			'id' => $id
		];

		$this->m_crud->update('exam_type', $data, $where);
		redirect(site_url('admin/master/exam_type'));
	}

	public function delete() 
    {
		$id = $_POST['id'];

		$where = [
			'id'     => $id,
		];

		$result = $this->m_crud->delete('exam_type', $where);
        
        if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
    }
}
