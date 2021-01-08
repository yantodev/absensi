<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bendahara_model extends CI_Model
{
    public function getAllSiswa()
    {
        return $this->db->get('bendahara_master')->result_array();
    }

    public function kelas()
    {
        return $this->db->get('tbl_kelas')->result_array();
    }

    public function getAllData()
    {
        return $this->db->get('bendahara_data')->result_array();
    }
    public function getData($id)
    {
        return $this->db->get('bendahara_data', ['id' => $id])->row_array();
    }

    public function getAllKelas()
    {
        return $this->db->get('tbl_kelas')->result_array();
    }
    public function getKelasX()
    {
        return $this->db->get('tbl_x')->result_array();
    }
    public function getKelasXI()
    {
        return $this->db->get('tbl_xi')->result_array();
    }
    public function getKelasXII()
    {
        return $this->db->get('tbl_xii')->result_array();
    }

    public function tbl_pembayaran()
    {
        return $this->db->get('tbl_pembayaran')->result_array();
    }

    public function getKelas($kelas)
    {
        return $this->db->get_where('bendahara_master', ['kelas' => $kelas])->result_array();
    }

    public function getSiswaBy($id)
    {
        return $this->db->get_where('bendahara_master', ['id' => $id])->row_array();
    }

    public function Kekurangan()
    {
        $sql = "SELECT  SUM(if(kelas='X TKRO 1' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xtkro1,
                        SUM(if(kelas='X TKRO 2' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xtkro2,
                        SUM(if(kelas='X TBSM' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xtbsm,
                        SUM(if(kelas='X AKL' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xakl,
                        SUM(if(kelas='X OTKP 1' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xotkp1,
                        SUM(if(kelas='X OTKP 2' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xotkp2,
                        SUM(if(kelas='X BDP' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xbdp,
                        SUM(if(kelas='XI TKRO' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xitkro,
                        SUM(if(kelas='XI TBSM' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xitbsm,
                        SUM(if(kelas='XI AKL' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xiakl,
                        SUM(if(kelas='XI OTKP' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xiotkp,
                        SUM(if(kelas='XI BDP' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xibdp,
                        SUM(if(kelas='XII TKRO 1' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xiitkro1,
                        SUM(if(kelas='XII TKRO 2' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xiitkro2,
                        SUM(if(kelas='XII TBSM' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xiitbsm,
                        SUM(if(kelas='XII AKL 1' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xiiakl1,
                        SUM(if(kelas='XII AKL 2' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xiiakl2,
                        SUM(if(kelas='XII OTKP 1' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xiiotkp1,
                        SUM(if(kelas='XII OTKP 2' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xiiotkp2,
                        SUM(if(kelas='XII BDP' , tunggakan + spp_praktek + daftar_ulang + pas + dpp_muh + gedung + ukk + usek_akm + sukses_akm + wisuda + wakaf + pkl + seragam + pat, null)) as xiibdp
                FROM bendahara_master
        ";
        return $this->db->query($sql)->row();
    }

    public function editSiswa()
    {
        $data = [
            'nis' => htmlspecialchars($this->input->post('nis', true)),
            'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa', true)),
            'bln' => htmlspecialchars($this->input->post('bln', true)),
            'tunggakan' => htmlspecialchars($this->input->post('tunggakan', true)),
            'spp_praktek' => htmlspecialchars($this->input->post('spp_praktek', true)),
            'daftar_ulang' => htmlspecialchars($this->input->post('daftar_ulang', true)),
            'pas' => htmlspecialchars($this->input->post('pas', true)),
            'dpp_muh' => htmlspecialchars($this->input->post('dpp_muh', true)),
            'gedung' => htmlspecialchars($this->input->post('gedung', true)),
            'ukk' => htmlspecialchars($this->input->post('ukk', true)),
            'usek_akm' => htmlspecialchars($this->input->post('usek_akm', true)),
            'sukses_akm' => htmlspecialchars($this->input->post('sukses_akm', true)),
            'wisuda' => htmlspecialchars($this->input->post('wisuda', true)),
            'wakaf' => htmlspecialchars($this->input->post('wakaf', true)),
            'pkl' => htmlspecialchars($this->input->post('pkl', true)),
            'pat' => htmlspecialchars($this->input->post('pat', true)),
            'seragam' => htmlspecialchars($this->input->post('seragam', true)),
            'jumlah' => $this->input->post('tunggakan') +
                $this->input->post('spp_praktek') +
                $this->input->post('daftar_ulang') +
                $this->input->post('pas') +
                $this->input->post('dpp_muh') +
                $this->input->post('gedung') +
                $this->input->post('ukk') +
                $this->input->post('usek_akm') +
                $this->input->post('sukses_akm') +
                $this->input->post('wisuda') +
                $this->input->post('wakaf') +
                $this->input->post('pkl') +
                $this->input->post('pat') +
                $this->input->post('seragam')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('bendahara_master', $data);
    }

    public function editPembayaran()
    {
        $data = [
            'nis' => htmlspecialchars($this->input->post('nis', true)),
            'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa', true)),
            'tunggakan' => htmlspecialchars($this->input->post('bayar_tunggakan', true)),
            'spp_praktek' => $this->input->post('bayar_spp_praktek', true),
            'daftar_ulang' => $this->input->post('bayar_daftar_ulang', true),
            'pas' =>  $this->input->post('bayar_pas', true),
            'dpp_muh' => $this->input->post('bayar_dpp_muh', true),
            'gedung' => $this->input->post('bayar_gedung', true),
            'ukk' => $this->input->post('bayar_ukk', true),
            'usek_akm' => $this->input->post('bayar_usek_akm', true),
            'sukses_akm' =>  $this->input->post('bayar_sukses_akm', true),
            'wisuda' =>  $this->input->post('bayar_wisuda', true),
            'wakaf' =>  $this->input->post('bayar_wakaf', true),
            'pkl' => $this->input->post('bayar_pkl', true),
            'pat' => $this->input->post('bayar_pat', true),
            'seragam' => $this->input->post('bayar_seragam', true)
        ];
        $this->db->insert('tbl_data_pembayaran', $data);
        $data2 = [
            'nis' => htmlspecialchars($this->input->post('nis', true)),
            'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa', true)),
            'bln' => htmlspecialchars($this->input->post('bln', true)),
            'tunggakan' => $this->input->post('tunggakan') - $this->input->post('bayar_tunggakan'),
            'spp_praktek' => $this->input->post('spp_praktek', true) - $this->input->post('bayar_spp_praktek', true),
            'daftar_ulang' => $this->input->post('daftar_ulang', true) - $this->input->post('bayar_daftar_ulang', true),
            'pas' => $this->input->post('pas', true) - $this->input->post('bayar_pas', true),
            'dpp_muh' => $this->input->post('dpp_muh', true) - $this->input->post('bayar_dpp_muh', true),
            'gedung' => $this->input->post('gedung', true) - $this->input->post('bayar_gedung', true),
            'ukk' => $this->input->post('ukk', true) - $this->input->post('bayar_ukk', true),
            'usek_akm' => $this->input->post('usek_akm', true) - $this->input->post('bayar_usek_akm', true),
            'sukses_akm' => $this->input->post('sukses_akm', true) - $this->input->post('bayar_sukses_akm', true),
            'wisuda' => $this->input->post('wisuda', true) - $this->input->post('bayar_wisuda', true),
            'wakaf' => $this->input->post('wakaf', true) - $this->input->post('bayar_wakaf', true),
            'pkl' => $this->input->post('pkl', true) - $this->input->post('bayar_pkl', true),
            'pat' => $this->input->post('pat', true) - $this->input->post('bayar_pat', true),
            'seragam' => $this->input->post('seragam', true) - $this->input->post('bayar_seragam', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('bendahara_master', $data2);
    }

    public function editData()
    {
        $data = [
            'tgl_rekap' => htmlspecialchars($this->input->post('tgl_rekap', true)),
            'tgl_terlambat' => htmlspecialchars($this->input->post('tgl_terlambat', true)),
            'no_surat' => htmlspecialchars($this->input->post('no_surat', true)),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('bendahara_data', $data);
    }
}
