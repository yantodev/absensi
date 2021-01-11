<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect();
        }
        // is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        $this->load->model('Home_model');
        $this->load->model('Count_model', 'count');
        $this->load->model('Bk_model', 'bk');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('bk/wrapper/header', $data);
        $this->load->view('bk/wrapper/sidebar', $data);
        $this->load->view('bk/wrapper/topbar', $data);
        $this->load->view('bk/index', $data);
        $this->load->view('wrapper/footer');
    }
    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Profile';
        $this->load->view('bk/wrapper/header', $data);
        $this->load->view('bk/wrapper/sidebar', $data);
        $this->load->view('bk/wrapper/topbar', $data);
        $this->load->view('bk/profile', $data);
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
            $this->load->view('bk/wrapper/header', $data);
            $this->load->view('bk/wrapper/sidebar', $data);
            $this->load->view('bk/wrapper/topbar', $data);
            $this->load->view('bk/change-password', $data);
            $this->load->view('wrapper/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah!!!</div>');
                redirect('bk/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru sama dengan yang lama!!!</div>');
                    redirect('bk/changepassword');
                } else {
                    //password ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password baru sama dengan yang lama!!!</div>');
                    redirect('bk/changepassword');
                }
            }
        }
    }

    public function hr()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar Absensi Harian';
        $data['kls'] = $this->db->get_where('tbl_kelas')->result_array();
        $level = $this->input->get('level');
        $date = $this->input->get('date');
        $kelas = $this->input->get('kelas');
        $data['data'] = $this->bk->absen_hr($level, $date, $kelas);
        $data['kelas'] = $kelas;
        $this->load->view('bk/wrapper/header', $data);
        $this->load->view('bk/wrapper/sidebar', $data);
        $this->load->view('bk/wrapper/topbar', $data);
        $this->load->view('bk/absen-harian', $data);
        $this->load->view('wrapper/footer');
    }
    public function edit_hr($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Absensi Harian';
        $data['data'] = $this->db->get_where('tbl_dh', ['id' => $id])->row_array();

        $this->form_validation->set_rules('id', 'ID', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('bk/wrapper/header', $data);
            $this->load->view('bk/wrapper/sidebar', $data);
            $this->load->view('bk/wrapper/topbar', $data);
            $this->load->view('bk/edit-harian', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->bk->edit_absen();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('bk/edit_hr/' . $id);
        }
    }
    public function bln()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar Absensi Bulanan';
        $data['kls'] = $this->db->get_where('tbl_kelas')->result_array();
        $kelas = $this->input->get('kelas');
        $bulan = $this->input->get('bulan');
        $data['bulan'] = $this->db->get_where('tbl_hari_efektif', ['id' => $bulan])->row_array();
        $data['data'] = $this->bk->absen_bln($kelas);

        $this->load->view('bk/wrapper/header', $data);
        $this->load->view('bk/wrapper/sidebar', $data);
        $this->load->view('bk/wrapper/topbar', $data);
        $this->load->view('bk/absen-bulanan', $data);
        $this->load->view('wrapper/footer');
    }
    public function dtl_absn()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar Absensi';
        $nis = $this->input->get('nis');
        $data['id'] = $this->db->get_where('tbl_siswa', ['nis' => $nis])->row_array();
        $bulan = $this->input->get('bulan');
        $data['bulan'] = $bulan;
        $data['data'] = $this->bk->detail_absen_bln($nis, $bulan);
        $this->load->view('bk/wrapper/header', $data);
        $this->load->view('bk/wrapper/sidebar', $data);
        $this->load->view('bk/wrapper/topbar', $data);
        $this->load->view('bk/detail-absen-bulanan', $data);
        $this->load->view('wrapper/footer');
    }
    public function cetak_pdf_bln()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar Absensi';
        $nama = $this->input->get('nama');
        $nis = $this->input->get('nis');
        $data['id'] = $this->db->get_where('tbl_siswa', ['nis' => $nis])->row_array();
        $bulan = $this->input->get('bulan');
        $data['bulan'] = $bulan;
        $data['data'] = $this->bk->detail_absen_bln($nis, $bulan);
        $data['count'] = $this->count->bulan($bulan, $nis);
        $data['efektif'] = $this->db->get_where('tbl_hari_efektif', ['id' => $bulan])->row_array();
        $this->load->view('bk/cetak-pdf-bulanan', $data);

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
        $filename = 'Detail Absensi ' . $nama . ' bulan ' . bulan($bulan) . '.pdf';
        $html = $this->load->view('bk/cetak-pdf-bulanan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
    }
    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_dh');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus!!!</div>');
        $url = $_SERVER['HTTP_REFERER'];
        redirect($url);
    }
}
