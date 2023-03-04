<?php

class Department extends My_Controller
{
    function __construct()
    {
        parent::__construct(); 
        $this->load->model('Department_m');
    
    }

    public function  department_page()
    {
        $data = $this->Department_m->department_page();
        $this->load->view('department', $data);
    }

}

?>