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
}
