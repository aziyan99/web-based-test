<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Latihan extends CI_Controller{


 public function __construct()
 {
   parent::__construct();
   is_logged_in();
 }

 public function index(){
   $user           = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
   $name           = $user['nama'];
   $img            = $user['img'];
   $date_created   = $user['date_created'];
   $data = [
       'head'          => 'Latihan',
       'name'          => $name,
       'img'           => $img,
       'date_created'  => $date_created
   ];

   //$data['soal'] = $this->soal->get();
   $this->load->view('templates/head', $data);
   $this->load->view('templates/nav', $data);
   $this->load->view('templates/sidebar', $data);
   $this->load->view('latihan-siswa/index', $data);
   $this->load->view('templates/footer');
 }

}
