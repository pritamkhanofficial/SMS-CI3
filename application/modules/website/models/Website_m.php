<?php //echo "string"; ?>


<?php

class Website_m extends CI_Model {
	
 function __construct()
    {
        parent::__construct();  
        $this->load->library('grocery_CRUD');
        date_default_timezone_set("Asia/Kolkata");
    }

    public function home_page()
    {
    	$data = array();

        $data['mdl'] = $this; 

        $data['title'] = 'Home';

        $data['slider'] = $this->db->get_where('slider', array('status'=> 1))->result();

        $data['about_college'] = $this->db->get('about_college')->row();

        $data['administrative_heads'] = $this->db->get_where('administrative_heads', array('status'=> 1))->result();

        $data['principal_msg'] = $this->db->get_where('member_message', array('status'=> 1))->result();

        $data['about_hospital'] = $this->db->get('about_hospital')->row();

        $data['history_heritage'] = $this->db->get('history_heritage')->row();

        $data['academic_activitie'] = $this->db->get_where('academic_activitie', array('status'=> 1))->result();

        $data['faculty_details'] = $this->db->get('faculty_details')->row();


        $data['college_committee'] = $this->db->get_where('college_committee', array('status'=> 1))->result();

        $data['department'] = $this->db->get_where('department', array('status'=> 1))->result();

        $data['contact'] = $this->db->get('contact')->row();

        return $data;
    }



    public function department_details($id)
    {
        $data = array();

        $data['mdl'] = $this; 

        $data['title'] = 'Department Details';

        $data['department'] = $this->db->get_where('department',  array('status'=> 1, 'department_id'=>$id))->row();

        $data['faculty_details'] = $this->db->get_where('department_faculty_details', array('status'=> 1, 'department_id'=>$id))->result();

        $data['departmental_gallery'] = $this->db->get_where('departmental_gallery', array('status'=> 1, 'department_id'=>$id))->result();

        return $data;
    }




    public function committee_details($id)
    {
        $data = array();

        $data['mdl'] = $this; 

        $data['title'] = 'Committee Details';

        $data['college_committee'] = $this->db->get_where('college_committee',  array('status'=> 1, 'college_committee_id'=>$id))->row();

        $data['committee_details'] = $this->db->get_where('committee_details', array('status'=> 1, 'committee_id'=>$id))->result();

        return $data;
    }

    public function gallery()
    {
        $data = array();

        $data['mdl'] = $this; 

        $data['title'] = 'Gallery';

        $data['gallery'] = $this->db->get_where('gallery', array('status'=> 1))->result();
        
        $data['contact'] = $this->db->get('contact')->row();

        return $data;
    }


    public function notice()
    {
        $data = array();

        $data['mdl'] = $this; 

        $data['title'] = 'Notice / Tender';

        $data['notice'] = $this->db->get_where('tender_notice', array('status'=> 1))->result();

        return $data;
    }


    public function textShorten($text, $limit = 400){
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, '.'));
        $text = $text.".";
        return $text;
    }

}