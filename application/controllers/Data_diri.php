<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_diri extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('Data_diri_model', 'data_diri');
    $this->load->model('Kelas_model', 'kelas');
  }

  public function index()
  {
    $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $name = $user['nama'];
    $img  = $user['img'];
    $date_created = $user['date_created'];
    $data = [
      'head'          => 'Data Administrasi',
      'name'          => $name,
      'img'           => $img,
      'date_created'  => $date_created
    ];

    $data['kelas'] = $this->kelas->get();
    $id = $this->session->userdata('user_id');
    $profile = $this->data_diri->get_where($id);

    if (!$profile) {
      $data_adm = [
        'id_user' => $id
      ];
      $this->data_diri->insert($data_adm);
    } else {

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
    }
    $data['pesan'] = $data['pesan'];
    $data['profile'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $data['adm'] = $profile;
    $this->load->view('templates/head');
    $this->load->view('templates/nav', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('profile/data_adm_siswa', $data);
    $this->load->view('templates/footer');
  }

  public function simpan()
  {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('nis', 'Nim', 'trim|required|numeric');
    $this->form_validation->set_rules('id_kelas', 'Id kelas', 'trim|required');

    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('message', '
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Gagal menyimpan data, harap periksa kembali
      </div>
      ');

      redirect('data_diri');
    } else {
      $id = htmlspecialchars($this->input->post('id'), true);
      $data = [
        'nis' => htmlspecialchars($this->input->post('nis'), true),
        'id_kelas' => htmlspecialchars($this->input->post('id_kelas'), true)
      ];

      $this->data_diri->update($id, $data);
      $this->session->set_flashdata('message', '
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Terima kasih telah memperbarui data anda
      </div>
      ');

      redirect('data_diri');
    }
  }
}
