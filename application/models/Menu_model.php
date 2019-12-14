<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Menu_model extends CI_Model
{
    private $_table = 'menu';

    public function save($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->update($this->_table, $data, ['id' => $id]);
    }
}
