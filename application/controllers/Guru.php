<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect();
        }
        // is_logged_in();
        $this->load->model('Admin_model');
        $this->load->model('Home_model');
        $this->load->model('BK_model', 'bk');
        $this->load->model('Count_model', 'count');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('guru/wrapper/header', $data);
        $this->load->view('guru/wrapper/sidebar', $data);
        $this->load->view('guru/wrapper/topbar', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('wrapper/footer');
    }
    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Profile';
        $this->load->view('guru/wrapper/header', $data);
        $this->load->view('guru/wrapper/sidebar', $data);
        $this->load->view('guru/wrapper/topbar', $data);
        $this->load->view('guru/profile', $data);
        $this->load->view('wrapper/footer');
    }
    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password lama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password baru', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi password', 'required|trim|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('guru/wrapper/header', $data);
            $this->load->view('guru/wrapper/sidebar', $data);
            $this->load->view('guru/wrapper/topbar', $data);
            $this->load->view('guru/change-password', $data);
            $this->load->view('wrapper/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah!!!</div>');
                redirect('guru/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru sama dengan yang lama!!!</div>');
                    redirect('guru/changepassword');
                } else {
                    //password ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password baru sama dengan yang lama!!!</div>');
                    redirect('guru/changepassword');
                }
            }
        }
    }

    public function absensi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar Absensi';
        $bulan = $this->input->get('bulan');
        $id = $this->input->get('id');
        $data['bulan'] = $this->db->get_where('tbl_hari_efektif')->result_array();
        $data['bulan2'] = $this->db->get_where('tbl_hari_efektif', ['id' => $bulan])->row_array();
        $data['data'] = $this->db->get_where('tbl_dh', ['nbm' => $id, 'bulan' => $bulan])->result_array();
        $data['bln'] = $bulan;
        $this->load->view('guru/wrapper/header', $data);
        $this->load->view('guru/wrapper/sidebar', $data);
        $this->load->view('guru/wrapper/topbar', $data);
        $this->load->view('guru/absensi', $data);
        $this->load->view('wrapper/footer');
    }

    public function rekap()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Rekap Absensi';
        $id = $this->input->get('id');
        $data['tp'] = $this->db->get_where('tp')->result_array();
        $data['semester'] = $this->db->get_where('semester')->result_array();
        $data['data'] = $this->db->get_where('tbl_hari_efektif', ['semester' => $this->input->get('semester')])->result_array();
        $this->load->view('guru/wrapper/header', $data);
        $this->load->view('guru/wrapper/sidebar', $data);
        $this->load->view('guru/wrapper/topbar', $data);
        $this->load->view('guru/rekap', $data);
        $this->load->view('wrapper/footer');
    }

    public function kegiatan()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $owner = $this->input->get('owner');
        $owner2 = $this->input->post('owner');
        $data['data'] = $this->db->get_where('tbl_kegiatan', ['owner' => $owner])->result_array();

        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('time', 'Waktu', 'required');
        $this->form_validation->set_rules('kegiatan', 'Nama Kegiatan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('guru/wrapper/header', $data);
            $this->load->view('guru/wrapper/sidebar', $data);
            $this->load->view('guru/wrapper/topbar', $data);
            $this->load->view('guru/kegiatan', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->tambah_kegiatan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('guru/kegiatan?owner=' . $owner2);
        }
    }
    public function edit_kegiatan($id)
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('tbl_kegiatan', ['id' => $id])->row_array();
        $owner2 = $this->input->post('owner');

        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('time', 'Waktu', 'required');
        $this->form_validation->set_rules('kegiatan', 'Nama Kegiatan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('guru/wrapper/header', $data);
            $this->load->view('guru/wrapper/sidebar', $data);
            $this->load->view('guru/wrapper/topbar', $data);
            $this->load->view('guru/edit-kegiatan', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->edit_kegiatan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('guru/kegiatan?owner=' . $owner2);
        }
    }
    public function detail_kegiatan($id)
    {
        $data['title'] = 'Detail Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('tbl_dh_kegiatan', ['id_kegiatan' => $id])->result_array();
        $data['id'] = $id;
        $data['data2'] = $this->db->get_where('tbl_kegiatan', ['id' => $id])->row_array();
        $this->load->view('guru/wrapper/header', $data);
        $this->load->view('guru/wrapper/sidebar', $data);
        $this->load->view('guru/wrapper/topbar', $data);
        $this->load->view('guru/detail-kegiatan', $data);
        $this->load->view('wrapper/footer', $data);
    }
    public function cetak_pdf_kegiatan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar hadir Kegiatan';
        $id = $this->input->get('id');
        $data['data'] = $this->db->get_where('tbl_kegiatan', ['id' => $id])->row_array();
        $data['data2'] = $this->db->get_where('tbl_dh_kegiatan', ['id_kegiatan' => $id])->result_array();
        $this->load->view('guru/cetak-pdf-kegiatan', $data);

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'setAutoTopMargin' => false
            ]
        );

        // $mpdf->SetHTMLHeader('
        // <div style="text-align: center; font-weight: bold;">
        //   <img src="assets/img/pi-2020.png" width="100%" height="100%" />
        // </div>');
        $filename = 'Daftar Hadir Kegiatan ' . $this->input->get('kegiatan');
        '.pdf';
        $html = $this->load->view('guru/cetak-pdf-kegiatan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
    }
    public function hapus_kegiatan($id)
    {
        // $owner = $this->input->post('owner');
        $this->db->where('id', $id);
        $this->db->delete('tbl_kegiatan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus!!!</div>');
        redirect('guru');
    }

    public function jurnal()
    {
        $data['title'] = 'Jurnal-ku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $nbm = $this->input->get('nbm');
        $nbm2 = $this->input->post('nbm');
        $data['data'] = $this->db->get_where('tbl_jurnal', ['nbm' => $nbm])->result_array();

        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('time', 'Waktu', 'required');
        $this->form_validation->set_rules('kegiatan', 'Nama Kegiatan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('guru/wrapper/header', $data);
            $this->load->view('guru/wrapper/sidebar', $data);
            $this->load->view('guru/wrapper/topbar', $data);
            $this->load->view('guru/jurnal', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->tambah_jurnal();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('guru/jurnal?nbm=' . $nbm2);
        }
    }
    public function edit_jurnal($id)
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('tbl_jurnal', ['id' => $id])->row_array();
        $nbm = $this->input->post('nbm');

        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('time', 'Waktu', 'required');
        $this->form_validation->set_rules('kegiatan', 'Nama Kegiatan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('guru/wrapper/header', $data);
            $this->load->view('guru/wrapper/sidebar', $data);
            $this->load->view('guru/wrapper/topbar', $data);
            $this->load->view('guru/edit-jurnal', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->edit_jurnal();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('guru/jurnal?nbm=' . $nbm);
        }
    }
    public function hapus_jurnal($id)
    {
        // $owner = $this->input->post('owner');
        $this->db->where('id', $id);
        $this->db->delete('tbl_jurnal');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus!!!</div>');
        redirect('guru');
    }
}
