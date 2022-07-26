<?php
class M_home extends CI_model
{
    public function save_data()
    {
        $post = $this->input->post();
        $data = [
            "genius"        => $post["genius"],
            "akar"          => $post["akar"],
            "batang"        => $post["batang"],
            "daun"          => $post["daun"],
            "jumlah_mahkota" => $post["jumlah_mahkota"],
            "bentuk_mahkota" => $post["bentuk_mahkota"],
            "lidah"         => $post["lidah"],
            "motif"         => $post["motif"]
        ];
        // var_dump($data);
        // die;
        return $this->db->insert("tbl_uji", $data);
    }
}
