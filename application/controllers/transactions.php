<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("tbl_modern_award", "md");
        $this->load->model("tbl_print_defaults", "pd");
		$this->load->library("user_session");
		$this->user_session->checkUserSession();
		$this->data["title"] = "System - Transactions";
		$this->data["username"] = $this->session->userdata("username");
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
        
        unset($modern_award_data["allowance_caption12"]);
        
        $this->md->save($modern_award_data);
        $this->pd->save($print_defaults_data);
    }
}
