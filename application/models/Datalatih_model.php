<?php

class Datalatih_model extends CI_model
{
  public function getAll()
  {
    return $this->db->get('data_latih')->result();
  }

  // Tambah data Karakteristik
  public function tambahKarakteristik()
  {
    $data = [
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

  public function insertexcel($data){
		$insert = $this->db->insert_batch('data_latih', $data);
		if($insert){
			return true;
		}
	}
}