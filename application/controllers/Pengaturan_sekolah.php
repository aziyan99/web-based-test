<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan_sekolah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('kelas_model', 'kelas');
        $this->load->model('mata_pelajaran_model', 'mapel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
        'head'          => 'Pengaturan Sekolah',
        'name'          => $name,
        'img'           => $img,
        'date_created'  => $date_created
    ];

        $this->load->view('templates/head', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pengaturan/pengaturan_sekolah', $data);
        $this->load->view('templates/footer');
    }

    public function kelas($type='index')
    {
        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
        'head'          => 'Pengaturan Kelas',
        'name'          => $name,
        'img'           => $img,
        'date_created'  => $date_created
    ];

        if ($type === 'index') {
            $data['kelas'] = $this->kelas->get();
            $this->load->view('templates/head', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pengaturan/kelas', $data);
            $this->load->view('templates/footer');
        } elseif ($type == $this->uri->segment(3)) {
            $id = $this->uri->segment(4);
            $data['kelas'] = $this->kelas->get();
            $data['kelas_where'] = $this->kelas->get_where($id);
            $this->load->view('templates/head', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pengaturan/kelas_ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
        'id' => time(),
        'nama_kelas' => $this->input->post('nama_kelas')
      ];

            $this->kelas->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Kelas berhasil ditambah
      </div>');
            redirect('pengaturan_sekolah/kelas');
        }
    }

    public function simpan_kelas()
    {
        $id = $this->input->post('id');
        if ($id == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Gagal menyimpan data!
      </div>');
            redirect('pengaturan_sekolah/kelas');
        }

        $data = [
      'nama_kelas' => htmlspecialchars($this->input->post('nama_kelas'), true)
    ];

        $this->kelas->update($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    Kelas berhasil dirubah
    </div>');
        redirect('pengaturan_sekolah/kelas');
    }

    public function hapus_kelas()
    {
        $id = $this->uri->segment(3);
        if ($id == null) {
            redirect('pengaturan_sekolah/kelas');
        }

        $this->kelas->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Kelas berhasil dihapus
      </div>');
        redirect('pengaturan_sekolah/kelas');
    }

    public function mata_pelajaran()
    {
        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
        'head'          => 'Pengaturan mata pelajaran',
        'name'          => $name,
        'img'           => $img,
        'date_created'  => $date_created
    ];

        $data['mapel'] = $this->mapel->get();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pengaturan/mata_pelajaran', $data);
        $this->load->view('templates/footer');
    }

    public function simpan_mapel()
    {
        $nama_mapel = htmlspecialchars($this->input->post('nama_mapel'), true);
        if ($nama_mapel == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Mata pelajaran gagal ditambahkan, harap periksa kembali!
      </div>');
            redirect('pengaturan_sekolah/mata_pelajaran');
        } else {
            $data = [
        'id' => time(),
        'nama_mapel' => $nama_mapel
      ];
            $this->mapel->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Mata pelajaran berhasil ditambahkan
      </div>');
            redirect('pengaturan_sekolah/mata_pelajaran');
        }
    }

    public function ubah_mata_pelajaran()
    {
        $id = $this->uri->segment(3);
        if ($id == null) {
            redirect('pengaturan_sekolah/mata_pelajaran');
        } else {
            $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $name           = $user['nama'];
            $img            = $user['img'];
            $date_created   = $user['date_created'];
            $data = [
          'head'          => 'Pengaturan mata pelajaran',
          'name'          => $name,
          'img'           => $img,
          'date_created'  => $date_created
      ];

            $data['mapel'] = $this->mapel->get();
            $data['mapel_where'] = $this->mapel->get_where($id);
            $this->load->view('templates/head', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pengaturan/mata_pelajaran_ubah', $data);
            $this->load->view('templates/footer');
        }
    }

    public function ubah_mapel()
    {
        $id = htmlspecialchars($this->input->post('id'), true);
        $mapel = htmlspecialchars($this->input->post('nama_mapel'), true);
        if (!$id && !$mapel) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Gagal mengubah mata pelajaran, harap periksa kembali
      </div>');
            redirect('pengaturan_sekolah/mata_pelajaran');
        } else {
            $data = [
        'nama_mapel' => $mapel
      ];
            $this->mapel->update($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Mata pelajaran berhasil dirubah
      </div>');
            redirect('pengaturan_sekolah/mata_pelajaran');
        }
    }

    public function hapus_mata_pelajaran()
    {
        $id = $this->uri->segment(3);
        if (!$id) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Terjadi kesalahan saat mencoba menghapus data, harap ulangi!
      </div>');
            redirect('pengaturan_sekolah/mata_pelajaran');
        } else {
            $this->mapel->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Mata pelajaran berhasil dihapus
      </div>');
            redirect('pengaturan_sekolah/mata_pelajaran');
        }
    }

    public function administrasi_sekolah()
    {
        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
        'head'          => 'Pengaturan administrasi sekolah',
        'name'          => $name,
        'img'           => $img,
        'date_created'  => $date_created
    ];

        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'trim|required', [
          'required' => 'Nama sekolah tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', [
          'required' => 'Alamat sekolah tidak boleh kosong'
        ]);

        if($this->form_validation->run() == false){
          $data['sekolah'] = $this->db->get_where('pengaturan', ['id' => 1])->row_array();
          $this->load->view('templates/head', $data);
          $this->load->view('templates/nav', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('pengaturan/administrasi_sekolah', $data);
          $this->load->view('templates/footer');
        }else{
          $data = [
            'nama_sekolah' => htmlspecialchars($this->input->post('nama_sekolah'), true),
            'alamat' => htmlspecialchars($this->input->post('alamat'), true)
          ];

          $this->db->update('pengaturan', $data, ['id' => 1]);
          $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          Administrasi Sekolah berhasil diubah
          </div>');

          redirect('pengaturan_sekolah/administrasi_sekolah');
        }


    }
}
