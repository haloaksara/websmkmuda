<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	
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
		$data['title'] = 'Data Berita';
		$data['breadcrumb1'] = 'Berita';
		$data['breadcrumb2'] = 'Data Berita';

		$this->loadContent('admin/news/index', $data);
	}

	public function list()
	{
		$list = $this->m_crud->getData('news')->result();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $dt) {
			$no++;
			$row = array();
			$row[] = $no;

			$row[] = $dt->title;
			$row[] = substr($dt->content, 0, 100) . '...';
			$row[] = $dt->post_date;

			if ($dt->status == '0') {
				$status = '<span class="badge rounded-pill bg-warning">Draft</span>';
			} else if ($dt->status == '1') {
				$status = '<span class="badge rounded-pill bg-primary">Publish</span>';
			}else{
				$status = '-';
			}

			$row[] = $status;

			$row[] = '<a href="../upload/news/'.$dt->file.'" class="btn btn-xs btn-primary">Download File</a>';
			$row[] = '<img src="../upload/news/'.$dt->image.'" style="width: auto; height: 100px;" alt="No Image">';

			$row[] =  anchor('admin/news/edit/' . $dt->id, ' Edit ', ' class="btn btn-warning btn-sm" ') .
			
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
		$data['title'] = 'Tambah Data Berita';
		$data['breadcrumb1'] = 'Berita';
		$data['breadcrumb2'] = 'Tambah Data Berita';

		$this->loadContent('admin/news/add', $data);
	}

	public function store() 
	{
		$email_session 	= $this->session->userdata('email');
		$param			= [
			'custom_param' => 'email',
			'get_by_custom' => $email_session
		];

		$session		= $this->m_crud->getData('users', $param)->row();
		$title 			= $this->input->post('title');
		$content 		= $this->input->post('content');
		$post_date 		= $this->input->post('post_date');
		$status 		= $this->input->post('status');
		$created_by 	= $session->id;

		// buat array data untuk disimpan ke database
		$data = array(
			'title' => $title,
			'content' => $content,
			'post_date' => $post_date,
			'status' => $status,
			'created_at' => date('Y-m-d H:i:s'),
			'created_by' => $created_by
		);

		if ($_FILES['image']['name'] != '' || $_FILES['image']['name'] != null || isset($_FILES['image']['name'])) {
			$image_name 	= 'imgnews_' . date('ymd') . '-' . substr(md5(rand()), 0, 10);	

			$config['upload_path'] = './upload/news/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['file_name'] = $image_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('image')) {
				$gbr = $this->upload->data();
				$data['image'] = $gbr['file_name'];
			} else {
				redirect('admin/news/add');
			}
		}

		if ($_FILES['file']['name'] != '' || $_FILES['file']['name'] != null || isset($_FILES['file']['name'])) {
			$file_name 	= 'filenews_' . date('ymd') . '-' . substr(md5(rand()), 0, 10);	
			
			$config['upload_path'] = './upload/news/';
			$config['allowed_types'] = 'pdf|doc|docx';
			$config['max_size'] = '3000'; //maksimum besar file 2M
			$config['file_name'] = $file_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {
				$gbr = $this->upload->data();
				$data['file'] = $gbr['file_name'];
			} else {
				redirect('admin/news/add');
			}
		}

		$this->m_crud->input($data, 'news');
		redirect(site_url('admin/news'));	
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Data Berita';
		$data['breadcrumb1'] = 'Berita';
		$data['breadcrumb2'] = 'Edit Data Berita';

		$param = ['get_by_id' => $id];
		$data['news'] = $this->m_crud->getData('news', $param)->row();

		$this->loadContent('admin/news/edit', $data);
	}

	public function update() 
	{
		$email_session 	= $this->session->userdata('email');
		$param			= [
			'custom_param' => 'email',
			'get_by_custom' => $email_session
		];

		$session		= $this->m_crud->getData('users', $param)->row();
		$id 			= $this->input->post('id');
		$title 			= $this->input->post('title');
		$content 		= $this->input->post('content');
		$post_date 		= $this->input->post('post_date');
		$status 		= $this->input->post('status');
		$updated_by 	= $session->id;

		$data_news = $this->m_crud->getData('news', ['get_by_id' => $id])->row();

		// buat array data untuk disimpan ke database
		$data = array(
			'title' => $title,
			'content' => $content,
			'post_date' => $post_date,
			'status' => $status,
			'updated_at' => date('Y-m-d H:i:s'),
			'updated_by' => $updated_by
		);

		if ($_FILES['image']['error'] != 4) {
			$image_name 	= 'imgnews_' . date('ymd') . '-' . substr(md5(rand()), 0, 10);	

			$config['upload_path'] = './upload/news/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['file_name'] = $image_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('image')) {
				$gbr = $this->upload->data();
				$data['image'] = $gbr['file_name'];
			} else {
				redirect('admin/news/edit/'.$id);
			}
		}

		if ($_FILES['file']['error'] != 4) {
			$file_name 	= 'filenews_' . date('ymd') . '-' . substr(md5(rand()), 0, 10);	
			
			$config['upload_path'] = './upload/news/';
			$config['allowed_types'] = 'pdf|doc|docx';
			$config['max_size'] = '3000'; //maksimum besar file 2M
			$config['file_name'] = $file_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {
				$gbr = $this->upload->data();
				$data['file'] = $gbr['file_name'];
			} else {
				redirect('admin/news/edit/'.$id);
			}
		}

		$this->m_crud->update('news', $data, ['id' => $id]);
		redirect(site_url('admin/news'));	
	}

	public function delete() 
    {
		$id = $_POST['id'];

		$where = [
			'id'     => $id,
		];

		$result = $this->m_crud->delete('news', $where);
        
        if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
    }

	public function uploadImage()
	{
		$file_name = 'news_' . date('ymd') . '-' . substr(md5(rand()), 0, 10);		

		$config['upload_path'] = './upload/img/news/';
		$config['allowed_types'] = 'pdf|doc|docx|gif|jpg|png|jpeg';
		$config['max_size'] = '2048'; //maksimum besar file 2M
		$config['file_name'] = $file_name;
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		return $file_name;
	}
}
