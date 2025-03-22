<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');		
		$this->load->model('m_auth');
		$this->load->model('m_crud');

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
		$data['title'] 			= 'Data Kelas';
		$data['breadcrumb1'] 	= 'Kelas';
		$data['breadcrumb2'] 	= 'Data Kelas';
		$data['role_id'] 		= $this->session->userdata('permission');
		$role_id				= $this->session->userdata('permission');

		$user_id 			= $this->session->userdata('id');
		$param				= ['get_by_id' => $user_id];
		$data['user']		= $this->m_crud->getData('users', $param)->row();

		$param 				= [
			'get_by_custom'	=> $user_id,
			'custom_param'	=> 'user_id'
		];
		$data['student'] 	= $this->m_crud->getData('student', $param)->row();

		// cek apakah siswa
		if ($role_id == 3) {
			// ambil data pengumuman yang private berdasarkan siswa yang login
			$this->db->where('student_id', $data['student']->id);
			$this->db->where('class_id', $data['student']->class_id);
			$data['announcement'] = $this->db->get('announcement')->result();

			$this->db->select('student_file.*, file_type.name');
			$this->db->from('student_file');
			$this->db->join('file_type', 'file_type.id = student_file.file_type_id', 'left');
			$this->db->where('student_file.student_id', $data['student']->id);
			$data['student_file'] = $this->db->get()->result();
		}
		
		// var_dump($data); die;

		$this->loadContent('admin/home', $data);
	}
}
