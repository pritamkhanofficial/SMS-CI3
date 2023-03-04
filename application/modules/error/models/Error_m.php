<?php

class Error_m extends CI_Model {
	
 function __construct()
    {
        parent::__construct();  
        $this->load->library('grocery_CRUD');
        date_default_timezone_set("Asia/Calcutta");
    }

    public function error_log_data_403()
    {
        $insertArray = array();
        if ($this->agent->is_browser())
        {
                $insertArray['agent'] = $this->agent->browser();

                $insertArray['agent_v'] = $this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
                $insertArray['agent'] = $this->agent->robot();
                $insertArray['agent_v'] = $this->agent->version();
        }
        elseif ($this->agent->is_mobile())
        {
                $insertArray['agent'] = $this->agent->mobile();

                $insertArray['agent_v'] = $this->agent->version();
        }
        else
        {
                $insertArray['agent'] = 'Unidentified User Agent';

                $insertArray['agent_v'] = 'NO';
        }
       /* echo $agent;

        echo "<br>";

        echo $this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)*/

        $insertArray['platform'] = $this->agent->platform();

        $insertArray['url'] = $this->agent->referrer();

        $insertArray['device_ip'] = $this->getip();

        $insertArray['log_date'] = date('Y-m-d h:i:s');


        $this->db->insert('error_log', $insertArray);

        return true;
        
    }
    
    private function getip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';


        return $ipaddress ;
     }


}