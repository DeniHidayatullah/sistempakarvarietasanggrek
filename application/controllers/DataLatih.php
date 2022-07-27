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

//fungsi proses dalam suatu kasus data
public function pembentukan_tree(){
  $N_parent = '';
  $kasus ='';
  //mengisi kondisi
  if ($N_parent != '') {
      $kondisi = $N_parent . " AND " . $kasus;
  } else {
      $kondisi = $kasus;
  }
  echo $kondisi . "<br>";
  // var_dump($kondisi);
  // die;
  
  //cek data heterogen / homogen???
  $cek = $this->cek_heterohomogen('taksonomi_asli', $kondisi);
  if ($cek == 'homogen') {
      echo "<br>LEAF ||";
      $sql_keputusan = $this->db->query("SELECT DISTINCT(taksonomi_asli) FROM data_latih WHERE $kondisi")->result_array();
      $keputusan = $row_keputusan['0'];
      var_dump($keputusan);
      die;
      //insert atau lakukan pemangkasan cabang
      $this->pangkas($N_parent, $kasus, $keputusan);
  }//jika data masih heterogen
  else if ($cek == 'heterogen') {
      //jika kondisi tidak kosong kondisi_taksonomi_asli=tambah and
      $kondisi_taksonomi_asli = '';
      if ($kondisi != '') {
          $kondisi_taksonomi_asli = $kondisi . " AND ";
      }
      
      $jml_varietas = $this->jumlah_data("$kondisi_taksonomi_asli taksonomi_asli='Varietas'");
      $jml_spesies = $this->jumlah_data("$kondisi_taksonomi_asli taksonomi_asli='Spesies'");
      // var_dump($jml_spesies);
      // die;
      
      $jml_total = $jml_varietas + $jml_spesies;
      echo "Jumlah data = " . $jml_total . "<br>";
      echo "Jumlah Varietas = " . $jml_varietas . "<br>";
      echo "Jumlah Spesies = " . $jml_spesies . "<br>";

      //hitung entropy semua
      $entropy_all = $this->hitung_entropy($jml_varietas, $jml_spesies);
      echo "Entropy All = " . $entropy_all . "<br>";

      // $nilai_motif = array();
      // $nilai_motif = $this->cek_nilaiAtribut('motif',$kondisi);
      // $jmlMotif = count($nilai_motif);
      // var_dump($nilai_motif[0]);
      // die;

      echo "<table class='table table-bordered table-striped  table-hover' border='1'>";
      echo "<tr><th>Nilai Atribut</th> <th>Jumlah data</th> <th>Jumlah Varietas</th> <th>Jumlah Spesies</th> "
      . "<th>Entropy</th> <th>Gain</th><tr>";

      $this->db->query("TRUNCATE gain");
      //hitung gain atribut Genus
      $this->hitung_gain($kondisi, "genus", $entropy_all, "Vanda", "Cattleya", 
      "Dendrobium", "Phalaenopsis", "Spathoglotis","Paphiopedilum","Genus","");
      //hitung gain atribut Akar
      $this->hitung_gain($kondisi, "akar", $entropy_all, "Epifit", "Litofit", 
      "Terestrial","Akar","","","","");
      //hitung gain atribut Batang
      $this->hitung_gain($kondisi, "batang", $entropy_all, "Monopodial", "Simpodial", 
      "Batang", "", "","","","");
      // //hitung gain atribut Bentuk Daun
      $this->hitung_gain($kondisi, "bentuk_daun", $entropy_all, "Runcing", "Oval", 
      "Lonjong", "Berlipat-lipat", "Bentuk Daun","","","");
      // //hitung gain atribut Jumlah Mahkota
      $this->hitung_gain($kondisi, "jumlah_mahkota", $entropy_all, "5 helai", "3 helai", 
      "Jumlah Mahkota", "", "","","","");
      // //hitung gain atribut Bentuk Mahkota
      $this->hitung_gain($kondisi, "bentuk_mahkota", $entropy_all, "Memanjang ujung melengkung", "Seperti bintang", 
      "Oval ujung meruncing", "Oval lebar", "Elips lebar bertumpuk","Elips meruncing","Bentuk Mahkota","");
      // //hitung gain atribut Lidah
      $this->hitung_gain($kondisi, "lidah", $entropy_all, "Menjulur", "Ujung lancip", 
      "Berkantong", "Lidah", "","","","");
      // //hitung gain atribut Motif
      $this->hitung_gain($kondisi, "motif", $entropy_all, "Dua warna", "Bercorak", 
      "Polos", "Motif", "","","","");
      
      // $this->hitung_gain($kondisi, "Dua warna", $entropy_all, "", "", 
      // "", "", "","","","");
      
        // hitung_gain($db_object, $kondisi, "Jawaban A v=10", $entropy_all, "jawaban_a<=10", "jawaban_a>10", "", "", "");
      //hitung gain atribut KATEGORIKAL
    //   if($jmlMotif!=1){
    //     $NA1Motif="motif='$nilai_motif[0]'";
    //     $NA2Motif="";
    //     $NA3Motif="";
    //     if($jmlMotif==2){
    //             $NA2Motif="motif='$nilai_motif[1]'";
    //     }else if ($jmlMotif==3){
    //             $NA2Motif="motif='$nilai_motif[1]'";
    //             $NA3Motif="motif='$nilai_motif[2]'";
    //     }				
    //     $this->hitung_gain($kondisi , "motif", $entropy_all , $NA1Motif, $NA2Motif, $NA3Motif, "" , "", "", "", "");	
    // }
      echo "</table>";

      //ambil nilai gain terBesar
      $sql_max = $this->db->query("SELECT MAX(gain) as max FROM gain")->result_array();
      // var_dump($sql_max);
      $max_gain= $sql_max[0]['max'];
      

      $row = $this->db->query("SELECT * FROM gain WHERE gain=$max_gain")->result_array();
      // echo '<pre>';
      // print_r($row);
      // echo '</pre>';
      // var_dump($row);
      $atribut = $row[0]['atribut'];
      echo "Atribut terpilih = " . $atribut . ", dengan nilai gain = " . $max_gain . "<br>";
      echo "<br>================================<br>";

      //jika max gain = 0 perhitungan dihentikan dan mengambil keputusan
      if ($max_gain == 0) {
        echo "<br>LEAF ";
        $Nvarietas = $kondisi . " AND taksonomi_asli='Varietas'";
        $Nspesies = $kondisi . " AND taksonomi_asli='Spesies'";
        $jumlahvarietas = jumlah_data("$Nvarietas");
        $jumlahspesies = $this->jumlah_data("$Nspesies");
        if($jumlahvarietas >= $jumlahspesies){
            $keputusan = 'Varietas';
        }
        elseif($jumlahspesies >= $jumlahvarietas) {
            $keputusan = 'Spesies';
        }
        //insert atau lakukan pemangkasan cabang
        $this->pangkas($N_parent, $kasus, $keputusan);
      }
      //jika max_gain >0 lanjut..
      else {
          //genus terpilih    
          if ($atribut == "genus") {
            $this->proses_DT($kondisi, "($atribut='Vanda')", "($atribut='Cattleya')", "($atribut='Dendrobium')", "($atribut='Phalaenopsis')", "($atribut='Spathoglotis')", "($atribut='Paphiopedilum')");
          }
          //akar terpilih    
          if ($atribut == "akar") {
            $this->proses_DT($kondisi, "($atribut='Epifit')", "($atribut='Litofit')");
          }
          //batang terpilih    
          if ($atribut == "batang") {
            $this->proses_DT($kondisi, "($atribut='Monopodial')", "($atribut='Simpodial')");
          }
          //bentuk_daun terpilih    
          if ($atribut == "bentuk_daun") {
            $this->proses_DT($kondisi, "($atribut='Runcing')", "($atribut='Oval')", "($atribut='Lonjong')", "($atribut='Berlipat-lipat')");
          }
          //jumlah_mahkota terpilih    
          if ($atribut == "jumlah_mahkota") {
            $this->proses_DT($kondisi, "($atribut='5 helai')", "($atribut='3 helai')");
          }

          //Bentuk Mahkota terpilih    
          if ($atribut == "bentuk_mahkota") {
            $this->proses_DT($kondisi, "($atribut='Memanjang ujung melengkung')", "($atribut='Seperti bintang')", "($atribut='Oval ujung meruncing')", "($atribut='Oval lebar')", "($atribut='Elips lebar bertumpuk')", "($atribut='Elips meruncing')");
          }
          //lidah terpilih    
          if ($atribut == "lidah") {
            $this->proses_DT($kondisi, "($atribut='Menjulur')", "($atribut='Ujung lancip')", "($atribut='Berkantong')");
          }
          //motif terpilih    
          if ($atribut == "motif") {
            // $this->proses_DT($kondisi, "($atribut='Dua warna')", "($atribut='Bercorak')");
            $this->proses_DT($kondisi, "($atribut='Dua warna')", "($atribut='Bercorak')", "($atribut='Polos')");
          }

          // //motif terpilih  
          //   if ($atribut == "motif") {
          //       //jika nilai atribut 3
          //       if($jmlMotif==3){
          //           //hitung rasio
          //           $cabang = array();
          //           $cabang = $this->hitung_rasio($kondisi , 'motif',$max_gain,$nilai_motif[0],$nilai_motif[1],$nilai_motif[2],'','');
          //           $exp_cabang = explode(" , ",$cabang[1]);						
          //           $this->proses_DT($kondisi , "($atribut='$cabang[0]')","($atribut='$exp_cabang[0]' OR $atribut='$exp_cabang[1]')");						
          //       }
          //       //jika nilai atribut 2
          //       else if($jmlUsia==2){
          //         $this->proses_DT($kondisi , "($atribut='$nilai_motif[0]')" , "($atribut='$nilai_motif[1]')");
          //       }
          //   }
          
        }//end else jika max_gain>0
    }// end jumlah<3

  }

    //fungsi utama
  public function proses_DT($parent, $kasus_cabang1, $kasus_cabang2,$kasus_cabang3) {
    echo "cabang 1<br>";
    echo $kasus_cabang1;
    $this->pembentukan_tree($parent, $kasus_cabang1);
    echo "cabang 2<br>";
    $this->pembentukan_tree($parent, $kasus_cabang2);
    echo "cabang 3<br>";
    $this->pembentukan_tree($parent, $kasus_cabang3);
  }

  //fungsi hitung rasio
