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
}
