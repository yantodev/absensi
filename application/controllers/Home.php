<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Home_model');
        $this->load->model('Count_model');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['data'] = $this->db->get_where('tbl_kegiatan')->result_array();
        $this->load->view('home/wrapper/header', $data);
        $this->load->view('home/wrapper/navbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('home/wrapper/footer', $data);
    }
    public function absen()
    {
        $data['title'] = 'Form Absen';
        $data['nbm'] = $this->Home_model->getNBM();
        $this->load->view('home/wrapper/header', $data);
        $this->load->view('home/wrapper/navbar', $data);
        $this->load->view('home/absen', $data);
        $this->load->view('home/wrapper/footer', $data);
    }
    public function pulang()
    {
        $data['title'] = 'Form Absen';
        $data['nbm'] = $this->Home_model->getNBM();
        $nbm = $this->input->get('nbm');
        $date = $this->input->get('date');
        $data['data'] = $this->db->get_where('tbl_dh', ['nbm' => $nbm, 'date_in' => $date])->result_array();
        $this->load->view('home/wrapper/header', $data);
        $this->load->view('home/wrapper/navbar', $data);
        $this->load->view('home/pulang', $data);
        $this->load->view('home/wrapper/footer', $data);
    }
    public function absen_gukar_masuk()
    {
        $data['title'] = 'Form Absen';
        $data['nbm'] = $this->Home_model->getNBM();
        $tgl = date('Y-m-d');
        $data['motivasi'] = $this->db->get_where('tbl_motivasi', ['tgl' => $tgl])->row_array();
        $this->load->view('home/wrapper/header', $data);
        $this->load->view('home/wrapper/navbar', $data);
        $this->load->view('home/absen-gukar-masuk', $data);
        $this->load->view('home/wrapper/footer', $data);
    }
    public function absen_gukar_pulang()
    {
        $data['title'] = 'Form Absen';
        $data['nbm'] = $this->Home_model->getNBM();
        $this->load->view('home/wrapper/header', $data);
        $this->load->view('home/wrapper/navbar', $data);
        $this->load->view('home/absen-gukar-pulang', $data);
        $this->load->view('home/wrapper/footer', $data);
    }

    public function nama()
    {
        $nbm = $this->input->get('nbm');
        $iduka = $this->Home_model->nama($nbm);
        foreach ($iduka as $data) {
            $lists = "<option value='" . $data->nama . "'>" . $data->nama . "</option>";
        }
        $callback = array('list_nama' => $lists);
        echo json_encode($callback);
    }

    public function email()
    {
        $nbm = $this->input->get('nbm');
        $iduka = $this->Home_model->nama($nbm);
        foreach ($iduka as $data) {
            $lists = "<option value='" . $data->email . "'>" . $data->email . "</option>";
        }
        $callback = array('list_email' => $lists);
        echo json_encode($callback);
    }
    public function status()
    {
        $nbm = $this->input->get('nbm');
        $iduka = $this->Home_model->nama($nbm);
        foreach ($iduka as $data) {
            $lists = "<option value='" . $data->status . "'>" . status($data->status) . "</option>";
        }
        $callback = array('list_level' => $lists);
        echo json_encode($callback);
    }

    public function insert_DH()
    {
        $img = $_POST['image'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = './signature-image/daftar-hadir/' . uniqid() . '.png';
        $success = file_put_contents($file, $data);
        $image = str_replace('./', '', $file);

        // $id = $_POST['id'];
        $nbm = $_POST['nbm'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $bulan = $_POST['bulan'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $status = $_POST['status'];
        $alasan = $_POST['alasan'];
        $level = $_POST['level'];
        $data = array(
            'ttd_in' => $image,
            'nbm' => $nbm,
            'nama' => $nama,
            'email' => $email,
            'bulan' => $bulan,
            'date_in' => $date,
            'time_in' => $time,
            'status' => $status,
            'alasan' => $alasan,
            'level' => $level
        );
        $this->db->insert('tbl_dh', $data);
    }
    public function update_DH()
    {
        $img = $_POST['image'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = './signature-image/daftar-hadir/' . uniqid() . '.png';
        $success = file_put_contents($file, $data);
        $image = str_replace('./', '', $file);

        $nbm = $_POST['nbm'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $data = array(
            'ttd_out' => $image,
            'date_out' => $date,
            'time_out' => $time,
        );
        $this->db->where('nbm', $nbm);
        $this->db->where('date_in', $date);
        $this->db->update('tbl_dh', $data);
    }
    public function kegiatan()
    {
        $data['title'] = 'Home';
        $data['data'] = $this->Home_model->getKegiatan();
        $this->load->view('home/wrapper/header', $data);
        $this->load->view('home/wrapper/navbar', $data);
        $this->load->view('home/kegiatan', $data);
        $this->load->view('home/wrapper/footer', $data);
    }
    public function absen_kegiatan($id)
    {
        $data['title'] = 'Home';
        $data['kegiatan'] = $this->db->get_where('tbl_kegiatan', ['id' => $id])->row_array();
        $data['data'] = $this->Home_model->getKegiatan();
        $this->load->view('home/wrapper/header', $data);
        $this->load->view('home/wrapper/navbar', $data);
        $this->load->view('home/absen-kegiatan', $data);
        $this->load->view('home/wrapper/footer', $data);
    }
    public function insert_DH_kegiatan()
    {
        $img = $_POST['image'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = './signature-image/daftar-hadir-kegiatan/' . uniqid() . '.png';
        $success = file_put_contents($file, $data);
        $image = str_replace('./', '', $file);

        $id_keg = $_POST['id_keg'];
        $nbm = $_POST['nbm'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $tgl = $_POST['date'];
        $status = $_POST['status'];
        $alasan = $_POST['alasan'];
        $data = array(
            'id_kegiatan' => $id_keg,
            'nbm' => $nbm,
            'nama' => $nama,
            'email' => $email,
            'tgl' => $tgl,
            'status' => $status,
            'alasan' => $alasan,
            'ttd' => $image
        );
        $this->db->insert('tbl_dh_kegiatan', $data);
    }
    public function data()
    {
        $data['title'] = 'Home';
        $data['tp'] =  $this->Admin_model->getTP();
        $data['data'] =  $this->Admin_model->getJurusan();
        $jurusan = $this->input->get('jurusan');
        $data['iduka'] = $this->Admin_model->getIduka($jurusan);
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/data', $data);
        $this->load->view('home/footer', $data);
    }
    public function view()
    {
        $data['title'] = 'Home';
        $data['data2'] =  $this->Admin_model->getJurusan();
        $iduka = $this->input->get('iduka');
        $data['data'] = $this->Admin_model->getIdukaBy($iduka);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/header', $data);
        $this->load->view('home/view', $data);
        $this->load->view('home/footer', $data);
    }

    public function Permohonan()
    {
        $data['title'] = 'Home';
        $data['tp'] =  $this->Admin_model->getTP();
        $data['data'] =  $this->Home_model->Jurusan();
        $data['iduka'] = $this->db->get_where('tbl_iduka')->result_array();
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/permohonan', $data);
        $this->load->view('home/footer', $data);
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

    public function Cetak()
    {
        $data['title'] = 'Cetak Surat Permohonan';
        $data['tp'] =  $this->Admin_model->getTP();
        $data['data'] =  $this->Home_model->Jurusan();
        $data['instansi'] = $this->input->get('instansi');
        $data['iduka'] = $this->input->get('iduka');
        $iduka = $this->input->get('iduka');
        $data['data'] = $this->Admin_model->getIdukaByIduka($iduka);
        $data['alamat'] = $this->Admin_model->getAlamatIduka($iduka);
        $kajur = $this->input->get('jurusan');
        $data['kajur'] = $this->Admin_model->getKajur($kajur);

        $this->load->view('home/cetak', $data);

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'setAutoTopMargin' => false
            ]
        );
        $mpdf->SetFooter('<p align="left">
                            <font color="blue">
                                <i>Narahubung : 087839839710 (Humas IDUKA)</i>
                            </font>
                        </p>');

        $html = $this->load->view('home/cetak', [], true);
        $mpdf->WriteHTML($html);

        $mpdf->AddPage(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'setAutoTopMargin' => false
            ]
        );
        $mpdf->SetFooter('<p align="left">
                            1 lembar dikirim ke SMK Muh. Karangmojo<br />
                            1 lembar untuk arsip Kepala Kompetensi Keahlian<br />
                            1 lembar untuk arsip IDUKA (Instansi)<br />
                            *) Coret salah satu
                        </p>');
        $html2 = $this->load->view('home/cetak2', [], true);
        $mpdf->WriteHTML($html2);
        $mpdf->Output('Surat Permohonan PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function detailsiswa($id)
    {
        $data['title'] = 'Profile Siswa';
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('home/detail-siswa', $data);
        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('home/detail-siswa', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Detail Siswa.pdf', \Mpdf\Output\Destination::INLINE);
    }
}
