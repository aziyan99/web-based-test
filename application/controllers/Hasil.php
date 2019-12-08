<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Mata_pelajaran_model', 'mapel');
        $this->load->model('Kelas_model', 'kelas');
        $this->load->model('Hasil_model', 'hasil');
    }

    public function index()
    {
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

        $data['mapel'] = $this->mapel->get();
        $data['kelas'] = $this->kelas->get();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('hasil/index', $data);
        $this->load->view('templates/footer');
    }

    public function lihat()
    {
        $id_mapel = $this->input->get('id_mapel');
        $id_kelas = $this->input->get('id_kelas');
        if ($id_mapel == "" || $id_kelas == "") {
            redirect('hasil');
        } else {
            $mapel = $this->mapel->get_where($id_mapel);
            $kelas = $this->kelas->get_where($id_kelas);
            $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $name           = $user['nama'];
            $img            = $user['img'];
            $date_created   = $user['date_created'];
            $data = [
                'head'          => 'Semua Siswa Mata pelajaran ' . $mapel['nama_mapel'] . ' kelas ' . $kelas['nama_kelas'],
                'name'          => $name,
                'img'           => $img,
                'date_created'  => $date_created
            ];

            $data['user'] = $this->hasil->get_user_by_kelas($id_kelas, $id_mapel);
            if (!$data['user']) {
                $this->session->set_flashdata('message', '
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Tidak hasil dengan kategori yang dipilih
                </div>
                ');
                redirect('hasil');
            } else {
                $this->load->view('templates/head', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('hasil/siswa', $data);
                $this->load->view('templates/footer');
            }
        }
    }

    public function detail()
    {
        $id_user = htmlspecialchars($this->input->get('id_user'), true);
        $id_kelas = htmlspecialchars($this->input->get('id_kelas'), true);
        $id_mapel = htmlspecialchars($this->input->get('id_mapel'), true);
        $data['jawaban'] = $this->hasil->get_jawaban($id_user, $id_mapel, $id_kelas);
        if (!$data['jawaban']) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Siswa belum mengerjakan latihan yang diberikan
            </div>
            ');
            redirect('hasil');
        } else {
            $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $name           = $user['nama'];
            $img            = $user['img'];
            $date_created   = $user['date_created'];
            $data = [
                'head'          => 'Jawaban siswa',
                'name'          => $name,
                'img'           => $img,
                'date_created'  => $date_created
            ];


            $data['siswa'] = $this->db->get_where('users', ['id' => $id_user])->row_array();
            $data['jawaban'] = $this->hasil->get_jawaban($id_user, $id_mapel, $id_kelas);
            $data['benar'] = $this->hasil->jawaban_benar($id_user, $id_mapel);
            $data['salah'] = $this->hasil->jawaban_salah($id_user, $id_mapel);
            $this->load->view('templates/head', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('hasil/detail', $data);
            $this->load->view('templates/footer');
        }
    }
}
