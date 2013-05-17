<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_workcover extends CI_model{
    
    protected $table_name = "tbl_work_cover";
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function get_state()
    {
        $where=array("swi_active"=>1);
        $this->db->where($where);
        $this->db->select("state_no, state_name");
        
        $sql = $this->db->get("tbl_state")->result_array();
        
        return $sql;
    }
    
    public function select_all()
    {
        $this->db->select("w.id, w.work_cover_no, w.work_cover_code, w.work_cover, w.state_no, s.state_name");
        $this->db->from("tbl_work_cover w");
        $this->db->join("tbl_state s", "w.state_no=s.state_no", "inner_join");
        
        $sql = $this->db->get()->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function search($key)
    {
        $this->db->like("w.id", $key, "after");
        $this->db->or_like("w.work_cover_no", $key, "after");
        $this->db->or_like("w.work_cover_code", $key, "after");
        $this->db->or_like("w.work_cover", $key, "after");
        $this->db->or_like("s.state_name", $key, "after");
        
        $this->db->select("w.id, w.work_cover_no, w.work_cover_code, w.work_cover, w.state_no, s.state_name");
        $this->db->from("tbl_work_cover w");
        $this->db->join("tbl_state s", "w.state_no=s.state_no", "inner_join");
        
        $sql = $this->db->get()->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    public function get_last_id()
    {
        $this->db->select("work_cover_no");
        $this->db->order_by("work_cover_no desc");
        
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            return 0;
        } else {
            return $sql;    
        }   
    }
    
    public function get($where)
    {
        $this->db->select("id, work_cover_no, work_cover_code, work_cover, state_no");
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