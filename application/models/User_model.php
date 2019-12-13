<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function detail()
    {
        $id = $this->uri->segment(3);
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function get_admin()
    {
        return $this->db->get_where('users', ['role_id' => 1])->result_array();
    }
    public function get_tenaga_pengajar()
    {
        return $this->db->get_where('users', ['role_id' => 2])->result_array();
    }
    public function get_siswa()
    {
        return $this->db->get_where('users', ['role_id' => 5])->result_array();
    }

    public function update($data)
    {
        $id = $this->input->post('id');
        $this->db->update('users', $data, ['id' => $id]);
    }

    public function hapus()
    {
        $id = $this->uri->segment(3);
        $this->db->delete('jawaban', ['id_user' => $id]);
        $this->db->delete('profile_siswa', ['id_user' => $id]);
        $this->db->delete('users', ['id' => $id]);
    }

    public function sum()
    {
        $this->db->get('users');
    }
}
