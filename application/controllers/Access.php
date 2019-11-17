<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('access_model', 'access');
    }

    public function index()
    {
        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
            'head'          => 'Hak akses Menu',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];
        $data['access'] = $this->access->get();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('access/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $name           = $user['nama'];
        $img            = $user['img'];
        $date_created   = $user['date_created'];
        $data = [
            'head'          => 'Hak akses Menu',
            'name'          => $name,
            'img'           => $img,
            'date_created'  => $date_created
        ];
        $data['menu'] = $this->db->get('menu')->result_array();
        $data['role'] = $this->db->get('role')->result_array();

        $this->form_validation->set_rules('role_id', 'Role id', 'trim|required|numeric', [
            'required' => 'ID Role atau ID Hak Akses tidak boleh kosong',
            'numeric' => 'ID Role atau ID Hak Akses harus berupa angka'
        ]);

        $this->form_validation->set_rules('menu_id', 'Role id', 'trim|required|numeric', [
            'required' => 'ID Menu tidak boleh kosong',
            'numeric' => 'ID Menu harus berupa angka'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/head', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('access/add', $data);
            $this->load->view('templates/footer');
        } else {
            $role_id = htmlspecialchars($this->input->post('role_id'), TRUE);
            $menu_id = htmlspecialchars($this->input->post('menu_id'), TRUE);

            $data = [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ];

            $this->access->save($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Hak akses Menu berhasil ditambah
            </div>');
            redirect('access');
        }
    }


    public function delete()
    {
        $this->access->delete();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil dihapus
        </div>');
        redirect('access');
    }
}
