<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_long_services extends CI_model{
    
    protected $table_name = "tbl_long_services";
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function select_all_long_services()
    {
        $this->db->select("id, long_services_no, long_services");
        
        $sql = $this->db->get($this->table_name)->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function search_long_services($key)
    {
        $this->db->like("id", $key, "after");
        $this->db->or_like("long_services_no", $key, "after");
        $this->db->or_like("long_services", $key, "after");
        
        $this->db->select("id, long_services_no, long_services");
        
        $sql = $this->db->get($this->table_name)->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function get_last_id()
    {
        $this->db->select("long_services_no");
        $this->db->order_by("long_services_no desc");
        
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            return 0;
        } else {
            return $sql;    
        }
        
        
    }
    
    public function get_long_services($where)
    {
        $this->db->select("id, long_services_no, long_services");
        $this->db->where(array("id"=>$where));
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function save_long_services($data)
    {
        $sql = $this->db->insert($this->table_name, $data);
        
        return $sql;
    }
    
    public function update_long_services($data)
    {
        $where = array("id" => $data["id"]);
        $this->db->where($where);

        $sql = $this->db->update($this->table_name, $data);
        
        return $sql;
    }
    
    public function delete_long_services($data)
    {
        $where = array("id" => $data);
        $this->db->where($where);
        $sql = $this->db->delete($this->table_name);
        
        return $sql;
    }
}

