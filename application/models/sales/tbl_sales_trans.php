<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_sales_trans extends CI_Model 
{
    const MODERN_AWARD_TYPE = 1;
    const AGREEMENT_TYPE = 2;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function getTransaction($client_no, $type = self::MODERN_AWARD_TYPE)
    {
        $sql = 'SELECT ch.*, co.company_name '
              .'FROM tbl_charge_rate as ch '
              .'INNER JOIN tbl_company as co '
              .'ON ch.company_no = co.client_no '
              .'INNER JOIN tbl_state as s '
              .'ON co.state_no = s.state_no '
              .'WHERE ch.trans_type = ? AND co.client_no = ?';
              
        $res = $this->db->query($sql, array($type, $client_no));
        if (!$res) {
            throw new Exception("Database Error");
        }
        
        return $res->result_array();
    }
    
    public function searchTransaction($key, $client_no, $type = self::MODERN_AWARD_TYPE)
    {
        $sql = 'SELECT ch.*, co.company_name '
              .'FROM tbl_charge_rate as ch '
              .'INNER JOIN tbl_company as co '
              .'ON ch.company_no = co.client_no '
              .'INNER JOIN tbl_state as s '
              .'ON co.state_no = s.state_no '
              .'WHERE ch.trans_type = ? AND co.client_no = ? '
              .'AND ch.transaction_name LIKE "'.$key.'%"';
              
        $res = $this->db->query($sql, array($type, $client_no));
        if (!$res) {
            throw new Exception("Database Error");
        }
        
        return $res->result_array();
    }
}
