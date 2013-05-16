<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rate_confirmation extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("reports/tbl_rate_confirmation", "rc");
        $this->load->library("user_session");
		$this->user_session = $this->user_session->checkUserSession();
		$this->data["title"] = "System - Transactions";
		$this->data["username"] = $this->session->userdata("username");
		$this->data["is_admin"] = $this->user_session["is_admin"];
		$this->data["date_slash"] = mdate("%d/%m/%Y");
	}
	
	
	public function modern_award(){
		$this->data["header"] = $this->load->view("header", $this->data, true);
		$this->data["footer"] = $this->load->view("footer", $this->data, true);
        $this->data["status"] = $this->session->userdata("status");
        $this->data["status_msg"] = $this->session->userdata("status_message");
        $this->data["type"] = "Modern Award";
		
        $this->data["modern_awards"] = $this->rc->getModernAwards();
        
        $this->session->unset_userdata("status");
		
		$this->load->view("reports/rate_confirmation_view", $this->data);
	}
	
	public function client(){
		$this->data["header"] = $this->load->view("header", $this->data, true);
		$this->data["footer"] = $this->load->view("footer", $this->data, true);
        $this->data["status"] = $this->session->userdata("status");
        $this->data["status_msg"] = $this->session->userdata("status_message");
        $this->data["type"] = "Client Agreement";
		
        $this->data["modern_awards"] = $this->rc->getClient();
        
        $this->session->unset_userdata("status");
		
		$this->load->view("reports/rate_confirmation_client_view", $this->data);
	}
	
	public function print_modern($trans_no, $moder_no){
		$this->data["header"] = $this->load->view("header", $this->data, true);
		$this->data["footer"] = $this->load->view("footer", $this->data, true);
        
        $this->data["print"] = $this->rc->getPrint($moder_no);
		$this->data["charge_rate"] = $this->rc->getChargeRate($trans_no);
		$this->data["modern"] = $this->rc->getModern($moder_no);
		
		
		
		
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
		
		if( $this->data["print"]["grade1"] ){
			$this->data["grade1_active"] = "active";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";	
		} 
		
		elseif( $this->data["print"]["grade2"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "active";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";
		} 
		
		elseif( $this->data["print"]["grade3"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "active";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";
		} 
		
		elseif( $this->data["print"]["grade4"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "active";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";
		} 
		
		elseif( $this->data["print"]["grade5"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "active";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";
		} 
		
		elseif( $this->data["print"]["grade6"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "active";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";	
		} 
		
		elseif( $this->data["print"]["grade7"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "active";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";	
		} 
		
		elseif( $this->data["print"]["grade8"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "active";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";
		} 
		
		elseif( $this->data["print"]["grade9"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "active";
			$this->data["grade10_active"] = "";	
		} 
		
		elseif( $this->data["print"]["grade10"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "active";	
		}
		$this->load->view("reports/print_rate_confirmation", $this->data);
	}
	
	public function print_client($trans_no){
		$this->data["header"] = $this->load->view("header", $this->data, true);
		$this->data["footer"] = $this->load->view("footer", $this->data, true);
        
        $this->data["print"] = $this->rc->getPrint($trans_no);
		$this->data["charge_rate"] = $this->rc->getChargeRate($trans_no);
		
		
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
		
		if( $this->data["print"]["grade1"] ){
			$this->data["grade1_active"] = "active";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";	
		} 
		
		elseif( $this->data["print"]["grade2"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "active";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";
		} 
		
		elseif( $this->data["print"]["grade3"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "active";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";
		} 
		
		elseif( $this->data["print"]["grade4"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "active";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";
		} 
		
		elseif( $this->data["print"]["grade5"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "active";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";
		} 
		
		elseif( $this->data["print"]["grade6"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "active";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";	
		} 
		
		elseif( $this->data["print"]["grade7"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "active";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";	
		} 
		
		elseif( $this->data["print"]["grade8"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "active";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "";
		} 
		
		elseif( $this->data["print"]["grade9"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "active";
			$this->data["grade10_active"] = "";	
		} 
		
		elseif( $this->data["print"]["grade10"] ){
			$this->data["grade1_active"] = "";
			$this->data["grade2_active"] = "";
			$this->data["grade3_active"] = "";
			$this->data["grade4_active"] = "";
			$this->data["grade5_active"] = "";
			$this->data["grade6_active"] = "";
			$this->data["grade7_active"] = "";
			$this->data["grade8_active"] = "";
			$this->data["grade9_active"] = "";
			$this->data["grade10_active"] = "active";	
		}
		$this->load->view("reports/print_rate_confirmation_client", $this->data);
	}
}
