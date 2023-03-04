<?php 

/*if ($this->session->user_id == null) {
    die();
}*/



$route["home"] = "website/Website/home_page";

$route["department_details/(:num)"] = "website/Website/department_details/$1";

$route["committee_details/(:num)"] = "website/Website/committee_details/$1";


$route["gallery"] = "website/Website/gallery";


$route["notice"] = "website/Website/notice";



?>