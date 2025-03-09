<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_cart extends CI_Controller {
    function __construct(){
		parent::__construct();	

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

        $this->db->select('cart.*, member.name, product.name as product, product.price, (product.price * qty) as total');
        $this->db->from('cart');
        $this->db->join('member', 'member.id = cart.member_id');
        $this->db->join('product', 'product.id = cart.product_id');
        $data['query'] = $this->db->get()->result(); 

		$this->load->view('cart', $data);
	}

    public function add_cart($id) 
	{
		$session = $this->session->userdata('email');
		$product_id = $id;
		$qty = $this->input->post('qty');

		if (isset($session)) {
			$where = array(
				'email' => $session
			);
	
			$user = $this->db->get_where('member',$where)->row_array();

			$where_cart = array(
				'member_id' => $user['id'],
				'product_id' => $product_id
			);
			$product_cart = $this->db->get_where('cart',$where_cart)->row_array();
			
			if (($product_cart != null) && (count($product_cart) > 0)) {
				$data = array(
					'member_id' => $user['id'],
					'product_id' => $product_id,
					'qty' => $qty + $product_cart['qty'],
					);

				$this->db->where('id', $product_cart['id']);
				$this->db->update('cart', $data);
			}else{
				$data = array(
					'member_id' => $user['id'],
					'product_id' => $product_id,
					'qty' => $qty,
					);
				
				$this->m_transaction->input_data($data,'cart');
			}
			
			redirect('V_produk/detail/'.$id);
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Anda harus login dahulu!</div>');

            redirect('User_auth/login');
		}
	}

    public function checkout()
    {
        // Ambil data dari form
        $selected_items = $this->input->post('selected_items'); // Array ID produk yang terpilih 1,2,3

        if ($selected_items) {
            // Query produk berdasarkan ID yang dipilih
            $this->db->select('cart.*, member.name, product.name as product, product.price, (product.price * qty) as total');
            $this->db->from('cart');
            $this->db->join('member', 'member.id = cart.member_id');
            $this->db->join('product', 'product.id = cart.product_id');
            $this->db->where_in('cart.id', $selected_items);
            $data['items'] = $this->db->get()->result();
            
            $this->load->view('checkout', $data);
        } else {
            // Jika tidak ada item yang dipilih
            $this->session->set_flashdata('error', 'No items selected!');
            redirect('cart'); // Redirect ke halaman cart
        }
    }

	public function delete_cart($id = null)
    {
        if ($id) {
            $this->db->delete('cart', ['id' => $id]);

            redirect('User_cart/index');
        } else {
            redirect('User_cart/index');
        }
    }

	public function checkout_action() 
	{
		$session = $this->session->userdata('email');
		$where = array(
			'email' => $session
		);

		$member = $this->db->get_where('member',$where)->row_array();
		$auto_code = rand() . date("Y/m/d") . $member['id'];

		$product_id = $this->input->post('product_id');

		$code				= $auto_code;
		$member_id			= $member['id'];
		$recipient_name		= $this->input->post('recipient_name');
		$recipient_address	= $this->input->post('recipient_address');
		$status				= 1;
		$recipient_email	= $this->input->post('recipient_email');
		$recipient_phone	= $this->input->post('recipient_phone');
		$province			= $this->input->post('province');
		$city				= $this->input->post('city');
		$village			= $this->input->post('village');
		$payment_type		= $this->input->post('payment_type');
		$amount_paid		= $this->input->post('grand_total');
		$grand_total		= $this->input->post('grand_total');
		$due_date			= date("Y/m/d", strtotime("+1 day"));
		$payment_date		= date("Y/m/d");
		$product_id			= $this->input->post('product_id');
		$voucher_id			= $this->input->post('voucher_id');
		$coupon_val			= $this->input->post('coupon_val');

		$config['allowed_types'] = 'jpg|png|gif|jpeg';

		$config['max_size'] = '5000';

		$config['upload_path'] = './img/Payment_proof';

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('attachment')) {
			$imageName = $this->upload->data('file_name');

			$config['image_library']    = 'gd2';
			$config['source_image']     = './img/Payment_proof/' . $imageName;
			//lokasi folder gbr
			$config['new_image']    = './img/Payment_proof/';
			$config['create_thumb']     = TRUE;
			$config['maintain_ratio']   = TRUE;
			$config['quality']          = '100%';
			$config['width']            = 720;
			$config['height']           = 720;
			$config['thumb_marker']     = '';

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$data_transaction = array(
				'code' => $code,
				'member_id' => $member_id,
				'recipient_name' => $recipient_name,
				'recipient_address' => $recipient_address,
				'recipient_email' => $recipient_email,
				'recipient_phone' => $recipient_phone,
				'province' => $province,
				'city' => $city,
				'village' => $village,
				'amount_paid' => $amount_paid,
				'grand_total' => $grand_total,
				'due_date' => $due_date,
				'attachment' => $imageName,
				'payment_date' => $payment_date,
				'payment_type' => $payment_type,
				'status' => $status,
				'voucher_id' => $voucher_id,
				'disc' => $coupon_val,
				);
			
			$this->m_transaction->input_data($data_transaction,'transaction');
			$transaction = $this->db->insert_id();

			foreach ($product_id as $key => $value) {
				$data_detail = [
					'transaction_id' => $transaction, 
					'product_id' => $value, 
					'price' => $this->input->post('price')[$key], 
					'qty' => $this->input->post('qty')[$key], 
					'total_price' => $this->input->post('total_price')[$key], 
				];

				$where = array(
					'id' => $value
				);
				$product = $this->db->get_where('member',$where)->row_array();
				$new_stock = $product->stock - $this->input->post('qty')[$key]; //95

				$this->db->set('stock', $new_stock);
				$this->db->where('id', $value);
				$this->db->update('product');

				$this->db->insert('detail_transaction',$data_detail); 
			}

			

			$this->db->where_in('product_id', $product_id);
			$this->db->where_in('member_id', $member_id);
    		$this->db->delete('cart');
			
			redirect('User_cart/index');
		}else{
			$data_transaction = array(
				'code' => $code,
				'member_id' => $member_id,
				'recipient_name' => $recipient_name,
				'recipient_address' => $recipient_address,
				'recipient_email' => $recipient_email,
				'recipient_phone' => $recipient_phone,
				'province' => $province,
				'city' => $city,
				'village' => $village,
				'amount_paid' => $amount_paid,
				'grand_total' => $grand_total,
				'due_date' => $due_date,
				'payment_date' => $payment_date,
				'payment_type' => $payment_type,
				'status' => $status,
				);
			
				$this->m_transaction->input_data($data_transaction,'transaction');
				$transaction = $this->db->insert_id();

				foreach ($product_id as $key => $value) {
					$data_detail = [
						'transaction_id' => $transaction, 
						'product_id' => $value, 
						'price' => $this->input->post('price')[$key], 
						'qty' => $this->input->post('qty')[$key], 
						'total_price' => $this->input->post('total_price')[$key], 
					];
					$this->db->insert('detail_transaction',$data_detail);
				}

			$this->db->where_in('product_id', $product_id);
			$this->db->where_in('member_id', $member_id);
    		$this->db->delete('cart');
			
			redirect('User_cart/index');
		}
	}

	public function check_coupon() 
	{
		if ($this->input->is_ajax_request()) {
			$date = date("Y-m-d");
			$coupon = $this->input->post('coupon');	

			// ambil data voucher		
			$this->db->where('code',$coupon);
			$this->db->where('expired >',$date);
			$voucher = $this->db->get('voucher')->row();

			if ($voucher) {
				echo json_encode(['status' => 'success', 'message' => 'Kupon valid!', 'data' => $voucher]);
			}else{
				echo json_encode(['status' => 'error', 'message' => 'Kupon tidak valid!']);
            	return;
			}
		}else {
			echo json_encode(['status' => 'error', 'message' => 'Kupon tidak valid!']);
            return;
		}
		
	}
}