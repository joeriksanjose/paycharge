<?php 

class Business_company extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model("tbl_system_setup", "setup");
		$config["upload_path"] = "./public/uploads/";
		$config["allowed_types"] = "png|jpg";
		
		$this->load->library("upload", $config);
		$this->load->library("user_session");
	    $this->user_session = $this->user_session->checkUserSession();
		
	}
	
	public function company1(){
		
	    $data["username"] = $this->user_session["username"];
        $data["title"] = "System - Business Info";
        $data["is_admin"] = $this->user_session["is_admin"];
        $data["error"] = false;
        $data["ok"] = false;
        if($this->session->userdata("error")){
            $data["error"] = true;
        }
        if($this->session->userdata("ok")){
            $data["ok"] = true;
        }
        $this->session->unset_userdata("error");
        $this->session->unset_userdata("ok");
        $data["header"] = $this->load->view("header", $data, true);
        $data["footer"] = $this->load->view("footer", $data, true);
        $data["is_admin"] = $this->user_session["is_admin"];
        
        $data["data"] = $this->setup->select_company1();
        
		$this->load->view("utilities/business_info1_view", $data);
        
	}
	
	public function upload1()
	{
			$data = $this->input->post(null, true);
		foreach ($_FILES as $key => $value) {
			if (!empty($key['name'])) {
				if (!$this->upload->do_upload($key)) {
				} else {
					$file = $this->upload->data();
					$data["pdf"] = $_FILES["pdf"]["name"];
					$data["logo"] = $_FILES["logo"]["name"];
				}
			}
		}
		
		
		
		unset($data["btnSubmit"]);
		$sql = $this->setup->update_company1($data);        
        if ($sql) {
            $this->session->set_userdata("ok", "ok");
        } else {
            $this->session->set_userdata("error", "error");
        }
        
		redirect("utilities/business-company/company-1");
	}
	
	public function company2(){
		
	    $data["username"] = $this->user_session["username"];
        $data["is_admin"] = $this->user_session["is_admin"];
        $data["title"] = "System - Business Info";
        $data["error"] = false;
        $data["ok"] = false;
        if($this->session->userdata("error")){
            $data["error"] = true;
        }
        if($this->session->userdata("ok")){
            $data["ok"] = true;
        }
        $this->session->unset_userdata("error");
        $this->session->unset_userdata("ok");
        $data["header"] = $this->load->view("header", $data, true);
        $data["footer"] = $this->load->view("footer", $data, true);
        
        $data["data"] = $this->setup->select_company2();
        
		$this->load->view("utilities/business_info_view2", $data);
        
	}
	
	public function upload2()
	{
		$data = $this->input->post(null, true);
		foreach ($_FILES as $key => $value) {
			if (!empty($key['name'])) {
				if (!$this->upload->do_upload($key)) {
				} else {
					$file = $this->upload->data();
					$data["pdf"] = $_FILES["pdf"]["name"];
					$data["logo"] = $_FILES["logo"]["name"];
				}
			}
		}
		
		unset($data["btnSubmit"]);
		$sql = $this->setup->update_company2($data);        
        if ($sql) {
            $this->session->set_userdata("ok", "ok");
        } else {
            $this->session->set_userdata("error", "error");
        }
        
		redirect("utilities/business-company/company-2");
	}
}
?>