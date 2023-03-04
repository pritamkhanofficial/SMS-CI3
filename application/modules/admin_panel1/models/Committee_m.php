<?php

class Committee_m extends CI_Model {
	
 function __construct()
    {
        parent::__construct();  
        $this->load->library('grocery_CRUD');
        date_default_timezone_set("Asia/Kolkata");
    }

    public function college_committee()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('college_committee');
        $crud->set_subject('College Committees');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/college_committee'));

        //$crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        //$crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('committee_name','description','status');

        $crud->fields('committee_name','description','status');

        $crud->required_fields('committee_name','status');

        $output = $crud->render();
       $output->title = 'College Committees';
        return $output;
    }


    public function committee_details()
    {
        $crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('committee_details');
        $crud->set_subject('Committee Details');

        //$crud->where('Role', 'Operator');

        $crud->set_crud_url_path(base_url('admin/committee_details'));

        //$crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        //$crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
 
        $crud->columns('committee_id','name','description','status');

        $crud->fields('committee_id','name','description','status');

        $crud->required_fields('committee_id','name','status');

        $crud->set_relation('committee_id','college_committee','committee_name');

        
        $crud->display_as('committee_id', 'Committee name');
        $output = $crud->render();
       $output->title = 'Committee Details';
        return $output;
    }

    



    


    

     
    
	 
}