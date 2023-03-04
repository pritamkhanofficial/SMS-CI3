<?php

class Profile extends My_Controller {

    private $user_id = null;

    public function __construct() {
        parent::__construct();

        if($this->session->has_userdata('role_id')) { //if logged-in
             $this->user_type = $this->session->role_id;
             $this->load->model('Master_m');
        }else{
            redirect(base_url('/'));
        }
    }

    public function index() {
        redirect(base_url('admin/profile'));
    }

    public function profile() {
        if($this->user_type == null) { //if not logged-in
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else { //if admin already logged-in
            $this->load->model('Profile_m');
            $data = $this->Profile_m->profile();
            $this->load->view($data['page'], $data['data']);
        }
    } // /.profile

    public function form_basic_info() {
        // die();
        if($this->user_type == null) { //if not logged-in
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else { //if admin already logged-in
            $this->load->model('Profile_m');
            $this->Profile_m->form_basic_info();
        }
    } // /.form_basic_info

    public function form_change_pass() {
        if($this->user_type == null) { //if not logged-in
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else { //if admin already logged-in
            $this->load->model('Profile_m');
            $this->Profile_m->form_change_pass();
        }
    } // /.form_change_pass

    public function form_change_email() {
        if($this->user_type == null) { //if not logged-in
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else { //if admin already logged-in
            $this->load->model('Profile_m');
            $this->Profile_m->form_change_email();
        }
    } // /.form_change_email

    public function change_email($verification_key) {
        $this->load->model('Profile_m');
        $this->Profile_m->change_email($verification_key);
    } // /.change_email

    public function ajax_username_check() {
        if($this->user_type == null) { //if not logged-in
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else { //if admin already logged-in
            $this->load->model('Profile_m');
            $this->Profile_m->ajax_username_check();
        }
    } // /.ajax_username_check

    public function form_change_username() {
        if($this->user_type == null) { //if not logged-in
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else { //if admin already logged-in
            $this->load->model('Profile_m');
            $this->Profile_m->form_change_username();
        }
    } // /.form_change_username

} // /.Profile() controller