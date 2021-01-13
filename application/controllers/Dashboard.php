<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('data_login'))) {
			$this->session->set_flashdata('flash-error', 'Anda Belum Login');
			redirect('Auth', 'refresh');
		}

		$this->load->model('M_Rekap', 'rekap');
		$this->load->model('M_Data', 'data');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['page'] = 'backend/dashboard';
		$data['suhu'] = $this->rekap->getLast();
		$telur = $this->rekap->getTelur();

		$awal  = date_create($telur[0]['waktu_awal']);
		$akhir = date_create(); // waktu sekarang
		$diff  = date_diff($awal, $akhir);

		$data['bulan'] = $diff->m;
		$data['hari'] = $diff->d;
		$data['jam'] = $diff->h;
		$data['menit'] = $diff->i;
		$data['detik'] = $diff->s;

		$this->load->view('backend/index', $data);
	}

	public function dashboard_realtime()
	{
		$telur = $this->rekap->getTelur();

		$data = [
			"data" => $this->rekap->getLast(),
			"keterangan" => $telur[0]['keterangan']
		];

		echo json_encode($data);
	}

	public function profile()
	{
		$data['title'] = 'Profile';
		$data['page'] = 'backend/profile';
		$this->load->view('backend/index', $data);
	}

	public function editProfile()
	{
		if ($this->input->post('password', true)) {
			$data = [
				"nama" => $this->input->post('nama', true),
				"password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT)
			];
		} else {
			$data = [
				"nama" => $this->input->post('nama', true)
			];
		}

		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('tbuser', $data);

		$this->session->set_flashdata('flash-sukses', 'Profile berhasil diedit');
		redirect('Dashboard/profile');
	}

	function get_realtime()
	{
		$data_tabel = $this->rekap->getGrafik();
		echo json_encode($data_tabel);
	}

	public function grafik()
	{
		$data['title'] = 'Rekap Suhu';
		$data['page'] = 'backend/grafik';
		$this->load->view('backend/index', $data);
	}

	public function rekap()
	{
		$data['title'] = 'Rekap Suhu';
		$data['page'] = 'backend/rekap';
		$data['suhu'] = $this->rekap->getAll();
		$this->load->view('backend/index', $data);
	}

	public function hapusRekap($id)
	{
		$this->rekap->hapusRekap($id);
		$this->session->set_flashdata('flash-sukses', 'data berhasil dihapus');
		redirect('Dashboard/rekap');
	}

	public function kontrol()
	{
		$data['title'] = 'Kontrol Lampu';
		$data['page'] = 'backend/kontrol';
		$data['kontrol'] = $this->data->ambilKontrol();
		$this->load->view('backend/index', $data);
	}

	public function kontrolLampu()
	{
		$atribut = $this->input->post('atribut');
		$nilai = $this->input->post('nilai');

		$data = [
			$atribut => $nilai
		];

		$this->db->where('id', 1);
		$this->db->update('tbkontrol', $data);

		$this->session->set_flashdata('flash-sukses', 'Sukses kontrol lampu');
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */