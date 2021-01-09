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
    public function bulan($bulan, $nis)
    {
        $sql = "SELECT  count(if(bulan=$bulan AND nbm=$nis AND status='Hadir',  bulan, NULL)) as hadir,
                        count(if(bulan=$bulan AND nbm=$nis AND status='Izin',  bulan, NULL)) as izin
                FROM tbl_dh";
        $result = $this->db->query($sql);
        return $result->row();
    }
}
