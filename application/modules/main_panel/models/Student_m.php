<?php //echo "string"; ?>

<?php

class Student_m extends CI_Model {
 private $grocery_crud;
 function __construct()
    {
        parent::__construct();  
        $this->load->library('grocery_CRUD');

        $this->grocery_crud = new grocery_CRUD();

        $this->grocery_crud->unset_jquery();
        $this->grocery_crud->unset_jquery_ui();

        date_default_timezone_set("Asia/Kolkata");
    }

    public function student_add()
    {
        $data = array();
        if ($_POST) {
            // echo "<pre>"; print_r($this->input->post()); die();
            extract($this->input->post());
            foreach ($acc_dtl_id as $fees_name_ind => $fees_name_value) {
                $row_count = $this->db->get_where('fees_assign', array('class_id' => $class_id, 'account_dtl_id' => $fees_name_value, 'session_id' => get_session_id()))->num_rows();
                if($row_count == 0){
                    $insertArray = array();
                    $insertArray['class_id'] = $class_id;
                    $insertArray['session_id'] = get_session_id();
                    $insertArray['account_dtl_id'] = $fees_name_value;
                    $insertArray['amount'] = $fees_amount[$fees_name_ind];
                    $insertArray['fees_type_id'] = $fees_type_id[$fees_name_ind];
                    $this->db->insert('fees_assign', $insertArray);
                }else{
                    $updateArray = array();
                    $updateArray['class_id'] = $class_id;
                    $updateArray['session_id'] = get_session_id();
                    $updateArray['account_dtl_id'] = $fees_name_value;
                    $updateArray['amount'] = $fees_amount[$fees_name_ind];
                    $updateArray['fees_type_id'] = $fees_type_id[$fees_name_ind];
                    $this->db->update('fees_assign', $updateArray, array('class_id' => $class_id, 'account_dtl_id' => $fees_name_value, 'session_id' => get_session_id()));
                }
            }
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('msg', 'Fees added successfully');
            return array('type'=>'redirect', 'page'=>'fees_assign');
        }
        $data['class'] = $this->db->get('school_class')->result();
        // echo "<pre>"; print_r($html); die();
        $data['section'] = 'student_add';
        $data['title'] = 'Create Admission';
        $data['menu'] = 'Create Admission';
        $data['page_title_right'] = '<li class="breadcrumb-item "><a href="'.base_url("dashboard").'">Dashboard</a></li><li class="breadcrumb-item active">Create Admission(Add / Edit)</li>';
    
        return array('type'=>'load_view', 'page'=>'student_v', 'data'=>$data);
    }
}