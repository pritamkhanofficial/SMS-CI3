<?php

class Dashboard_m extends CI_Model {
	

	function __construct()
    {
        parent::__construct();  
        date_default_timezone_set("Asia/Kolkata");
    }
 
	 public function dashboard_data()
	 {
	 	$data = array();
	 	$data['title'] = 'Dashboard';

	 	/*$data['admin_head'] = $this->db->get('administrative_heads')->num_rows();

	 	$data['college_committees'] = $this->db->get('college_committee')->num_rows();

	 	$data['department'] = $this->db->get('department')->num_rows();*/

	 	return $data;
	 }
}