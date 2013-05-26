<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paycharge_rate extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("reports/tbl_paycharge_rate", "pr");
        $this->load->library("user_session");
		$this->user_session = $this->user_session->checkUserSession();
		$this->data["title"] = "System - Reports";
		$this->data["username"] = $this->session->userdata("username");
		$this->data["is_admin"] = $this->user_session["is_admin"];
		$this->data["date_slash"] = mdate("%d/%m/%Y");
	}
	
	
	public function modern_award(){
		$this->data["header"] = $this->load->view("header", $this->data, true);
		$this->data["footer"] = $this->load->view("footer", $this->data, true);
        $this->data["type"] = "Modern Award";
		
        $this->data["modern_awards"] = $this->pr->getModernAwards();
        
        $this->load->view("reports/paycharge_rate_view", $this->data);
	}
	
	public function client(){
		$this->data["header"] = $this->load->view("header", $this->data, true);
        $this->data["footer"] = $this->load->view("footer", $this->data, true);
        $this->data["type"] = "Client Agreement";
        
        $this->data["charge_rate"] = $this->pr->getChargeRate();
        
        $this->load->view("reports/paycharge_rate_client_view", $this->data);
	}
	
	public function print_modern($trans_no, $modern_no){
		$this->data["header"] = $this->load->view("header", $this->data, true);
		$this->data["footer"] = $this->load->view("footer", $this->data, true);
        
        
        $this->data["calcu"] = $this->pr->getCalc($trans_no);
        $this->data["modern"] = $this->pr->getModern($modern_no);
        $this->data["mallow"] = $this->pr->getMAllow($trans_no);
        $this->data["charge"] = $this->pr->getCharge($trans_no);
        
        foreach ($this->data["mallow"] as $key => $value) {
            if($value["description"]=="Allowance Pay"){
                $this->data["allow_meal"] = $value["meal"];
                $this->data["allow_first_aid"] = $value["first_aid"];
                $this->data["allow_l_hand_3"] = $value["L_hand_3"];
                $this->data["allow_l_hand_10"] = $value["L_hand_10"];
                $this->data["allow_l_hand_20"] = $value["L_hand_20"];
            }
            if($value["description"]=="Labourpower Allowance Charge Rates"){
                $this->data["labour_meal"] = $value["meal"];
                $this->data["labour_first_aid"] = $value["first_aid"];
                $this->data["labour_l_hand_3"] = $value["L_hand_3"];
                $this->data["labour_l_hand_10"] = $value["L_hand_10"];
                $this->data["labour_l_hand_20"] = $value["L_hand_20"];
            }
        }
        
        if($this->data["calcu"]["grade1"]){
            $this->data["paycharge_ml1"] = $this->pr->getPayCharge_ml1($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml1"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml1"] = $value["normal"];
                    $this->data["t14_total_ml1"] = $value["T1/4"];
                    $this->data["t12_total_ml1"] = $value["T1/2"];
                    $this->data["double_total_ml1"] = $value["double"];
                    $this->data["double_t12_total_ml1"] = $value["DT1/2"];
                    $this->data["triple_total_ml1"] = $value["triple"];
                    
                    $this->data["early_total_ml1"] = $value["early"];
                    $this->data["aft_total_ml1"] = $value["afternoon"];
                    $this->data["night_total_ml1"] = $value["night"];
                    $this->data["_50_total_ml1"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml1"] = $value["normal"];
                    $this->data["t14_labour_ml1"] = $value["T1/4"];
                    $this->data["t12_labour_ml1"] = $value["T1/2"];
                    $this->data["double_labour_ml1"] = $value["double"];
                    $this->data["double_t12_labour_ml1"] = $value["DT1/2"];
                    $this->data["triple_labour_ml1"] = $value["triple"];
                    
                    $this->data["early_labour_ml1"] = $value["early"];
                    $this->data["aft_labour_ml1"] = $value["afternoon"];
                    $this->data["night_labour_ml1"] = $value["night"];
                    $this->data["_50_labour_ml1"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade2"]){
            $this->data["paycharge_ml2"] = $this->pr->getPayCharge_ml2($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml2"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml2"] = $value["normal"];
                    $this->data["t14_total_ml2"] = $value["T1/4"];
                    $this->data["t12_total_ml2"] = $value["T1/2"];
                    $this->data["double_total_ml2"] = $value["double"];
                    $this->data["double_t12_total_ml2"] = $value["DT1/2"];
                    $this->data["triple_total_ml2"] = $value["triple"];
                    
                    $this->data["early_total_ml2"] = $value["early"];
                    $this->data["aft_total_ml2"] = $value["afternoon"];
                    $this->data["night_total_ml2"] = $value["night"];
                    $this->data["_50_total_ml2"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml2"] = $value["normal"];
                    $this->data["t14_labour_ml2"] = $value["T1/4"];
                    $this->data["t12_labour_ml2"] = $value["T1/2"];
                    $this->data["double_labour_ml2"] = $value["double"];
                    $this->data["double_t12_labour_ml2"] = $value["DT1/2"];
                    $this->data["triple_labour_ml2"] = $value["triple"];
                    
                    $this->data["early_labour_ml2"] = $value["early"];
                    $this->data["aft_labour_ml2"] = $value["afternoon"];
                    $this->data["night_labour_ml2"] = $value["night"];
                    $this->data["_50_labour_ml2"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade3"]){
            $this->data["paycharge_ml3"] = $this->pr->getPayCharge_ml3($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml3"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml3"] = $value["normal"];
                    $this->data["t14_total_ml3"] = $value["T1/4"];
                    $this->data["t12_total_ml3"] = $value["T1/2"];
                    $this->data["double_total_ml3"] = $value["double"];
                    $this->data["double_t12_total_ml3"] = $value["DT1/2"];
                    $this->data["triple_total_ml3"] = $value["triple"];
                    
                    $this->data["early_total_ml3"] = $value["early"];
                    $this->data["aft_total_ml3"] = $value["afternoon"];
                    $this->data["night_total_ml3"] = $value["night"];
                    $this->data["_50_total_ml3"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml3"] = $value["normal"];
                    $this->data["t14_labour_ml3"] = $value["T1/4"];
                    $this->data["t12_labour_ml3"] = $value["T1/2"];
                    $this->data["double_labour_ml3"] = $value["double"];
                    $this->data["double_t12_labour_ml3"] = $value["DT1/2"];
                    $this->data["triple_labour_ml3"] = $value["triple"];
                    
                    $this->data["early_labour_ml3"] = $value["early"];
                    $this->data["aft_labour_ml3"] = $value["afternoon"];
                    $this->data["night_labour_ml3"] = $value["night"];
                    $this->data["_50_labour_ml3"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade4"]){
            $this->data["paycharge_ml4"] = $this->pr->getPayCharge_ml4($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml4"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml4"] = $value["normal"];
                    $this->data["t14_total_ml4"] = $value["T1/4"];
                    $this->data["t12_total_ml4"] = $value["T1/2"];
                    $this->data["double_total_ml4"] = $value["double"];
                    $this->data["double_t12_total_ml4"] = $value["DT1/2"];
                    $this->data["triple_total_ml4"] = $value["triple"];
                    
                    $this->data["early_total_ml4"] = $value["early"];
                    $this->data["aft_total_ml4"] = $value["afternoon"];
                    $this->data["night_total_ml4"] = $value["night"];
                    $this->data["_50_total_ml4"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml4"] = $value["normal"];
                    $this->data["t14_labour_ml4"] = $value["T1/4"];
                    $this->data["t12_labour_ml4"] = $value["T1/2"];
                    $this->data["double_labour_ml4"] = $value["double"];
                    $this->data["double_t12_labour_ml4"] = $value["DT1/2"];
                    $this->data["triple_labour_ml4"] = $value["triple"];
                    
                    $this->data["early_labour_ml4"] = $value["early"];
                    $this->data["aft_labour_ml4"] = $value["afternoon"];
                    $this->data["night_labour_ml4"] = $value["night"];
                    $this->data["_50_labour_ml4"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade5"]){
            $this->data["paycharge_ml5"] = $this->pr->getPayCharge_ml5($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml5"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml5"] = $value["normal"];
                    $this->data["t14_total_ml5"] = $value["T1/4"];
                    $this->data["t12_total_ml5"] = $value["T1/2"];
                    $this->data["double_total_ml5"] = $value["double"];
                    $this->data["double_t12_total_ml5"] = $value["DT1/2"];
                    $this->data["triple_total_ml5"] = $value["triple"];
                    
                    $this->data["early_total_ml5"] = $value["early"];
                    $this->data["aft_total_ml5"] = $value["afternoon"];
                    $this->data["night_total_ml5"] = $value["night"];
                    $this->data["_50_total_ml5"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml5"] = $value["normal"];
                    $this->data["t14_labour_ml5"] = $value["T1/4"];
                    $this->data["t12_labour_ml5"] = $value["T1/2"];
                    $this->data["double_labour_ml5"] = $value["double"];
                    $this->data["double_t12_labour_ml5"] = $value["DT1/2"];
                    $this->data["triple_labour_ml5"] = $value["triple"];
                    
                    $this->data["early_labour_ml5"] = $value["early"];
                    $this->data["aft_labour_ml5"] = $value["afternoon"];
                    $this->data["night_labour_ml5"] = $value["night"];
                    $this->data["_50_labour_ml5"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade6"]){
            $this->data["paycharge_ml6"] = $this->pr->getPayCharge_ml6($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml6"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml6"] = $value["normal"];
                    $this->data["t14_total_ml6"] = $value["T1/4"];
                    $this->data["t12_total_ml6"] = $value["T1/2"];
                    $this->data["double_total_ml6"] = $value["double"];
                    $this->data["double_t12_total_ml6"] = $value["DT1/2"];
                    $this->data["triple_total_ml6"] = $value["triple"];
                    
                    $this->data["early_total_ml6"] = $value["early"];
                    $this->data["aft_total_ml6"] = $value["afternoon"];
                    $this->data["night_total_ml6"] = $value["night"];
                    $this->data["_50_total_ml6"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml6"] = $value["normal"];
                    $this->data["t14_labour_ml6"] = $value["T1/4"];
                    $this->data["t12_labour_ml6"] = $value["T1/2"];
                    $this->data["double_labour_ml6"] = $value["double"];
                    $this->data["double_t12_labour_ml6"] = $value["DT1/2"];
                    $this->data["triple_labour_ml6"] = $value["triple"];
                    
                    $this->data["early_labour_ml6"] = $value["early"];
                    $this->data["aft_labour_ml6"] = $value["afternoon"];
                    $this->data["night_labour_ml6"] = $value["night"];
                    $this->data["_50_labour_ml6"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade7"]){
            $this->data["paycharge_ml7"] = $this->pr->getPayCharge_ml7($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml7"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml7"] = $value["normal"];
                    $this->data["t14_total_ml7"] = $value["T1/4"];
                    $this->data["t12_total_ml7"] = $value["T1/2"];
                    $this->data["double_total_ml7"] = $value["double"];
                    $this->data["double_t12_total_ml7"] = $value["DT1/2"];
                    $this->data["triple_total_ml7"] = $value["triple"];
                    
                    $this->data["early_total_ml7"] = $value["early"];
                    $this->data["aft_total_ml7"] = $value["afternoon"];
                    $this->data["night_total_ml7"] = $value["night"];
                    $this->data["_50_total_ml7"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml7"] = $value["normal"];
                    $this->data["t14_labour_ml7"] = $value["T1/4"];
                    $this->data["t12_labour_ml7"] = $value["T1/2"];
                    $this->data["double_labour_ml7"] = $value["double"];
                    $this->data["double_t12_labour_ml7"] = $value["DT1/2"];
                    $this->data["triple_labour_ml7"] = $value["triple"];
                    
                    $this->data["early_labour_ml7"] = $value["early"];
                    $this->data["aft_labour_ml7"] = $value["afternoon"];
                    $this->data["night_labour_ml7"] = $value["night"];
                    $this->data["_50_labour_ml7"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade8"]){
            $this->data["paycharge_ml8"] = $this->pr->getPayCharge_ml8($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml8"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml8"] = $value["normal"];
                    $this->data["t14_total_ml8"] = $value["T1/4"];
                    $this->data["t12_total_ml8"] = $value["T1/2"];
                    $this->data["double_total_ml8"] = $value["double"];
                    $this->data["double_t12_total_ml8"] = $value["DT1/2"];
                    $this->data["triple_total_ml8"] = $value["triple"];
                    
                    $this->data["early_total_ml8"] = $value["early"];
                    $this->data["aft_total_ml8"] = $value["afternoon"];
                    $this->data["night_total_ml8"] = $value["night"];
                    $this->data["_50_total_ml8"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml8"] = $value["normal"];
                    $this->data["t14_labour_ml8"] = $value["T1/4"];
                    $this->data["t12_labour_ml8"] = $value["T1/2"];
                    $this->data["double_labour_ml8"] = $value["double"];
                    $this->data["double_t12_labour_ml8"] = $value["DT1/2"];
                    $this->data["triple_labour_ml8"] = $value["triple"];
                    
                    $this->data["early_labour_ml8"] = $value["early"];
                    $this->data["aft_labour_ml8"] = $value["afternoon"];
                    $this->data["night_labour_ml8"] = $value["night"];
                    $this->data["_50_labour_ml8"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade9"]){
            $this->data["paycharge_ml9"] = $this->pr->getPayCharge_ml9($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml9"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml9"] = $value["normal"];
                    $this->data["t14_total_ml9"] = $value["T1/4"];
                    $this->data["t12_total_ml9"] = $value["T1/2"];
                    $this->data["double_total_ml9"] = $value["double"];
                    $this->data["double_t12_total_ml9"] = $value["DT1/2"];
                    $this->data["triple_total_ml9"] = $value["triple"];
                    
                    $this->data["early_total_ml9"] = $value["early"];
                    $this->data["aft_total_ml9"] = $value["afternoon"];
                    $this->data["night_total_ml9"] = $value["night"];
                    $this->data["_50_total_ml9"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml9"] = $value["normal"];
                    $this->data["t14_labour_ml9"] = $value["T1/4"];
                    $this->data["t12_labour_ml9"] = $value["T1/2"];
                    $this->data["double_labour_ml9"] = $value["double"];
                    $this->data["double_t12_labour_ml9"] = $value["DT1/2"];
                    $this->data["triple_labour_ml9"] = $value["triple"];
                    
                    $this->data["early_labour_ml9"] = $value["early"];
                    $this->data["aft_labour_ml9"] = $value["afternoon"];
                    $this->data["night_labour_ml9"] = $value["night"];
                    $this->data["_50_labour_ml9"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade9"]){
            $this->data["paycharge_ml9"] = $this->pr->getPayCharge_ml9($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml9"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml9"] = $value["normal"];
                    $this->data["t14_total_ml9"] = $value["T1/4"];
                    $this->data["t12_total_ml9"] = $value["T1/2"];
                    $this->data["double_total_ml9"] = $value["double"];
                    $this->data["double_t12_total_ml9"] = $value["DT1/2"];
                    $this->data["triple_total_ml9"] = $value["triple"];
                    
                    $this->data["early_total_ml9"] = $value["early"];
                    $this->data["aft_total_ml9"] = $value["afternoon"];
                    $this->data["night_total_ml9"] = $value["night"];
                    $this->data["_50_total_ml9"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml9"] = $value["normal"];
                    $this->data["t14_labour_ml9"] = $value["T1/4"];
                    $this->data["t12_labour_ml9"] = $value["T1/2"];
                    $this->data["double_labour_ml9"] = $value["double"];
                    $this->data["double_t12_labour_ml9"] = $value["DT1/2"];
                    $this->data["triple_labour_ml9"] = $value["triple"];
                    
                    $this->data["early_labour_ml9"] = $value["early"];
                    $this->data["aft_labour_ml9"] = $value["afternoon"];
                    $this->data["night_labour_ml9"] = $value["night"];
                    $this->data["_50_labour_ml9"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade10"]){
            $this->data["paycharge_ml10"] = $this->pr->getPayCharge_ml10($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml10"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml10"] = $value["normal"];
                    $this->data["t14_total_ml10"] = $value["T1/4"];
                    $this->data["t12_total_ml10"] = $value["T1/2"];
                    $this->data["double_total_ml10"] = $value["double"];
                    $this->data["double_t12_total_ml10"] = $value["DT1/2"];
                    $this->data["triple_total_ml10"] = $value["triple"];
                    
                    $this->data["early_total_ml10"] = $value["early"];
                    $this->data["aft_total_ml10"] = $value["afternoon"];
                    $this->data["night_total_ml10"] = $value["night"];
                    $this->data["_50_total_ml10"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml10"] = $value["normal"];
                    $this->data["t14_labour_ml10"] = $value["T1/4"];
                    $this->data["t12_labour_ml10"] = $value["T1/2"];
                    $this->data["double_labour_ml10"] = $value["double"];
                    $this->data["double_t12_labour_ml10"] = $value["DT1/2"];
                    $this->data["triple_labour_ml10"] = $value["triple"];
                    
                    $this->data["early_labour_ml10"] = $value["early"];
                    $this->data["aft_labour_ml10"] = $value["afternoon"];
                    $this->data["night_labour_ml10"] = $value["night"];
                    $this->data["_50_labour_ml10"] = $value["50%Shift"];
                }
            }
        }
		$this->load->view("reports/print_paycharge_rate", $this->data);
	}
	
    public function print_client($trans_no){
        $this->data["header"] = $this->load->view("header", $this->data, true);
        $this->data["footer"] = $this->load->view("footer", $this->data, true);
        
        
        $this->data["calcu"] = $this->pr->getCalc($trans_no);
        $this->data["mallow"] = $this->pr->getMAllow($trans_no);
        $this->data["charge"] = $this->pr->getCharge($trans_no);
        
        foreach ($this->data["mallow"] as $key => $value) {
            if($value["description"]=="Allowance Pay"){
                $this->data["allow_meal"] = $value["meal"];
                $this->data["allow_first_aid"] = $value["first_aid"];
                $this->data["allow_l_hand_3"] = $value["L_hand_3"];
                $this->data["allow_l_hand_10"] = $value["L_hand_10"];
                $this->data["allow_l_hand_20"] = $value["L_hand_20"];
            }
            if($value["description"]=="Labourpower Allowance Charge Rates"){
                $this->data["labour_meal"] = $value["meal"];
                $this->data["labour_first_aid"] = $value["first_aid"];
                $this->data["labour_l_hand_3"] = $value["L_hand_3"];
                $this->data["labour_l_hand_10"] = $value["L_hand_10"];
                $this->data["labour_l_hand_20"] = $value["L_hand_20"];
            }
        }
        
        if($this->data["calcu"]["grade1"]){
            $this->data["paycharge_ml1"] = $this->pr->getPayCharge_ml1($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml1"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml1"] = $value["normal"];
                    $this->data["t14_total_ml1"] = $value["T1/4"];
                    $this->data["t12_total_ml1"] = $value["T1/2"];
                    $this->data["double_total_ml1"] = $value["double"];
                    $this->data["double_t12_total_ml1"] = $value["DT1/2"];
                    $this->data["triple_total_ml1"] = $value["triple"];
                    
                    $this->data["early_total_ml1"] = $value["early"];
                    $this->data["aft_total_ml1"] = $value["afternoon"];
                    $this->data["night_total_ml1"] = $value["night"];
                    $this->data["_50_total_ml1"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml1"] = $value["normal"];
                    $this->data["t14_labour_ml1"] = $value["T1/4"];
                    $this->data["t12_labour_ml1"] = $value["T1/2"];
                    $this->data["double_labour_ml1"] = $value["double"];
                    $this->data["double_t12_labour_ml1"] = $value["DT1/2"];
                    $this->data["triple_labour_ml1"] = $value["triple"];
                    
                    $this->data["early_labour_ml1"] = $value["early"];
                    $this->data["aft_labour_ml1"] = $value["afternoon"];
                    $this->data["night_labour_ml1"] = $value["night"];
                    $this->data["_50_labour_ml1"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade2"]){
            $this->data["paycharge_ml2"] = $this->pr->getPayCharge_ml2($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml2"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml2"] = $value["normal"];
                    $this->data["t14_total_ml2"] = $value["T1/4"];
                    $this->data["t12_total_ml2"] = $value["T1/2"];
                    $this->data["double_total_ml2"] = $value["double"];
                    $this->data["double_t12_total_ml2"] = $value["DT1/2"];
                    $this->data["triple_total_ml2"] = $value["triple"];
                    
                    $this->data["early_total_ml2"] = $value["early"];
                    $this->data["aft_total_ml2"] = $value["afternoon"];
                    $this->data["night_total_ml2"] = $value["night"];
                    $this->data["_50_total_ml2"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml2"] = $value["normal"];
                    $this->data["t14_labour_ml2"] = $value["T1/4"];
                    $this->data["t12_labour_ml2"] = $value["T1/2"];
                    $this->data["double_labour_ml2"] = $value["double"];
                    $this->data["double_t12_labour_ml2"] = $value["DT1/2"];
                    $this->data["triple_labour_ml2"] = $value["triple"];
                    
                    $this->data["early_labour_ml2"] = $value["early"];
                    $this->data["aft_labour_ml2"] = $value["afternoon"];
                    $this->data["night_labour_ml2"] = $value["night"];
                    $this->data["_50_labour_ml2"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade3"]){
            $this->data["paycharge_ml3"] = $this->pr->getPayCharge_ml3($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml3"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml3"] = $value["normal"];
                    $this->data["t14_total_ml3"] = $value["T1/4"];
                    $this->data["t12_total_ml3"] = $value["T1/2"];
                    $this->data["double_total_ml3"] = $value["double"];
                    $this->data["double_t12_total_ml3"] = $value["DT1/2"];
                    $this->data["triple_total_ml3"] = $value["triple"];
                    
                    $this->data["early_total_ml3"] = $value["early"];
                    $this->data["aft_total_ml3"] = $value["afternoon"];
                    $this->data["night_total_ml3"] = $value["night"];
                    $this->data["_50_total_ml3"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml3"] = $value["normal"];
                    $this->data["t14_labour_ml3"] = $value["T1/4"];
                    $this->data["t12_labour_ml3"] = $value["T1/2"];
                    $this->data["double_labour_ml3"] = $value["double"];
                    $this->data["double_t12_labour_ml3"] = $value["DT1/2"];
                    $this->data["triple_labour_ml3"] = $value["triple"];
                    
                    $this->data["early_labour_ml3"] = $value["early"];
                    $this->data["aft_labour_ml3"] = $value["afternoon"];
                    $this->data["night_labour_ml3"] = $value["night"];
                    $this->data["_50_labour_ml3"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade4"]){
            $this->data["paycharge_ml4"] = $this->pr->getPayCharge_ml4($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml4"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml4"] = $value["normal"];
                    $this->data["t14_total_ml4"] = $value["T1/4"];
                    $this->data["t12_total_ml4"] = $value["T1/2"];
                    $this->data["double_total_ml4"] = $value["double"];
                    $this->data["double_t12_total_ml4"] = $value["DT1/2"];
                    $this->data["triple_total_ml4"] = $value["triple"];
                    
                    $this->data["early_total_ml4"] = $value["early"];
                    $this->data["aft_total_ml4"] = $value["afternoon"];
                    $this->data["night_total_ml4"] = $value["night"];
                    $this->data["_50_total_ml4"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml4"] = $value["normal"];
                    $this->data["t14_labour_ml4"] = $value["T1/4"];
                    $this->data["t12_labour_ml4"] = $value["T1/2"];
                    $this->data["double_labour_ml4"] = $value["double"];
                    $this->data["double_t12_labour_ml4"] = $value["DT1/2"];
                    $this->data["triple_labour_ml4"] = $value["triple"];
                    
                    $this->data["early_labour_ml4"] = $value["early"];
                    $this->data["aft_labour_ml4"] = $value["afternoon"];
                    $this->data["night_labour_ml4"] = $value["night"];
                    $this->data["_50_labour_ml4"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade5"]){
            $this->data["paycharge_ml5"] = $this->pr->getPayCharge_ml5($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml5"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml5"] = $value["normal"];
                    $this->data["t14_total_ml5"] = $value["T1/4"];
                    $this->data["t12_total_ml5"] = $value["T1/2"];
                    $this->data["double_total_ml5"] = $value["double"];
                    $this->data["double_t12_total_ml5"] = $value["DT1/2"];
                    $this->data["triple_total_ml5"] = $value["triple"];
                    
                    $this->data["early_total_ml5"] = $value["early"];
                    $this->data["aft_total_ml5"] = $value["afternoon"];
                    $this->data["night_total_ml5"] = $value["night"];
                    $this->data["_50_total_ml5"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml5"] = $value["normal"];
                    $this->data["t14_labour_ml5"] = $value["T1/4"];
                    $this->data["t12_labour_ml5"] = $value["T1/2"];
                    $this->data["double_labour_ml5"] = $value["double"];
                    $this->data["double_t12_labour_ml5"] = $value["DT1/2"];
                    $this->data["triple_labour_ml5"] = $value["triple"];
                    
                    $this->data["early_labour_ml5"] = $value["early"];
                    $this->data["aft_labour_ml5"] = $value["afternoon"];
                    $this->data["night_labour_ml5"] = $value["night"];
                    $this->data["_50_labour_ml5"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade6"]){
            $this->data["paycharge_ml6"] = $this->pr->getPayCharge_ml6($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml6"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml6"] = $value["normal"];
                    $this->data["t14_total_ml6"] = $value["T1/4"];
                    $this->data["t12_total_ml6"] = $value["T1/2"];
                    $this->data["double_total_ml6"] = $value["double"];
                    $this->data["double_t12_total_ml6"] = $value["DT1/2"];
                    $this->data["triple_total_ml6"] = $value["triple"];
                    
                    $this->data["early_total_ml6"] = $value["early"];
                    $this->data["aft_total_ml6"] = $value["afternoon"];
                    $this->data["night_total_ml6"] = $value["night"];
                    $this->data["_50_total_ml6"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml6"] = $value["normal"];
                    $this->data["t14_labour_ml6"] = $value["T1/4"];
                    $this->data["t12_labour_ml6"] = $value["T1/2"];
                    $this->data["double_labour_ml6"] = $value["double"];
                    $this->data["double_t12_labour_ml6"] = $value["DT1/2"];
                    $this->data["triple_labour_ml6"] = $value["triple"];
                    
                    $this->data["early_labour_ml6"] = $value["early"];
                    $this->data["aft_labour_ml6"] = $value["afternoon"];
                    $this->data["night_labour_ml6"] = $value["night"];
                    $this->data["_50_labour_ml6"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade7"]){
            $this->data["paycharge_ml7"] = $this->pr->getPayCharge_ml7($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml7"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml7"] = $value["normal"];
                    $this->data["t14_total_ml7"] = $value["T1/4"];
                    $this->data["t12_total_ml7"] = $value["T1/2"];
                    $this->data["double_total_ml7"] = $value["double"];
                    $this->data["double_t12_total_ml7"] = $value["DT1/2"];
                    $this->data["triple_total_ml7"] = $value["triple"];
                    
                    $this->data["early_total_ml7"] = $value["early"];
                    $this->data["aft_total_ml7"] = $value["afternoon"];
                    $this->data["night_total_ml7"] = $value["night"];
                    $this->data["_50_total_ml7"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml7"] = $value["normal"];
                    $this->data["t14_labour_ml7"] = $value["T1/4"];
                    $this->data["t12_labour_ml7"] = $value["T1/2"];
                    $this->data["double_labour_ml7"] = $value["double"];
                    $this->data["double_t12_labour_ml7"] = $value["DT1/2"];
                    $this->data["triple_labour_ml7"] = $value["triple"];
                    
                    $this->data["early_labour_ml7"] = $value["early"];
                    $this->data["aft_labour_ml7"] = $value["afternoon"];
                    $this->data["night_labour_ml7"] = $value["night"];
                    $this->data["_50_labour_ml7"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade8"]){
            $this->data["paycharge_ml8"] = $this->pr->getPayCharge_ml8($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml8"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml8"] = $value["normal"];
                    $this->data["t14_total_ml8"] = $value["T1/4"];
                    $this->data["t12_total_ml8"] = $value["T1/2"];
                    $this->data["double_total_ml8"] = $value["double"];
                    $this->data["double_t12_total_ml8"] = $value["DT1/2"];
                    $this->data["triple_total_ml8"] = $value["triple"];
                    
                    $this->data["early_total_ml8"] = $value["early"];
                    $this->data["aft_total_ml8"] = $value["afternoon"];
                    $this->data["night_total_ml8"] = $value["night"];
                    $this->data["_50_total_ml8"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml8"] = $value["normal"];
                    $this->data["t14_labour_ml8"] = $value["T1/4"];
                    $this->data["t12_labour_ml8"] = $value["T1/2"];
                    $this->data["double_labour_ml8"] = $value["double"];
                    $this->data["double_t12_labour_ml8"] = $value["DT1/2"];
                    $this->data["triple_labour_ml8"] = $value["triple"];
                    
                    $this->data["early_labour_ml8"] = $value["early"];
                    $this->data["aft_labour_ml8"] = $value["afternoon"];
                    $this->data["night_labour_ml8"] = $value["night"];
                    $this->data["_50_labour_ml8"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade9"]){
            $this->data["paycharge_ml9"] = $this->pr->getPayCharge_ml9($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml9"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml9"] = $value["normal"];
                    $this->data["t14_total_ml9"] = $value["T1/4"];
                    $this->data["t12_total_ml9"] = $value["T1/2"];
                    $this->data["double_total_ml9"] = $value["double"];
                    $this->data["double_t12_total_ml9"] = $value["DT1/2"];
                    $this->data["triple_total_ml9"] = $value["triple"];
                    
                    $this->data["early_total_ml9"] = $value["early"];
                    $this->data["aft_total_ml9"] = $value["afternoon"];
                    $this->data["night_total_ml9"] = $value["night"];
                    $this->data["_50_total_ml9"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml9"] = $value["normal"];
                    $this->data["t14_labour_ml9"] = $value["T1/4"];
                    $this->data["t12_labour_ml9"] = $value["T1/2"];
                    $this->data["double_labour_ml9"] = $value["double"];
                    $this->data["double_t12_labour_ml9"] = $value["DT1/2"];
                    $this->data["triple_labour_ml9"] = $value["triple"];
                    
                    $this->data["early_labour_ml9"] = $value["early"];
                    $this->data["aft_labour_ml9"] = $value["afternoon"];
                    $this->data["night_labour_ml9"] = $value["night"];
                    $this->data["_50_labour_ml9"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade9"]){
            $this->data["paycharge_ml9"] = $this->pr->getPayCharge_ml9($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml9"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml9"] = $value["normal"];
                    $this->data["t14_total_ml9"] = $value["T1/4"];
                    $this->data["t12_total_ml9"] = $value["T1/2"];
                    $this->data["double_total_ml9"] = $value["double"];
                    $this->data["double_t12_total_ml9"] = $value["DT1/2"];
                    $this->data["triple_total_ml9"] = $value["triple"];
                    
                    $this->data["early_total_ml9"] = $value["early"];
                    $this->data["aft_total_ml9"] = $value["afternoon"];
                    $this->data["night_total_ml9"] = $value["night"];
                    $this->data["_50_total_ml9"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml9"] = $value["normal"];
                    $this->data["t14_labour_ml9"] = $value["T1/4"];
                    $this->data["t12_labour_ml9"] = $value["T1/2"];
                    $this->data["double_labour_ml9"] = $value["double"];
                    $this->data["double_t12_labour_ml9"] = $value["DT1/2"];
                    $this->data["triple_labour_ml9"] = $value["triple"];
                    
                    $this->data["early_labour_ml9"] = $value["early"];
                    $this->data["aft_labour_ml9"] = $value["afternoon"];
                    $this->data["night_labour_ml9"] = $value["night"];
                    $this->data["_50_labour_ml9"] = $value["50%Shift"];
                }
            }
        }
        
        if($this->data["calcu"]["grade10"]){
            $this->data["paycharge_ml10"] = $this->pr->getPayCharge_ml10($trans_no, substr($this->data["calcu"]["calculator"], -1, 1));    
            
            foreach ($this->data["paycharge_ml10"] as $key => $value) {
                if($value["description"]=="TOTAL CASUAL HOURLY PAY"){
                    $this->data["normal_total_ml10"] = $value["normal"];
                    $this->data["t14_total_ml10"] = $value["T1/4"];
                    $this->data["t12_total_ml10"] = $value["T1/2"];
                    $this->data["double_total_ml10"] = $value["double"];
                    $this->data["double_t12_total_ml10"] = $value["DT1/2"];
                    $this->data["triple_total_ml10"] = $value["triple"];
                    
                    $this->data["early_total_ml10"] = $value["early"];
                    $this->data["aft_total_ml10"] = $value["afternoon"];
                    $this->data["night_total_ml10"] = $value["night"];
                    $this->data["_50_total_ml10"] = $value["50%Shift"];
                }
                if($value["description"]=="Labourpower Hourly Charge Rates"){
                    $this->data["normal_labour_ml10"] = $value["normal"];
                    $this->data["t14_labour_ml10"] = $value["T1/4"];
                    $this->data["t12_labour_ml10"] = $value["T1/2"];
                    $this->data["double_labour_ml10"] = $value["double"];
                    $this->data["double_t12_labour_ml10"] = $value["DT1/2"];
                    $this->data["triple_labour_ml10"] = $value["triple"];
                    
                    $this->data["early_labour_ml10"] = $value["early"];
                    $this->data["aft_labour_ml10"] = $value["afternoon"];
                    $this->data["night_labour_ml10"] = $value["night"];
                    $this->data["_50_labour_ml10"] = $value["50%Shift"];
                }
            }
        }
        $this->load->view("reports/print_paycharge_rate_client", $this->data);
    }
}
