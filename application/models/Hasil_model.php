<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_model extends CI_Model
{
    public function get_by_kelas_mapel($id_kelas, $id_mapel)
    {
        $query = "SELECT * FROM `jawaban` WHERE `id_kelas` = $id_kelas AND `id_mata_pelajaran` = $id_mapel";
        return $this->db->query($query)->result_array();
    }

    public function get_user_by_kelas($id_kelas, $id_mapel)
    {
        $query = "SELECT `usr`.`nama`, `usr`.`id`, `prfl`.`id_kelas`, `sl`.`id_mata_pelajaran` FROM users usr JOIN profile_siswa prfl ON `usr`.`id` = `prfl`.`id_user` JOIN soal sl ON `prfl`.`id_kelas` = `sl`.`id_kelas` WHERE `sl`.`id_kelas` = {$this->db->escape($id_kelas)} AND `sl`.`id_mata_pelajaran` = {$this->db->escape($id_mapel)} GROUP BY `usr`.`id`";
        return $this->db->query($query)->result_array();
    }

    public function jawaban_benar($id_user, $id_mapel)
    {
        $query = "SELECT `jwb`.`jawaban`, `sl`.`jawaban_yang_benar` FROM jawaban jwb JOIN soal sl WHERE `jwb`.`id_user`={$this->db->escape($id_user)} AND `sl`.`id` = `jwb`.`id_soal` AND `sl`.`jawaban_yang_benar`=`jwb`.`jawaban` AND `jwb`.`id_mata_pelajaran`={$this->db->escape($id_mapel)}";
        return $this->db->query($query)->result_array();
    }

    public function jawaban_salah($id_user, $id_mapel)
    {
        $query = "SELECT `jwb`.`jawaban`, `sl`.`jawaban_yang_benar` FROM jawaban jwb JOIN soal sl WHERE `jwb`.`id_user`={$this->db->escape($id_user)} AND `sl`.`id` = `jwb`.`id_soal` AND `sl`.`jawaban_yang_benar`!=`jwb`.`jawaban` AND `jwb`.`id_mata_pelajaran`={$this->db->escape($id_mapel)}";
        return $this->db->query($query)->result_array();
    }

    public function get_jawaban($id_user, $id_mapel, $id_kelas)
    {
        $query = " SELECT * FROM jawaban WHERE `id_user` = {$this->db->escape($id_user)} AND `id_mata_pelajaran` = {$this->db->escape($id_mapel)} AND `id_kelas` = {$this->db->escape($id_kelas)} ";
        return $this->db->query($query)->result_array();
    }
}