// public function hitung_rasio($kasus , $atribut , $gain , $nilai1 , $nilai2 , $nilai3 , $nilai4 , $nilai5){				
//   $data_kasus = '';
//   if($kasus!=''){
//       $data_kasus = $kasus." AND ";
//   }
//   //menentukan jumlah nilai
//   $jmlNilai=5;
//   //jika nilai 5 kosong maka nilai atribut-nya 4
//   if($nilai5==''){
//       $jmlNilai=4;
//   }
//   //jika nilai 4 kosong maka nilai atribut-nya 3
//   if($nilai4==''){
//       $jmlNilai=3;
//   }
//   $this->db->query("TRUNCATE rasio_gain");		
//   if($jmlNilai==3){
//       $opsi11 = $this->jumlah_data("$data_kasus ($atribut='$nilai2' OR $atribut='$nilai3')");
//       $opsi12 = $this->jumlah_data("$data_kasus $atribut='$nilai1'");
//       $tot_opsi1=$opsi11+$opsi12;
//       $opsi21 = $this->jumlah_data("$data_kasus ($atribut='$nilai3' OR $atribut='$nilai1')");
//       $opsi22 = $this->jumlah_data("$data_kasus $atribut='$nilai2'");
//       $tot_opsi2=$opsi21+$opsi22;
//       $opsi31 = $this->jumlah_data("$data_kasus ($atribut='$nilai1' OR $atribut='$nilai2')");
//       $opsi32 = $this->jumlah_data("$data_kasus $atribut='$nilai3'");
//       $tot_opsi3=$opsi31+$opsi32;			
//       //hitung split info
//       $opsi1 = (-($opsi11/$tot_opsi1)*(log(($opsi11/$tot_opsi1),2))) + (-($opsi12/$tot_opsi1)*(log(($opsi12/$tot_opsi1),2)));
//       $opsi2 = (-($opsi21/$tot_opsi2)*(log(($opsi21/$tot_opsi2),2))) + (-($opsi22/$tot_opsi2)*(log(($opsi22/$tot_opsi2),2)));
//       $opsi3 = (-($opsi31/$tot_opsi3)*(log(($opsi31/$tot_opsi3),2))) + (-($opsi32/$tot_opsi3)*(log(($opsi32/$tot_opsi3),2)));
//       //desimal 3 angka dibelakang koma
//       $opsi1 = $this->format_decimal($opsi1);
//       $opsi2 = $this->format_decimal($opsi2);
//       $opsi3 = $this->format_decimal($opsi3);										
//       //hitung rasio
//       $rasio1 = $gain/$opsi1;
//       $rasio2 = $gain/$opsi2;
//       $rasio3 = $gain/$opsi3;
//       //desimal 3 angka dibelakang koma
//       $rasio1 = $this->format_decimal($rasio1);
//       $rasio2 = $this->format_decimal($rasio2);
//       $rasio3 = $this->format_decimal($rasio3);
//           //cetak
//           echo "Opsi 1 : <br>jumlah ".$nilai2."/".$nilai3." = ".$opsi11.
//                   "<br>jumlah ".$nilai1." = ".$opsi12.
//                   "<br>Split = ".$opsi1.
//                   "<br>Rasio = ".$rasio1."<br>";
//           echo "Opsi 2 : <br>jumlah ".$nilai3."/".$nilai1." = ".$opsi21.
//                   "<br>jumlah ".$nilai2." = ".$opsi22.
//                   "<br>Split = ".$opsi2.
//                   "<br>Rasio = ".$rasio2."<br>";
//           echo "Opsi 3 : <br>jumlah ".$nilai1."/".$nilai2." = ".$opsi31.
//                   "<br>jumlah ".$nilai3." = ".$opsi32.
//                   "<br>Split = ".$opsi3.
//                   "<br>Rasio = ".$rasio3."<br>";

