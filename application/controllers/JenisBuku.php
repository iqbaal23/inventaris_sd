<?php

	class JenisBuku extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model('Model_jenisbuku');
		}

		function index()
		{
			$data['judul'] = 'Jenis Buku';
			$data['jenis_buku'] = $this->Model_jenisbuku->getAllJenisBuku();
			$this->load->view('templates/header', $data);
			$this->load->view('jenisbuku/index', $data);
			$this->load->view('templates/footer');

		}

		function create()
		{
			if(isset($_POST)){
				$this->Model_jenisbuku->tambahDataJenisBuku();
				redirect('jenisbuku/index');
			} else{
				echo "error";
			}
		}

		function update()
		{
			if(isset($_POST)){
				// print_r($_POST);
				// exit;
				$this->Model_jenisbuku->updateDataJenisBuku();
				redirect('jenisbuku/index');
			} else {
				echo "error";
				exit;
			}
		}

		function delete($id_jenis_buku)
		{
			if(!empty($id_jenis_buku)){
				$this->db->where('id_jenis_buku', $id_jenis_buku);
				$this->db->delete('jenis_buku');
			}
			redirect('jenisbuku/index');
		}
	}

?>
