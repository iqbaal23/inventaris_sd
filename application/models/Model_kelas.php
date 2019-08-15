<?php

	class Model_kelas extends CI_Model{
		public function getAllKelas()				
		{
			return $this->db->get('kelas')->result_array();
		}
		
		public function getWhere($id_kelas){
			return $this->db->get_where('kelas', array('id_kelas' => $id_kelas))->result_array();
		}

		public function tambahDataKelas()
		{
			$data = [
				'nama_kelas' => $this->input->post('nama_kelas', true)
			];

			$this->db->insert('kelas', $data);
		}

		public function updateDataKelas()
		{
			$data = [
				'nama_kelas' => $this->input->post('nama_kelas', true)
			];

			$id_kelas = $this->input->post('idKelas', true);
			$this->db->where('id_kelas', $id_kelas);
			$this->db->update('kelas', $data);
		}
	}

?>
