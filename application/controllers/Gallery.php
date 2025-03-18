<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	
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
		$data['title'] = 'Data Galeri';
		$data['breadcrumb1'] = 'Galeri';
		$data['breadcrumb2'] = 'Data Galeri';

		$this->loadContent('admin/gallery/index', $data);
	}

	public function list()
	{
		$list = $this->m_crud->getData('gallery')->result();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $dt) {
			$no++;
			$row = array();
			$row[] = $no;

			$row[] = '<img src="../upload/gallery/'.$dt->attachment.'" style="width: auto; height: 100px;" alt="No Image">';

			$row[] =  anchor('admin/gallery/edit/' . $dt->id, ' Edit ', ' class="btn btn-warning btn-sm" ') .
			
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
		$data['title'] = 'Tambah Data Galeri';
		$data['breadcrumb1'] = 'Galeri';
		$data['breadcrumb2'] = 'Tambah Data Galeri';

		$this->loadContent('admin/gallery/add', $data);
	}

	public function store() 
	{
		$description 		= $this->input->post('description');

		// buat array data untuk disimpan ke database
		$data = array(
			'description' => $description
		);

		if ($_FILES['image']['name'] != '' || $_FILES['image']['name'] != null || isset($_FILES['image']['name'])) {
			$image_name 	= 'imggallery_' . date('ymd') . '-' . substr(md5(rand()), 0, 10);	

			$config['upload_path'] = './upload/gallery/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['file_name'] = $image_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('image')) {
				$gbr = $this->upload->data();
				$data['attachment'] = $gbr['file_name'];
			} else {
				redirect('admin/gallery/add');
			}
		}

		$this->m_crud->input($data, 'gallery');
		redirect(site_url('admin/gallery'));	
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Data Galeri';
		$data['breadcrumb1'] = 'Galeri';
		$data['breadcrumb2'] = 'Edit Data Galeri';

		$param = ['get_by_id' => $id];
		$data['gallery'] = $this->m_crud->getData('gallery', $param)->row();

		$this->loadContent('admin/gallery/edit', $data);
	}

	public function update() 
	{
		$id 			= $this->input->post('id');
		$data_gallery = $this->m_crud->getData('gallery', ['get_by_id' => $id])->row();
		
		$description 		= $this->input->post('description');

		// buat array data untuk disimpan ke database
		$data = array(
			'description' => $description
		);

		if ($_FILES['image']['error'] != 4) {
			$image_name 	= 'imggallery_' . date('ymd') . '-' . substr(md5(rand()), 0, 10);	

			$config['upload_path'] = './upload/gallery/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['file_name'] = $image_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('image')) {
				$gbr = $this->upload->data();
				$data['attachment'] = $gbr['file_name'];
			} else {
				redirect('admin/gallery/edit/'.$id);
			}
		}

		$this->m_crud->update('gallery', $data, ['id' => $id]);
		redirect(site_url('admin/gallery'));	
	}

	public function delete() 
    {
		$id = $_POST['id'];

		$where = [
			'id'     => $id,
		];

		$result = $this->m_crud->delete('gallery', $where);
        
        if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
    }
}
