<?php

class User extends My_Controller
{
    function __construct()
    {
        parent::__construct();  
        $this->load->model('User_m');
    }

	public  function index()
    {
        $output = $this->User_m->user_register();
        $this->load->view('user/index', $output);
    }

    

}

?>