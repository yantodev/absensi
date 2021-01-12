<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function aktivitas()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('aktivitas',)->result_array();
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

    //data lama
    public function siswa($nis)
    {
        return $this->db->get_where('master', ['nis' => $nis])->result_array();
    }

    public function getJurusan()
    {
        return $this->db->get_where('tbl_jurusan')->result_array();
    }
    public function Guru()
    {
        return $this->db->get_where('tbl_guru')->result_array();
    }
    public function getGuruby($id)
    {
        return $this->db->get_where('tbl_guru', ['id' => $id])->row_array();
    }
    public function Jurusan()
    {
        $query = "SELECT `master`.*,`tbl_jurusan`.`jurusan`
                   FROM `master` JOIN `tbl_jurusan`
                     ON `master`.`jurusan` = `tbl_jurusan`.`id_jurusan` 
        ";
        return $this->db->query($query)->result_array();
    }
    //tahun pelajaran
    public function getTP()
    {
        return $this->db->get_where('tp')->result_array();
    }

    public function getSiswaById($id)
    {
        return $this->db->get_where('master', ['id' => $id])->row_array();
    }

    public function getIduka($jurusan)
    {
        $this->db->order_by('iduka', 'ASC');
        return $this->db->get_where('tbl_iduka', ['jurusan' => $jurusan,])->result_array();
    }
    public function getKajur($kajur)
    {
        return $this->db->get_where('tbl_kajur', ['jurusan' => $kajur])->result_array();
    }

    //IDUKA
    public function addIduka()
    {
        $data = [
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
            'iduka' => htmlspecialchars($this->input->post('iduka', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true))
        ];
        $this->db->insert('tbl_iduka', $data);
    }
    public function getIdukaById($id)
    {
        return $this->db->get_where('tbl_iduka', ['id' => $id])->row_array();
    }


    public function getJR($jurusan)
    {
        return $this->db->get_where('tbl_jurusan', ['singkatan_jurusan' => $jurusan])->row_array();
    }
    public function getIdukaByIduka($iduka)
    {
        return $this->db->get_where('master', ['nama_instansi' => $iduka, 'tp' => '2020/2021'])->result_array();
    }
    public function getAlamatIduka($iduka)
    {
        return $this->db->get_where('tbl_iduka', ['iduka' => $iduka])->result_array();
    }
    // public function AlamatIduka($iduka)
    // {
    //     return $this->db->get_where('tbl_iduka', ['iduka' => $iduka])->result_array();
    // }
    public function getIdukaBy($iduka)
    {
        return $this->db->get_where('master', ['nama_instansi' => $iduka])->result_array();
    }
    public function editIduka()
    {
        $data = [
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
            'iduka' => htmlspecialchars($this->input->post('iduka', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true))
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_iduka', $data);
    }


    public function editSiswa()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'nama_instansi' => htmlspecialchars($this->input->post('nama_instansi', true)),
            'alamat_instansi' => htmlspecialchars($this->input->post('alamat_instansi', true)),
            'email_website_instansi' => htmlspecialchars($this->input->post('email_website_instansi', true)),
            'telp_instansi' => htmlspecialchars($this->input->post('telp_instansi', true)),
            'nama_pejabat' => htmlspecialchars($this->input->post('nama_pejabat', true)),
            'no_pejabat' => htmlspecialchars($this->input->post('no_pejabat', true)),
            'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
            'telp_pejabat' => htmlspecialchars($this->input->post('telp_pejabat', true)),
            'email_pejabat' => htmlspecialchars($this->input->post('email_pejabat', true)),
            'no_sertifikat' => htmlspecialchars($this->input->post('no_sertifikat', true)),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('master', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('master');
    }

    //TKRO
    public function Siswatkro()
    {
        return $this->db->get_where('master', ['jurusan' => '4'])->result_array();
    }

    public function editSiswaTKRO()
    {
        $data = [
            'nilai_1' => htmlspecialchars($this->input->post('nilai_1', true)),
            'nilai_2' => htmlspecialchars($this->input->post('nilai_2', true)),
            'nilai_3' => htmlspecialchars($this->input->post('nilai_3', true)),
            'nilai_4' => htmlspecialchars($this->input->post('nilai_4', true)),
            'nilai_5' => htmlspecialchars($this->input->post('nilai_5', true)),
            'nilai_6' => htmlspecialchars($this->input->post('nilai_6', true)),
            'nilai_7' => htmlspecialchars($this->input->post('nilai_7', true)),
            'nilai_8' => htmlspecialchars($this->input->post('nilai_8', true)),
            'nilai_9' => htmlspecialchars($this->input->post('nilai_9', true))
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('master', $data);
    }

    //TBSM
    public function Siswatbsm()
    {
        return $this->db->get_where('master', ['jurusan' => '5'])->result_array();
    }
    public function editSiswaTBSM()
    {
        $data = [
            'nilai_1' => htmlspecialchars($this->input->post('nilai_1', true)),
            'nilai_2' => htmlspecialchars($this->input->post('nilai_2', true)),
            'nilai_3' => htmlspecialchars($this->input->post('nilai_3', true)),
            'nilai_4' => htmlspecialchars($this->input->post('nilai_4', true)),
            'nilai_5' => htmlspecialchars($this->input->post('nilai_5', true)),
            'nilai_6' => htmlspecialchars($this->input->post('nilai_6', true)),
            'nilai_7' => htmlspecialchars($this->input->post('nilai_7', true)),
            'nilai_8' => htmlspecialchars($this->input->post('nilai_8', true)),
            'nilai_9' => htmlspecialchars($this->input->post('nilai_9', true))
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('master', $data);
    }

    //AKL
    public function Siswaakl()
    {
        return $this->db->get_where('master', ['jurusan' => '6'])->result_array();
    }
    public function editSiswaAKL()
    {
        $data = [
            'nilai_1' => htmlspecialchars($this->input->post('nilai_1', true)),
            'nilai_2' => htmlspecialchars($this->input->post('nilai_2', true)),
            'nilai_3' => htmlspecialchars($this->input->post('nilai_3', true)),
            'nilai_4' => htmlspecialchars($this->input->post('nilai_4', true)),
            'nilai_5' => htmlspecialchars($this->input->post('nilai_5', true)),
            'nilai_6' => htmlspecialchars($this->input->post('nilai_6', true)),
            'nilai_7' => htmlspecialchars($this->input->post('nilai_7', true)),
            'nilai_8' => htmlspecialchars($this->input->post('nilai_8', true)),
            'nilai_9' => htmlspecialchars($this->input->post('nilai_9', true))
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('master', $data);
    }

    //OTKP
    public function Siswaotkp()
    {
        return $this->db->get_where('master', ['jurusan' => '7'])->result_array();
    }
    public function editSiswaOTKP()
    {
        $data = [
            'nilai_1' => htmlspecialchars($this->input->post('nilai_1', true)),
            'nilai_2' => htmlspecialchars($this->input->post('nilai_2', true)),
            'nilai_3' => htmlspecialchars($this->input->post('nilai_3', true)),
            'nilai_4' => htmlspecialchars($this->input->post('nilai_4', true)),
            'nilai_5' => htmlspecialchars($this->input->post('nilai_5', true)),
            'nilai_6' => htmlspecialchars($this->input->post('nilai_6', true)),
            'nilai_7' => htmlspecialchars($this->input->post('nilai_7', true)),
            'nilai_8' => htmlspecialchars($this->input->post('nilai_8', true)),
            'nilai_9' => htmlspecialchars($this->input->post('nilai_9', true)),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('master', $data);
    }

    //BDP
    public function Siswabdp()
    {
        return $this->db->get_where('master', ['jurusan' => '8'])->result_array();
    }
    public function editSiswaBDP()
    {
        $data = [
            'nilai_1' => htmlspecialchars($this->input->post('nilai_1', true)),
            'nilai_2' => htmlspecialchars($this->input->post('nilai_2', true)),
            'nilai_3' => htmlspecialchars($this->input->post('nilai_3', true)),
            'nilai_4' => htmlspecialchars($this->input->post('nilai_4', true)),
            'nilai_5' => htmlspecialchars($this->input->post('nilai_5', true)),
            'nilai_6' => htmlspecialchars($this->input->post('nilai_6', true)),
            'nilai_7' => htmlspecialchars($this->input->post('nilai_7', true)),
            'nilai_8' => htmlspecialchars($this->input->post('nilai_8', true)),
            'nilai_9' => htmlspecialchars($this->input->post('nilai_9', true)),
            'nilai_10' => htmlspecialchars($this->input->post('nilai_10', true)),
            'nilai_11' => htmlspecialchars($this->input->post('nilai_11', true))
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('master', $data);
    }

    public function Pengumuman()
    {
        $this->db->order_by('pengumuman', 'ASC');
        return $this->db->get_where('tbl_pengumuman')->result_array();
    }

    public function surat($id)
    {
        return $this->db->get_where('tbl_surat', ['id' => $id])->row_array();
    }
}
