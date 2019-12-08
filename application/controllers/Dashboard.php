<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Dashboard_model', 'dashboard');
    }

    public function index()
    {
        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
            'head'          => 'Dashboard',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        $data['pengguna'] = $this->db->count_all('users');
        $data['soal'] = $this->db->count_all('soal');
        $data['kelas'] = $this->db->count_all('kelas');
        $data['mapel'] = $this->db->count_all('mata_pelajaran');
        $data['jawaban'] = $this->db->count_all('jawaban');
        $data['nama_mapel'] = $this->dashboard->get_mapel();
        $data['kls'] = $this->db->get('kelas')->result_array();
        $data['pengumuman'] = $this->dashboard->get_pengumuman();
        $data['pengumuman_siswa'] = $this->dashboard->get_pengumuman_siswa();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('member/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function simpan_pengumuman()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('pengumuman', 'Pengumuman', 'trim|required', [
            'required' => 'Data pengumuman tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required', [
            'required' => 'Tujuan pengumuman tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Terjadi kesalahan mohon ulangi
            </div>
            ');
            redirect('dashboard');
        } else {
            $data = [
                'pengumuman' => htmlspecialchars($this->input->post('pengumuman'), true),
                'tujuan' => htmlspecialchars($this->input->post('tujuan'), true)
            ];

            $this->db->insert('pengumuman', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Pengumuman berhasil ditambah
            </div>
            ');
            redirect('dashboard');
        }
    }

    public function hapus_pengumuman()
    {
        $id = $this->uri->segment(3);
        if (!$id) {
            redirect('dashboard');
        } else {
            $this->dashboard->hapus_pengumuman($id);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Pengumuman berhasil dihapus
            </div>
            ');
            redirect('dashboard');
        }
    }
}
