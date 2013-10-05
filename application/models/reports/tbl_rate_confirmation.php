<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_rate_confirmation extends CI_Model 
{
    protected $table_name = "tbl_charge_rate";
    protected $table_payrate = "tbl_payrate";
    
    function __construct()
    {
        parent::__construct();
    }
	
	public function getModernAwards($state_no = null)
    {
         $sql = 'SELECT ch.*, co.company_name '
              .'FROM tbl_charge_rate as ch '
              .'INNER JOIN tbl_company as co '
              .'ON ch.company_no = co.client_no '
              .'INNER JOIN tbl_state as s '
              .'ON co.state_no = s.state_no '
              .'WHERE ch.trans_type <> 2';
        
        if ($state_no !== null) {
            $sql .= ' AND co.state_no IN ('.$state_no.')';
        }
              
        $result = $this->db->query($sql)->result_array();   
               
        return $result;
    }
	
	public function searchModernAwards($search, $state_no = null)
    {
         $sql = "SELECT ch.*, co.company_name "
              ."FROM tbl_charge_rate as ch "
              ."INNER JOIN tbl_company as co "
              ."ON ch.company_no = co.client_no "
              ."INNER JOIN tbl_state as s "
              ."ON co.state_no = s.state_no "
              ."WHERE ch.trans_type <> 2 and (ch.modern_award_no like '$search%'  "
			  ." or ch.transaction_name like '$search%' or ch.created_at like '$search%') ";
        
        if ($state_no !== null) {
            $sql .= " AND co.state_no IN ('.$state_no.')";
        }
              
        $result = $this->db->query($sql)->result_array();   
               
        return $result;
    }
	
	public function getClient($state_no = null)
    {
        $sql = 'SELECT ch.*, co.company_name '
              .'FROM tbl_charge_rate as ch '
              .'INNER JOIN tbl_company as co '
              .'ON ch.company_no = co.client_no '
              .'INNER JOIN tbl_state as s '
              .'ON co.state_no = s.state_no '
              .'WHERE ch.trans_type = 2';
              
        if ($state_no !== null) {
            $sql .= ' AND co.state_no IN ('.$state_no.')';
        }
              
        $result = $this->db->query($sql)->result_array();
        
               
        return $result;
    }
	
	public function searchClient($search, $state_no = null)
    {
        $sql = "SELECT ch.*, co.company_name "
              ."FROM tbl_charge_rate as ch "
              ."INNER JOIN tbl_company as co "
              ."ON ch.company_no = co.client_no "
              ."INNER JOIN tbl_state as s "
              ."ON co.state_no = s.state_no "
              ."WHERE ch.trans_type = 2 and (ch.modern_award_no like '$search%'  "
			  ."or ch.transaction_name like '$search%' or ch.created_at like '$search%') ";
              
        if ($state_no !== null) {
            $sql .= ' AND co.state_no IN ('.$state_no.')';
        }
              
        $result = $this->db->query($sql)->result_array();
        
               
        return $result;
    }
	public function getModern($trans_no)
	{
		$this->db->where(array("modern_award_no" => $trans_no));
		return $this->db->get("tbl_modern_award")->row_array();
	}
	
    public function getPrint($trans_no)
	{
		$this->db->where(array("trans_no" => $trans_no));
		return $this->db->get("tbl_print_dialog_default_values")->row_array();
	}
	
	public function getChargeRate($trans_no)
	{
		$this->db->where(array("trans_no" => $trans_no));
		return $this->db->get("tbl_charge_rate")->row_array();
	}
	
	public function getPayrate($trans_no, $grade)
	{
		$this->db->where(array("trans_no" => $trans_no, "grade" => $grade));
		return $this->db->get("tbl_payrate")->row_array();
	}

    public function saveForecast($post){
        $this->db->insert("tbl_forecasting", $post);
    }

    public function getML($trans_no, $calc, $grade){
        $this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc, "cell_no" => "13"));
        return $this->db->get("tbl_ml".$grade)->row_array();
    }

	public function getML1($trans_no, $calc)
	{
		$this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc));
		$this->db->order_by("cell_no");
		return $this->db->get("tbl_ml1")->result_array();
	}
    
	public function getML2($trans_no, $calc)
	{
		$this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc));
		$this->db->order_by("cell_no");
		return $this->db->get("tbl_ml2")->result_array();
	}
	
	public function getML3($trans_no, $calc)
	{
		$this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc));
		$this->db->order_by("cell_no");
		return $this->db->get("tbl_ml3")->result_array();
	}
	
	public function getML4($trans_no, $calc)
	{
		$this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc));
		$this->db->order_by("cell_no");
		return $this->db->get("tbl_ml4")->result_array();
	}
	
	public function getML5($trans_no, $calc)
	{
		$this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc));
		$this->db->order_by("cell_no");
		return $this->db->get("tbl_ml5")->result_array();
	}
	
	public function getML6($trans_no, $calc)
	{
		$this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc));
		$this->db->order_by("cell_no");
		return $this->db->get("tbl_ml6")->result_array();
	}
	
	public function getML7($trans_no, $calc)
	{
		$this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc));
		$this->db->order_by("cell_no");
		return $this->db->get("tbl_ml7")->result_array();
	}
	
	public function getML8($trans_no, $calc)
	{
		$this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc));
		$this->db->order_by("cell_no");
		return $this->db->get("tbl_ml8")->result_array();
	}
	
	public function getML9($trans_no, $calc)
	{
		$this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc));
		$this->db->order_by("cell_no");
		return $this->db->get("tbl_ml9")->result_array();
	}
	
	public function getML10($trans_no, $calc)
	{
		$this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc));
		$this->db->order_by("cell_no");
		return $this->db->get("tbl_ml10")->result_array();
	}
}
