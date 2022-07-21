<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Varietas extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // cekLogin();
    $this->load->model('Varietas_model', 'varietas');
    $this->load->library('form_validation');
  }

  // Halaman varietas
  public function index()
  {
    
    $data['judul'] = "Halaman Varietas";
    $data['user'] = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();
    $data['tbl_varietas'] = $this->varietas->getAllVarietas();
    $data['kode'] = $this->varietas->KodeVarietas();

    $this->load->view('templates/Admin_header', $data);
    $this->load->view('templates/Admin_sidebar', $data);
    $this->load->view('templates/Admin_topbar');
    $this->load->view('admin/Varietas/index', $data);
    $this->load->view('templates/Admin_footer');
    $this->load->view('admin/varietas/modal_tambah_varietas', $data);
    $this->load->view('admin/varietas/modal_ubah_varietas');
  }

  // Tambah varietas
  public function tambah()
  {
    $data['tbl_varietas'] = $this->db->get('tbl_varietas')->result_array();
    $data['user'] = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();

    // cek jika ada gambar yang akan diupload
    $upload_image = $_FILES['gambar']['name'];
    if ($upload_image) {
      $config['allowed_types'] = 'jpg|png';
      $config['max_size']      = '4096';
      $config['upload_path'] = './assets/images/varietas/';

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('gambar')) {
        $new_image = $this->upload->data('file_name');
        $this->db->set('gambar', $new_image);
      }
      $this->varietas->tambahVarietas();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Varietas Berhasil ditambahkan!</div>'); //buat pesan akun berhasil dibuat
      redirect('varietas');
    }
  }

  // Ubah varietas
  public function ubahvarietas()
  {
    $data['user'] = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();

   
      
      $this->varietas->ubahVarietas();
      $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Data Varietas Berhasil diubah!</div>'); //buat pesan akun berhasil dibuat
      redirect('varietas');
    
  }

  // Hapus varietas
  public function hapus($id)
  {
    $this->varietas->hapusVarietas($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Varietas Berhasil dihapus!</div>'); //buat pesan akun berhasil dibuat
    redirect('varietas');
  }
}