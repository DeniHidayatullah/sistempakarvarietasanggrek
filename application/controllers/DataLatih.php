<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataLatih extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // cekLogin();
    $this->load->model('Datalatih_model', 'DL');
		$this->load->library(array('Excel'));
    $this->load->library('form_validation');
  }

  // Halaman DataLatih
  public function index()
  {
    $data['judul'] = 'Halaman Data Latih';
    $data['tabel'] = 'Data Data Latih';

    $data['user'] = $this->db->get_where('tbl_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();
    $data['datalatih'] = $this->DL->getAll();

    $this->load->view('templates/Admin_header', $data);
    $this->load->view('templates/Admin_sidebar', $data);
    $this->load->view('templates/Admin_topbar');
    $this->load->view('admin/datalatih/index', $data);
    $this->load->view('templates/Admin_footer');
    // $this->load->view('admin/datalatih/modal_ubah');
    $this->load->view('admin/datalatih/modal_tambah', $data);
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

  public function import_excel(){
		if (isset($_FILES["fileExcel"]["name"])) {
      
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();	
				for($row=2; $row<=$highestRow; $row++)
				{
					$nama_anggrek = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$genus = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$akar = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$batang = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$bentuk_daun = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$jumlah_mahkota = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$bentuk_mahkota = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$lidah = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$motif = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$taksonomi_asli = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$temp_data[] = array(
						'nama_anggrek'	=> $nama_anggrek,
						'genus'	=> $genus,
						'akar'	=> $akar,
						'batang'	=> $batang,
						'bentuk_daun'	=> $bentuk_daun,
						'jumlah_mahkota'	=> $jumlah_mahkota,
						'bentuk_mahkota'	=> $bentuk_mahkota,
						'lidah'	=> $lidah,
						'motif'	=> $motif,
						'taksonomi_asli'	=> $taksonomi_asli
					); 	
				}
			}
			$insert = $this->DL->insertexcel($temp_data);
			if($insert){
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect('DataLatih');
			}else{
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect('DataLatih');
			}
		}else{
			echo "Tidak ada file yang masuk";
		}
	}


} 