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
}
