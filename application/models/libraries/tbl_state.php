<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_state extends CI_model{
    
    protected $table_name = "tbl_state";
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function select_all_state()
    {
        $this->db->select("id, state_no, state_name, swi_active, tax");
        $sql = $this->db->get($this->table_name)->result_array();
        
        return $sql;
    }
    
    public function search_state($key)
    {
        $this->db->like("id", $key, "after");
        $this->db->or_like("state_no", $key, "after");
        $this->db->or_like("state_name", $key, "after");
        $this->db->or_like("tax", $key, "after");
        
        $this->db->select("id, state_no, state_name, swi_active, tax");
        
        $sql = $this->db->get($this->table_name)->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    public function get_last_id()
    {
        $this->db->select("id");
        $this->db->order_by("id desc");
        
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            return 0;
        } else {
            return $sql;    
        }  
    }
    
    public function get_state($where)
    {
        $this->db->select("id, state_no, state_name, swi_active, tax");
        $this->db->where(array("id"=>$where));
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function get_state_4_clients($where)
    {
        $this->db->select("id, state_no, state_name, swi_active, tax");
        $this->db->where(array("state_no" => $where));
        $sql = $this->db->get($this->table_name)->row_array();
        
        return $sql;
    }
    
    public function select_all_state_4_clients()
    {
        $this->db->select("id, state_no, state_name, swi_active, tax");
        $sql = $this->db->get($this->table_name)->result_array();
        
        return $sql;
    }
    
    public function save_state($data)
    {
        $sql = $this->db->insert($this->table_name, $data);
        
        return $sql;
    }
    
    public function update_state($data)
    {
        $where = array("id"=>$data["id"]);
        $this->db->where($where);

        $sql = $this->db->update($this->table_name, $data);
        
        return $sql;
    }
    
    public function delete_state($data)
    {
        $where = array("id"=>$data);
        $this->db->where($where);
        $sql = $this->db->delete($this->table_name);
        
        return $sql;
    }
}

?>