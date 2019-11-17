<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        session();
        $this->load->model('profile_model', 'profile');
    }

    public function index()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name = $user['nama'];
        $img  = $user['img'];
        $date_created = $user['date_created'];
        $data = [
            'head'          => 'Profile',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        $data['profile'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/head');
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name = $user['nama'];
        $img  = $user['img'];
        $date_created = $user['date_created'];
        $data = [
            'head'          => 'Profile',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        $data['profile'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head');
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('profile/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama'), TRUE),
                'email' => htmlspecialchars($this->input->post('email'), TRUE),
            ];

            $id = htmlspecialchars($this->input->post('id'), TRUE);

            $this->profile->update($data, $id);

            redirect('auth/logout');
        }
    }

    public function password()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name = $user['nama'];
        $img  = $user['img'];
        $date_created = $user['date_created'];
        $data = [
            'head'          => 'Profile',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];

        $this->form_validation->set_rules('password1', 'Password1', 'trim|required|min_length[5]', [
            'required' => 'Kata sandi tidak boleh kosong',
            'min_length' => 'Kata sandi terlalu pendek'
        ]);

        $this->form_validation->set_rules('password2', 'Password2', 'trim|matches[password1]', [
            'matches' => 'Kata sandi tidak sama'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Kata sandi tidak boleh kosong'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head');
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('profile/editPassword');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
            ];

            $password = htmlspecialchars($this->input->post('password'), TRUE);

            $this->profile->updatePassword($data, $password);
        }
    }

    public function image()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name = $user['nama'];
        $img  = $user['img'];
        $date_created = $user['date_created'];
        $data = [
            'head'          => 'Profile',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];
        $this->form_validation->set_rules('img', 'Img', 'trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head');
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('profile/editImage', $data);
            $this->load->view('templates/footer');
        } else {
            $this->_uploadImage();
            //redirect('profile/image');
        }
    }

    private function _uploadImage()
    {
        $config['upload_path'] = FCPATH . 'assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('image')) {

            $errors = $this->upload->display_errors();
            $this->load->view('erros/sistem/errUpload', $errors);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $file_name = $data['upload_data']['file_name'];

            $this->profile->updateImage($file_name);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil diubah
            </div>');
            redirect('profile/image');
        }
    }
}
