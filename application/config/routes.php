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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Fro_index_ct/index';
$route['home'] = 'Fro_index_ct/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//front-end
$route['company/jobs'] = 'Fro_jobs_ct/index';
$route['company/about-us'] = 'Fro_aboutus_ct/index';
$route['company/legal'] = 'Fro_legal_ct/index';
$route['apps/(:any)'] = 'Fro_apps_ct/index';
$route['apps/request/(:any)'] = 'Fro_apps_ct/addrequest';
$route['support'] = 'Fro_support_ct/index';
$route['support/add'] = 'Fro_support_ct/addsupport';
$route['company/legal/(:any)'] = 'Fro_legal_ct/legalacticle';
$route['company/jobs/apply-job/(:any)'] = 'Fro_jobs_ct/loadapply';
$route['company/jobs/apply-job/(:any)/add'] = 'Fro_jobs_ct/applyjob';


//login
$route['admin/logout'] = 'Das_user_ct/logout';
$route['admin/user/edit/(:any)'] = 'Das_user_ct/loadedit';
$route['admin'] = 'Das_user_ct/index';
$route['admin/login'] = 'Das_user_ct/index';
$route['admin/checkout'] = 'Das_user_ct/checkout';

//dashboard

$route['admin/dashboard'] = 'dashboard/index';
//apps
$route['admin/apps/add-new-app'] = 'Das_apps_ct/loadadd';
$route['admin/apps/add-new-app/(:any)'] = 'Das_apps_ct/add';
$route['admin/apps/list-of-apps/edit-app/(:any)'] = 'Das_apps_ct/loadedit';
$route['admin/apps/list-of-apps'] = 'Das_apps_ct/index';
$route['admin/apps/list-of-apps/delete/(:any)'] = 'Das_apps_ct/deleteapp';
$route['admin/apps/list-of-apps/edit-app/(:any)/update'] = 'Das_apps_ct/edit';
$route['admin/apps/os'] = 'Das_apps_ct/loados';
$route['admin/apps/os/add-os-to-app'] = 'Das_apps_ct/addostoapp';
$route['admin/apps/os/update/(:any)'] = 'Das_apps_ct/updateos';
$route['admin/apps/os/delete/(:any)'] = 'Das_apps_ct/deleteos';
$route['admin/apps/main-features'] = 'Das_apps_ct/loadmf';
$route['admin/apps/main-features/update/(:any)'] = 'Das_apps_ct/loadeditmf';
$route['admin/apps/main-features/delete/(:any)'] = 'Das_apps_ct/delmf';
$route['admin/apps/main-features/edit-mf/(:any)'] = 'Das_apps_ct/updatemf';
$route['admin/apps/add-new-feature-of-app'] = 'Das_apps_ct/loadaddmf';
$route['admin/apps/add-new-feature-of-app/new'] = 'Das_apps_ct/addmf';


//company
$route['admin/company/infomation'] = 'Das_company_ct/index'; //company thiet ke edit tren trang infomnation luon!!!!!!!!!!!!!!
$route['admin/company/infomation/add-company'] = 'Das_company_ct/addcom';
$route['admin/company/infomation/delete/(:any)'] = 'Das_company_ct/deletecom';
$route['admin/company/infomation/update/(:any)'] = 'Das_company_ct/updatecom';
$route['admin/company/add-new-contact'] = 'Das_company_ct/loadaddcontact';
$route['admin/company/add-new-contact/new'] = 'Das_company_ct/addcont';
$route['admin/company/list-of-contacts'] = 'Das_company_ct/loadlistcontact';
$route['admin/company/list-of-contacts/update/(:any)'] = 'Das_company_ct/editcont';
$route['admin/company/list-of-contacts/delete/(:any)'] = 'Das_company_ct/deletecont';
$route['admin/company/infomation/add-social'] = 'Das_company_ct/addsocial';
$route['admin/company/infomation/social/delete/(:any)'] = 'Das_company_ct/deletesocial';

//jobs
$route['admin/jobs/add-new-job'] = 'Das_jobs_ct/loadaddjob';
$route['admin/jobs/list-of-jobs'] = 'Das_jobs_ct/index';
$route['admin/jobs/employment'] = 'Das_jobs_ct/loadlistemployment';
$route['admin/jobs/employment/delete/(:any)'] = 'Das_jobs_ct/deleteemploy';
$route['admin/jobs/add-new-job/add-position/new'] = 'Das_jobs_ct/addposi';
$route['admin/jobs/add-new-job/new'] = 'Das_jobs_ct/addjob';
$route['admin/jobs/list-of-jobs/update/(:any)'] = 'Das_jobs_ct/loadeditjob';
$route['admin/jobs/list-of-jobs/update/(:any)/edit'] = 'Das_jobs_ct/editjob';
$route['admin/jobs/list-of-jobs/delete/(:any)'] = 'Das_jobs_ct/deljob';
$route['admin/jobs/add-new-job/delete/position'] = 'Das_jobs_ct/delpo';

//staffs
$route['admin/staffs/add-new-staff'] = 'Das_staffs_ct/loadaddstaff';
$route['admin/staffs/list-of-staffs'] = 'Das_staffs_ct/index';
$route['admin/staffs/edit-staff/(:any)'] = 'Das_staffs_ct/loadeditstaff';

//customer
$route['admin/customers/list-of-requests'] = 'Das_customer_ct/index';
$route['admin/customers/list-of-requests/delete/(:any)'] = 'Das_customer_ct/delrequest';

//settings
$route['admin/settings/sliders'] = 'Das_settings_ct/loadsliders';

//legal
$route['admin/legal/list-of-legal'] = 'Das_legal_ct/index';
$route['admin/legal/add-new-legal'] = 'Das_legal_ct/loadaddlegal';
$route['admin/legal/add-new-legal/new'] = 'Das_legal_ct/addlegal';
$route['admin/legal/list-of-legal/update/(:any)'] = 'Das_legal_ct/editlegal';
$route['admin/legal/list-of-legal/delete/(:any)'] = 'Das_legal_ct/deletele';


//api push
$route['api/ios/pushNotification']='Eezz/PushNotification_Controller/pushCrossServer';
