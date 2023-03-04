<?php

class Error_c extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Error_m');
        $this->load->library('user_agent');
    }

    public function  csrf_auth()
    {
        $output = $this->Error_m->error_log_data_403();

        if ($output == true) {
            $this->load->view('csrf_error_v');
        }
    }

    public function  e404()
    {
       
        $this->load->view('error_404_v');
    
    }
    
}

?>