<?php  ?>
<?php

class Master extends My_Controller
{
    private $user_id = null;
    function __construct()
    {
        parent::__construct(); 

        if($this->session->has_userdata('role_id')) { //if logged-in
             $this->user_type = $this->session->role_id;
             $this->load->model('Master_m');
        }else{
            redirect(base_url('/'));
        }
    }
    public function account_hdr()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->account_hdr();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }
    public function account_dtl()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->account_dtl();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }

    public function session()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->session();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }
    public function subject_type()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->subject_type();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }
    public function section()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->section();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }    

    public function classes()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->classes();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }

    public function add_classes()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->add_classes();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }
    public function update_class($class_id)
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->update_class($class_id);
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }
    public function subjects()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->subjects();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }

    public function class_subject()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->class_subject();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    } 

    public function add_subjects()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->add_subjects();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }
    public function fees_assign()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->fees_assign();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }

    public function fees_assign_add()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->fees_assign_add();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }

    public function fees_assign_edit($class_id)
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->fees_assign_edit($class_id);
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }

    public function department()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->department();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }

    public function add_employee()
    {
        if($this->user_type != 1 && $this->user_type != 2) { //if not logged-in
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        } else {
             $data = $this->Master_m->add_employee();
             if( $data['type'] == 'load_view') {
                $this->load->view($data['page'], $data['data']);
             } elseif( $data['type'] == 'redirect') {
                redirect(base_url($data['page']));
             }
        }
    }
}

?>