<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_transaction extends CI_Controller
{
    private $ml_description = array(
            "Full Hourly Pay Rate",
            "Casual Loading",
            "Shift Loading",
            "TOTAL CASUAL HOURLY PAY",
            "Superannuation:",
            "Workcover (% on super total)",
            "Public Liability (% on pay rate)",
            "Payroll Tax (% on super total)",
            "Insurace",
            //"Long Service",
            "Administration (% on super total)",
            "TOTAL WITH PAY + ONCOSTS:",
            "$ Margin",
            "% Margin",
            "Labourpower Hourly Charge Rates"
        );
    
	function __construct()
	{
		parent::__construct();
		$this->load->model("tbl_sales_modern_award", "smd");
        $this->load->model("tbl_user_model", "user");
        $this->load->model("tbl_print_defaults", "pd");
        $this->load->model("tbl_m_allow", "ma");
        $this->load->model("sales/tbl_sales_trans", "st");
		$this->load->library("user_session");
		$this->user_session = $this->user_session->checkUserSession();
		$this->data["title"] = "Sales - Modern Award";
		$this->data["username"] = $this->session->userdata("username");
        $this->data["is_admin"] = $this->user_session["is_admin"];
        $this->user_data = $this->user->getUserById($this->user_session["user_id"]);
	}
    
    public function getAwardInfo(){
        $post = $this->input->post(null, true);
        
        $params["charge_rate"] = $this->smd->get_charge_rate_info($post);
        $params["charge_rate"]["date_of_quotation"] = date("d/m/Y", strtotime($params["charge_rate"]["date_of_quotation"]));
        $params["payrate"] = $this->smd->get_payrate_info($post);
        $params["status"] = true;
        
        echo json_encode($params);
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
		$this->data["header"] = $this->load->view("sales/sales_header", $this->data, true);
		$this->data["footer"] = $this->load->view("sales/sales_footer", $this->data, true);
		$state_no = $this->user_data["state_no"];
        
        $this->data["status"] = $this->session->userdata("status");
        $this->data["status_msg"] = $this->session->userdata("status_msg");
        
		$this->data["modern_awards_sales"] = $this->smd->getSalesModernAwards($state_no);
        $this->data["modern_awards"] = $this->smd->getModernAwards();
		$this->data["company"] = $this->smd->getCompany($state_no);
		$this->data["super"] = $this->smd->getSuper();
		$this->data["public_liability"] = $this->smd->getPublicLiability();
		$this->data["insurance"] = $this->smd->getInsurance();
		$this->data["long_service"] = $this->smd->getLongService();
		$this->data["admin"] = $this->smd->getAdmin();
		$this->data["position"] = $this->smd->getPosition();
        
        $this->session->unset_userdata("status");
        $this->session->unset_userdata("status_msg");
		
		$this->load->view("sales/transaction_view", $this->data);
	}
	
	public function ajaxSearchSalesAward()
	{
	    $params = array();
	    $params["status"] = true;
	    $key = $this->input->post("key", true);
        
        $res = $this->smd->searchSalesModernAward($key);
        
        if (!$res) {
            $params["status"] = false;
            echo json_encode($params);
            return;
        }
        
        $params["award_info"] = $res;
        echo json_encode($params);
        return;
	}
	
	public function deleteSalesModern()
    {
        $params = array();
        $params["status"] = true;
        $award_no = $this->input->post("award_no");
        if (!$this->smd->deleteSalesModernAward($award_no)) {
            $params["status"] = false;
            echo json_encode($params);
            return;
        }
        
        echo json_encode($params);
        return;
    }
    
    public function processSalesModern()
    {
        $post = $this->input->post(null, true);
        $params["status"] = true;
        if (!$this->smd->processSalesModern($post)) {
            $params["status"] = false;
            echo json_encode($params);
            return;
        }
        
        $params["awards"] = $this->st->getTransaction($post["company_no"]);
        
        echo json_encode($params);
        return;
    }
    
	public function getTransNo(){
		$sql = $this->smd->getTransNo();
		
		echo json_encode($sql);
	}
    
    public function save()
    {
        $post = $this->input->post(null, true);
        
        $this->db->trans_begin();
        if (!isset($post["swi_peror_cur"])) {
            $post["swi_peror_cur"] = 0;
        }
        
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
            
            $ml_cacl_1 = $this->computeML($post, $i, 1);
            $ml_cacl_2 = $this->computeML($post, $i, 2);
            $ml_cacl_3 = $this->computeML($post, $i, 3);
            
            foreach ($ml_cacl_1 as $key => $row) {
                $this->smd->saveTblMl($i, $row);
                $this->smd->saveTblMl($i, $ml_cacl_2[$key]);
                $this->smd->saveTblMl($i, $ml_cacl_3[$key]);
            } 

			$this->smd->savePayRate($data);
			unset($post["position_no".$i]);
			unset($post["payrate_".$i]);
			unset($post["base_rate".$i]);
			unset($post["casual_rate".$i]);
        }
        
        //save m_allow
        $m_allow = $this->computeMAllow($post);
        foreach ($m_allow as $val) {
            $this->ma->saveMAllow($val);
        }      
		
        unset($post["allowance_caption12"]);
        $post["trans_type"] = 1;
        $award_info = $this->smd->get_modern_info(array("modern_award_no" => $post["modern_award_no"]));
        $post["transaction_name"] = $award_info["modern_award_name"];
        $post["date_of_quotation"] = $this->convertToYMD($post["date_of_quotation"]);
        
        $this->smd->save($post);
		
		if ($this->db->trans_status() === false) {
			log_message("Transaction failed (tbl_charge_rate, tpsbl_payrate)");
    		$this->db->trans_rollback();
            $this->session->set_userdata("status", 0);
            $this->session->set_userdata("status_msg", "<b>Error!</b> Cannot create new modern award");
		} else {
    		$this->db->trans_commit();
            $this->session->set_userdata("status", 1);
            $this->session->set_userdata("status_msg", "<b>Done!</b> Modern Award successfully saved");
		}
        
        redirect($_SERVER["HTTP_REFERER"]);
    }

    public function saveAndProcess()
    {
        $_POST["swi_process"] = 1;
        $this->save();
    }

    public function update()
    {
        $post = $this->input->post(null, true);
        $this->db->trans_begin();
        $this->smd->deleteSalesModernAward2($post["trans_no"]);
        
        if (!isset($post["swi_peror_cur"])) {
            $post["swi_peror_cur"] = 0;
        }
        
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
            
            $ml_cacl_1 = $this->computeML($post, $i, 1);
            $ml_cacl_2 = $this->computeML($post, $i, 2);
            $ml_cacl_3 = $this->computeML($post, $i, 3);
            
            foreach ($ml_cacl_1 as $key => $row) {
                $this->smd->saveTblMl($i, $row);
                $this->smd->saveTblMl($i, $ml_cacl_2[$key]);
                $this->smd->saveTblMl($i, $ml_cacl_3[$key]);
            } 

            $this->smd->savePayRate($data);
            unset($post["position_no".$i]);
            unset($post["payrate_".$i]);
            unset($post["base_rate".$i]);
            unset($post["casual_rate".$i]);
        }
        
        //update m_allow
        $this->ma->deleteMAllowByTransNo($trans_no);
        $m_allow = $this->computeMAllow($post);
        foreach ($m_allow as $val) {
            $this->ma->saveMAllow($val);
        }
        
        unset($post["allowance_caption12"]);
        $post["trans_type"] = 1;
        $award_info = $this->smd->get_modern_info(array("modern_award_no" => $post["modern_award_no"]));
        $post["transaction_name"] = $award_info["modern_award_name"];
        $post["date_of_quotation"] = $this->convertToYMD($post["date_of_quotation"]);
        
        $this->smd->update($post["trans_no"], $post);
        
        if ($this->db->trans_status() === false) {
            log_message("Transaction failed (tbl_charge_rate, tpsbl_payrate)");
            $this->db->trans_rollback();
            $this->session->set_userdata("status", 0);
            $this->session->set_userdata("status_msg", "<b>Error!</b> Cannot create new modern award");
        } else {
            $this->db->trans_commit();
            $this->session->set_userdata("status", 1);
            $this->session->set_userdata("status_msg", "<b>Done!</b> Modern Award successfully updated");
        }
        
        redirect($_SERVER["HTTP_REFERER"]);
    }

    public function updateAndProcess()
    {
        $_POST["swi_process"] = 1;
        $this->update();
    }
    
    private function computeML($post, $index, $calc) 
    {
        $full_time = $this->computeFullHourlyPayRate($post, $index, $calc);
        $casual = $this->computeCasualLoading($post, $index, $calc);
        $shift = $this->computeShiftLoading($full_time, $casual, $post, $index, $calc);
        $total_casual = $this->computeTotalCasualHourlyPay($full_time, $casual, $shift, $post, $index, $calc);
        $super = $this->computeSuperAnnuation($total_casual, $post, $index, $calc);
        $work_cover = $this->computeWorkCover($total_casual, $super, $post, $index, $calc);
        $public = $this->computePublicLiability($total_casual, $super, $post, $index, $calc);
        $payroll_tax = $this->computePayrollTax($total_casual, $super, $post, $index, $calc);
        $insurance = $this->computeInsurance($post, $calc);
        $admin = $this->computeAdmin($total_casual, $super, $post, $index, $calc);
        $total_with_pay = $this->computeTotalWithPay($total_casual, $super, $work_cover, $public, $payroll_tax, $insurance, $admin, $post, $index, $calc);
        $hourly_charge_rate = $this->computeHourlyChargeRates($total_with_pay, $post, $index, $calc);
        $dollar_margin = $this->computeDollarMargin($hourly_charge_rate, $total_with_pay, $post, $index, $calc);
        $percent_margin = $this->computePercentMargin($hourly_charge_rate, $post, $index, $calc);
        
        return array(
            $full_time,
            $casual,
            $shift,
            $total_casual,
            $super,
            $work_cover,
            $public,
            $payroll_tax,
            $insurance,
            $admin,
            $total_with_pay,
            $dollar_margin,
            $percent_margin,
            $hourly_charge_rate
        );
    }
    
    private function computeFullHourlyPayRate($post, $index, $calc)
    {
        switch ($calc) {
            case 1:
            case 2:
            case 3:
                $description = $this->ml_description[0];
                $normal = $post["base_rate".$index];
                $early = $post["base_rate".$index];
                $afternoon = $post["base_rate".$index];
                $night = $post["base_rate".$index];
                $fifty_shift = $post["base_rate".$index];
                $t_14 = $post["base_rate".$index];
                $t_12 = $post["base_rate".$index];
                $double = $post["base_rate".$index];
                $dt_12 = $post["base_rate".$index];
                $triple = $post["base_rate".$index];
                break;                  
        }
        
        return array(
            "trans_no"    => $post["trans_no"],
            "description" => $description,
            "normal"      => $normal,
            "early"       => $early,
            "afternoon"   => $afternoon,
            "night"       => $night,
            "50%Shift"    => $fifty_shift,
            "T1/4"        => $t_14,
            "T1/2"        => $t_12,
            "double"      => $double,
            "DT1/2"       => $dt_12,
            "triple"      => $triple,
            "calc_no"     => $calc,
            "cell_no"     => 0
        );
    }

    private function computeCasualLoading($post, $index, $calc)
    {
        $description = $this->ml_description[1];
        switch ($calc) {
            case 1:
            case 2:
                $normal = $post["base_rate".$index] * ($post["B_27"]/100);
                $early = $post["base_rate".$index] * ($post["B_27"]/100);
                $afternoon = $post["base_rate".$index] * ($post["B_27"]/100);
                $night = $post["base_rate".$index] * ($post["B_27"]/100);
                $fifty_shift = $post["base_rate".$index] * ($post["B_27"]/100);
                $t_14 = $post["base_rate".$index] * ($post["B_28"]/100);
                $t_12 = $post["base_rate".$index] * ($post["B_28"]/100);
                $double = $post["base_rate".$index] * ($post["B_28"]/100);
                $dt_12 = $post["base_rate".$index] * ($post["B_28"]/100);
                $triple = $post["base_rate".$index] * ($post["B_28"]/100);
                break;
            case 3:
                $normal = $post["base_rate".$index] * ($post["B_27"]/100);
                $early = $post["base_rate".$index] * ($post["B_27"]/100);
                $afternoon = $post["base_rate".$index] * ($post["B_27"]/100);
                $night = $post["base_rate".$index] * ($post["B_27"]/100);
                $fifty_shift = $post["base_rate".$index] * ($post["B_27"]/100);
                $t_14 = 0;
                $t_12 = 0;
                $double = 0;
                $dt_12 = 0;
                $triple = 0;
                break;             
        }
        
        return array(
            "trans_no"    => $post["trans_no"],
            "description" => $description,
            "normal"      => $normal,
            "early"       => $early,
            "afternoon"   => $afternoon,
            "night"       => $night,
            "50%Shift"    => $fifty_shift,
            "T1/4"        => $t_14,
            "T1/2"        => $t_12,
            "double"      => $double,
            "DT1/2"       => $dt_12,
            "triple"      => $triple,
            "cell_no"     => 1,
            "calc_no"     => $calc
        );
    }
    
    private function computeShiftLoading($full_time, $casual, $post, $index, $calc)
    {
        $description = $this->ml_description[2];
        switch ($calc) {
            case 1:
            case 3:
                $normal = 0;
                $total_normal = $full_time["normal"] + $casual["normal"];
                $early = $total_normal * ($post["B_31"]/100);
                $afternoon = $total_normal * ($post["B_33"]/100);
                $night = $total_normal * ($post["B_35"]/100);
                $fifty_shift = $total_normal * ($post["B_37"]/100);
                $t_14 = 0;
                $t_12 = 0;
                $double = 0;
                $dt_12 = 0;
                $triple = 0;
                break;
            case 2:
                $normal = 0;
                $early = $post["base_rate".$index] * ($post["B_31"]/100);
                $afternoon = $post["base_rate".$index] * ($post["B_33"]/100);
                $night = $post["base_rate".$index] * ($post["B_35"]/100);
                $fifty_shift = $post["base_rate".$index] * ($post["B_37"]/100);
                $t_14 = 0;
                $t_12 = 0;
                $double = 0;
                $dt_12 = 0;
                $triple = 0;      
        }
        
        return array(
            "trans_no"    => $post["trans_no"],
            "description" => $description,
            "normal"      => $normal,
            "early"       => $early,
            "afternoon"   => $afternoon,
            "night"       => $night,
            "50%Shift"    => $fifty_shift,
            "T1/4"        => $t_14,
            "T1/2"        => $t_12,
            "double"      => $double,
            "DT1/2"       => $dt_12,
            "triple"      => $triple,
            "calc_no"     => $calc,
            "cell_no"     => 2
        );
    }
    
    private function computeTotalCasualHourlyPay($full_time, $casual, $shift, $post, $index, $calc)
    {
        switch ($calc) {
            case 1:
                $description = $this->ml_description[3];
                $normal = $full_time["normal"] + $casual["normal"] + $shift["normal"];
                $early = $full_time["early"] + $casual["early"] + $shift["early"];
                $afternoon = $full_time["afternoon"] + $casual["afternoon"] + $shift["afternoon"];
                $night = $full_time["night"] + $casual["night"] + $shift["night"];
                $fifty_shift = $full_time["50%Shift"] + $casual["50%Shift"] + $shift["50%Shift"];
                $t_14 = ($full_time["T1/4"] + $casual["T1/4"]) * 1.25;
                $t_12 = ($full_time["T1/2"] + $casual["T1/2"]) * 1.5;
                $double = ($full_time["double"] + $casual["double"]) * 2;
                $dt_12 = ($full_time["DT1/2"] + $casual["DT1/2"]) * 2.5;
                $triple = ($full_time["triple"] + $casual["triple"]) * 3;
                break;
            case 2:
                $description = $this->ml_description[3];
                $normal = $full_time["normal"] + $casual["normal"] + $shift["normal"];
                $early = $full_time["early"] + $casual["early"] + $shift["early"];
                $afternoon = $full_time["afternoon"] + $casual["afternoon"] + $shift["afternoon"];
                $night = $full_time["night"] + $casual["night"] + $shift["night"];
                $fifty_shift = $full_time["50%Shift"] + $casual["50%Shift"] + $shift["50%Shift"];
                $t_14 = ($full_time["T1/4"] * 1.25) + $casual["T1/4"] ;
                $t_12 = ($full_time["T1/2"] * 1.5) + $casual["T1/2"];
                $double = ($full_time["double"] * 2) + $casual["double"];
                $dt_12 = ($full_time["DT1/2"] * 2.5) + $casual["DT1/2"];
                $triple = ($full_time["triple"] * 3) + $casual["triple"];
                break;
            case 3:
                $description = $this->ml_description[3];
                $normal = $full_time["normal"] + $casual["normal"] + $shift["normal"];
                $early = $full_time["early"] + $casual["early"] + $shift["early"];
                $afternoon = $full_time["afternoon"] + $casual["afternoon"] + $shift["afternoon"];
                $night = $full_time["night"] + $casual["night"] + $shift["night"];
                $fifty_shift = $full_time["50%Shift"] + $casual["50%Shift"] + $shift["50%Shift"];
                $t_14 = $full_time["T1/4"] * 1.5;
                $t_12 = $full_time["T1/2"] * 1.75;
                $double = $full_time["double"] * 2.25;
                $dt_12 = $full_time["DT1/2"] * 2.75;
                $triple = $full_time["triple"] * 3.25;
                break;                               
        }
        
        return array(
            "trans_no"      => $post["trans_no"],
            "description"   => $description,
            "normal"        => $normal,
            "early"         => $early,
            "afternoon"     => $afternoon,
            "night"         => $night,
            "50%Shift"      => $fifty_shift,
            "T1/4"          => $t_14,
            "T1/2"          => $t_12,
            "double"        => $double,
            "DT1/2"         => $dt_12,
            "triple"        => $triple,
            "calc_no"       => $calc,
            "cell_no"       => 3
        );
    }

    private function computeSuperAnnuation($total_hourly_pay, $post, $index, $calc)
    {
        switch ($calc) {
            case 1:
            case 2:
            case 3:
                $description = $this->ml_description[4];
                $normal = $total_hourly_pay["normal"] * ($post["B_14"]/100);
                $early = $total_hourly_pay["early"] * ($post["B_14"]/100);
                $afternoon = $total_hourly_pay["afternoon"] * ($post["B_14"]/100);
                $night = $total_hourly_pay["night"] * ($post["B_14"]/100);
                $fifty_shift = $total_hourly_pay["50%Shift"] * ($post["B_14"]/100);
                $t_14 = 0;
                $t_12 = 0;
                $double = 0;
                $dt_12 = 0;
                $triple = 0;
                break;                  
        }
        
        return array(
            "trans_no"      => $post["trans_no"],
            "description"   => $description,
            "normal"        => $normal,
            "early"         => $early,
            "afternoon"     => $afternoon,
            "night"         => $night,
            "50%Shift"      => $fifty_shift,
            "T1/4"          => $t_14,
            "T1/2"          => $t_12,
            "double"        => $double,
            "DT1/2"         => $dt_12,
            "triple"        => $triple,
            "calc_no"       => $calc,
            "cell_no"       => 4
        );
    }

    private function computeWorkCover($total_hourly_pay, $super, $post, $index, $calc)
    {
         switch ($calc) {
            case 1:
            case 2:
            case 3:
                $description = $this->ml_description[5];
                $normal = ($total_hourly_pay["normal"] + $super["normal"]) * ($post["B_15"]/100);
                $early = ($total_hourly_pay["early"] + $super["early"]) * ($post["B_15"]/100);
                $afternoon = ($total_hourly_pay["afternoon"] + $super["afternoon"]) * ($post["B_15"]/100);
                $night = ($total_hourly_pay["night"] + $super["night"]) * ($post["B_15"]/100);
                $fifty_shift = ($total_hourly_pay["50%Shift"] + $super["50%Shift"]) * ($post["B_15"]/100);
                $t_14 = $total_hourly_pay["T1/4"] * ($post["B_15"]/100);
                $t_12 = $total_hourly_pay["T1/2"] * ($post["B_15"]/100);
                $double = $total_hourly_pay["double"] * ($post["B_15"]/100);
                $dt_12 = $total_hourly_pay["DT1/2"] * ($post["B_15"]/100);
                $triple = $total_hourly_pay["triple"] * ($post["B_15"]/100);
                break;                  
        }
        
        return array(
            "trans_no"      => $post["trans_no"],
            "description"   => $description,
            "normal"        => $normal,
            "early"         => $early,
            "afternoon"     => $afternoon,
            "night"         => $night,
            "50%Shift"      => $fifty_shift,
            "T1/4"          => $t_14,
            "T1/2"          => $t_12,
            "double"        => $double,
            "DT1/2"         => $dt_12,
            "triple"        => $triple,
            "calc_no"       => $calc,
            "cell_no"       => 5
        );
    }

    private function computePublicLiability($total_hourly_pay, $super, $post, $index, $calc)
    {
        switch ($calc) {
            case 1:
            case 2:
            case 3:
                $description = $this->ml_description[6];
                $normal = ($total_hourly_pay["normal"] + $super["normal"]) * ($post["B_20"]/100);
                $early = ($total_hourly_pay["early"] + $super["early"]) * ($post["B_20"]/100);
                $afternoon = ($total_hourly_pay["afternoon"] + $super["afternoon"]) * ($post["B_20"]/100);
                $night = ($total_hourly_pay["night"] + $super["night"]) * ($post["B_20"]/100);
                $fifty_shift = ($total_hourly_pay["50%Shift"] + $super["50%Shift"]) * ($post["B_20"]/100);
                $t_14 = $total_hourly_pay["T1/4"] * ($post["B_20"]/100);
                $t_12 = $total_hourly_pay["T1/2"] * ($post["B_20"]/100);
                $double = $total_hourly_pay["double"] * ($post["B_20"]/100);
                $dt_12 = $total_hourly_pay["DT1/2"] * ($post["B_20"]/100);
                $triple = $total_hourly_pay["triple"] * ($post["B_20"]/100);
                break;                  
        }
        
        return array(
            "trans_no"      => $post["trans_no"],
            "description"   => $description,
            "normal"        => $normal,
            "early"         => $early,
            "afternoon"     => $afternoon,
            "night"         => $night,
            "50%Shift"      => $fifty_shift,
            "T1/4"          => $t_14,
            "T1/2"          => $t_12,
            "double"        => $double,
            "DT1/2"         => $dt_12,
            "triple"        => $triple,
            "calc_no"       => $calc,
            "cell_no"       => 6
        );
    }

    private function computePayrollTax($total_hourly_pay, $super, $post, $index, $calc)
    {
        switch ($calc) {
            case 1:
            case 2:
            case 3:
                $description = $this->ml_description[7];
                $normal = ($total_hourly_pay["normal"] + $super["normal"]) * ($post["B_19"]/100);
                $early = ($total_hourly_pay["early"] + $super["early"]) * ($post["B_19"]/100);
                $afternoon = ($total_hourly_pay["afternoon"] + $super["afternoon"]) * ($post["B_19"]/100);
                $night = ($total_hourly_pay["night"] + $super["night"]) * ($post["B_19"]/100);
                $fifty_shift = ($total_hourly_pay["50%Shift"] + $super["50%Shift"]) * ($post["B_19"]/100);
                $t_14 = $total_hourly_pay["T1/4"] * ($post["B_19"]/100);
                $t_12 = $total_hourly_pay["T1/2"] * ($post["B_19"]/100);
                $double = $total_hourly_pay["double"] * ($post["B_19"]/100);
                $dt_12 = $total_hourly_pay["DT1/2"] * ($post["B_19"]/100);
                $triple = $total_hourly_pay["triple"] * ($post["B_19"]/100);
                break;                  
        }
        
        return array(
            "trans_no"      => $post["trans_no"],
            "description"   => $description,
            "normal"        => $normal,
            "early"         => $early,
            "afternoon"     => $afternoon,
            "night"         => $night,
            "50%Shift"      => $fifty_shift,
            "T1/4"          => $t_14,
            "T1/2"          => $t_12,
            "double"        => $double,
            "DT1/2"         => $dt_12,
            "triple"        => $triple,
            "calc_no"       => $calc,
            "cell_no"       => 7
        );
    }

    private function computeInsurance($post, $calc)
    { 
        return array(
            "trans_no"      => $post["trans_no"],
            "description"   => $this->ml_description[8],
            "normal"        => $post["B_21"],
            "early"         => $post["B_21"],
            "afternoon"     => $post["B_21"],
            "night"         => $post["B_21"],
            "50%Shift"      => $post["B_21"],
            "T1/4"          => $post["B_21"],
            "T1/2"          => $post["B_21"],
            "double"        => $post["B_21"],
            "DT1/2"         => $post["B_21"],
            "triple"        => $post["B_21"],
            "calc_no"       => $calc,
            "cell_no"       => 8
        );
    }
    
    private function computeAdmin($total_hourly_pay, $super, $post, $index, $calc)
    {
        switch ($calc) {
            case 1:
            case 2:
            case 3:
                $description = $this->ml_description[9];
                $normal = ($total_hourly_pay["normal"] + $super["normal"]) * ($post["B_22"]/100);
                $early = ($total_hourly_pay["early"] + $super["early"]) * ($post["B_22"]/100);
                $afternoon = ($total_hourly_pay["afternoon"] + $super["afternoon"]) * ($post["B_22"]/100);
                $night = ($total_hourly_pay["night"] + $super["night"]) * ($post["B_22"]/100);
                $fifty_shift = ($total_hourly_pay["50%Shift"] + $super["50%Shift"]) * ($post["B_22"]/100);
                $t_14 = $total_hourly_pay["T1/4"] * ($post["B_22"]/100);
                $t_12 = $total_hourly_pay["T1/2"] * ($post["B_22"]/100);
                $double = $total_hourly_pay["double"] * ($post["B_22"]/100);
                $dt_12 = $total_hourly_pay["DT1/2"] * ($post["B_22"]/100);
                $triple = $total_hourly_pay["triple"] * ($post["B_22"]/100);
                break;                  
        }
        
        return array(
            "trans_no"      => $post["trans_no"],
            "description"   => $description,
            "normal"        => $normal,
            "early"         => $early,
            "afternoon"     => $afternoon,
            "night"         => $night,
            "50%Shift"      => $fifty_shift,
            "T1/4"          => $t_14,
            "T1/2"          => $t_12,
            "double"        => $double,
            "DT1/2"         => $dt_12,
            "triple"        => $triple,
            "calc_no"       => $calc,
            "cell_no"       => 9
        );
    }

    private function computeTotalWithPay(
        $total_hourly_pay, 
        $super, 
        $work_cover, 
        $public_liability, 
        $payroll_tax,
        $insurance,
        $admin,
        $post,
        $index,
        $calc
    ) {        
        switch ($calc) {
            case 1:
            case 2:
            case 3:
                $description = $this->ml_description[10];
                $normal = $total_hourly_pay["normal"] + $super["normal"] + $work_cover["normal"] + $public_liability["normal"] + $payroll_tax["normal"] + $insurance["normal"] + $admin["normal"];
                $early = $total_hourly_pay["early"] + $super["early"] + $work_cover["early"] + $public_liability["early"] + $payroll_tax["early"] + $insurance["early"] + $admin["early"];
                $afternoon = $total_hourly_pay["afternoon"] + $super["afternoon"] + $work_cover["afternoon"] + $public_liability["afternoon"] + $payroll_tax["afternoon"] + $insurance["afternoon"] + $admin["afternoon"];
                $night = $total_hourly_pay["night"] + $super["night"] + $work_cover["night"] + $public_liability["night"] + $payroll_tax["night"] + $insurance["night"] + $admin["night"];
                $fifty_shift = $total_hourly_pay["50%Shift"] + $super["50%Shift"] + $work_cover["50%Shift"] + $public_liability["50%Shift"] + $payroll_tax["50%Shift"] + $insurance["50%Shift"] + $admin["50%Shift"];
                $t_14 = $total_hourly_pay["T1/4"] + $super["T1/4"] + $work_cover["T1/4"] + $public_liability["T1/4"] + $payroll_tax["T1/4"] + $insurance["T1/4"] + $admin["T1/4"];
                $t_12 = $total_hourly_pay["T1/2"] + $super["T1/2"] + $work_cover["T1/2"] + $public_liability["T1/2"] + $payroll_tax["T1/2"] + $insurance["T1/2"] + $admin["T1/2"];
                $double = $total_hourly_pay["double"] + $super["double"] + $work_cover["double"] + $public_liability["double"] + $payroll_tax["double"] + $insurance["double"] + $admin["double"];
                $dt_12 = $total_hourly_pay["DT1/2"] + $super["DT1/2"] + $work_cover["DT1/2"] + $public_liability["DT1/2"] + $payroll_tax["DT1/2"] + $insurance["DT1/2"] + $admin["DT1/2"];
                $triple = $total_hourly_pay["triple"] + $super["triple"] + $work_cover["triple"] + $public_liability["triple"] + $payroll_tax["triple"] + $insurance["triple"] + $admin["triple"];
                break;                  
        }
        
        return array(
            "trans_no"      => $post["trans_no"],
            "description"   => $description,
            "normal"        => $normal,
            "early"         => $early,
            "afternoon"     => $afternoon,
            "night"         => $night,
            "50%Shift"      => $fifty_shift,
            "T1/4"          => $t_14,
            "T1/2"          => $t_12,
            "double"        => $double,
            "DT1/2"         => $dt_12,
            "triple"        => $triple,
            "calc_no"       => $calc,
            "cell_no"       => 10
        );
    }

    private function computeHourlyChargeRates($total_with_pay, $post, $index, $calc)
    {
        $description = $this->ml_description[13];
        if ($post["swi_peror_cur"] == "0") {
            $normal = $total_with_pay["normal"] + $post["B_24"];
            $early = $total_with_pay["early"] + $post["B_24"];
            $afternoon = $total_with_pay["afternoon"] + $post["B_24"];
            $night = $total_with_pay["night"] + $post["B_24"];
            $fifty_shift = $total_with_pay["50%Shift"] + $post["B_24"];
            $t_14 = $total_with_pay["T1/4"] + $post["B_24"];
            $t_12 = $total_with_pay["T1/2"] + $post["B_24"];
            $double = $total_with_pay["double"] + $post["B_24"];
            $dt_12 = $total_with_pay["DT1/2"] + $post["B_24"];
            $triple = $total_with_pay["triple"] + $post["B_24"];
        } else {
            if ($post["B_24"] == "") {
                $normal = $total_with_pay["normal"];
                $early = $total_with_pay["early"];
                $afternoon = $total_with_pay["afternoon"];
                $night = $total_with_pay["night"];
                $fifty_shift = $total_with_pay["50%Shift"];
                $t_14 = $total_with_pay["T1/4"];
                $t_12 = $total_with_pay["T1/2"];
                $double = $total_with_pay["double"];
                $dt_12 = $total_with_pay["DT1/2"];
                $triple = $total_with_pay["triple"];        
            } else {
                $percentage = 1 - ($post["B_24"]/100);
                $normal = $total_with_pay["normal"] / $percentage;
                $early = $total_with_pay["early"] / $percentage;
                $afternoon = $total_with_pay["afternoon"] / $percentage;
                $night = $total_with_pay["night"] / $percentage;
                $fifty_shift = $total_with_pay["50%Shift"] / $percentage;
                $t_14 = $total_with_pay["T1/4"] / $percentage;
                $t_12 = $total_with_pay["T1/2"] / $percentage;
                $double = $total_with_pay["double"] / $percentage;
                $dt_12 = $total_with_pay["DT1/2"] / $percentage;
                $triple = $total_with_pay["triple"] / $percentage;   
            }
        }
        
        return array(
            "trans_no"      => $post["trans_no"],
            "description"   => $description,
            "normal"        => $normal,
            "early"         => $early,
            "afternoon"     => $afternoon,
            "night"         => $night,
            "50%Shift"      => $fifty_shift,
            "T1/4"          => $t_14,
            "T1/2"          => $t_12,
            "double"        => $double,
            "DT1/2"         => $dt_12,
            "triple"        => $triple,
            "calc_no"       => $calc,
            "cell_no"       => 13
        );
    }

    private function computeDollarMargin($hourly_charge_rate, $total_with_pay, $post, $index, $calc)
    {
        $description = $this->ml_description[11];
        if ($post["swi_peror_cur"] == "0") {
            $normal = $post["B_24"];
            $early = $post["B_24"];
            $afternoon = $post["B_24"];
            $night = $post["B_24"];
            $fifty_shift = $post["B_24"];
            $t_14 = $post["B_24"];
            $t_12 = $post["B_24"];
            $double = $post["B_24"];
            $dt_12 = $post["B_24"];
            $triple = $post["B_24"];
        } else {
            $normal = $hourly_charge_rate["normal"] - $total_with_pay["normal"];
            $early = $hourly_charge_rate["early"] - $total_with_pay["early"];
            $afternoon = $hourly_charge_rate["afternoon"] - $total_with_pay["afternoon"];
            $night = $hourly_charge_rate["night"] - $total_with_pay["night"];
            $fifty_shift = $hourly_charge_rate["50%Shift"] - $total_with_pay["50%Shift"];
            $t_14 = $hourly_charge_rate["T1/4"] - $total_with_pay["T1/4"];
            $t_12 = $hourly_charge_rate["T1/2"] - $total_with_pay["T1/2"];
            $double = $hourly_charge_rate["double"] - $total_with_pay["double"];
            $dt_12 = $hourly_charge_rate["DT1/2"] - $total_with_pay["DT1/2"];
            $triple = $hourly_charge_rate["triple"] - $total_with_pay["triple"];
        }
        
        return array(
            "trans_no"      => $post["trans_no"],
            "description"   => $description,
            "normal"        => $normal,
            "early"         => $early,
            "afternoon"     => $afternoon,
            "night"         => $night,
            "50%Shift"      => $fifty_shift,
            "T1/4"          => $t_14,
            "T1/2"          => $t_12,
            "double"        => $double,
            "DT1/2"         => $dt_12,
            "triple"        => $triple,
            "calc_no"       => $calc,
            "cell_no"       => 11
        );
    }

    private function computePercentMargin($hourly_charge_rate, $post, $index, $calc)
    {
        $description = $this->ml_description[12];
        if ($post["swi_peror_cur"] == "0") {
            $normal = ($post["B_24"]/$hourly_charge_rate["normal"])/100;
            $early = ($post["B_24"]/$hourly_charge_rate["early"])/100;
            $afternoon = ($post["B_24"]/$hourly_charge_rate["afternoon"])/100;
            $night = ($post["B_24"]/$hourly_charge_rate["night"])/100;
            $fifty_shift = ($post["B_24"]/$hourly_charge_rate["50%Shift"])/100;
            $t_14 = ($post["B_24"]/$hourly_charge_rate["T1/4"])/100;
            $t_12 = ($post["B_24"]/$hourly_charge_rate["T1/2"])/100;
            $double = ($post["B_24"]/$hourly_charge_rate["double"])/100;
            $dt_12 = ($post["B_24"]/$hourly_charge_rate["DT1/2"])/100;
            $triple = ($post["B_24"]/$hourly_charge_rate["triple"])/100;
        } else {
            $normal = $post["B_24"];
            $early = $post["B_24"];
            $afternoon = $post["B_24"];
            $night = $post["B_24"];
            $fifty_shift = $post["B_24"];
            $t_14 = $post["B_24"];
            $t_12 = $post["B_24"];
            $double = $post["B_24"];
            $dt_12 = $post["B_24"];
            $triple = $post["B_24"];
        }
        
        return array(
            "trans_no"      => $post["trans_no"],
            "description"   => $description,
            "normal"        => $normal,
            "early"         => $early,
            "afternoon"     => $afternoon,
            "night"         => $night,
            "50%Shift"      => $fifty_shift,
            "T1/4"          => $t_14,
            "T1/2"          => $t_12,
            "double"        => $double,
            "DT1/2"         => $dt_12,
            "triple"        => $triple,
            "calc_no"       => $calc,
            "cell_no"       => 12
        );
    }

    private function computeMAllow($post)
    {
        $trans_no = $post["trans_no"];
        
        $allowance_pay = array(
            "trans_no"    => $trans_no,
            "description" => "Allowance Pay",
            "cell_no"     => 0,
            "meal"        => $post["B_52"],
            "first_aid"   => $post["B_53"],
            "L_hand_3"    => $post["B_54"],
            "L_hand_10"   => $post["B_55"],
            "L_hand_20"   => $post["B_56"]
        );
        
        $super_percent = $post["B_14"]/100;
        $super = array(
            "trans_no"    => $trans_no,
            "description" => "Superannuation",
            "cell_no"     => 1,
            "meal"        => $post["B_52"] * ($super_percent),
            "first_aid"   => $post["B_53"] * ($super_percent),
            "L_hand_3"    => $post["B_54"] * ($super_percent),
            "L_hand_10"   => $post["B_55"] * ($super_percent),
            "L_hand_20"   => $post["B_56"] * ($super_percent)
        );
        
        $work_percent = $post["B_15"]/100;
        $work_cover = array(
            "trans_no"    => $trans_no,
            "description" => "Work Cover (% on super total)",
            "cell_no"     => 2,
            "meal"        => ($allowance_pay["meal"] + $super["meal"]) * $work_percent,
            "first_aid"   => ($allowance_pay["first_aid"] + $super["first_aid"]) * $work_percent,
            "L_hand_3"    => ($allowance_pay["L_hand_3"] + $super["L_hand_3"]) * $work_percent,
            "L_hand_10"   => ($allowance_pay["L_hand_10"] + $super["L_hand_10"]) * $work_percent,
            "L_hand_20"   => ($allowance_pay["L_hand_20"] + $super["L_hand_20"]) * $work_percent,
        );
        
        $public_percent = $post["B_20"]/100;
        $public = array(
            "trans_no"    => $trans_no,
            "description" => "Public Liability (% on pay rate)",
            "cell_no"     => 3,
            "meal"        => $post["B_52"] * ($public_percent),
            "first_aid"   => $post["B_53"] * ($public_percent),
            "L_hand_3"    => $post["B_54"] * ($public_percent),
            "L_hand_10"   => $post["B_55"] * ($public_percent),
            "L_hand_20"   => $post["B_56"] * ($public_percent)
        );
        
        $payroll_percent = $post["B_19"]/100;
        $payroll = array(
            "trans_no"    => $trans_no,
            "description" => "Payroll Tax (% on super total)",
            "cell_no"     => 4,
            "meal"        => ($allowance_pay["meal"] + $super["meal"]) * $payroll_percent,
            "first_aid"   => ($allowance_pay["first_aid"] + $super["first_aid"]) * $payroll_percent,
            "L_hand_3"    => ($allowance_pay["L_hand_3"] + $super["L_hand_3"]) * $payroll_percent,
            "L_hand_10"   => ($allowance_pay["L_hand_10"] + $super["L_hand_10"]) * $payroll_percent,
            "L_hand_20"   => ($allowance_pay["L_hand_20"] + $super["L_hand_20"]) * $payroll_percent,
        );
        
        $admin_percent = $post["B_22"]/100;
        $admin = array(
            "trans_no"    => $trans_no,
            "description" => "Administration (% on super total)",
            "cell_no"     => 5,
            "meal"        => ($allowance_pay["meal"] + $super["meal"]) * $admin_percent,
            "first_aid"   => ($allowance_pay["first_aid"] + $super["first_aid"]) * $admin_percent,
            "L_hand_3"    => ($allowance_pay["L_hand_3"] + $super["L_hand_3"]) * $admin_percent,
            "L_hand_10"   => ($allowance_pay["L_hand_10"] + $super["L_hand_10"]) * $admin_percent,
            "L_hand_20"   => ($allowance_pay["L_hand_20"] + $super["L_hand_20"]) * $admin_percent,
        );
        
        $total_with_pay = array(
            "trans_no"    => $trans_no,
            "description" => "TOTAL WITH PAY + ONCOSTS:",
            "cell_no"     => 6,
            "meal"        => $allowance_pay["meal"] + $super["meal"] + $work_cover["meal"] + $public["meal"] + $payroll["meal"] + $admin["meal"],
            "first_aid"   => $allowance_pay["first_aid"] + $super["first_aid"] + $work_cover["first_aid"] + $public["first_aid"] + $payroll["first_aid"] + $admin["first_aid"],
            "L_hand_3"    => $allowance_pay["L_hand_3"] + $super["L_hand_3"] + $work_cover["L_hand_3"] + $public["L_hand_3"] + $payroll["L_hand_3"] + $admin["L_hand_3"],
            "L_hand_10"   => $allowance_pay["L_hand_10"] + $super["L_hand_10"] + $work_cover["L_hand_10"] + $public["L_hand_10"] + $payroll["L_hand_10"] + $admin["L_hand_10"],
            "L_hand_20"   => $allowance_pay["L_hand_20"] + $super["L_hand_20"] + $work_cover["L_hand_20"] + $public["L_hand_20"] + $payroll["L_hand_20"] + $admin["L_hand_20"]
        );
        
        $margin = $post["m_allow_margin"]/100;
        $percent_margin = array(
            "trans_no"    => $trans_no,
            "description" => "% Margin",
            "cell_no"     => 7,
            "meal"        => $margin,
            "first_aid"   => $margin,
            "L_hand_3"    => $margin,
            "L_hand_10"   => $margin,
            "L_hand_20"   => $margin
        );
        
        $dollar_margin = array(
            "trans_no"    => $trans_no,
            "description" => "$ Margin",
            "cell_no"     => 8,
            "meal"        => $total_with_pay["meal"] * $margin,
            "first_aid"   => $total_with_pay["first_aid"] * $margin,
            "L_hand_3"    => $total_with_pay["L_hand_3"] * $margin,
            "L_hand_10"   => $total_with_pay["L_hand_10"] * $margin,
            "L_hand_20"   => $total_with_pay["L_hand_20"] * $margin
        );
        
        $labour_allow_charge_rate = array (
            "trans_no"    => $trans_no,
            "description" => "Labourpower Allowance Charge Rates",
            "cell_no"     => 9,
            "meal"        => $total_with_pay["meal"] + $dollar_margin["meal"],
            "first_aid"   => $total_with_pay["first_aid"] + $dollar_margin["first_aid"],
            "L_hand_3"    => $total_with_pay["L_hand_3"] + $dollar_margin["L_hand_3"],
            "L_hand_10"   => $total_with_pay["L_hand_10"] + $dollar_margin["L_hand_10"],
            "L_hand_20"   => $total_with_pay["L_hand_20"] + $dollar_margin["L_hand_20"]      
        );
        
        return array($allowance_pay, $super, $work_cover, $public, $payroll, $admin, $total_with_pay, $percent_margin, $dollar_margin, $labour_allow_charge_rate);
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
