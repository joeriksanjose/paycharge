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
		$this->data["title"] = "System - Transactions";
		$this->data["username"] = $this->session->userdata("username");
        $this->data["is_admin"] = $this->user_session["is_admin"];
	}
	
	public function index()
	{	
		$this->data["header"] = $this->load->view("header", $this->data, true);
		$this->data["footer"] = $this->load->view("footer", $this->data, true);
        $this->data["next_award_no"] = $this->md->getNextAwardNo();
		
		$this->data["modern_awards"] = $this->md->getModernAwards();
		
		$this->load->view("transactions/trans_index_view", $this->data);
	}
    
    public function save()
    {
        $post = $this->input->post(null, true);
        
        $modern_award_data = array();
        $print_defaults_data = array();
        $ctr = 0;
        foreach ($post as $key => $val) {
            if ($ctr >= 60) {
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
        
        $this->md->save($modern_award_data);
        $this->pd->save($print_defaults_data);
        
        redirect(base_url("transactions"));
    }
    
    public function update()
    {
        $post = $this->input->post(null, true);
        
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
            if ($ctr >= 60) {
                $print_defaults_data[$key] = $val;
            } else {
                $modern_award_data[$key] = $val;
                $ctr++;   
            }
        }
        
        $print_defaults_data["trans_no"] = $modern_award_data["modern_award_no"];
        unset($modern_award_data["allowance_caption12"]);
        
        $this->md->update($post["modern_award_no"], $modern_award_data);
        $this->pd->update($post["modern_award_no"], $print_defaults_data);
        
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
}
