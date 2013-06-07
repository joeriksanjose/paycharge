<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model("tbl_user_model", "user");
        $this->load->model("tbl_sales_modern_award", "smd");
        $this->load->model("libraries/tbl_clients", "clients");
        $this->load->model("libraries/tbl_contacts", "contacts");
        $this->load->model("libraries/tbl_client_contacts", "cc");
        $this->load->model("libraries/tbl_state", "state");
        $this->load->model("tbl_sales_modern_award", "sma");
        $this->load->model("sales/tbl_sales_trans", "st");
        $this->load->library("user_session");
        $this->user_session = $this->user_session->checkUserSession();
        
        if ($this->user_session["is_admin"]) {
            redirect(base_url());
        }
        
        $this->data["title"] = "System - Sales";
        $this->data["username"] = $this->user_session["username"];
        $this->data["is_admin"] = $this->user_session["is_admin"];
        $this->user_data = $this->user->getUserById($this->user_session["user_id"]);
    }
    
    public function index()
    {
        $this->data["title"] = "Sales - Clients Assigned";
        $state_nos = $this->user_data["state_no"];

        $this->data["states_assigned"] = $this->state->getStateByStateNos($this->user_data["state_no"]);
        $this->data["clients_assigned"] = $this->clients->getAssignedClientsByStateNos($state_nos);
        $this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
        $this->data["footer"] = $this->load->view("sales/sales_footer", $this->data, true);
        $this->data["side_nav"] = $this->load->view("sales/sales_side_nav", $this->data, true);

        $this->load->view("sales/new_sales_view2", $this->data);
    }
    
    // CONTACTS
    public function view($client_no)
    {
        $this->data["ok"] = false;
        $this->data["error"] = false;
        
        $state_nos = $this->user_data["state_no"];
        if (isset($_POST["state_nos"])) {
            $state_nos = implode(",", $this->input->post("state_nos", true));
        }
        
        if ($this->data["success_msg"] = $this->session->userdata("ok")) {
            $this->data["ok"] = true;
        }
        if ($this->data["error_msg"] = $this->session->userdata("error")) {
            $this->data["error"] = true;
        }
        
        $this->session->unset_userdata("error");
        $this->session->unset_userdata("ok");

        $this->data["states_assigned"] = $this->state->getStateByStateNos($this->user_data["state_no"]);
        $this->data["clients_assigned"] = $this->clients->getAssignedClientsByStateNos($state_nos);
        $this->data["client_info"] = $this->clients->getClientInformation($client_no, $this->user_data["state_no"]);
        $this->data["existing_contacts"] = $this->contacts->select_all_contacts();
        $this->data["title"] = $this->data["client_info"]["company_name"];
        $this->data["contacts"] = $this->cc->getAllContactInfo($client_no);
        
        $this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
        $this->data["footer"] = $this->load->view("sales/sales_footer", $this->data, true);
        $this->data["side_nav"] = $this->load->view("sales/sales_side_nav", $this->data, true);
        
        $this->load->view("sales/view_client", $this->data);
    }
    
    public function addNewContact()
    {
        $data = $this->input->post(null, true);
        $data["date_of_birth"] = $this->convertToYMD($data["date_of_birth"]);
        
        if (!$data["client_nos"]) {
            $this->session->set_userdata("error", "<b>Error!</b> Please select at least one client.");
            redirect($_SERVER["HTTP_REFERER"]);
            return;
        }
        
        if (!isset($data["can_view"]) && !isset($data["can_approve"]) && !isset($data["can_forecast"])) {
            $this->session->set_userdata("error", "<b>Error!</b> Please choose at least one access level.");
            redirect($_SERVER["HTTP_REFERER"]);
            return;
        }
        
        try {
            foreach ($data["client_nos"] as $client) {
                $cc_data = array("company_no" => $client, "contact_no" => $data["contact_no"]);
                $this->cc->save($cc_data);
            }
        } catch (Exception $e) {
            $this->session->set_userdata("error", "<b>Error!</b> Database Error");
            redirect($_SERVER["HTTP_REFERER"]);
        }
        
        unset($data["client_nos"]);
           
        $sql = $this->contacts->save_contacts($data);
        
        if ($sql) {
            $this->session->set_userdata("ok", "<b>Done!</b> Contact successfully added.");
            redirect($_SERVER["HTTP_REFERER"]);
            return;
        }
            
        $this->session->set_userdata("error", "<b>Error!</b> Database error.");
        redirect($_SERVER["HTTP_REFERER"]);
    }
    
    public function updateContact()
    {
        $data = $this->input->post(null, true);
        $data["e_date_of_birth"] = $this->convertToYMD($data["e_date_of_birth"]);
        
        if (!isset($data["e_can_view"]) && !isset($data["e_can_approve"]) && !isset($data["e_can_forecast"])) {
            $this->session->set_userdata("error", "<b>Error!</b> Please choose at least one access level.");
            redirect($_SERVER["HTTP_REFERER"]);
            return;
        }
        
        $update_data = array (
            "contact_no"       => $data["e_contact_no"],
            "first_name"       => $data["e_first_name"],
            "pref_first_name"  => $data["e_pref_first_name"],
            "pref_first_name"  => $data["e_pref_first_name"],
            "last_name"        => $data["e_last_name"],
            "middle_name"      => $data["e_middle_name"],
            "date_of_birth"    => $data["e_date_of_birth"],
            "position"         => $data["e_position"],
            "contact_phone_no" => $data["e_contact_phone_no"],
            "email"            => $data["e_email"],
            "first_name"       => $data["e_first_name"],
            "can_view"         => $data["e_can_view"],
            "can_approve"      => $data["e_can_approve"],
            "can_forecast"     => $data["e_can_forecast"]
        );
        
        try {
            foreach ($data["e_client_nos"] as $client) {
                $cc_data = array("company_no" => $client, "contact_no" => $update_data["contact_no"]);
                if ($this->cc->getClientInfo($cc_data["company_no"], $cc_data["contact_no"])) {
                    continue;
                }
                
                $this->cc->save($cc_data);
            }
        } catch (Exception $e) {
            $this->session->set_userdata("error", "<b>Error!</b> Database Error");
            redirect($_SERVER["HTTP_REFERER"]);
        }
        
        unset($data["e_client_nos"]);
           
        $sql = $this->contacts->updateContactByContactNo($update_data);
        
        if (!$sql) {
            $this->session->set_userdata("error", "<b>Error!</b> Database error.");
            redirect($_SERVER["HTTP_REFERER"]);
            return;
        }
        
        $this->session->set_userdata("ok", "<b>Done!</b> Contact successfully updated.");
        redirect($_SERVER["HTTP_REFERER"]);
    }
    
    public function addExistingContact()
    {
        $data = $this->input->post(null, true);
        
        if (!$data) {
            redirect($_SERVER["HTTP_REFERER"]);
        }
        
        try {
            foreach ($data["contact_nos"] as $contact) {
                $cc_data = array("contact_no" => $contact, "company_no" => $data["company_no"]);
                $this->cc->save($cc_data);
            }
        } catch (Exception $e) {
            $this->session->set_userdata("error", "<b>Error!</b> ".$e->getMessage());
            redirect($_SERVER["HTTP_REFERER"]);
        }
        
        redirect($_SERVER["HTTP_REFERER"]);
    }
    // END CONTACTS
    
    // AWARDS
    public function awards($client_no)
    {
        $state_nos = $this->user_data["state_no"];
        $this->data["status"] = $this->session->userdata("status");
        $this->data["status_msg"] = $this->session->userdata("status_msg");
        $this->session->unset_userdata("status");
        $this->session->unset_userdata("status_msg");
        
        try {
            // side navigation
            $this->data["states_assigned"] = $this->state->getStateByStateNos($this->user_data["state_no"]);
            $this->data["clients_assigned"] = $this->clients->getAssignedClientsByStateNos($state_nos);
            
            $this->data["client_info"] = $this->clients->getClientInformation($client_no, $this->user_data["state_no"]);
            $this->data["awards"] = $this->st->getTransaction($client_no);
            
            $this->data["modern_awards"] = $this->smd->getModernAwards();
            $this->data["company"] = $this->sma->getCompany($state_nos);
            $this->data["super"] = $this->sma->getSuper();
            $this->data["public_liability"] = $this->sma->getPublicLiability();
            $this->data["insurance"] = $this->sma->getInsurance();
            $this->data["long_service"] = $this->sma->getLongService();
            $this->data["admin"] = $this->sma->getAdmin();
            $this->data["position"] = $this->sma->getPosition();
            
            $this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
            $this->data["footer"] = $this->load->view("sales/sales_footer", $this->data, true);
            $this->data["side_nav"] = $this->load->view("sales/sales_side_nav", $this->data, true);
        } catch (Exception $e) {
            log_message("error", $e->getMessage());
            die("Something went wrong. Please try again.");
        }
        
        $this->load->view("sales/awards_view", $this->data);
    }
    // END AWARDS
    
    // AJAX
    
    public function ajaxSearchClient()
    {
        $params = array();
        $params["is_found"] = true;
        $key = $this->input->post("key", true);
        
        $result = $this->clients->searchClientByClientNo($key, $this->user_data["state_no"]);
        
        if (!$result) {
            $params["is_found"] = false;
            echo json_encode($params);
            return;
        }
        
        $params["result"] = $result;
        echo json_encode($params);
        return;
    }
    
    public function ajaxShowClientInformation()
    {
        $params = array();
        $params["is_found"] = true;
        $client_no = $this->input->post("client_no", true);
        
        $result = $this->clients->getClientInformation($client_no, $this->user_data["state_no"]);
        if (!$result) {
            $params["is_found"] = false;
            echo json_encode($params);
            return;
        }
        
        $params["result"] = $result;
        echo json_encode($params);
        return;
    }
    
    public function ajaxGetUserInfo()
    {
        $params = array();
        $params["is_found"] = true;
        $contact_no = $this->input->post("contact_no", true);
        
        $result = $this->contacts->getContactByContactNo($contact_no);
        if (!$result) {
            $params["is_found"] = false;
            echo json_encode($params);
            return;
        }
        
        $result["date_of_birth"] = date("d/m/Y", strtotime($result["date_of_birth"]));
        $clients = $this->cc->getAllClientInfo($contact_no);
        $tmp_clients = array();
        foreach ($clients as $client) {
            $tmp_clients[] = $client["client_no"];
        }
        
        $params["result"] = $result;
        $params["client_nos"] = $tmp_clients;
        echo json_encode($params);
        return;
    }
    
    public function ajaxDeleteContact()
    {
        $params = array();
        $params["is_deleted"] = true;
        $del = $this->input->post(null, true);
        if (!$this->cc->delete($del)) {
            $params["is_deleted"] = false;
            echo json_encode($params);
            return;
        }
        
        echo json_encode($params);
        return;
    }
    
    public function ajaxSearchContact()
    {
        $params = array();
        $params["is_found"] = true;
        $post = $this->input->post(null, true);
        
        $result = $this->cc->searchContactInfo($post["key"], $post["company_no"]);
        
        if (!$result) {
            $params["is_found"] = false;
            echo json_encode($params);
            return;
        }
        
        $params["result"] = $result;
        echo json_encode($params);
        return;
    }
    
    public function ajaxSearchAward()
    {
        $params = array();
        $params["is_found"] = true;
        $post = $this->input->post(null, true);
        
        try {
            $result = $this->st->searchTransaction($post["key"], $post["client_no"]);
            if (!$result) {
                $params["is_found"] = false;
                echo json_encode($params);
                return;
            }
        } catch (Exception $e) {
            $params["is_found"] = false;
            echo json_encode($params);
            return;
        }
        
        $params["result"] = $result;
        echo json_encode($params);
        return;
    }
    
    // END AJAX
    
    private function convertToYMD($date)
    {
        $tmp = explode("/", $date);
        
        $d = $tmp[0];
        $m = $tmp[1];
        $y = $tmp[2];
        
        return $y."-".$m."-".$d;
    }
}

/* End of file home.php */
/* Location: ./application/controllers/sales/home.php */