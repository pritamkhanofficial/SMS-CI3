<?php

class Department extends My_Controller
{
    private $user_id = null;
    function __construct()
    {
        parent::__construct(); 

        if($this->session->has_userdata('user_id')) { //if logged-in
            $this->user_id = $this->session->user_id;
             $this->load->model('Department_m');
        }else{
            redirect(base_url('/'));
        }
    }

    public function  college_department()
    {
        $output = $this->Department_m->college_department();
        $this->load->view('common_v', $output);
    }
    
    public function  department_faculty_details()
    {
        $output = $this->Department_m->department_faculty_details();
        $this->load->view('common_v', $output);
    }

    public function  departmental_gallery()
    {
        $output = $this->Department_m->departmental_gallery();
        $this->load->view('common_v', $output);
    }

    

    

    

    

    

     

    

}

?>