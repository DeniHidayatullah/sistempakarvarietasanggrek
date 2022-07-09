<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karakteristik extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // cekLogin();
    $this->load->model('Karakteristik_model', 'MG');
    $this->load->library('form_validation');
  }

  // Halaman Karakteristik
  public function index()
  {
    $data['judul'] = 'Halaman Karakteristik';
    $data['tabel'] = 'Data Karakteristik';

    $data['user'] = $this->session->userdata('username');
    // $data['karakteristik'] = $this->MG->getAllKarakteristik();
    // $data['kode'] = $this->MG->KodeKarakteristik();

    $this->load->view('templates/Admin_header', $data);
    $this->load->view('templates/Admin_sidebar', $data);
    $this->load->view('templates/Admin_topbar');
    $this->load->view('admin/karakteristik/index', $data);
    $this->load->view('templates/Admin_footer');
    $this->load->view('admin/karakteristik/modal_ubah');
    $this->load->view('admin/karakteristik/modal_tambah', $data);
  }

  // Tambah Karakteristik
  public function tambah()
  {
    $data['judul'] = 'Halaman Karakteristik';
    $this->form_validation->set_rules('nama', 'Nama', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/Admin_header', $data);
      $this->load->view('templates/Admin_sidebar', $data);
      $this->load->view('templates/Admin_topbar');
      $this->load->view('admin/karakteristik/index', $data);
      $this->load->view('templates/Admin_footer');
      $this->load->view('admin/karakteristik/modal_tambah');
      $this->load->view('admin/karakteristik/modal_ubah');
    } else {
      $this->MG->tambahKarakteristik();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Karakteristik Berhasil ditambahkan!</div>'); //buat pesan akun berhasil dibuat
      redirect('Karakteristik');
    }
  }

  // Ubah Karakteristik
  public function ubah()
  {
    $this->MG->ubahKarakteristik();
    $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Data Karakteristik Berhasil diubah!</div>'); //buat pesan akun berhasil dibuat
    redirect('karakteristik');
  }

  //Hapus Karakteristik
  public function hapus($id)
  {
    $this->MG->hapusKarakteristik($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Karakteristik Berhasil dihapus!</div>'); //buat pesan akun berhasil dibuat
    redirect('karakteristik');
  }
} 