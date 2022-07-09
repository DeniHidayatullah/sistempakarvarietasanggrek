<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cekLogin();
    $this->load->model('Info_model', 'MI');
  }

  // Halaman Pengetahuan/Aturan
  public function index()
  {
    $data['judul'] = "Halaman Info";
    $data['user'] = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();

    $data['About'] = $this->MP->getAllAbout();
    $data['pengetahuan'] = $this->MP->getAllPengetahuan();

    $this->load->view('templates/Admin_header', $data);
    $this->load->view('templates/Admin_sidebar', $data);
    $this->load->view('templates/Admin_topbar');
    $this->load->view('admin/info/index', $data);
    $this->load->view('templates/Admin_footer');
    $this->load->view('admin/info/modal_tambah_info', $data);
    $this->load->view('admin/info/modal_ubah_info', $data);
  }

  // Tambah Pengetahuan/Aturan
  public function tambah()
  {
    $data['judul'] = 'Halaman Info';
    $data['user'] = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();

    $this->MP->tambahInfo();
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Info Berhasil ditambahkan!</div>'); //buat pesan akun berhasil dibuat
    redirect('info');
  }

  // Ubah Pengetahuan/Aturan
  public function ubah()
  {
    $this->MP->ubahInfo();
    //buat pesan Pengetahuan berhasil dibuat
    $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Data Info Berhasil diubah!</div>');
    redirect('info');
  }

  // Hapus Pengetahuan/Aturan
  public function hapus($id)
  {
    $this->MP->hapus($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Pengetahuan Berhasil dihapus!</div>'); //buat pesan akun berhasil dibuat
    redirect('pengetahuan');
  }
}
