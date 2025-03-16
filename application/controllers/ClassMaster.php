<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassMaster extends CI_Controller {
	
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
		$data['class'] = $this->m_crud->getData('class')->result();
		$data['title'] = 'Data Kelas';
		$data['breadcrumb1'] = 'Kelas';
		$data['breadcrumb2'] = 'Data Kelas';

		$this->loadContent('admin/class/index', $data);
	}

	public function list()
	{
		$list = $this->m_crud->getData('class')->result();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $user) {
			$no++;
			$row = array();
			$row[] = $no;

			$row[] = $user->name;
			
			$row[] =  anchor('admin/master/class/edit/' . $user->id, ' Edit ', ' class="btn btn-warning btn-sm" ') .
			
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
		$data['title'] = 'Tambah Data Kelas';
		$data['breadcrumb1'] = 'Kelas';
		$data['breadcrumb2'] = 'Tambah Data Kelas';

		$this->loadContent('admin/class/add', $data);
	}

	public function store() 
	{
		$name 		= $this->input->post('name');

		$data = array(
			'name' => $name
		);

		$this->m_crud->input($data, 'class');
		redirect(site_url('admin/master/class'));	
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Data Kelas';
		$data['breadcrumb1'] = 'Kelas';
		$data['breadcrumb2'] = 'Edit Data Kelas';

		$param = ['get_by_id' => $id];
		$data['class'] = $this->m_crud->getData('class', $param)->row();

		$this->loadContent('admin/class/edit', $data);
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

		$this->m_crud->update('class', $data, $where);
		redirect(site_url('admin/master/class'));
	}

	public function delete() 
    {
		$id = $_POST['id'];

		$where = [
			'id'     => $id,
		];

		$result = $this->m_crud->delete('class', $where);
        
        if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
    }
}
