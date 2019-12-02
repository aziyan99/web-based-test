<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_diri_model extends CI_Model{

  private $_table = 'profile_siswa';

  public function insert($data)
  {
    return $this->db->insert($this->_table, $data);
  }

  public function get()
  {
    return $this->db->get($this->_table)->result_array();
  }

  public function get_where($id)
  {
    return $this->db->get_where($this->_table, ['id_user'])->row_array();
  }

  public function update($id, $data)
  {
    return $this->db->update($this->_table, $data, ['id' => $id]);
  }


}
