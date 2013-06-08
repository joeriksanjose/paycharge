<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_position extends CI_model{
    
    protected $table_name = "tbl_position";
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function select_all()
    {
        $this->db->select("id, position, description");
        
        $sql = $this->db->get($this->table_name)->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function search($key)
    {
        $this->db->like("position", $key, "after");
        $this->db->or_like("description", $key, "after");
        
        $this->db->select("id, position, description");
        
        $sql = $this->db->get($this->table_name)->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function checkPosition($post)
    {
        $this->db->select("position");
        $this->db->where($post);
        
        return $this->db->get($this->table_name)->num_rows();
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
    
    public function get($where)
    {
        $this->db->select("id, position, description");
        $this->db->where(array("id"=>$where));
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function save($data)
    {
        $sql = $this->db->insert($this->table_name, $data);
        
        return $sql;
    }
    
    public function update($data)
    {
        $where = array("id"=>$data["id"]);
        $this->db->where($where);

        $sql = $this->db->update($this->table_name, $data);
        
        return $sql;
    }
    
    public function delete($data)
    {
        $where = array("id"=>$data);
        $this->db->where($where);
        $sql = $this->db->delete($this->table_name);
        
        return $sql;
    }
}

?>