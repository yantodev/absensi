<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validation berhasil
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            // user ada
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('administrator');
                    } else {
                        if ($user['role_id'] == 2) {
                            redirect('menu');
                        } else {
                            if ($user['role_id'] == 3) {
                                redirect('admin');
                            } else {
                                if ($user['role_id'] == 4) {
                                    redirect('tkro');
                                } else {
                                    if ($user['role_id'] == 5) {
                                        redirect('tbsm');
                                    } else {
                                        if ($user['role_id'] == 6) {
                                            redirect('akl');
                                        } else {
                                            if ($user['role_id'] == 7) {
                                                redirect('otkp');
                                            } else {
                                                if ($user['role_id'] == 8) {
                                                    redirect('bdp');
                                                } else {
                                                    if ($user['role_id'] == 11) {
                                                        redirect('bendahara');
                                                    } else {
                                                        if ($user['role_id'] == 12) {
                                                            redirect('adminlab');
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password!!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            This email has not been actived!</div>');
                redirect('auth');
            }
        } else {
            //user tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered!!!</div>');
            redirect('auth');
        }
    }
    public function registration()
    {
        $this->load->model('Admin_model');
        $data['jurusan'] = $this->Admin_model->getJurusan();
        $data['tp'] = $this->Admin_model->getTP();
        $this->form_validation->set_rules('role_id', 'Jurusan', 'required|trim');
        $this->form_validation->set_rules('tp', 'Tahun Pelajaran', 'required|trim');
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim|is_unique[master.nis]', [
            'is_unique' => 'NIS Sudah digunakan!'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nis'  => htmlspecialchars($this->input->post('nis', true)),
                'name'  => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'   => htmlspecialchars($this->input->post('role_id', true)),
                'is_active' => 1,
                'date_created' => date("Y-m-d H:i:s")
            ];
            $master = [
                'tp'  => htmlspecialchars($this->input->post('tp', true)),
                'nis'  => htmlspecialchars($this->input->post('nis', true)),
                'name'  => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'jurusan'   => htmlspecialchars($this->input->post('role_id', true))
            ];
            $this->db->insert('user', $data);
            $this->db->insert('master', $master);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! your account has been created. Please Login!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logged out!!!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
    public function maintenance()
    {
        $this->load->view('auth/maintenance');
    }
}
