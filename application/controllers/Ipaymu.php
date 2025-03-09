<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipaymu extends CI_Controller {

	
	function __construct(){
		parent::__construct();	
	}

	public function index()
	{
		// SAMPLE HIT API iPaymu v2 PHP //
        $va           = '0000008169098859'; // nomer virtual account akun
        $secret       = 'SANDBOXE6A00959-4651-4EDF-87C2-E2564BFFEA64'; // api key account iPaymu

        $url          = 'https://sandbox.ipaymu.com/api/v2/payment'; // url mode sandbox
        $method       = 'POST'; // method POST

		//Request Body//
		$body['product']    = array('headset', 'softcase'); // nama produk yang dibeli
		$body['qty']        = array('1', '3'); // jumlah produk yang dibeli
		$body['price']      = array('5000', '2000'); // harga produk yang dibeli
		$body['returnUrl']  = 'https://kodee.my.id/thankyou'; // return url setelah pembayaran berhasil
		$body['cancelUrl']  = 'https://kodee.my.id/cancel'; // return url setelah pembayaran dibatalkan
		$body['notifyUrl']  = 'https://kodee.my.id/notify';  // url untuk notifikasi pembayaran
		//End Request Body//

		//Generate Signature
		// *Don't change this
		$jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
		$requestBody  = strtolower(hash('sha256', $jsonBody));
		$stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $secret;
		$signature    = hash_hmac('sha256', $stringToSign, $secret);
		$timestamp    = Date('YmdHis');
		//End Generate Signature

		// melakukan request ke server iPaymu
		$ch = curl_init($url);

		// set header request
		// *Don't change this
		$headers = array(
			'Accept: application/json',
			'Content-Type: application/json',
			'va: ' . $va,
			'signature: ' . $signature,
			'timestamp: ' . $timestamp
		);

		// set option curl
		// *Don't change this
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		curl_setopt($ch, CURLOPT_POST, count($body));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$err = curl_error($ch);
		$ret = curl_exec($ch);
		curl_close($ch);
		// end request

		if ($err) {
			// jika terjadi kesalahan
			echo "<pre>";
			print_r($err);
			echo "</pre>";
		} else {
			// jika berhasil
			// Response
			$ret = json_decode($ret);
			if ($ret->Status == 200) {
				// jika status OK
				// ambil url pembayaran
				$url        =  $ret->Data->Url;
				// redirect ke url pembayaran
				header('Location:' . $url);
			} else {
				// jika status tidak OK
				echo "<pre>";
				print_r($ret);
				echo "</pre>";
			}
			//End Response
		}
	}
}
