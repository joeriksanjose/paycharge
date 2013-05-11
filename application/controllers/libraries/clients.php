<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("libraries/tbl_clients", "clients");
        $this->load->model("libraries/tbl_state", "state");
        $this->load->model("libraries/tbl_client_contacts", "cc");
        $this->load->model("libraries/tbl_contacts", "contacts");
        $this->load->library("user_session");
        
        $this->user_session = $this->user_session->checkUserSession();
        
        $this->data["title"] = "Libraries - Clients";
        $this->data["username"] = $this->user_session["username"];
        $this->data["is_admin"] = $this->user_session["is_admin"];
    }
    
    public function saveContactInfo()
    {
        $post = $this->input->post(null, true);
        if (!$this->cc->save($post)) {
            $this->session->set_userdata("status", "alert-error");
            $this->session->set_userdata("status_msg", "<b>Error!</b> Database Error.");
            redirect(base_url("libraries/contacts/client_info/".$post["contact_no"]));
            return;
        }
        
        $this->session->set_userdata("status", "alert-success");
        $this->session->set_userdata("status_msg", "Client info successfully added.");
        redirect(base_url("libraries/clients/contact_info/".$post["company_no"]));
    }
    
    public function showContactInfo()
    {
        $post = $this->input->post(null, true);
        $client_info = $this->contacts->get_contacts($post["contact_no"]);
        echo json_encode($client_info);
        return;
    }
    
    public function deleteContactInfo()
    {
        $post = $this->input->post(null, true);
        $client_info = $this->cc->deleteClientInfo($post["company_no"], $post["contact_no"]);
        echo json_encode(array("status" => $client_info));
        return;
    }
    
    public function contact_info($id)
    {
        $this->data["header"] = $this->load->view("header", $this->data, true);
        $this->data["footer"] = $this->load->view("footer", $this->data, true);
        $this->data["status"] = $this->session->userdata("status");
        $this->data["status_msg"] = $this->session->userdata("status_msg");
        $this->data["display"] = "none";
        
        if (
            $this->data["status"] == "alert-success" || 
            $this->data["status"] == "alert-error"
           ) {
            $this->data["display"] == "";
        } else {
            $this->data["display"] == "none";
        }
        
        try {
            $this->session->unset_userdata("status");
            $this->session->unset_userdata("status_msg");
            
            $this->data["company"] = $this->clients->getClientByClientNo($id);
            $this->data["data"] = $this->cc->getAllContactInfo($id);
            
            $this->data["contacts"] = $this->contacts->select_all_contacts();
            
            $this->data["count"] = count($this->data["data"]);
        } catch(Exception $ex) {
            $this->data["count"] = 0;
        }
        
        $this->load->view("libraries/contact_info_view", $this->data);
    }
    
    public function index()
    {
        $this->data["header"] = $this->load->view("header", $this->data, true);
        $this->data["footer"] = $this->load->view("footer", $this->data, true);
        $this->data["ok"] = false;
        $this->data["error"] = false;
        $this->data["states"] = $this->state->select_all_state_4_clients();
        
        try {
            if ($this->data["success_msg"] = $this->session->userdata("ok")) {
                $this->data["ok"] = true;
            }
            if ($this->data["error_msg"] = $this->session->userdata("error")) {
                $this->data["error"] = true;
            }
            $this->session->unset_userdata("error");
            $this->session->unset_userdata("ok");
            $this->data["data"] = $this->clients->select_all_clients();
            foreach ($this->data["data"] as $key => $data) {
                $state = $this->state->get_state_4_clients($data["state_no"]);
                if ($state) {
                    $this->data["data"][$key]["state_name"] = $state["state_name"];
                } else {
                    $this->data["data"][$key]["state_name"] = "";
                }
            }
            $this->data["count"] = count($this->data["data"]);
        } catch(Exception $ex) {
            $this->data["count"] = 0;
        }

        $this->load->view("libraries/clients_view", $this->data);
    }
    
    public function edit_clients()
    {
        $id = $_POST["id"];
        
        $this->data["data"] = $this->clients->get_clients($id);
        
        echo json_encode($this->data["data"]);
    }
    
    public function search_clients()
    {
        $id = $_POST["key"];
        
        try {
            if (trim($id) == "%") {
                $this->data["data"] = $this->clients->select_all_clients();
            } else {
                $this->data["data"] = $this->clients->search_clients($id);    
            }
        } catch (Exception $e) {
            $params["is_error"] = true;
            echo json_encode($params);
            return;
        }
        
        foreach ($this->data["data"] as $key => $data) {
            $state = $this->state->get_state_4_clients($data["state_no"]);
            if ($state) {
                $this->data["data"][$key]["state_name"] = $state["state_name"];
            } else {
                $this->data["data"][$key]["state_name"] = "";
            }
        }
        
        echo json_encode($this->data["data"]);
    }
    public function delete_clients()
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
        
        $is_deleted = $this->clients->delete_clients($del_id);
        
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
        $sql = $this->clients->get_last_id();
        if (!$sql) {
            echo json_encode(0 + 1);    
        } else {
            echo json_encode($sql["contact_no"] + 1);
        }
    }
    
    public function save_clients()
    {
        $data = $this->input->post(null, true);
        
        $sql = $this->clients->save_clients($data);
        
        if ($sql) {
            $this->session->set_userdata("ok", "<b>Done!</b> Contact successfully added.");
            redirect("libraries/clients/");
        } else {
            $this->session->set_userdata("error", "<b>Error!</b> Database error.");
            redirect("libraries/clients/");
        }
    }
    
    public function update_clients()
    {
        $data = $this->input->post(null, true);
        $sql = $this->clients->update_clients($data);
        
        if ($sql) {
            $params["is_error"] = false;
            $params["success_update"] = true;
            $params["data"] = $this->clients->select_all_clients();
            foreach ($params["data"] as $key => $data) {
                $state = $this->state->get_state_4_clients($data["state_no"]);
                if ($state) {
                    $params["data"][$key]["state_name"] = $state["state_name"];
                } else {
                    $params["data"][$key]["state_name"] = "";
                }
            }
        } else {
            $params["is_error"] = true;
            $params["success_update"] = false;
        }
        echo json_encode($params);
    }
}
