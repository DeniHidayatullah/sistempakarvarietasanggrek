<?php

class Varietas_model extends CI_model
{
  public function KodeVarietas()
  {
    // Membuat kode varietas menjadi generate AI (Auto Increment)
    $query = $this->db->query("select max(kode_varietas) as max_id from tbl_varietas");
    $rows = $query->row();
    $kode = $rows->max_id;
    $noUrut = (int) substr($kode, 1, 2);
    $noUrut++;
    $char = "V";
    $kode = $char . sprintf("%02s", $noUrut);
    return $kode;
  }

  // CRUD Varietas
  // menampilkan seluruh data Varietas yang ada di tabel Varietas.
  public function getAllVarietas()
  {
    return $this->db->get('tbl_varietas')->result_array();
  }

  // Tambah data Varietas
  public function tambahVarietas()
  {
    $data = [
      // Data yang ada di modal
      'kode_varietas' => $this->KodeVarietas(),
      'nama_varietas' => $this->input->post('nama_varietas', true),
      'cara_perawatan' => $this->input->post('cara_perawatan', true)
    ];
    $this->db->insert('tbl_varietas', $data);
  }

  // Ubah Data varietas
  public function ubahvarietas()
  {
    $id = $this->input->post('id');
    // Mengubah data karakteristik
    $data = [
      "kode_varietas" => $this->input->post('kode'),
      "nama_varietas" => $this->input->post('nama', true),
      "cara_perawatan" => $this->input->post('cara_perawatan', true)
    ];
    $this->db->where('id_varietas', $id);
    $this->db->update('tbl_varietas', $data);
  }

  // Hapus Data varietas
  public function hapusVarietas($id)
  {
    $this->db->delete('tbl_varietas', ['id_varietas' => $id]);
  }
  // END CRUD varietas
}