<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Security extends CI_Security {

    public function __construct()
    {
        //$this->load->helper('redirect');
        parent::__construct();  
            
    }

    public function csrf_show_error()
	{
		$heading = "Be gone fool!";
        $message = "The action you have requested is not allowed. You either do not have access, or your login session has expired and you need to sign in again";

        $_error = & load_class('Exceptions', 'core');
        
        $base_url = load_class('Config')->config['base_url']; 
        $url = $base_url.'error/csrf_auth';
        //echo $_error->show_error($heading, $message, $url, 403);
        header('Location: ' . $url);
        exit;
	}
}



 ?>