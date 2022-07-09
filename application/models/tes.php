<?php

class Tes_model extends CI_model
{
  // Membuat kode tes menjadi AI (Auto Increment)
  public function KodeTes()
  {
    $query = $this->db->query("select max(kode_tes) as max_id from tbl_tes");
    $rows = $query->row();
    $kode = $rows->max_id;
    $noUrut = (int) substr($kode, 1, 2);
    $noUrut++;
    $char = "K";
    $kode = $char . sprintf("%02s", $noUrut);
    return $kode;
  }
  // CRUD Karakteristik
  // menampilkan seluruh data karakteristik yang ada di tabel karakteristik.
  public function getAllTes()
  {
    return $this->db->get('tbl_tes')->result_array();
  }

  // Tambah data Karakteristik
  public function tambahTes()
  {
    $data = [
      'id_tes' => $this->input->post('id'),
      'kode_tes' => $this->KodeTes(),
      "nama_tes" => $this->input->post('nama', true)
    ];
    $this->db->insert('tbl_tes', $data);
  }

  // Ubah Data Karakteristik
  public function ubahTes()
  {
    $id = $this->input->post('id');
    // Mengubah data karakteristik
    $data = [
      "kode_tes" => $this->input->post('kode_tes'),
      "nama_tes" => $this->input->post('nama_tes', true)
    ];
    $this->db->where('id_tes', $id);
    $this->db->update('tbl_tes', $data);
  }

  // Menghapus Data Karakteristik
  public function hapusTes($id)
  {
    // Hapus Karakteristik berdasarkan id yang dipilih.
    $this->db->delete('tbl_tes', ['id_tes' => $id]);
  }
  // End CRUD Karakteristik
}
