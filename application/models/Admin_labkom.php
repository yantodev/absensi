<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_labkom extends CI_Model
{

    public function getAllDataKomputer()
    {
        return $this->db->get('data_komputer')->result_array();
    }
    public function Proker()
    {
        return $this->db->get('proker_kepala_laboratorium')->result_array();
    }
    public function getProkerById($id)
    {
        return $this->db->get_where('proker_kepala_laboratorium', ['id' => $id])->row_array();
    }
    public function editProker()
    {
        $data = [
            'kegiatan' => $this->input->post('kegiatan', true),
            'target' => $this->input->post('target', true),
            'waktu' => $this->input->post('waktu', true),
            'status' => $this->input->post('status', true),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('proker_kepala_laboratorium', $data);
    }
    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('proker_kepala_laboratorium');
    }
    public function PeminjamById($id)
    {
        return $this->db->get_where('peminjaman', ['id' => $id])->row_array();
    }

    //Inventaris
    public function Inventaris()
    {
        return $this->db->get_where('tbl_inventaris')->result_array();
    }
    public function InventarisBy($id)
    {
        return $this->db->get_where('tbl_inventaris', ['id' => $id])->row_array();
    }


    //pesan
    public function Pesan()
    {
        $sql = "SELECT count(if(status='Pending', status, NULL)) as status FROM jadwal";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function AllPesan()
    {
        return $this->db->get_where('jadwal', ['status' => 'Pending'])->result_array();
    }


    //getTotalPC
    public function PC()
    {
        $sql = "SELECT count(if(jenis='Personal Computer', jenis, NULL)) as jenis FROM data_komputer";
        $result = $this->db->query($sql);
        return $result->row();
    }
    //total Laptop
    public function Laptop()
    {
        $sql = "SELECT count(if(jenis='laptop', jenis, NULL)) as jenis FROM data_komputer";
        $result = $this->db->query($sql);
        return $result->row();
    }

    public function getAllDataPeminjam()
    {
        return $this->db->get('peminjaman')->result_array();
    }

    //alat
    public function getAlat()
    {
        return $this->db->get('alat_labkom')->result_array();
    }
    public function hitungAlat()
    {
        $query = $this->db->get('alat_labkom');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    //bahan
    public function getBahan()
    {
        return $this->db->get('bahan_labkom')->result_array();
    }
    public function hitungBahan()
    {
        $query = $this->db->get('bahan_labkom');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    //jenis Alat dan Bahan
    public function getAlatBahan()
    {
        return $this->db->get('jenisperangkat_labkom')->result_array();
    }

    //proker
    // public function editProker()
    // {
    //     $data = [
    //         'status' => $this->input->post('status', true),
    //     ];
    //     $this->db->where('id', $this->input->post('id'));
    //     $this->db->update('proker_kepala_laboratorium', $data);
    // }
    public function editPeminjam()
    {
        $data = [
            'tgl_pinjam' => $this->input->post('tgl_pinjam', true),
            'nama_pinjam' => $this->input->post('nama_pinjam', true),
            'nbm' => $this->input->post('nbm', true),
            'no_hp' => $this->input->post('no_hp', true),
            'nama_barang' => $this->input->post('nama_barang', true),
            'jumlah_barang' => $this->input->post('jumlah_barang', true),
            'kondisi_pinjam' => $this->input->post('kondisi_pinjam', true),
            'no_seri' => $this->input->post('no_seri', true),
            'no_inv' => $this->input->post('no_inv', true),
            'keperluan' => $this->input->post('keperluan', true),
            'catatan_pinjam' => $this->input->post('catatan_pinjam', true),
            'status' => $this->input->post('status', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('peminjaman', $data);
    }

    //jadwal
    public function getAllJadwal()
    {
        return $this->db->get('jadwal')->result_array();
    }
    public function JadwalById($id)
    {
        return $this->db->get_where('jadwal', ['id' => $id])->row_array();
    }
    public function VerifikasiJadwal()
    {
        $data = [
            'guru' => $this->input->post('guru', true),
            'status' => $this->input->post('status', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('jadwal', $data);
    }
}
