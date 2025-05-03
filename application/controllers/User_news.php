<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_news extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_crud');
		date_default_timezone_set('Asia/Jakarta');
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

	public function show($id) 
	{
		$data['title'] = 'Berita';
		$data['breadcrumb1'] = 'Berita';
		$data['breadcrumb2'] = 'Detail';

		$param = ['get_by_id' => $id];
		$data['news'] = $this->m_crud->getData('news', $param)->row();

		$this->load->view('detail_news', $data);
	}

	public function show_list() 
	{
		$list = $this->m_crud->getData('news')->result();

		$data['title'] = 'Daftar Berita';
		$data['breadcrumb1'] = 'Berita';
		// $data['breadcrumb2'] = 'Detail';
		$data['list'] = $list;

		$this->load->view('list_news', $data);
	}
}
