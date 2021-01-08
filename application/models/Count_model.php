<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Count_model extends CI_Model
{
    public function CountDHK($id_kegiatan)
    {
        $sql = "SELECT  count(if(id_kegiatan=$id_kegiatan, id_kegiatan, NULL)) as countDHK
                FROM tbl_dh_kegiatan";
        $result = $this->db->query($sql);
        return $result->row();
    }
}
