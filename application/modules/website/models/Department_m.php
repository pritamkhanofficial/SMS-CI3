<?php

class Department_m extends CI_Model {
	
 function __construct()
    {
        parent::__construct();  
        $this->load->library('grocery_CRUD');
        date_default_timezone_set("Asia/Kolkata");
    }

    public function department_page()
    {
        
    } 
}