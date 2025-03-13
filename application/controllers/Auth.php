<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');		
		$this->load->model('m_auth');
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
		$username = trim($this->input->post('username'));
		$password = trim($this->input->post('password'));	

		$where = array(
			'username' => $username,
			'password' => sha1($password),
			'is_active' => '1'
		);

		$cek = $this->m_auth->cek_login("users",$where)->row_array();

		if(count($cek) > 0){
 
			$data_session = array(
				'username' => $cek['username'],
				'name' => $cek['name'],
				'phone' => $cek['phone'],
				'status' => "login",
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("dashboard"));
 
		}else{
			echo "Username dan password salah !";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
