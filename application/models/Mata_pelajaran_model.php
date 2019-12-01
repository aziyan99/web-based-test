<?php
defined('BASEPATH') or exit('No dorect script access allowed');


class Mata_pelajaran_model extends CI_Model{

  private $_table = 'mata_pelajaran';

  public function get()
  {
    return $this->db->get($this->_table)->result_array();
  }

  public function get_where($id)
  {
    return $this->db->get_where($this->_table,['id' => $id])->row_array();
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
    return $this->db->delete($this->_table, ['id' => $id]);
  }


}
