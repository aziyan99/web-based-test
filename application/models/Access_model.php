<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access_model extends CI_Model
{
    public function get()
    {
        $this->db->select('title, role, role_id, menu_id, user_access_menu.id');
        $this->db->from('menu');
        $this->db->join('user_access_menu', 'user_access_menu.menu_id = menu.id');
        $this->db->join('role', 'role.id = user_access_menu.role_id');
        return $this->db->get()->result_array();
    }

    public function save($data)
    {

        $checkMenu = $this->db->get_where('menu', ['id' => $data['menu_id']])->row_array();
        $checkRole = $this->db->get_where('role', ['id' => $data['role_id']])->row_array();

        if ($checkMenu) {

            if ($checkRole) {

                $check = $this->db->get_where('user_access_menu', ['role_id' => $data['role_id'], 'menu_id' => $data['menu_id']])->row_array();

                if (!$check) {
                    return $this->db->insert('user_access_menu', $data);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Hak akses Menu sudah ada
                    </div>');
                    redirect('access/add');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Nama Hak akses tidak ada
                </div>');
                redirect('access/add');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Nama Menu tidak ada
            </div>');
            redirect('access/add');
        }
    }


    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->db->delete('user_access_menu', ['id' => $id]);
    }
}
