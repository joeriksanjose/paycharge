<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Position extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("libraries/tbl_position", "tbl");
        $this->load->library("user_session");
        
        $this->user_session = $this->user_session->checkUserSession();
        
        $this->data["title"] = "Libraries - Position";
        $this->data["username"] = $this->user_session["username"];
        $this->data["is_admin"] = $this->user_session["is_admin"];
    }
    
    public function index()
    {
        $this->data["header"] = $this->load->view("header", $this->data, true);
        $this->data["footer"] = $this->load->view("footer", $this->data, true);
        $this->data["ok"] = false;
        $this->data["error"] = false;
        $this->data["import_status"] = $this->session->userdata("import_status");
        $this->data["stat_msg"] = $this->session->userdata("stat_msg");
        
        try {
            if ($this->data["success_msg"] = $this->session->userdata("ok")) {
                $this->data["ok"] = true;
            }
            if ($this->data["error_msg"] = $this->session->userdata("error")) {
                $this->data["error"] = true;
            }
            $this->session->unset_userdata("error");
            $this->session->unset_userdata("ok");
            $this->session->unset_userdata("import_status");
            $this->session->unset_userdata("stat_msg");
            $this->data["data"] = $this->tbl->select_all();
            $this->data["count"] = count($this->data["data"]);
        } catch(Exception $ex) {
            $this->data["count"] = 0;
        }
        
        $this->load->view("libraries/position_view", $this->data);
    }
    
    public function edit()
    {
        $id = $_POST["id"];
        
        $this->data["data"] = $this->tbl->get($id);
        echo json_encode($this->data["data"]);
    }
    
    public function search()
    {
        $id = $_POST["key"];
        
        try {
            if (trim($id)=="%") {
                $this->data["data"] = $this->tbl->select_all();
            } else {
                $this->data["data"] = $this->tbl->search($id);    
            }
        } catch (Exception $e) {
            $params["is_error"] = true;
            echo json_encode($params);
            return;
        }
        
        echo json_encode($this->data["data"]);
    }
    
    public function delete()
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
        
        $is_deleted = $this->tbl->delete($del_id);
        
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
        $sql = $this->tbl->get_last_id();
        if (!$sql) {
            echo json_encode(0+1);    
        } else {
            echo json_encode($sql["id"]+1);
        }
        
    }
    
    public function save()
    {
        $data = $this->input->post(null, true);
        $sql = $this->tbl->save($data);
        
        if ($sql) {
            $this->session->set_userdata("ok", "<b>Done!</b> Super successfully added.");
            redirect("libraries/position/");
        } else {
            $this->session->set_userdata("errpositionor", "<b>Error!</b> Database error.");
            redirect("libraries/super/");
        }
    }
    
    public function update()
    {
        $data = $this->input->post(null, true);
		$sql = $this->tbl->update($data);
        
        if ($sql) {
            $params["is_error"] = false;
            $params["success_update"] = true;
            $params["data"] = $this->tbl->select_all();
        } else {
            $params["is_error"] = true;
            $params["success_update"] = false;
        }
        echo json_encode($params);
    }
}
?>