<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_client_contacts extends CI_model{
    
    protected $table_name = "tbl_client_contacts";
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function save($data)
    {
        if ($this->getClientInfo($data["company_no"], $data["contact_no"])) {
            throw new Exception("record already added.");   
        }
        
        return $this->db->insert($this->table_name, $data);
    }
    
    public function delete($data)
    {
        $this->db->where($data);
        return $this->db->delete($this->table_name);
    }
    
    public function getAllClientInfo($contact_id)
    {
        $sql = 'SELECT comp.*, cc.company_no, cc.contact_no '
              .'FROM tbl_client_contacts as cc '
              .'INNER JOIN tbl_company as comp '
              .'ON cc.company_no = comp.client_no '
              .'WHERE cc.contact_no = ?';
              
        $result = $this->db->query($sql, array($contact_id))->result_array();
        
               
        return $result;
    }
    
    public function getAllContactInfo($id)
    {
        $sql = 'SELECT con.*, cc.company_no, cc.contact_no '
              .'FROM tbl_client_contacts as cc '
              .'INNER JOIN tbl_contacts as con '
              .'ON cc.contact_no = con.contact_no '
              .'WHERE cc.company_no = ?';
              
        $result = $this->db->query($sql, array($id))->result_array();
        
        return $result;
    }
    
    public function searchContactInfo($key, $company_no)
    {
        $sql = 'SELECT con.*, cc.company_no, cc.contact_no '
              .'FROM tbl_client_contacts as cc '
              .'INNER JOIN tbl_contacts as con '
              .'ON cc.contact_no = con.contact_no '
              .'WHERE cc.company_no = ? AND (last_name LIKE "'.$key.'%" '
              .'OR first_name LIKE "'.$key.'%" OR middle_name LIKE "'.$key.'%")';
              
        $result = $this->db->query($sql, array($company_no))->result_array();
        
        return $result;
    }
    
    public function deleteClientInfo($company_no, $contact_no)
    {
        $where = array(
            "company_no" => $company_no,
            "contact_no" => $contact_no
        );
        
        $this->db->where($where);
        
        return $this->db->delete($this->table_name);
    }
    
    public function getClientInfo($company_no, $contact_no)
    {
        $sql = 'SELECT comp.*, cc.company_no, cc.contact_no '
              .'FROM tbl_client_contacts as cc '
              .'INNER JOIN tbl_company as comp '
              .'ON cc.company_no = comp.client_no '
              .'WHERE cc.contact_no = ? AND comp.client_no = ?';
              
        $result = $this->db->query($sql, array($contact_no, $company_no))->row_array();
        
        return $result;
    }
}

