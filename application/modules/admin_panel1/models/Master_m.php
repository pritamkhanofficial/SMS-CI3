<?php //echo "string"; ?>


<?php

class Master_m extends CI_Model {
	
 function __construct()
    {
        parent::__construct();  
        $this->load->library('grocery_CRUD');
        date_default_timezone_set("Asia/Kolkata");
    }

    public function role()
    {
    	$crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('role');
        $crud->set_subject('Role Info');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/role'));

        // $crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();

        $crud->columns('role_name','role_display_name','status');
        $crud->fields('role_name','role_display_name','status');

        // $crud->field_type('csrf_token_name', 'hidden');

       /* $myarray = [];
        $this->db->select('EmployeeId, EmployeeFullName');
        $this->db->order_by('EmployeeId desc');
        $result =  $this->db->get_where('employee',array('InActive'=>'Active'));
        foreach ($result->result() as $row)
        {
            $myarray[$row->EmployeeId] = $row->EmployeeFullName;
        }
        $crud->field_type('EmpId','multiselect',$myarray);*/
/*
        $crud->set_relation('EmpId','employee','EmpFullName',array('Status'=>'Active'));

        $crud->set_relation('GeadeCategoryId','grade_category','GeadeCategoryName',array('InActive'=>'Active'));

        $crud->set_relation('GeadeSubcategoryId','grade','GradeName',array('InActive'=>'Active'));
*/
        
        // $crud->field_type('ConsignmentNumber','text', uniqid(rand(1,5)));

        $crud->required_fields('role_name');
        //$crud->unique_fields('ConsignmentNumber');

        $crud->display_as('role_name', 'Role');
        $output = $crud->render();
       $output->title = 'Role';
        return $output;
    }



    public function user()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('users');
        $crud->set_subject('User Info');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/users'));

        $crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_delete();
        $crud->unset_clone();
        $crud->unset_edit();
        $crud->columns('user_full_name','user_email','role_id','profile_img','status');
        //$crud->fields('role_name','role_display_name','status');

        //$crud->unset_fields('name','age');
        $crud->set_field_upload('profile_img','upload/profile_img');
        // $crud->field_type('csrf_token_name', 'hidden');

        //$crud->add_action('Edit User', '', '','ui-icon-image',array($this,'_callback_edit_btn'));

        $crud->add_action('More', '', 'admin/edit_user','bx bx-edit');

       // $crud->add_action('Edit User', 'https://www.grocerycrud.com/v1.x/assets/uploads/general/smiley.png', 'admin/edit_user');

       /* $myarray = [];
        $this->db->select('EmployeeId, EmployeeFullName');
        $this->db->order_by('EmployeeId desc');
        $result =  $this->db->get_where('employee',array('InActive'=>'Active'));
        foreach ($result->result() as $row)
        {
            $myarray[$row->EmployeeId] = $row->EmployeeFullName;
        }
        $crud->field_type('EmpId','multiselect',$myarray);*/
/*
        $crud->set_relation('EmpId','employee','EmpFullName',array('Status'=>'Active'));

        $crud->set_relation('GeadeCategoryId','grade_category','GeadeCategoryName',array('InActive'=>'Active'));

        $crud->set_relation('GeadeSubcategoryId','grade','GradeName',array('InActive'=>'Active'));
*/
        
        // $crud->field_type('ConsignmentNumber','text', uniqid(rand(1,5)));

       // $crud->required_fields('role_name');
        //$crud->unique_fields('ConsignmentNumber');


        $crud->set_relation('role_id','role','role_name',array('status'=>'1'));

        $crud->display_as('role_id', 'Role');

        $crud->display_as('user_full_name', 'Full name');

        $crud->display_as('user_email', 'Email');
        $crud->display_as('profile_img', 'Profile img');
        // $crud->display_as('role_id', 'Role');
        $output = $crud->render();

