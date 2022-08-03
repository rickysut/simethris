<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Laporan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('pdf');
		$this->data['module'] = 'Laporan ';
		$this->data['company_data']    				= $this->Company_model->company_profile();
		$this->data['layout_template']    			= $this->Template_model->layout();
		$this->data['skins_template']     			= $this->Template_model->skins();
		$this->load->model('TransaksiModel');
		$this->load->model('r_verifikasi');
		$this->load->model('ChatModel');
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
		$this->data['url_cetak'] = base_url('/'.$url_cetak);
		//$this->data['url_cetak'] = base_url('/laporanpdf');
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

		$pdf = new FPDF('L','mm','Legal');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(325,7,'DAFTAR WAJIB TANAM BAWANG PUTIH OLEH IMPORTIR',0,1,'C');
        $pdf->Cell(325,7,'PER TANGGAL '.DATE('d-m-Y'),0,1,'C');
        //$pdf->SetFont('Arial','B',12);
        //$pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,6,'TGL',1,0,'C');
        $pdf->Cell(71,6,'NAMA PERUSAHAAN',1,0,'C');
        $pdf->Cell(51,6,'NAMA KONTAK',1,0,'C');
        $pdf->Cell(30,6,'HP KONTAK',1,0,'C');
		$pdf->Cell(30,6,'TLP PERUSAHAAN',1,0,'C');
		$pdf->Cell(20,6,'V. IMPORT',1,0,'C');
		$pdf->Cell(20,6,'B. TANAM',1,0,'C');
		$pdf->Cell(20,6,'R. TANAM',1,0,'C');
		$pdf->Cell(20,6,'SELISIH',1,0,'C');
		$pdf->Cell(20,6,'B. PRODUKSI',1,0,'C');
		$pdf->Cell(20,6,'R. PRODUKSI',1,0,'C');
		$pdf->Cell(20,6,'SELISIH',1,1,'C');
        $pdf->SetFont('Arial','',10);
        //$mahasiswa = $this->db->get('view_dashboard')->result();
        foreach ($transaksi as $row){
            $pdf->Cell(20,6,date('d-m-Y',strtotime($row->tgl_awal_riph)),1,0,'C');
            $pdf->Cell(71,6,$row->nama_perusahaan,1,0);
            $pdf->Cell(51,6,ucwords(strtolower($row->nama_kontak), " "),1,0);
            $pdf->Cell(30,6,$row->hp_kontak,1,0); 
			$pdf->Cell(30,6,$row->telp_perusahaan,1,0); 
			$pdf->Cell(20,6,$row->volume,1,0,'R'); 
			$pdf->Cell(20,6,$row->kewajiban_tanam,1,0,'R'); 
			$pdf->Cell(20,6,$row->luas_tanam,1,0,'R'); 
			$selisih1 = intval($row->luas_tanam)-intval($row->kewajiban_tanam);
			$pdf->Cell(20,6,$selisih1,1,0,'R'); 
			$pdf->Cell(20,6,$row->kewajiban_produksi,1,0,'R'); 
			$pdf->Cell(20,6,$row->jmlproduksi,1,0,'R'); 
			$selisih2 = intval($row->jmlproduksi)-intval($row->kewajiban_produksi);
			$pdf->Cell(20,6,$selisih2,1,1,'R'); 
        }
        $pdf->Output();
	}
}
