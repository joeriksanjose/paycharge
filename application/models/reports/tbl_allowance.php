<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_allowance extends CI_Model 
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
        
        if ($state_no === null) {     
		    $result = $this->db->query($sql)->result_array();
        } else {
            $sql .= ' AND co.state_no IN ('.$state_no.')';
            $result = $this->db->query($sql)->result_array();
        }	
		       
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
              ."WHERE ch.trans_type <> 2 and (ch.trans_no like '$search%' or ch.transaction_name like '$search%'
               or ch.created_at like '$search%')";
        
        if ($state_no === null) {     
		    $result = $this->db->query($sql)->result_array();
        } else {
            $sql .= ' AND co.state_no IN ('.$state_no.')';
            $result = $this->db->query($sql)->result_array();
        }	
		       
        return $result;
	}

	public function getChargeRate($trans_no)
	{
		$this->db->where(array("trans_no" => $trans_no));
		return $this->db->get("tbl_charge_rate")->row_array();
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
        
        if ($state_no === null) {
            $result = $this->db->query($sql)->result_array();
        } else {
            $sql .= ' AND co.state_no IN ('.$state_no.')';
            $result = $this->db->query($sql)->result_array();
        }
        
               
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
              ."WHERE ch.trans_type = 2 and (ch.trans_no like '$search%' or ch.transaction_name like '$search%'
               or ch.created_at like '$search%')";
        
        if ($state_no === null) {
            $result = $this->db->query($sql)->result_array();
        } else {
            $sql .= ' AND co.state_no IN ('.$state_no.')';
            $result = $this->db->query($sql)->result_array();
        }
        
               
        return $result;
	}
	public function getModern($trans_no)
	{
		$this->db->where(array("modern_award_no" => $trans_no));
		return $this->db->get("tbl_modern_award")->row_array();
	}
	
    
	
	public function getAllow($trans_no)
	{
		
		$this->db->where(array("trans_no" => $trans_no));
		$this->db->order_by("cell_no");
		return $this->db->get("tbl_m_allow")->result_array();
	}
	
}
