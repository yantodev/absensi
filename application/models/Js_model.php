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

    function presensiMasuk($nbm, $dateIn){
        $this->db->where('nbm', $nbm);
        $this->db->where('date_in', $dateIn);
        $result = $this->db->get('tbl_dh')->result();
        return $result;
    }

    function presensiPulang($nbm, $dateOut){
        $this->db->where('nbm', $nbm);
        $this->db->where('date_in', $dateOut);
        $result = $this->db->get('tbl_dh')->result();
        return $result;
    }

    function getDetailGukar($nbm){
        $this->db->where('nbm', $nbm);
         $result = $this->db->get('tbl_gukar')->result();
        return $result;
    }

    function getMotivasi($id){
        $this->db->where('id', $id);
        $result = $this->db->get('tbl_motivasi')->result();
        return $result;
    }

    function getEvent($date){
        $this->db->where('tgl', $date);
        $result = $this->db->get('tbl_kegiatan')->result();
        return $result;
    }

    function cekEvent($eventId){
        $this->db->where('id', $eventId);
        $result = $this->db->get('tbl_kegiatan')->result();
        return $result;
    }
    
    function getDetailDHEvent($userId, $eventId, $today){
        $this->db->where('no_id', $userId);
        $this->db->where('id_kegiatan', $eventId);
        $this->db->where('tgl', $today);
        $result = $this->db->get('tbl_dh_kegiatan')->result();
        return $result;
    }
}