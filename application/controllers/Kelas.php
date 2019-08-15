<?php

	class Kelas extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model('Model_kelas');
		}

		function index()
		{
			$data['judul'] = 'Sumber Dana';
			$data['kelas'] = $this->Model_kelas->getAllKelas();
			$this->load->view('templates/header', $data);
			$this->load->view('kelas/index', $data);
			$this->load->view('templates/footer');

		}

		function create()
		{
			if(isset($_POST)){
				$this->Model_kelas->tambahDataKelas();
				redirect('kelas/index');
			} else{
				echo "error";
			}
		}

		function update()
		{
			if(isset($_POST)){
				// print_r($_POST);
				// exit;
				$this->Model_kelas->updateDataKelas();
				redirect('kelas/index');
			} else {
				echo "error";
				exit;
			}
		}

		function delete($id_kelas)
		{
			if(!empty($id_kelas)){
				$this->db->where('id_kelas', $id_kelas);
				$this->db->delete('kelas');
			}
			redirect('kelas/index');
		}
	}

?>
