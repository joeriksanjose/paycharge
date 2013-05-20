<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utilities extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("tbl_user_model", "users");
        $this->load->model("tbl_system_setup", "setup");
        $this->load->model("libraries/tbl_state", "state");
        $this->load->library("user_session");
        
        $this->user_session = $this->user_session->checkUserSession();
        if (!$this->user_session["is_admin"]) {
            redirect("sales_transaction");
        }
    }
    
    public function user_access()
    {
        $data["title"] = "System - Utilities";
        $data["username"] = $this->user_session["username"];
        $data["is_admin"] = $this->user_session["is_admin"];
        
        $data["header"] = $this->load->view("header", $data, true);
        $data["footer"] = $this->load->view("footer", $data, true);
        
        // load states
        $data["states"] = $this->state->select_all_state();
        
        $data["display_form"] = "none";
        $data["add_error"] = false;
        $data["add_success"] = false;
        $data["post_values"] = array(
            "admin"     => 1,
            "full_name" => "",
            "username"  => ""
        );
        
        $tmp_post_val = $this->session->userdata("post_values");
        if ($tmp_post_val) {
            $data["post_values"] = $tmp_post_val;
        }
        
        $display_form = $this->session->userdata("display_form");
        $is_add_success = $this->session->userdata("is_add_success");
        $is_add_error = $this->session->userdata("is_add_error");
        
        if ($is_add_success) {
            $data["display_form"] = "block";
            $data["add_success"] = true;
            $data["success_msg"] = $this->session->userdata("success_msg");
        } elseif ($is_add_error) {
            $data["display_form"] = "block";
            $data["add_error"] = true;
            $data["error_msg"] = $this->session->userdata("error_msg");
        }
        
        $this->session->unset_userdata(array(
            "display_form"   => "",
            "add_error"      => "",
            "add_success"    => "",
            "is_add_success" => false,
            "is_add_error"   => false,
            "post_values"    => ""
        ));
        
        $data["users"] = $this->users->getAllUsers();
        $this->load->view("utilities/user_access_view", $data);
    }

    public function search_user()
    {
        $id = $_POST["key"];
        
        try {
            if (trim($id)=="%") {
                $this->data["data"] = $this->users->getAllUsers();
            } else {
                $this->data["data"] = $this->users->searchUsers($id);    
            }
        } catch (Exception $e) {
            $params["is_error"] = true;
            echo json_encode($params);
            return;
        }
        
        echo json_encode($this->data["data"]);
    }
}
