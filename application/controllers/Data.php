<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

    public function save()
    {
        $this->load->model('M_Data', 'data');

        $suhu = $this->input->get('suhu');

        // data dari M_Simpan.php
        $rekap = $this->data->ambil_data_terakhir();

        if ($rekap) {
            $suhu_sebelumnya = $rekap[0]["suhu"];

            $awal  = date_create($rekap[0]['waktu']);
            $akhir = date_create(); // waktu sekarang
            $diff  = date_diff($awal, $akhir);

            $hari = $diff->d;
            $jam = $diff->h;

            if ($suhu_sebelumnya == $suhu) {
                if ($hari >= 1 || $jam >= 1) {
                    // Simoan ke database
                    $this->data->save();
                    $this->kontrol();
                } else {
                    $this->kontrol();
                }
            } else {
                // Simpan ke database
                $this->data->save();
                $this->kontrol();
            }
        } else {
            // Simpan ke database
            $this->data->save();
            $this->kontrol();
        }
    }

    public function kontrol()
    {
        $this->load->model('M_Data', 'data');

        $kontrol = $this->data->ambilKontrol();

        $lampu1 = $kontrol[0]['lampu1'];
        $lampu2 = $kontrol[0]['lampu2'];
        $lampu3 = $kontrol[0]['lampu3'];
        $lampu4 = $kontrol[0]['lampu4'];

        echo $lampu1 . $lampu2 . $lampu3 . $lampu4;
    }

    public function update()
    {
        $this->load->model('M_Data', 'data');

        $ket = $this->input->get('ket');

        $this->data->update($ket);

        echo "Sukses";
    }
}
