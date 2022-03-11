<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect();
        }
        // is_logged_in();
        $this->load->model('User_model', 'user');
    }

    public function getUserDetails($userId){
        $data = $this->user->getUserDetails($userId);
        echo json_encode($data);
    }

    public function update_access(){
        $id = $this->input->post('id');
        $data = array (
            'is_admin' => $this->input->post('admin'),
            'is_ks' => $this->input->post('ks'),
            'is_piket' => $this->input->post('piket'),
            'is_bendahara' => $this->input->post('bendahara')
        );
        $res = $this->user->update_access($id, $data);
        echo json_encode($res);
    }
}