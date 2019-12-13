<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Latihan extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('Data_diri_model', 'data_diri');
    $this->load->model('Latihan_model', 'latihan');
    $this->load->model('Mata_pelajaran_model', 'mapel');
    $this->load->model('Kelas_model', 'kelas');
    $this->load->model('Soal_model', 'soal');
    $this->load->model('Pembahasan_model', 'pembahasan');
  }

  public function index()
  {
    $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $name           = $user['nama'];
    $img            = $user['img'];
    $date_created   = $user['date_created'];
    $data = [
      'head'          => 'Latihan',
      'name'          => $name,
      'img'           => $img,
      'date_created'  => $date_created
    ];


    $id = $this->session->userdata('user_id');
    $profile = $this->data_diri->get_where($id);

    if (!$profile['nis']) {
      $data['pesan'] = '
     <div class="alert alert-danger alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       Mohon lengkapi data administrasi anda
     </div>
     ';
    } else {
      $data['pesan'] = '';
    }
    $data['mapel'] = $this->mapel->get();
    $this->load->view('templates/head', $data);
    $this->load->view('templates/nav', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('latihan-siswa/index', $data);
    $this->load->view('templates/footer');
  }

  public function mulai()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('id', 'Id', 'trim|required');
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Terjadi kesalahan mohon ulangi
      </div>');
      redirect('latihan');
    } else {
      $id_mapel = htmlspecialchars($this->input->post('id'), true);
      $id_user = $this->session->userdata('user_id');
      $kelas = $this->data_diri->get_where($id_user);
      $id_kelas = $kelas['id_kelas'];
      $soal = $this->latihan->get_by_kelas($id_kelas, $id_mapel);
      if (!$soal) {
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Tidak ada latihan untuk mata pelajaran yang dipilih untuk anda
        </div>');
        redirect('latihan');
      } else {
        $result = $this->latihan->get_jawaban($id_mapel);
        if (!$result) {
          $data['soal'] = $this->latihan->get_by_kelas($id_kelas, $id_mapel);
          $data['pengaturan'] = $this->db->get_where('pengaturan', ['id' => 1])->row_array();
          $this->load->view('latihan-siswa/latihan', $data);
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Mohon maaf anda telah mengerjakan latihan ini
          </div>');
          redirect('latihan');
        }
      }
    }
  }

  public function simpan()
  {
    $id = $this->uri->segment(3);
    if (!$id) {
      $err = [
        'message' => 'Kesalahan Mohon Ulangi'
      ];
      echo json_encode($err);
    } else {

      $data = [
        'id_soal' => $this->input->post('id_soal'),
        'id_user' => $this->session->userdata('user_id'),
        'id_kelas' => $this->input->post('id_kelas'),
        'id_mata_pelajaran' => $this->input->post('id_mata_pelajaran'),
        'jawaban' => $this->input->post('jawaban')
      ];
      $this->latihan->save($data);
      echo json_encode($data);
    }
  }

  public function verifikasi()
  {
    $id_user = $this->session->userdata('user_id');
    $result = $this->latihan->verifikasi($id_user);
    echo json_encode($result);
  }

  public function hasil()
  {
    $id_mapel = $this->uri->segment(3);
    if (!$id_mapel) {
      redirect('latihan');
    } else {
      $id_mapel = $id_mapel;
      $id_user = $this->session->userdata('user_id');
      $kelas = $this->data_diri->get_where($id_user);
      $id_kelas = $kelas['id_kelas'];
      $soal = $this->latihan->get_by_kelas($id_kelas, $id_mapel);
      if (!$soal) {
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Tidak ada hasil  mata pelajaran yang dipilih untuk anda
        </div>');
        redirect('latihan');
      } else {
        $cek = $this->latihan->cek_jawaban_kosong($id_user);
        if ($cek) {
          $id_user = $this->session->userdata('user_id');
          $kelas = $this->data_diri->get_where($id_user);
          $id_kelas = $kelas['id_kelas'];
          $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
          $name           = $user['nama'];
          $img            = $user['img'];
          $date_created   = $user['date_created'];
          $data = [
            'head'          => 'Hasil',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
          ];
          $data['soal'] = $this->latihan->get_by_kelas($id_kelas, $id_mapel);
          $data['jawaban'] = $this->latihan->get_jawaban($id_mapel);
          $data['benar'] = $this->latihan->jawaban_benar($id_mapel);
          $data['salah'] = $this->latihan->jawaban_salah($id_mapel);
          $this->load->view('templates/head', $data);
          $this->load->view('templates/nav', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('latihan-siswa/hasil', $data);
          $this->load->view('templates/footer');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Kamu belum mengerjakan latihan ini
          </div>');
          redirect('latihan');
        }
      }
    }
  }

  public function detail()
  {
    $id_mapel = $this->uri->segment(3);
    if (!$id_mapel) {
      redirect('latihan');
    } else {

      $soal = $this->soal->get_where($id_mapel);
      $kelas = $this->kelas->get_where($soal['id_kelas']);
      $mapel = $this->mapel->get_where($soal['id_kelas']);


      $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $name           = $user['nama'];
      $img            = $user['img'];
      $date_created   = $user['date_created'];
      $data = [
        'head'          => 'Soal dan pembahasan id soal ' . $id_mapel . ' mata pelajaran ' . $mapel['nama_mapel'],
        'name'          => $name,
        'img'           => $img,
        'date_created'  => $date_created
      ];

      $data['pembahasan'] = $this->pembahasan->get_where($id_mapel);
      $data['soal'] = $this->soal->get_where($id_mapel);
      $this->load->view('templates/head', $data);
      $this->load->view('templates/nav', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('latihan-siswa/lihat', $data);
      $this->load->view('templates/footer');
    }
  }

  public function generate()
  {
    $id_mapel = $this->uri->segment(3);
    if (!$id_mapel) {
      redirect('latihan');
    } else {

      $this->load->library('pdfgenerator');
      $id_user = $this->session->userdata('user_id');
      $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $mapel = $this->mapel->get_where($id_mapel);
      $user_d = $this->data_diri->get_where($id_user);
      $kelas = $this->kelas->get_where($user_d['id_kelas']);
      $pengaturan = $this->db->get_where('pengaturan', ['id' => 1])->row_array();

      $data['user'] = [
        'nama' => $user['nama'],
        'mapel' => $mapel['nama_mapel'],
        'kelas' => $kelas['nama_kelas'],
        'nama_sekolah' => $pengaturan['nama_sekolah'],
        'alamat' => $pengaturan['alamat'],
        'nama_sistem' => $pengaturan['nama_sistem']
      ];

      $data['benar'] = $this->latihan->jawaban_benar($id_mapel);
      $data['salah'] = $this->latihan->jawaban_salah($id_mapel);


      $html = $this->load->view('pdf/hasil', $data, true);
      $this->pdfgenerator->generate($html, 'contoh');
    }
  }
}
