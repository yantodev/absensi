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

    function cekTemplating($idpeg, $idCategory, $idSubCategory){
        $this->db->where('id_peg', $idpeg);
        $this->db->where('id_salary_category', $idCategory);
        $this->db->where('id_salary_sub_category', $idSubCategory);
        $result = $this->db->get('tbl_list_salary')->result();
        return $result;
    }
}