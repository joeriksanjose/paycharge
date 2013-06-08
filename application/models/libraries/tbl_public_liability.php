<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_public_liability extends CI_model{
    
    protected $table_name = "tbl_public";
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function select_all_public()
    {
        $this->db->select("id, public_no, public_value");
        
        $sql = $this->db->get($this->table_name)->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function search_public($key)
    {
        $this->db->like("id", $key, "after");
        $this->db->or_like("public_no", $key, "after");
        $this->db->or_like("public_value", $key, "after");
        
        $this->db->select("id, public_no, public_value");
        
        $sql = $this->db->get($this->table_name)->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function checkTransno($post)
    {
        $this->db->select("public_no");
        $this->db->where($post);
        
        return $this->db->get($this->table_name)->num_rows();
    }
    
    public function get_last_id()
    {
        $this->db->select("public_no");
        $this->db->order_by("public_no desc");
        
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            return 0;
        } else {
            return $sql;    
        }
        
        
    }
    
    public function get_public($where)
    {
        $this->db->select("id, public_no, public_value");
        $this->db->where(array("id"=>$where));
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function save_public($data)
    {
        $sql = $this->db->insert($this->table_name, $data);
        
        return $sql;
    }
    
    public function update_public($data)
    {
        $where = array("id" => $data["id"]);
        $this->db->where($where);

        $sql = $this->db->update($this->table_name, $data);
        
        return $sql;
    }
    
    public function delete_public($data)
    {
        $where = array("id" => $data);
        $this->db->where($where);
        $sql = $this->db->delete($this->table_name);
        
        return $sql;
    }
}

