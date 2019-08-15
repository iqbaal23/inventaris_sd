<?php

	class Home extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model('Model_buku');
		}

		function index()
		{
			$data['judul'] = 'Selamat Datang';
			$data['buku'] = $this->Model_buku->getAllBuku();
			$this->load->view('templates/header', $data);
			$this->load->view('home/index',$data);
			$this->load->view('templates/footer');
		}
	}

?>
