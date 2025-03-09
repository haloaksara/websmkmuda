<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_produk extends CI_Controller {
	function __construct(){
		parent::__construct();	

		$this->load->model('m_product');
		$this->load->model('m_login');
		$this->load->model('m_transaction');
	}

	public function index($page = 0)
	{
		// Load Pagination Library
		$this->load->library('pagination');
		
		// Konfigurasi Pagination
		$config['base_url'] = base_url() .'v/produk/'; // URL tujuan
		$config['total_rows'] = $this->m_product->count_all(); // Total produk
		$config['per_page'] = 6; // Jumlah produk per halaman
		$config['uri_segment'] = 3; // Posisi segmen pagination dalam URL
		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;
		$config['num_links'] = 5;

		// Styling Pagination (Opsional)
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '</span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';

		$config['first_url'] = base_url() . 'v/produk';
	
		// Inisialisasi Pagination
		$this->pagination->initialize($config);

		$page         = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;

		$data['product'] = $this->m_product->get_products($config['per_page'], $page)->result();
		$data['pagination'] = $this->pagination->create_links(); // Buat link pagination

		$this->load->view('product', $data);
	}

	public function detail($id) 
	{
		$data['product'] = $this->m_product->detail($id,'product')->row_array();
		$data['other_product'] = $this->m_product->show('5')->result();
		
		$this->load->view('detail', $data);	
	}
}
