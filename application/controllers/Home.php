<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();	
	}

	public function index()
	{
		$this->load->view('index');
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