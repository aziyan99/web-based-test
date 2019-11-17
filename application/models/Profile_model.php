<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{

    public function update($data, $id)
    {
        $this->db->update('users', $data, ['id' => $id]);
    }

    public function updatePassword($data, $password)
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $id = $user['id'];
        if (password_verify($password, $user['password'])) {
            $this->db->update('users', $data, ['id' => $id]);
            redirect('auth/logout');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Kata sandi anda salah!
            </div>');
            redirect('profile/password');
        }
    }

    public function updateImage($file_name)
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $id = $user['id'];
        $this->db->update('users', ['img' => $file_name], ['id' => $id]);
    }
}
