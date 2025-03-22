<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');		
		$this->load->model('m_auth');
		$this->load->model('m_crud');
	}

	public function index()
	{
		$this->load->view('admin/home');
	}

	public function login()
	{
		$this->load->view('login');
	}
	
	public function register()
	{
		$this->load->view('register');
	}

	public function action_login() 
	{
		// Hapus pesan error dari session sebelum login diproses
		$this->session->unset_userdata('error'); 

		$username = trim($this->input->post('username'));
		$password = trim($this->input->post('password'));	

		$where = array(
			'username' => $username,
			'password' => sha1($password),
			'is_active' => '1'
		);

		$cek = $this->m_auth->cek_login("users",$where)->row_array();

		if($cek){
			$param			= [
				'custom_param' => 'user_id',
				'get_by_custom' => $cek['id']
			];
			$user_has_role = $this->m_crud->getData('user_has_role', $param)->row_array();

			$data_session = array(
				'id' => $cek['id'],
				'username' => $cek['username'],
				'name' => $cek['name'],
				'phone' => $cek['phone'],
				'status' => "login",
				'permission' => $user_has_role['role_id']
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("dashboard"));
 
		}else{
			$this->session->set_flashdata('error', 'Username atau password salah!');
			redirect('login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
