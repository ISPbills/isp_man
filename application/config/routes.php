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
$route['default_controller'] = 'Authentication/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Authentication
$route['login'] = 'Authentication/login';
$route['logout'] = 'Authentication/logout';

// Dashboard
$route['dashboard'] = 'Dashboard/index';

// User
$route['user_list'] = 'User/user_list';
$route['create_user'] = 'User/create_user';
$route['choose_service/(:num)'] = 'User/choose_service/$1';
$route['stb_availability'] = 'User/stb_availability';
$route['add_cable/(:num)'] = 'User/add_cable/$1';
$route['add_net/(:num)'] = 'User/add_net/$1';
$route['add_voip/(:num)'] = 'User/add_voip/$1';

$route['assign_validity/(:num)'] = 'User/assign_validity/$1';

// STB
$route['stb_list'] = 'Stb/stb_list';
$route['create_stb'] = 'Stb/create_stb';

// Cable Package
$route['package_list'] = 'Package/package_list';
$route['create_package'] = 'Package/create_package';

// Internet
$route['internet_list'] = 'Internet/internet_list';
$route['create_internet'] = 'Internet/create_internet';
$route['update_internet/(:num)'] = 'Internet/update_internet/$1';

// VoIP
$route['voip_list'] = 'Voip/voip_list';
$route['create_voip'] = 'Voip/create_voip';
$route['update_voip/(:num)'] = 'Voip/update_voip/$1';

// Area
$route['area_list'] = 'Area/area_list';
$route['create_area'] = 'Area/create_area';
$route['update_area/(:num)'] = 'Area/update_area/$1';

// Branch
$route['branch_list'] = 'Branch/branch_list';
$route['create_branch'] = 'Branch/create_branch';
$route['update_branch/(:num)'] = 'Branch/update_branch/$1';

// Staff
$route['staff_list'] = 'Staff/staff_list';
$route['create_staff'] = 'Staff/create_staff';
$route['update_staff/(:num)'] = 'Staff/update_staff/$1';
$route['delete_staff/(:num)'] = 'Staff/delete_staff/$1';