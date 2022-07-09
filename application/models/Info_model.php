<?php

class Info_model extends CI_model
{
  // Menampilkan seluruh isi tabel Pengetahuan
  // public function getAll()
  // {
  //   // menampilkan seluruh data karakteristik yang ada di tabel karakteristik.
  //   // $queryRule = "SELECT `tbl_info`.`id`,`tbl_varietas`.`kode_varietas`,`tbl_varietas`.`nama_varietas`,`tbl_karakteristik`.`kode_karakteristik`,`tbl_karakteristik`.`nama_karakteristik`,`tbl_info`
  //   // FROM `tbl_varietas` JOIN `tbl_pengetahuan` 
  //   // ON `tbl_kerusakan`.`id_kerusakan` = `tbl_pengetahuan`.`id_kerusakan`
  //   // JOIN `tbl_gejala` 
  //   // ON `tbl_pengetahuan`.`id_gejala` = `tbl_gejala`.`id_gejala`
  //   //                     ";
  //   // return $this->db->query($queryRule)->result_array();

  //   //return $this->db->get('tbl_pengetahuan')->result_array();
    
  // }

  // Menampilkan seluruh isi tabel Gejala
  public function getAllInfo()
  {
    // menampilkan seluruh data gejala yang ada di tabel gejala.
    return $this->db->get('tbl_info')->result_array();
  }

  // Menampilkan seluruh isi tabel Kerusakan
  public function getAllKerusakan()
  {
    // menampilkan seluruh data kerusakan yang ada di tabel kerusakan.
    return $this->db->get('tbl_kerusakan')->result_array();
  }

  // CRUD PENGETAHUAN
  // Tambah Data Pengetahuan
  public function tambahPengetahuan()
  {
    $data = [
      "id_kerusakan" => $this->input->post('kerusakan', true,),
      "id_gejala" => $this->input->post('gejala'),
      "probabilitas" => $this->input->post('probabilitas')
    ];
    $this->db->insert('tbl_pengetahuan', $data);
  }

  // Ubah Data Pengetahuan
  public function ubahPengetahuan()
  {
    $id = $this->input->post('id');
    $data = [
      "id_kerusakan" => $this->input->post('kerusakan'),
      "id_gejala" => $this->input->post('gejala'),
      "probabilitas" => $this->input->post('probabilitas')
    ];
    $this->db->where('id', $id);
    $this->db->update('tbl_pengetahuan', $data);
  }
  // Hapus Data Pengetahuan
  public function hapus($id)
  {
    $this->db->delete('tbl_pengetahuan', ['id' => $id]);
  }
  // END CRUD PENGETAHUAN
}
