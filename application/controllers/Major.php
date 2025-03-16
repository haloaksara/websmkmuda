<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Major extends CI_Controller {
	
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
		$data['major'] = $this->m_crud->getData('major')->result();
		$data['title'] = 'Data Jurusan';
		$data['breadcrumb1'] = 'Jurusan';
		$data['breadcrumb2'] = 'Data Jurusan';

		$this->loadContent('admin/major/index', $data);
	}

	public function list()
	{
		$list = $this->m_crud->getData('major')->result();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $user) {
			$no++;
			$row = array();
			$row[] = $no;

			$row[] = $user->name;
			
			$row[] =  anchor('admin/master/major/edit/' . $user->id, ' Edit ', ' class="btn btn-warning btn-sm" ') .
			
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
		$data['title'] = 'Tambah Data Jurusan';
		$data['breadcrumb1'] = 'Jurusan';
		$data['breadcrumb2'] = 'Tambah Data Jurusan';

		$this->loadContent('admin/major/add', $data);
	}

	public function store() 
	{
		$name 		= $this->input->post('name');

		$data = array(
			'name' => $name
		);

		$this->m_crud->input($data, 'major');
		redirect(site_url('admin/master/major'));	
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Data Jurusan';
		$data['breadcrumb1'] = 'Jurusan';
		$data['breadcrumb2'] = 'Edit Data Jurusan';

		$param = ['get_by_id' => $id];
		$data['major'] = $this->m_crud->getData('major', $param)->row();

		$this->loadContent('admin/major/edit', $data);
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

		$this->m_crud->update('major', $data, $where);
		redirect(site_url('admin/master/major'));
	}

	public function delete() 
    {
		$id = $_POST['id'];

		$where = [
			'id'     => $id,
		];

		$result = $this->m_crud->delete('major', $where);
        
        if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
    }
}
