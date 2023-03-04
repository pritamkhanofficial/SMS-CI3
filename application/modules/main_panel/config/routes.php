<?php 

/*if ($this->session->user_id == null) {
    die();
}*/



$route["dashboard"] = "main_panel/Dashboard/index";




/*master area*/



$route["account_hdr"] = "main_panel/master/account_hdr"; 
$route['account_hdr/(:any)'] = 'main_panel/master/account_hdr';
$route['account_hdr/(:any)/(:any)'] = 'main_panel/master/account_hdr';
$route['account_hdr/(:any)/(:any)/(:any)'] = 'main_panel/master/account_hdr';

$route["account_dtl"] = "main_panel/master/account_dtl"; 
$route['account_dtl/(:any)'] = 'main_panel/master/account_dtl';
$route['account_dtl/(:any)/(:any)'] = 'main_panel/master/account_dtl';
$route['account_dtl/(:any)/(:any)/(:any)'] = 'main_panel/master/account_dtl';


$route["account_dtl"] = "main_panel/master/account_dtl"; 
$route['account_dtl/(:any)'] = 'main_panel/master/account_dtl';
$route['account_dtl/(:any)/(:any)'] = 'main_panel/master/account_dtl';
$route['account_dtl/(:any)/(:any)/(:any)'] = 'main_panel/master/account_dtl';

$route["session"] = "main_panel/master/session"; 
$route['session/(:any)'] = 'main_panel/master/session';
$route['session/(:any)/(:any)'] = 'main_panel/master/session';
$route['session/(:any)/(:any)/(:any)'] = 'main_panel/master/session';

$route["section"] = "main_panel/master/section"; 
$route['section/(:any)'] = 'main_panel/master/section';
$route['section/(:any)/(:any)'] = 'main_panel/master/section';
$route['section/(:any)/(:any)/(:any)'] = 'main_panel/master/section';

$route['classes'] = 'main_panel/master/classes';
$route['update_class/(:any)'] = 'main_panel/master/update_class/$1';
$route["add_classes"] = "main_panel/master/add_classes"; 
$route["subject_type"] = "main_panel/master/subject_type"; 
$route['subject_type/(:any)'] = 'main_panel/master/subject_type';
$route['subject_type/(:any)/(:any)'] = 'main_panel/master/subject_type';
$route['subject_type/(:any)/(:any)/(:any)'] = 'main_panel/master/subject_type';
$route["subjects"] = "main_panel/master/subjects"; 
$route['subjects/(:any)'] = 'main_panel/master/subjects';
$route['subjects/(:any)/(:any)'] = 'main_panel/master/subjects';
$route['subjects/(:any)/(:any)/(:any)'] = 'main_panel/master/subjects';
$route["fees_assign_add"] = "main_panel/master/fees_assign_add"; 
$route["fees_assign_edit/(:num)"] = "main_panel/master/fees_assign_edit/$1"; 
$route["fees_assign"] = "main_panel/master/fees_assign"; 
$route["class_subject"] = "main_panel/master/class_subject"; 
$route["add_subjects"] = "main_panel/master/add_subjects"; 
$route["add_employee"] = "main_panel/Master/add_employee"; 
$route["edit_subject"] = "main_panel/Ajax/edit_subject"; 

/*---------*/

/*Student Area*/
$route["student_add"] = "main_panel/Student/student_add"; 

/*-----------*/


/*Setting Area*/
$route["user_role"] = "main_panel/settings/user_role"; 
$route['user_role/(:any)'] = 'main_panel/settings/user_role';
$route['user_role/(:any)/(:any)'] = 'main_panel/settings/user_role';
$route['user_role/(:any)/(:any)/(:any)'] = 'main_panel/settings/user_role';

$route["global_setting"] = "main_panel/settings/global_setting"; 
$route['global_setting/(:any)'] = 'main_panel/settings/global_setting';
$route['global_setting/(:any)/(:any)'] = 'main_panel/settings/global_setting';
$route['global_setting/(:any)/(:any)/(:any)'] = 'main_panel/settings/global_setting';
/*-----------*/

/*Profile Area*/


$route['profile'] = 'main_panel/Profile/profile';

$route['form_basic_info'] = 'main_panel/Profile/form_basic_info';

$route['form_change_pass'] = 'main_panel/Profile/form_change_pass';


$route['form_change_username'] = 'main_panel/Profile/form_change_username';

$route['ajax_username_check'] = 'main_panel/Profile/ajax_username_check';

























?>