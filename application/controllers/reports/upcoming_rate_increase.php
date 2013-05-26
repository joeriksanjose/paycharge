<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upcoming_rate_increase extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("reports/tbl_upcoming_rates", "ur");
        $this->load->library("user_session");
        $this->user_session = $this->user_session->checkUserSession();
        $this->data["title"] = "System - Reports";
        $this->data["username"] = $this->session->userdata("username");
        $this->data["is_admin"] = $this->user_session["is_admin"];
        $this->data["date_slash"] = mdate("%d/%m/%Y");
    }
    
    
    public function modern_award(){
        if ($this->user_session["is_admin"]) {
            $this->data["header"] = $this->load->view("header", $this->data, true);
            $this->data["footer"] = $this->load->view("footer", $this->data, true);
        } else {
            $this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
            $this->data["footer"] = $this->load->view("sales/sales_footer", $this->data, true);
        }
        $this->data["status"] = $this->session->userdata("status");
        $this->data["status_msg"] = $this->session->userdata("status_message");
        $this->data["type"] = "Modern Award";
        
        $this->data["modern_awards"] = $this->ur->getModernAwards();
        
        $this->session->unset_userdata("status");
        
        $this->load->view("reports/upcoming_rates", $this->data);
    }
    
    public function client(){
        if ($this->user_session["is_admin"]) {
            $this->data["header"] = $this->load->view("header", $this->data, true);
            $this->data["footer"] = $this->load->view("footer", $this->data, true);
        } else {
            $this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
            $this->data["footer"] = $this->load->view("sales/sales_footer", $this->data, true);
        }
        $this->data["status"] = $this->session->userdata("status");
        $this->data["status_msg"] = $this->session->userdata("status_message");
        $this->data["type"] = "Modern Award";
        
        $this->data["charge_rate"] = $this->ur->getChargeRate();
        
        $this->session->unset_userdata("status");
        
        $this->load->view("reports/upcoming_rates_client", $this->data);
    }
}
