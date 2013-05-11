<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_print_defaults extends CI_Model 
{
    protected $table_name = "tbl_print_dialog_default_values";
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function save($data)
    {
        return $this->db->insert($this->table_name, $data);
    }
    
    public function getPrintsByTransNo($award_no)
    {
        $this->db->where(array("trans_no" => $award_no));
        return $this->db->get($this->table_name)->row_array();
    }
    
    public function update($award_no, $data)
    {
        $this->db->where(array("trans_no" => $award_no));
        return $this->db->update($this->table_name, $data);
    }
    
    public function delete($award_no)
    {
        $this->db->where(array("trans_no" => $award_no));
        return $this->db->delete($this->table_name);
    }
}
