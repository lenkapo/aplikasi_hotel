<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'frontend/Beranda';
$route['/'] = 'frontend/Beranda/index';
$route['room'] = 'frontend/Beranda/room';
$route['gallery'] = 'frontend/Beranda/gallery';

// Menu
$route['menu'] = 'frontend/Beranda/menu';


$route['blog'] = 'frontend/Beranda/blog';

$route['our_hotel'] = 'frontend/Beranda/ourhotel';
// Booking
$route['booking'] = 'frontend/Beranda/booking';
$route['beranda/submit'] = 'frontend/beranda/submit';
$route['invoice'] = 'frontend/beranda/invoice';

$route['tentang_kami'] = 'frontend/Beranda/tentangkami';
$route['contact'] = 'frontend/Beranda/contact';
$route['blog_detail/(:any)'] = 'frontend/Beranda/blog_detail/$1';
$route['facilities/(:any)'] = 'frontend/Beranda/facilities/$1';
$route['room_detail/(:num)'] = 'frontend/Beranda/details/$1';

$route['beranda/search'] = 'frontend/beranda/search';
$route['beranda/send_message'] = 'frontend/beranda/send_message';

// Subscribe
$route['subscribe'] = 'Frontend/Beranda/subscribe';

$route['recovery_password'] = 'forgot_password/recov/';
$route['404_override'] = 'dashboard/error404/';
$route['translate_uri_dashes'] = FALSE;
