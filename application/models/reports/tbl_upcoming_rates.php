<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_upcoming_rates extends CI_Model 
{
    protected $table_name = "tbl_charge_rate";
    protected $table_payrate = "tbl_payrate";
    
    function __construct()
    {
        parent::__construct();
    }
	
	public function getModernAwards()
	{
		$date = date("Y-m-d");
		$sql = 'SELECT * '
              .'FROM tbl_rate_increase r '
              .'where created_at > '.$date.' and '
			  .'exists (select modern_award_name from tbl_modern_award m ' 
			  .'where r.transaction_name = m.modern_award_name) '
			  .'order by created_at';
              
		$result = $this->db->query($sql)->result_array();	
		       
        return $result;
	}
	
	public function getChargeRate($trans_no)
	{
		$this->db->where(array("trans_no" => $trans_no));
		return $this->db->get("tbl_charge_rate")->row_array();
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
	
    
	
	public function getAllow($trans_no)
	{
		
		$this->db->where(array("trans_no" => $trans_no));
		$this->db->order_by("cell_no");
		return $this->db->get("tbl_m_allow")->result_array();
	}
	
}
