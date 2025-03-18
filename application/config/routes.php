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

// route auth
$route['login'] =   'Auth/login';
$route['register'] =   'Auth/register';
$route['logout'] =   'Auth/logout';
$route['forgot_password'] =   'User_auth/forgot';

// route admin
$route['dashboard'] =   'Dashboard';

// route user
$route['admin/master/users'] =   'User';
$route['admin/master/users/list'] =   'User/list';
$route['admin/master/users/add'] =   'User/add';
$route['admin/master/users/edit/(:any)'] = 'User/edit/$1';

// route student
$route['admin/master/student'] =   'Student';
$route['admin/master/student/list'] =   'Student/list';
$route['admin/master/student/add'] =   'Student/add';
$route['admin/master/student/edit/(:any)'] = 'Student/edit/$1';
$route['admin/master/student/import'] = 'Student/import';

// route class
$route['admin/master/class'] =   'ClassMaster';
$route['admin/master/class/list'] =   'ClassMaster/list';
$route['admin/master/class/add'] =   'ClassMaster/add';
$route['admin/master/class/edit/(:any)'] = 'ClassMaster/edit/$1';

// route major
$route['admin/master/major'] =   'Major';
$route['admin/master/major/list'] =   'Major/list';
$route['admin/master/major/add'] =   'Major/add';
$route['admin/master/major/edit/(:any)'] = 'Major/edit/$1';

// route berita
$route['admin/news'] =   'News';
$route['admin/news/list'] =   'News/list';
$route['admin/news/add'] =   'News/add';
$route['admin/news/edit/(:any)'] = 'News/edit/$1';

// route galeri
$route['admin/gallery'] =   'Gallery';
$route['admin/gallery/list'] =   'Gallery/list';
$route['admin/gallery/add'] =   'Gallery/add';
$route['admin/gallery/edit/(:any)'] = 'Gallery/edit/$1';

// route hak akses
$route['admin/roles'] =   'Role';
$route['admin/roles/list'] =   'Role/list';
$route['admin/roles/add'] =   'Role/add';
$route['admin/roles/edit/(:any)'] = 'Role/edit/$1';

$route['admin/permissions'] =   'Permission';
$route['admin/permissions/list'] =   'Permission/list';
$route['admin/permissions/add'] =   'Permission/add';
$route['admin/permissions/edit/(:any)'] = 'Permission/edit/$1';