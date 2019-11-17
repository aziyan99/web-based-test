<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{
    public function save($data)
    {
        $this->db->insert('role', $data);
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->db->delete('role', ['id' => $id]);
    }
}