        $output->add_btn = "<a href='".base_url('admin/add_user')."' class='btn btn-success'>Add User</a>";
       $output->title = 'Users';
        return $output;
    }

    public function _callback_edit_btn($primary_key , $row)
    {
        return site_url('admin/edit_user/'.$primary_key);
    }


    public function add_user()
    {
        $data = array();

        $data['title'] = 'Add User'; 

        $data['menu'] = 'User';


        $data['page_title_right'] = '<li class="breadcrumb-item">Add User</li> <li class="breadcrumb-item active"><a href="'.base_url("admin/dashboard").'">Dashboard</a></li>';

        $data['role'] = $this->db->get_where('role', array('status'=> '1'))->result();


        return array('type'=>'load_view', 'page'=>'user/add_v', 'data'=>$data);
    }

    public function form_add_user()
    {
       if ($this->input->post('submit') == 'add_form') {
           //echo  die();
           $insertArray = array();
           $pass = $this->input->post('password');



           $pass_encrypted = hash('sha256', $pass); //encrypting password with sha256 encoding
           $insertArray['user_token'] = $this->security->get_csrf_hash();
           $insertArray['user_full_name'] = $this->input->post('fname');
           $insertArray['user_phone'] = $this->input->post('phone');
           $insertArray['user_email'] = $this->input->post('email');
           $insertArray['role_id'] = $this->input->post('roleid');
           $insertArray['date_of_joining'] = date("Y-m-d h:m:i", strtotime($this->input->post('date_of_joining')));
           $insertArray['designation'] = $this->input->post('designation');
           $insertArray['user_address'] = $this->input->post('address');
           $insertArray['user_name'] = $this->input->post('username');
           $insertArray['password'] = $pass_encrypted;
           $insertArray['status'] = $this->input->post('status');

           $insertArray['created_on'] = date('Y-m-d');
            
           $upload_path = './upload/profile_img/' ; 
           $file_type = 'jpg|jpeg|png';

           $file_name = 'profile_img';
           $return_data = $this->_upload_file($_FILES['profile_img'], $upload_path, $file_type, $file_name);

           $insertArray['profile_img'] = $return_data['filename'];
           $data = array();
           if ($this->db->insert('users', $insertArray)) {
               
               $data['type'] = 'success';
               $data['title'] = 'Yes!';
               $data['msg'] = 'Data save Successfully';

           }else{
               $data['type'] = 'error';
               $data['title'] = 'Uh-oh!';
               $data['msg'] = 'Database Insert Error';
           }

           return $data;
       }
    }


    public function edit_user($user_id)
    {
        $data = array();

        $data['title'] = 'Edit User'; 

        $data['menu'] = 'User';


        $data['page_title_right'] = '<li class="breadcrumb-item">Edit User</li> <li class="breadcrumb-item active"><a href="'.base_url("admin/dashboard").'">Dashboard</a></li>';

        $data['role'] = $this->db->get_where('role', array('status'=> '1'))->result();


        $data['user_data'] = $this->db->get_where('users', array('user_id'=> $user_id))->row();


        


        return array('type'=>'load_view', 'page'=>'user/edit_v', 'data'=>$data);
    }

    

    public function form_edit_user()
    {
       if ($this->input->post('submit') == 'edit_form') {
           //echo  die();
            $old_img = $this->input->post('old_img');
           $updateArray = array();
           $u_id = $this->input->post('u_id');
           $updateArray['user_token'] = $this->security->get_csrf_hash();
           $updateArray['user_full_name'] = $this->input->post('fname');
           $updateArray['user_phone'] = $this->input->post('phone');
           $updateArray['user_email'] = $this->input->post('email');
           $updateArray['role_id'] = $this->input->post('roleid');
           $updateArray['designation'] = $this->input->post('designation');
           $updateArray['user_address'] = $this->input->post('address');
           $updateArray['status'] = $this->input->post('status');
           $updateArray['modified_on'] = date('Y-m-d');



            
           if (!empty($_FILES['profile_img']['name'])) {
               $upload_path = './upload/profile_img/' ; 
               $file_type = 'jpg|jpeg|png';

               $file_name = 'profile_img';
               $return_data = $this->_upload_file($_FILES['profile_img'], $upload_path, $file_type, $file_name);

               @unlink('./upload/profile_img/'.$old_img);


               $updateArray['profile_img'] = $return_data['filename'];
           }
           $data = array();
           $this->db->where('user_id', $u_id);
    
           if ($this->db->update('users', $updateArray)) {
               
               $data['type'] = 'success';
               $data['title'] = 'Yes!';
               $data['msg'] = 'Data save Successfully';

           }else{
               $data['type'] = 'error';
               $data['title'] = 'Uh-oh!';
               $data['msg'] = 'Database Uddate Error';
           }

           return $data;
       }
    }

    private function _upload_file($files, $upload_path, $file_type, $file_name){

        // date_default_timezone_set("Asia/Kolkata");  

        $uploadedFileData = array();

        $config = array(
            'upload_path'   => $upload_path,
            'allowed_types' => $file_type,
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

        //foreach ($files['name'] as $key => $image) {

            $_FILES['file']['name']       = rand(1000,9999).$_FILES[$file_name]['name'];
            $_FILES['file']['type']       = $_FILES[$file_name]['type'];
            $_FILES['file']['tmp_name']   = $_FILES[$file_name]['tmp_name'];
            $_FILES['file']['error']      = $_FILES[$file_name]['error'];
            $_FILES['file']['size']       = $_FILES[$file_name]['size'];

            // $config['file_name'] = date('His') .'_'. $image;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                
                $imageData = $this->upload->data();

                $new_array = array(
                    'filename' => $imageData['file_name'], 
                    'status' => 'success',
                    'msg' => 'OK'
                );

                $final_array = array_merge($uploadedFileData, $new_array);

            } else {
                $new_array = array(
                    'filename' => null, 
                    'status' => 'error',
                    'msg' => 'Type or Size Mismatch'
                );

                $final_array = array_merge($uploadedFileData, $new_array);
            }
        //}

        return $final_array;
    }



    public function slider()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('slider');
        $crud->set_subject('Slider Info');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/slider'));

        // $crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        //$crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('slider_title','slider_info','slider_img','status');

        $crud->fields('slider_title','slider_info','slider_img','sort_order','status');

        // $crud->field_type('csrf_token_name', 'hidden');

        $crud->set_field_upload('slider_img','assets/uploads/slider_img/');

        $crud->required_fields('slider_title','status');

        $output = $crud->render();
       $output->title = 'Slider';
        return $output;
    }


    public function administrative_heads()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('administrative_heads');
        $crud->set_subject('Administrative Heads');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/administrative_heads'));

        // $crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        //$crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('heading','title','status');

        $crud->fields('heading','title','status');

        // $crud->field_type('csrf_token_name', 'hidden');

        //$crud->set_field_upload('slider_img','assets/uploads/slider_img/');

        $crud->required_fields('heading','status');

        $output = $crud->render();
       $output->title = 'Administrative Heads';
        return $output;
    }


    public function member_message()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('member_message');
        $crud->set_subject('Member Message');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/member_message'));

        // $crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        //$crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('heading','description','image','status');

        $crud->fields('heading','description','image','status');

        // $crud->field_type('csrf_token_name', 'hidden');

        $crud->set_field_upload('image','assets/uploads/member_message_img/');

        $crud->required_fields('heading','status');

        $output = $crud->render();
       $output->title = 'Member Message';
        return $output;
    }


    public function about_hospital()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('about_hospital');
        $crud->set_subject('About Hospital');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/about_hospital'));

        $crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('heading','description','image');

        $crud->fields('heading','description','image');

        // $crud->field_type('csrf_token_name', 'hidden');

        $crud->set_field_upload('image','assets/uploads/about_hospital/');

        $crud->required_fields('heading');

        $output = $crud->render();
       $output->title = 'About Hospital';
        return $output;
    }



    public function history_heritage()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('history_heritage');
        $crud->set_subject('History & Heritage');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/history_heritage'));

        $crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('description');

        $crud->fields('description');

        $crud->required_fields('description');

        $output = $crud->render();
       $output->title = 'History & Heritage';
        return $output;
    }


    public function academic_activitie()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('academic_activitie');
        $crud->set_subject('Academic Activities');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/academic_activitie'));

        //$crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        //$crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('label','description','status');

        $crud->fields('label','description','status');

        $crud->required_fields('label','status');

        $output = $crud->render();
       $output->title = 'Academic Activities';
        return $output;
    } 


    public function faculty_details()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('faculty_details');
        $crud->set_subject('Faculty Details');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/faculty_details'));

        $crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('label','document');

        $crud->fields('label','document');

        $crud->set_field_upload('document','assets/uploads/faculty_details/');

        $crud->required_fields('label');

        $output = $crud->render();
       $output->title = 'Faculty Details';
        return $output;
    }

    public function gallery()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('gallery');
        $crud->set_subject('Gallery Info');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/gallery'));

        // $crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        //$crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('description','gallery_image','status');

        $crud->fields('description','gallery_image','sort_order','status');

        // $crud->field_type('csrf_token_name', 'hidden');

        $crud->set_field_upload('gallery_image','assets/uploads/gallery_image/');

        $this->path = 'assets/uploads/gallery_image';

        $crud->callback_before_delete(array($this,'delete_image_from_server'));

        $crud->required_fields('gallery_image','status');

        $output = $crud->render();
        $output->title = 'Gallery';
        return $output;
    }

    public function delete_image_from_server($primary_key)
    {

        $image = $this->db->get_where('gallery', array('gallery_id'=> $primary_key))->row()->gallery_image;

        @unlink($this->path.'/'.$image);
            
        
    }



    public function tender_notice()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('tender_notice');
        $crud->set_subject('Tender & Notice Info');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/tender_notice'));

        // $crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        //$crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('title','category','is_new','uploaded_date','status');

        $crud->fields('title','category','document','is_new','uploaded_date','status');

        // $crud->field_type('csrf_token_name', 'hidden');

        $crud->set_field_upload('document','assets/uploads/tender_notice_doc/');

        $this->path = 'assets/uploads/tender_notice_doc';

        $crud->callback_before_delete(array($this,'delete_tender_notice_doc_from_server'));

        $crud->required_fields('title','is_new','uploaded_date','category','document','status');

        $output = $crud->render();
        $output->title = 'Tender & Notice';
        return $output;
    }

    public function delete_tender_notice_doc_from_server($primary_key)
    {

        $doc = $this->db->get_where('tender_notice', array('tender_notice_id'=> $primary_key))->row()->document;

        @unlink($this->path.'/'.$doc);
            
        
    }


    public function about_college()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('about_college');
        $crud->set_subject('About College');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/about_college'));

        $crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('label1','label2','label3','label4',);

        $crud->fields('label1','description1','label2','description2','label3','description3','label4','description4','long_description');

        $crud->display_as('label1', 'Label 1');
        $crud->display_as('description1', 'Description 1');
        $crud->display_as('label2', 'Label 2');
        $crud->display_as('description2', 'Description 2');
        $crud->display_as('label3', 'Label 3');
        $crud->display_as('description3', 'Description 3');
        $crud->display_as('label4', 'Label 4');
        $crud->display_as('description4', 'Description 4');
        $crud->display_as('long_description', 'Long description');
        

        $output = $crud->render();
        $output->title = 'About College';
        return $output;
    }


    public function contact()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('contact');
        $crud->set_subject('Contact Info');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/contact'));

        $crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('communication','contact_no','email','address');

        $crud->fields('communication','contact_no','email','address','map');

       /* $crud->display_as('label1', 'Label 1');
        $crud->display_as('description1', 'Description 1');
        $crud->display_as('label2', 'Label 2');
        $crud->display_as('description2', 'Description 2');
        $crud->display_as('label3', 'Label 3');
        $crud->display_as('description3', 'Description 3');
        $crud->display_as('label4', 'Label 4');
        $crud->display_as('description4', 'Description 4');
        $crud->display_as('long_description', 'Long description');*/
        

        $output = $crud->render();
        $output->title = 'Contact';
        return $output;
    }

    public function client_communicate_data()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('client_communicate_data');
        $crud->set_subject('Communicate Info');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/client_communicate_data'));

        //$crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        //$crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('org_name','phone','address','response','date');

        $crud->fields('org_name','phone','address','website','response','date');

        $crud->required_fields('org_name','phone','date');

        $crud->display_as('org_name', 'Org Name');
        $crud->display_as('phone', 'Phone Number');
        $crud->display_as('address', 'Address');
        /*$crud->display_as('description2', 'Description 2');
        $crud->display_as('label3', 'Label 3');
        $crud->display_as('description3', 'Description 3');
        $crud->display_as('label4', 'Label 4');
        $crud->display_as('description4', 'Description 4');
        $crud->display_as('long_description', 'Long description');*/
        

        $output = $crud->render();
        $output->title = 'Communicate Info';
        return $output;
    }
    

    

    
}