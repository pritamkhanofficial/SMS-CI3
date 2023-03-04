<?php

class Committee extends My_Controller
{
    private $user_id = null;
    function __construct()
    {
        parent::__construct(); 

        if($this->session->has_userdata('user_id')) { //if logged-in
            $this->user_id = $this->session->user_id;
             $this->load->model('Committee_m');
        }else{
            redirect(base_url('/'));
        }
    }

    public function  college_committee()
    {
        $output = $this->Committee_m->college_committee();
        $this->load->view('common_v', $output);
    }
    
    public function  committee_details()
    {
        $output = $this->Committee_m->committee_details();
        $this->load->view('common_v', $output);
    }

    

    

    

    

     

    

}

?>