<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');		
		$this->load->model('m_auth');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
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
		$data['title'] = 'Data Kelas';
		$data['breadcrumb1'] = 'Kelas';
		$data['breadcrumb2'] = 'Data Kelas';

		$this->loadContent('admin/home', $data);
	}
}
