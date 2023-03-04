<?php

class User_m extends CI_Model {
	
 function __construct()
    {
        parent::__construct();  
        $this->load->library('grocery_CRUD');
    }

    public function user_register()
    {
    	$crud = new grocery_CRUD();
        //$crud->set_theme('datatables');
        $crud->set_theme('flexigrid');
        $crud->set_table('user');
        $crud->set_subject('User');
        //$crud->where('Role', 'Operator');
        // $crud->unset_add();
        //$crud->unset_export();
        //$crud->unset_print();
        $crud->unset_read();
         //$crud->unset_delete();
        $crud->unset_clone();
        // $crud->unset_edit();
        
    

        $crud->columns('UserFullName','UserName','RoleId');
        
        $crud->fields('ORGPassword','RoleId','Designation','UserDescription','UserFullName','UserName','Password','UserEmail','UserPhone','ProfileImg','Status','UserType');
        
        $crud->callback_edit_field('Password',array($this,'set_password_input_to_empty'));
		$crud->callback_add_field('Password',array($this,'set_password_input_to_empty'));
        
        $crud->set_field_upload('ProfileImg','assets/uploads/userimg/');
        
        
        $crud->change_field_type('ORGPassword','invisible');
        
		//$crud->crud->callback_add_field('Password',array($this,'set_password_input_to_empty'));
		
		$crud->callback_before_update(array($this,'encrypt_password_callback'));
		$crud->callback_before_insert(array($this,'encrypt_password_callback'));
		
		$crud->set_relation('RoleId','role','RoleDisplayName',array('Status'=>'Active'));

        $crud->required_fields('RoleId','UserFullName','UserName','Password','UserType');
        //$crud->unique_fields('PackageName');

        $crud->display_as('RoleId', 'Role');
        $crud->display_as('UserFullName', 'Full Name');
        $crud->display_as('UserName', 'Username');
        $crud->display_as('UserType', 'User Type');
        
        
        $crud->display_as('UserEmail', 'Email');
        $crud->display_as('UserPhone', 'Phone');
        $crud->display_as('ProfileImg', 'Profile Image');
        /*$crud->display_as('UserName', 'Username');
        $crud->display_as('UserName', 'Username');*/
        return $output = $crud->render();
    }
    
    
    public function encrypt_password_callback($post_array, $primary_key = null) {
		//Encrypt password only if is not empty. Else don't change the password to an empty field
		if(!empty($post_array['Password']))
		{
			// Hash password using phpass
		
			$hashed_password = hash('sha256', $post_array['Password']);
			
			
			
			
			$post_array['ORGPassword'] = $post_array['Password'];

			$post_array['Password'] = $hashed_password;
		}
		else
		{
			unset($post_array['Password']);
		}

	  return $post_array;
	}



	public function set_password_input_to_empty() {
		return "<input id='field-Password' type='password' class='form-control' name='Password' value='' />";
	}
	 
}