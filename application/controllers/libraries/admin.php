<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("libraries/tbl_admin", "admin");
        $this->load->library("user_session");
        
        $this->user_session = $this->user_session->checkUserSession();
        
        $this->data["title"] = "Libraries - admin";
        $this->data["username"] = $this->user_session["username"];
    }
    
    public function index()
    {
        $this->data["header"] = $this->load->view("header", $this->data, true);
        $this->data["footer"] = $this->load->view("footer", $this->data, true);
        $this->data["ok"] = false;
        $this->data["error"] = false;
        
        try {
            if ($this->data["success_msg"] = $this->session->userdata("ok")) {
                $this->data["ok"] = true;
            }
            if ($this->data["error_msg"] = $this->session->userdata("error")) {
                $this->data["error"] = true;
            }
            $this->session->unset_userdata("error");
            $this->session->unset_userdata("ok");
            $this->data["data"] = $this->admin->select_all_admin();
            $this->data["count"] = count($this->data["data"]);
        } catch(Exception $ex) {
            $this->data["count"] = 0;
        }
        
        $this->load->view("libraries/admin_view", $this->data);
    }
    
    public function edit_admin()
    {
        $id = $_POST["id"];
        
        $this->data["data"] = $this->admin->get_admin($id);
        
        echo json_encode($this->data["data"]);
    }
    
    public function search_admin()
    {
        $id = $_POST["key"];
        
        try {
            if (trim($id) == "%") {
                $this->data["data"] = $this->admin->select_all_admin();
            } else {
                $this->data["data"] = $this->admin->search_admin($id);    
            }
        } catch (Exception $e) {
            $params["is_error"] = true;
            echo json_encode($params);
            return;
        }
        
        echo json_encode($this->data["data"]);
    }
    public function delete_admin()
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
        
        $is_deleted = $this->admin->delete_admin($del_id);
        
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
    
    public function get_last_id()
    {
        $sql = $this->admin->get_last_id();
        if (!$sql) {
            echo json_encode(0 + 1);    
        } else {
            echo json_encode($sql["admin_no"] + 1);
        }
    }
    
    public function save_admin()
    {
        $data = $this->input->post(null, true);
        
        $sql = $this->admin->save_admin($data);
        
        if ($sql) {
            $this->session->set_userdata("ok", "<b>Done!</b> Admin successfully added.");
            redirect("libraries/admin/");
        } else {
            $this->session->set_userdata("error", "<b>Error!</b> Database error.");
            redirect("libraries/admin/");
        }
    }
    
    public function update_admin()
    {
        $data = $this->input->post(null, true);
        $sql = $this->admin->update_admin($data);
        
        if ($sql) {
            $params["is_error"] = false;
            $params["success_update"] = true;
            $params["data"] = $this->admin->select_all_admin();
        } else {
            $params["is_error"] = true;
            $params["success_update"] = false;
        }
        echo json_encode($params);
    }
}

