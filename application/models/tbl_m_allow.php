<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_m_allow extends CI_Model 
{
    protected $table_name = "tbl_m_allow";
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function saveMAllow($data)
    {
        return $this->db->insert($this->table_name, $data);
    }
    
    public function deleteMAllowByTransNo($trans_no)
    {
        $this->db->where(array("trans_no" => $trans_no));
        return $this->db->delete($this->table_name);
    }
}
