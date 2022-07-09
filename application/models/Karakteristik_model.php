<?php

class Karakteristik_model extends CI_model
{
  // Membuat kode karakteristik menjadi AI (Auto Increment)
  public function KodeKarakteristik()
  {
    $query = $this->db->query("select max(kode_karakteristik) as max_id from tbl_karakteristik");
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
  public function getAllKarakteristik()
  {
    return $this->db->get('tbl_karakteristik')->result_array();
  }

  // Tambah data Karakteristik
  public function tambahKarakteristik()
  {
    $data = [
      'id_karakteristik' => $this->input->post('id'),
      'kode_karakteristik' => $this->KodeKarakteristik(),
      "nama_karakteristik" => $this->input->post('nama', true)
    ];
    $this->db->insert('tbl_karakteristik', $data);
  }

  // Ubah Data Karakteristik
  public function ubahKarakteristik()
  {
    $id = $this->input->post('id');
    // Mengubah data karakteristik
    $data = [
      "kode_karakteristik" => $this->input->post('kode'),
      "nama_karakteristik" => $this->input->post('nama', true)
    ];
    $this->db->where('id_karakteristik', $id);
    $this->db->update('tbl_karakteristik', $data);
  }

  // Menghapus Data Karakteristik
  public function hapusKarakteristik($id)
  {
    // Hapus Karakteristik berdasarkan id yang dipilih.
    $this->db->delete('tbl_karakteristik', ['id_karakteristik' => $id]);
  }
  // End CRUD Karakteristik
}
