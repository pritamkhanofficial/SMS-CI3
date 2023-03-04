<?php  ?>
<?php

class Website extends My_Controller
{
    private $user_id = null;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Website_m');
    }


	public  function home_page()
    {
        $data = $this->Website_m->home_page();
        $this->load->view('home',$data);
    }

    public  function department_details($id)
    {
        $data = $this->Website_m->department_details($id);
        $this->load->view('department_details',$data);
    }

    public  function committee_details($id)
    {
        $data = $this->Website_m->committee_details($id);
        $this->load->view('committee_details',$data);
    }


    public  function gallery()
    {
        $data = $this->Website_m->gallery();
        $this->load->view('gallery',$data);
    }


    public  function notice()
    {
        $data = $this->Website_m->notice();
        $this->load->view('notice',$data);
    }
    

}

?>