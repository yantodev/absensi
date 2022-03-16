<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Salary_model extends CI_Model{
    function updateCategory($id, $data){
        $this->db->where('id', $id);
        $this->db->update('tbl_salary_category', $data);
        return TRUE;
    }

    function updateSubCategory($id, $data){
        $this->db->where('id', $id);
        $this->db->update('tbl_salary_sub_category', $data);
        return TRUE;
    }
    function updateMasterSalary($id, $data){
        $this->db->where('id', $id);
        $this->db->update('tbl_master_salary', $data);
        return TRUE;
    }
    function update_salary($id, $data){
        $this->db->where('id', $id);
        $this->db->update('tbl_list_salary', $data);
        return TRUE;
    }
}