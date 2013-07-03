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
              .'exists (select modern_award_no from tbl_modern_award m ' 
              .'where r.trans_no = m.modern_award_no) '
              .'order by created_at';
              
        $result = $this->db->query($sql)->result_array();   
               
        return $result;
    }
    
    public function getChargeRate()
    {
        $date = date("Y-m-d");
        $sql = 'SELECT * '
              .'FROM tbl_rate_increase r '
              .'where created_at > '.$date.' and '
              .'exists (select transaction_name from tbl_charge_rate m ' 
              .'where r.trans_no = m.trans_no and m.trans_type = 2 )'
              .'order by created_at';
              
        $result = $this->db->query($sql)->result_array();   
               
        return $result;
    }
}
