<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();	
		$this->load->model('m_crud');
	}

	public function index()
	{
		$param = [
			'get_by_custom' => 1,
			'custom_param' => 'status'
		];
		$data['news'] = $this->m_crud->getData('news', $param)->result();
		// var_dump($data); die;

		$this->load->view('index', $data);
	}

	public function show($id)
	{
		$query = "SELECT * FROM product where id_product = '".$id."'";
		
		$this->load->view('detail');
	}
	
	public function cart()
	{
		$this->load->view('cart');
	}
	
	public function checkout()
	{
		$this->load->view('checkout');
	}
}