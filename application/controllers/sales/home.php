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
    
    // public function index()
    // {
        // $this->data["title"] = "Sales - Clients Assigned";
        // $state_nos = $this->user_data["state_no"];
        // if (isset($_POST["state_nos"])) {
            // $state_nos = implode(",", $this->input->post("state_nos", true));
        // }
// 
        // $this->data["states_assigned"] = $this->state->getStateByStateNos($this->user_data["state_no"]);
        // $this->data["clients_assigned"] = $this->clients->getAssignedClientsByStateNos($state_nos);
        // $this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
        // $this->data["footer"] = $this->load->view("sales/sales_footer", $this->data, true);
// 
        // $this->load->view("sales/new_sales_view2", $this->data);
    // }
    
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
    
    public function contacts($client_no)
    {
        $this->data["client_info"] = $this->clients->getClientInformation($client_no, $this->user_data["state_no"]);
        $this->data["title"] = $this->data["client_info"]["company_name"]." Contacts List";
        $this->data["contacts"] = $this->cc->getAllContactInfo($client_no);
        
        $this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
        $this->data["footer"] = $this->load->view("sales/sales_footer", $this->data, true);
        
        $this->load->view("sales/contacts_list_view", $this->data);
    }
    
    public function addNewContact()
    {
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            redirect("sales");
        }
        
        $post = $this->input->post(null, true);
    }
}

/* End of file home.php */
/* Location: ./application/controllers/sales/home.php */