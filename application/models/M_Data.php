<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Data extends CI_Model
{

    public function save()
    {
        $tanggal = date('Y-m-d H:i:s');
        $suhu = $this->input->get('suhu');

        $data = [
            "waktu" => $tanggal,
            "suhu" => $suhu
        ];

        $this->db->insert('tbrekap', $data);
    }

    public function ambil_data_terakhir()
    {
        $this->db->select('*');
        $this->db->from('tbrekap');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);

        return $this->db->get()->result_array();
    }

    public function ambilKontrol()
    {
        return $this->db->get('tbkontrol')->result_array();
    }

    public function update($ket)
    {
        if ($ket == 1) {
            $data = [
                "keterangan" => "Terdeteksi pergerakan"
            ];
        } else if ($ket == 2) {
            $data = [
                "waktu_awal" => date('Y-m-d H:i:s'),
                "keterangan" => "Tidak terdeteksi pergerakan"
            ];
        } else if ($ket == 3) {
            $data = [
                "keterangan" => "Tidak terdeteksi pergerakan"
            ];
        }

        $this->db->update('tbtelur', $data);
    }
}
