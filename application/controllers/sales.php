<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model("tbl_user_model", "user");
        $this->load->library("user_session");
        $this->user_session = $this->user_session->checkUserSession();
        
        if ($this->user_session["is_admin"]) {
            redirect(base_url());
        }
        
        $this->data["title"] = "System - Sales";
        $this->data["username"] = $this->user_session["username"];
        $this->data["is_admin"] = $this->user_session["is_admin"];
    }
    
    public function index()
    {
        $user = $this->user->getUserById($this->user_session["user_id"]);
        
        $this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
        $this->data["footer"] = $this->load->view("sales/sales_footer", $this->data, true);
        
        $this->load->view("sales/new_sales_view", $this->data);
    }
}

/* End of file sales.php */
/* Location: ./application/controllers/sales.php */