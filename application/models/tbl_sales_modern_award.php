<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_sales_modern_award extends CI_Model 
{
    protected $table_name = "tbl_modern_award";
    
    function __construct()
    {
        parent::__construct();
    }
    
	public function getAllModernAwards(){
		$sql = "select distinct trans_no, transaction_name ";
		$sql .= "from tbl_charge_rate where trans_type = 1 order by trans_no";
		
		return $this->db->query($sql)->result_array();
	}
	
	public function getAllModernAwardsPerCompany($company_no){
		$sql = "select trans_no, transaction_name ";
		$sql .= "from tbl_charge_rate where trans_type = 1 and company_no = '$company_no' order by trans_no";
		
		return $this->db->query($sql)->result_array();
	}
		
	public function getAllClientAgreement(){
		$sql = "select distinct trans_no, transaction_name ";
		$sql .= "from tbl_charge_rate where trans_type = 2 order by trans_no";
		
		return $this->db->query($sql)->result_array();
	}
	
	public function getAllClientAgreementPerCompany($company_no){
		$sql = "select distinct trans_no, transaction_name ";
		$sql .= "from tbl_charge_rate where trans_type = 2 and company_no = '$company_no' order by trans_no";
		
		return $this->db->query($sql)->result_array();
	}
	
    public function processSalesModern($where){
        
        $this->db->where($where);
        return $this->db->update("tbl_charge_rate", array("swi_process" => 1));
        
    }
    
    public function get_charge_rate_info($where){
        $this->db->where($where);
        return $this->db->get("tbl_charge_rate")->row_array();
    }
    
    public function get_payrate_info($where){
        
        $this->db->where($where);
        return $this->db->get("tbl_payrate")->result_array();
    }
	
	public function get_company_info($where){
		
		$this->db->where($where);
		return $this->db->get("tbl_company")->row_array();
	}
	
	public function get_workcover_info($where){
		
		$this->db->where($where);
		return $this->db->get("tbl_work_cover")->row_array();
	}
	
	public function get_effective_date($where){
		
		$this->db->where($where);
		return $this->db->get("tbl_super")->row_array();
	}
	
	public function getModernAwards()
	{
	    $this->db->order_by("modern_award_name");
		return $this->db->get($this->table_name)->result_array();
	}
	
	public function get_modern_info($where)
	{
		$this->db->where($where);
		return $this->db->get("tbl_modern_award")->row_array();
	}
	
	public function getSuper()
	{
		$this->db->order_by("effective_date desc");
		return $this->db->get("tbl_super")->result_array();
	}
	
	public function getWorkcover($where)
	{
		$this->db->where(array("state_no" => $where));
		return $this->db->get("tbl_work_cover")->result_array();
	}
	
	public function getTax($where)
	{
		$this->db->where(array("state_no" => $where));
		return $this->db->get("tbl_state")->row_array();
	}
	
	public function getPositionNameById($id)
	{
		$this->db->where(array("id" => $id));
		$pos = $this->db->get("tbl_position")->row_array();
		
		if (!$pos) {
			return "";
		}
		
		return $pos["position"];
	}
	
	public function getPublicLiability()
	{
		return $this->db->get("tbl_public")->result_array();
	}
	
	public function getInsurance()
	{
		return $this->db->get("tbl_insurance")->result_array();
	}
	
	public function getLongService()
	{
		return $this->db->get("tbl_long_services")->result_array();
	}
	
	public function getPosition()
	{
		return $this->db->get("tbl_position")->result_array();
	}
	
	public function getCompany($state_no)
	{
		$sql = "SELECT comp.*, s.state_name FROM tbl_company as comp "
              ."INNER JOIN tbl_state as s ON comp.state_no = s.state_no";
        
        return $this->db->query($sql)->result_array();
	}
	
	public function getAdmin()
	{
		return $this->db->get("tbl_admin")->result_array();
	}
	
    public function getTransNo()
    {
        $this->db->order_by("trans_no desc");
        $res = $this->db->get("tbl_charge_rate")->row_array();
        
        if ($res) {
            return $res["trans_no"] + 1;
        }
        
        return 1;
    }
    
    public function update($trans_no, $data)
    {
        $this->db->where(array("trans_no" => $trans_no));
        return $this->db->update("tbl_charge_rate", $data);
    }
    
    public function save($data)
    {
        return $this->db->insert("tbl_charge_rate", $data);
    }
	
	public function savePayRate($data)
	{
		return $this->db->insert("tbl_payrate", $data);
	}
    
    public function saveTblMl($index, $data)
    {
        return $this->db->insert("tbl_ml".$index, $data);
    }
    
    public function getSalesModernAwards($state_no)
    {
        $sql = 'SELECT ch.*, co.company_name '
              .'FROM tbl_charge_rate as ch '
              .'INNER JOIN tbl_company as co '
              .'ON ch.company_no = co.client_no '
              .'INNER JOIN tbl_state as s '
              .'ON co.state_no = s.state_no '
              .'WHERE ch.trans_type = 1 AND co.state_no IN ('.$state_no.')';
              
        $result = $this->db->query($sql)->result_array();
        
               
        return $result;
    }
    
    public function deleteSalesModernAward($trans_no)
    {
        $this->db->where(array("trans_no" => $trans_no));
        if (!$this->db->delete("tbl_charge_rate")) {
            return false;
        }
        
        $this->db->where(array("trans_no" => $trans_no));
        if (!$this->db->delete("tbl_payrate")) {
            return false;
        }
        
        for ($i = 1; $i <= 10; $i++) {
            $this->db->where(array("trans_no" => $trans_no));
            if (!$this->db->delete("tbl_ml".$i)) {
                return false;
            }
        }
        
        return true;
    }
    
    public function deleteSalesModernAward2($trans_no)
    {
        $this->db->where(array("trans_no" => $trans_no));
        if (!$this->db->delete("tbl_payrate")) {
            return false;
        }
        
        for ($i = 1; $i <= 10; $i++) {
            $this->db->where(array("trans_no" => $trans_no));
            if (!$this->db->delete("tbl_ml".$i)) {
                return false;
            }
        }
        
        return true;
    }
    
    public function searchSalesModernAward($key)
    {
        $sql = 'SELECT ch.*, co.company_name '
              .'FROM tbl_charge_rate as ch '
              .'INNER JOIN tbl_company as co '
              .'ON ch.company_no = co.client_no '
              .'WHERE ch.trans_no LIKE "'.$key.'%" '
              .'OR ch.transaction_name LIKE "'.$key.'%"';
              
        if (trim($key) == "%") {
            $sql = 'SELECT ch.*, co.company_name '
              .'FROM tbl_charge_rate as ch '
              .'INNER JOIN tbl_company as co '
              .'ON ch.company_no = co.client_no '
              .'WHERE ch.trans_type = 1';
        }
              
        return $this->db->query($sql)->result_array();
    }
    
    public function getMl($index, $trans_no)
    {
        $sql = "select * from tbl_ml{$index} where trans_no = {$trans_no}";
        return $this->db->query($sql)->result_array();
    }
    
    public function getPayRate($trans_no)
    {
        $sql = "select * from tbl_payrate where trans_no = {$trans_no}";
        return $this->db->query($sql)->result_array();
    }
}