//           //insert 
//           $this->db->query("INSERT INTO rasio_gain VALUES 
//                                   ('' , 'opsi1' , '$nilai1' , '$nilai2 , $nilai3' , '$rasio1'),
//                                   ('' , 'opsi2' , '$nilai2' , '$nilai3 , $nilai1' , '$rasio2'),
//                                   ('' , 'opsi3' , '$nilai3' , '$nilai1 , $nilai2' , '$rasio3')");
//   }
  
//   $sql_max = $this->db->query("SELECT MAX(rasio_gain) as max FROM rasio_gain");
//   $row_max = $sql_max->result_array();	
//   $max_rasio = $row_max[0]['max'];
//   $sql = $this->db->query("SELECT * FROM rasio_gain WHERE rasio_gain=$max_rasio");
//   $row = $sql->result_array();
//     // var_dump($row);
//     // die;
//   $opsiMax = array();
//   $opsiMax[0] = $row[2];
//   $opsiMax[1] = $row[3];		
//   echo "<br>=========================<br>";
//   return $opsiMax;		
// }

  //fungsi cek heterogen data
  public function cek_heterohomogen($field, $kondisi) {
  //sql disticnt
  if ($kondisi == '') {
    $sql = $this->db->query("SELECT DISTINCT($field) FROM data_latih");
  } else {
    $sql = $this->db->query("SELECT DISTINCT($field) FROM data_latih WHERE $kondisi");
  }
  //jika jumlah data 1 maka homogen
  if ($sql->num_rows() == 1) {
      $nilai = "homogen";
  } else {
      $nilai = "heterogen";
  }
  return $nilai;
}

