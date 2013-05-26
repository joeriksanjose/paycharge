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
    
    public function getChargeRate()
    {
        $date = date("Y-m-d");
        $sql = 'SELECT * '
              .'FROM tbl_rate_increase r '
              .'where created_at > '.$date.' and '
              .'exists (select transaction_name from tbl_charge_rate m ' 
              .'where r.transaction_name = m.transaction_name and m.trans_type = 2 )'
              .'order by created_at';
              
        $result = $this->db->query($sql)->result_array();   
               
        return $result;
    }
}
