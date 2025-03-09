<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] =   'Auth/login';
$route['register'] =   'Auth/register';

$route['detail/(:any)'] =   'Home/show/$1';
$route['cart'] =   'User_cart/index';
$route['checkout'] =   'User_cart/checkout';

// route admin
$route['login'] =   'Auth/login'; //untuk login
$route['dashboard'] =   'Admin_home';

//route admin product
$route['produk'] = 'Produk'; //menampilkan list produk
$route['product-add'] = 'Produk/add'; //menampilkan form tambah produk
$route['product-edit/(:any)'] = 'Produk/edit/$1'; //menampilkan form edit produk
$route['product-delete/(:any)'] = 'Produk/delete/$1'; //delete

//route admin pemesanan
$route['transaction'] = 'Admin_transaction';
$route['transaction-detail/(:any)'] = 'Admin_transaction/detail/$1';
$route['transaction-delete/(:any)'] = 'Admin_transaction/delete/$1';

//route register login user
$route['user/login'] =   'User_auth/login';
$route['user/register'] =   'User_auth/register';

// route frontend produk
$route['v/produk'] = 'V_produk';
$route['v/produk/(:any)'] = 'V_produk/index/$1';
$route['v/detail/(:any)'] = 'V_produk/detail/$1';

$route['v/add_cart/(:any)'] = 'User_cart/add_cart/$1';
$route['v/delete_cart/(:any)'] = 'User_cart/delete_cart/$1';

$route['v/checkout_action'] = 'User_cart/checkout_action';

$route['order'] = 'User_order';
$route['check_coupon'] = 'User_cart/check_coupon';


$route['ipaymu'] = 'Ipaymu';

$route['user/forgot_password'] =   'User_auth/forgot';