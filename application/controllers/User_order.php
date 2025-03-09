<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_order extends CI_Controller {
    function __construct(){
		parent::__construct();	
        if($this->session->userdata('status') != "login"){
			redirect(base_url("user/login"));
		}

		$this->load->model('m_product');
		$this->load->model('m_login');
		$this->load->model('m_transaction');
	}

    public function index()
	{
        $session = $this->session->userdata('email');
        $where = array(
            'email' => $session
        );
        $user = $this->db->get_where('member',$where)->row_array();

        $this->db->select('transaction.*, member.name as member_name');
        $this->db->from('transaction');
        $this->db->join('member', 'member.id = transaction.member_id', 'left');
        $this->db->where('member_id', $user['id']);
        $data['query'] = $this->db->get()->result(); 

		$this->load->view('list_order', $data);
	}

}