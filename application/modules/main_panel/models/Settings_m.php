<?php //echo "string"; ?>


<?php

class Settings_m extends CI_Model {

 private $grocery_crud;
 function __construct()
    {
        parent::__construct();  
        $this->load->library('grocery_CRUD');
        $this->grocery_crud = new grocery_CRUD();
        $this->grocery_crud->unset_jquery();
        date_default_timezone_set("Asia/Kolkata");
    }

    public function user_role()
    {

        $crud = $this->grocery_crud;
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('roles');
        $crud->set_subject('User Role');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('user_role'));

        //$crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('name','display_name');

        $crud->fields('name','display_name');

        $crud->required_fields('name');

        $crud->display_as('name', 'Role Name');
        $crud->display_as('display_name', 'Role Display Name');    

        $output = $crud->render();
        $output->title = 'Role';
        $output->menu = 'Role';
        $output->page_title_right = '<li class="breadcrumb-item">Role (View / Add / Edit)</li> <li class="breadcrumb-item active"><a href="'.base_url("dashboard").'">Dashboard</a></li>';

        return array('type'=>'load_view', 'page'=>'common_v', 'data'=>$output);
    }
    

    public function global_setting()
    {

        $crud = $this->grocery_crud;
        $heading = 'Global Settings ';
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('global_settings');
        $crud->set_subject($heading);

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('global_setting'));

        $crud->unset_export();
        $crud->unset_print();

        $crud->unset_read();
        $crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
        $num = $this->db->get('global_settings')->num_rows();
        if ($num >= 1) {
            $crud->unset_add();
        }
 
        $crud->columns('institute_name','institution_code','mobileno','currency','session_id');

        //$crud->fields('name','display_name');

        $crud->unset_fields('created_at','updated_at');
        $crud->set_relation('session_id','schoolyear','session');

        $crud->field_type('date_format','dropdown', get_date_format());
        $crud->required_fields('institute_email','institute_name','mobileno','currency','session_id','currency_symbol','date_format','timezone');


        $crud->field_type('timezone','dropdown', get_time_zone());

        $crud->display_as('session_id', 'Academic Session');
        $crud->display_as('display_name', 'Role Display Name'); 

        $crud->display_as('institute_name', 'Institute Name');    
        $crud->display_as('institution_code', 'Institution Code');    
        $crud->display_as('mobileno', 'Mobile No');    
        $crud->display_as('currency', 'Currency');    
        $crud->display_as('currency_symbol', 'Currency Symbol');    
        $crud->display_as('footer_text', 'Footer Text');    
        $crud->display_as('facebook_url', 'Facebook URL');    
        $crud->display_as('twitter_url', 'Twitter URL');    
        $crud->display_as('linkedin_url', 'Linkedin URL');    
        $crud->display_as('youtube_url', 'Youtube URL');    
        $crud->display_as('date_format', 'Date Format');    
        $crud->display_as('timezone', 'Timezone');    
        $crud->display_as('institute_email', 'Institute Email');    
        $crud->display_as('', '');    
        $crud->display_as('', '');    

        $output = $crud->render();
        $output->title = $heading;
        $output->menu = $heading;
        $output->page_title_right = '<li class="breadcrumb-item">'.$heading.'(View / Edit)</li> <li class="breadcrumb-item active"><a href="'.base_url("dashboard").'">Dashboard</a></li>';

        return array('type'=>'load_view', 'page'=>'common_v', 'data'=>$output);
    }
    
}