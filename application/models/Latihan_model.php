<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Latihan_model extends CI_Model
{

    public function get_by_kelas()
    {
        $user_id = $this->session->userdata('user_id');
        $kelas = $this->db->get_where('profile_siswa', ['id_user' => $user_id])->row_array();
        $mapel = $this->db->get_where('soal', ['id_kelas' => $kelas['id_kelas']])->result_array();
        //$data = $mapel['id_mata_pelajaran'];
        foreach ($mapel as $key => $value) {
            echo $value['id_mata_pelajaran'];
        }
        die;
    }
}
