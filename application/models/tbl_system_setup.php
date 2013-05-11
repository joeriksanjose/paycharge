<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_system_setup extends CI_model{
    
    protected $table_name = "tbl_system_setup";
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function select_company1()
    {
        $where = array("id"=>"1");
        $this->db->select("company_no, company_name, company_owner, c_address, contact_details, logo");
        $this->db->where($where);
        
        $sql = $this->db->get($this->table_name)->row_array();
        
        if(!$sql)
        {
            throw new Exception("Error : Cannot retrieve data.");
            
        }
        
        return $sql;
    }
    
    public function update_company1($data)
    {
        $where = array("id"=>"1");
        $this->db->where($where);
        $sql = $this->db->update($this->table_name, $data);
        
        return $sql;
    }
	
	public function select_company2()
    {
        $where = array("id"=>"2");
        $this->db->select("company_no, company_name, company_owner, c_address, contact_details, logo");
        $this->db->where($where);
        
        $sql = $this->db->get($this->table_name)->row_array();
        
        if(!$sql)
        {
            throw new Exception("Error : Cannot retrieve data.");
            
        }
        
        return $sql;
    }
    
    public function update_company2($data)
    {
        $where = array("id"=>"2");
        $this->db->where($where);
        $sql = $this->db->update($this->table_name, $data);
        
        return $sql;
    }
}

?>