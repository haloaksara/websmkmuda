<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');		
		$this->load->model('m_user');
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
		$data['user'] = $this->m_user->getData()->result();
		$data['title'] = 'Data Pengguna';
		$data['breadcrumb1'] = 'Pengguna';
		$data['breadcrumb2'] = 'Data Pengguna';

		$this->loadContent('admin/users/index', $data);
	}

	public function list()
	{
		$list = $this->m_user->getData()->result();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $user) {
			$no++;
			$row = array();
			$row[] = $no;

			$row[] = $user->name;
			$row[] = $user->email;

			if ($user->gender == '0') {
				$gender = 'Perempuan';
			} else if ($user->gender == '1') {
				$gender = 'Laki-laki';
			}else{
				$gender = '-';
			}

			$row[] = $user->phone;
			$row[] = $gender;
			
			if ($user->is_active == '1') {
				$is_active = '<span class="badge rounded-pill bg-primary">Aktif</span>';
			} else if ($user->is_active == '0') {
				$is_active = '<span class="badge rounded-pill bg-warning">Tidak Aktif</span>';
			}

			$row[] = $is_active;

			$row[] =  anchor('admin/master/users/edit/' . $user->id, ' Edit ', ' class="btn btn-warning btn-sm" ') .
			
			'  <button class="btn btn-danger btn-sm delete" data-id=' . "'" . $user->id . "'" . '>Hapus</button>';
			
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
		$data['title'] = 'Tambah Data Pengguna';
		$data['breadcrumb1'] = 'Pengguna';
		$data['breadcrumb2'] = 'Tambah Data Pengguna';

		$this->loadContent('admin/users/add', $data);
	}

	public function store() 
	{
		$name 		= $this->input->post('name');
		$email 		= $this->input->post('email');
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$phone 		= $this->input->post('phone');
		$gender 	= $this->input->post('gender');
		$address 	= $this->input->post('address');
		$status 	= $this->input->post('is_active');

		$data = array(
			'name' => $name,
			'email' => $email,
			'username' => $username,
			'password' => sha1($password),
			'phone' => $phone,
			'gender' => $gender,
			'address' => $address,
			'is_active' => $status,
			'created_at' => date('Y-m-d H:i:s')
		);

		$this->m_crud->input($data, 'users');
		redirect('User');	
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Data Pengguna';
		$data['breadcrumb1'] = 'Pengguna';
		$data['breadcrumb2'] = 'Edit Data Pengguna';

		$param = ['get_by_id' => $id];
		$data['user'] = $this->m_crud->getData('users', $param)->row();

		$this->loadContent('admin/users/edit', $data);
	}

	public function update() 
	{
		$session = $this->session->userdata('id');
		$id = $this->input->post('id');
		$data = $this->m_crud->getData('users', ['get_by_id' => $id])->row();

		$name 		= $this->input->post('name');
		$email 		= $this->input->post('email');
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$phone 		= $this->input->post('phone');
		$gender 	= $this->input->post('gender');
		$address 	= $this->input->post('address');
		$status 	= $this->input->post('is_active');
		
		if (isset($password) && !empty($password)) {
			$password = sha1($password);
		}else{
			$password = $data->password;
		}

		$data = array(
			'name' => $name,
			'email' => $email,
			'username' => $username,
			'password' => $password,
			'phone' => $phone,
			'gender' => $gender,
			'address' => $address,
			'is_active' => $status,
			'updated_at' => date('Y-m-d H:i:s'),
			'updated_by' => $session
		);

		$where = [
			'id' => $id
		];

		$this->m_crud->update('users', $data, $where);
		redirect('User');
	}

	public function delete() 
    {
		$id = $_POST['id'];

		$where = [
			'id'     => $id,
		];

		

		$result = $this->m_crud->delete('users', $where);
        
        if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
    }
}
