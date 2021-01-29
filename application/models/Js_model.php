<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Js_model extends CI_Model
{
    function getKelas($jurusan)
    {
        $this->db->order_by('kelas', 'ASC');
        $this->db->where('jurusan', $jurusan);
        $result = $this->db->get('tbl_kelas')->result();
        return $result;
    }
}