//fungsi menghitung jumlah data
public function jumlah_data($kondisi) {
  //sql
  if ($kondisi == '') {
      $sql = $this->db->query("SELECT COUNT(*) as jumlah FROM data_latih $kondisi")->result_array();
  } else {
      $sql = $this->db->query("SELECT COUNT(*) as jumlah FROM data_latih WHERE $kondisi")->result_array();
  }

  foreach ($sql as $row) {
    $jml = $row['jumlah'];
    return $jml;
    }
    //   $jml = $sql['jumlah'];
    //   var_dump($jml);
    //   die;
    // return $jml;
}

  //fungsi pemangkasan cabang
  public function pangkas($PARENT, $KASUS, $LEAF) {
        $sql_in = $this->db->query("INSERT INTO t_keputusan "
                . "(parent,akar,keputusan)"
                . " VALUES (\"$PARENT\" , \"$KASUS\" , \"$LEAF\")");
    echo "Keputusan = " . $LEAF . "<br>================================<br>";
  }

  public function hitung_entropy($nilai1, $nilai2) {
    $total = $nilai1 + $nilai2 ;
    $atribut1 = (-($nilai1 / $total) * (log(($nilai1 / $total), 2)));
    $atribut2 = (-($nilai2 / $total) * (log(($nilai2 / $total), 2)));
    
    $atribut1 = is_nan($atribut1)?0:$atribut1;
    $atribut2 = is_nan($atribut2)?0:$atribut2;
    $entropy = $atribut1 + $atribut2;
    //desimal 3 angka dibelakang koma
    $entropy = $this->format_decimal($entropy);
    return $entropy;
  }

  public function cek_nilaiAtribut($field , $kondisi){
    //sql disticnt		
    if($kondisi==''){
            $sql = $this->db->query("SELECT DISTINCT($field) as b FROM data_latih");					
    }else{
            $sql =$this->db->query("SELECT DISTINCT($field) as b FROM data_latih WHERE $kondisi");					
    }
    $a=0;
    
    $hasil = array();
    $result = $sql->result_array();
    // $result = $sql->result();
    
    // var_dump($result);
    // die;
    // $sql_max[0]['max'];
    // echo '<pre>';
    // print_r($result);
    // echo '</pre>';
    foreach($result as $row){
            // $hasil[$a] = $row['0']['b'];
            $hasil[$a]= $row['b'];
            $a++;
    }
    // var_dump($hasil);
    // die;
    return $hasil;
}

