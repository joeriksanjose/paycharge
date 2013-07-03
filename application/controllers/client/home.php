<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model("libraries/tbl_contacts", "cont");
    }

    public function index()
    {
        if ($this->session->userdata("contact_no") != "") {
            redirect(base_url("client/pcs"));
        }
        
        $data["login_error"] = false;
        $data["title"] = "System Login";
        
        if ($err_msg = $this->session->userdata("login_error")) {
            $data["login_error"] = true;
            $data["error_message"] = $err_msg;
        }
        
        $this->session->unset_userdata("login_error");
        
        $this->load->view("client/login_view", $data);
    }
    
    public function login()
    { 
        $post = $this->input->post(null, true);
		unset($post["name"]);
		$client = $this->cont->checkClientLogin($post);
        
        if (!$client) {
            $this->session->set_userdata("login_error", "Error: Invalid username/password");
            redirect(base_url("client"));
        } else {
            $client_session = array(
                "contact_name" => $client["last_name"].", ".$client["first_name"],
                "contact_no"   => $client["contact_no"],
                "username"     => $client["username"],
                "can_view"     => $client["can_view"],
                "can_approve"  => $client["can_approve"],
                "can_forecast" => $client["can_forecast"]
            );
            $this->session->set_userdata($client_session);
            redirect("client/pcs");
        }
    }
    
    public function logout()
    {
        $client_session = array(
            "contact_name" => "",
            "contact_no"   => "",
            "username"     => "",
            "can_view"     => "",
            "can_approve"  => "",
            "can_forecast" => ""
        );
                
        $this->session->unset_userdata($client_session);
        redirect(base_url("client"));
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */