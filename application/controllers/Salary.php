<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */
class Salary extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect();
        }
        $this->load->model('Admin_model');
        $this->load->model('Home_model');
        $this->load->model('Bk_model');
        $this->load->model('Count_model');
        $this->load->model('Salary_model', 'Salary');
    }

      public function index(){
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Admin_model->getDH();
        $this->load->view('salary/wrapper/header', $data);
        $this->load->view('salary/wrapper/sidebar', $data);
        $this->load->view('salary/wrapper/topbar', $data);
        $this->load->view('salary/index', $data);
        $this->load->view('wrapper/footer');
    }
      public function salary(){
        $data['title'] = 'Salary';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->input->get('status_id');
        $data['data'] = $this->Admin_model->getGukar($id);
         $data['all_bulan'] = allbulan();

        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('salary/wrapper/header', $data);
            $this->load->view('salary/wrapper/sidebar', $data);
            $this->load->view('salary/wrapper/topbar', $data);
            $this->load->view('salary/salary', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->tambah_gukar();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/gukar');
        }
    }

    public function add_salary($userId,$month,$year){
        $data['title'] = 'Add Salary';
        $data['nbm'] = $userId;
        $data['month'] = $month;
        $data['year'] = $year;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['category'] = $this->db->get_where('tbl_salary_category',['is_deleted'=>0])->result_array();
        $this->load->view('salary/wrapper/header', $data);
        $this->load->view('salary/wrapper/sidebar', $data);
        $this->load->view('salary/wrapper/topbar', $data);
        $this->load->view('salary/add-salary', $data);
        $this->load->view('wrapper/footer');
    }

    public function tambah_salary(){
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->input->get('status');
        $data['data'] = $this->Admin_model->getGukar($id);
        $data['all_bulan'] = allbulan();

        // $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('nbm[]', 'NBM', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('salary/wrapper/header', $data);
            $this->load->view('salary/wrapper/sidebar', $data);
            $this->load->view('salary/wrapper/topbar', $data);
            $this->load->view('salary/tambah-salary', $data);
            $this->load->view('wrapper/footer');
        } else {
            $nbm = $this->input->post('nbm[]');
            $umum = $this->input->post('umum[]');
            $jabatan = $this->input->post('jabatan[]');
            $stafsus = $this->input->post('stafsus[]');
            $keamanan = $this->input->post('keamanan[]');
            $potongan = $this->input->post('potongan[]');
            $bulan = $this->input->post('bulan[]');
            $tahun = $this->input->post('tahun[]');
            $result = array();
            foreach($nbm as $key => $val){
                $result[] = array(
                    'id_peg' => $nbm[$key],
                    'umum' => $umum[$key],
                    'jabatan' => $jabatan[$key],
                    'stafsus' => $stafsus[$key],
                    'keamanan' => $keamanan[$key],
                    'potongan' => $potongan[$key],
                    'bulan' => $bulan[$key],
                    'tahun' => $tahun[$key],
                );
            }
            $this->db->insert_batch('tbl_salary', $result);
            $this->session->set_flashdata(
                'message',
                'Data Berhasil ditambahkan!!!'
            );
            redirect('salary/tambah_salary?status=2');
        }
    }

    public function category(){
        $data['title'] = 'Category';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('tbl_salary_category',['is_deleted'=>0])->result_array();
        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('salary/wrapper/header', $data);
            $this->load->view('salary/wrapper/sidebar', $data);
            $this->load->view('salary/wrapper/topbar', $data);
            $this->load->view('salary/category', $data);
            $this->load->view('wrapper/footer');
        } else {
            $data = ['name' => $this->input->post('name')];
            $this->db->insert('tbl_salary_category', $data);
            $this->session->set_flashdata('message','Data Berhasil ditambahkan!!!');
            redirect('salary/category');
        }
    }
    
    public function edit_category(){
        $id = $this->input->post('id');
        $data = array(
            'name' => $this->input->post('name')
        );
        $this->db->where('id', $id);
        $this->Salary->updateCategory($id, $data);
        $this->session->set_flashdata('message','Data Berhasil diupdate!!!');
            redirect('salary/category');
    }
    
    public function sub_category(){
        $data['title'] = 'Category';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('tbl_salary_sub_category',['is_deleted'=>0])->result_array();
        $data['category'] = $this->db->get_where('tbl_salary_category',['is_deleted'=>0])->result_array();
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('salary/wrapper/header', $data);
            $this->load->view('salary/wrapper/sidebar', $data);
            $this->load->view('salary/wrapper/topbar', $data);
            $this->load->view('salary/sub-category', $data);
            $this->load->view('wrapper/footer');
        } else {
            $data = [
                'id_salary_category' => $this->input->post('category'),
                'name' => $this->input->post('name')
            ];
            $this->db->insert('tbl_salary_sub_category', $data);
            $this->session->set_flashdata('message','Data Berhasil ditambahkan!!!');
            redirect('salary/sub_category');
        }
    }

    public function master_salary(){
        $data['title'] = 'Master Salary';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['category'] = $this->db->get_where('tbl_salary_category',['is_deleted'=>0])->result_array();
        $data['subcategory'] = $this->db->get_where('tbl_salary_sub_category',['is_deleted'=>0])->result_array();
        $data['data'] = $this->db->get_where('tbl_master_salary',['is_deleted'=>0])->result_array();
        $this->form_validation->set_rules('sub-category', 'Sub Category', 'required');
        $this->form_validation->set_rules('qty', 'QTY', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('salary/wrapper/header', $data);
            $this->load->view('salary/wrapper/sidebar', $data);
            $this->load->view('salary/wrapper/topbar', $data);
            $this->load->view('salary/master-salary', $data);
            $this->load->view('wrapper/footer');
        } else {
            $data = [
                'id_salary_sub_category' => $this->input->post('sub-category'),
                'qty' => $this->input->post('qty'),
                'price' => $this->input->post('price'),
            ];
            $this->db->insert('tbl_master_salary', $data);
            $this->session->set_flashdata('message','Data Berhasil ditambahkan!!!');
            redirect('salary/master_salary');
        }
    }
}