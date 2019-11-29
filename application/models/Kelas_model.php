<?php
defined('BASEPATH')or exit('No direct script access allowed');

class Kelas_Model extends CI_Model{

  private $_table = 'kelas';

  public function get()
  {
    return $this->db->get($this->_table)->result_array();
  }

}
