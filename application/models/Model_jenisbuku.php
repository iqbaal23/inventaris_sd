<?php

	class Model_jenisbuku extends CI_Model{
		public function getAllJenisBuku()				
		{
			return $this->db->get('jenis_buku')->result_array();
		}

		public function getWhere($id_jenis_buku){
			return $this->db->get_where('jenis_buku', array('id_jenis_buku' => $id_jenis_buku))->result_array();
		}

		public function tambahDataJenisBuku()
		{
			$data = [
				'nama_jenis_buku' => $this->input->post('jenisBuku', true)
			];

			$this->db->insert('jenis_buku', $data);
		}

		public function updateDataJenisBuku()
		{
			$data = [
				'nama_jenis_buku' => $this->input->post('jenisBuku', true)
			];

			$id_jenis_buku = $this->input->post('idJenisBuku', true);
			$this->db->where('id_jenis_buku', $id_jenis_buku);
			$this->db->update('jenis_buku', $data);
		}
	}

?>
