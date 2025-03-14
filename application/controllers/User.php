<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');		
		$this->load->model('m_auth');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$data['user'] = $this->m_auth->tampil_data()->result();
		$this->load->view('admin/users/index');
	}
}
