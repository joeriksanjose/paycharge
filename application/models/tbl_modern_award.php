<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_modern_award extends CI_Model 
{
    protected $table_name = "tbl_modern_award";
    protected $table_rate_increase = "tbl_rate_increase";
    
    function __construct()
    {
        parent::__construct();
    }
	
	public function getModernAwards()
	{
	    $this->db->order_by("modern_award_name");
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
    
    public function searchAward($key)
    {
        $this->db->like("modern_award_no", $key, "after");
        $this->db->or_like("modern_award_name", $key, "after");
        $this->db->order_by("modern_award_name");
        $this->db->select("*");
        
        return $this->db->get($this->table_name)->result_array();
    }
    
    /* RATE INCREASE */
    
    public function getUpcomingRateIncrease($modern_award_name)
    {
        $now = time();
        $this->db->where(array("transaction_name" => $modern_award_name));
        $rates = $this->db->get($this->table_rate_increase)->result_array();
        
        if (!$rates) {
            return array();
        }
        
        $upcoming_rate_increase = array();
        foreach ($rates as $rate) {
            if (strtotime($rate["created_at"]) > $now) {
                $upcoming_rate_increase[] = $rate;
            }            
        }
        
        return $upcoming_rate_increase;    
    }
    
    public function getRateIncreaseHistory($modern_award_name)
    {
        $now = time();
        $this->db->where(array("transaction_name" => $modern_award_name));
        $rates = $this->db->get($this->table_rate_increase)->result_array();
        
        if (!$rates) {
            return false;
        }
        
        $rate_increase_history = array();
        foreach ($rates as $rate) {
            if (strtotime($rate["created_at"]) < $now) {
                $rate_increase_history[] = $rate;
            }            
        }
        
        return $rate_increase_history;    
    }
    
    public function saveRate($data)
    {
        return $this->db->insert($this->table_rate_increase, $data);
    }
    
    public function updateRate($id, $data)
    {
        $this->db->where(array("id" => $id));
        return $this->db->update($this->table_rate_increase, $data);
    }
    
    public function deleteRate($id)
    {
        $this->db->where(array("id" => $id));
        return $this->db->delete($this->table_rate_increase);
    }
    
    public function getRateById($id)
    {
        $this->db->where(array("id" => $id));
        return $this->db->get($this->table_rate_increase)->row_array();
    }
    
    /* END RATE INCREASE */
}
