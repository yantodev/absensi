<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */

class Admin extends CI_Controller
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
        $this->load->model('Bk_model');
        $this->load->model('Count_model');
    }

    public function aktivitas()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Admin_model->aktivitas();
        $this->load->view('admin/wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/aktivitas', $data);
        $this->load->view('wrapper/footer');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Admin_model->getDH();
        $this->load->view('admin/wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('wrapper/footer');
    }

    public function profile()
    {
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['title'] = 'My Profile';
        $this->load->view('admin/wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('wrapper/footer');
    }
    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $this->form_validation->set_rules(
            'current_password',
            'Password lama',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'password1',
            'Password baru',
            'required|trim|min_length[8]|matches[password2]'
        );
        $this->form_validation->set_rules(
            'password2',
            'Ulangi password',
            'required|trim|min_length[8]|matches[password1]'
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/change-password', $data);
            $this->load->view('wrapper/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('password1');
            if (
                !password_verify($current_password, $data['user']['password'])
            ) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">Password lama salah!!!</div>'
                );
                redirect('admin/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">Password baru sama dengan yang lama!!!</div>'
                    );
                    redirect('admin/changepassword');
                } else {
                    //password ok
                    $password_hash = password_hash(
                        $new_password,
                        PASSWORD_DEFAULT
                    );

                    $this->db->set('password', $password_hash);
                    $this->db->where(
                        'email',
                        $this->session->userdata('email')
                    );
                    $this->db->update('user');

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">Password baru sama dengan yang lama!!!</div>'
                    );
                    redirect('admin/changepassword');
                }
            }
        }
    }
    //guru dan karyawan
    public function hr()
    {
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['title'] = 'Daftar Absensi';
        $id = $this->input->get('level');
        $date = $this->input->get('date');
        $data['level'] = $this->db
            ->get_where('tbl_status', ['id' => $id])
            ->row_array();
        $data['data'] = $this->Admin_model->absen_hr($id, $date);
        $this->load->view('admin/wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/absen-harian', $data);
        $this->load->view('wrapper/footer');
    }
    public function edit_hr($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Absensi Harian';
        $data['data'] = $this->db->get_where('tbl_dh', ['id' => $id])->row_array();

        $this->form_validation->set_rules('id', 'ID', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/edit-harian', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->edit_absen();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>'
            );
            redirect('admin/edit_hr/' . $id);
        }
    }
    public function bln()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar Absensi';
        $id = $this->input->get('status_id');
        $bulan = $this->input->get('bulan');
        $data['bulan'] = $this->db->get_where('tbl_hari_efektif', ['id' => $bulan])->row_array();
        $data['level'] = $this->db->get_where('tbl_status', ['id' => $id])->row_array();
        $data['data'] = $this->Admin_model->getGukar($id);
        $this->load->view('admin/wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/absen-bulanan', $data);
        $this->load->view('wrapper/footer');
    }
    public function dtl_absn()
    {
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['title'] = 'Daftar Absensi';
        $nbm = $this->input->get('nbm');
        $bulan = $this->input->get('bulan');
        $data['bulan'] = $this->db
            ->get_where('tbl_hari_efektif', ['id' => $bulan])
            ->row_array();
        $data['id'] = $this->db
            ->get_where('user', ['no_reg' => $nbm])
            ->row_array();
        $bulan = $this->input->get('bulan');
        $data['data'] = $this->Admin_model->detail_absen_bln($nbm, $bulan);
        $this->load->view('admin/wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/detail-absen-bulanan', $data);
        $this->load->view('wrapper/footer');
    }
    public function cetak_pdf_bln()
    {
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['title'] = 'Daftar Absensi';
        $nama = $this->input->get('nama');
        $nbm = $this->input->get('nbm');
        $data['id'] = $this->db
            ->get_where('user', ['no_reg' => $nbm])
            ->row_array();
        $bulan = $this->input->get('bulan');
        $data['bulan'] = $bulan;
        $data['data'] = $this->Admin_model->detail_absen_bln($nbm, $bulan);
        $this->load->view('admin/cetak-pdf-bulanan', $data);

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
            'setAutoTopMargin' => false,
        ]);

        // $mpdf->SetHTMLHeader('
        // <div style="text-align: center; font-weight: bold;">
        //   <img src="assets/img/pi-2020.png" width="100%" height="100%" />
        // </div>');

        $html = $this->load->view('admin/cetak-pdf-bulanan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(
            'Detail Absensi ' . $nama . '.pdf',
            \Mpdf\Output\Destination::INLINE
        );
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_dh');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">Data berhasil dihapus!!!</div>'
        );
        redirect('admin');
    }
    public function gukar()
    {
        $data['title'] = 'Guru dan Karyawan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->input->get('status_id');
        $data['data'] = $this->Admin_model->getGukar($id);

        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/gukar', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->tambah_gukar();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/gukar');
        }
    }

    public function edit_gukar($id)
    {
        $data['title'] = 'Edit Guru dan Karyawan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('tbl_gukar', ['id' => $id])->row_array();
        $status = $this->db->get_where('tbl_gukar', ['id' => $id])->row_array();
        $data['keterangan'] = $this->db->get_where('tbl_keterangan',['id_ref_status' => $status['status']])->result_array();

        $this->form_validation->set_rules('id', 'ID', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/edit-gukar', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->edit_gukar();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/edit_gukar/' . $id);
        }
    }

    public function hapus_gukar()
    {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        $this->db->where('id', $id);
        $data = ['is_deleted' => 1];
        $this->db->update('tbl_gukar', $data);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">Data berhasil dihapus!!!</div>'
        );
        redirect('admin/gukar?status_id='.$status);
    }
    
    public function tbh_pgw()
    {
        $data = [
            'status' => $this->input->post('status'),
            'nbm' => $this->input->post('nama'),
        ];
        $this->db->insert('jam_kerja', $data);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>'
        );
        redirect('admin/jam_kerja');
    }

    //siswa
    public function siswa()
    {
        $data['title'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->Admin_model->getKelas();
        $data['jurusan'] = $this->Admin_model->getJurusan();
        $kelas = $this->input->get('kelas');
        $kls = $this->input->post('kelas');
        $data['kls'] = $kelas;
        $data['data'] = $this->db->get_where('tbl_siswa', ['kelas' => $kelas])->result_array();

        $this->form_validation->set_rules('nis','NIS','required|trim|is_unique[tbl_siswa.nis]',['is_unique' => 'NIS Sudah digunakan!']);
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/siswa', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->tambah_siswa();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>'
            );
            redirect('admin/siswa?kelas=' . $kls);
        }
    }
    public function edit_siswa($id)
    {
        $data['title'] = 'Edit Guru dan Karyawan';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['data'] = $this->db
            ->get_where('tbl_siswa', ['id' => $id])
            ->row_array();

        $this->form_validation->set_rules('id', 'ID', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/edit-siswa', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->edit_siswa();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>'
            );
            redirect('admin/edit_siswa/' . $id);
        }
    }
    public function hapus_siswa()
    {
        $id = $this->input->get('id');
        $kelas = $this->input->get('kelas');
        $this->db->where('id', $id);
        $this->db->delete('tbl_siswa');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">Data berhasil dihapus!!!</div>'
        );
        redirect('admin/siswa?kelas=' . $kelas);
    }

    public function hr_siswa()
    {
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['title'] = 'Daftar Absensi Harian';
        $data['kls'] = $this->db->get_where('tbl_kelas')->result_array();
        $level = $this->input->get('level');
        $date = $this->input->get('date');
        $kelas = $this->input->get('kelas');
        $data['data'] = $this->BK_model->absen_hr($level, $date, $kelas);
        $data['kelas'] = $kelas;
        $this->load->view('admin/wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/absen-harian-siswa', $data);
        $this->load->view('wrapper/footer');
    }
    public function edit_hr_siswa($id)
    {
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['title'] = 'Edit Absensi Harian';
        $data['data'] = $this->db
            ->get_where('tbl_dh', ['id' => $id])
            ->row_array();

        $this->form_validation->set_rules('id', 'ID', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/edit-harian-siswa', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->BK_model->edit_absen();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>'
            );
            redirect('admin/edit_hr/' . $id);
        }
    }
    public function bln_siswa()
    {
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['title'] = 'Daftar Absensi Bulanan';
        $data['kls'] = $this->db->get_where('tbl_kelas')->result_array();
        $kelas = $this->input->get('kelas');
        $bulan = $this->input->get('bulan');
        $data['bulan'] = $this->db
            ->get_where('tbl_hari_efektif', ['id' => $bulan])
            ->row_array();
        $data['data'] = $this->BK_model->absen_bln($kelas);

        $this->load->view('admin/wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/absen-bulanan-siswa', $data);
        $this->load->view('wrapper/footer');
    }
    public function dtl_absn_siswa()
    {
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['title'] = 'Daftar Absensi';
        $nis = $this->input->get('nis');
        $data['id'] = $this->db
            ->get_where('tbl_siswa', ['nis' => $nis])
            ->row_array();
        $bulan = $this->input->get('bulan');
        $data['bulan'] = $bulan;
        $data['data'] = $this->BK_model->detail_absen_bln($nis, $bulan);
        $this->load->view('admin/wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/detail-absen-bulanan-siswa', $data);
        $this->load->view('wrapper/footer');
    }
    public function cetak_pdf_bln_siswa()
    {
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['title'] = 'Daftar Absensi';
        $nama = $this->input->get('nama');
        $nis = $this->input->get('nis');
        $data['id'] = $this->db
            ->get_where('tbl_siswa', ['nis' => $nis])
            ->row_array();
        $bulan = $this->input->get('bulan');
        $data['bulan'] = $bulan;
        $data['data'] = $this->BK_model->detail_absen_bln($nis, $bulan);
        $data['count'] = $this->Count_model->bulan($bulan, $nis);
        $data['efektif'] = $this->db
            ->get_where('tbl_hari_efektif', ['id' => $bulan])
            ->row_array();
        $this->load->view('admin/cetak-pdf-bulanan-siswa', $data);

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
            'setAutoTopMargin' => false,
        ]);

        // $mpdf->SetHTMLHeader('
        // <div style="text-align: center; font-weight: bold;">
        //   <img src="assets/img/pi-2020.png" width="100%" height="100%" />
        // </div>');
        $filename =
            'Detail Absensi ' . $nama . ' bulan ' . bulan($bulan) . '.pdf';
        $html = $this->load->view('admin/cetak-pdf-bulanan-siswa', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
    }

    //kegiatan
    public function kegiatan()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $owner = $this->input->get('owner');
        $owner2 = $this->input->post('owner');
        $data['data'] = $this->db
            ->get_where('tbl_kegiatan', ['owner' => $owner])
            ->result_array();

        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('time', 'Waktu', 'required');
        $this->form_validation->set_rules(
            'kegiatan',
            'Nama Kegiatan',
            'required'
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/kegiatan', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->tambah_kegiatan();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>'
            );
            redirect('admin/kegiatan?owner=' . $owner2);
        }
    }
    public function edit_kegiatan($id)
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['data'] = $this->db
            ->get_where('tbl_kegiatan', ['id' => $id])
            ->row_array();
        $owner2 = $this->input->post('owner');

        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('time', 'Waktu', 'required');
        $this->form_validation->set_rules(
            'kegiatan',
            'Nama Kegiatan',
            'required'
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/edit-kegiatan', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->edit_kegiatan();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>'
            );
            redirect('admin/kegiatan?owner=' . $owner2);
        }
    }
    public function detail_kegiatan($id)
    {
        $data['title'] = 'Detail Kegiatan';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['data'] = $this->db
            ->get_where('tbl_dh_kegiatan', ['id_kegiatan' => $id])
            ->result_array();
        $data['id'] = $id;
        $data['data2'] = $this->db
            ->get_where('tbl_kegiatan', ['id' => $id])
            ->row_array();
        $this->load->view('admin/wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/detail-kegiatan', $data);
        $this->load->view('wrapper/footer', $data);
    }
    public function cetak_pdf_kegiatan()
    {
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['title'] = 'Daftar hadir Kegiatan';
        $id = $this->input->get('id');
        $data['data'] = $this->db
            ->get_where('tbl_kegiatan', ['id' => $id])
            ->row_array();
        $data['tgl'] = $this->db
            ->get_where('tbl_kegiatan', ['id' => $id])
            ->row_array();
        $data['data2'] = $this->db
            ->get_where('tbl_dh_kegiatan', ['id_kegiatan' => $id])
            ->result_array();
        $this->load->view('admin/cetak-pdf-kegiatan', $data);

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
            'setAutoTopMargin' => false,
        ]);

        // $mpdf->SetHTMLHeader('
        // <div style="text-align: center; font-weight: bold;">
        //   <img src="assets/img/pi-2020.png" width="100%" height="100%" />
        // </div>');
        $filename = 'Daftar Hadir Kegiatan ' . $this->input->get('kegiatan');
        '.pdf';
        $html = $this->load->view('admin/cetak-pdf-kegiatan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
    }

    public function hapus_kegiatan($id)
    {
        // $owner = $this->input->post('owner');
        $this->db->where('id', $id);
        $this->db->delete('tbl_kegiatan');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">Data berhasil dihapus!!!</div>'
        );
        redirect('admin/kegiatan');
    }
    public function file_kegiatan()
    {
        $data['title'] = 'Upload Dokumentasi';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $id = $this->input->get('id');
        $data['data'] = $this->db
            ->get_where('tbl_kegiatan', ['id' => $id])
            ->row_array();

        $this->form_validation->set_rules('id', 'ID', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/upload-file', $data);
            $this->load->view('wrapper/footer');
        } else {
            $judul = $this->input->post('judul');
            $owner = $this->input->post('owner');
            $config['allowed_types'] = 'jpeg|jpg|png|jpeg|pdf|doc|docx';
            $config['max_size'] = '10240';
            $config['upload_path'] = './image/kegiatan/file';
            $config['file_name'] = $judul;

            $this->load->library('upload', $config);
            if ($_FILES['file']['name'] != null) {
                if ($this->upload->do_upload('file')) {
                    $file = $this->upload->data('file_name');
                    $id = $this->input->post('id');
                    $data = [
                        'id_kegiatan' => $id,
                        'file' => $file,
                    ];

                    $this->db->insert('file', $data);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">
                Data berhasil diupdate!</div>'
                    );
                    redirect('admin/kegiatan?owner=' . $owner);
                } else {
                    $error = ['error' => $this->upload->display_errors()];
                    $this->load->view('admin/wrapper/header', $data);
                    $this->load->view('admin/wrapper/sidebar', $data);
                    $this->load->view('admin/wrapper/topbar', $data);
                    $this->load->view('admin/error', $error);
                    $this->load->view('wrapper/footer');
                }
            }
        }
    }
    public function foto_kegiatan()
    {
        $data['title'] = 'Upload Dokumentasi';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $id = $this->input->get('id');
        $data['data'] = $this->db
            ->get_where('tbl_kegiatan', ['id' => $id])
            ->row_array();
        $this->load->view('admin/wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/upload-foto', $data);
        $this->load->view('wrapper/footer');
    }
    public function upload_foto_kegiatan()
    {
        $owner = $this->input->post('owner');
        $data = [];

        $count = count($_FILES['foto']['name']);

        for ($i = 0; $i < $count; $i++) {
            if (!empty($_FILES['foto']['name'][$i])) {
                $_FILES['file']['name'] = $_FILES['foto']['name'][$i];
                $_FILES['file']['type'] = $_FILES['foto']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['foto']['error'][$i];
                $_FILES['file']['size'] = $_FILES['foto']['size'][$i];

                $config['upload_path'] = './image/kegiatan/foto';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '20000';
                $config['file_name'] = $_FILES['foto']['name'][$i];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    foreach ($_POST['id'] as $key => $val) {
                        $data[] = [
                            'id_kegiatan' => $_POST['id'][$key],
                            'foto' => $filename,
                        ];
                    }
                    $this->db->insert_batch('foto', $data);
                }
            }
        }

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
                Data berhasil diupdate!</div>'
        );
        redirect('admin/kegiatan?owner=' . $owner);
    }
    public function fl_keg()
    {
        $data['title'] = 'Upload Dokumentasi';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $owner = $this->input->get('owner');
        $id = $this->input->get('id');
        $data['dt'] = $this->db
            ->get_where('tbl_kegiatan', ['owner' => $owner])
            ->result_array();
        $data['dt2'] = $this->db
            ->get_where('tbl_kegiatan', ['owner' => $owner])
            ->row_array();
        $data['data'] = $this->db
            ->get_where('file', ['id_kegiatan' => $id])
            ->result_array();
        $this->load->view('admin/wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/file-kegiatan', $data);
        $this->load->view('wrapper/footer');
    }
    function file($name = null)
    {
        $this->load->helper('download');
        // $name = $this->uri->segment(4);
        $data = file_get_contents(base_url('/image/kegiatan/file/' . $name));
        force_download($name, $data);
    }
    function hapus_file()
    {
        $owner = $this->input->get('owner');
        $id_keg = $this->input->get('id_keg');
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('file');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">Data berhasil dihapus!!!</div>'
        );
        redirect('admin/fl_keg?id=' . $id_keg . '&owner=' . $owner);
    }
    public function ft_keg()
    {
        $data['title'] = 'Upload Dokumentasi';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $owner = $this->input->get('owner');
        $id = $this->input->get('id');
        $data['dt'] = $this->db
            ->get_where('tbl_kegiatan', ['owner' => $owner])
            ->result_array();
        $data['dt2'] = $this->db
            ->get_where('tbl_kegiatan', ['owner' => $owner])
            ->row_array();
        $data['data'] = $this->db
            ->get_where('foto', ['id_kegiatan' => $id])
            ->result_array();
        $this->load->view('admin/wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/foto-kegiatan', $data);
        $this->load->view('wrapper/footer');
    }
    function foto($name = null)
    {
        $this->load->helper('download');
        // $name = $this->uri->segment(4);
        $data = file_get_contents(base_url('/image/kegiatan/foto/' . $name));
        force_download($name, $data);
    }
    function hapus_foto()
    {
        $owner = $this->input->get('owner');
        $id_keg = $this->input->get('id_keg');
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('foto');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">Data berhasil dihapus!!!</div>'
        );
        redirect('admin/ft_keg?id=' . $id_keg . '&owner=' . $owner);
    }
    public function hr_efektif()
    {
        $data['title'] = 'Hari Efektif';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['data'] = $this->db
            ->get_where('tbl_hari_efektif')
            ->result_array();

        $this->form_validation->set_rules('id[]', 'ID', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/hr-efektif', $data);
            $this->load->view('wrapper/footer');
        } else {
            $id = $this->input->post('id[]');
            $jml = $this->input->post('jml[]');
            $result = [];
            foreach ($id as $key => $val) {
                $result[] = [
                    'id' => $id[$key],
                    'jml' => $jml[$key],
                ];
            }
            $this->db->update_batch('tbl_hari_efektif', $result, 'id');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data berhasil di update!!!</div>'
            );
            redirect('admin/hr_efektif');
        }
    }

    public function edit_dhkeg()
    {
        $id = $this->input->post('owner');
        $data = [
            'status' => $this->input->post('status'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_dh_kegiatan', $data);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data berhasil di update!!!</div>'
        );
        redirect('admin/detail_kegiatan/' . $id);
    }
    public function hapus_dhkeg()
    {
        $idkeg = $this->input->get('idkeg');
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('tbl_dh_kegiatan');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data berhasil di update!!!</div>'
        );
        redirect('admin/detail_kegiatan/' . $idkeg);
    }
    public function jam_kerja()
    {
        $data['title'] = 'Jam Kerja';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $status = $this->input->get('status_id');
        $data['sts'] = $status;
        $data['gukar'] = $this->db
            ->get_where('tbl_gukar', ['status' => $status])
            ->result_array();
        $data['data'] = $this->db
            ->get_where('jam_kerja', ['status' => $status])
            ->result_array();

        $this->form_validation->set_rules('id[]', 'ID', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/jam-kerja', $data);
            $this->load->view('wrapper/footer');
        } else {
            $id = $this->input->post('id[]');
            $senin = $this->input->post('senin[]');
            $selasa = $this->input->post('selasa[]');
            $rabu = $this->input->post('rabu[]');
            $kamis = $this->input->post('kamis[]');
            $jumat = $this->input->post('jumat[]');
            $status = $this->input->post('status');
            $result = [];
            foreach ($id as $key => $val) {
                $result[] = [
                    'id' => $id[$key],
                    'senin' => $senin[$key],
                    'selasa' => $selasa[$key],
                    'rabu' => $rabu[$key],
                    'kamis' => $kamis[$key],
                    'jumat' => $jumat[$key],
                ];
            }
            $this->db->update_batch('jam_kerja', $result, 'id');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data berhasil di update!!!</div>'
            );
            redirect('admin/jam_kerja?status_id=' . $status);
        }
    }

    public function user_role(){
        $data['title'] = 'User Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('user',['status_id'=>0,'is_active'=>1])->result_array();
        $this->load->view('admin/wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/user-role', $data);
        $this->load->view('wrapper/footer');
    }

}