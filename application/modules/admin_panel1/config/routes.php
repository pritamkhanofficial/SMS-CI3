<?php 

/*if ($this->session->user_id == null) {
    die();
}*/



$route["admin/dashboard"] = "admin_panel/Dashboard/index";



/*master area*/


$route["admin/role"] = "admin_panel/Master/role"; 
$route['admin/role/(:any)'] = 'admin_panel/Master/role';
$route['admin/role/(:any)/(:any)'] = 'admin_panel/Master/role';
$route['admin/role/(:any)/(:any)/(:any)'] = 'admin_panel/Master/role';


$route["admin/users"] = "admin_panel/Master/user"; 
$route['admin/users/(:any)'] = 'admin_panel/Master/user';
$route['admin/users/(:any)/(:any)'] = 'admin_panel/Master/user';
$route['admin/users/(:any)/(:any)/(:any)'] = 'admin_panel/Master/user';

$route['admin/add_user'] = 'admin_panel/Master/add_user';

$route['admin/form_add_user'] = 'admin_panel/Master/form_add_user';


$route['admin/edit_user/(:num)'] = 'admin_panel/Master/edit_user/$1';

$route['admin/form_edit_user'] = 'admin_panel/Master/form_edit_user';


$route['admin/slider'] = 'admin_panel/Master/slider';
$route['admin/slider/(:any)'] = 'admin_panel/Master/slider';
$route['admin/slider/(:any)/(:any)'] = 'admin_panel/Master/slider';
$route['admin/slider/(:any)/(:any)/(:any)'] = 'admin_panel/Master/slider';


$route['admin/administrative_heads'] = 'admin_panel/Master/administrative_heads';
$route['admin/administrative_heads/(:any)'] = 'admin_panel/Master/administrative_heads';
$route['admin/administrative_heads/(:any)/(:any)'] = 'admin_panel/Master/administrative_heads';
$route['admin/administrative_heads/(:any)/(:any)/(:any)'] = 'admin_panel/Master/administrative_heads';


$route['admin/member_message'] = 'admin_panel/Master/member_message';
$route['admin/member_message/(:any)'] = 'admin_panel/Master/member_message';
$route['admin/member_message/(:any)/(:any)'] = 'admin_panel/Master/member_message';
$route['admin/member_message/(:any)/(:any)/(:any)'] = 'admin_panel/Master/member_message';



$route['admin/about_hospital'] = 'admin_panel/Master/about_hospital';
$route['admin/about_hospital/(:any)'] = 'admin_panel/Master/about_hospital';
$route['admin/about_hospital/(:any)/(:any)'] = 'admin_panel/Master/about_hospital';
$route['admin/about_hospital/(:any)/(:any)/(:any)'] = 'admin_panel/Master/about_hospital';


$route['admin/history_heritage'] = 'admin_panel/Master/history_heritage';
$route['admin/history_heritage/(:any)'] = 'admin_panel/Master/history_heritage';
$route['admin/history_heritage/(:any)/(:any)'] = 'admin_panel/Master/history_heritage';
$route['admin/history_heritage/(:any)/(:any)/(:any)'] = 'admin_panel/Master/history_heritage';


$route['admin/academic_activitie'] = 'admin_panel/Master/academic_activitie';
$route['admin/academic_activitie/(:any)'] = 'admin_panel/Master/academic_activitie';
$route['admin/academic_activitie/(:any)/(:any)'] = 'admin_panel/Master/academic_activitie';
$route['admin/academic_activitie/(:any)/(:any)/(:any)'] = 'admin_panel/Master/academic_activitie';


$route['admin/faculty_details'] = 'admin_panel/Master/faculty_details';
$route['admin/faculty_details/(:any)'] = 'admin_panel/Master/faculty_details';
$route['admin/faculty_details/(:any)/(:any)'] = 'admin_panel/Master/faculty_details';
$route['admin/faculty_details/(:any)/(:any)/(:any)'] = 'admin_panel/Master/faculty_details';


$route['admin/gallery'] = 'admin_panel/Master/gallery';
$route['admin/gallery/(:any)'] = 'admin_panel/Master/gallery';
$route['admin/gallery/(:any)/(:any)'] = 'admin_panel/Master/gallery';
$route['admin/gallery/(:any)/(:any)/(:any)'] = 'admin_panel/Master/gallery';



