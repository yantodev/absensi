<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bk_model extends CI_Model
{
    public function aktivitas()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('aktivitas',)->result_array();
    }
    public function absen_hr($level, $date, $kelas)
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('tbl_dh', ['level' => $level, 'date_in' => $date, 'kelas' => $kelas])->result_array();
    }
    public function absen_hr_kelas($kelas)
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->get_where('tbl_siswa', ['kelas' => $kelas])->result_array();
    }
    public function absen_bln($kelas)
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->get_where('tbl_siswa', ['kelas' => $kelas])->result_array();
    }
    public function detail_absen_bln($nis, $bln)
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->get_where('tbl_dh', ['nbm' => $nis, 'bulan' => $bln])->result_array();
    }
    public function edit_absen()
    {
        $data = [
            'level' => htmlspecialchars($this->input->post('level', true)),
            'time_in' => htmlspecialchars($this->input->post('time_in', true)),
            'time_out' => htmlspecialchars($this->input->post('time_out', true)),

        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_dh', $data);

        $master = [
            'nama' =>  htmlspecialchars($this->input->post('name', true)),
            'kegiatan' => 'Merubah absensi harian ' . $this->input->post('nama') . '</br>jam masuk ' .
                $this->input->post('time_in') . '</br>jam pulang ' . $this->input->post('time_out'),
        ];
        $this->db->insert('aktivitas', $master);
    }
}
