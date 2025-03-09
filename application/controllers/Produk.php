<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	function __construct(){
		parent::__construct();	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}

		$this->load->model('m_product');
	}

	public function index()
	{
		$data['product'] = $this->m_product->show()->result();

		$this->load->view('admin/product/produk', $data);
	}

	public function add() 
	{
		$this->load->view('admin/product/product_add');	
	}

	public function add_action() 
	{
		$code = $this->input->post('code');	
		$name = $this->input->post('name');	
		$slug = $this->input->post('slug');	
		$price = $this->input->post('price');	
		$stock = $this->input->post('stock');	
		$status = $this->input->post('status');	
		$image = $this->input->post('image');	
		$description = $this->input->post('description');

		$config['allowed_types'] = 'jpg|png|gif|jpeg';

		$config['max_size'] = '5000';

		$config['upload_path'] = './img/Produk';

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			$imageName = $this->upload->data('file_name');

			$config['image_library']    = 'gd2';
			$config['source_image']     = './img/Produk/' . $imageName;
			//lokasi folder gbr
			$config['new_image']    = './img/Produk/';
			$config['create_thumb']     = TRUE;
			$config['maintain_ratio']   = TRUE;
			$config['quality']          = '100%';
			$config['width']            = 720;
			$config['height']           = 720;
			$config['thumb_marker']     = '';

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$data = array(
				'code' => $code,
				'name' => $name,
				'slug' => $slug,
				'price' => $price,
				'stock' => $stock,
				'status' => $status,
				'description' => $description,
				'image' => $imageName,
				);
			$this->m_product->input_data($data,'product');
			
			redirect('Produk/index');
		}else{
			$data = array(
				'code' => $code,
				'name' => $name,
				'slug' => $slug,
				'price' => $price,
				'stock' => $stock,
				'status' => $status,
				'description' => $description,
				);
			$this->m_product->input_data($data,'product');
			
			redirect('Produk/index');
		}
	}

	public function edit($id) 
	{
		$data['product'] = $this->m_product->edit($id,'product')->row_array();
		
		$this->load->view('admin/product/product_edit', $data);	
	}

	public function edit_action() 
	{
		$id = $this->input->post('id');	
		$code = $this->input->post('code');	
		$name = $this->input->post('name');	
		$slug = $this->input->post('slug');	
		$price = $this->input->post('price');	
		$stock = $this->input->post('stock');	
		$status = $this->input->post('status');	
		$image = $this->input->post('image');	
		$description = $this->input->post('description');

		$config['allowed_types'] = 'jpg|png|gif|jpeg';

		$config['max_size'] = '5000';

		$config['upload_path'] = './img/Produk';

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			$imageName = $this->upload->data('file_name');

			$config['image_library']    = 'gd2';
			$config['source_image']     = './img/Produk/' . $imageName;
			//lokasi folder gbr
			$config['new_image']    = './img/Produk/';
			$config['create_thumb']     = TRUE;
			$config['maintain_ratio']   = TRUE;
			$config['quality']          = '100%';
			$config['width']            = 720;
			$config['height']           = 720;
			$config['thumb_marker']     = '';

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$data = array(
				'code' => $code,
				'name' => $name,
				'slug' => $slug,
				'price' => $price,
				'stock' => $stock,
				'status' => $status,
				'description' => $description,
				'image' => $imageName,
				);
			
			$this->db->where('id', $id);
			$this->db->update('product', $data);
			
			redirect('Produk/index');
		}else{
			$data = array(
				'code' => $code,
				'name' => $name,
				'slug' => $slug,
				'price' => $price,
				'stock' => $stock,
				'status' => $status,
				'description' => $description,
				);
			
			$this->db->where('id', $id);
			$this->db->update('product', $data);
			
			redirect('Produk/index');
		}
	}

	public function delete($id = null)
    {
        if ($id) {
            $this->db->delete('product', ['id' => $id]);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Produk Berhasil Dihapus</div>');

            redirect('Produk/index');
        } else {
            redirect('Produk/index');
        }
    }
}
