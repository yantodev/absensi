<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminLab extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Admin_labkom');
        // $this->load->model('Administrator_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pc'] = $this->Admin_labkom->PC();
        $data['laptop'] = $this->Admin_labkom->Laptop();
        $data['alat'] = $this->Admin_labkom->hitungAlat();
        $data['bahan'] = $this->Admin_labkom->hitungBahan();
        $data['total_pesan'] = $this->Admin_labkom->Pesan();
        $data['pesan'] = $this->Admin_labkom->AllPesan();
        $data['proker'] = $this->Admin_labkom->Proker();

        $data['title'] = 'Dashboard';
        $this->load->view('wrapper/header', $data);
        $this->load->view('adminlab/wrapper/sidebar', $data);
        $this->load->view('adminlab/wrapper/topbar', $data);
        $this->load->view('adminlab/index', $data);
        $this->load->view('wrapper/footer');
    }
    public function Proker()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['proker'] = $this->Admin_labkom->Proker();

        $data['title'] = 'Dashboard';
        $this->load->view('wrapper/header', $data);
        $this->load->view('adminlab/wrapper/sidebar', $data);
        $this->load->view('adminlab/wrapper/topbar', $data);
        $this->load->view('adminlab/program-kerja', $data);
        $this->load->view('wrapper/footer');
    }
    public function editProker($id)
    {
        $data['title'] = 'Edit Program Kerja';
        $data['total_pesan'] = $this->Admin_labkom->Pesan();
        $data['pesan'] = $this->Admin_labkom->AllPesan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['proker'] = $this->Admin_labkom->getProkerById($id);
        $data['status'] = ['Sudah', 'Belum'];

        $this->form_validation->set_rules('status', 'status', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('adminlab/wrapper/header', $data);
            $this->load->view('adminlab/wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('adminlab/edit-proker', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_labkom->editProker();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Program Kerja Berhasil diupdate!!!</div>');
            redirect('adminlab/proker');
        }
    }

    public function inventaris()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Inventarisasi';
        $data['data'] = $this->Admin_labkom->Inventaris();
        $this->load->view('wrapper/header', $data);
        $this->load->view('adminlab/wrapper/sidebar', $data);
        $this->load->view('adminlab/wrapper/topbar', $data);
        $this->load->view('adminlab/inventaris', $data);
        $this->load->view('wrapper/footer');
    }
    public function detailinventaris($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Detail Inventarisasi';
        $data['data'] = $this->Admin_labkom->InventarisBy($id);
        $this->load->view('wrapper/header', $data);
        $this->load->view('adminlab/wrapper/sidebar', $data);
        $this->load->view('adminlab/wrapper/topbar', $data);
        $this->load->view('adminlab/detail-inventaris', $data);
        $this->load->view('wrapper/footer');
    }

    public function cetak()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Inventarisasi';
        $data['data'] = $this->Admin_labkom->Inventaris();
        $this->load->view('adminlab/cetak-kartu', $data);

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('adminlab/cetak-kartu', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Kartu Inventaris.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function datakomputer()
    {
        $data['title'] = 'Data Komputer';
        $data['total_pesan'] = $this->Admin_labkom->Pesan();
        $data['pesan'] = $this->Admin_labkom->AllPesan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Admin_labkom->getAllDataKomputer();
        $data['ruang'] = ['R01-Lab. Komputer Barat', 'R02-Lab. Komputer Timur', 'R03-Lab. Bahasa', 'R04-Lab. Akuntansi'];
        $data['alat'] = $this->db->get('jenisperangkat_labkom')->result_array();
        $data['status'] = ['Aktif', 'Non Aktif'];

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/data-komputer', $data);
        $this->load->view('wrapper/footer');
    }

    //Peminjaman
    public function peminjam()
    {
        $data['title'] = 'Data Peminjaman';
        $data['total_pesan'] = $this->Admin_labkom->Pesan();
        $data['pesan'] = $this->Admin_labkom->AllPesan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Admin_labkom->getAllDataPeminjam();
        $data['status'] = ['Sementara', 'Permanen'];
        $data['kondisi'] = ['Sedang', 'Baik', 'Rusak'];

        $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required');
        $this->form_validation->set_rules('nama_pinjam', 'Nama Peminjam', 'required');
        $this->form_validation->set_rules('nbm', 'NBM', 'required');
        $this->form_validation->set_rules('no_hp', 'No. HP', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'required');
        $this->form_validation->set_rules('kondisi_pinjam', 'Kondisi Barang', 'required');
        $this->form_validation->set_rules('no_seri', 'Nomor Seri', 'required');
        $this->form_validation->set_rules('no_inv', 'Nomor Inventaris', 'required');
        $this->form_validation->set_rules('keperluan', 'keperluan', 'required');
        $this->form_validation->set_rules('catatan_pinjam', 'Catatan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/peminjam', $data);
            $this->load->view('wrapper/footer');
        } else {
            $data = [
                'tgl_pinjam' => $this->input->post('tgl_pinjam'),
                'nama_pinjam' => $this->input->post('nama_pinjam'),
                'nbm' => $this->input->post('nbm'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_barang' => $this->input->post('nama_barang'),
                'jumlah_barang' => $this->input->post('jumlah_barang'),
                'kondisi_pinjam' => $this->input->post('kondisi_pinjam'),
                'no_seri' => $this->input->post('no_seri'),
                'no_inv' => $this->input->post('no_inv'),
                'keperluan' => $this->input->post('keperluan'),
                'catatan_pinjam' => $this->input->post('catatan_pinjam'),
                'status' => $this->input->post('status')
            ];
            $this->db->insert('peminjaman', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Peminjam berhasil ditambahkan!!!</div>');
            redirect('admin/peminjam');
        }
    }
    public function detail_peminjam($id)
    {
        $data['title'] = 'Detail Data Peminjam';
        $data['total_pesan'] = $this->Admin_labkom->Pesan();
        $data['pesan'] = $this->Admin_labkom->AllPesan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Admin_labkom->PeminjamByID($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/detail-peminjam', $data);
        $this->load->view('wrapper/footer');
    }
    public function form_pinjam($id)
    {
        $data['title'] = 'Detail Data Peminjam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Admin_labkom->PeminjamByID($id);

        $this->load->view('admin/form-pinjam', $data);

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'setAutoTopMargin' => false
            ]
        );
        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
          <img src="assets/img/kop.png" />
        </div>');
        $mpdf->SetHTMLFooter('
        <div style="font-weight: bold;">
          <p> NB:<br/>*Dicetak 2 lembar (untuk peminjam dan Waka Sarpras)<p/>
        </div>');

        $html = $this->load->view('admin/form-pinjam', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Form Peminjaman.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function edit_peminjam($id)
    {
        $data['title'] = 'Edit Data Peminjam';
        $data['total_pesan'] = $this->Admin_labkom->Pesan();
        $data['pesan'] = $this->Admin_labkom->AllPesan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Admin_labkom->PeminjamByID($id);

        $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required');
        $this->form_validation->set_rules('nama_pinjam', 'Nama Peminjam', 'required');
        $this->form_validation->set_rules('nbm', 'NBM', 'required');
        $this->form_validation->set_rules('no_hp', 'No. HP', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'required');
        $this->form_validation->set_rules('kondisi_pinjam', 'Kondisi Barang', 'required');
        $this->form_validation->set_rules('no_seri', 'Nomor Seri', 'required');
        $this->form_validation->set_rules('no_inv', 'Nomor Inventaris', 'required');
        $this->form_validation->set_rules('keperluan', 'keperluan', 'required');
        $this->form_validation->set_rules('catatan_pinjam', 'Catatan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/edit-peminjam', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_labkom->editPeminjam();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Peminjam berhasil diupdate!!!</div>');
            redirect('admin/peminjam');
        }
    }

    public function alat()
    {
        $data['title'] = 'Alat';
        $data['total_pesan'] = $this->Admin_labkom->Pesan();
        $data['pesan'] = $this->Admin_labkom->AllPesan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['alat'] = $this->Admin_labkom->getAlat();

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/alat', $data);
        $this->load->view('wrapper/footer');
    }

    public function bahan()
    {
        $data['title'] = 'Bahan';
        $data['total_pesan'] = $this->Admin_labkom->Pesan();
        $data['pesan'] = $this->Admin_labkom->AllPesan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bahan'] = $this->Admin_labkom->getBahan();

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/bahan', $data);
        $this->load->view('wrapper/footer');
    }

    public function AlatBahan()
    {
        $data['title'] = 'Alat & Bahan';
        $data['total_pesan'] = $this->Admin_labkom->Pesan();
        $data['pesan'] = $this->Admin_labkom->AllPesan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pilih'] = ['Alat', 'Bahan'];
        $data['perangkat'] = $this->Admin_labkom->getAlatBahan();

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/alat-bahan', $data);
        $this->load->view('wrapper/footer');
    }

    //Jadwal
    public function jadwal()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['total_pesan'] = $this->Admin_labkom->Pesan();
        $data['pesan'] = $this->Admin_labkom->AllPesan();
        $data['jadwal'] = $this->Admin_labkom->getAllJadwal();

        $data['title'] = 'Jadwal';
        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/jadwal', $data);
        $this->load->view('wrapper/footer');
    }
    public function verifikasi_jadwal($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['total_pesan'] = $this->Admin_labkom->Pesan();
        $data['pesan'] = $this->Admin_labkom->AllPesan();
        $data['jadwal'] = $this->Admin_labkom->JadwalById($id);
        $data['status'] = ['Pending', 'Verified'];
        $data['title'] = 'Verifikasi Jadwal';

        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('status', 'Staus', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/verifikasi-jadwal', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_labkom->VerifikasiJadwal();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal terverifikasi!!!</div>');
            redirect('admin/jadwal');
        }
    }
}
