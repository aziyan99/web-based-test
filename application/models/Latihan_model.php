<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Latihan_model extends CI_Model
{

    private $_table = 'jawaban';

    public function get_by_kelas($id_kelas, $id_mapel)
    {
        $query = " SELECT * FROM soal WHERE `id_kelas` = $id_kelas AND `id_mata_pelajaran` = $id_mapel ";
        return $this->db->query($query)->result_array();
    }

    public function save($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function verifikasi($id_user)
    {
        return $this->db->count_all($this->_table, ['id_user' => $id_user]);
    }

    public function get_jawaban($id_mata_pelajaran)
    {
        $id_user = $this->session->userdata('user_id');
        $query = "SELECT * FROM jawaban WHERE `id_user` = $id_user AND `id_mata_pelajaran`=$id_mata_pelajaran ";
        return $this->db->query($query)->result_array();
    }

    public function jawaban_benar($id_mapel)
    {
        $id_user = $this->session->userdata('user_id');
        $query = "SELECT `jwb`.`jawaban`, `sl`.`jawaban_yang_benar` FROM jawaban jwb JOIN soal sl WHERE `jwb`.`id_user`=$id_user AND `sl`.`id` = `jwb`.`id_soal` AND `sl`.`jawaban_yang_benar`=`jwb`.`jawaban` AND `jwb`.`id_mata_pelajaran`=$id_mapel";
        return $this->db->query($query)->result_array();
    }

    public function jawaban_salah($id_mapel)
    {
        $id_user = $this->session->userdata('user_id');
        $query = "SELECT `jwb`.`jawaban`, `sl`.`jawaban_yang_benar` FROM jawaban jwb JOIN soal sl WHERE `jwb`.`id_user`=$id_user AND `sl`.`id` = `jwb`.`id_soal` AND `sl`.`jawaban_yang_benar`!=`jwb`.`jawaban` AND `jwb`.`id_mata_pelajaran`=$id_mapel";
        return $this->db->query($query)->result_array();
    }

    public function cek_jawaban_kosong($id_user)
    {
        return $this->db->get_where('jawaban', ['id_user' => $id_user])->result_array();
    }
}
