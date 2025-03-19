<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
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
		$data['role'] = $this->m_crud->getData('roles')->result();
		$data['title'] = 'Data Role';
		$data['breadcrumb1'] = 'Role';
		$data['breadcrumb2'] = 'Data Role';

		$this->loadContent('admin/roles/index', $data);
	}

	public function list()
	{
		$list = $this->m_crud->getData('roles')->result();
		$data = array();
		$no = @$_POST['start'];

		foreach ($list as $dt) {
			
			$sql = "SELECT 
						role_has_permission.*,
						permission.name 
					FROM role_has_permission 
					LEFT JOIN permission ON role_has_permission.permission_id = permission.id
					WHERE role_has_permission.role_id = " . $dt->id;

			$data_permission = $this->db->query($sql)->result();

			$no++;
			$row = array();
			$row[] = $no;

			$row[] = $dt->name;

			$permission = '<ul>';
			foreach ($data_permission as $key => $value) {
				$permission .= '<li>' . $value->name . '</li>';
			}
			$permission .= '</ul>';

			$row[] = $permission;
			
			$row[] =  anchor('admin/roles/edit/' . $dt->id, ' Edit ', ' class="btn btn-warning btn-sm" ') .
			
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
		$data['title'] = 'Tambah Data Role';
		$data['breadcrumb1'] = 'Role';
		$data['breadcrumb2'] = 'Tambah Data Role';

		$this->loadContent('admin/roles/add', $data);
	}

	public function store() 
	{
		$name 		= $this->input->post('name');

		$data = array(
			'name' => $name
		);

		$this->m_crud->input($data, 'roles');
		redirect('Role');	
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Data Role';
		$data['breadcrumb1'] = 'Role';
		$data['breadcrumb2'] = 'Edit Data Role';

		$param = ['get_by_id' => $id];
		$data['roles'] = $this->m_crud->getData('roles', $param)->row();
		$data['permissions'] = $this->m_crud->getData('permission')->result();
		$data['role_permissions'] = $this->m_crud->getData('role_has_permission', ['custom_param' => 'role_id', 'get_by_custom' => $id])->result_array();

		$this->loadContent('admin/roles/edit', $data);
	}

	public function update() 
	{
		$permission 	= $this->input->post('permission');
		$id 			= $this->input->post('id');

		// hapus data lama
		$this->m_crud->delete('role_has_permission', ['role_id' => $id]);

		// insert data baru
		foreach ($permission as $key => $value) {
			$data = [
				'role_id' => $id,
				'permission_id' => $value
			];

			$this->m_crud->input($data, 'role_has_permission');
		}
		
		redirect(site_url('admin/roles'));
	}

	public function delete() 
    {
		$id = $_POST['id'];

		$where = [
			'id'     => $id,
		];

		$result = $this->m_crud->delete('roles', $where);
        
        if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
    }
}
