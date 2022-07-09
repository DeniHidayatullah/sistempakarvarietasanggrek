<?php

class Admin_model extends CI_model
{
  // menampilkan seluruh data admin yang ada di tabel admin.
  public function getAllProfile()
  {
    return $this->db->get('tbl_user')->result_array();
  }

  // Menghitung jumlah data dalam tabel karakteristik
  public function CountKarakteristik()
  {
    $query = $this->db->get('tbl_karakteristik');
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }

  
  // Menghitung jumlah data dalam tabel Tes
  public function CountTes()
  {
    $query = $this->db->get('tbl_tes');
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }

  // Menghitung jumlah data dalam tabel pengetahuan
  public function CountPengetahuan()
  {
    $query = $this->db->get('tbl_pengetahuan');
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }

  // Menghitung jumlah data dalam tabel Laporan
  public function CountLaporan()
  {
    $query = $this->db->get('tbl_hasil_diagnosa');
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }

  // Mengubah data admin
  public function ubahAdmin()
  {
    $id = $this->input->post('id_user');
    $data = [
      "nama_user" => $this->input->post('nama', true),
      "username" => $this->input->post('username', true)
    ];
    $this->db->where('id_user', $id);
    $this->db->update('tbl_user', $data);
  }
}
