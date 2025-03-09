<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_transaction extends CI_Controller {
	function __construct(){
		parent::__construct();	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('m_transaction');
	}

	public function index()
	{
		$data['order'] = $this->m_transaction->list()->result();
		$this->load->view('admin/transaction/home', $data);
	}

	public function detail($id) 
	{
		$data['transaction'] = $this->m_transaction->edit($id,'transaction')->row_array();
		$this->db->select('detail_transaction.*, product.name');
		$this->db->from('detail_transaction');
		$this->db->join('product', 'product.id = detail_transaction.product_id');
		$this->db->where('detail_transaction.transaction_id', $id);
		$data['detail_transaction'] = $this->db->get()->result();
		
		$this->load->view('admin/transaction/transaction_edit', $data);	
	}

	public function edit_action() 
	{
		$id = $this->input->post('id');	
		$status = $this->input->post('status');	
		$data = array(
			'status' => $status,
			);
		$this->db->where('id', $id);
		$this->db->update('transaction', $data);
		redirect('Admin_transaction/index');
	}
}
