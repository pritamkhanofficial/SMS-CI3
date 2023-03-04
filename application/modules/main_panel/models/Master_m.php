<?php //echo "string"; ?>

<?php

class Master_m extends CI_Model {
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


    public function account_hdr()
    {
        // die();
        $crud = $this->grocery_crud;
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('account_hdr');
        $crud->set_subject('Account Header');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('account_hdr'));

        //$crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_delete();
        // $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('account_name');

        $crud->fields('account_name');

        $crud->required_fields('account_name');

        // $crud->set_relation('class_type','class_type','class_type');

        $crud->display_as('account_name', 'Account Name');    

        $output = $crud->render();
        $output->title = 'Account Header';
        $output->menu = 'Account Header';
        $output->page_title_right = '<li class="breadcrumb-item">Account Header (View / Add / Edit)</li> <li class="breadcrumb-item active"><a href="'.base_url("dashboard").'">Dashboard</a></li>';

        return array('type'=>'load_view', 'page'=>'common_v', 'data'=>$output);
    }




    public function account_dtl()
    {
        // die();
        $crud = $this->grocery_crud;
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('account_dtl');
        $crud->set_subject('Account Detail');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('account_dtl'));

        //$crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_delete();
        // $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('account_hdr_id', 'account_dtl_name');

        $crud->fields('account_hdr_id', 'account_dtl_name');

        $crud->required_fields('account_hdr_id','account_dtl_name');

        $crud->set_relation('account_hdr_id','account_hdr','account_name');

        $crud->display_as('account_hdr_id', 'Account Header');    
        $crud->display_as('account_dtl_name', 'Account Detail');    

        $output = $crud->render();
        $output->title = 'Account Detail';
        $output->menu = 'Account Detail';
        $output->page_title_right = '<li class="breadcrumb-item">Account Detail (View / Add / Edit)</li> <li class="breadcrumb-item active"><a href="'.base_url("dashboard").'">Dashboard</a></li>';

        return array('type'=>'load_view', 'page'=>'common_v', 'data'=>$output);
    }

    public function session()
    {
        // die();
        $crud = $this->grocery_crud;
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('schoolyear');
        $crud->set_subject('Academic Year');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('session'));

        //$crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_delete();
        // $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('session');

        $crud->fields('session');

        $crud->required_fields('session');

        // $crud->set_relation('class_type','class_type','class_type');

        $crud->display_as('session', 'School Session');    

        $output = $crud->render();
        $output->title = 'Academic Year';
        $output->menu = 'Academic Year';
        $output->page_title_right = '<li class="breadcrumb-item">Academic Year (View / Add / Edit)</li> <li class="breadcrumb-item active"><a href="'.base_url("dashboard").'">Dashboard</a></li>';

        return array('type'=>'load_view', 'page'=>'common_v', 'data'=>$output);
    }

    public function classes()
    {
        $data = array();

                         $this->db->join('class_type', 'class_type.class_type_id=school_class.class_type', 'left');
                         $this->db->order_by('school_class.school_class_id');
        $data['class'] = $this->db->get('school_class')->result();

        foreach ($data['class'] as $key => $class_value) {
            $data['class_data'][$class_value->class]['class_id'] = $class_value->school_class_id;
            $data['class_data'][$class_value->class]['school'] = $class_value->class_type;
            $sections = $this->db->get_where("sections_allocation", array('class_id' => $class_value->school_class_id))->result();
                        foreach ($sections as $skey => $section) {
                            $data['class_data'][$class_value->class]['section'][$skey] = get_type_name_by_id('section','section_id', $section->section_id, 'section_name');
                        }
        }
        // echo "<pre>"; print_r($data['class_data']); die();
        $data['title'] = 'Class & Section';
        $data['section'] = 'class_section';
        $data['menu'] = 'Class & Section';
        $data['page_title_right'] = '<li class="breadcrumb-item">Class & Section (View / Add / Edit)</li> <li class="breadcrumb-item active"><a href="'.base_url("dashboard").'">Dashboard</a></li>';

        return array('type'=>'load_view', 'page'=>'data_table_v', 'data'=>$data);
    }

    public function add_classes()
    {
        $data =  array();
        if ($_POST) {
            extract($this->input->post());
            // echo "<pre>"; print_r($section_id); die();
            if ($form_add_classes == 'form_add_classes') {
               
                $arrayClass = array();
                $arrayClass['class'] = $class;
                $arrayClass['class_type'] = $school_type_id;

                if ($this->db->insert('school_class', $arrayClass)) {
                    $class_id = $this->db->insert_id();
                    $data = array();
                    foreach ($section_id as $key => $value) {
                        $data['class_id'] = $class_id;
                        $data['section_id'] = $value;
                        $this->db->insert('sections_allocation', $data);
                    }
                    $this->session->set_flashdata('type', 'success');
                    $this->session->set_flashdata('msg', 'Class added successfully');
                }
                
                return array('type'=>'redirect', 'page'=>"classes");
            }else{
                $this->session->set_flashdata('type', 'warning');
                $this->session->set_flashdata('msg', 'Oops! something went wrong');
                 return array('type'=>'redirect', 'page'=>"add_classes");
            }
        }
        $menu = "Create Class";

        $data['sec'] = $this->db->get('section')->result();
        $data['class_type'] = $this->db->get('class_type')->result();

        
        $data['title'] = 'Control Class';
        $data['section'] = 'add_classes';
        $data['menu'] = $menu;
        $data['page_title_right'] = '<li class="breadcrumb-item">'.$menu.' (Add)</li> <li class="breadcrumb-item active"><a href="'.base_url("dashboard").'">Dashboard</a></li>';

        return array('type'=>'load_view', 'page'=>'master_v', 'data'=>$data);
    }

    public function update_class($class_id = '')
    {
        // echo $class_id; die();
        $data = array();

        if ($_POST) {
            extract($this->input->post());
            $arrayClass = array(
                'class' => $class,
            );
            $this->db->where('school_class_id', $class_id);
            $this->db->update('school_class', $arrayClass);
            // echo "<pre>"; print_r($section_id); die();
            foreach ($section_id as $section) {
                $query = $this->db->get_where("sections_allocation", array('class_id' => $class_id, 'section_id' => $section));
                if ($query->num_rows() == 0) {
                    $this->db->insert('sections_allocation', array('class_id' => $class_id, 'section_id' => $section));
                }
            }
            $this->db->where_not_in('section_id', $section_id);
            $this->db->where('class_id', $class_id);
            $this->db->delete('sections_allocation');
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('msg', 'Class updated successfully');
            return array('type'=>'redirect', 'page'=>"classes");
        }
                         $this->db->order_by('school_class.school_class_id');
        $data['class'] = $this->db->get_where('school_class', array('school_class_id'=>$class_id))->row();
        $data['school'] = $this->db->get('class_type')->result();
        $data['section_tbl'] = $this->db->get('section')->result();
        $data['section_data'] = $this->db->get_where("sections_allocation", array('class_id' => $class_id))->result_array();

        
        // echo "<pre>"; print_r($sel); die();
        $data['section'] = 'update_classes';
        $data['title'] = 'Edit Class';
        $data['menu'] = 'Edit Class';
        $data['page_title_right'] = '<li class="breadcrumb-item "><a href="'.base_url("dashboard").'">Dashboard</a></li><li class="breadcrumb-item active">Edit Class(Edit)</li>';
        
        return array('type'=>'load_view', 'page'=>'master_v', 'data'=>$data);
    }
    public function section()
    {
        $crud = $this->grocery_crud;
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('section');
        $crud->set_subject('Section');
        //$crud->where('Role', 'Operator');
        $crud->set_crud_url_path(base_url('section'));
        //$crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_delete();
        //$crud->unset_clone();
        //$crud->unset_edit();

        // $crud->unset_columns('Actions');

        // $crud->set_primary_key('class_section_id');
        $crud->columns('section_name');

        $crud->fields('section_name');
        $crud->required_fields('section_name');
        // $crud->display_as('class_type', 'Class Type'); 

        // $crud->add_action('Subject', '', '','fas fa-book font-size-17',array($this,'callback_subject_assign'));

        // $crud->callback_column('Actions', array($this, 'callback_subject_assign'));

        $output = $crud->render();
        $output->title = 'Section';
        $output->type = 'section';
        $output->menu = 'Section';
        $output->page_title_right = '<li class="breadcrumb-item">Section (View / Add / Edit)</li> <li class="breadcrumb-item active"><a href="'.base_url("dashboard").'">Dashboard</a></li>';

        return array('type'=>'load_view', 'page'=>'common_v', 'data'=>$output);
    }

    public function subject_type()
    {
        // die();
        $crud = $this->grocery_crud;
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('subject_type');
        $crud->set_subject('Subject Type');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('subject_type'));

        //$crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_delete();
        // $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('subject_type');

        $crud->fields('subject_type');

        $crud->required_fields('subject_type');

        // $crud->set_relation('class_type','class_type','class_type');

        $crud->display_as('subject_type', 'Subject Type');    

        $output = $crud->render();
        $output->title = 'Subject Type';
        $output->menu = 'Subject Type';
        $output->page_title_right = '<li class="breadcrumb-item">Subject Type (View / Add / Edit)</li> <li class="breadcrumb-item active"><a href="'.base_url("dashboard").'">Dashboard</a></li>';

        return array('type'=>'load_view', 'page'=>'common_v', 'data'=>$output);
    }

    public function subjects()
    {
        // die();
        $crud = $this->grocery_crud;
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('subjects');
        $crud->set_subject('Subject');
        //$crud->where('Role', 'Operator');
        $crud->set_crud_url_path(base_url('subjects'));
        //$crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_delete();
        // $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('subject_type_id','subject_name','subject_code');

        $crud->fields('subject_type_id','subject_name','subject_code');

        $crud->required_fields('subject_type_id','subject_name');

        $crud->set_relation('subject_type_id','subject_type','subject_type');

        $crud->display_as('subject_type_id', 'Subject Type');    
        $crud->display_as('subject_name', 'Subject Name');    
        $crud->display_as('subject_code', 'Subject Code');    

        $output = $crud->render();
        $output->title = 'Subject';
        $output->menu = 'Subject';
        $output->page_title_right = '<li class="breadcrumb-item "><a href="'.base_url("dashboard").'">Dashboard</a></li><li class="breadcrumb-item active">Subject (View / Add / Edit)</li>';

        return array('type'=>'load_view', 'page'=>'common_v', 'data'=>$output);
    }

    public function class_subject()
    {
        // echo $class_id; die();
        $data = array();


        /*Class Subject Update*/
        if ($_POST) {
            extract($this->input->post());
            // echo "<pre>"; print_r($this->input->post()); die();
            $arraySubject = array(
                'class_id' => $class_id,
                'session_id' => get_session_id(),
            );
            foreach ($subject_id as $subject) {
                $arraySubject['subject_id'] = $subject;
                $query = $this->db->get_where("subject_assign", $arraySubject);
                if ($query->num_rows() == 0) {
                    //$arraySubject['teacher_id'] = empty($get_teacher) ? 0 : $get_teacher['teacher_id'];
                    $this->db->insert('subject_assign', $arraySubject);
                }
            }
            $this->db->where('session_id', get_session_id());
            $this->db->where_not_in('subject_id', $subject_id);
            $this->db->where('class_id', $class_id);
            $this->db->delete('subject_assign');
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('msg', 'Subject updated successfully');
            
            return array('type'=>'redirect', 'page'=>"class_subject");
        }
        /*-------------------*/
        $sql = "SELECT
    school_class.school_class_id,
    school_class.class,
    GROUP_CONCAT(
        subjects.subject_name SEPARATOR '<br>'
    ) AS sub_name
FROM
    subject_assign
LEFT JOIN school_class ON school_class.school_class_id = subject_assign.class_id
LEFT JOIN subjects ON subject_assign.subject_id = subjects.subject_id
GROUP BY
    school_class.class";

        $data['class_subject_data'] = $this->db->query($sql)->result_array();
        // echo "<pre>"; print_r($data['class_subject_data']); die();
        $data['section'] = 'class_subject';
        $data['title'] = 'Class Subject';
        $data['menu'] = 'Class Subject';
        $data['page_title_right'] = '<li class="breadcrumb-item "><a href="'.base_url("dashboard").'">Dashboard</a></li><li class="breadcrumb-item active">Class Subject(View / Add / Edit)</li>';
        
        return array('type'=>'load_view', 'page'=>'data_table_v', 'data'=>$data);
    }


    public function add_subjects()
    {
        // die('OK');
        $data = array();
        if ($_POST) {
            extract($this->input->post());
            // echo "<pre>"; print_r($this->input->post()); die();
            if ($form_add_subjects == 'form_add_subjects') {
                $data = array();
                foreach ($subject_id as $key => $value) {
                    $data['class_id'] = $class_id;
                    $data['session_id'] = get_session_id();
                    $data['subject_id'] = $value;
                    $data['sorting'] = $key+1;
                    $row_count = $this->db->get_where('subject_assign', array('class_id' => $class_id, 'session_id' => get_session_id(),'subject_id' => $value))->num_rows();
                    // echo $this->db->last_query(); die();
                    if($row_count == 0){
                        $this->db->insert('subject_assign', $data);
                    }
                    
                }
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('msg', 'Subjects added successfully');
                
                return array('type'=>'redirect', 'page'=>"class_subject");
            }else{
                $this->session->set_flashdata('type', 'error');
                $this->session->set_flashdata('msg', 'Oops! something went wrong.');
                return array('type'=>'redirect', 'page'=>"class_subject");
            }
        }
        $data['class'] = $this->db->get_where('school_class')->result();
        $data['subjects'] = $this->db->get('subjects')->result();
                
        // echo "<pre>"; print_r($html); die();
        $data['section'] = 'add_subjects';
        $data['title'] = 'Add Subject';
        $data['menu'] = 'Add Subject';
        $data['page_title_right'] = '<li class="breadcrumb-item "><a href="'.base_url("dashboard").'">Dashboard</a></li><li class="breadcrumb-item active">Add Subject(Add)</li>';
        

        return array('type'=>'load_view', 'page'=>'master_v', 'data'=>$data);
    }
    // 

    public function fees_assign()
    {
        $data = array();
        $sql = "SELECT
    school_class.school_class_id,
    school_class.class,
    GROUP_CONCAT(
        CONCAT(account_dtl.account_dtl_name, ' - (<strong>₹',fees_assign.amount,'</strong>) - ', fees_type.name)
        ORDER BY fees_type.fees_type_id, account_dtl.account_dtl_name
        SEPARATOR ' <br> '
    ) as fees_detail
    
FROM
    `fees_assign`
LEFT JOIN school_class ON school_class.school_class_id = fees_assign.class_id
LEFT JOIN account_dtl ON account_dtl.account_dtl_id = fees_assign.account_dtl_id
LEFT JOIN fees_type ON fees_type.fees_type_id = fees_assign.fees_type_id
GROUP BY school_class.class";

        $data['fees_assign_data'] = $this->db->query($sql)->result_array();
        // echo "<pre>"; print_r($data['fees_assign_data']); die();
        $data['section'] = 'fees_assign';
        $data['title'] = 'Fees Assign';
        $data['menu'] = 'Fees Assign';
        $data['page_title_right'] = '<li class="breadcrumb-item"><a href="'.base_url("dashboard").'">Dashboard</a></li><li class="breadcrumb-item active">Fees Assign (View / Add / Edit)</li>';
        
        return array('type'=>'load_view', 'page'=>'data_table_v', 'data'=>$data);
    }

    public function fees_assign_add()
    {
        $data = array();
        if ($_POST) {
            // echo "<pre>"; print_r($this->input->post()); die();
            extract($this->input->post());
                foreach ($acc_dtl_id as $fees_name_ind => $fees_name_value) {
                    $row_count = $this->db->get_where('fees_assign', array('class_id' => $class_id, 'account_dtl_id' => $fees_name_value, 'session_id' => get_session_id(), 'fees_type_id' => $fees_type_id[$fees_name_ind]))->num_rows();
                    if($row_count == 0){
                        $insertArray = array();
                        $insertArray['class_id'] = $class_id;
                        $insertArray['session_id'] = get_session_id();
                        $insertArray['account_dtl_id'] = $fees_name_value;
                        $insertArray['amount'] = $fees_amount[$fees_name_ind];
                        $insertArray['fees_type_id'] = $fees_type_id[$fees_name_ind];
                        $this->db->insert('fees_assign', $insertArray);
                    }
            }
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('msg', 'Fees added successfully');
        return array('type'=>'redirect', 'page'=>'fees_assign');
        }
        $data['class'] = $this->db->get('school_class')->result();
        $data['account_dtl'] = $this->db->get_where('account_dtl',array('account_hdr_id'=>2))->result();
        $data['fees_type'] = $this->db->get('fees_type')->result();        
        // echo "<pre>"; print_r($html); die();
        $data['section'] = 'fees_assign_add';
        $data['title'] = 'Fees assign to class';
        $data['menu'] = 'Fees Assign';
        $data['page_title_right'] = '<li class="breadcrumb-item "><a href="'.base_url("dashboard").'">Dashboard</a></li><li class="breadcrumb-item active">Fees Assign(Add / Edit)</li>';
    
        return array('type'=>'load_view', 'page'=>'master_v', 'data'=>$data);
    }


    public function fees_assign_edit($class_id = '')
    {
        // echo $class_id; die();
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
        $data['class_id'] = $class_id;
        $data['account_dtl'] = $this->db->get_where('account_dtl',array('account_hdr_id'=>2))->result();
        $data['fees_type'] = $this->db->get('fees_type')->result();
        $data['fees_assign_data'] = $this->db->get_where('fees_assign', array('class_id'=>$class_id))->result();        
        // echo "<pre>"; print_r($html); die();
        $data['section'] = 'fees_assign_update';
        $data['title'] = 'Fees assign to class';
        $data['menu'] = 'Fees Assign';
        $data['page_title_right'] = '<li class="breadcrumb-item "><a href="'.base_url("dashboard").'">Dashboard</a></li><li class="breadcrumb-item active">Fees Assign(Add / Edit)</li>';
    
        return array('type'=>'load_view', 'page'=>'master_v', 'data'=>$data);
    }

    public function add_employee()
    {
        // die('OK');
        $data = array();
        if ($_POST) {
            extract($this->input->post());
            // echo "<pre>"; print_r($this->input->post()); die();
            if ($form_add_subjects == 'form_add_subjects') {
                $data = array();
                foreach ($subject_id as $key => $value) {
                    $data['class_id'] = $class_id;
                    $data['session_id'] = get_session_id();
                    $data['subject_id'] = $value;
                    $data['sorting'] = $key+1;
                    $row_count = $this->db->get_where('subject_assign', array('class_id' => $class_id, 'session_id' => get_session_id(),'subject_id' => $value))->num_rows();
                    // echo $this->db->last_query(); die();
                    if($row_count == 0){
                        $this->db->insert('subject_assign', $data);
                    }
                    
                }
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('msg', 'Subjects added successfully');
                
                return array('type'=>'redirect', 'page'=>"class_subject");
            }else{
                $this->session->set_flashdata('type', 'error');
                $this->session->set_flashdata('msg', 'Oops! something went wrong.');
                return array('type'=>'redirect', 'page'=>"class_subject");
            }
        }
        $data['class'] = $this->db->get_where('school_class')->result();
        $data['subjects'] = $this->db->get('subjects')->result();
                
        // echo "<pre>"; print_r($html); die();
        $data['section'] = 'add_employee';
        $data['title'] = 'Add Subject';
        $data['menu'] = 'Add Subject';
        $data['page_title_right'] = '<li class="breadcrumb-item "><a href="'.base_url("dashboard").'">Dashboard</a></li><li class="breadcrumb-item active">Add Subject(Add)</li>';
        

        return array('type'=>'load_view', 'page'=>'master_v', 'data'=>$data);
    }
}