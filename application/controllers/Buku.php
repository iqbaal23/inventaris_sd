<?php
	// Load library phpspreadsheet
	require('./excel/vendor/autoload.php');

	use PhpOffice\PhpSpreadsheet\Helper\Sample;
	use PhpOffice\PhpSpreadsheet\IOFactory;
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	// End load library phpspreadsheet

	class Buku extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model('Model_buku'); 
			$this->load->model('Model_sumberdana'); 
			$this->load->model('Model_jenisbuku'); 
			$this->load->model('Model_kelas'); 
		}

		function index()
		{
			$data['judul'] = 'Buku';
			$data['buku'] = $this->Model_buku->getAllBuku();
			$data['sumberdana'] = $this->Model_sumberdana->getAllSumberDana();
			$data['jenisbuku'] = $this->Model_jenisbuku->getAllJenisBuku();
			$data['kelas'] = $this->Model_kelas->getAllKelas();
			$this->load->view('templates/header', $data);
			$this->load->view('buku/index', $data);
			$this->load->view('templates/footer');

		}

		function create()
		{
			if(isset($_POST)){
				$this->Model_buku->tambahDataBuku();
				redirect('buku/index');
			} else{
				echo "error";
			}
		}

		function update()
		{
			if(isset($_POST)){
				// print_r($_POST);
				// exit;
				$this->Model_buku->updateDataBuku();
				redirect('buku/index');
			} else {
				echo "error";
				exit;
			}
		}

		function delete($id_buku)
		{
			if(!empty($id_buku)){
				$this->db->where('id_buku', $id_buku);
				$this->db->delete('buku');
			}
			redirect('buku/index');
		}

		function export()
		{
			if(isset($_POST['export'])){
				// $buku = $this->Model_buku->getAllBuku();
				$buku = $this->Model_buku->getExport($_POST['tahun'], $_POST['jenisbuku'], $_POST['sumberdana'], $_POST['kelas']);
				// $sumberdana = $this->Model_sumberdana->getAllSumberDana();
				// $jenisbuku = $this->Model_jenisbuku->getAllJenisBuku();
				// Create new Spreadsheet object
				$spreadsheet = new Spreadsheet();

				// Set document properties
				$spreadsheet->getProperties()->setCreator('Muhammad Iqbal - KKN UIN SUSKA 43')
				->setLastModifiedBy('Muhammad Iqbal - KKN UIN SUSKA 43')
				->setTitle('Office 2007 XLSX Test Document')
				->setSubject('Office 2007 XLSX Test Document')
				->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
				->setKeywords('office 2007 openxml php')
				->setCategory('Test result file');

				// Set Column Width
				$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
				$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
				$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

				// Add some data
				$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A1', 'No')
				->setCellValue('B1', 'NAMA BUKU')
				->setCellValue('C1', 'TAHUN')
				->setCellValue('D1', 'JENIS BUKU')
				->setCellValue('E1', 'SUMBER DANA')
				->setCellValue('F1', 'KELAS')
				->setCellValue('G1', 'JUMLAH')
				;

				// Miscellaneous glyphs, UTF-8
				$i=2; 
				$no=1;
				foreach($buku as $buku) {
					$jenisBuku = $this->Model_jenisbuku->getWhere($buku['id_jenis_buku']);
					if($jenisBuku == null){
						$jenisBuku[0]['nama_jenis_buku'] = "";
					}
					$sumberDana = $this->Model_sumberdana->getWhere($buku['id_sumber_dana']);
					if($sumberDana == null){
						$sumberDana[0]['nama_sumber_dana'] = "";
					}
					$kelas_relasi = $this->Model_kelas->getWhere($buku['id_kelas']);
					if($kelas_relasi == null){
						$kelas_relasi[0]['nama_kelas'] = "";
					}

					$spreadsheet->setActiveSheetIndex(0)
					->setCellValue('A'.$i, $no)
					->setCellValue('B'.$i, $buku['nama_buku'])
					->setCellValue('C'.$i, $buku['tahun'])
					->setCellValue('D'.$i, $jenisBuku[0]['nama_jenis_buku'])
					->setCellValue('E'.$i, $sumberDana[0]['nama_sumber_dana'])
					->setCellValue('F'.$i, $kelas_relasi[0]['nama_kelas'])
					->setCellValue('G'.$i, $buku['jumlah_buku']);
					$i++;
					$no++;
				}

				// Rename worksheet
				$spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));

				// Set active sheet index to the first sheet, so Excel opens this as the first sheet
				$spreadsheet->setActiveSheetIndex(0);

				// Redirect output to a client’s web browser (Xlsx)
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment;filename="Report Excel '.date("	d-m-Y H").'.xlsx"');
				header('Cache-Control: max-age=0');
				// If you're serving to IE 9, then the following may be needed
				header('Cache-Control: max-age=1');

				// If you're serving to IE over SSL, then the following may be needed
				header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
				header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
				header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
				header('Pragma: public'); // HTTP/1.0

				$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
				$writer->save('php://output');
				exit;
			} else {
				redirect('buku/index');
			}
		}
	}

?>
