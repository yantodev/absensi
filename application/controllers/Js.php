<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Js extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Home_model');
        $this->load->model('Count_model');
    }
    public function nama_siswa()
    {
        $nis = $this->input->get('nis');
        $data = $this->Home_model->nama_siswa($nis);
        foreach ($data as $data) {
            $lists = "<option value='" . $data->nama . "'>" . $data->nama . "</option>";
        }
        $callback = array('list_nama' => $lists);
        echo json_encode($callback);
    }
    public function kelas()
    {
        $nis = $this->input->get('nis');
        $data = $this->Home_model->nama_siswa($nis);
        foreach ($data as $data) {
            $lists = "<option value='" . $data->kelas . "'>" . $data->kelas . "</option>";
        }
        $callback = array('list_nama' => $lists);
        echo json_encode($callback);
    }
    public function level_siswa()
    {
        $nis = $this->input->get('nis');
        $data = $this->Home_model->nama_siswa($nis);
        foreach ($data as $data) {
            $lists = "<option value='" . $data->level . "'>" . status($data->level) . "</option>";
        }
        $callback = array('list_nama' => $lists);
        echo json_encode($callback);
    }

    public function insert_DHS()
    {
        $img = $_POST['image'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = './signature-image/daftar-hadir/siswa/masuk/' . uniqid() . '.png';
        $success = file_put_contents($file, $data);
        $image = str_replace('./', '', $file);

        // $id = $_POST['id'];
        $tp = $_POST['tp'];
        $semester = $_POST['semester'];
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $bulan = $_POST['bulan'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $status = $_POST['status'];
        $alasan = $_POST['alasan'];
        $level = $_POST['level'];
        $data = array(
            'ttd_in' => $image,
            'nbm' => $nis,
            'nama' => $nama,
            'kelas' => $kelas,
            'bulan' => $bulan,
            'date_in' => $date,
            'time_in' => $time,
            'status' => $status,
            'alasan' => $alasan,
            'level' => $level,
            'tp' => $tp,
            'semester' => $semester
        );
        $this->db->insert('tbl_dh', $data);

        $master = array(
            'nama' => $nama,
            'kegiatan' =>
            'Mengisi daftar hadir tanggal ' . $date . '<br/>' .
                'Jam masuk ' . $time . '<br/>' .
                'Status Kehadiran :' . $status . '<br/>' .
                'Alasan ' . $alasan,
        );
        $this->db->insert('aktivitas', $master);
    }
    public function update_DHS()
    {
        $img = $_POST['image'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = './signature-image/daftar-hadir/siswa/pulang/' . uniqid() . '.png';
        $success = file_put_contents($file, $data);
        $image = str_replace('./', '', $file);

        // $id = $_POST['id'];
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $level = $_POST['level'];
        $id = $_POST['id'];
        $data = array(
            'ttd_out' => $image,
            'time_out' => $time
        );
        $this->db->where('nbm', $nis);
        $this->db->where('date_in', $date);
        $this->db->update('tbl_dh', $data);

        $master = array(
            'nama' => $nama,
            'kegiatan' =>
            'Mengisi daftar pualng tanggal ' . $date . '<br/>' .
                'Jam pulang ' . $time
        );
        $this->db->insert('aktivitas', $master);
    }

    //guru
    public function nama()
    {
        $nbm = $this->input->get('nbm');
        $iduka = $this->Home_model->nama($nbm);
        foreach ($iduka as $data) {
            $lists = "<option value='" . $data->name . "'>" . $data->name . "</option>";
        }
        $callback = array('list_nama' => $lists);
        echo json_encode($callback);
    }

    public function email()
    {
        $nbm = $this->input->get('nbm');
        $iduka = $this->Home_model->nama($nbm);
        foreach ($iduka as $data) {
            $lists = "<option value='" . $data->email . "'>" . $data->email . "</option>";
        }
        $callback = array('list_email' => $lists);
        echo json_encode($callback);
    }
    public function status()
    {
        $nbm = $this->input->get('nbm');
        $iduka = $this->Home_model->nama($nbm);
        foreach ($iduka as $data) {
            $lists = "<option value='" . $data->role_id . "'>" . status($data->role_id) . "</option>";
        }
        $callback = array('list_level' => $lists);
        echo json_encode($callback);
    }

    public function insert_DH()
    {
        $img = $_POST['image'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = './signature-image/daftar-hadir/gukar/masuk/' . uniqid() . '.png';
        $success = file_put_contents($file, $data);
        $image = str_replace('./', '', $file);

        // $id = $_POST['id'];
        $tp = $_POST['tp'];
        $semester = $_POST['semester'];
        $nbm = $_POST['nbm'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $bulan = $_POST['bulan'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $status = $_POST['status'];
        $alasan = $_POST['alasan'];
        $level = $_POST['level'];
        $data = array(
            'ttd_in' => $image,
            'nbm' => $nbm,
            'nama' => $nama,
            'email' => $email,
            'bulan' => $bulan,
            'date_in' => $date,
            'time_in' => $time,
            'status' => $status,
            'alasan' => $alasan,
            'level' => $level,
            'tp' => $tp,
            'semester' => $semester
        );
        $this->db->insert('tbl_dh', $data);

        $master = array(
            'nama' => $nama,
            'kegiatan' =>
            'Mengisi daftar hadir tanggal ' . $date . '<br/>' .
                'Jam masuk ' . $time . '<br/>' .
                'Status Kehadiran :' . $status . '<br/>' .
                'Alasan ' . $alasan,
        );
        $this->db->insert('aktivitas', $master);
    }
    public function update_DH()
    {
        $img = $_POST['image'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = './signature-image/daftar-hadir/gukar/pulang/' . uniqid() . '.png';
        $success = file_put_contents($file, $data);
        $image = str_replace('./', '', $file);

        $nama = $_POST['nama'];
        $nbm = $_POST['nbm'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $data = array(
            'ttd_out' => $image,
            'date_out' => $date,
            'time_out' => $time,
        );
        $this->db->where('nbm', $nbm);
        $this->db->where('date_in', $date);
        $this->db->update('tbl_dh', $data);

        $master = array(
            'nama' => $nama,
            'kegiatan' =>
            'Mengisi daftar pulang tanggal ' . $date . '<br/>' .
                'Jam pulang ' . $time,

        );
        $this->db->insert('aktivitas', $master);
    }

    public function insert_DH_kegiatan()
    {
        $img = $_POST['image'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = './signature-image/daftar-hadir-kegiatan/' . uniqid() . '.png';
        $success = file_put_contents($file, $data);
        $image = str_replace('./', '', $file);

        $id_keg = $_POST['id_keg'];
        $nbm = $_POST['nbm'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $tgl = $_POST['date'];
        $status = $_POST['status'];
        $alasan = $_POST['alasan'];
        $kegiatan = $_POST['kegiatan'];
        $data = array(
            'id_kegiatan' => $id_keg,
            'nbm' => $nbm,
            'nama' => $nama,
            'email' => $email,
            'tgl' => $tgl,
            'status' => $status,
            'alasan' => $alasan,
            'ttd' => $image
        );
        $this->db->insert('tbl_dh_kegiatan', $data);

        $master = array(
            'nama' => $nama,
            'kegiatan' =>
            'Mengisi daftar kegiatan tanggal ' . $tgl . '<br/>' .
                'Nama kegiatan :' . $kegiatan . '<br/>' .
                'Status Kehadiran :' . $status . '<br/>' .
                'Alasan :' . $alasan,
        );
        $this->db->insert('aktivitas', $master);
    }
}
