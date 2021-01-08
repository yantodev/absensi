<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bendahara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Bendahara_model');
        $this->load->model('Menu_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $data['total'] = $this->Bendahara_model->Kekurangan();
        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('bendahara/index', $data);
        $this->load->view('wrapper/footer');
    }

    public function Pembayaran()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pembayaran';
        $kelas = $this->input->get('kelas');
        $data['siswa'] = $this->Bendahara_model->getKelas($kelas);
        $data['all_kelas'] = $this->Bendahara_model->getAllKelas();
        $data['tbl_pembayaran'] = $this->Bendahara_model->tbl_pembayaran();

        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('bendahara/pembayaran', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Bendahara_model->editPembayaran();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran Berhasil diupdate!!!</div>');
            redirect('bendahara/pembayaran');
        }
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('bendahara/profile', $data);
        $this->load->view('wrapper/footer');
    }

    public function data($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Data';
        $data['data'] = $this->Bendahara_model->getData($id);

        $this->form_validation->set_rules('tgl_rekap', 'Tanggal Rekap', 'required');
        $this->form_validation->set_rules('tgl_terlambat', 'Tanggal Terlambat', 'required');
        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('bendahara/data', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Bendahara_model->editData();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('bendahara');
        }
    }

    public function master()
    {
        $data['title'] = 'Rekap Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('bendahara/master', $data);
        $this->load->view('wrapper/footer');
    }

    public function X()
    {
        $data['title'] = 'KELAS X';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kelas = $this->input->get('kelas');
        $data['siswa'] = $this->Bendahara_model->getKelas($kelas);
        $data['all_kelas'] = $this->Bendahara_model->getKelasX();
        // $data['data'] = $this->Menu_model->getKelas();
        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('bendahara/x', $data);
        $this->load->view('wrapper/footer');
    }
    public function cetak_x($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Bendahara_model->getSiswaBy($id);
        $data['data'] = $this->Bendahara_model->getAllData();

        $this->load->view('bendahara/cetak-x', $data);


        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'Folio',
                'orientation' => 'P',
                'default_font_size' => 10,
                'setAutoTopMargin' => 'stretch'
            ]
        );
        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
          <img src="assets/img/kop.png" />
        </div>');

        $html = $this->load->view('bendahara/cetak-x', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Detail Kekurangan Pembayaran.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function edit_x($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Bendahara_model->getSiswaBy($id);

        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('bendahara/edit-x', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Bendahara_model->editSiswa();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('bendahara/x');
        }
    }

    public function XI()
    {
        $data['title'] = 'KELAS XI';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kelas = $this->input->get('kelas');
        $data['siswa'] = $this->Bendahara_model->getKelas($kelas);
        $data['all_kelas'] = $this->Bendahara_model->getKelasXI();
        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('bendahara/xi', $data);
        $this->load->view('wrapper/footer');
    }
    public function cetak_xi($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Bendahara_model->getSiswaBy($id);
        $data['data'] = $this->Bendahara_model->getAllData();

        $this->load->view('bendahara/cetak-xi', $data);


        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'Folio',
                'orientation' => 'P',
                'default_font_size' => 10,
                'setAutoTopMargin' => 'stretch'
            ]
        );
        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
          <img src="assets/img/kop.png" />
        </div>');

        $html = $this->load->view('bendahara/cetak-xi', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Detail Kekurangan Pembayaran.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function edit_xi($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Bendahara_model->getSiswaBy($id);

        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('bendahara/edit-xi', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Bendahara_model->editSiswa();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('bendahara/xi');
        }
    }

    public function XII()
    {
        $data['title'] = 'KELAS XII';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kelas = $this->input->get('kelas');
        $data['siswa'] = $this->Bendahara_model->getKelas($kelas);
        $data['all_kelas'] = $this->Bendahara_model->getKelasXII();
        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('bendahara/xii', $data);
        $this->load->view('wrapper/footer');
    }
    public function cetak_xii($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Bendahara_model->getSiswaBy($id);
        $data['data'] = $this->Bendahara_model->getAllData();

        $this->load->view('bendahara/cetak-xii', $data);


        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'Folio',
                'orientation' => 'P',
                'default_font_size' => 10,
                'setAutoTopMargin' => 'stretch'
            ]
        );
        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
          <img src="assets/img/kop.png" />
        </div>');

        $html = $this->load->view('bendahara/cetak-xii', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Detail Kekurangan Pembayaran.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function edit_xii($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Bendahara_model->getSiswaBy($id);

        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('bendahara/edit-xii', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Bendahara_model->editSiswa();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('bendahara/xii');
        }
    }

    public function siswa()
    {
        $data['title'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kelas = $this->input->get('kelas');
        $data['siswa'] = $this->Bendahara_model->getKelas($kelas);
        $data['all_kelas'] = $this->Bendahara_model->getAllKelas();
        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('bendahara/siswa', $data);
        $this->load->view('wrapper/footer');
    }

    //master kelas
    public function kelas()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Kelas';
        $data['kelas'] = $this->Bendahara_model->Kelas();
        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('bendahara/kelas', $data);
        $this->load->view('wrapper/footer');
    }
}