public function hitung_gain($kasus, $atribut, $ent_all, $kondisi1, $kondisi2, $kondisi3, $kondisi4, $kondisi5, $kondisi6, $kondisi7, $kondis8) {
  $data_kasus = '';
  if ($kasus != '') {
      $data_kasus = $kasus . " AND ";
  }

  //untuk atribut 6 nilai atribut Genus	
  if ($kondisi7 == 'Genus') {
      $j_varietas1 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND genus='$kondisi1'");
      $j_spesies1 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND genus='$kondisi1'");
      $jml1 = $j_varietas1 + $j_spesies1;
      
      $j_varietas2 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND genus='$kondisi2'");
      $j_spesies2 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND genus='$kondisi2'");
      $jml2 = $j_varietas2 + $j_spesies2;
      
      $j_varietas3 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND genus='$kondisi3'");
      $j_spesies3 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND genus='$kondisi3'");
      $jml3 = $j_varietas3 + $j_spesies3 ;
      
      $j_varietas4 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND genus='$kondisi4'");
      $j_spesies4 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND genus='$kondisi4'");
      $jml4 = $j_varietas4 + $j_spesies4 ;
      
      $j_varietas5 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND genus='$kondisi5'");
      $j_spesies5 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND genus='$kondisi5'");
      $jml5 = $j_varietas5 + $j_spesies5 ;
      
      $j_varietas6 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND genus='$kondisi6'");
      $j_spesies6 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND genus='$kondisi6'");
      $jml6 = $j_varietas6 + $j_spesies6 ;
      
      //hitung entropy masing-masing kondisi
      $jml_total = $jml1 + $jml2 + $jml3 + $jml4 + $jml5 + $jml6;
      $ent1 = $this->hitung_entropy($j_varietas1, $j_spesies1);
      $ent2 = $this->hitung_entropy($j_varietas2, $j_spesies2);
      $ent3 = $this->hitung_entropy($j_varietas3, $j_spesies3);
      $ent4 = $this->hitung_entropy($j_varietas4, $j_spesies4);
      $ent5 = $this->hitung_entropy($j_varietas5, $j_spesies5);
      $ent6 = $this->hitung_entropy($j_varietas6, $j_spesies6);

      $gain = $ent_all - ((($jml1 / $jml_total) * $ent1) + (($jml2 / $jml_total) * $ent2) + (($jml3 / $jml_total) * $ent3) + (($jml4 / $jml_total) * $ent4) + (($jml5 / $jml_total) * $ent5) + (($jml6 / $jml_total) * $ent6));
      //desimal 3 angka dibelakang koma
      $gain = $this->format_decimal($gain);
      
      echo "<tr>";
      echo "<td>" . $kondisi1 . "</td>";
      echo "<td>" . $jml1 . "</td>";
      echo "<td>" . $j_varietas1 . "</td>";
      echo "<td>" . $j_spesies1 . "</td>";
      echo "<td>" . $ent1 . "</td>";
      echo "<td>&nbsp;</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>" . $kondisi2 . "</td>";
      echo "<td>" . $jml2 . "</td>";
      echo "<td>" . $j_varietas2 . "</td>";
      echo "<td>" . $j_spesies2 . "</td>";
      echo "<td>" . $ent2 . "</td>";
      echo "<td>&nbsp;</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>" . $kondisi3 . "</td>";
      echo "<td>" . $jml3 . "</td>";
      echo "<td>" . $j_varietas3 . "</td>";
      echo "<td>" . $j_spesies3 . "</td>";
      echo "<td>" . $ent3 . "</td>";
      echo "<td>&nbsp;</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>" . $kondisi4 . "</td>";
      echo "<td>" . $jml4 . "</td>";
      echo "<td>" . $j_varietas4 . "</td>";
      echo "<td>" . $j_spesies4 . "</td>";
      echo "<td>" . $ent4 . "</td>";
      echo "<td>&nbsp;</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>" . $kondisi5 . "</td>";
      echo "<td>" . $jml5 . "</td>";
      echo "<td>" . $j_varietas5 . "</td>";
      echo "<td>" . $j_spesies5 . "</td>";
      echo "<td>" . $ent5 . "</td>";
      echo "<td>&nbsp;</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>" . $kondisi6 . "</td>";
      echo "<td>" . $jml6 . "</td>";
      echo "<td>" . $j_varietas6 . "</td>";
      echo "<td>" . $j_spesies6 . "</td>";
      echo "<td>" . $ent6 . "</td>";
      echo "<td>" . $gain . "</td>";
      echo "</tr>";

      echo "<tr><td colspan='6'></td></tr>";
  }

  //untuk atribut 3 nilai atribut Akar
  else if ($kondisi4 == 'Akar') {
      $j_varietas1 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND akar='$kondisi1'");
      $j_spesies1 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND akar='$kondisi1'");
      $jml1 = $j_varietas1 + $j_spesies1;
      
      $j_varietas2 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND akar='$kondisi2'");
      $j_spesies2 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND akar='$kondisi2'");
      $jml2 = $j_varietas2 + $j_spesies2;
      
      $j_varietas3 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND akar='$kondisi3'");
      $j_spesies3 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND akar='$kondisi3'");
      $jml3 = $j_varietas3 + $j_spesies3 ;
      
      
      //hitung entropy masing-masing kondisi
      $jml_total = $jml1 + $jml2 + $jml3 ;
      $ent1 = $this->hitung_entropy($j_varietas1, $j_spesies1);
      $ent2 = $this->hitung_entropy($j_varietas2, $j_spesies2);
      $ent3 = $this->hitung_entropy($j_varietas3, $j_spesies3);

      $gain = $ent_all - ((($jml1 / $jml_total) * $ent1) + (($jml2 / $jml_total) * $ent2) + (($jml3 / $jml_total) * $ent3));
      //desimal 3 angka dibelakang koma
      $gain = $this->format_decimal($gain);

            
      echo "<tr>";
      echo "<td>" . $kondisi1 . "</td>";
      echo "<td>" . $jml1 . "</td>";
      echo "<td>" . $j_varietas1 . "</td>";
      echo "<td>" . $j_spesies1 . "</td>";
      echo "<td>" . $ent1 . "</td>";
      echo "<td>&nbsp;</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>" . $kondisi2 . "</td>";
      echo "<td>" . $jml2 . "</td>";
      echo "<td>" . $j_varietas2 . "</td>";
      echo "<td>" . $j_spesies2 . "</td>";
      echo "<td>" . $ent2 . "</td>";
      echo "<td>&nbsp;</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>" . $kondisi3 . "</td>";
      echo "<td>" . $jml3 . "</td>";
      echo "<td>" . $j_varietas3 . "</td>";
      echo "<td>" . $j_spesies3 . "</td>";
      echo "<td>" . $ent3 . "</td>";
      echo "<td>" . $gain . "</td>";
      echo "</tr>";

      echo "<tr><td colspan='3'></td></tr>";
  }
  
  //untuk atribut 2 nilai atribut Batang
  else if ($kondisi3 == 'Batang') {
      $j_varietas1 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND batang='$kondisi1'");
      $j_spesies1 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND batang='$kondisi1'");
      $jml1 = $j_varietas1 + $j_spesies1;
      
      $j_varietas2 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND batang='$kondisi2'");
      $j_spesies2 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND batang='$kondisi2'");
      $jml2 = $j_varietas2 + $j_spesies2;
      
      //hitung entropy masing-masing kondisi
      $jml_total = $jml1 + $jml2 ;
      $ent1 = $this->hitung_entropy($j_varietas1, $j_spesies1);
      $ent2 = $this->hitung_entropy($j_varietas2, $j_spesies2);

      $gain = $ent_all - ((($jml1 / $jml_total) * $ent1) + (($jml2 / $jml_total) * $ent2));
      //desimal 3 angka dibelakang koma
      $gain = $this->format_decimal($gain);
            
      echo "<tr>";
      echo "<td>" . $kondisi1 . "</td>";
      echo "<td>" . $jml1 . "</td>";
      echo "<td>" . $j_varietas1 . "</td>";
      echo "<td>" . $j_spesies1 . "</td>";
      echo "<td>" . $ent1 . "</td>";
      echo "<td>&nbsp;</td>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>" . $kondisi2 . "</td>";
      echo "<td>" . $jml2 . "</td>";
      echo "<td>" . $j_varietas2 . "</td>";
      echo "<td>" . $j_spesies2 . "</td>";
      echo "<td>" . $ent2 . "</td>";
      echo "<td>" . $gain . "</td>";
      echo "</tr>";

      echo "<tr><td colspan='6'></td></tr>";
  }

   //untuk atribut 4 nilai atribut Bentuk Daun	
   if ($kondisi5 == 'Bentuk Daun') {
    $j_varietas1 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND bentuk_daun='$kondisi1'");
    $j_spesies1 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND bentuk_daun='$kondisi1'");
    $jml1 = $j_varietas1 + $j_spesies1;
    
    $j_varietas2 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND bentuk_daun='$kondisi2'");
    $j_spesies2 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND bentuk_daun='$kondisi2'");
    $jml2 = $j_varietas2 + $j_spesies2;
    
    $j_varietas3 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND bentuk_daun='$kondisi3'");
    $j_spesies3 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND bentuk_daun='$kondisi3'");
    $jml3 = $j_varietas3 + $j_spesies3 ;
    
    $j_varietas4 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND bentuk_daun='$kondisi4'");
    $j_spesies4 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND bentuk_daun='$kondisi4'");
    $jml4 = $j_varietas4 + $j_spesies4 ;
    
    //hitung entropy masing-masing kondisi
    $jml_total = $jml1 + $jml2 + $jml3 + $jml4;
    $ent1 = $this->hitung_entropy($j_varietas1, $j_spesies1);
    $ent2 = $this->hitung_entropy($j_varietas2, $j_spesies2);
    $ent3 = $this->hitung_entropy($j_varietas3, $j_spesies3);
    $ent4 = $this->hitung_entropy($j_varietas4, $j_spesies4);

    $gain = $ent_all - ((($jml1 / $jml_total) * $ent1) + (($jml2 / $jml_total) * $ent2) + (($jml3 / $jml_total) * $ent3) + (($jml4 / $jml_total) * $ent4));
    //desimal 3 angka dibelakang koma
    $gain = $this->format_decimal($gain);
    
    echo "<tr>";
    echo "<td>" . $kondisi1 . "</td>";
    echo "<td>" . $jml1 . "</td>";
    echo "<td>" . $j_varietas1 . "</td>";
    echo "<td>" . $j_spesies1 . "</td>";
    echo "<td>" . $ent1 . "</td>";
    echo "<td>&nbsp;</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $kondisi2 . "</td>";
    echo "<td>" . $jml2 . "</td>";
    echo "<td>" . $j_varietas2 . "</td>";
    echo "<td>" . $j_spesies2 . "</td>";
    echo "<td>" . $ent2 . "</td>";
    echo "<td>&nbsp;</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $kondisi3 . "</td>";
    echo "<td>" . $jml3 . "</td>";
    echo "<td>" . $j_varietas3 . "</td>";
    echo "<td>" . $j_spesies3 . "</td>";
    echo "<td>" . $ent3 . "</td>";
    echo "<td>&nbsp;</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $kondisi4 . "</td>";
    echo "<td>" . $jml4 . "</td>";
    echo "<td>" . $j_varietas4 . "</td>";
    echo "<td>" . $j_spesies4 . "</td>";
    echo "<td>" . $ent4 . "</td>";
    echo "<td>" . $gain . "</td>";
    echo "</tr>";

    echo "<tr><td colspan='6'></td></tr>";
}

//untuk atribut 2 nilai atribut Jumlah Mahkota
else if ($kondisi3 == 'Jumlah Mahkota') {
  $j_varietas1 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND jumlah_mahkota='$kondisi1'");
  $j_spesies1 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND jumlah_mahkota='$kondisi1'");
  $jml1 = $j_varietas1 + $j_spesies1;
  
  $j_varietas2 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND jumlah_mahkota='$kondisi2'");
  $j_spesies2 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND jumlah_mahkota='$kondisi2'");
  $jml2 = $j_varietas2 + $j_spesies2;
  
  //hitung entropy masing-masing kondisi
  $jml_total = $jml1 + $jml2 ;
  $ent1 = $this->hitung_entropy($j_varietas1, $j_spesies1);
  $ent2 = $this->hitung_entropy($j_varietas2, $j_spesies2);

  $gain = $ent_all - ((($jml1 / $jml_total) * $ent1) + (($jml2 / $jml_total) * $ent2));
  //desimal 3 angka dibelakang koma
  $gain = $this->format_decimal($gain);
        
  echo "<tr>";
  echo "<td>" . $kondisi1 . "</td>";
  echo "<td>" . $jml1 . "</td>";
  echo "<td>" . $j_varietas1 . "</td>";
  echo "<td>" . $j_spesies1 . "</td>";
  echo "<td>" . $ent1 . "</td>";
  echo "<td>&nbsp;</td>";
  echo "</tr>";

  echo "<tr>";
  echo "<td>" . $kondisi2 . "</td>";
  echo "<td>" . $jml2 . "</td>";
  echo "<td>" . $j_varietas2 . "</td>";
  echo "<td>" . $j_spesies2 . "</td>";
  echo "<td>" . $ent2 . "</td>";
  echo "<td>" . $gain . "</td>";
  echo "</tr>";

  echo "<tr><td colspan='6'></td></tr>";
}
  
  //untuk atribut 6 nilai atribut Bentuk Mahkota	
  if ($kondisi7 == 'Bentuk Mahkota') {
    $j_varietas1 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND bentuk_mahkota='$kondisi1'");
    $j_spesies1 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND bentuk_mahkota='$kondisi1'");
    $jml1 = $j_varietas1 + $j_spesies1;
    
    $j_varietas2 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND bentuk_mahkota='$kondisi2'");
    $j_spesies2 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND bentuk_mahkota='$kondisi2'");
    $jml2 = $j_varietas2 + $j_spesies2;
    
    $j_varietas3 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND bentuk_mahkota='$kondisi3'");
    $j_spesies3 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND bentuk_mahkota='$kondisi3'");
    $jml3 = $j_varietas3 + $j_spesies3 ;
    
    $j_varietas4 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND bentuk_mahkota='$kondisi4'");
    $j_spesies4 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND bentuk_mahkota='$kondisi4'");
    $jml4 = $j_varietas4 + $j_spesies4 ;
    
    $j_varietas5 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND bentuk_mahkota='$kondisi5'");
    $j_spesies5 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND bentuk_mahkota='$kondisi5'");
    $jml5 = $j_varietas5 + $j_spesies5 ;
    
    $j_varietas6 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND bentuk_mahkota='$kondisi6'");
    $j_spesies6 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND bentuk_mahkota='$kondisi6'");
    $jml6 = $j_varietas6 + $j_spesies6 ;
    
    //hitung entropy masing-masing kondisi
    $jml_total = $jml1 + $jml2 + $jml3 + $jml4 + $jml5 + $jml6;
    $ent1 = $this->hitung_entropy($j_varietas1, $j_spesies1);
    $ent2 = $this->hitung_entropy($j_varietas2, $j_spesies2);
    $ent3 = $this->hitung_entropy($j_varietas3, $j_spesies3);
    $ent4 = $this->hitung_entropy($j_varietas4, $j_spesies4);
    $ent5 = $this->hitung_entropy($j_varietas5, $j_spesies5);
    $ent6 = $this->hitung_entropy($j_varietas6, $j_spesies6);

    $gain = $ent_all - ((($jml1 / $jml_total) * $ent1) + (($jml2 / $jml_total) * $ent2) + (($jml3 / $jml_total) * $ent3) + (($jml4 / $jml_total) * $ent4) + (($jml5 / $jml_total) * $ent5) + (($jml6 / $jml_total) * $ent6));
    //desimal 3 angka dibelakang koma
    $gain = $this->format_decimal($gain);
    
    echo "<tr>";
    echo "<td>" . $kondisi1 . "</td>";
    echo "<td>" . $jml1 . "</td>";
    echo "<td>" . $j_varietas1 . "</td>";
    echo "<td>" . $j_spesies1 . "</td>";
    echo "<td>" . $ent1 . "</td>";
    echo "<td>&nbsp;</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $kondisi2 . "</td>";
    echo "<td>" . $jml2 . "</td>";
    echo "<td>" . $j_varietas2 . "</td>";
    echo "<td>" . $j_spesies2 . "</td>";
    echo "<td>" . $ent2 . "</td>";
    echo "<td>&nbsp;</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $kondisi3 . "</td>";
    echo "<td>" . $jml3 . "</td>";
    echo "<td>" . $j_varietas3 . "</td>";
    echo "<td>" . $j_spesies3 . "</td>";
    echo "<td>" . $ent3 . "</td>";
    echo "<td>&nbsp;</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $kondisi4 . "</td>";
    echo "<td>" . $jml4 . "</td>";
    echo "<td>" . $j_varietas4 . "</td>";
    echo "<td>" . $j_spesies4 . "</td>";
    echo "<td>" . $ent4 . "</td>";
    echo "<td>&nbsp;</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $kondisi5 . "</td>";
    echo "<td>" . $jml5 . "</td>";
    echo "<td>" . $j_varietas5 . "</td>";
    echo "<td>" . $j_spesies5 . "</td>";
    echo "<td>" . $ent5 . "</td>";
    echo "<td>&nbsp;</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $kondisi6 . "</td>";
    echo "<td>" . $jml6 . "</td>";
    echo "<td>" . $j_varietas6 . "</td>";
    echo "<td>" . $j_spesies6 . "</td>";
    echo "<td>" . $ent6 . "</td>";
    echo "<td>" . $gain . "</td>";
    echo "</tr>";

    echo "<tr><td colspan='6'></td></tr>";
}

//untuk atribut 3 nilai atribut Lidah
else if ($kondisi4 == 'Lidah') {
    $j_varietas1 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND lidah='$kondisi1'");
    $j_spesies1 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND lidah='$kondisi1'");
    $jml1 = $j_varietas1 + $j_spesies1;
    
    $j_varietas2 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND lidah='$kondisi2'");
    $j_spesies2 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND lidah='$kondisi2'");
    $jml2 = $j_varietas2 + $j_spesies2;
    
    $j_varietas3 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND lidah='$kondisi3'");
    $j_spesies3 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND lidah='$kondisi3'");
    $jml3 = $j_varietas3 + $j_spesies3 ;
    
    
    //hitung entropy masing-masing kondisi
    $jml_total = $jml1 + $jml2 + $jml3 ;
    $ent1 = $this->hitung_entropy($j_varietas1, $j_spesies1);
    $ent2 = $this->hitung_entropy($j_varietas2, $j_spesies2);
    $ent3 = $this->hitung_entropy($j_varietas3, $j_spesies3);

    $gain = $ent_all - ((($jml1 / $jml_total) * $ent1) + (($jml2 / $jml_total) * $ent2) + (($jml3 / $jml_total) * $ent3));
    //desimal 3 angka dibelakang koma
    $gain = $this->format_decimal($gain);

          
    echo "<tr>";
    echo "<td>" . $kondisi1 . "</td>";
    echo "<td>" . $jml1 . "</td>";
    echo "<td>" . $j_varietas1 . "</td>";
    echo "<td>" . $j_spesies1 . "</td>";
    echo "<td>" . $ent1 . "</td>";
    echo "<td>&nbsp;</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $kondisi2 . "</td>";
    echo "<td>" . $jml2 . "</td>";
    echo "<td>" . $j_varietas2 . "</td>";
    echo "<td>" . $j_spesies2 . "</td>";
    echo "<td>" . $ent2 . "</td>";
    echo "<td>&nbsp;</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $kondisi3 . "</td>";
    echo "<td>" . $jml3 . "</td>";
    echo "<td>" . $j_varietas3 . "</td>";
    echo "<td>" . $j_spesies3 . "</td>";
    echo "<td>" . $ent3 . "</td>";
    echo "<td>" . $gain . "</td>";
    echo "</tr>";

    echo "<tr><td colspan='6'></td></tr>";
}

//untuk atribut 3 nilai atribut Motif
else if ($kondisi4 == 'Motif') {
    $j_varietas1 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND motif='$kondisi1'");
    $j_spesies1 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND motif='$kondisi1'");
    $jml1 = $j_varietas1 + $j_spesies1;
    
    $j_varietas2 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND motif='$kondisi2'");
    $j_spesies2 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND motif='$kondisi2'");
    $jml2 = $j_varietas2 + $j_spesies2;
    
    $j_varietas3 = $this->jumlah_data("$data_kasus taksonomi_asli='Varietas' AND motif='$kondisi3'");
    $j_spesies3 = $this->jumlah_data("$data_kasus taksonomi_asli='Spesies' AND motif='$kondisi3'");
    $jml3 = $j_varietas3 + $j_spesies3 ;
    
    
    //hitung entropy masing-masing kondisi
    $jml_total = $jml1 + $jml2 + $jml3 ;
    $ent1 = $this->hitung_entropy($j_varietas1, $j_spesies1);
    $ent2 = $this->hitung_entropy($j_varietas2, $j_spesies2);
    $ent3 = $this->hitung_entropy($j_varietas3, $j_spesies3);

    $gain = $ent_all - ((($jml1 / $jml_total) * $ent1) + (($jml2 / $jml_total) * $ent2) + (($jml3 / $jml_total) * $ent3));
    //desimal 3 angka dibelakang koma
    $gain = $this->format_decimal($gain);

          
    echo "<tr>";
    echo "<td>" . $kondisi1 . "</td>";
    echo "<td>" . $jml1 . "</td>";
    echo "<td>" . $j_varietas1 . "</td>";
    echo "<td>" . $j_spesies1 . "</td>";
    echo "<td>" . $ent1 . "</td>";
    echo "<td>&nbsp;</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $kondisi2 . "</td>";
    echo "<td>" . $jml2 . "</td>";
    echo "<td>" . $j_varietas2 . "</td>";
    echo "<td>" . $j_spesies2 . "</td>";
    echo "<td>" . $ent2 . "</td>";
    echo "<td>&nbsp;</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $kondisi3 . "</td>";
    echo "<td>" . $jml3 . "</td>";
    echo "<td>" . $j_varietas3 . "</td>";
    echo "<td>" . $j_spesies3 . "</td>";
    echo "<td>" . $ent3 . "</td>";
    echo "<td>" . $gain . "</td>";
    echo "</tr>";

    echo "<tr><td colspan='6'></td></tr>";
}

  $this->db->query("INSERT INTO gain VALUES ('','1','$atribut','$gain')");
}

  public function format_decimal($value){
    return round($value, 3);
  }
} 