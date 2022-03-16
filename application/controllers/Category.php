<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model', 'Category');
    }
    public function get_sub_category(){
        $id = $this->input->get('id');
        $data = $this->Category->getSubCategory($id);
        echo json_encode($data);
    }

    public function saveSalary(){
        $idSubCategory = $this->input->post('idsubCategory');
        $idCategory = $this->input->post('idCategory');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        $nbm = $this->input->post('nbm');
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $data = [
            'id_peg' => $nbm,
            'month' => $month,
            'year' => $year,
            'id_salary_category' => $idCategory,
            'id_salary_sub_category' => $idSubCategory,
            'qty' => $qty,
            'price' => $price
        ];
        $this->db->insert('tbl_list_salary', $data);
    }

    public function get_master_Salary(){
        $id = $this->input->get('id');
        $data = $this->Category->getMasterSalary($id);
        echo json_encode($data);
    }

    public function cek_tempalate(){
        $idpeg = $this->input->get('idpeg');
        $idCategory = $this->input->get('idcategory');
        $idSubCategory = $this->input->get('idsubcategory');
        $data = $this->Category->cekTemplating($idpeg, $idCategory, $idSubCategory);
        echo json_encode($data);
    }
}