<?php  ?>
<?php

class Settings extends My_Controller
{
    private $user_id = null;
    function __construct()
    {
        parent::__construct(); 

        if($this->session->has_userdata('role_id')) { //if logged-in
             $this->user_type = $this->session->role_id;
             $this->load->model('Settings_m');
        }else{
            redirect(base_url('/'));
        }
    }

    public function user_role()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Settings_m->user_role();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }

    public function global_setting()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Settings_m->global_setting();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }

    

    

       

}

?>