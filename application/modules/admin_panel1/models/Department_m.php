<?php

class Department_m extends CI_Model {
	
 function __construct()
    {
        parent::__construct();  
        $this->load->library('grocery_CRUD');
        date_default_timezone_set("Asia/Kolkata");
    }

    public function college_department()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('department');
        $crud->set_subject('College Department');

        //$crud->where('Role', 'Operator');
        // $crud->order_by('updated_on','asc');
        $crud->order_by('sort_order','asc');

        $crud->set_crud_url_path(base_url('admin/department'));

        //$crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        //$crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('department_name','description','sort_order','status');

        $crud->fields('department_name','description','sort_order','status');

        $crud->required_fields('department_name','status');

       $output = $crud->render();
       $output->title = 'College Department';
        return $output;
    } 


    public function department_faculty_details()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('department_faculty_details');
        $crud->set_subject('Faculty Details');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/department_faculty_details'));

        //$crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        //$crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('department_id','faculty_name','faculty_designation','status');

        $crud->fields('department_id','faculty_name','faculty_designation','status');

        $crud->required_fields('department_id','faculty_name','status');

        $crud->set_relation('department_id',' department','department_name');

        
        $crud->display_as('department_id', 'Department name');
        $output = $crud->render();
       $output->title = 'Faculty Details';
        return $output;
    }


    public function departmental_gallery()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('departmental_gallery');
        $crud->set_subject('Departmental Gallery');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/departmental_gallery'));

        //$crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        //$crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();


        $crud->set_field_upload('image','assets/uploads/departmental_gallery');

        $this->path = 'assets/uploads/departmental_gallery';

        $crud->callback_before_delete(array($this,'delete_image_from_server'));
 
        $crud->columns('department_id','image','status');

        $crud->fields('department_id','image','description','status');

        $crud->required_fields('department_id','image','status');

        $crud->set_relation('department_id',' department','department_name');

        
        $crud->display_as('department_id', 'Department name');

        $crud->display_as('image', 'Department Pic');
        $output = $crud->render();

        /*$state = $crud->getState();

        if($state == 'delete'){

        }*/


        $output->title = 'Departmental Gallery';
        return $output;
    }

    public function delete_image_from_server($primary_key)
    {

        $image = $this->db->get_where('departmental_gallery', array('departmental_gallery_id'=> $primary_key))->row()->image;

        @unlink($this->path.'/'.$image);
            
        
    }

    



    


    

     
    
	 
}