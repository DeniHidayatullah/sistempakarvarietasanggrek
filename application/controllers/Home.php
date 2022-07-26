<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Halaman Utama
class Home extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('M_home');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['judul'] = "ESKomputer";
    $this->load->view('templates/Home_Header', $data);
    $this->load->view('home/index');
    $this->load->view('templates/Home_Footer');
  }

  // // Home Member
  // public function user()
  // {
  //   $this->load->view('templates/Home_Header');
  //   $this->load->view('home/user');
  //   $this->load->view('templates/Home_Footer');
  // }

  public function identify()
  {
    $this->load->view('home/konsultasi');
  }

  public function save()
  {
    if ($this->M_home->save_data()) {
      $this->session->set_flashdata('success', 'Berhasil Menambah Data Faktor Penyakit');
      redirect(site_url('Home'));
    }
  }
}
