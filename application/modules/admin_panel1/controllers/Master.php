<?php  ?>
<?php

class Master extends My_Controller
{
    private $user_id = null;
    function __construct()
    {
        parent::__construct(); 

        if($this->session->has_userdata('user_id')) { //if logged-in
            $this->user_id = $this->session->user_id;
             $this->load->model('Master_m');
        }else{
            redirect(base_url('/'));
        }
    }


	public  function role()
    {
        $output = $this->Master_m->role();
        $this->load->view('common_v', $output);
    }

    public  function user()
    {
        $output = $this->Master_m->user();
        $this->load->view('common_v', $output);
    }

    public function add_user()
    {
        $data = $this->Master_m->add_user();
        if( $data['type'] == 'load_view') {
            $this->load->view($data['page'], $data['data']);
        } elseif( $data['type'] == 'redirect') {
            redirect(base_url($data['page']));
        }
    }


    public function form_add_user()
    {
        $data = $this->Master_m->form_add_user();
        echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
        exit();
        
    }


    public function edit_user($user_id)
    {
        $data = $this->Master_m->edit_user($user_id);
        if( $data['type'] == 'load_view') {
            $this->load->view($data['page'], $data['data']);
        } elseif( $data['type'] == 'redirect') {
            redirect(base_url($data['page']));
        }
    }


    

    public function form_edit_user()
    {
        $data = $this->Master_m->form_edit_user();
        echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
        exit();
    }


    public function slider()
    {
        $output = $this->Master_m->slider();
        $this->load->view('common_v', $output);
    }

    public function  administrative_heads()
    {
        $output = $this->Master_m-> administrative_heads();
        $this->load->view('common_v', $output);
    }

    public function  member_message()
    {
        $output = $this->Master_m-> member_message();
        $this->load->view('common_v', $output);
    }


    public function  about_hospital()
    {
        $output = $this->Master_m-> about_hospital();
        $this->load->view('common_v', $output);
    }


    public function  history_heritage()
    {
        $output = $this->Master_m->history_heritage();
        $this->load->view('common_v', $output);
    }

    public function  academic_activitie()
    {
        $output = $this->Master_m->academic_activitie();
        $this->load->view('common_v', $output);
    } 

    public function  faculty_details()
    {
        $output = $this->Master_m->faculty_details();
        $this->load->view('common_v', $output);
    }

    public function  gallery()
    {
        $output = $this->Master_m->gallery();
        $this->load->view('common_v', $output);
    }

    public function  tender_notice()
    {
        $output = $this->Master_m->tender_notice();
        $this->load->view('common_v', $output);
    }

    public function  about_college()
    {
        $output = $this->Master_m->about_college();
        $this->load->view('common_v', $output);
    }

    public function  contact()
    {
        $output = $this->Master_m->contact();
        $this->load->view('common_v', $output);
    }

    public function  client_communicate_data()
    {
        $output = $this->Master_m->client_communicate_data();
        $this->load->view('common_v', $output);
    }

    

    

       

}

?>