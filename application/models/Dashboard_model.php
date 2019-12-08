<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public function get_mapel()
    {
        return $this->db->get('mata_pelajaran')->result_array();
    }

    public function get_pengumuman()
    {
        $query = " SELECT `pg`.`id`, `pg`.`pengumuman`, `kls`.`nama_kelas` FROM pengumuman pg, kelas kls WHERE `pg`.`tujuan` = `kls`.`id` ";
        return $this->db->query($query)->result_array();
    }

    public function hapus_pengumuman($id)
    {
        return $this->db->delete('pengumuman', ['id' => $id]);
    }

    public function get_pengumuman_siswa()
    {
        $id_user = $this->session->userdata('user_id');
        $kelas = $this->db->get_where('profile_siswa', ['id_user' => $id_user])->row_array();
        $id_kelas = $kelas['id_kelas'];
        return $this->db->get_where('pengumuman', ['tujuan' => $id_kelas])->result_array();
    }
}
