<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Salary_model extends CI_Model{
    function updateCategory($id, $data){
        $this->db->where('id', $id);
        $this->db->update('tbl_salary_category', $data);
        return TRUE;
    }
}