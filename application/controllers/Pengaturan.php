<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pengaturan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name = $user['nama'];
        $img  = $user['img'];
        $date_created = $user['date_created'];
        $data = [
            'head'          => 'Pengaturan',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        $data['pengaturan'] = $this->db->get_where('pengaturan', ['id' => 1])->row_array();

        $this->load->view('templates/head');
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pengaturan/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name = $user['nama'];
        $img  = $user['img'];
        $date_created = $user['date_created'];
        $data = [
            'head'          => 'Pengaturan',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        $data['pengaturan'] = $this->db->get_where('pengaturan', ['id' => 1])->row_array();

        $this->form_validation->set_rules('nama_sistem', 'Nama Sistem', 'trim|required', [
            'required' => 'Nama Sistem tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head');
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('pengaturan/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_sistem = htmlspecialchars($this->input->post('nama_sistem'), TRUE);
            $this->db->update('pengaturan', ['nama_sistem' => $nama_sistem], ['id' => 1]);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Nama sistem berhasil dirubah
            </div>');

            redirect('pengaturan');
        }
    }
}
