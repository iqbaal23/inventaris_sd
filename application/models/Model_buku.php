<?php

	class Model_buku extends CI_Model{
		public function getAllBuku()				
		{
			return $this->db->get('buku')->result_array();
		}

		public function getDistinctTahun()
		{
			return $this->db->distinct()->select('tahun')->order_by('tahun')->get('buku')->result_array();
		}

		public function getExport($tahun, $id_jenis_buku, $id_sumber_dana)
		{
			$this->db->select('*');
			$this->db->from('buku');
			if($tahun != 'semua'){
				$this->db->where('tahun', $tahun);
			}
			if($id_jenis_buku != 'semua'){
				$this->db->where('id_jenis_buku', $id_jenis_buku);
			}
			if($id_sumber_dana != 'semua'){
				$this->db->where('id_sumber_dana', $id_sumber_dana);
			}

			return $this->db->get()->result_array();
		}

		public function tambahDataBuku()
		{
			$data = [
				'nama_buku' => $this->input->post('judulBuku', true),
				'tahun' => $this->input->post('tahun', true),
				'id_jenis_buku' => $this->input->post('jenisbuku', true),
				'id_sumber_dana' => $this->input->post('sumberdana', true),
				'id_kelas' => $this->input->post('kelas', true),
				'jumlah_buku' => $this->input->post('jumlah', true)
			];

			$this->db->insert('buku', $data);
		}

		public function updateDataBuku()
		{
			$data = [
				'nama_buku' => $this->input->post('judulBuku', true),
				'tahun' => $this->input->post('tahun', true),
				'id_jenis_buku' => $this->input->post('jenisbuku', true),
				'id_sumber_dana' => $this->input->post('sumberdana', true),
				'id_kelas' => $this->input->post('kelas', true),
				'jumlah_buku' => $this->input->post('jumlah', true)
			];

			$id_buku = $this->input->post('idBuku', true);
			$this->db->where('id_buku', $id_buku);
			$this->db->update('buku', $data);
		}
	}

?>
