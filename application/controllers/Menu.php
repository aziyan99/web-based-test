<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
            'head'          => 'Menu',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        $data['menu'] = $this->db->get('menu')->result_array();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('menu/index');
        $this->load->view('templates/footer');
    }

    public function ubah()
    {
        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
            'head'          => 'Ubah Menu',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        if (!$this->uri->segment(3)) {
            redirect('menu');
        } else {

            $data['menu'] = $this->db->get_where('menu', ['id' => $this->uri->segment(3)])->row_array();
            $this->load->view('templates/head', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/edit', $data);
            $this->load->view('templates/footer');
        }
    }

    public function save()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required', [
            'required' => 'Nama Menu tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('icon', 'icon', 'trim|required', [
            'required' => 'Icon Menu tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('url', 'Url', 'trim|required', [
            'required' => 'Link Menu tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('is_active', 'Status', 'trim|required', [
            'required' => 'Status Menu tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Ada kesalahan saat menyimpan data, pastikan semua form terisi
            </div>
            ');
            redirect('menu');
        } else {
            $data = [
                'title' => htmlspecialchars($this->input->post('title'), true),
                'icon' => htmlspecialchars($this->input->post('icon'), true),
                'url' => htmlspecialchars($this->input->post('url'), true),
                'is_active' => htmlspecialchars($this->input->post('is_active'), true)
            ];

            $this->menu->save($data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               Data menu berhasil disimpan, harap mengatur hak akses menu 
            </div>
            ');
            redirect('menu');
        }
    }


    public function simpanEdit()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required', [
            'required' => 'Nama Menu tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('icon', 'icon', 'trim|required', [
            'required' => 'Icon Menu tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('url', 'Url', 'trim|required', [
            'required' => 'Link Menu tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('is_active', 'Status', 'trim|required', [
            'required' => 'Status Menu tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Ada kesalahan saat menyimpan data, pastikan semua form terisi
            </div>
            ');
            redirect('menu');
        } else {
            $data = [
                'title' => htmlspecialchars($this->input->post('title'), true),
                'icon' => htmlspecialchars($this->input->post('icon'), true),
                'url' => htmlspecialchars($this->input->post('url'), true),
                'is_active' => htmlspecialchars($this->input->post('is_active'), true)
            ];
            $id = htmlspecialchars($this->input->post('id'));
            $this->menu->update($id, $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               Data menu berhasil diubah, harap mengatur hak akses menu 
            </div>
            ');
            redirect('menu');
        }
    }



    public function delete()
    {
        $id = $this->uri->segment(3);
        if (!$id) {
            redirect('menu');
        } else {
            $this->db->delete('menu', ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Menu berhasil dihapus
                </div>');
            redirect('menu');
        }
    }
}
