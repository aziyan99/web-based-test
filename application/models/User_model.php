<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function detail()
    {
        $id = $this->uri->segment(3);
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function update($data)
    {
        $id = $this->input->post('id');
        $this->db->update('users', $data, ['id' => $id]);
    }

    public function hapus()
    {
        $id = $this->uri->segment(3);
        $this->db->delete('users', ['id' => $id]);
    }

    public function sum()
    {
        $this->db->get('users');
    }
}
