<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_sales_modern_award extends CI_Model 
{
    protected $table_name = "tbl_modern_award";
    
    function __construct()
    {
        parent::__construct();
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
	
	public function getCompany()
	{
		return $this->db->get("tbl_company")->result_array();
	}
	
	public function getAdmin()
	{
		return $this->db->get("tbl_admin")->result_array();
	}
	
    public function getNextAwardNo()
    {
        $this->db->order_by("modern_award_no desc");
        $res = $this->db->get($this->table_name)->row_array();
        
        if ($res) {
            return $res["modern_award_no"] + 1;
        }
        
        return 1;
    }
    
    public function save($data)
    {
        return $this->db->insert($this->table_name, $data);
    }
}
