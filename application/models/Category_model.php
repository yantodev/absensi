<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    function getSubCategory($id)
    {
        $this->db->where('id_salary_category', $id);
        $result = $this->db->get('tbl_salary_sub_category')->result();
        return $result;
    }

    function getMasterSalary($id){
        $this->db->where('id_salary_sub_category', $id);
        $result = $this->db->get('tbl_master_salary')->result();
        return $result;
    }
}