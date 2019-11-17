<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'user');
    }

    public function template()
    {
        $this->load->view('templates/head');
        $this->load->view('templates/nav');
        $this->load->view('templates/sidebar');
        $this->load->view('user/index');
        $this->load->view('templates/footer');
    }

    public function index()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name = $user['nama'];
        $img  = $user['img'];
        $date_created = $user['date_created'];
        $data = [
            'head'          => 'Users',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        $data['user'] = $this->db->get('users')->result_array();

        $this->load->view('templates/head', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name = $user['nama'];
        $img  = $user['img'];
        $date_created = $user['date_created'];
        $data = [
            'title'         => 'Safeco | dashboard',
            'head'          => 'users',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];
        $get = $this->user->detail();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/detail', $get);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('role_id', 'Role', 'trim|required', [
            'required' => 'Role tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('name', 'Nama', 'trim|required', [
            'required' => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Email salah'
        ]);
        if ($this->form_validation->run() == false) {
            $name = $user['nama'];
            $img  = $user['img'];
            $date_created = $user['date_created'];
            $data = [
                'title'         => 'Safeco | dashboard',
                'head'          => 'users',
                'name'          => $name,
                'img'           => $img,
                'date_created'  => $date_created
            ];
            $get = $this->user->detail();
            $this->load->view('templates/head', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/edit', $get);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'role_id' => htmlspecialchars($this->input->post('role_id'), TRUE),
                'nama' => htmlspecialchars($this->input->post('name'), TRUE),
                'email' => htmlspecialchars($this->input->post('email'), TRUE)
            ];
            $this->user->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data berhasil diubah
                </div>');
            redirect('users');
        }
    }


    public function add()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name = $user['nama'];
        $img  = $user['img'];
        $date_created = $user['date_created'];
        $data = [
            'title'         => 'Safeco | dashboard',
            'head'          => 'users',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama anda tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', [
            'required'     => 'Email tidak boleh kosong!',
            'valid_email'  => 'Email anda salah!',
            'is_unique'    => 'Email telah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]', [
            'required'      => 'Kata sandi tidak boleh kosong',
            'min_length'    => 'Kata sandi anda terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]', [
            'matches'      =>  'Kata sandi tidak sama!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/add');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'role_id'       => 2,
                'nama'          => htmlspecialchars($this->input->post('nama'), TRUE),
                'email'         => htmlspecialchars($this->input->post('email'), TRUE),
                'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'img'           => 'default.PNG',
                'date_created'  => time()
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data berhasil disimpan
                </div>');
            redirect('users');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->user->hapus();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil dihapus
            </div>');
        redirect('users');
    }
}
