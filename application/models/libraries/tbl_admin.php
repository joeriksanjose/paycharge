<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_admin extends CI_model{
    
    protected $table_name = "tbl_admin";
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function select_all_admin()
    {
        $this->db->select("id, admin_no, admin");
        
        $sql = $this->db->get($this->table_name)->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function search_admin($key)
    {
        $this->db->like("id", $key, "after");
        $this->db->or_like("admin_no", $key, "after");
        $this->db->or_like("admin", $key, "after");
        
        $this->db->select("id, admin_no, admin");
        
        $sql = $this->db->get($this->table_name)->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function checkTransno($post)
    {
        $this->db->select("admin_no");
        $this->db->where($post);
        
        return $this->db->get($this->table_name)->num_rows();
    }
    
    public function get_last_id()
    {
        $this->db->select("admin_no");
        $this->db->order_by("admin_no desc");
        
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            return 0;
        } else {
            return $sql;    
        }
        
        
    }
    
    public function get_admin($where)
    {
        $this->db->select("id, admin_no, admin");
        $this->db->where(array("id"=>$where));
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function save_admin($data)
    {
        $sql = $this->db->insert($this->table_name, $data);
        
        return $sql;
    }
    
    public function update_admin($data)
    {
        $where = array("id" => $data["id"]);
        $this->db->where($where);

        $sql = $this->db->update($this->table_name, $data);
        
        return $sql;
    }
    
    public function delete_admin($data)
    {
        $where = array("id" => $data);
        $this->db->where($where);
        $sql = $this->db->delete($this->table_name);
        
        return $sql;
    }
}

