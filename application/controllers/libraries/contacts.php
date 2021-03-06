<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("libraries/tbl_contacts", "contacts");
        $this->load->model("libraries/tbl_clients", "clients");
        $this->load->model("libraries/tbl_client_contacts", "cc");
        $this->load->model("libraries/tbl_state", "state");
        $this->load->library("user_session");
        
        $this->user_session = $this->user_session->checkUserSession();
        
        $this->data["title"] = "Libraries - Contacts";
        $this->data["username"] = $this->user_session["username"];
        $this->data["is_admin"] = $this->user_session["is_admin"];
    }
    
    public function index()
    {
        $this->data["header"] = $this->load->view("header", $this->data, true);
        if (!$this->data["is_admin"]) {
            $this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
        }
        $this->data["footer"] = $this->load->view("footer", $this->data, true);
        $this->data["ok"] = false;
        $this->data["error"] = false;
        $this->data["import_status"] = $this->session->userdata("import_status");
        $this->data["stat_msg"] = $this->session->userdata("stat_msg");
        
        try {
            $this->data["clients"] = $this->clients->select_all_clients();
        } catch (Exception $e) {
            $this->data["clients"] = array();
        }
        
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
            $this->data["data"] = $this->contacts->select_all_contacts();
            $this->data["count"] = count($this->data["data"]);
        } catch(Exception $ex) {
            $this->data["count"] = 0;
        }
        
        $this->load->view("libraries/contacts_view", $this->data);
    }
    
    public function edit_contacts()
    {
        $id = $_POST["id"];
        
        $this->data["data"] = $this->contacts->get_contacts($id);
        $this->data["data"]["date_of_birth"] = date("d/m/Y", strtotime($this->data["data"]["date_of_birth"]));
        
        $clients = $this->cc->getAllClientInfo($id);
        $tmp_clients = array();
        foreach ($clients as $client) {
            $tmp_clients[] = $client["client_no"];
        }
        
        $this->data["data"]["client_nos_exploded"] = $tmp_clients;
        
        echo json_encode($this->data["data"]);
    }
    
    public function search_contacts()
    {
        $id = $_POST["key"];
        
        try {
            if (trim($id) == "%") {
                $this->data["data"] = $this->contacts->select_all_contacts();
            } else {
                $this->data["data"] = $this->contacts->search_contacts($id);    
            }
        } catch (Exception $e) {
            $params["is_error"] = true;
            echo json_encode($params);
            return;
        }
        
        echo json_encode($this->data["data"]);
    }
    public function delete_contacts()
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
        
        $is_deleted = $this->contacts->delete_contacts($del_id);
        
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
        $sql = $this->contacts->get_last_id();
        if (!$sql) {
            echo json_encode(0 + 1);    
        } else {
            echo json_encode($sql["contact_no"] + 1);
        }
    }
    
    public function save_contacts()
    {
        $data = $this->input->post(null, true);
        $data["date_of_birth"] = $this->convertToYMD($data["date_of_birth"]);
        
        if (!$data["client_nos"]) {
            $this->session->set_userdata("error", "<b>Error!</b> Please select at least one client.");
            redirect("libraries/contacts/");
            return;
        }
        
        foreach ($data["client_nos"] as $client) {
            $cc_data = array("company_no" => $client, "contact_no" => $data["contact_no"]);
            $this->cc->save($cc_data);
        }
        
        unset($data["client_nos"]);
        
        if (!isset($data["can_view"]) && !isset($data["can_approve"]) && !isset($data["can_forecast"])) {
            $this->session->set_userdata("error", "<b>Error!</b> Please choose at least one access level.");
            redirect("libraries/contacts/");
            return;
        }
           
        $sql = $this->contacts->save_contacts($data);
        
        if ($sql) {
            $this->session->set_userdata("ok", "<b>Done!</b> Contact successfully added.");
            redirect("libraries/contacts/");
            return;
        }
            
        $this->session->set_userdata("error", "<b>Error!</b> Database error.");
        redirect("libraries/contacts/");
    }
    
    public function update_contacts()
    {
        $data = $this->input->post(null, true);
        $data["date_of_birth"] = $this->convertToYMD($data["date_of_birth"]);
        
        $this->cc->delete(array("contact_no" => $data["contact_no"]));
        
        foreach ($data["client_nos"] as $client) {
            $cc_data = array("company_no" => $client, "contact_no" => $data["contact_no"]);
            $this->cc->save($cc_data);
        }
        
        unset($data["client_nos"]);
        
        $sql = $this->contacts->update_contacts($data);
        
        if ($sql) {
            $params["is_error"] = false;
            $params["success_update"] = true;
            $params["data"] = $this->contacts->select_all_contacts();
        } else {
            $params["is_error"] = true;
            $params["success_update"] = false;
        }
        
        echo json_encode($params);
    }
    
    public function client_info($contact_no)
    {
        $this->data["title"] = "Libraries - Client Info";
        $this->data["header"] = $this->load->view("header", $this->data, true);
        $this->data["footer"] = $this->load->view("footer", $this->data, true);
        $this->data["contact_no"] = $contact_no;
        $this->data["status"] = $this->session->userdata("status");
        $this->data["status_msg"] = $this->session->userdata("status_msg");
        $this->data["display"] = "none";
        $this->data["client_infos"] = $this->cc->getAllClientInfo($contact_no);
        
        if (count($this->data["client_infos"])) {
            foreach ($this->data["client_infos"] as $key => $client) {
                $state = $this->state->get_state_4_clients($client["state_no"]);
                $this->data["client_infos"][$key]["state_name"] = $state["state_name"];
            }
        }
        
        if ($this->data["status"]) {
            $this->data["display"] = "block";
        } else {
            $this->data["display"] = "none";
        }
        
        $client_names = array();
        try {
            $clients = $this->clients->select_all_clients();
            foreach($clients as $key => $client) {
                $state = $this->state->get_state_4_clients($client["state_no"]);
                $clients[$key]["state_name"] = $state["state_name"];
            }
        } catch (Exception $e) {
            $clients = array();
        }
        
        $this->session->unset_userdata("status");
        $this->session->unset_userdata("status_msg");
        
        $this->data["clients"] = $clients;
        $this->data["contact_info"] = $this->contacts->getContactByContactNo($contact_no);
        
        $this->load->view("libraries/client_info_view", $this->data);
    }
    
    public function saveClientInfo()
    {
        $post = $this->input->post(null, true);        
         try {
            foreach ($post["company_no"] as $company_no) {
                $data = array("company_no" => $company_no, "contact_no" => $post["contact_no"]);
                if (!$this->cc->save($data)) {
                    $this->session->set_userdata("status", "alert-error");
                    $this->session->set_userdata("status_msg", "<b>Error!</b> Database Error.");
                    redirect(base_url("libraries/contacts/client_info/".$post["contact_no"]));
                    return;
                }
            }
        } catch (Exception $e) {
            $this->session->set_userdata("status", "alert-error");
            $this->session->set_userdata("status_msg", "<b>Error!</b> ".$e->getMessage());
            redirect(base_url("libraries/contacts/client_info/".$post["contact_no"]));
            return;
        }
        
        $this->session->set_userdata("status", "alert-success");
        $this->session->set_userdata("status_msg", "<b>Done!</b> Client info successfully added.");
        redirect(base_url("libraries/contacts/client_info/".$post["contact_no"]));
    }
    
    public function deleteClientInfo()
    {
        $params = array();
        $params["status"] = true;
        $post = $this->input->post(null, true);
        
        if (!$this->cc->deleteClientInfo($post["company_no"], $post["contact_no"])) {
            $params["status"] = false;
            echo json_encode($params);
            return;
        }
        
        echo json_encode($params);
        return;
    }
    
    public function showClientInfo()
    {
        $post = $this->input->post(null, true);
        $client_info = $this->cc->getClientInfo($post["company_no"], $post["contact_no"]);
        $state = $this->state->get_state_4_clients($client_info["state_no"]);
        $client_info["state_name"] = $state["state_name"]; 
        
        echo json_encode($client_info);
        return;
    }
    
    private function convertToYMD($date)
    {
        $tmp = explode("/", $date);
        
        $d = $tmp[0];
        $m = $tmp[1];
        $y = $tmp[2];
        
        return $y."-".$m."-".$d;
    }
    
    function checkTransNo(){
        
        $post = $this->input->post(null, true);
        if($this->contacts->checkTransNo($post)){
            $this->data["status"] = 0;
            $this->data["status_msg"] = "<b>Error! </b> Contacts number already exists.";
        } else {
            $this->data["status"] = 1;
        }
        
        echo json_encode($this->data);  
    }
}

