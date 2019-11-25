<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('role_model', 'role');
    }

    public function index()
    {
        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
            'head'          => 'Hak akses sistem',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];
        $data['role'] = $this->db->get('role')->result_array();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('role/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
            'head'          => 'Hak akses sistem',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        $this->form_validation->set_rules('role', 'Role', 'trim|required|is_unique[role.role]', [
            'required' => 'Nama hak akses tidak boleh kosong',
            'is_unique' => 'Nama hak akses sudah ada'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('role/add', $data);
            $this->load->view('templates/footer');
        } else {
            $role = htmlspecialchars($this->input->post('role'), TRUE);
            $data = [
                'role' => $role
            ];

            $this->role->save($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Hak akses berhasil ditambah
            </div>');
            redirect('role');
        }
    }


    public function ubah()
    {
        $id = $this->uri->segment(3);
        if ($id == null) {
            redirect('role');
        }

        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
            'head'          => 'Ubah Nama Hak Akses',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        $data['role'] = $this->role->get_where($id);
        $this->load->view('templates/head', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('role/edit', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $this->form_validation->set_rules('role', 'Role', 'trim|required|is_unique[role.role]', [
            'required' => 'Nama hak akses tidak boleh kosong'
        ]);

        $id = $this->input->post('id');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Gagal menyimpan, harap periksa kembali
            </div>');
            redirect('role/ubah/' . $id);
        } else {
            $data = [
                'role' => htmlspecialchars($this->input->post('role'), true)
            ];
            $this->role->update($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Nama hak akses berhasil diubah
                </div>');
            redirect('role');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->role->delete($id);
        $this->role->deleteUser($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Hak akses berhasil dihapus
        </div>');
        redirect('role');
    }
}
