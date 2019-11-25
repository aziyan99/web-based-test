<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{
    public function save($data)
    {
        $this->db->insert('role', $data);
    }

    public function get_where($id)
    {
        return $this->db->get_where('role', ['id' => $id])->row_array();
    }

    public function delete($id)
    {
        return $this->db->delete('role', ['id' => $id]);
    }

    public function update($id, $data)
    {
        return $this->db->update('role', $data, ['id' => $id]);
    }
}
