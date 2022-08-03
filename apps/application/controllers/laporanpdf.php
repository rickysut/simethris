<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('L','mm','Legal');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(325,7,'DAFTAR WAJIB TANAM BAWANG PUTIH OLEH IMPORTIR',0,1,'C');
        //$pdf->SetFont('Arial','B',12);
        //$pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,6,'TGL',1,0,'C');
        $pdf->Cell(70,6,'NAMA PERUSAHAAN',1,0,'C');
        $pdf->Cell(45,6,'NAMA KONTAK',1,0,'C');
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
        $mahasiswa = $this->db->get('view_dashboard')->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(20,6,$row->tgl_awal_riph,1,0,'C');
            $pdf->Cell(70,6,$row->nama_perusahaan,1,0);
            $pdf->Cell(45,6,$row->nama_kontak,1,0);
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