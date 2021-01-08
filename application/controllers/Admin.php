<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        // is_logged_in();
        $this->load->model('Admin_model');
        $this->load->model('Home_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('wrapper/footer');
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Profile';
        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/profile', $data);
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
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/change-password', $data);
            $this->load->view('wrapper/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah!!!</div>');
                redirect('admin/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru sama dengan yang lama!!!</div>');
                    redirect('admin/changepassword');
                } else {
                    //password ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password baru sama dengan yang lama!!!</div>');
                    redirect('admin/changepassword');
                }
            }
        }
    }

    public function data()
    {
        $data['title'] = 'Data siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $tp = $this->input->get('tp');
        $jurusan = $this->input->get('jurusan');
        $data['tp'] = $this->Admin_model->getTP();
        $data['jurusan'] = $this->Admin_model->getJurusan();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => $jurusan,])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/data-siswa', $data);
        $this->load->view('wrapper/footer');
    }

    public function detailData($id)
    {
        $data['title'] = 'Detail Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/detail-siswa', $data);
        $this->load->view('wrapper/footer');
    }

    public function editData($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);
        $data['tp'] = $this->Admin_model->getTP();
        $data['iduka'] = $this->db->get_where('tbl_jurusan')->result_array();

        $this->form_validation->set_rules('nama_instansi', 'Nama Instansi', 'required');
        $this->form_validation->set_rules('alamat_instansi', 'Alamat Instansi', 'required');
        $this->form_validation->set_rules('nama_pejabat', 'Nama Pejabat/Pemilik', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/edit-siswa', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->editSiswa();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/data');
        }
    }

    public function hapus($id)
    {
        $this->Admin_model->hapusData($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus!!!</div>');
        redirect('admin/data');
    }

    public function nilai()
    {
        $data['title'] = 'Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $jurusan = $this->input->get('jurusan');
        $data['tp'] = $this->Admin_model->getTP();
        $data['jurusan'] = $this->Admin_model->getJurusan();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => $jurusan,])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/nilai', $data);
        $this->load->view('wrapper/footer');
    }


    //TKRO
    public function nilaitkro()
    {
        $data['title'] = 'Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['data'] =  $this->Admin_model->Siswatkro();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Teknik Kendaraan Ringan Otomotif'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/tkro/nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function detailtkro($id)
    {
        $data['title'] = 'Detail Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/tkro/detail-nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function edittkro($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->form_validation->set_rules('nilai_1', 'Nilai Disiplin', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/tkro/edit-nilai', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->editSiswaTKRO();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/nilaitkro');
        }
    }

    //TBSM
    public function nilaitbsm()
    {
        $data['title'] = 'Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Teknik Bisnis Sepeda Motor'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/tbsm/nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function detailtbsm($id)
    {
        $data['title'] = 'Detail Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/tbsm/detail-nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function edittbsm($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->form_validation->set_rules('nilai_1', 'Nilai Disiplin', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/tbsm/edit-nilai', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->editSiswaTBSM();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/nilaitbsm');
        }
    }

    //AKL
    public function nilaiakl()
    {
        $data['title'] = 'Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Akuntansi dan Keuangan Lembaga'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/akl/nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function detailakl($id)
    {
        $data['title'] = 'Detail Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/akl/detail-nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function editakl($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->form_validation->set_rules('nilai_1', 'Nilai Disiplin', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/akl/edit-nilai', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->editSiswaAKL();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/nilaiakl');
        }
    }

    //OTKP
    public function nilaiotkp()
    {
        $data['title'] = 'Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Otomatisasi dan Tata Kelola Perkantoran'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/otkp/nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function detailotkp($id)
    {
        $data['title'] = 'Detail Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/otkp/detail-nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function editotkp($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->form_validation->set_rules('nilai_1', 'Nilai Disiplin', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/otkp/edit-nilai', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->editSiswaOTKP();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/nilaiotkp');
        }
    }

    //BDP
    public function nilaibdp()
    {
        $data['title'] = 'Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Bisnis Daring dan Pemasaran'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/bdp/nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function detailbdp($id)
    {
        $data['title'] = 'Detail Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/bdp/detail-nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function editbdp($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->form_validation->set_rules('nilai_1', 'Nilai Disiplin', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/bdp/edit-nilai', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->editSiswaBDP();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/nilaibdp');
        }
    }

    public function sertifikat()
    {
        $data['title'] = 'Cetak Sertifikat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/sertifikat');
        $this->load->view('wrapper/footer');
    }

    //SERTIFIKAT TKRO
    public function sertifikatTKRO()
    {
        $data['title'] = 'Cetak Sertifikat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Teknik Kendaraan Ringan Otomotif'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/tkro/sertifikat', $data);
        $this->load->view('wrapper/footer');
    }

    public function CetakDepantkro($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/tkro/sertifikat-depan', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
          <img src="assets/img/pi-2020.png" width="100%" height="100%" />
        </div>');

        $html = $this->load->view('admin/tkro/sertifikat-depan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function CetakBelakangtkro($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/tkro/sertifikat-belakang', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        // $mpdf->SetHTMLHeader('
        // <div style="text-align: center; font-weight: bold;">
        //   <img src="assets/img/pi-2020.png" width="100%" height="100%" />
        // </div>');

        $html = $this->load->view('admin/tkro/sertifikat-belakang', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    //Sertifikat TBSM
    public function sertifikatTBSM()
    {
        $data['title'] = 'Cetak Sertifikat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Teknik Bisnis Sepeda Motor'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/tbsm/sertifikat', $data);
        $this->load->view('wrapper/footer');
    }

    public function CetakDepantbsm($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/tbsm/sertifikat-depan', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
          <img src="assets/img/pi-2020.png" width="100%" height="100%" />
        </div>');

        $html = $this->load->view('admin/tbsm/sertifikat-depan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function CetakBelakangtbsm($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);
        $data['jurusan'] = $this->Admin_model->Jurusan();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/tbsm/sertifikat-belakang', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/tbsm/sertifikat-belakang', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    //Sertifikat AKL
    public function sertifikatAKL()
    {
        $data['title'] = 'Cetak Sertifikat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Akuntansi dan Keuangan Lembaga'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/akl/sertifikat', $data);
        $this->load->view('wrapper/footer');
    }

    public function CetakDepanakl($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/akl/sertifikat-depan', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/akl/sertifikat-depan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function CetakBelakangakl($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);
        $data['jurusan'] = $this->Admin_model->Jurusan();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/akl/sertifikat-belakang', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/akl/sertifikat-belakang', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    //Sertifikat OTKP
    public function sertifikatOTKP()
    {
        $data['title'] = 'Cetak Sertifikat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Otomatisasi dan Tata Kelola Perkantoran'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/otkp/sertifikat', $data);
        $this->load->view('wrapper/footer');
    }

    public function CetakDepanotkp($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/otkp/sertifikat-depan', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/otkp/sertifikat-depan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function CetakBelakangotkp($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);
        $data['jurusan'] = $this->Admin_model->Jurusan();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/otkp/sertifikat-belakang', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/otkp/sertifikat-belakang', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    //Sertifikat BDP
    public function sertifikatBDP()
    {
        $data['title'] = 'Cetak Sertifikat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Bisnis Daring dan Pemasaran'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/bdp/sertifikat', $data);
        $this->load->view('wrapper/footer');
    }

    public function CetakDepanbdp($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/bdp/sertifikat-depan', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/bdp/sertifikat-depan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function CetakBelakangbdp($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);
        $data['jurusan'] = $this->Admin_model->Jurusan();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/bdp/sertifikat-belakang', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/bdp/sertifikat-belakang', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function masterdata()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/master-data', $data);
        $this->load->view('wrapper/footer');
    }

    //IDUKA
    public  function iduka()
    {
        $data['title'] = 'IDUKA';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] =  $this->Admin_model->getJurusan();
        $jurusan = $this->input->get('jurusan');
        $data['iduka'] = $this->Admin_model->getIduka($jurusan);

        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('iduka', 'Iduka/Instansi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Iduka', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/iduka', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->addIduka();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil ditambah!!!</div>');
            redirect('admin/iduka');
        }
    }
    public function editIduka($id)
    {
        $data['title'] = 'Edit Data IDUKA';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Admin_model->getIdukaById($id);
        $data['data2'] =  $this->Admin_model->getJurusan();

        $this->form_validation->set_rules('jurusan', 'jurusan', 'required');
        $this->form_validation->set_rules('iduka', 'Iduka/Instansi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Iduka/Instansi', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/edit-iduka', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->editIduka();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/iduka');
        }
    }

    public function Pengumuman()
    {
        $data['title'] = 'Pengumuman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengumuman'] = $this->Admin_model->Pengumuman();

        $this->form_validation->set_rules('pengumuman', 'pengumuman', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/pengumuman', $data);
            $this->load->view('wrapper/footer');
        } else {
            $data = [
                'judul'  => htmlspecialchars($this->input->post('judul', true)),
                'pengumuman'  => htmlspecialchars($this->input->post('pengumuman', true))
            ];
            $this->db->insert('tbl_pengumuman', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengumuman Berhasil ditambah!!!</div>');
            redirect('admin/pengumuman');
        }
    }

    public function AlamatIduka()
    {
        $nama_instansi = $this->input->get('nama_instansi');
        $iduka = $this->Home_model->alamatIduka($nama_instansi);

        foreach ($iduka as $data) {
            $lists = "<option value='" . $data->alamat . "'>" . $data->alamat . "</option>";
        }
        $callback = array('list_alamat' => $lists);
        echo json_encode($callback);
    }
    public function listIduka()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $singkatan_jurusan = $this->input->get('jurusan');

        $iduka = $this->Home_model->Iduka($singkatan_jurusan);

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>Pilih Iduka/Instansi</option>";

        foreach ($iduka as $data) {
            $lists .= "<option value='" . $data->iduka . "'>" . $data->iduka . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        $callback = array('list_iduka' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function suratPKL($id)
    {
        $data['title'] = 'Surat PKL';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Admin_model->surat($id);

        $this->form_validation->set_rules('nomor', 'nomor', 'required');
        $this->form_validation->set_rules('lampiran', 'lampiran', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/surat-pkl', $data);
            $this->load->view('wrapper/footer');
        } else {
            $data = [
                'nomor'  => htmlspecialchars($this->input->post('nomor', true)),
                'lampiran'  => htmlspecialchars($this->input->post('lampiran', true)),
                'hal'  => htmlspecialchars($this->input->post('hal', true)),
                'tgl_pkl'  => htmlspecialchars($this->input->post('tgl_pkl', true)),
                'p1'  => htmlspecialchars($this->input->post('p1', true)),
                'p2'  => htmlspecialchars($this->input->post('p2', true)),
                'p3'  => htmlspecialchars($this->input->post('p3', true)),
                'p4'  => htmlspecialchars($this->input->post('p4', true)),
                'p5'  => htmlspecialchars($this->input->post('p5', true)),
                'p6'  => htmlspecialchars($this->input->post('p6', true)),
                'kepala_sekolah'  => htmlspecialchars($this->input->post('kepala_sekolah', true)),
                'nbm'  => htmlspecialchars($this->input->post('nbm', true)),
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tbl_surat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!!!</div>');
            redirect('admin/suratpkl/1');
        }
    }

    public function Guru()
    {
        $data['title'] = 'Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['guru'] = $this->Admin_model->Guru();
        $data['data'] =  $this->Admin_model->getJurusan();
        // $data['guru2'] =  $this->Admin_model->getGuruby();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('wrapper/footer');
    }
    public function editGuru($id)
    {
        $data['title'] = 'Edit Data Pendamping';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] =  $this->Admin_model->getJurusan();
        $data['guru'] =  $this->Admin_model->getGuruby($id);

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('nbm', 'nbm', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/edit-guru', $data);
            $this->load->view('wrapper/footer');
        } else {
            $data = [
                'nama'  => htmlspecialchars($this->input->post('nama', true)),
                'nbm'  => htmlspecialchars($this->input->post('nbm', true)),
                'hp'  => htmlspecialchars($this->input->post('hp', true)),
                'lokasi'  => htmlspecialchars($this->input->post('lokasi', true)),
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tbl_guru', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!!!</div>');
            redirect('admin/guru');
        }
    }

    public function tambahsiswa()
    {
        $data['title'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $tp = $this->input->get('tp');
        $jurusan = $this->input->get('jurusan');
        $data['tp'] = $this->Admin_model->getTP();
        $data['jurusan'] = $this->Admin_model->getJurusan();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => $jurusan,])->result_array();
        $data['guru'] = $this->db->get_where('tbl_guru')->result_array();

        $this->form_validation->set_rules('nis[]', 'NIS', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/tambah-siswa', $data);
            $this->load->view('wrapper/footer');
        } else {
            $nis = $this->input->post('nis');
            $result = array();
            foreach ($nis as $key => $val) {
                $result[] = array(
                    "nis" => $nis[$key],
                    "guru_pendamping"  => $_POST['guru_pendamping'][$key],
                );
            }
            $this->db->update_batch('master', $result, 'nis');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pendamping berhasil di update!!!</div>');
            redirect('admin/guru');
        }
    }

    public function inputpendamping()
    {
        $data = [
            'guru_pendamping'  => htmlspecialchars($this->input->post('guru_pendamping', true)),
        ];
        $this->db->where('nis', $this->input->post('nis'));
        $this->db->update('master', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!!!</div>');
    }


    public function resetpassword()
    {
        $data['title'] = 'Reset Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('admin/reset-password', $data);
        $this->load->view('wrapper/footer');
    }
}
