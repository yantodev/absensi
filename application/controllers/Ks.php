<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */

class Ks extends CI_Controller
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
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $this->load->view('ks/wrapper/header', $data);
        $this->load->view('ks/wrapper/sidebar', $data);
        $this->load->view('ks/wrapper/topbar', $data);
        $this->load->view('ks/index', $data);
        $this->load->view('wrapper/footer');
    }

    public function profile()
    {
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['title'] = 'My Profile';
        $this->load->view('ks/wrapper/header', $data);
        $this->load->view('ks/wrapper/sidebar', $data);
        $this->load->view('ks/wrapper/topbar', $data);
        $this->load->view('ks/profile', $data);
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
            $this->load->view('ks/wrapper/header', $data);
            $this->load->view('ks/wrapper/sidebar', $data);
            $this->load->view('ks/wrapper/topbar', $data);
            $this->load->view('ks/change-password', $data);
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
                redirect('ks/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">Password baru sama dengan yang lama!!!</div>'
                    );
                    redirect('ks/changepassword');
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
                    redirect('ks/changepassword');
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
        $this->load->view('ks/wrapper/header', $data);
        $this->load->view('ks/wrapper/sidebar', $data);
        $this->load->view('ks/wrapper/topbar', $data);
        $this->load->view('ks/absen-harian', $data);
        $this->load->view('wrapper/footer');
    }

    public function edit_hr($id)
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
            $this->load->view('ks/wrapper/header', $data);
            $this->load->view('ks/wrapper/sidebar', $data);
            $this->load->view('ks/wrapper/topbar', $data);
            $this->load->view('ks/edit-harian', $data);
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
        $data['id'] = $id;
        $bulan = $this->input->get('bulan');
        $data['bulan'] = $this->db->get_where('tbl_hari_efektif', ['id' => $bulan])->row_array();
        $data['level'] = $this->db->get_where('tbl_status', ['id' => $id])->row_array();
        // $data['data'] = $this->Admin_model->absen_bln($id);
        $data['all_bulan'] = allbulan();
        $data['data'] = $this->db->get_where('tbl_gukar', ['status' => $id,'is_deleted' => 0])->result_array();
        $this->load->view('ks/wrapper/header', $data);
        $this->load->view('ks/wrapper/sidebar', $data);
        $this->load->view('ks/wrapper/topbar', $data);
        $this->load->view('ks/absen-bulanan', $data);
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
        $bulan = @$this->input->get('bulan')
            ? $this->input->get('bulan')
            : date('m');
        $tahun = @$this->input->get('tahun')
            ? $this->input->get('tahun')
            : date('Y');
        $data['data'] = $this->Admin_model->detail_absen_bln($nbm, $bulan);
        $data['hari'] = hari_bulan($bulan, $tahun);
        $this->load->view('ks/wrapper/header', $data);
        $this->load->view('ks/wrapper/sidebar', $data);
        $this->load->view('ks/wrapper/topbar', $data);
        $this->load->view('ks/detail-absen-bulanan', $data);
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
        $bulan = @$this->input->get('bulan')
            ? $this->input->get('bulan')
            : date('m');
        $tahun = @$this->input->get('tahun')
            ? $this->input->get('tahun')
            : date('Y');
        $data['data'] = $this->Admin_model->detail_absen_bln($nbm, $bulan);
        $data['hari'] = hari_bulan($bulan, $tahun);
        $this->load->view('ks/cetak-pdf-bulanan', $data);

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
            'setAutoTopMargin' => false,
        ]);

        //  $mpdf->SetHTMLHeader('
        // <div style="text-align: center; font-weight: bold;">
        //   <img src="assets/img/kop.png"  />
        // </div>');

        $mpdf->SetFooter(
            '<p align="left">
                <font color="blue">
                    <i>https://presensi.smkmuhkarangmojo.sch.id</i>
                </font>
            </p>'
        );

        $html = $this->load->view('ks/cetak-pdf-bulanan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(
            'Detail Absensi ' . $nama . '.pdf',
            \Mpdf\Output\Destination::INLINE
        );
    }

    public function cetak_all_bln()
    {
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['title'] = 'Daftar Absensi';
        $id = $this->input->get('id');
        $data['data'] = $this->Admin_model->detail_all_bln($id);
        $this->load->view('ks/cetak-all-bulanan', $data);

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

        $html = $this->load->view('ks/cetak-all-bulanan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Detail Absensi.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_dh');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">Data berhasil dihapus!!!</div>'
        );
        redirect('ks');
    }

    public function jurnal()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['guru'] = $this->Admin_model->getGuru();
        $nbm = $this->input->get('nbm');
        $data['data'] = $this->Admin_model->getJurnal($nbm);
        $data['data2'] = $nbm;
        $data['data3'] = $this->db
            ->get_where('tbl_hari_efektif')
            ->result_array();
        $this->load->view('ks/wrapper/header', $data);
        $this->load->view('ks/wrapper/sidebar', $data);
        $this->load->view('ks/wrapper/topbar', $data);
        $this->load->view('ks/jurnal', $data);
        $this->load->view('wrapper/footer');
    }

    public function jurnal_harian()
    {
        $data['title'] = 'Cetak PDF Jurnal';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $tgl = $this->input->post('tgl');
        $nbm = $this->input->post('nbm');
        $data['nbm'] = $this->input->post('nbm');
        $data['data'] = $this->db
            ->get_where('tbl_jurnal', ['tgl' => $tgl, 'nbm' => $nbm])
            ->row_array();
        $data['data2'] = $this->Admin_model->getJurnal2($tgl, $nbm);
        $this->load->view('ks/wrapper/header', $data);
        $this->load->view('ks/wrapper/sidebar', $data);
        $this->load->view('ks/wrapper/topbar', $data);
        $this->load->view('ks/cetak-pdf-jurnal', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
            'setAutoTopMargin' => 'stretch',
        ]);

        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
          <img src="assets/img/kop.png" width="100%" />
        </div>');

        $nama = $this->input->post('nama');

        $html = $this->load->view('ks/cetak-pdf-jurnal', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(
            'Jurnal Harian ' . $nama . '.pdf',
            \Mpdf\Output\Destination::INLINE
        );
    }

    public function jurnal_bulanan()
    {
        $data['title'] = 'Cetak PDF Jurnal';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $bulan = $this->input->post('bulan');
        $data['bulan'] = $this->input->post('bulan');
        $nbm = $this->input->post('nbm');
        $data['nbm'] = $this->input->post('nbm');
        $data['data'] = $this->Admin_model->getJurnal3($bulan, $nbm);
        $this->load->view('ks/wrapper/header', $data);
        $this->load->view('ks/wrapper/sidebar', $data);
        $this->load->view('ks/wrapper/topbar', $data);
        $this->load->view('ks/cetak-pdf-jurnal-bulanan', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
            'setAutoTopMargin' => 'stretch',
        ]);

        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
          <img src="assets/img/kop.png" width="100%" />
        </div>');

        $nama = $this->input->post('nama');

        $html = $this->load->view('ks/cetak-pdf-jurnal-bulanan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(
            'Jurnal Bulanan ' . $nama . '.pdf',
            \Mpdf\Output\Destination::INLINE
        );
    }

    public function bebankerja()
    {
        $data['title'] = 'Beban Kerja';
        $status = $this->input->get('status');
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['data'] = $this->Admin_model->getGukar($status);

        $this->form_validation->set_rules('id[]', 'ID', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('ks/wrapper/header', $data);
            $this->load->view('ks/wrapper/sidebar', $data);
            $this->load->view('ks/wrapper/topbar', $data);
            $this->load->view('ks/beban-kerja', $data);
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
            $this->db->update_batch('tbl_gukar', $result, 'id');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data berhasil di update!!!</div>'
            );
            redirect('ks/bebankerja?status=' . $status);
        }
    }
}