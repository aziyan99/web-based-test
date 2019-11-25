<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembahasan_model extends CI_Model
{

    private $_table = 'pembahasan';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($pembahasan)
    {
        return $this->db->insert($this->_table, $pembahasan);
    }

    public function get_where($id)
    {
        return $this->db->get_where($this->_table, ['id_soal' => $id])->row_array();
    }

    public function update($id, $data)
    {
        return $this->db->update($this->_table, $data, ['id' => $id]);
    }
}
