<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_transaction extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("tbl_sales_modern_award", "smd");
        $this->load->model("tbl_print_defaults", "pd");
		$this->load->library("user_session");
		$this->user_session = $this->user_session->checkUserSession();
		$this->data["title"] = "System - Transactions";
		$this->data["username"] = $this->session->userdata("username");
        $this->data["is_admin"] = $this->user_session["is_admin"];
	}
	
	public function get_modern_info(){
			
		$where = $this->input->post(null, true);
		$params = $this->smd->get_modern_info($where);
		
		echo json_encode($params);
	}
	
	public function get_company_info(){
			
		$where = $this->input->post(null, true);
		$params["company_info"] = $this->smd->get_company_info($where);
		
		$state_no = $params["company_info"]["state_no"];
		$params["work_cover"] = $this->smd->getWorkcover($state_no);
		
		$params["tax"] = $this->smd->getTax($state_no);
		
		echo json_encode($params);
	}
	
	public function get_workcover_info(){
			
		$where = $this->input->post(null, true);
		$params = $this->smd->get_workcover_info($where);
		
		echo json_encode($params);
	}
	
	public function get_effective_date(){
		$where = $this->input->post(null, true);
		$sql = $this->smd->get_effective_date($where);
		
		echo json_encode($sql);
	}
	
	public function index()
	{	
		$this->data["header"] = $this->load->view("header", $this->data, true);
		$this->data["footer"] = $this->load->view("footer", $this->data, true);
        
		$this->data["modern_awards"] = $this->smd->getModernAwards();
		$this->data["company"] = $this->smd->getCompany();
		$this->data["super"] = $this->smd->getSuper();
		// $this->data["workcover"] = $this->smd->getWorkcover();
		$this->data["public_liability"] = $this->smd->getPublicLiability();
		$this->data["insurance"] = $this->smd->getInsurance();
		$this->data["long_service"] = $this->smd->getLongService();
		$this->data["admin"] = $this->smd->getAdmin();
		$this->data["position"] = $this->smd->getPosition();
		
		$this->load->view("sales/transaction_view", $this->data);
	}
    
	public function getTransNo(){
		$sql=$this->smd->getTransNo();
		
		echo json_encode($sql);
	}
    public function save()
    {
        $post = $this->input->post(null, true);
        
        // $modern_award_data = array();
        // $print_defaults_data = array();
        // $ctr = 0;
        // foreach ($post as $key => $val) {
            // if ($ctr >= 60) {
                // $print_defaults_data[$key] = $val;
            // } else {
                // $modern_award_data[$key] = $val;
                // $ctr++;   
            // }
        // }
        $this->db->trans_begin();
        for ($i = 1; $i <= 10; $i++) {
        	$trans_no = $post["trans_no"];
			$grade = "Grade ".$i;
			$position_name = $this->smd->getPositionNameById($post["position_no".$i]);
			$grade_and_pos = "Grade ".$i." - ".$position_name;
			$position_no = $post["position_no".$i];
        	$payrate = $post["payrate_".$i];
			$base_rate = $post["base_rate".$i];
			$casual_rate = $post["casual_rate".$i];
			
			$data = array(
				"trans_no"           => $trans_no,
				"grade"              => $grade,
				"grade_and_position" => $grade_and_pos,
				"position_no"        => $position_no,
				"payrate"            => $payrate,
				"base_rate"          => $base_rate,
				"casual_rate"        => $casual_rate
			);

			$this->smd->savePayRate($data);
			unset($post["position_no".$i]);
			unset($post["payrate_".$i]);
			unset($post["base_rate".$i]);
			unset($post["casual_rate".$i]);
        }
        
		
        unset($post["allowance_caption12"]);
        
        $this->smd->save($post);
		
		if ($this->db->trans_status() === false) {
			log_message("Transaction failed (tbl_charge_rate, tbl_payrate)");
    		$this->db->trans_rollback();
		} else {
    		$this->db->trans_commit();
		}
    }
}
