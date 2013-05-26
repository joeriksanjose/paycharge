<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model("tbl_user_model", "user");
        $this->load->model("libraries/tbl_clients", "clients");
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
        $state_nos = $this->user_data["state_no"];
        
        $this->data["clients_assigned"] = $this->clients->getAssignedClientsByStateNos($state_nos);
        $this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
        $this->data["footer"] = $this->load->view("sales/sales_footer", $this->data, true);
        
        $this->load->view("sales/new_sales_view", $this->data);
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
}

/* End of file home.php */
/* Location: ./application/controllers/sales/home.php */