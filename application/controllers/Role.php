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


    public function delete()
    {
        $this->role->delete();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Hak akses berhasil dihapus
        </div>');
        redirect('role');
    }
}
