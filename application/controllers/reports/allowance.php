<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Allowance extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("reports/tbl_allowance", "al");
        $this->load->model("tbl_user_model", "user");
        $this->load->library("user_session");
		$this->user_session = $this->user_session->checkUserSession();
		$this->data["title"] = "System - Reports";
		$this->data["username"] = $this->session->userdata("username");
		$this->data["is_admin"] = $this->user_session["is_admin"];
		$this->data["date_slash"] = mdate("%d/%m/%Y");
        $this->user_data = $this->user->getUserById($this->user_session["user_id"]);
	}
	
	
	public function modern_award(){
		if ($this->user_session["is_admin"]) {
            $this->data["header"] = $this->load->view("header", $this->data, true);
            $this->data["footer"] = $this->load->view("footer", $this->data, true);
            $this->data["modern_awards"] = $this->al->getModernAwards();
        } else {
            $this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
            $this->data["footer"] = $this->load->view("sales/sales_footer", $this->data, true);
            $this->data["modern_awards"] = $this->al->getModernAwards($this->user_data["state_no"]);
        }
        $this->data["status"] = $this->session->userdata("status");
        $this->data["status_msg"] = $this->session->userdata("status_message");
        $this->data["type"] = "Modern Award";
		
        
        
        $this->session->unset_userdata("status");
		
		$this->load->view("reports/allowance_view", $this->data);
	}
	
	public function client(){
		if ($this->user_session["is_admin"]) {
            $this->data["header"] = $this->load->view("header", $this->data, true);
            $this->data["footer"] = $this->load->view("footer", $this->data, true);
            $this->data["modern_awards"] = $this->al->getClient();
        } else {
            $this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
            $this->data["footer"] = $this->load->view("sales/sales_footer", $this->data, true);
            $this->data["modern_awards"] = $this->al->getClient($this->user_data["state_no"]);
        }
        $this->data["status"] = $this->session->userdata("status");
        $this->data["status_msg"] = $this->session->userdata("status_message");
        $this->data["type"] = "Client Agreement";
	
        
        $this->session->unset_userdata("status");
		
		$this->load->view("reports/allowance_client_view", $this->data);
	}
	
	public function print_modern($trans_no, $modern_no){
		if ($this->user_session["is_admin"]) {
            $this->data["header"] = $this->load->view("header", $this->data, true);
            $this->data["footer"] = $this->load->view("footer", $this->data, true);
        } else {
            $this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
            $this->data["footer"] = $this->load->view("sales/sales_footer", $this->data, true);
        }
        
        $this->data["allow"] = $this->al->getAllow($trans_no);
		$this->data["charge_rate"] = $this->al->getChargeRate($trans_no);
		$this->data["modern"] = $this->al->getModern($modern_no);
		
		$this->load->view("reports/print_allowance", $this->data);
	}
	
	public function print_client($trans_no){
		if ($this->user_session["is_admin"]) {
            $this->data["header"] = $this->load->view("header", $this->data, true);
            $this->data["footer"] = $this->load->view("footer", $this->data, true);
        } else {
            $this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
            $this->data["footer"] = $this->load->view("sales/sales_footer", $this->data, true);
        }
        
        $this->data["allow"] = $this->al->getAllow($trans_no);
		$this->data["charge_rate"] = $this->al->getChargeRate($trans_no);
		
		$this->load->view("reports/print_allowance_client", $this->data);
	}
}
