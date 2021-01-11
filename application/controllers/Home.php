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
    public function siswa_masuk()
    {
        $data['title'] = 'Form Absen';
        $data['nis'] = $this->Home_model->getNIS();
        $nbm = $this->input->get('nbm');
        $date = $this->input->get('date');
        $data['data'] = $this->db->get_where('tbl_dh', ['nbm' => $nbm, 'date_in' => $date])->result_array();
        $tgl = date('Y-m-d');
        $data['motivasi'] = $this->db->get_where('tbl_motivasi', ['tgl' => $tgl])->row_array();
        $this->load->view('home/wrapper/header', $data);
        $this->load->view('home/wrapper/navbar', $data);
        $this->load->view('home/siswa-masuk', $data);
        $this->load->view('home/wrapper/footer', $data);
    }
    public function siswa_pulang()
    {
        $data['title'] = 'Form Absen';
        $data['nis'] = $this->Home_model->getNIS();
        $this->load->view('home/wrapper/header', $data);
        $this->load->view('home/wrapper/navbar', $data);
        $this->load->view('home/siswa-pulang', $data);
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

    public function kegiatan()
    {
        $data['title'] = 'Home';
        $data['data'] = $this->Home_model->getKegiatan();
        $this->load->view('home/wrapper/header', $data);
        $this->load->view('home/wrapper/navbar', $data);
        $this->load->view('home/kegiatan', $data);
        $this->load->view('home/wrapper/footer', $data);
    }
    public function detail_kegiatan($id)
    {
        $data['title'] = 'Home';
        $data['data'] = $this->db->get_where('tbl_dh_kegiatan', ['id_kegiatan' => $id])->result_array();
        $this->load->view('home/wrapper/header', $data);
        $this->load->view('home/wrapper/navbar', $data);
        $this->load->view('home/detail-kegiatan', $data);
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

    public function kirim_email()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $message =
            'Nama : ' . $this->input->post('name') . '<br/>' .
            'Phone : ' . $this->input->post('phone') . '<br/>' .
            'Email : ' . $this->input->post('email') . '<br/>' . '<br/>' .
            'Kritik dan Saran :' . '<br/>' .
            $this->input->post('message');

        // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'ekocahyanto007@gmail.com',  // Email gmail
            'smtp_pass'   => 'C4hy4-1993',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];
        $this->email->initialize($config);
        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from($email, $name);

        // Email penerima
        $this->email->to('ekocahyanto007@gmail.com'); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Aplikasi Absensi');

        // Isi email
        $this->email->message($message);

        // Tampilkan pesan sukses atau error
        $this->email->send();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kritik dan saran anda berhasil dikirm ke email developer!!!</div>');
        redirect('home');
    }
}
