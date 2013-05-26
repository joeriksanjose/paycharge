<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_paycharge_rate extends CI_Model 
{
    protected $table_name = "tbl_charge_rate";
    protected $table_payrate = "tbl_payrate";
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function getModernAwards()
    {
        $sql = 'SELECT ch.*, co.company_name '
              .'FROM tbl_charge_rate as ch '
              .'INNER JOIN tbl_company as co '
              .'ON ch.company_no = co.client_no where ch.trans_type <> 2';
              
        $result = $this->db->query($sql)->result_array();   
               
        return $result;
    }
    
    public function getChargeRate()
    {
        $sql = 'SELECT ch.*, co.company_name '
              .'FROM tbl_charge_rate as ch '
              .'INNER JOIN tbl_company as co '
              .'ON ch.company_no = co.client_no where ch.trans_type = 2';
              
        $result = $this->db->query($sql)->result_array();   
               
        return $result;
    }
    
    public function getModern($modern)
    {
        $this->db->select("*");
        $this->db->where(array("modern_award_no" => $modern));
        
        return $this->db->get("tbl_modern_award")->row_array();
    }
    
    public function getCharge($trans_no)
    {
        $this->db->select("*");
        $this->db->where(array("trans_no" => $trans_no));
        
        return $this->db->get("tbl_charge_rate")->row_array();
    }
    
    public function getCalc($trans_no){
        
        $this->db->select("*");
        $this->db->where(array("trans_no" => $trans_no));
        
        return $this->db->get("tbl_print_dialog_default_values")->row_array();
    }
    
    public function getMAllow($trans_no){
        
        $this->db->select("*");
        $this->db->where(array("trans_no" => $trans_no));
        
        return $this->db->get("tbl_m_allow")->result_array();
    }
    public function getPayCharge_ml1($trans_no, $calc_no){
        $this->db->select("*");
        $this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc_no));
        
        return $this->db->get("tbl_ml1")->result_array();
    }  
    
    public function getPayCharge_ml2($trans_no, $calc_no){
        $this->db->select("*");
        $this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc_no));
        
        return $this->db->get("tbl_ml2")->result_array();
    }
    
    public function getPayCharge_ml3($trans_no, $calc_no){
        $this->db->select("*");
        $this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc_no));
        
        return $this->db->get("tbl_ml3")->result_array();
    }
    
    public function getPayCharge_ml4($trans_no, $calc_no){
        $this->db->select("*");
        $this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc_no));
        
        return $this->db->get("tbl_ml4")->result_array();
    }
    
    public function getPayCharge_ml5($trans_no, $calc_no){
        $this->db->select("*");
        $this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc_no));
        
        return $this->db->get("tbl_ml5")->result_array();
    }
    
    public function getPayCharge_ml6($trans_no, $calc_no){
        $this->db->select("*");
        $this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc_no));
        
        return $this->db->get("tbl_ml6")->result_array();
    }
    
    public function getPayCharge_ml7($trans_no, $calc_no){
        $this->db->select("*");
        $this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc_no));
        
        return $this->db->get("tbl_ml7")->result_array();
    }
    
    public function getPayCharge_ml8($trans_no, $calc_no){
        $this->db->select("*");
        $this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc_no));
        
        return $this->db->get("tbl_ml8")->result_array();
    }
    
    public function getPayCharge_ml9($trans_no, $calc_no){
        $this->db->select("*");
        $this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc_no));
        
        return $this->db->get("tbl_ml9")->result_array();
    }
    
    public function getPayCharge_ml10($trans_no, $calc_no){
        $this->db->select("*");
        $this->db->where(array("trans_no" => $trans_no, "calc_no" => $calc_no));
        
        return $this->db->get("tbl_ml10")->result_array();
    }
}
