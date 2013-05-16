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
        $data["date_of_birth"] = date("Y-m-d", strtotime($data["date_of_birth"]));
        
        $sql = $this->contacts->save_contacts($data);
        
        if ($sql) {
            $this->session->set_userdata("ok", "<b>Done!</b> Contact successfully added.");
            redirect("libraries/contacts/");
        } else {
            $this->session->set_userdata("error", "<b>Error!</b> Database error.");
            redirect("libraries/contacts/");
        }
    }
    
    public function update_contacts()
    {
        $data = $this->input->post(null, true);
        $data["date_of_birth"] = date("Y-m-d", strtotime($data["date_of_birth"]));
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
            if (!$this->cc->save($post)) {
                $this->session->set_userdata("status", "alert-error");
                $this->session->set_userdata("status_msg", "<b>Error!</b> Database Error.");
                redirect(base_url("libraries/contacts/client_info/".$post["contact_no"]));
                return;
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
}

