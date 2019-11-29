<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Soal_model', 'soal');
        $this->load->model('Pembahasan_model', 'pembahasan');
        $this->load->model('Kelas_model', 'kelas');
        $this->load->model('Mata_pelajaran_model', 'mata_pelajaran');
        $this->load->library('form_validation');
        $this->load->helper('text');
    }

    public function index()
    {
        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
            'head'          => 'Soal',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        $data['soal'] = $this->soal->get();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('soal/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
            'head'          => 'Tambah Soal',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        $data['mata_pelajaran'] = $this->mata_pelajaran->get();
        $data['kelas'] = $this->kelas->get();

        $this->form_validation->set_rules('soal', 'Soal', 'trim|required', [
            'required' => 'Soal tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('jawaban_a', 'Jawaban a', 'trim|required', [
            'required' => 'Jawaban a tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('jawaban_b', 'Jawaban b', 'trim|required', [
            'required' => 'Jawaban b tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('jawaban_c', 'Jawaban c', 'trim|required', [
            'required' => 'Jawaban c tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('jawaban_d', 'Jawaban d', 'trim|required', [
            'required' => 'Jawaban a tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('jawaban_e', 'Jawaban e', 'trim|required', [
            'required' => 'Jawaban e tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('jawaban_yang_benar', 'Jawaban yang benar', 'trim|required', [
            'required' => 'Jawaban yang benar tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('soal/add');
            $this->load->view('templates/footer');
        } else {
            $id = time();
            $data = [
                'id' => $id,
                'soal' => htmlspecialchars($this->input->post('soal'), true),
                'jawaban_a' => htmlspecialchars($this->input->post('jawaban_a'), true),
                'jawaban_b' => htmlspecialchars($this->input->post('jawaban_b'), true),
                'jawaban_c' => htmlspecialchars($this->input->post('jawaban_c'), true),
                'jawaban_d' => htmlspecialchars($this->input->post('jawaban_d'), true),
                'jawaban_e' => htmlspecialchars($this->input->post('jawaban_e'), true),
                'jawaban_yang_benar' => htmlspecialchars($this->input->post('jawaban_yang_benar'), true),
                'id_kelas' => $this->input->post('kelas'),
                'id_mata_pelajaran' => $this->input->post('mata_pelajaran')
            ];
            $pembahasan = [
                'id_soal' => $id
            ];
            $this->soal->insert($data);
            $this->pembahasan->insert($pembahasan);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Soal baru berhasil ditambahkan
            </div>');
            redirect('soal');
        }
    }


    public function detail()
    {
        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
            'head'          => 'Detail Soal',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];
        $id = $this->uri->segment(3);
        if (!$id) {
            redirect('soal');
        }
        $data['soal'] = $this->soal->get_where($id);
        $this->load->view('templates/head', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('soal/detail', $data);
        $this->load->view('templates/footer');
    }


    public function ubah()
    {
        $id = $this->uri->segment(3);
        if ($id == null) {
            redirect('soal');
        }

        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
            'head'          => 'Ubah Soal',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        $data['kelas'] = $this->kelas->get();
        $data['mata_pelajaran'] = $this->mata_pelajaran->get();
        $data['soal'] = $this->soal->get_where($id);
        $this->load->view('templates/head', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('soal/edit', $data);
        $this->load->view('templates/footer');
    }


    public function simpanUbah()
    {

        $this->form_validation->set_rules('soal', 'Soal', 'trim|required');

        $this->form_validation->set_rules('jawaban_a', 'Jawaban a', 'trim|required');

        $this->form_validation->set_rules('jawaban_b', 'Jawaban b', 'trim|required');

        $this->form_validation->set_rules('jawaban_c', 'Jawaban c', 'trim|required');

        $this->form_validation->set_rules('jawaban_d', 'Jawaban d', 'trim|required');

        $this->form_validation->set_rules('jawaban_e', 'Jawaban e', 'trim|required');

        $this->form_validation->set_rules('jawaban_yang_benar', 'Jawaban yang benar', 'trim|required');


        $id = $this->input->post('id');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Gagal menyimpan, harap periksa kembali
            </div>');
            redirect('soal/ubah/' . $id);
        } else {
            $data = [
                'soal' => htmlspecialchars($this->input->post('soal'), true),
                'jawaban_a' => htmlspecialchars($this->input->post('jawaban_a'), true),
                'jawaban_b' => htmlspecialchars($this->input->post('jawaban_b'), true),
                'jawaban_c' => htmlspecialchars($this->input->post('jawaban_c'), true),
                'jawaban_d' => htmlspecialchars($this->input->post('jawaban_d'), true),
                'jawaban_e' => htmlspecialchars($this->input->post('jawaban_e'), true),
                'jawaban_yang_benar' => htmlspecialchars($this->input->post('jawaban_yang_benar'), true),
                'id_kelas' => $this->input->post('kelas'),
                'id_mata_pelajaran' => $this->input->post('mata_pelajaran')
            ];
            $this->soal->update($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Soal berhasil diubah
                </div>');
            redirect('soal');
        }
    }


    public function hapus()
    {
        $id = $this->uri->segment(3);
        $this->soal->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Soal berhasil dihapus
            </div>');
        redirect('soal');
    }

    public function ubahPembahasan($i)
    {
        $id = $i;
        if ($id == null) {
            redirect('soal');
        }

        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
            'head'          => 'Ubah Pembahasan',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        $data['pembahasan'] = $this->pembahasan->get_where($id);
        // var_dump($data);
        // die;
        $this->load->view('templates/head', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('soal/pembahasan', $data);
        $this->load->view('templates/footer');
    }

    public function simpanPembahasan()
    {
        $this->form_validation->set_rules('pembahasan', 'Pembahasan', 'trim|required');

        $id = $this->input->post('id');
        $id_soal = $this->input->post('id_soal');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Gagal menyimpan, harap periksa kembali
            </div>');
            redirect('pembahasan/soal/' . $id_soal);
        } else {
            $data = [
                'pembahasan' => htmlspecialchars($this->input->post('pembahasan'), true),
            ];
            $this->pembahasan->update($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Pembahasan untuk soal ' . $id_soal . ' berhasil diubah
                </div>');
            redirect('soal');
        }
    }
}
