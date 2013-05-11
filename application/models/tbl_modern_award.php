<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_modern_award extends CI_Model 
{
    protected $table_name = "tbl_modern_award";
    
    function __construct()
    {
        parent::__construct();
    }
	
	public function getModernAwards()
	{
		return $this->db->get($this->table_name)->result_array();
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
    
    public function getAwardByAwardNo($award_no)
    {
        $this->db->where(array("modern_award_no" => $award_no));
        return $this->db->get($this->table_name)->row_array();
    }
    
    public function update($award_no, $data)
    {
        $this->db->where(array("modern_award_no" => $award_no));
        return $this->db->update($this->table_name, $data);
    }
    
    public function delete($award_no)
    {
        $this->db->where(array("modern_award_no" => $award_no));
        return $this->db->delete($this->table_name);
    } 
}
