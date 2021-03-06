<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model("tbl_user_model", "users");
    }

    public function index()
    {
        if ($this->session->userdata("user_id") != "") {
            redirect(base_url("transactions"));
        }
        
        $data["login_error"] = false;
        $data["title"] = "System Login";
        
        if ($err_msg = $this->session->userdata("login_error")) {
            $data["login_error"] = true;
            $data["error_message"] = $err_msg;
        }
        
        $this->session->unset_userdata("login_error");
        
        $this->load->view("login_view", $data);
    }
    
    public function login()
    {
        $post = $this->input->post(null, true);
        $user = $this->users->checkUser($post);
               
        if (!$user) {
            $this->session->set_userdata("login_error", "Error: Invalid username/password");
            redirect(base_url());
        } else {
            $user_session = array(
                    "user_id"  => $user["id"],
                    "username" => $user["username"],
                    "is_admin" => $user["admin"]
                );
                
            $this->session->set_userdata($user_session);
            if ($user_session["is_admin"]) {
                redirect(base_url("transactions"));
            } else {
                redirect(base_url("sales"));
            }
        }
    }
    
    public function logout()
    {
        $user_session = array(
                    "user_id"  => "",
                    "username" => "",
                    "is_admin" => ""
                );
                
        $this->session->unset_userdata($user_session);
        redirect(base_url());
    }
    
    public function addNewUser()
    {
        $post = $this->input->post(null, true);
        
        foreach ($post as $k => $v) {
            if ($k != "state_no")
                $post[$k] = trim($v);
        }
        
        if ($post["admin"]) {
            $state_nos = 0;
        } else {
            $state_nos = implode(",", $post["state_no"]);            
        }
        
        unset($post["state_no"]);
        
        if (in_array("", $post)) {
            $add_session_error = array(
                "is_add_error" => true,
                "error_msg"    => "Error: Do not leave blank fields",
                "display_form" => "block",
                "post_values"  => $post
            );
            $this->session->set_userdata($add_session_error);
            redirect(base_url("utilities/user_access"));
        }
        
        if ($post["password"] != $post["c_password"]) {
            $add_session_error = array(
                "is_add_error" => true,
                "error_msg"    => "Error: Password did not match",
                "display_form" => "block",
                "post_values"  => $post
            );
            $this->session->set_userdata($add_session_error);
            redirect(base_url("utilities/user_access"));
        }
        
        if ($this->users->isUsernameExist($post["username"])) {
            $add_session_error = array(
                "is_add_error" => true,
                "error_msg"    => "Error: User ID already exists",
                "display_form" => "block",
                "post_values"  => $post
            );
            $this->session->set_userdata($add_session_error);
            redirect(base_url("utilities/user_access"));
        }
        
        $post["state_no"] = $state_nos;
        
        $is_added = $this->users->addUser($post);
        if ($is_added) {
            $add_session_success = array(
                "is_add_success" => true,
                "success_msg"    => "New user was successfully added",
                "display_form"   => "block"
            );
            $this->session->set_userdata($add_session_success);
        } else {
            $add_session_error = array(
                "is_add_error" => true,
                "error_msg"    => "Error: Database Error",
                "display_form" => "block",
                "post_values"  => $post
            );
            $this->session->set_userdata($add_session_error);
        }
        
        redirect(base_url("utilities/user_access"));
    }

    public function ajaxDeleteUser()
    {
        $params = array();
        $params["is_error"] = false;
        $params["success_delete"] = false;
        $params["msg"] = "User deleted successfully";
        
        $del_id = $this->input->post("del_id", true);
        
        if (!$del_id) {
            $params["is_error"] = true;
            $params["msg"] = "Error: id not specified";
            echo json_encode($params);
            return;
        }
        
        if ($del_id == $this->session->userdata("user_id")) {
            $params["is_error"] = true;
            $params["msg"] = "Error: you cant delete your account";
            echo json_encode($params);
            return;
        }
        
        $is_deleted = $this->users->deleteUser($del_id);
        
        if ($is_deleted) {
            $params["is_error"] = false;
            $params["success_delete"] = true;
            echo json_encode($params);
            return;
        }
        
        $params["is_error"] = true;
        $params["msg"] = "Error: System Error";
        echo json_encode($params);
        return;
    }

    public function ajaxShowUserInfo()
    {
        $params = array();
        $params["is_error"] = false;
        $user_id = $this->input->post("user_id", true);
        
        try {
            $user = $this->users->getUserById($user_id);
            $params["user"] = $user;
            $params["user"]["state_no_exploded"] = explode(",", $params["user"]["state_no"]);
            echo json_encode($params);
            return;
        } catch (Exception $e) {
            $params["is_error"] = true;
            $params["error_message"] = $e->getMessage();
            echo json_encode($params);
            return;
        }
    }
    
    public function ajaxUpdateUser()
    {
        $params = array();
        $params["is_error"] = false;
        $post = $this->input->post(null, true);
        if ($post["admin"]) {
            $state_nos = 0;
        } else {
            $state_nos = implode(",", $post["state_no"]);            
        }
        
        foreach ($post as $k => $v) {
            if ($k != "state_no")
                $post[$k] = trim($v);
        }
        
        unset($post["state_no"]);
        
		if($post["change"] == 1){
			try {
	            if (!$post) {
	                throw new Exception("<b>Error:</b> Cannot update user");
	            }
	            
	            if (in_array("", $post)) {
	                throw new Exception("<b>Error:</b> Do not leave blank fields");
	            }
	            
	            if (!$this->users->isPasswordCorrect($post["id"], $post["password"])) {
	                throw new Exception("<b>Error:</b> Incorrect password.");
	            }
	            unset($post["change"]);
	            $post["state_no"] = $state_nos;
	            $post["password"] = $post["new_password"];
				unset($post["new_password"]);
	            $is_updated = $this->users->updateById($post["id"], $post);
	            if (!$is_updated) {
	                throw new Exception("<b>Error:</b> Database Error");
	            }
	        } catch (Exception $e) {
	            $params["is_error"] = true;
	            $params["error_msg"] = $e->getMessage();
	            echo json_encode($params);
	            return;
	        }
		} else {
			unset($post["change"]);
			$post["state_no"] = $state_nos;
            $is_updated = $this->users->updateById($post["id"], $post);
            if (!$is_updated) {
                throw new Exception("<b>Error:</b> Database Error");
            }
		}
        
        echo json_encode($params);
        return;
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */