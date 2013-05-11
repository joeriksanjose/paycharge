<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_contacts extends CI_model{
    
    protected $table_name = "tbl_contacts";
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function select_all_contacts()
    {
        $this->db->select("*");
        
        $sql = $this->db->get($this->table_name)->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function search_contacts($key)
    {
        $this->db->like("id", $key, "after");
        $this->db->or_like("contact_no", $key, "after");
        $this->db->or_like("last_name", $key, "after");
        $this->db->or_like("first_name", $key, "after");
        $this->db->or_like("middle_name", $key, "after");
        $this->db->or_like("contact_phone_no", $key, "after");
        
        $this->db->select("*");
        
        $sql = $this->db->get($this->table_name)->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function get_last_id()
    {
        $this->db->select("contact_no");
        $this->db->order_by("contact_no desc");
        
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            return 0;
        } else {
            return $sql;    
        }
        
        
    }
    
    public function get_contacts($where)
    {
        $this->db->select("*");
        $this->db->where(array("id" => $where));
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
        
    public function save_contacts($data)
    {
        unset($data["re_password"]);
        $sql = $this->db->insert($this->table_name, $data);
        
        return $sql;
    }
    
    public function update_contacts($data)
    {
        $where = array("id" => $data["id"]);
        $this->db->where($where);

        $sql = $this->db->update($this->table_name, $data);
        
        return $sql;
    }
    
    public function delete_contacts($data)
    {
        $where = array("id" => $data);
        $this->db->where($where);
        $sql = $this->db->delete($this->table_name);
        
        return $sql;
    }
    
    public function getContactByContactNo($contact_no)
    {
        $this->db->select("*");
        $this->db->where(array("contact_no" => $contact_no));
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
}

