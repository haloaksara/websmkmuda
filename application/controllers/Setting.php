<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	
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
		$data['title'] = 'Data Setting';
		$data['breadcrumb1'] = 'Setting';
		$data['breadcrumb2'] = 'Data Setting';

		$this->loadContent('admin/setting/index', $data);
	}

	public function list()
	{
		$list = $this->m_crud->getData('settings')->result();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $dt) {
			$no++;
			$row = array();
			$row[] = $no;

			$row[] = $dt->key;
			$row[] = $dt->value;
			
			$row[] =  anchor('admin/setting/edit/' . $dt->id, ' Edit ', ' class="btn btn-warning btn-sm" ') .
			
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
		$data['title'] = 'Tambah Data Setting';
		$data['breadcrumb1'] = 'Setting';
		$data['breadcrumb2'] = 'Tambah Data Setting';

		$this->loadContent('admin/setting/add', $data);
	}

	public function store() 
	{
		$key 		= $this->input->post('key');
		$value 		= $this->input->post('value');

		$data = array(
			'key' => $key,
			'value' => $value ?? null
		);

		if (isset($_FILES['image']) && $_FILES['image']['name'] != 4) {
			$image_name 	= 'setting_' . date('ymd') . '-' . substr(md5(rand()), 0, 10);	

			$config['upload_path'] = './upload/setting/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['file_name'] = $image_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('image')) {
				$gbr = $this->upload->data();
				$data['value'] = $gbr['file_name'];
			} else {
				redirect('admin/setting/add');
			}
		}

		$this->m_crud->input($data, 'settings');
		redirect(site_url('admin/setting'));	
	}

	public function edit($id)
	{
		$data['title'] = 'Tambah Data Setting';
		$data['breadcrumb1'] = 'Setting';
		$data['breadcrumb2'] = 'Tambah Data Setting';

		$param = ['get_by_id' => $id];
		$data['settings'] = $this->m_crud->getData('settings', $param)->row();

		$this->loadContent('admin/setting/edit', $data);
	}

	public function update() 
	{
		$id 	= $this->input->post('id');
		$key 		= $this->input->post('key');
		$value 		= $this->input->post('value');

		$data = array(
			'key' => $key,
			'value' => $value ?? null
		);

		if (isset($_FILES['image']) && $_FILES['image']['name'] != 4) {
			$image_name 	= 'setting_' . date('ymd') . '-' . substr(md5(rand()), 0, 10);	

			$config['upload_path'] = './upload/setting/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['file_name'] = $image_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('image')) {
				$gbr = $this->upload->data();
				$data['value'] = $gbr['file_name'];
			} else {
				redirect('admin/setting/edit/'.$id);
			}
		}

		$where = [
			'id' => $id
		];

		$this->m_crud->update('settings', $data, $where);
		redirect(site_url('admin/setting'));
	}

	public function delete() 
    {
		$id = $_POST['id'];

		$where = [
			'id'     => $id,
		];

		$result = $this->m_crud->delete('settings', $where);
        
        if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
    }
}
