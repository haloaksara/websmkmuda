<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Controller {
	
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
		$data['permission'] = $this->m_crud->getData('permission')->result();
		$data['title'] = 'Data Permission';
		$data['breadcrumb1'] = 'Permission';
		$data['breadcrumb2'] = 'Data Permission';

		$this->loadContent('admin/permissions/index', $data);
	}

	public function list()
	{
		$list = $this->m_crud->getData('permission')->result();
		// var_dump($list); die();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $dt) {
			$no++;
			$row = array();
			$row[] = $no;

			$row[] = $dt->name;
			
			$row[] =  anchor('admin/permissions/edit/' . $dt->id, ' Edit ', ' class="btn btn-warning btn-sm" ') .
			
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
		$data['title'] = 'Tambah Data Permission';
		$data['breadcrumb1'] = 'Permission';
		$data['breadcrumb2'] = 'Tambah Data Permission';

		$this->loadContent('admin/permissions/add', $data);
	}

	public function store() 
	{
		$name 		= $this->input->post('name');

		$data = array(
			'name' => $name
		);

		$this->m_crud->input($data, 'permission');
		redirect('Permission');	
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Data Permission';
		$data['breadcrumb1'] = 'Permission';
		$data['breadcrumb2'] = 'Edit Data Permission';

		$param = ['get_by_id' => $id];
		$data['permissions'] = $this->m_crud->getData('permission', $param)->row();

		$this->loadContent('admin/permissions/edit', $data);
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

		$this->m_crud->update('permission', $data, $where);
		redirect('Permission');
	}

	public function delete() 
    {
		$id = $_POST['id'];

		$where = [
			'id'     => $id,
		];

		$result = $this->m_crud->delete('permission', $where);
        
        if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
    }
}
