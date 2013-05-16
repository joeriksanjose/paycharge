<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pcs extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model("libraries/tbl_contacts", "cont");
        $this->load->library("user_session");
        
        $this->client_session = $this->user_session->checkClientSession();
        
        $this->data["title"] = "Client";
        $this->data["name"] = $this->client_session["client_name"];
    }
    
    public function index()
    {
        $this->data["header"] = $this->load->view("client/header", $this->data, true);
        $this->data["footer"] = $this->load->view("client/footer", $this->data, true);
        
        $this->load->view("client/client_index_view", $this->data);
    }
}

/* End of file pcs.php */
/* Location: ./application/controllers/pcs.php */