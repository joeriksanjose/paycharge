<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_insurance extends CI_model{
    
    protected $table_name = "tbl_insurance";
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function select_all_insurance()
    {
        $this->db->select("id, insurance_no, insurance");
        
        $sql = $this->db->get($this->table_name)->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function search_insurance($key)
    {
        $this->db->like("id", $key, "after");
        $this->db->or_like("insurance_no", $key, "after");
        $this->db->or_like("insurance", $key, "after");
        
        $this->db->select("id, insurance_no, insurance");
        
        $sql = $this->db->get($this->table_name)->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function checkTransno($post)
    {
        $this->db->select("insurance_no");
        $this->db->where($post);
        
        return $this->db->get($this->table_name)->num_rows();
    }
    
    public function get_last_id()
    {
        $this->db->select("insurance_no");
        $this->db->order_by("insurance_no desc");
        
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            return 0;
        } else {
            return $sql;    
        }
        
        
    }
    
    public function get_insurance($where)
    {
        $this->db->select("id, insurance_no, insurance");
        $this->db->where(array("id"=>$where));
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function save_insurance($data)
    {
        $sql = $this->db->insert($this->table_name, $data);
        
        return $sql;
    }
    
    public function update_insurance($data)
    {
        $where = array("id" => $data["id"]);
        $this->db->where($where);

        $sql = $this->db->update($this->table_name, $data);
        
        return $sql;
    }
    
    public function delete_insurance($data)
    {
        $where = array("id" => $data);
        $this->db->where($where);
        $sql = $this->db->delete($this->table_name);
        
        return $sql;
    }
}

