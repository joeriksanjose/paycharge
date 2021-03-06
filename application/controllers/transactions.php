<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("tbl_modern_award", "md");
        $this->load->model("tbl_print_defaults", "pd");
		$this->load->library("user_session");
		$this->user_session = $this->user_session->checkUserSession();
        if (!$this->user_session["is_admin"]) {
            redirect("sales");
        }
		$this->data["title"] = "System - Admin";
		$this->data["username"] = $this->session->userdata("username");
        $this->data["is_admin"] = $this->user_session["is_admin"];
	}
	
	public function index()
	{	
		$this->data["header"] = $this->load->view("header", $this->data, true);
		$this->data["footer"] = $this->load->view("footer", $this->data, true);
        $this->data["status"] = $this->session->userdata("status");
        $this->data["status_msg"] = $this->session->userdata("status_message");
        
        $this->data["next_award_no"] = $this->md->getNextAwardNo();
		$this->data["modern_awards"] = $this->md->getModernAwards();
        
        $this->session->unset_userdata("status");
		
		$this->load->view("transactions/trans_index_view", $this->data);
	}
    
    public function save()
    {
        $post = $this->input->post(null, true);
        unset($post["modernAwardNoForEdit"]);

        $modern_award_data = array();
        $print_defaults_data = array();
        $ctr = 0;
        foreach ($post as $key => $val) {
            if ($ctr >= 59) {
                $print_defaults_data[$key] = $val;
            } else {
                $modern_award_data[$key] = $val;
                $ctr++;   
            }
        }
        
        $print_defaults_data["trans_no"] = $modern_award_data["modern_award_no"];
        $print_defaults_data["trans_type"] = "Sales";
        if ($this->session->userdata("is_admin")) {
            $print_defaults_data["trans_type"] = "Admin";
        }
        
        unset($modern_award_data["allowance_caption12"]);
        
        if ($this->md->save($modern_award_data) && $this->pd->save($print_defaults_data)) {
            $this->session->set_userdata("status", 1);
            $this->session->set_userdata("status_message", "Modern award was successfully saved.");
        } else {
            $this->session->set_userdata("status", 0);
            $this->session->set_userdata("status_message", "Error saving modern award.");
        }
        
        redirect(base_url("transactions"));
    }
    
    public function update()
    {
        $post = $this->input->post(null, true);
        $edit_id = $post["modernAwardNoForEdit"];
        unset($post["modernAwardNoForEdit"]);
        
        $modern_award_data = array();
        $print_defaults_data = array(
            "grade1"            => 0,
            "grade2"            => 0,
            "grade3"            => 0,
            "grade4"            => 0,
            "grade5"            => 0,
            "grade6"            => 0,
            "grade7"            => 0,
            "grade8"            => 0,
            "grade9"            => 0,
            "grade10"           => 0,
            "normal"            => 0,
            "early"             => 0,
            "afternoon"         => 0,
            "night"             => 0,
            "50_shift"          => 0,
            "t_14"              => 0,
            "t_12"              => 0,
            "double"            => 0,
            "dt_12"             => 0,
            "triple"            => 0,
            "process"           => 0,
            "p_normal_time"     => 0,
            "p_time_and_half"   => 0,
            "p_double_time"     => 0,
            "p_double_and_half" => 0,
            "p_triple"          => 0,
            "p_day"             => 0,
            "p_early"           => 0,
            "p_afternoon"       => 0,
            "p_night"           => 0,
            "p_half"            => 0,
            "p_t_14"            => 0
        );
        
        $ctr = 0;
        foreach ($post as $key => $val) {
            if ($ctr >= 59) {
                $print_defaults_data[$key] = $val;
            } else {
                $modern_award_data[$key] = $val;
                $ctr++;   
            }
        }
        
        $print_defaults_data["trans_no"] = $modern_award_data["modern_award_no"];
        unset($modern_award_data["allowance_caption12"]);
        
        if (
            $this->md->update($edit_id, $modern_award_data) && 
            $this->pd->update($edit_id, $print_defaults_data)
            ) {
            $this->session->set_userdata("status", 1);
            $this->session->set_userdata("status_message", "Modern award was successfully updated.");
        } else {
            $this->session->set_userdata("status", 0);
            $this->session->set_userdata("status_message", "Error updating modern award.");
        }
        
        redirect(base_url("transactions"));
    }
    
    public function delete()
    {
        $params = array();
        $params["status"] = true;
        $award_no = $this->input->post("del_id", true);
        
        if (!$this->md->delete($award_no)) {
            $params["status"] = false;
            echo json_encode($params);
            return;
        }
        
        if (!$this->pd->delete($award_no)) {
            $params["status"] = false;
            echo json_encode($params);
            return;
        }
        
        echo json_encode($params);
        return;
    }
    
    /* RATE INCREASE */
    
    public function rate_increase_history($modern_award_no)
    {
        $award_info = $this->md->getAwardByAwardNo($modern_award_no);
        
        if (!$award_info) {
            show_404();
        }
        
        $this->data["award_info"] = $award_info;
        $this->data["rate_increase_history"] = $this->md->getRateIncreaseHistory($modern_award_no);
        $this->data["header"] = $this->load->view("header", $this->data, true);
        $this->data["footer"] = $this->load->view("footer", $this->data, true);
        
        $this->load->view("transactions/rate_history_view", $this->data);
    }
    
    public function upcoming_rate_increase($modern_award_no)
    {
        $award_info = $this->md->getAwardByAwardNo($modern_award_no);
        
        if (!$award_info) {
            show_404();
        }
        
        $this->data["award_info"] = $award_info;
        $this->data["upcoming_rate_increase"] = $this->md->getUpcomingRateIncrease($modern_award_no);
        $this->data["header"] = $this->load->view("header", $this->data, true);
        $this->data["footer"] = $this->load->view("footer", $this->data, true);
        $this->data["status"] = $this->session->userdata("status");
        $this->data["status_msg"] = $this->session->userdata("status_msg");
        $this->session->unset_userdata("status");
        $this->session->unset_userdata("status_msg");
        
        $this->load->view("transactions/upcoming_rate_view", $this->data);
    }
    
    public function saveRate()
    {
        $post = $this->input->post(null, true);
        
        // $where = array("trans_no" => $post["trans_no"]);
        // $check_transno = $this->md->checkRateTransno($where);
        $award_no = $post["award_no"];
        
        // if($check_transno==0){
            
            $post["created_at"] = $this->convertToYMD($post["created_at"]);
            
            $company = $this->md->getCompany($post["award_no"]);
            if($company["print_company_no"] == 1){
                $post["company"] = "Labourpower Recruitment Services";  
            } else {
                $post["company"] = "LP Consulting Services";
            }
            
            unset($post["award_no"]);
            unset($post["hid-edit-id"]);
            
            if (!$this->md->saveRate($post)) {
                $this->session->set_userdata("status", 0);
                $this->session->set_userdata("status_msg", "<b>Error! </b> Cannot save new rate.");
            } else {
                $this->session->set_userdata("status", 0);
                $this->session->set_userdata("status_msg", "<b>Done! </b> New rate was successfully saved.");
            }
           
        redirect($_SERVER["HTTP_REFERER"]);
    }
    
    public function updateRate()
    {
        $post = $this->input->post(null, true);
        $id = $post["hid-edit-id"];
        $post["created_at"] = $this->convertToYMD($post["created_at"]);
        
        unset($post["award_no"]);
        unset($post["hid-edit-id"]);
        if (!$this->md->updateRate($id, $post)) {
             $this->data["status"] = 0;
                $this->data["status_msg"] = "<b>Error! </b> Cannot update rate.";
        } else {
            $this->data["status"] = 1;
                $this->data["status_msg"] = "<b>Done! </b> Rate was successfully updated.";
        }
        
        redirect($_SERVER["HTTP_REFERER"]);
    }
    
    public function ajaxDeleteRate()
    {
        $params = array();
        $params["status"] = true;
        $id = $this->input->post("del_id", true);
        
        if (!$this->md->deleteRate($id)) {
            $params["status"] = false;
            echo json_encode($params);
            return;
        }
        
        echo json_encode($params);
        return;
    }
    
    public function ajaxGetRateInfo()
    {
        $params = array();
        $params["status"] = true;
        $id = $this->input->post("edit_id");
        
        $res = $this->md->getRateById($id);
        if (!$res) {
            $params["status"] = false;
            echo json_encode($params);
            return;
        }
        
        $res["created_at"] = date("d/m/Y", strtotime($res["created_at"]));
        
        $params["rate_info"] = $res;
        
        echo json_encode($params);
        return;
    }
    
    /* END RATE INCREASE */
    
    public function getAwardInfo()
    {
        $params = array();
        $params["status"] = true;
        
        $award_no = $this->input->post("award_no", true);
        $award_info = $this->md->getAwardByAwardNo($award_no);
        $prints_info = $this->pd->getPrintsByTransNo($award_no);
        
        if (!$award_info) {
            $params["status"] = false;
            echo json_encode($params);
            return;
        }
        
        if (!$prints_info) {
            $params["status"] = false;
            echo json_encode($params);
            return;
        }
        
        $prints_info["fifty_shift"] = $prints_info["50_shift"];
        $prints_info["doubles"] = $prints_info["double"];
        
        $params["award_info"] = $award_info;
        $params["prints"] = $prints_info;
        echo json_encode($params);
        return;        
    }
    
    public function ajaxGetNextAwardNo()
    {
       $params["next_id"] = $this->md->getNextAwardNo();
       echo json_encode($params);
       return;
    }
    
    public function ajaxSearchAward()
    {
        $params = array();
        $params["is_error"] = false;
        $key = $this->input->post("key", true);
        $result = $this->md->searchAward($key);
        
        if (trim($key) == "%") {
            $result = $this->md->getModernAwards();
        } else {
            $result = $this->md->searchAward($key);    
        }
        
        if (!$result) {
            $params["is_error"] = true;
            echo json_encode($params);
            return;
        }
        
        foreach ($result as $key => $award) {
            $result[$key]["created_at"] = date("d/m/Y", strtotime($award["created_at"]));
        }
        
        echo json_encode($result);
        return;
    }
    
    function checkTransNo(){
        
        $post = $this->input->post(null, true);
        if($this->md->checkTransNo($post)){
            $this->data["status"] = 0;
            $this->data["status_msg"] = "<b>Error! </b> Modern Award number already exists.";
        } else {
            $this->data["status"] = 1;
        }
        
        echo json_encode($this->data);  
    }
    
    function checkRateTransNo(){
        
        $post = $this->input->post(null, true);
        if($this->md->checkRateTransno($post)){
            $this->data["status"] = 0;
            $this->data["status_msg"] = "<b>Error! </b> Transaction number already exists.";
        } else {
            $this->data["status"] = 1;
        }
        
        echo json_encode($this->data);  
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
