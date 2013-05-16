<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_session extends CI_Controller
{
    public function checkUserSession()
    {
        $user_session = $this->session->all_userdata();
        
        if (!array_key_exists("user_id", $user_session)) {
            $this->session->set_userdata("login_error", "Error: Must login to continue.");
            redirect(base_url());
        }
        
        return $user_session;
    }
    
    public function checkClientSession()
    {
        $client_session = $this->session->all_userdata();
        
        if (!array_key_exists("client_no", $client_session)) {
            $this->session->set_userdata("login_error", "Error: Must login to continue.");
            redirect(base_url("client"));
        }
        
        return $client_session;
    }
    
    /*
     * Converts "d/m/Y" to "Y-m-d"
     * 
     * @param string $date
     * @return string
     */
    public function convertToYMD($date)
    {
        $tmp = explode("/", $date);
        
        $d = $tmp[0];
        $m = $tmp[1];
        $y = $tmp[2];
        
        return $y."-".$m."-".$d;
    }
    
    /*
     * Converts "Y-m-d" to "d/m/Y"
     * 
     * @param string $date
     * @return string
     */
    public function convertToDMY($date)
    {
        $tmp = explode("-", $date, 3);
        
        $y = $tmp[0];
        $m = $tmp[1];
        $d = $tmp[2];
        
        return $d."/".$m."/".$y;
    }
}
