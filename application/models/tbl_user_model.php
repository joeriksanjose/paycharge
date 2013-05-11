<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_user_model extends CI_Model 
{
    protected $table_name = "tbl_users";
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function checkUser($user)
    {
        $username = $user["username"];
        $pass = $user["password"];
        
        // check if exist in database
        $this->db->where(array("username" => $username));
        $this->db->where(array("password" => $pass));
        
        return $this->db->get($this->table_name)->row_array();
    }
    
    public function addUser($user_info)
    {
        unset($user_info["c_password"]);
        return $this->db->insert($this->table_name, $user_info);
    }
    
    public function deleteUser($user_id)
    {
        $where = array("id" => $user_id);
        $this->db->where($where);
        
        return $this->db->delete($this->table_name);
    }
    
    public function getAllUsers()
    {
        return $this->db->get($this->table_name)->result_array();
    }
    
    public function isUsernameExist($username)
    {
        $this->db->where(array("username" => $username));
        $count = $this->db->get($this->table_name)->num_rows();
        
        return $count > 0 ? true : false ;
    }
    
    public function isUsernameExistForEdit($username)
    {
        $this->db->where(array("username" => $username));
        $count = $this->db->get($this->table_name)->num_rows();
        
        return $count > 1 ? true : false ;
    }
    
    public function getUserById($user_id)
    {
        $where = array("id" => $user_id);
        $this->db->where($where);
        $res = $this->db->get($this->table_name)->row_array();
        
        if (!$res) {
            throw new Exception("Error: Cannot retrieve user");
        }
        
        return $res;
    }
    
    public function updateById($user_id, $data)
    {
        $where = array("id" => $user_id);
        $new_data = array(
            "admin" => $data["e_admin"],
            "full_name" => $data["e_full_name"],
            "username" => $data["e_username"],
            "password" => $data["e_c_password"]
        );
        
        $this->db->where($where);
        return $this->db->update($this->table_name, $new_data);
    }
    
    public function isPasswordCorrect($user_id, $password)
    {
        $where = array("id" => $user_id, "password" => $password);
        
        $this->db->where($where);
        $count = $this->db->get($this->table_name)->num_rows();
        
        return $count > 0 ? true : false ;
    }
    
    public function searchUsers($key)
    {
        $this->db->like("username", $key, "after");
        $this->db->or_like("full_name", $key, "after");
        
        $sql = $this->db->get($this->table_name)->result_array();
        if (!$sql) {
            throw new Exception("Error : Cannot retrieve data.");
        }
        
        return $sql;
    }
}
