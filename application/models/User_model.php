<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    function getUserDetails($userId){
        $this->db->where('id',$userId);
        $result = $this->db->get('user')->result();
        return $result;
    }
    
    function update_access($id, $data){
        $this->db->where('id',$id);
        $this->db->update('user',$data);
        return TRUE;
    }
}