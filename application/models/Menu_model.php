<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
                FROM `user_sub_menu` JOIN `user_menu`
                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ";

        return $this->db->query($query)->result_array();
    }

    public function getJurusan()
    {
        $query = "SELECT `master`.*,`tbl_jurusan`.`jurusan`
                   FROM `master` JOIN `tbl_jurusan`
                     ON `master`.`jurusan` = `tbl_jurusan`.`id_jurusan` 
        ";
        return $this->db->query($query)->result_array();
    }

    public function getKelas()
    {
        $query = " SELECT `bendahara_master`.*,`tbl_kelas`.`kelas`
                    FROM `bendahara_master` JOIN `tbl_kelas`
                    ON  `bendahara_master`.`kelas` = `tbl_kelas`.`id`
        ";
        return $this->db->query($query)->result_array();
    }
}
