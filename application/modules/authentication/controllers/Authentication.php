<?php

class Authentication extends My_Controller {

    private $user_id = null;

    function __construct() {
        parent::__construct();
        // phpinfo();
        if($this->session->has_userdata('user_id')) { //if logged-in
            $this->user_id = $this->session->user_id;
        }
        $this->load->model('Authentication_m');
        //$this->load->helper('url');
    }
    public function index() {
       // echo $module_name = $this->uri->segment(1); die();
        $this->authentication();
    }

    public function authentication() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        //if already logged-in
        if($this->user_id != null) {
            // die("Already Login");
            redirect(base_url('dashboard')); //redirect to dashboard
        }

        //if login form submitted
        elseif($this->input->post('submit') == 'login') {
            //print_r($this->input->post()); die();
            $data = $this->Authentication_m->authentication();
            //print_r($data);
            if( $data['type'] == 'load_view') {
                $this->load->view($data['page']); //loading admin login page
            } else if( $data['type'] == 'redirect') {
                // die('Dashboard');
                redirect(base_url($data['page']));
            }

        } else {
            $this->load->view('login'); //loading login page
        }


    }

    public function logout() { //admin logout
        if( $this->user_id != null ) { //if already logged-in
            $data = $this->Authentication_m->logout();
            redirect(base_url($data));
        } else { //if admin not logged-in
            
            $this->session->set_flashdata('title', 'Oh, Snap!');
            $this->session->set_flashdata('msg', 'At-first login, eh!');
            redirect(base_url('admin'));
        }
    }

    public function change_password($otp) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        if($this->user_id != null) { //if user already logged-in
            $this->session->set_flashdata('title', 'Log-out!');
            $this->session->set_flashdata('msg', 'You must log-out first, to change password of another account.');
            redirect(base_url('admin/dashboard'));
        } else {
            $data = $this->Authentication_m->change_password($otp);
            if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
            } else {
                redirect(base_url($data['page']));
            }
        }
    }

    public function update_password() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        if($this->user_id != null) { //if user already logged-in
            $this->session->set_flashdata('title', 'Log-out!');
            $this->session->set_flashdata('msg', 'You must log-out first, to reset password of another account.');
            redirect(base_url('admin/dashboard'));
        }
        elseif($this->input->post('submit') == 'change_pass') { //if change password form submitted
            $data = $this->Authentication_m->update_password();
            if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
            } else {
                redirect(base_url($data['page']));
            }
        } else {
            redirect(base_url('login')); //loading login page
        }
    }

} // /.class Login{}