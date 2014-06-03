<?php

class Payroll_email_address extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library("user_session");
        $this->user_session = $this->user_session->checkUserSession();
    }
    
    public function index()
    {
        if (isset($_POST["btnUpdateEmail"])) {
            $new_email_add = $this->input->post("new_email_add", true);
            $handle = fopen("./public/uploads/email.txt", "w+");
            fwrite($handle, $new_email_add);
            fclose($handle);
        }
        
        $current_email_address = trim(file_get_contents(realpath("./public/uploads/email.txt")));
        $data["username"] = $this->user_session["username"];
        $data["title"] = "System - Payroll Email Address";
        $data["is_admin"] = $this->user_session["is_admin"];
        $data["header"] = $this->load->view("header", $data, true);
        $data["footer"] = $this->load->view("footer", $data, true);
        $data["current_email_address"] = $current_email_address;
        
        $this->load->view("utilities/payroll_email_address_view", $data);
    }
}
?>