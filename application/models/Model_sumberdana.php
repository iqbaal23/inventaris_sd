<?php

	class Model_sumberdana extends CI_Model{
		public function getAllSumberDana()				
		{
			return $this->db->get('sumber_dana')->result_array();
		}
		
		public function getWhere($id_sumber_dana){
			return $this->db->get_where('sumber_dana', array('id_sumber_dana' => $id_sumber_dana))->result_array();
		}

		public function tambahDataSumberDana()
		{
			$data = [
				'nama_sumber_dana' => $this->input->post('nama_sumber_dana', true)
			];

			$this->db->insert('sumber_dana', $data);
		}

		public function updateDataSumberDana()
		{
			$data = [
				'nama_sumber_dana' => $this->input->post('nama_sumber_dana', true)
			];

			$id_sumber_dana = $this->input->post('idsumber_dana', true);
			$this->db->where('id_sumber_dana', $id_sumber_dana);
			$this->db->update('sumber_dana', $data);
		}
	}

?>
