<?php

use PhpOffice\PhpSpreadsheet\Shared\Date;

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    function getjurusan()
    {
        $this->db->order_by('jurusan', 'ASC');
        return $this->db->get_where('tbl_jurusan')->result_array();
    }
    function getGuru()
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->get_where('tbl_gukar', ['status' => '3'])->result_array();
    }
    public function aktivitas()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('aktivitas')->result_array();
    }
    public function absen_hr($id, $date)
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('tbl_dh', ['level' => $id, 'date_in' => $date])->result_array();
    }
    public function absen_bln($id)
    {
        $this->db->order_by('name', 'ASC');
        return $this->db->get_where('user', ['role_id' => $id])->result_array();
    }
    public function detail_absen_bln($nbm, $bln)
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->get_where('tbl_dh', ['nbm' => $nbm, 'bulan' => $bln])->result_array();
    }
    public function detail_all_bln($id)
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->get_where('tbl_gukar', ['status' => $id])->result_array();
    }
    public function edit_absen()
    {
        $data = [
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
    public function edit_gukar()
    {
        $data = [
            'nbm' => htmlspecialchars($this->input->post('nbm', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
            'hp' => htmlspecialchars($this->input->post('hp', true))

        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_gukar', $data);

        $master = [
            'nama' =>  htmlspecialchars($this->input->post('user', true)),
            'kegiatan' => 'Merubah data pribadi ' . $this->input->post('nama') . '</br>' .
                'NBM ' . $this->input->post('nbm') . '</br>' .
                'email ' . $this->input->post('email') . '</br>' .
                'jabatan ' . $this->input->post('jabatan') . '</br>' .
                'hp ' . $this->input->post('hp')
        ];
        $this->db->insert('aktivitas', $master);
    }
    public function tambah_siswa()
    {
        $data = [
            'nis' => htmlspecialchars($this->input->post('nis', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'jk' => htmlspecialchars($this->input->post('jk', true)),
            'kelas' => htmlspecialchars($this->input->post('kelas', true)),
            'level' => '5',
            'jurusan' => $this->input->post('jurusan')
        ];
        $this->db->insert('tbl_siswa', $data);

        $master = [
            'nama' =>  htmlspecialchars($this->input->post('owner', true)),
            'kegiatan' => 'Menambah siswa' . $this->input->post('nama') . '</br>' .
                'NIS ' . $this->input->post('nis') . '</br>' .
                'email ' . $this->input->post('email') . '</br>' .
                'Jenis Kelamin ' . $this->input->post('jk') . '</br>' .
                'Kelas ' . $this->input->post('kelas') . '</br>' .
                'Jurusan ' . jurusan($this->input->post('jurusan'))
        ];
        $this->db->insert('aktivitas', $master);
    }
    public function edit_siswa()
    {
        $data = [
            'nis' => htmlspecialchars($this->input->post('nis', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'jk' => htmlspecialchars($this->input->post('jk', true)),


        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_siswa', $data);

        $master = [
            'nama' =>  htmlspecialchars($this->input->post('user', true)),
            'kegiatan' => 'Merubah data pribadi ' . $this->input->post('nama') . '</br>' .
                'NIS ' . $this->input->post('nis') . '</br>' .
                'email ' . $this->input->post('email') . '</br>' .
                'Jenis Kelamin ' . $this->input->post('jk')
        ];
        $this->db->insert('aktivitas', $master);
    }
    public function getKelas()
    {
        return $this->db->get_where('tbl_kelas')->result_array();
    }

    function tambah_kegiatan()
    {
        $data = [
            'tgl' => htmlspecialchars($this->input->post('tgl', true)),
            'time' => htmlspecialchars($this->input->post('time', true)),
            'kegiatan' => htmlspecialchars($this->input->post('kegiatan', true)),
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'owner' => htmlspecialchars($this->input->post('owner', true))
        ];
        $this->db->insert('tbl_kegiatan', $data);

        $master = [
            'nama' =>  htmlspecialchars($this->input->post('owner', true)),
            'kegiatan' => 'Membuat kegiatan ' . $this->input->post('kegiatan') . ' pada tanggal ' . $this->input->post('tgl') . ' Jam ' . $this->input->post('time')
        ];
        $this->db->insert('aktivitas', $master);
    }
    function edit_kegiatan()
    {
        $data = [
            'tgl' => htmlspecialchars($this->input->post('tgl', true)),
            'time' => htmlspecialchars($this->input->post('time', true)),
            'kegiatan' => htmlspecialchars($this->input->post('kegiatan', true)),
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_kegiatan', $data);

        $master = [
            'nama' =>  htmlspecialchars($this->input->post('owner', true)),
            'kegiatan' => 'Mengedit kegiatan ' . $this->input->post('kegiatan') . ' pada tanggal ' . $this->input->post('tgl') . ' Jam ' . $this->input->post('time')
        ];
        $this->db->insert('aktivitas', $master);
    }

    function tambah_jurnal()
    {

        $data = [
            'bulan' => date("m", strtotime($this->input->post('tgl'))),
            'tgl' => htmlspecialchars($this->input->post('tgl', true)),
            'time' => htmlspecialchars($this->input->post('time', true)),
            'nbm' => htmlspecialchars($this->input->post('nbm', true)),
            'kegiatan' => $this->input->post('kegiatan', true),
            'nama' => htmlspecialchars($this->input->post('name', true)),
            'foto' => 'noimage.png',
        ];
        $this->db->insert('tbl_jurnal', $data);

        $master = [
            'nama' =>  htmlspecialchars($this->input->post('name', true)),
            'kegiatan' => 'Membuat jurnal ' . $this->input->post('kegiatan') . ' pada tanggal ' . $this->input->post('tgl') . ' Jam ' . $this->input->post('time')
        ];
        $this->db->insert('aktivitas', $master);
    }
    function edit_jurnal()
    {
        $data = [
            'tgl' => htmlspecialchars($this->input->post('tgl', true)),
            'time' => htmlspecialchars($this->input->post('time', true)),
            'kegiatan' => $this->input->post('kegiatan', true),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_jurnal', $data);

        $master = [
            'nama' =>  htmlspecialchars($this->input->post('name', true)),
            'kegiatan' => 'Mengedit jurnal ' . $this->input->post('kegiatan') . ' pada tanggal ' . $this->input->post('tgl') . ' Jam ' . $this->input->post('time')
        ];
        $this->db->insert('aktivitas', $master);
    }
    function getJurnal($nbm)
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('tbl_jurnal', ['nbm' => $nbm])->result_array();
    }
    function getJurnal2($tgl, $nbm)
    {
        $this->db->order_by('time', 'ASC');
        return $this->db->get_where('tbl_jurnal', ['tgl' => $tgl, 'nbm' => $nbm])->result_array();
    }
    function getJurnal3($bulan, $nbm)
    {
        $this->db->order_by('time', 'ASC');
        return $this->db->get_where('tbl_jurnal', ['bulan' => $bulan, 'nbm' => $nbm])->result_array();
    }
}
