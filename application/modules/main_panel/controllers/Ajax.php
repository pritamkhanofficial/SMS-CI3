<?php  ?>
<?php

class Ajax extends My_Controller
{
    private $user_id = null;
    function __construct()
    {
        parent::__construct(); 

        if($this->session->has_userdata('role_id')) { //if logged-in
             $this->user_type = $this->session->role_id;
             $this->load->model('Ajax_m');
        }else{
            redirect(base_url('/'));
        }
    }

    public function getSectionByClass()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Ajax_m->getSectionByClass();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }
    public function edit_subject()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Ajax_m->edit_subject();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }
}

?>