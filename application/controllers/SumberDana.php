<?php

	class SumberDana extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model('Model_sumberdana');
		}

		function index()
		{
			$data['judul'] = 'Sumber Dana';
			$data['sumber_dana'] = $this->Model_sumberdana->getAllSumberDana();
			$this->load->view('templates/header', $data);
			$this->load->view('sumberdana/index', $data);
			$this->load->view('templates/footer');

		}

		function create()
		{
			if(isset($_POST)){
				$this->Model_sumberdana->tambahDataSumberDana();
				redirect('sumberdana/index');
			} else{
				echo "error";
			}
		}

		function update()
		{
			if(isset($_POST)){
				// print_r($_POST);
				// exit;
				$this->Model_sumberdana->updateDataSumberDana();
				redirect('sumberdana/index');
			} else {
				echo "error";
				exit;
			}
		}

		function delete($id_sumber_dana)
		{
			if(!empty($id_sumber_dana)){
				$this->db->where('id_sumber_dana', $id_sumber_dana);
				$this->db->delete('sumber_dana');
			}
			redirect('sumberdana/index');
		}
	}

?>
