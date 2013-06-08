<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insurance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("libraries/tbl_insurance", "insurance");
        $this->load->library("user_session");
        
        $this->user_session = $this->user_session->checkUserSession();
        if (!$this->user_session["is_admin"]) {
            redirect("sales_transaction");
        }
        
        $this->data["title"] = "Libraries - Insurance";
        $this->data["username"] = $this->user_session["username"];
        $this->data["is_admin"] = $this->user_session["is_admin"];
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
            $this->data["data"] = $this->insurance->select_all_insurance();
            $this->data["count"] = count($this->data["data"]);
        } catch(Exception $ex) {
            $this->data["count"] = 0;
        }
        
        $this->load->view("libraries/insurance_view", $this->data);
    }
    
    function checkTransNo(){
        
        $post = $this->input->post(null, true);
        if($this->insurance->checkTransNo($post)){
            $this->data["status"] = 0;
            $this->data["status_msg"] = "<b>Error! </b> Insurance number already exists.";
        } else {
            $this->data["status"] = 1;
        }
        
        echo json_encode($this->data);  
    }
    public function edit_insurance()
    {
        $id = $_POST["id"];
        
        $this->data["data"] = $this->insurance->get_insurance($id);
        
        echo json_encode($this->data["data"]);
    }
    
    public function search_insurance()
    {
        $id = $_POST["key"];
        
        try {
            if (trim($id) == "%") {
                $this->data["data"] = $this->insurance->select_all_insurance();
            } else {
                $this->data["data"] = $this->insurance->search_insurance($id);    
            }
        } catch (Exception $e) {
            $params["is_error"] = true;
            echo json_encode($params);
            return;
        }
        
        echo json_encode($this->data["data"]);
    }
    public function delete_insurance()
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
        
        $is_deleted = $this->insurance->delete_insurance($del_id);
        
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
        $sql = $this->insurance->get_last_id();
        if (!$sql) {
            echo json_encode(0 + 1);    
        } else {
            echo json_encode($sql["insurance_no"] + 1);
        }
    }
    
    public function save_insurance()
    {
        $data = $this->input->post(null, true);
        
        $sql = $this->insurance->save_insurance($data);
        
        if ($sql) {
            $this->session->set_userdata("ok", "<b>Done!</b> Insurance successfully added.");
            redirect("libraries/insurance/");
        } else {
            $this->session->set_userdata("error", "<b>Error!</b> Database error.");
            redirect("libraries/insurance/");
        }
    }
    
    public function update_insurance()
    {
        $data = $this->input->post(null, true);
        $sql = $this->insurance->update_insurance($data);
        
        if ($sql) {
            $params["is_error"] = false;
            $params["success_update"] = true;
            $params["data"] = $this->insurance->select_all_insurance();
        } else {
            $params["is_error"] = true;
            $params["success_update"] = false;
        }
        echo json_encode($params);
    }
}

