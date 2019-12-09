<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal_model extends CI_Model
{

    private $_table = 'soal';

    public function get()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function get_where($id)
    {
        return $this->db->get_where($this->_table, ['id' => $id])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->update($this->_table, $data, ['id' => $id]);
    }


    public function delete($id)
    {
        $this->db->delete('pembahasan', ['id_soal' => $id]);
        $this->db->delete($this->_table, ['id' => $id]);
        return true;
    }

    public function get_with_mapel($id)
    {
        //$this->db->get_where($this->_table, ['id_mata_pelajaran' => $id])->result_array();
        $query = "SELECT * FROM `soal` WHERE `id_mata_pelajaran` = $id";
        return $this->db->query($query)->result_array();
    }

    public function mapel_kelas($id_mapel, $id_kelas)
    {
        $query = "SELECT * FROM `soal` WHERE `id_mata_pelajaran` = $id_mapel AND `id_kelas` = $id_kelas ";
        return $this->db->query($query)->result_array();
    }
}