$route['admin/tender_notice'] = 'admin_panel/Master/tender_notice';
$route['admin/tender_notice/(:any)'] = 'admin_panel/Master/tender_notice';
$route['admin/tender_notice/(:any)/(:any)'] = 'admin_panel/Master/tender_notice';
$route['admin/tender_notice/(:any)/(:any)/(:any)'] = 'admin_panel/Master/tender_notice';


$route['admin/about_college'] = 'admin_panel/Master/about_college';
$route['admin/about_college/(:any)'] = 'admin_panel/Master/about_college';
$route['admin/about_college/(:any)/(:any)'] = 'admin_panel/Master/about_college';
$route['admin/about_college/(:any)/(:any)/(:any)'] = 'admin_panel/Master/about_college';



$route['admin/contact'] = 'admin_panel/Master/contact';
$route['admin/contact/(:any)'] = 'admin_panel/Master/contact';
$route['admin/contact/(:any)/(:any)'] = 'admin_panel/Master/contact';
$route['admin/contact/(:any)/(:any)/(:any)'] = 'admin_panel/Master/contact';


 



/*--------------------*/


/*committee*/

$route['admin/college_committee'] = 'admin_panel/Committee/college_committee';
$route['admin/college_committee/(:any)'] = 'admin_panel/Committee/college_committee';
$route['admin/college_committee/(:any)/(:any)'] = 'admin_panel/Committee/college_committee';
$route['admin/college_committee/(:any)/(:any)/(:any)'] = 'admin_panel/Committee/college_committee';

$route['admin/committee_details'] = 'admin_panel/Committee/committee_details';
$route['admin/committee_details/(:any)'] = 'admin_panel/Committee/committee_details';
$route['admin/committee_details/(:any)/(:any)'] = 'admin_panel/Committee/committee_details';
$route['admin/committee_details/(:any)/(:any)/(:any)'] = 'admin_panel/Committee/committee_details';

/*---------*/


/*department*/

$route['admin/department'] = 'admin_panel/Department/college_department';
$route['admin/department/(:any)'] = 'admin_panel/Department/college_department';
$route['admin/department/(:any)/(:any)'] = 'admin_panel/Department/college_department';
$route['admin/department/(:any)/(:any)/(:any)'] = 'admin_panel/Department/college_department';

$route['admin/department_faculty_details'] = 'admin_panel/Department/department_faculty_details';
$route['admin/department_faculty_details/(:any)'] = 'admin_panel/Department/department_faculty_details';
$route['admin/department_faculty_details/(:any)/(:any)'] = 'admin_panel/Department/department_faculty_details';
$route['admin/department_faculty_details/(:any)/(:any)/(:any)'] = 'admin_panel/Department/department_faculty_details';


$route['admin/departmental_gallery'] = 'admin_panel/Department/departmental_gallery';
$route['admin/departmental_gallery/(:any)'] = 'admin_panel/Department/departmental_gallery';
$route['admin/departmental_gallery/(:any)/(:any)'] = 'admin_panel/Department/departmental_gallery';
$route['admin/departmental_gallery/(:any)/(:any)/(:any)'] = 'admin_panel/Department/departmental_gallery';


$route['admin/client_communicate_data'] = 'admin_panel/Master/client_communicate_data';
$route['admin/client_communicate_data/(:any)'] = 'admin_panel/Master/client_communicate_data';
$route['admin/client_communicate_data/(:any)/(:any)'] = 'admin_panel/Master/client_communicate_data';
$route['admin/client_communicate_data/(:any)/(:any)/(:any)'] = 'admin_panel/Master/client_communicate_data';




/*---------*/

/*Profile Area*/


$route['admin/profile'] = 'admin_panel/Profile/profile';

$route['admin/form_basic_info'] = 'admin_panel/Profile/form_basic_info';

$route['admin/form_change_pass'] = 'admin_panel/Profile/form_change_pass';


$route['admin/form_change_username'] = 'admin_panel/Profile/form_change_username';

$route['admin/ajax_username_check'] = 'admin_panel/Profile/ajax_username_check';

























?>