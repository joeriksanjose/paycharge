<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_rate_confirmation extends CI_Model 
{
    protected $table_name = "tbl_charge_rate";
    protected $table_payrate = "tbl_payrate";
    
    function __construct()
    {
        parent::__construct();
    }
	
	public function getModernAwards()
	{
		$sql = 'SELECT ch.*, co.company_name '
              .'FROM tbl_charge_rate as ch '
              .'INNER JOIN tbl_company as co '
              .'ON ch.company_no = co.client_no where ch.trans_type <> 2';
              
		// if($sql){
			$result = $this->db->query($sql)->result_array();	
		// } else {
			// $result = 0;
		// }
        
        
               
        return $result;
	}
	
	public function getClient()
	{
		$sql = 'SELECT ch.*, co.company_name '
              .'FROM tbl_charge_rate as ch '
              .'INNER JOIN tbl_company as co '
              .'ON ch.company_no = co.client_no where ch.trans_type = 2';
              
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
