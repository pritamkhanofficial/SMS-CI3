<?php //echo "string"; ?>

<?php

class Ajax_m extends CI_Model {
 private $grocery_crud;
 function __construct()
    {
        parent::__construct();  
        $this->load->library('grocery_CRUD');
        date_default_timezone_set("Asia/Kolkata");
    }

    /*public function getSectionByClass()
    {
        extract($this->input->post());
        $data = array();
        $result = $this->db->select('sections_allocation.section_id,section.section_name')
                  ->join('section', 'section.section_id = sections_allocation.section_id', 'left')
                  ->where('sections_allocation.class_id', $class_id)
                  ->get('sections_allocation')->result();
        $html_section = '<option value="">-- Select --</option>';
        foreach ($result as $key => $result_value) {
            $html_section .= "<option value='".$result_value->section_id."'>".$result_value->section_name."</option>";
        }

        // echo "<pre>"; print_r($result); die();
        $data['html_section'] = $html_section;
        return $data;
    }*/
    public function edit_subject()
    {
        // echo "<pre>"; print_r($this->input->post()); die();

        extract($this->input->post());
        $html = "";
        $subjects = $this->db->get('subjects')->result_array();
        if (count($subjects)) {
            foreach ($subjects as $row) {
                $query_assign = $this->db->get_where("subject_assign", array(
                    'class_id' => $class_id,
                    'session_id' => get_session_id(),
                    'subject_id' => $row['subject_id'],
                ));
                $html .= '<option value="' . $row['subject_id'] . '"' . ($query_assign->num_rows() != 0 ? 'selected' : '') . '>' . $row['subject_name'] . '</option>';
            }
        }
        $data['class_id'] = $class_id;
        $data['subject'] = $html;
        // echo "<pre>"; print_r($data); die();
        return $data;


        
        $data = array();
        $result = $this->db->select('sections_allocation.section_id,section.section_name')
                  ->join('section', 'section.section_id = sections_allocation.section_id', 'left')
                  ->where('sections_allocation.class_id', $class_id)
                  ->get('sections_allocation')->result();
        $html_section = '<option value="">-- Select --</option>';
        foreach ($result as $key => $result_value) {
            $html_section .= "<option value='".$result_value->section_id."'>".$result_value->section_name."</option>";
        }

        // echo "<pre>"; print_r($result); die();
        $data['html_section'] = $html_section;
        return $data;
    }
}