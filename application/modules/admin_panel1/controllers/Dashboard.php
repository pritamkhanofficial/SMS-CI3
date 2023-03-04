<?php

class Dashboard extends My_Controller
{
    function __construct()
    {
        parent::__construct();  
        if ($this->session->user_id == null) {
             redirect(base_url('/'));
        }else{
            $this->load->model('Dashboard_m');
        }
    }

	public  function index()
    {
        
        $data = $this->Dashboard_m->dashboard_data();

		$this->load->view('dashboard_v',$data);
    }
 


}

?>