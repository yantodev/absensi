<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    function Jurusan()
    {
        return $this->db->get_where('tbl_jurusan')->result_array();
    }

    function Iduka($singkatan_jurusan)
    {
        $this->db->where('jurusan', $singkatan_jurusan);
        $result = $this->db->get('tbl_iduka')->result();
        return $result;
    }
    function alamatIduka($nama_instansi)
    {
        $this->db->where('iduka', $nama_instansi);
        $result = $this->db->get('tbl_iduka')->result();
        return $result;
    }
    function getNBM()
    {
        $this->db->order_by('nbm', 'ASC');
        return $this->db->get_where('tbl_gukar')->result_array();
    }
    function nama($nbm)
    {
        $this->db->where('nbm', $nbm);
        $result = $this->db->get('tbl_gukar')->result();
        return $result;
    }

    function getKegiatan()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('tbl_kegiatan')->result_array();
    }
}
