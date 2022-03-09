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
        $this->load->helper('url');
        $this->load->model('Admin_model');
        $this->load->model('Home_model');
        // $this->load->model('BK_model', 'bk');
        $this->load->model('Count_model', 'count');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('tbl_gukar',['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('guru/wrapper/header', $data);
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
            $this->load->view('guru/wrapper/header', $data);
            $this->load->view('guru/wrapper/sidebar', $data);
            $this->load->view('guru/wrapper/topbar', $data);
            $this->load->view('guru/change-password', $data);
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
                redirect('guru/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">Password baru sama dengan yang lama!!!</div>'
                    );
                    redirect('guru/changepassword');
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
                    redirect('guru/changepassword');
                }
            }
        }
    }

    public function absensi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar Absensi';
        $data['tp'] = $this->Home_model->getTp();
        $id = $this->input->get('status_id');
        $data['id'] = $id;
        $bulan = $this->input->get('bulan');
        $data['bulan'] = $this->db->get_where('tbl_hari_efektif', ['id' => $bulan])->row_array();
        $data['level'] = $this->db->get_where('tbl_status', ['id' => $id])->row_array();
        $data['all_bulan'] = allbulan();
        $data['data'] = $this->db->get_where('tbl_gukar', ['status' => $id])->result_array();
        $nbm = $this->input->get('nbm');
        $bulan = $this->input->get('bulan');
        $data['bulan'] = $this->db->get_where('tbl_hari_efektif', ['id' => $bulan])->row_array();
        $data['id'] = $this->db->get_where('user', ['no_reg' => $nbm])->row_array();
        $bulan = @$this->input->get('bulan') ? $this->input->get('bulan') : date('m');
        $tahun = @$this->input->get('tahun') ? $this->input->get('tahun') : date('Y');
        $data['data'] = $this->Admin_model->detail_absen_bln($nbm, $bulan);
        $data['hari'] = hari_bulan($bulan, $tahun);

        $this->load->view('guru/wrapper/header', $data);
        $this->load->view('guru/wrapper/sidebar', $data);
        $this->load->view('guru/wrapper/topbar', $data);
        $this->load->view('guru/absensi', $data);
        $this->load->view('wrapper/footer');
    }

    public function rekap()
    {
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['title'] = 'Rekap Absensi';
        $id = $this->input->get('id');
        $data['tp'] = $this->db->get_where('tp')->result_array();
        $data['semester'] = $this->db->get_where('semester')->result_array();
        $data['data'] = $this->db
            ->get_where('tbl_hari_efektif', [
                'semester' => $this->input->get('semester'),
            ])
            ->result_array();
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
        $data['status'] = $this->db->get_where('tbl_kategori')->result_array();

        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('time', 'Waktu', 'required');
        $this->form_validation->set_rules(
            'kegiatan',
            'Nama Kegiatan',
            'required'
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('guru/wrapper/header', $data);
            $this->load->view('guru/wrapper/sidebar', $data);
            $this->load->view('guru/wrapper/topbar', $data);
            $this->load->view('guru/kegiatan', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->tambah_kegiatan();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>'
            );
            redirect('guru/kegiatan?owner=' . $owner2);
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
            $this->load->view('guru/wrapper/header', $data);
            $this->load->view('guru/wrapper/sidebar', $data);
            $this->load->view('guru/wrapper/topbar', $data);
            $this->load->view('guru/edit-kegiatan', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->edit_kegiatan();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>'
            );
            redirect('guru/kegiatan?owner=' . $owner2);
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
        $this->load->view('guru/wrapper/header', $data);
        $this->load->view('guru/wrapper/sidebar', $data);
        $this->load->view('guru/wrapper/topbar', $data);
        $this->load->view('guru/detail-kegiatan', $data);
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
        $data['data2'] = $this->db
            ->get_where('tbl_dh_kegiatan', ['id_kegiatan' => $id])
            ->result_array();
        $this->load->view('guru/cetak-pdf-kegiatan', $data);

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
        $html = $this->load->view('guru/cetak-pdf-kegiatan', [], true);
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
        redirect('guru');
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
            $this->load->view('guru/wrapper/header', $data);
            $this->load->view('guru/wrapper/sidebar', $data);
            $this->load->view('guru/wrapper/topbar', $data);
            $this->load->view('guru/upload-file', $data);
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
                    redirect('guru/kegiatan?owner=' . $owner);
                } else {
                    $error = ['error' => $this->upload->display_errors()];
                    $this->load->view('guru/wrapper/header', $data);
                    $this->load->view('guru/wrapper/sidebar', $data);
                    $this->load->view('guru/wrapper/topbar', $data);
                    $this->load->view('guru/error', $error);
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
        $this->load->view('guru/wrapper/header', $data);
        $this->load->view('guru/wrapper/sidebar', $data);
        $this->load->view('guru/wrapper/topbar', $data);
        $this->load->view('guru/upload-foto', $data);
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
        redirect('guru/kegiatan?owner=' . $owner);
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
        $this->load->view('guru/wrapper/header', $data);
        $this->load->view('guru/wrapper/sidebar', $data);
        $this->load->view('guru/wrapper/topbar', $data);
        $this->load->view('guru/file-kegiatan', $data);
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
        redirect('guru/fl_keg?id=' . $id_keg . '&owner=' . $owner);
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
        $this->load->view('guru/wrapper/header', $data);
        $this->load->view('guru/wrapper/sidebar', $data);
        $this->load->view('guru/wrapper/topbar', $data);
        $this->load->view('guru/foto-kegiatan', $data);
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
        redirect('guru/ft_keg?id=' . $id_keg . '&owner=' . $owner);
    }

    public function jurnal()
    {
        $data['title'] = 'Jurnal-ku';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $nbm = $this->input->get('nbm');
        $nbm2 = $this->input->post('nbm');
        $data['data'] = $this->db
            ->get_where('tbl_jurnal', ['nbm' => $nbm])
            ->result_array();

        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('time', 'Waktu', 'required');
        $this->form_validation->set_rules(
            'kegiatan',
            'Nama Kegiatan',
            'required'
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('guru/wrapper/header', $data);
            $this->load->view('guru/wrapper/sidebar', $data);
            $this->load->view('guru/wrapper/topbar', $data);
            $this->load->view('guru/jurnal', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->tambah_jurnal();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>'
            );
            redirect('guru/jurnal?nbm=' . $nbm2);
        }
    }
    public function edit_jurnal($id)
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $data['data'] = $this->db
            ->get_where('tbl_jurnal', ['id' => $id])
            ->row_array();
        $nbm = $this->input->post('nbm');

        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('time', 'Waktu', 'required');
        $this->form_validation->set_rules(
            'kegiatan',
            'Nama Kegiatan',
            'required'
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('guru/wrapper/header', $data);
            $this->load->view('guru/wrapper/sidebar', $data);
            $this->load->view('guru/wrapper/topbar', $data);
            $this->load->view('guru/edit-jurnal', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->edit_jurnal();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>'
            );
            redirect('guru/jurnal?nbm=' . $nbm);
        }
    }
    public function hapus_jurnal()
    {
        $nbm = $this->input->get('nbm');
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('tbl_jurnal');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">Data berhasil dihapus!!!</div>'
        );
        redirect('guru/jurnal?nbm=' . $nbm);
    }

    public function upload_jurnal()
    {
        $data['title'] = 'Upload Dokumentasi';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();
        $id = $this->input->get('id');
        $data['data'] = $this->db
            ->get_where('tbl_jurnal', ['id' => $id])
            ->row_array();

        $this->form_validation->set_rules('id', 'ID', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('guru/wrapper/header', $data);
            $this->load->view('guru/wrapper/sidebar', $data);
            $this->load->view('guru/wrapper/topbar', $data);
            $this->load->view('guru/upload-jurnal', $data);
            $this->load->view('wrapper/footer');
        } else {
            $id = $this->input->post('id');
            $nbm = $this->input->post('nbm');
            $config['allowed_types'] = 'jpeg|jpg|png|jpeg';
            $config['max_size'] = '10240';
            $config['upload_path'] = './image/jurnal';
            $config['file_name'] = 'Doc_jurnal-' . date('Y-m-d');

            $this->load->library('upload', $config);
            if ($_FILES['foto']['name'] != null) {
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                    $id = $this->input->post('id');
                    $data = [
                        'foto' => $foto,
                    ];
                    $this->db->where('id', $id);
                    $this->db->update('tbl_jurnal', $data);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">
                Data berhasil diupdate!</div>'
                    );
                    redirect('guru/jurnal?nbm=' . $nbm);
                } else {
                    $error = ['error' => $this->upload->display_errors()];
                    $this->load->view('guru/wrapper/header', $data);
                    $this->load->view('guru/wrapper/sidebar', $data);
                    $this->load->view('guru/wrapper/topbar', $data);
                    $this->load->view('guru/error', $error);
                    $this->load->view('wrapper/footer');
                }
            }
        }
    }

    public function cetak_pdf_jurnal()
    {
        $data['title'] = 'Cetak PDF Jurnal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tgl = $this->input->post('tgl');
        $nbm = $this->input->post('nbm');
        $data['data'] = $this->db->get_where('tbl_jurnal', ['tgl' => $tgl, 'nbm' => $nbm])->row_array();
        $data['data2'] = $this->db->get_where('tbl_jurnal', ['tgl' => $tgl, 'nbm' => $nbm])->result_array();
        $this->load->view('guru/wrapper/header', $data);
        $this->load->view('guru/wrapper/sidebar', $data);
        $this->load->view('guru/wrapper/topbar', $data);
        $this->load->view('guru/cetak-pdf-jurnal', $data);
        $this->load->view('wrapper/footer');

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

        $html = $this->load->view('guru/cetak-pdf-jurnal', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Jurnal-ku.pdf', \Mpdf\Output\Destination::INLINE);
    }

       public function event($date)
    {
        $data['title'] = 'Daftar Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('tbl_kegiatan',['tgl' => $date])->result_array();
        $this->load->view('guru/wrapper/header', $data);
        $this->load->view('guru/wrapper/sidebar', $data);
        $this->load->view('guru/wrapper/topbar', $data);
        $this->load->view('guru/event', $data);
        $this->load->view('wrapper/footer');
    }

       public function salary()
       {
        $data['title'] = 'Daftar Gaji';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['all_bulan'] = allbulan();
        $data['category'] = $this->db->get_where('tbl_salary_category',['is_deleted'=>0])->result_array();
        $this->load->view('guru/wrapper/header', $data);
        $this->load->view('guru/wrapper/sidebar', $data);
        $this->load->view('guru/wrapper/topbar', $data);
        $this->load->view('guru/salary', $data);
        $this->load->view('wrapper/footer');
    }

       public function cetak_salary()
       {
        $data['title'] = 'Daftar Gaji';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['all_bulan'] = allbulan();
        $data['category'] = $this->db->get_where('tbl_salary_category',['is_deleted'=>0])->result_array();
        $this->load->view('guru/wrapper/header', $data);
        $this->load->view('guru/wrapper/sidebar', $data);
        $this->load->view('guru/wrapper/topbar', $data);
        $this->load->view('guru/cetak-salary', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => array(105, 200),
            'orientation' => 'P',
            'setAutoTopMargin' => false,
        ]);

        $html = $this->load->view('guru/cetak-salary', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Salary-ku.pdf', \Mpdf\Output\Destination::INLINE);
    }
}