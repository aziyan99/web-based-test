<?php
defined('BASEPATH') or exit('No dorect script access allowed');


class Mata_pelajaran_model extends CI_Model{

  private $_table = 'mata_pelajaran';

  public function get()
  {
    return $this->db->get($this->_table)->result_array();
  }

}
