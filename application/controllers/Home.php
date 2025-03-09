<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();	
		$this->load->model('m_product');
	}

	public function index()
	{
		$data['product'] = $this->m_product->show(4)->result();
		
		$this->load->view('home', $data);
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