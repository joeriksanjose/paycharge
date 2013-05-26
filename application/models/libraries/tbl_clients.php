<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_clients extends CI_model{
    
    protected $table_name = "tbl_company";
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function getAssignedClientsByStateNos($state_nos)
    {
        $sql = "SELECT comp.*, s.state_name FROM tbl_company as comp"
              ." INNER JOIN tbl_state as s ON comp.state_no = s.state_no WHERE comp.state_no in ($state_nos)";
        return $this->db->query($sql)->result_array();
    }
    
    public function searchClientByClientNo($key, $state_nos)
    {
        $sql = "SELECT comp.*, s.state_name FROM tbl_company as comp"
              ." INNER JOIN tbl_state as s ON comp.state_no = s.state_no WHERE comp.state_no in ($state_nos)"
              ." AND (comp.company_name LIKE ? OR comp.client_no LIKE ? OR comp.contact_first_name LIKE ?)";
        
        return $this->db->query($sql, array('%'.$key.'%', '%'.$key.'%', '%'.$key.'%'))->result_array();
    }
    
    public function getClientByClientNo($id)
    {
        $this->db->select("*");
        $this->db->where(array("client_no" => $id));
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function select_all_clients()
    {
        $this->db->select("*");
        
        $sql = $this->db->get($this->table_name)->result_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function search_clients($key)
    {
        $this->db->like("company_name", $key, "after");
        $this->db->or_like("department", $key, "after");
        $this->db->or_like("contact_first_name", $key, "after");
        $this->db->or_like("contact_full_name", $key, "after");
        $this->db->or_like("contact_title", $key, "after");
        $this->db->or_like("state_no", $key, "after");
        
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
    
    public function get_clients($where)
    {
        $this->db->select("*");
        $this->db->where(array("id" => $where));
        $sql = $this->db->get($this->table_name)->row_array();
        
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
    
    public function save_clients($data)
    {
        $sql = $this->db->insert($this->table_name, $data);
        
        return $sql;
    }
    
    public function update_clients($data)
    {
        $where = array("id" => $data["id"]);
        $this->db->where($where);

        $sql = $this->db->update($this->table_name, $data);
        
        return $sql;
    }
    
    public function delete_clients($data)
    {
        $where = array("id" => $data);
        $this->db->where($where);
        $sql = $this->db->delete($this->table_name);
        
        return $sql;
    }
    
    public function getAllClientInfo($contact_id)
    {
        $sql = 'SELECT cc.company_no, cc.contact_no'
              .'FROM tbl_client_contacts as cc'
              .'INNER JOIN tbl_company as comp'
              .'ON cc.company_no = comp.id'
              .'WHERE cc.contact_no = ?';
              
        $result = $this->db->query($sql, array($contact_id));
        
        if (!$result) {
            throw new Exception("Empty Record");
        }
        
        return $result->result_array();
    }
}

