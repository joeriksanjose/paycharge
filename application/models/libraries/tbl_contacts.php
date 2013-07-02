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
        $this->db->where(array("contact_no" => $where));
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
    
    public function updateContactByContactNo($data)
    {
        $where = array("contact_no" => $data["contact_no"]);
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
    
    public function checkTransno($post)
    {
        $this->db->select("contact_no");
        $this->db->where($post);
        
        return $this->db->get($this->table_name)->num_rows();
    }
    
    /* log in clients */
    public function checkClientLogin($post)
    {
        $where = array(
            "username" => $post["username"],
            "password" => $post["password"]
        );
        
        $this->db->where($where);
        
        return $this->db->get($this->table_name)->row_array();
    }
    
    public function getCompany($contact_no){
        
        $query = "select c.* from tbl_company c inner join tbl_client_contacts cc "
                ."on c.client_no = cc.company_no where cc.contact_no = '$contact_no'";
                
        return $this->db->query($query)->result_array();
    }
    
    public function getAward($post){
        $where2 = array("swi_process" => 1);
        $this->db->where($post);
        $this->db->where($where2);
        return $this->db->get("tbl_charge_rate")->result_array();
    }
    
    public function getUpcomingRates($trans_no)
    {
        $date = date("Y-m-d");
        $sql = "SELECT * "
              ."FROM tbl_rate_increase r "
              ."where created_at >= ? and "
              ."trans_no = ? "
              ."order by created_at";
              
        $result = $this->db->query($sql, array($date, $trans_no))->result_array();   
               
        return $result;
    }
    
    public function getRateHistory($trans_no)
    {
        $date = date("Y-m-d");
        $sql = "SELECT * "
              ."FROM tbl_rate_increase r "
              ."where created_at <= ? and "
              ."trans_no = ? "
              ."order by created_at";
              
        $result = $this->db->query($sql, array($date, $trans_no))->result_array();   
               
        return $result;
    }
    
    public function approveRate($trans_no)
    {
        $sql = "UPDATE tbl_charge_rate set is_approved = 1 WHERE trans_no = ?";
        if ($this->db->query($sql, array($trans_no))) {
            $sql2 = "SELECT company_no FROM tbl_charge_rate WHERE trans_no = ?";
            return $this->db->query($sql2, array($trans_no))->row_array();
        }
        
        return false;
    }
    /* end log in clients */
}

