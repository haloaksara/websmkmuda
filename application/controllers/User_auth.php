<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_auth extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');		
		$this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('home');
	}

	public function login()
	{
		$this->load->view('user_login');
	}
	
	public function register()
	{
		$this->load->view('user_register');
	}

	public function action_login() 
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');	

		$where = array(
			'email' => $email,
			'password' => md5($password)
		);

		$cek = $this->m_login->cek_login("member",$where)->num_rows();

		if($cek > 0){
 
			$data_session = array(
				'email' => $email,
				'status' => "login",
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("/"));
 
		}else{
			echo "Email dan password salah !";
		}
	}

	public function action_register() 
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');	
		$phone = $this->input->post('phone');	
		$gender = $this->input->post('gender');	
		$address = $this->input->post('address');	

		// cek email apakah sudah pernah daftar
		$where = array(
			'email' => $email
		);

		$cek = $this->m_login->cek_email("member",$where)->num_rows();

		if($cek > 0){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email Sudah Terdaftar</div>');

            redirect('User_auth/register');
		}else{
			$data = array(
				'name' => $name,
				'email' => $email,
				'password' => md5($password),
				'phone' => $phone,
				'gender' => $gender,
				'address' => $address,
				'status' => 1,
				);
			$this->m_login->input_data($data,'member');

			redirect(site_url("user/login"));
		}

		
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('/'));
	}

	public function forgot()
	{
		$this->load->view('forgot');	
	}

	public function action_forgot() 
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');	
		$re_password = $this->input->post('re_password');

		// cek apakah password sama
		if ($password != $re_password) {
            redirect('User_auth/forgot');
		}

		// cek email apakah sudah pernah daftar
		$where = array(
			'email' => $email
		);

		$cek = $this->m_login->cek_email("member",$where)->row_array();

		// cek jika email tidak ada maka gagal
		if ($cek <= 0) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email Tidak Ditemukan!</div>');

            redirect('User_auth/forgot');
		}else{
			$data = array(
				'password' => md5($password),
				);

			$this->db->where('id', $cek['id']);
			$this->db->update('member', $data);

			redirect(site_url("user/login"));
		}

	}
}
