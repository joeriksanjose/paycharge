<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pcs extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model("reports/tbl_rate_confirmation", "rc");
        $this->load->model("tbl_modern_award", "md");
        $this->load->model("libraries/tbl_contacts", "cont");
        $this->load->model("libraries/tbl_clients", "cli");
		$this->load->model("reports/tbl_paycharge_rate", "pr");
        $this->load->model("tbl_print_defaults", "pd");
        $this->load->library("user_session");
        
        $this->client_session = $this->user_session->checkClientSession();
        
        $this->data["title"] = "Client";
        $this->data["name"] = $this->client_session["contact_name"];
    }
    
    public function saveClientApplication(){
        
        $post = $this->input->post(null, true);
        if(isset($post["txt_others"])){
            $post["business_type"] = $post["txt_others"];
        }
        unset($post["rdo_others"]);
        unset($post["txt_others"]);
        $this->cli->saveClientApplication($post);
    }

    public function save(){

        $post = $this->input->post(null, true);
        $this->rc->saveForecast($post);
    }

    public function getRate(){

        $trans_no = $_POST["trans_no"];
        $grade = $_POST["grade"];

        $this->data["params"]["print"] = $this->rc->getPrint($trans_no);

        $this->data["params"]["print"]["_50_shift"] = $this->data["params"]["print"]["50_shift"];
        if($grade == "1"){
            if( $this->data["params"]["print"]["grade1"] ){
                $this->data["params"]["payrate"] = $this->rc->getPayrate($trans_no, "Grade 1");
                $this->data["params"]["ml"] = $this->rc->getML($trans_no, substr($this->data["params"]["print"]["calculator"], -1, 1), $grade);
                $this->data["params"]["ml"]["_50_shift"] = $this->data["params"]["ml"]["50%Shift"];
                $this->data["params"]["ml"]["T_12"] = $this->data["params"]["ml"]["T1/2"];
                $this->data["params"]["ml"]["DT_12"] = $this->data["params"]["ml"]["DT1/2"];
                $this->data["params"]["ml"]["T_14"] = $this->data["params"]["ml"]["T1/4"];
            }
        }
        elseif($grade == "2"){
            if( $this->data["params"]["print"]["grade2"] ){
                $this->data["params"]["payrate"] = $this->rc->getPayrate($trans_no, "Grade 2");
                $this->data["params"]["ml"] = $this->rc->getML($trans_no, substr($this->data["params"]["print"]["calculator"], -1, 1), $grade);
                $this->data["params"]["ml"]["_50_shift"] = $this->data["params"]["ml"]["50%Shift"];
                $this->data["params"]["ml"]["T_12"] = $this->data["params"]["ml"]["T1/2"];
                $this->data["params"]["ml"]["DT_12"] = $this->data["params"]["ml"]["DT1/2"];
                $this->data["params"]["ml"]["T_14"] = $this->data["params"]["ml"]["T1/4"];
            }
        }
        elseif($grade == "3"){
            if( $this->data["params"]["print"]["grade3"] ){
                $this->data["params"]["payrate"] = $this->rc->getPayrate($trans_no, "Grade 3");
                $this->data["params"]["ml"] = $this->rc->getML($trans_no, substr($this->data["params"]["print"]["calculator"], -1, 1), $grade);
                $this->data["params"]["ml"]["_50_shift"] = $this->data["params"]["ml"]["50%Shift"];
                $this->data["params"]["ml"]["T_12"] = $this->data["params"]["ml"]["T1/2"];
                $this->data["params"]["ml"]["DT_12"] = $this->data["params"]["ml"]["DT1/2"];
                $this->data["params"]["ml"]["T_14"] = $this->data["params"]["ml"]["T1/4"];
            }
        }
        elseif($grade == "4"){
            if( $this->data["params"]["print"]["grade4"] ){
                $this->data["params"]["ml"] = $this->rc->getML4($trans_no, substr($this->data["params"]["print"]["calculator"], -1, 1));
                $this->data["params"]["payrate"] = $this->rc->getPayrate($trans_no, "Grade 4");
                $this->data["params"]["ml"] = $this->rc->getML($trans_no, substr($this->data["params"]["print"]["calculator"], -1, 1), $grade);
                $this->data["params"]["ml"]["_50_shift"] = $this->data["params"]["ml"]["50%Shift"];
                $this->data["params"]["ml"]["T_12"] = $this->data["params"]["ml"]["T1/2"];
                $this->data["params"]["ml"]["DT_12"] = $this->data["params"]["ml"]["DT1/2"];
                $this->data["params"]["ml"]["T_14"] = $this->data["params"]["ml"]["T1/4"];
            }
        }
        elseif($grade == "5"){
            if( $this->data["params"]["print"]["grade5"] ){
                $this->data["params"]["payrate"] = $this->rc->getPayrate($trans_no, "Grade 5");
                $this->data["params"]["ml"] = $this->rc->getML($trans_no, substr($this->data["params"]["print"]["calculator"], -1, 1), $grade);
                $this->data["params"]["ml"]["_50_shift"] = $this->data["params"]["ml"]["50%Shift"];
                $this->data["params"]["ml"]["T_12"] = $this->data["params"]["ml"]["T1/2"];
                $this->data["params"]["ml"]["DT_12"] = $this->data["params"]["ml"]["DT1/2"];
                $this->data["params"]["ml"]["T_14"] = $this->data["params"]["ml"]["T1/4"];
            }
        }
        elseif($grade == "6"){
            if( $this->data["params"]["print"]["grade6"] ){
                $this->data["params"]["payrate"] = $this->rc->getPayrate($trans_no, "Grade 6");
                $this->data["params"]["ml"] = $this->rc->getML($trans_no, substr($this->data["params"]["print"]["calculator"], -1, 1), $grade);
                $this->data["params"]["ml"]["_50_shift"] = $this->data["params"]["ml"]["50%Shift"];
                $this->data["params"]["ml"]["T_12"] = $this->data["params"]["ml"]["T1/2"];
                $this->data["params"]["ml"]["DT_12"] = $this->data["params"]["ml"]["DT1/2"];
                $this->data["params"]["ml"]["T_14"] = $this->data["params"]["ml"]["T1/4"];
            }
        }
        elseif($grade == "7"){
            if( $this->data["params"]["print"]["grade7"] ){
                $this->data["params"]["payrate"] = $this->rc->getPayrate($trans_no, "Grade 7");
                $this->data["params"]["ml"] = $this->rc->getML($trans_no, substr($this->data["params"]["print"]["calculator"], -1, 1), $grade);
                $this->data["params"]["ml"]["_50_shift"] = $this->data["params"]["ml"]["50%Shift"];
                $this->data["params"]["ml"]["T_12"] = $this->data["params"]["ml"]["T1/2"];
                $this->data["params"]["ml"]["DT_12"] = $this->data["params"]["ml"]["DT1/2"];
                $this->data["params"]["ml"]["T_14"] = $this->data["params"]["ml"]["T1/4"];
            }
        }
        elseif($grade == "8"){
            if( $this->data["params"]["print"]["grade8"] ){
                $this->data["params"]["payrate"] = $this->rc->getPayrate($trans_no, "Grade 8");
                $this->data["params"]["ml"] = $this->rc->getML($trans_no, substr($this->data["params"]["print"]["calculator"], -1, 1), $grade);
                $this->data["params"]["ml"]["_50_shift"] = $this->data["params"]["ml"]["50%Shift"];
                $this->data["params"]["ml"]["T_12"] = $this->data["params"]["ml"]["T1/2"];
                $this->data["params"]["ml"]["DT_12"] = $this->data["params"]["ml"]["DT1/2"];
                $this->data["params"]["ml"]["T_14"] = $this->data["params"]["ml"]["T1/4"];
            }
        }
        elseif($grade == "9"){
            if( $this->data["params"]["print"]["grade9"] ){
                $this->data["params"]["payrate"] = $this->rc->getPayrate($trans_no, "Grade 9");
                $this->data["params"]["ml"] = $this->rc->getML($trans_no, substr($this->data["params"]["print"]["calculator"], -1, 1), $grade);
                $this->data["params"]["ml"]["_50_shift"] = $this->data["params"]["ml"]["50%Shift"];
                $this->data["params"]["ml"]["T_12"] = $this->data["params"]["ml"]["T1/2"];
                $this->data["params"]["ml"]["DT_12"] = $this->data["params"]["ml"]["DT1/2"];
                $this->data["params"]["ml"]["T_14"] = $this->data["params"]["ml"]["T1/4"];
            }
        }
        elseif($grade == "10"){
            if( $this->data["params"]["print"]["grade10"] ){
                $this->data["params"]["payrate"] = $this->rc->getPayrate($trans_no, "Grade 10");
                $this->data["params"]["ml"] = $this->rc->getML($trans_no, substr($this->data["params"]["print"]["calculator"], -1, 1), $grade);
                $this->data["params"]["ml"]["_50_shift"] = $this->data["params"]["ml"]["50%Shift"];
                $this->data["params"]["ml"]["T_12"] = $this->data["params"]["ml"]["T1/2"];
                $this->data["params"]["ml"]["DT_12"] = $this->data["params"]["ml"]["DT1/2"];
                $this->data["params"]["ml"]["T_14"] = $this->data["params"]["ml"]["T1/4"];
            }
        }

        echo json_encode($this->data["params"]);
    }

    public function forecasting($company_no){
        
        $this->data["header"] = $this->load->view("client/header", $this->data, true);
        $this->data["footer"] = $this->load->view("client/footer", $this->data, true);

        $post["company_no"] = $company_no;
        $post["swi_process"] = 1;
        
        $this->data["get_award"] = $this->cont->getAward($post);
                    
        $this->load->view("client/print_rate_confirmation_new", $this->data); 
    }
        


    public function get_award_new($trans_no, $moder_no){
        

        $this->data["print"] = $this->rc->getPrint($moder_no);
        $this->data["charge_rate"] = $this->rc->getChargeRate($trans_no);
        $this->data["modern"] = $this->rc->getModern($moder_no);

        $this->data["trans_no"] = $trans_no;
        $this->data["modern_no"] = $moder_no;

        

        if( $this->data["print"]["grade1"] ){
            $this->data["ml1"] = $this->rc->getML1($trans_no, substr($this->data["print"]["calculator"], -1, 1));
            $this->data["payrate_1"] = $this->rc->getPayrate($trans_no, "Grade 1");
        }

        if( $this->data["print"]["grade2"] ){
            $this->data["ml2"] = $this->rc->getML2($trans_no, substr($this->data["print"]["calculator"], -1, 1));
            $this->data["payrate_2"] = $this->rc->getPayrate($trans_no, "Grade 2");
        }

        if( $this->data["print"]["grade3"] ){
            $this->data["ml3"] = $this->rc->getML3($trans_no, substr($this->data["print"]["calculator"], -1, 1));
            $this->data["payrate_3"] = $this->rc->getPayrate($trans_no, "Grade 3");
        }

        if( $this->data["print"]["grade4"] ){
            $this->data["ml4"] = $this->rc->getML4($trans_no, substr($this->data["print"]["calculator"], -1, 1));
            $this->data["payrate_4"] = $this->rc->getPayrate($trans_no, "Grade 4");
        }

        if( $this->data["print"]["grade5"] ){
            $this->data["ml5"] = $this->rc->getML5($trans_no, substr($this->data["print"]["calculator"], -1, 1));
            $this->data["payrate_5"] = $this->rc->getPayrate($trans_no, "Grade 5");
        }

        if( $this->data["print"]["grade6"] ){
            $this->data["ml6"] = $this->rc->getML6($trans_no, substr($this->data["print"]["calculator"], -1, 1));
            $this->data["payrate_6"] = $this->rc->getPayrate($trans_no, "Grade 6");
        }

        if( $this->data["print"]["grade7"] ){
            $this->data["ml7"] = $this->rc->getML7($trans_no, substr($this->data["print"]["calculator"], -1, 1));
            $this->data["payrate_7"] = $this->rc->getPayrate($trans_no, "Grade 7");
        }

        if( $this->data["print"]["grade8"] ){
            $this->data["ml8"] = $this->rc->getML8($trans_no, substr($this->data["print"]["calculator"], -1, 1));
            $this->data["payrate_8"] = $this->rc->getPayrate($trans_no, "Grade 8");
        }

        if( $this->data["print"]["grade9"] ){
            $this->data["ml9"] = $this->rc->getML9($trans_no, substr($this->data["print"]["calculator"], -1, 1));
            $this->data["payrate_9"] = $this->rc->getPayrate($trans_no, "Grade 9");
        }

        if( $this->data["print"]["grade10"] ){
            $this->data["ml10"] = $this->rc->getML10($trans_no, substr($this->data["print"]["calculator"], -1, 1));
            $this->data["payrate_10"] = $this->rc->getPayrate($trans_no, "Grade 10");
        }
        
    }

    public function index()
    {
        $this->data["header"] = $this->load->view("client/header", $this->data, true);
        $this->data["footer"] = $this->load->view("client/footer", $this->data, true);
        
		$this->data["get_company"] = $this->cont->getCompany($this->client_session["contact_no"]);
		$this->data["ok"] = 0;
        $this->load->view("client/client_index_view", $this->data);
    }
	
    public function current_rate($company)
    {
        $this->data["header"] = $this->load->view("client/header", $this->data, true);
        $this->data["footer"] = $this->load->view("client/footer", $this->data, true);
        
        $this->data["get_company"] = $this->cont->getCompany($this->client_session["contact_no"]);
        
        $this->data["company_no"] = $company;
        $this->data["company_info"] = $this->cli->getClientByClientNo($company);
        $this->data["get_award"] = $this->cont->getCurrentRates($company);
        $this->data["ok"] = 1;
        
        $this->load->view("client/client_index_view", $this->data);
    }
    
    public function history_rates($company)
    {
        $this->data["header"] = $this->load->view("client/header", $this->data, true);
        $this->data["footer"] = $this->load->view("client/footer", $this->data, true);
        
        $this->data["get_company"] = $this->cont->getCompany($this->client_session["contact_no"]);
        
        $this->data["company_no"] = $company;
        $this->data["company_info"] = $this->cli->getClientByClientNo($company);
        $this->data["get_award"] = $this->cont->getHistoryRates($company);
        $this->data["ok"] = 1;
        
        $this->load->view("client/client_index_view", $this->data);
    }
    
    public function pending_rates($company)
    {
        $this->data["header"] = $this->load->view("client/header", $this->data, true);
        $this->data["footer"] = $this->load->view("client/footer", $this->data, true);
        
        $this->data["get_company"] = $this->cont->getCompany($this->client_session["contact_no"]);
        
        $this->data["company_no"] = $company;
        $this->data["company_info"] = $this->cli->getClientByClientNo($company);
        $this->data["get_award"] = $this->cont->getPendingRates($company);
        $this->data["ok"] = 1;
        
        $this->load->view("client/client_index_view", $this->data);
    }
	
	public function client_application($company)
    {
        $this->data["header"] = $this->load->view("client/header", $this->data, true);
        $this->data["footer"] = $this->load->view("client/footer", $this->data, true);
        $this->data["company_no"] = $company;
        
        $this->data["get_company"] = $this->cont->getCompany($this->client_session["contact_no"]);
        
        $post["swi_process"] = 1;
        $post["company_no"] = $company;
        $this->data["get_award"] = $this->cont->getAward($post);
        $this->data["ok"] = 1;
        
        $this->load->view("client/client_application_view", $this->data);
    }
	
	public function terms_conditions($trans_no)
	{
	    $charge_rate = $this->pr->getCharge($trans_no);
        if (!$charge_rate) {
            show_404();
        }
        
        if ($charge_rate["trans_type"] == 1) {
            $trans_no = $charge_rate["modern_award_no"];
        }
        
	    $this->data["header"] = $this->load->view("client/header", $this->data, true);
        $this->data["footer"] = $this->load->view("client/footer", $this->data, true);
        
        $this->data["calcu"] = $this->pd->getPrintsByTransNo($trans_no);
        if($this->data["calcu"]["print_company_no"] == 1){
            $this->data["company"] = "Labourpower Recruitment Services";
        } else if($this->data["calcu"]["print_company_no"] == 2){
            $this->data["company"] = "LP Consulting Services";
        }
        
        $this->load->view("client/terms_and_conditions_view", $this->data);
	}
    
	public function charge_rate($trans_no, $modern_no){
		$this->data["header"] = $this->load->view("client/header", $this->data, true);
        $this->data["footer"] = $this->load->view("client/footer", $this->data, true);
        $this->data["is_approved"] = $this->session->userdata("is_approved");
        $this->session->unset_userdata("is_approved");
		$this->data["calcu"] = $this->pr->getCalc($modern_no);
        $this->data["modern"] = $this->pr->getModern($modern_no);
        $this->data["mallow"] = $this->pr->getMAllow($trans_no);
        $this->data["charge"] = $this->pr->getCharge($trans_no);
        
        if($this->data["calcu"]["print_company_no"] == 1){
            $this->data["company"] = "Labourpower Recruitment Services";
        } else if($this->data["calcu"]["print_company_no"] == 2){
            $this->data["company"] = "LP Consulting Services";
        }
        
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
		$this->load->view("client/rate_view", $this->data);
	}
	
    public function charge_rate_client($trans_no){
        $this->data["header"] = $this->load->view("client/header", $this->data, true);
        $this->data["footer"] = $this->load->view("client/footer", $this->data, true);
        $this->data["is_approved"] = $this->session->userdata("is_approved");
        $this->session->unset_userdata("is_approved");
        $this->data["calcu"] = $this->pr->getCalc($trans_no);
        if($this->data["calcu"]["print_company_no"] == 1){
            $this->data["company"] = "Labourpower Recruitment Services";
        } else if($this->data["calcu"]["print_company_no"] == 2){
            $this->data["company"] = "LP Consulting Services";
        }
        
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
        $this->load->view("client/rate_view_client", $this->data);
	}
	
	public function approve_rate()
    {
        $trans_no = $this->input->post("approve_trans_no", true);
        $rate_info = $this->cont->approveRate($trans_no);
        $this->session->set_userdata("is_approved", true);
        
        if ($rate_info) {
            $sql = "SELECT company_name FROM tbl_company WHERE client_no = ?";
            $company = $this->db->query($sql, array($rate_info["company_no"]))->row_array();
            $to = "jesanjose@gmail.com";
            $subject = "Notice to Payroll of rates being signed by a Client";
   
            $message = "The below client has approved their rates." 
                      ."Please advise the Branch Immediately.<br><br>"
                      ."Client Name : ".$company["company_name"]."<br>"
                      ."Contact Name : ".$this->client_session["contact_name"]."<br>"
                      ."Client No : ".$rate_info["company_no"]."<br>"; 
            
            $this->user_session->notifEmail($subject, $message, $to);
        } else {
            $this->session->set_userdata("is_approved", false);
        }
        
        redirect($_SERVER["HTTP_REFERER"]);
    }
	
	public function upcoming_rates($trans_no)
	{
	    $charge_rate = $this->pr->getCharge($trans_no);
        if (!$charge_rate) {
            show_404();
        }
        
        if ($charge_rate["modern_award_no"]) {
            $trans_no = $charge_rate["modern_award_no"];
        } 
	    
		$this->data["header"] = $this->load->view("client/header", $this->data, true);
        $this->data["footer"] = $this->load->view("client/footer", $this->data, true);
        
        $this->data["charge_rate"] = $charge_rate;
		$this->data["upcoming_rate"] = $this->md->getUpcomingRateIncrease($trans_no);
        
        $this->load->view("client/upcoming_rates_view", $this->data);
	}
	
	public function rates_history($trans_no)
	{
		$charge_rate = $this->pr->getCharge($trans_no);
        if (!$charge_rate) {
            show_404();
        }

        if ($charge_rate["modern_award_no"]) {
            $trans_no = $charge_rate["modern_award_no"];
        }
        
        $this->data["header"] = $this->load->view("client/header", $this->data, true);
        $this->data["footer"] = $this->load->view("client/footer", $this->data, true);
        
        $this->data["charge_rate"] = $charge_rate;
        $this->data["rates_history"] = $this->md->getRateIncreaseHistory($trans_no);
        
        $this->load->view("client/rate_history_view", $this->data);
	}
    
    /**
     * FORECASTING
     */
     
     public function saveForecast()
     {
         $grade = $_POST["grade"];
         $type = $_POST["type"];
         $data = $_POST["data"];
         $trans_no = $_POST["trans_no"];
         $trans_name = $_POST["trans_name"];
         // $days = $_POST["days"];
         
         $count = sizeof($data);
         
         $x=0;
         
         for ( $i = 0; $i < $count; $i++){
            
            if($x==10){
                $x = 0;
            }
            
            $arr_grade[$grade[$i]] = $grade[$i];
            
            if($type[$i] == "emp"){
                $arr_emp[$grade[$i]][$x] = $data[$i];
            } elseif($type[$i] == "hrs"){
                $arr_hrs[$grade[$i]][$x] = $data[$i];
            } elseif($type[$i] == "days"){
                $arr_days[$grade[$i]][$x] = $data[$i];
            } 
            
            $x++;
                
         }
         
         $post["trans_no"] = $trans_no;
         $post["trans_name"] = $trans_name;
         
         foreach($arr_grade as $key_grade => $grade){
            $post["grade"] = $grade;
            $post["type"] = "emp";
            $post["normal"] = $arr_emp[$key_grade][0];  
            $post["early"] = $arr_emp[$key_grade][1];  
            $post["afternoon"] = $arr_emp[$key_grade][2];  
            $post["night"] = $arr_emp[$key_grade][3];  
            $post["50_shift"] = $arr_emp[$key_grade][4];  
            $post["t_14"] = $arr_emp[$key_grade][5];  
            $post["t_12"] = $arr_emp[$key_grade][6];  
            $post["double"] = $arr_emp[$key_grade][7];  
            $post["dt_12"] = $arr_emp[$key_grade][8];  
            $post["triple"] = $arr_emp[$key_grade][9];  
            $emp = $this->rc->saveForecast($post);
         }
         
         foreach($arr_grade as $key_grade => $grade){
            $post["grade"] = $grade;
            $post["type"] = "hrs";
            $post["normal"] = $arr_hrs[$key_grade][0];  
            $post["early"] = $arr_hrs[$key_grade][1];  
            $post["afternoon"] = $arr_hrs[$key_grade][2];  
            $post["night"] = $arr_hrs[$key_grade][3];  
            $post["50_shift"] = $arr_hrs[$key_grade][4];  
            $post["t_14"] = $arr_hrs[$key_grade][5];  
            $post["t_12"] = $arr_hrs[$key_grade][6];  
            $post["double"] = $arr_hrs[$key_grade][7];  
            $post["dt_12"] = $arr_hrs[$key_grade][8];  
            $post["triple"] = $arr_hrs[$key_grade][9];  
            $hrs = $this->rc->saveForecast($post);
         }
         
         foreach($arr_grade as $key_grade => $grade){
            $post["grade"] = $grade;
            $post["type"] = "days";
            $post["normal"] = $arr_days[$key_grade][0];  
            $post["early"] = $arr_days[$key_grade][1];  
            $post["afternoon"] = $arr_days[$key_grade][2];  
            $post["night"] = $arr_days[$key_grade][3];  
            $post["50_shift"] = $arr_days[$key_grade][4];  
            $post["t_14"] = $arr_days[$key_grade][5];  
            $post["t_12"] = $arr_days[$key_grade][6];  
            $post["double"] = $arr_days[$key_grade][7];  
            $post["dt_12"] = $arr_days[$key_grade][8];  
            $post["triple"] = $arr_days[$key_grade][9];  
            $days =  $this->rc->saveForecast($post);
         }
         
         if($emp && $hrs && $days){
            echo json_encode(1);
         } else {
            echo json_encode(0);
         }
         
         
    }
     
     /* END FORECASTING */
}

/* End of file pcs.php */
/* Location: ./application/controllers/pcs.php */