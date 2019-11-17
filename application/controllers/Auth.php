<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['nama'] = $this->db->get('pengaturan')->row_array();
        $this->form_validation->set_rules('email', 'Email', 'trim|required', [
            'required'  =>  'Email tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required'  =>  'Kata sandi tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_head', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth_foot');
        } else {
            $this->_logged();
        }
    }

    private function _logged()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email'     => $email,
                    'role_id'   => $user['role_id'],
                    'user_id'   => $user['id']
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password anda salah
                    </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email anda tidak terdaftar
                </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Anda telah keluar
            </div>');
        redirect('auth');
    }

    public function register()
    {
        $data['nama'] = $this->db->get('pengaturan')->row_array();
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
            $this->load->view('templates/auth_head', $data);
            $this->load->view('auth/register', $data);
            $this->load->view('templates/auth_foot');
        } else {
            $data = [
                'role_id'       => 2,
                'nama'          => htmlspecialchars($this->input->post('nama'), TRUE),
                'email'         => htmlspecialchars($this->input->post('email'), TRUE),
                'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'img'           => 'default.png',
                'date_created'  => time()
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Anda telah terdaftar, silahkan untuk masuk ke portal
                </div>');
            redirect('auth');
        }
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    public function member()
    {
        $this->load->view('member/dashboard');
    }
}
