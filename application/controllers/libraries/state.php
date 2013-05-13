<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("libraries/tbl_state", "state");
        $this->load->library("user_session");
        
        $this->user_session = $this->user_session->checkUserSession();
        
        $this->data["title"] = "Libraries - State";
        $this->data["username"] = $this->user_session["username"];
    }
    
    function index()
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
            $this->data["data"] = $this->state->select_all_state();
            $this->data["count"] = count($this->data["data"]);
        } catch(Exception $ex) {
            $this->data["count"] = 0;
        }
        
        $this->load->view("libraries/state_view", $this->data);
    }
    
    function edit_state()
    {
        $id = $_POST["id"];
        
        $this->data["data"] = $this->state->get_state($id);
        
        echo json_encode($this->data["data"]);
    }
    
    function search_state()
    {
        $id = $_POST["key"];
        
        try {
            if (trim($id)=="%") {
                $this->data["data"] = $this->state->select_all_state();
            } else {
                $this->data["data"] = $this->state->search_state($id);    
            }
        } catch (Exception $e) {
            $params["is_error"] = true;
            echo json_encode($params);
            return;
        }
        
        echo json_encode($this->data["data"]);
    }
    
    function delete_state()
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
        
        $is_deleted = $this->state->delete_state($del_id);
        
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
    
    function get_last_id()
    {
        $sql = $this->state->get_last_id();
        if (!$sql) {
            echo json_encode(0+1);    
        } else {
            echo json_encode($sql["id"]+1);
        }
    }
    
    function save_state()
    {
        $data = $this->input->post(null, true);
        if (isset($data["swi_active"])) {
            $data["swi_active"] = 1;
        } else {
            $data["swi_active"] = 0;
        }
        
        $sql = $this->state->save_state($data);
        
        if ($sql) {
            $this->session->set_userdata("ok", "<b>Done!</b> State successfully added.");
            redirect("libraries/state/");
        } else {
            $this->session->set_userdata("error", "<b>Error!</b> Database error.");
            redirect("libraries/state/");
        }
    }
    
    function update_state()
    {
        $data = $this->input->post(null, true);
        $sql = $this->state->update_state($data);
        
        if ($sql) {
            $params["is_error"] = false;
            $params["success_update"] = true;
            $params["data"] = $this->state->select_all_state();
        } else {
            $params["is_error"] = true;
            $params["success_update"] = false;
        }
        echo json_encode($params);
    }
}
?>