<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'vendor/autoload.php';
class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->data['module'] = 'Laporan ';
		$this->data['company_data']    				= $this->Company_model->company_profile();
		$this->data['layout_template']    			= $this->Template_model->layout();
		$this->data['skins_template']     			= $this->Template_model->skins();
		$this->load->model('TransaksiModel');
	}

	public function index(){
		is_login();
	    is_read();
		$this->data['page_title'] = $this->data['module'].' List';
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'laporan/cetak?filter=1&tanggal='.$tgl;
                $transaksi = $this->TransaksiModel->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'laporan/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->TransaksiModel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'laporan/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->TransaksiModel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'laporan/cetak';
            $transaksi = $this->TransaksiModel->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

		$this->data['ket'] = $ket;
		//$this->data['url_cetak'] = base_url('/'.$url_cetak);
		$this->data['url_cetak'] = base_url('/laporanpdf');
		$this->data['transaksi'] = $transaksi;
        $this->data['option_tahun'] = $this->TransaksiModel->option_tahun();
		$this->load->view('back/laporan/view', $this->data);
	}

	public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->TransaksiModel->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->TransaksiModel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Transaksi Tahun '.$tahun;
                $transaksi = $this->TransaksiModel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->TransaksiModel->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $this->data['ket'] = $ket;
        $this->data['transaksi'] = $transaksi;

		ob_start();
		$this->load->view('back/laporan/print', $this->data);
		$html = ob_get_contents();
        ob_end_clean();
		
		//$pdf = new ./vendor/spipu/html2pdf/src/Html2Pdf('P','A4','en');
		//$pdf->WriteHTML($html);
		//$pdf->Output('Data Transaksi.pdf', 'D');
	}
}
