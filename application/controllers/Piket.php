<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */
class Piket extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect();
        }
        $this->load->model('Admin_model', 'Admin');
        $this->load->model('Salary_model', 'Salary');
        $this->load->model('Piket_model', 'Piket');
    }

    public function index(){
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Admin->getDH();
        $this->load->view('piket/wrapper/header', $data);
        $this->load->view('piket/wrapper/sidebar', $data);
        $this->load->view('piket/wrapper/topbar', $data);
        $this->load->view('piket/index', $data);
        $this->load->view('wrapper/footer');
    }

    public function cekkbm(){
        $this->db->where('id_peg', $this->input->get('id_peg'));
        $this->db->where('jam', $this->input->get('jam'));
        $this->db->where('date', $this->input->get('date'));

        $result = $this->db->get('tbl_rekap_kbm')->result();

        echo json_encode($result);
    }
    public function add_kbm(){
        $data = array(
            'id_peg' => $_POST['id_peg'],
            'jam ' => $_POST['jam'],
            'status' => $_POST['status'],
            'keterangan' => $_POST['keterangan'],
            'date' => $_POST['date'],
            'month' => $_POST['month'],
            'year' => $_POST['year'],
            'created_by' => $_POST['created_by'],
            'modified_by' => "",
            'is_deleted' => 0
        );
        $this->db->insert('tbl_rekap_kbm', $data);
        return TRUE;
    }

    public function rekap_piket_hr(){
        $data['title'] = 'Rekap Piket';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['all_bulan'] = allbulan();
        $id = $this->input->get('status_id');
        $data['data'] = $this->Admin->getGukar($id);
        
        $this->load->view('piket/wrapper/header', $data);
        $this->load->view('piket/wrapper/sidebar', $data);
        $this->load->view('piket/wrapper/topbar', $data);
        $this->load->view('piket/rekap-piket', $data);
        $this->load->view('wrapper/footer');
    }

    public function detail_kbm($nbm, $date){
        $data['title'] = 'Detail KBM ';
        $data['date'] = $date;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Piket->getDetailKbm($nbm, $date);
        $data['detail'] = $this->Admin->getDetailGukarById($nbm);
        $this->load->view('piket/wrapper/header', $data);
        $this->load->view('piket/wrapper/sidebar', $data);
        $this->load->view('piket/wrapper/topbar', $data);
        $this->load->view('piket/detail-kbm', $data);
        $this->load->view('wrapper/footer');
    }
}