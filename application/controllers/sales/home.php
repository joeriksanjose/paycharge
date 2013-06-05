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
        if (isset($_POST["state_nos"])) {
            $state_nos = implode(",", $this->input->post("state_nos", true));
        }

        $this->data["states_assigned"] = $this->state->getStateByStateNos($this->user_data["state_no"]);
        $this->data["clients_assigned"] = $this->clients->getAssignedClientsByStateNos($state_nos);
        $this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
        $this->data["footer"] = $this->load->view("sales/sales_footer", $this->data, true);
        $this->data["side_nav"] = $this->load->view("sales/sales_side_nav", $this->data, true);

        $this->load->view("sales/new_sales_view2", $this->data);
    }
    
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