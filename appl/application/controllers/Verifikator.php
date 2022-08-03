<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Verifikator extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Verifikasi';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	
	$this->data['btn_submit'] = 'Diterima';
    $this->data['btn_reset']  = 'Reset';
	$this->data['btn_back']    = 'Back To Verifikator';
	$this->load->model('m_wilayah');
	$this->load->model('r_verifikasi');
	$this->load->model('ChatModel');
	$this->load->model('cpcl_model');
	$this->load->model('realisasi_model');
	$this->load->model('produksi_model');
	$this->load->model('Ajuriph_model');
	$this->load->model('m_files');
	$this->data['back_action'] = base_url('verifikator');
  }

  function index()
  {
    is_login();
    is_read();
    $this->data['page_title'] = 'Daftar '.$this->data['module'].' Wajib Tanam';
    $this->data['get_all_cpcl_by_iduser'] = $this->cpcl_model->get_all_cpcl_by_iduserv();
	$this->data['get_all_r_verifikasi_by_cpcl'] = $this->r_verifikasi->get_all_r_verifikasi_by_jenis('PKS');
	$this->data['get_all_r_verifikasi_by_realisasi'] = $this->r_verifikasi->get_all_r_verifikasi_by_jenis('REALISASI');
	$this->data['get_all_r_verifikasi_by_produksi'] = $this->r_verifikasi->get_all_r_verifikasi_by_jenis('PRODUKSI');
	$this->data['get_jml_verifikasi']				= $this->r_verifikasi->get_jml_r_verifikasi();
	//$datacpcl = $this->r_verifikasi->get_all_r_verifikasi_by_jenis('PKS');
	$ajuVerif = $this->r_verifikasi->get_all_r_verifikasi_by_jenis('PKS');
	$mydatatable = array();
	$mynyoba = array();
	$DataTableKu="";
	$mydatakids = array();
	$ii=0;
	$ia=0;
	$ib=0;
	$myPKids=array();
	foreach($ajuVerif as $forPerusahaan){
		$myPerusahaan = $this->r_verifikasi->get_data_perusahaan($forPerusahaan->id_users);
		$myverif = $this->r_verifikasi->get_all_verifikasi_by_perusahaan($forPerusahaan->id_users);
		foreach($myverif as $VerifPerusahaan){
			if($VerifPerusahaan->is_verifikasi == '1'){$is_verifikasiper = json_encode('<button type="button" class="badge b-xs btn-success">verified <span class="badge">V</span></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
			else{$is_verifikasiper = json_encode('<button type="button" class="badge btn-xs btn-danger">Unverified <span class="badge">X</span></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
		}
		$verifikasiper = json_encode('<a href="'.base_url('verifikator/createverifikasi1/'.$forPerusahaan->id_users).'" data-toggle="tooltip" title="Verifikasi Data RIPH" class="badge btn-xs btn-warning"><i class="fa fa-pencil"></i></a>', JSON_HEX_TAG | JSON_HEX_AMP);
		$ia =0;$ii += 1;
		if($ii > 1){
			$DataTableKu .= ',{"data":{"Nama Perusahaan":"'.$myPerusahaan['nama_perusahaan'].'","Provinsi":"'.$myPerusahaan['nama_prov'].'","Kab/Kota":"'.$myPerusahaan['nama_kab'].'","Kecamatan":"'.$myPerusahaan['nama_kec'].'","Desa/Kel":"'.$myPerusahaan['nama_des'].'"}';
		}else{
			$DataTableKu .= '{"data":{"Nama Perusahaan":"'.$myPerusahaan['nama_perusahaan'].'","Provinsi":"'.$myPerusahaan['nama_prov'].'","Kab/Kota":"'.$myPerusahaan['nama_kab'].'","Kecamatan":"'.$myPerusahaan['nama_kec'].'","Desa/Kel":"'.$myPerusahaan['nama_des'].'"}';
		}
		$myriph = $this->Ajuriph_model->get_all_riph_dy_iduser($forPerusahaan->id_users);
		foreach($myriph as $forRIPH){
			$jbrealisasi = intval($forRIPH->kewajiban_tanam);$jbproduksi = intval($forRIPH->kewajiban_produksi);
			if(is_null($forRIPH->luas_tanam)){$jrealisasi = 0;}else{$jrealisasi = intval($forRIPH->luas_tanam);}
			if(is_null($forRIPH->jmlproduksi)){$jproduksi = 0;}else{$jproduksi = intval($forRIPH->jmlproduksi);}
			if(($jbrealisasi <= $jrealisasi) or ($jbproduksi <= $jproduksi)){
				$veriflunas = json_encode('<a href="'.base_url('verifikator/verifikasilunas/'.$forRIPH->id_mst_riph).'" data-toggle="tooltip" title="Verifikasi / Keterangan Lunas" class="badge btn-warning btn-fab btn-sm"><i class="fa fa-pencil"></i></a>', JSON_HEX_TAG | JSON_HEX_AMP);					
			}else{
				$veriflunas = json_encode('<a href="'.base_url('verifikator/verifikasilunas/'.$forRIPH->id_mst_riph).'" data-toggle="tooltip" title="Verifikasi / Keterangan Lunas" class="badge btn-warning btn-fab btn-sm disabled" role="button" aria-disabled="true"><i class="fa fa-pencil"></i></a>', JSON_HEX_TAG | JSON_HEX_AMP);
			}
			//$veriflunas = json_encode('<a href="'.base_url('verifikator/verifikasilunas/'.$forRIPH->id_mst_riph).'" data-toggle="tooltip" title="Verifikasi / Keterangan Lunas" class="badge btn-warning btn-fab btn-sm"><i class="icon-pencil-circle"></i></a>', JSON_HEX_TAG | JSON_HEX_AMP);					
			$DataTableKu .= ',"kids":[{"data":{"Nomor RIPH":"'.$forRIPH->nomor_riph.'","Mulai":"'.date('d-m-Y',strtotime($forRIPH->tgl_awal_riph)).'","Akhir":"'.date('d-m-Y',strtotime($forRIPH->tgl_akhir_riph)).'","V.Import":"'.$forRIPH->volume.'","B. Tanam":"'.$forRIPH->kewajiban_tanam.'","B. Produksi":"'.$forRIPH->kewajiban_produksi.'","Luas Tanam":"'.$forRIPH->luas_tanam.'","Jml Produksi":"'.$forRIPH->jmlproduksi.'","Action":'.$veriflunas.'}';
			// -- daftar PKS
			$myPKS = $this->r_verifikasi->get_all_cpcl_by_user($forPerusahaan->id_users);
			if($myPKS != null){
				$myidcpcl='';$number=0;$ia = 0;
				foreach($myPKS as $forPKS){
					$ib =0;
					if($forPKS->is_verifikasi == '1'){$is_verifikasi11 = json_encode('<button type="button" data-toggle="tooltip" title="PKS Verified" class="badge btn-success btn-fab btn-sm"><i class="fa fa-check"></i></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
					elseif($forPKS->is_verifikasi == '2'){$is_verifikasi11 = json_encode('<button type="button" data-toggle="tooltip" title="PKS Dikembalikan untuk Diperbaiki" class="badge btn-danger btn-fab btn-sm"><i class="fa fa-exclamation-circle"></i></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
					elseif($forPKS->is_verifikasi == '3'){$is_verifikasi11 = json_encode('<button type="button" data-toggle="tooltip" title="PKS Ditolak" class="badge btn-danger btn-fab btn-sm"><i class="fa fa-remove"></i></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
					else{$is_verifikasi11 = json_encode('<button type="button" data-toggle="tooltip" title="PKS Belum Diverifikasi" class="badge btn-info btn-fab btn-sm"><i class="fa fa-ban"></i></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
					
					$verifikasi11 = '<a href="'.base_url('verifikator/createverifikasi2/'.$forPKS->id_cpcl).'" data-toggle="tooltip" title="Verifikasi Langsung" class="badge btn-warning btn-fab btn-sm"><i class="fa fa-check"></i></a>';
					$lihatPKS = '<a href="'.base_url('verifikator/lihatcpcl/'.$forPKS->id_cpcl).'" data-toggle="tooltip" title="Lihat PKS Untuk Diverifikasi" class="badge btn-warning btn-fab btn-sm"><i class="fa fa-eye"></i></a>';
					$ActionPKS = $lihatPKS .$verifikasi11;
					$ActionPKShtml = json_encode($ActionPKS, JSON_HEX_TAG | JSON_HEX_AMP);
					
					if($ia > 0){
						$DataTableKu .= ',{"data":{"ID PKS":"'.$forPKS->id_cpcl.'","No PKS":"'.$forPKS->no_pks.'","Nama Pelaksana":"'.$forPKS->nama_pelaksana.'","Alamat":"Desa/Kel '.$forPKS->nama_des.' Kec. ' .$forPKS->nama_kec.' - '.$forPKS->nama_kab.'", "Status":'.$is_verifikasi11.', "Action":'.$ActionPKShtml.'},"kids":[';
					}
					else
					{
						$DataTableKu .= ',"kids":[{"data":{"ID PKS":"'.$forPKS->id_cpcl.'","No PKS":"'.$forPKS->no_pks.'","Nama Pelaksana":"'.$forPKS->nama_pelaksana.'","Alamat":"Desa/Kel '.$forPKS->nama_des.', Kec. ' .$forPKS->nama_kec.' - '.$forPKS->nama_kab.'", "Status":'.$is_verifikasi11.', "Action":'.$ActionPKShtml.'},"kids":[';
					}
					$ia += 1;
					$myidcpcl = $forPKS->id_cpcl;
					$myRealisasi = $this->r_verifikasi->get_all_realisasi_by_idcpcl($forPKS->id_cpcl);
					if($myRealisasi != null){
						foreach ($myRealisasi as $forRealisasi){
							if($forRealisasi->is_verifikasi == '1'){$is_verifikasi_r = json_encode('<button type="button" data-toggle="tooltip" title="Realisasi Verified" class="badge btn-success btn-fab btn-sm"><i class="fa fa-check"></i></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
							elseif($forRealisasi->is_verifikasi == '2'){$is_verifikasi_r = json_encode('<button type="button" data-toggle="tooltip" title="Data Realisasi dikembalikan untuk perbaikan" class="badge btn-warning btn-fab btn-sm"><i class="fa fa-exclamation-circle"></i></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
							elseif($forRealisasi->is_verifikasi == '3'){$is_verifikasi_r = json_encode('<button type="button" data-toggle="tooltip" title="Data Realisasi ditolak untuk perbaikan" class="badge btn-danger btn-fab btn-sm"><i class="fa fa-remove"></i></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
							else{$is_verifikasi_r = json_encode('<button type="button" data-toggle="tooltip" title="Realisasi Belum Diverifikasi" class="badge btn-info btn-fab btn-sm"><i class="fa fa-ban"></i></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
							$clihat_r = '<a href="'.base_url('verifikator/lihatrealisasi/'.$forRealisasi->id_realisasi).'" data-toggle="tooltip" title="Lihat Untuk Diverifikasi" class="badge btn-warning btn-fab btn-sm"><i class="fa fa-eye"></i></a>';
							$cverifikasi_r = '<a href="'.base_url('verifikator/createverifikasi3/'.$forRealisasi->id_realisasi).'" data-toggle="tooltip" title="Verifikasi Langsung" class="badge btn-warning btn-fab btn-sm"><i class="fa fa-check"></i></a>';
							$caction = $clihat_r . $cverifikasi_r;
							$isactionr = json_encode($caction, JSON_HEX_TAG | JSON_HEX_AMP);
							
							if($ib > 0){
								$DataTableKu .= ',{"data":{"Nama Pelaksana":"'.$forRealisasi->nama_pelaksana.'","Nama Petani":"'.$forRealisasi->nama_petugas.'","Alamat":"'.$forRealisasi->address.'","TGL Realisasi":"'.$forRealisasi->tgl_realisasi_tanam.'","Luas":"'.$forRealisasi->luas_realisasi_tanam.'","Status":'.$is_verifikasi_r.', "Action":'.$isactionr.'}';
							}
							else{
								$DataTableKu .= '{"data":{"Nama Pelaksana":"'.$forRealisasi->nama_pelaksana.'","Nama Petani":"'.$forRealisasi->nama_petugas.'","Alamat":"'.$forRealisasi->address.'","TGL Realisasi":"'.$forRealisasi->tgl_realisasi_tanam.'","Luas":"'.$forRealisasi->luas_realisasi_tanam.'","Status":'.$is_verifikasi_r.', "Action":'.$isactionr.'}';
							}
							$ib += 1;$ip=0;
							$myProduksi=$this->r_verifikasi->get_all_produksi_by_idrealisasi($forRealisasi->id_realisasi);
							if($myProduksi != null){
								foreach($myProduksi as $forProduksi){
									if($forProduksi->is_verifikasi == '1'){$is_verifikasi_p = '<button type="button" data-toggle="tooltip" title="Produski Sudah Diverifikasi" class="badge btn-success btn-fab btn-sm"><i class="fa fa-check"></i></button>';}
									elseif($forProduksi->is_verifikasi == '2'){$is_verifikasi_p = json_encode('<button type="button" data-toggle="tooltip" title="Data Produksi dikembalikan untuk perbaikan" class="badge btn-warning btn-fab btn-sm"><i class="fa fa-exclamation-circle"></i></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
									elseif($forProduksi->is_verifikasi == '3'){$is_verifikasi_p = json_encode('<button type="button" data-toggle="tooltip" title="Produksi Sudah Diverifikasi Status Ditolak" class="badge btn-danger btn-fab btn-sm"><i class="fa fa-ban"></i></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
									else{$is_verifikasi_p = '<button type="button" data-toggle="tooltip" title="Produksi Belum Diverifikasi" class="badge btn-info btn-fab btn-sm"><i class="fa fa-ban"></i></button>';}
									$lihat_p = '<a href="'.base_url('verifikator/lihatproduksi/'.$forProduksi->id_produksi).'" data-toggle="tooltip" title="Lihat Untuk Diverifikasi" class="badge btn-warning btn-fab btn-sm"><i class="fa fa-eye"></i></a>';
									$verifikasi_p = '<a href="'.base_url('verifikator/createverifikasi4/'.$forProduksi->id_produksi).'" data-toggle="tooltip" title="Verifikasi Langsung" class="badge btn-danger btn-fab btn-sm"><i class="fa fa-check"></i></a>';
									$is_verifikasi_pro = json_encode($is_verifikasi_p, JSON_HEX_TAG | JSON_HEX_AMP);
									$is_action = $lihat_p .$verifikasi_p;
									$is_actionp = json_encode($is_action, JSON_HEX_TAG | JSON_HEX_AMP);
									if($ip > 0){
										$DataTableKu .= ',{"data":{"Nama Pelaksana":"'.$forProduksi->nama_pelaksana.'","Nama Petani":"'.$forProduksi->nama_petugas.'","Alamat":"'.$forRealisasi->address.'","TGL Produksi":"'.$forProduksi->tgl_produksi.'","Jumlah":"'.$forProduksi->jml_produksi.'","Status":'.$is_verifikasi_pro.',"Action":'.$is_actionp.'},"kids":[]}]}';
									}
									else{
										$DataTableKu .= ',"kids":[{"data":{"Nama Pelaksana":"'.$forProduksi->nama_pelaksana.'","Nama Petani":"'.$forProduksi->nama_petugas.'","Alamat":"'.$forRealisasi->address.'","TGL Produksi":"'.$forProduksi->tgl_produksi.'","Jumlah":"'.$forProduksi->jml_produksi.'","Status":'.$is_verifikasi_pro.',"Action":'.$is_actionp.'},"kids":[]}';
									}
									$ip += 1;
								}
								if($ip==1){$DataTableKu .= ']}';}
							}
							else
							{
								$DataTableKu .= ',"kids":[]}';
								//$ib = 0;
							}
							//$DataTableKu .= ']}';
						}
					}
					else
					{
						//$DataTableKu .= ']}';
					}
				$DataTableKu .= ']}';
				}
			}
			else
			{
				$DataTableKu .= ',{"data":{"Nama Perusahaan":"'.$myPerusahaan['nama_perusahaan'].'","Provinsi":"'.$myPerusahaan['nama_prov'].'","Kabupaten":"'.$myPerusahaan['nama_kab'].'","Kecamatan":"'.$myPerusahaan['nama_kec'].'","Desa":"'.$myPerusahaan['nama_des'].'","Status":'.$is_verifikasiper.'},"kids":[]},';
			}
			$DataTableKu .= ']}';
		}
		$DataTableKu .= ']}';
	}
	//$DataTableKu .= ']}';
	$this->data['data_for_table'] = $DataTableKu;
    $this->load->view('back/verifikator/verifikator_list', $this->data);	
  }
	
//new way ->

function lihatcpcl_new($id)
  {
	is_login();
    is_update();

    $this->data['user']     = $this->cpcl_model->get_all_cpcl_by_idcpclv($id);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Lihat CPCL / PKS';
      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
	  $this->data['get_jml_verifikasi'] = $this->r_verifikasi->get_jml_r_verifikasi();
	  $this->data['get_all_marker_cpcl'] = $this->cpcl_model->get_all_marker_cpcl($id);
	  $this->data['btn_submit'] = 'Simpan';
	  $this->data['btn_cancel'] = 'Batal';
	  $this->data['action'] = 'verifikator/verifikasi_l1_action';
	  
		$this->data['id_mst_riph'] = [
			'name'          => 'id_mst_riph',
			'id'            => 'id_mst_riph',
			'class'         => 'form-control',
			'autocomplete'  => 'off',
			'type'  => 'hidden',
		];
		$this->data['id_cpcl'] = [
			'name'          => 'id_cpcl',
			'id'            => 'id_cpcl',
			'class'         => 'form-control',
			'autocomplete'  => 'off',
		];
		$this->data['id_users'] = [
			'name'          => 'id_users',
			'id'            => 'id_users',
			'class'         => 'form-control',
			'type'          => 'hidden',
		];	
		
		$this->data['name'] = [
			'name'          => 'name',
			'id'            => 'name',
			'class'         => 'form-control',
			'type'          => 'hidden',
		];	
		$this->data['no_pks'] = [
			'name'          => 'no_pks',
			'id'            => 'no_pks',
			'class'         => 'form-control',
			'autocomplete'  => 'off',
			'readonly'		=> '',
		];	
		$this->data['nama_perusahaan'] = [
			'name'          => 'nama_perusahaan',
			'id'            => 'nama_perusahaan',
			'class'         => 'form-control',
			'autocomplete'  => 'off',
			'readonly'		=> '',
		];
		$this->data['type_pelaksana'] = [
		  'name'          => 'type_pelaksana',
		  'id'            => 'type_pelaksana',
		  'class'         => 'form-control',
		];
		$this->data['type_pelaksana_value'] = [
		  '1'             => 'Kemitraan',
		  '2'             => 'Swakelola',
		];	
		$this->data['nama_pelaksana'] = [
		  'name'          => 'nama_pelaksana',
		  'id'            => 'nama_pelaksana',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['varietas'] = [
		  'name'          => 'varietas',
		  'id'            => 'varietas',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['tgl_rencana_tanam'] = [
		  'name'          => 'tgl_rencana_tanam',
		  'id'            => 'tgl_rencana_tanam',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['luas_rencana_tanam'] = [
		  'name'          => 'luas_rencana_tanam',
		  'id'            => 'luas_rencana_tanam',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['provinsi'] = [
		  'name'          => 'provinsi',
		  'id'            => 'provinsi',
		  'class'         => 'form-control',
		  'required'      => '',
		];
		$this->data['kabupaten'] = [
		  'name'          => 'kabupaten',
		  'id'            => 'kabupaten',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['kecamatan'] = [
		  'name'          => 'kecamatan',
		  'id'            => 'kecamatan',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['desa'] = [
		  'name'          => 'desa',
		  'id'            => 'desa`',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['address'] = [
		  'name'          => 'address',
		  'id'            => 'address',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'rows'           => '3',
		];
		$this->data['status_lahan'] = [
		  'name'          => 'status_lahan',
		  'id'            => 'status_lahan',
		  'class'         => 'form-control',
		];
		$this->data['status_lahan_value'] = [
		  'Hak Milik'     => 'Hak Milik',
		  'Sewa'          => 'Sewa',
		];
		$this->data['luas_lahan'] = [
		  'name'          => 'luas_lahan',
		  'id'            => 'luas_lahan',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'required'      => '',
		];
		$this->data['kontur_lahan'] = [
		  'name'          => 'kontur_lahan',
		  'id'            => 'kontur_lahan',
		  'class'         => 'form-control',
		];
		$this->data['kontur_lahan_value'] = [
		  '1'             => 'Datar',
		  '2'             => 'Miring',
		];
		$this->data['atitude'] = [
		  'name'          => 'atitude',
		  'id'            => 'atitude',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'required'      => '',
		];
		$this->data['latitude'] = [
		  'name'          => 'latitude',
		  'id'            => 'latitude',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'required'      => '',
		];
		$this->data['lampiran'] = [
		  'name'          => 'lampiran',
		  'id'            => 'lampiran',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'required'      => '',
		];
		$this->data['point'] = [
		  'name'          => 'point',
		  'id'            => 'point',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'required'      => '',
		];
		$this->data['id_r_verifikasi'] = [
		  'name'          => 'id_r_verifikasi',
		  'id'            => 'id_r_verifikasi',
		  'class'         => 'form-control',
		  'type'          => 'hidden',
		  'autocomplete'  => 'off',
		];
		$this->data['is_verifikasi_1'] = [
		  'name'          => 'is_verifikasi_1',
		  'id'            => 'is_verifikasi_1',
		  'class'         => 'form-control',
		];
		$this->data['is_verifikasi_1_value'] = [
		  '1'             => 'Diterima',
		  '2'             => 'Pending',
		  '3'             => 'Ditolak',
		];	
		$this->data['jenis_verifikasi_1'] = [
		  'name'          => 'jenis_verifikasi_1',
		  'id'            => 'jenis_verifikasi_1',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['id_verifikasi_1'] = [
		  'name'          => 'id_verifikasi_1',
		  'id'            => 'id_verifikasi_1',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['keterangan_1'] = [
		  'name'          => 'keterangan_1',
		  'id'            => 'keterangan_1',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'rows'           => '3',
		];

      $this->load->view('back/verifikator/cpcl_lihat_new', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Tidak Ditemukan</div>');
      redirect('verifikator');
    }
  }	
//new way <-
	
  function lihatcpcl($id)
  {
	is_login();
    is_update();

    
	
	$this->data['user']     = $this->cpcl_model->get_all_cpcl_by_idcpclv($id);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Verifikasi Data PKS';
      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
	  $this->data['get_jml_verifikasi'] = $this->r_verifikasi->get_jml_r_verifikasi();
	  $this->data['get_all_marker_cpcl'] = $this->cpcl_model->get_all_marker_cpcl($id);
	  $this->data['btn_submit'] = 'Simpan';
	  $this->data['btn_cancel'] = 'Batal';
	  $this->data['action'] = 'verifikator/verifikasi_l1_action';
	  
		$this->data['id_mst_riph'] = [
			'name'          => 'id_mst_riph',
			'id'            => 'id_mst_riph',
			'class'         => 'form-control',
			'autocomplete'  => 'off',
			'type'  => 'hidden',
		];
		
		//data riph
		
		
		//end data riph
		
		$this->data['id_cpcl'] = [
			'name'          => 'id_cpcl',
			'id'            => 'id_cpcl',
			'class'         => 'form-control',
			'autocomplete'  => 'off',
		];
		$this->data['id_users'] = [
			'name'          => 'id_users',
			'id'            => 'id_users',
			'class'         => 'form-control',
			'type'          => 'hidden',
		];	
		
		$this->data['name'] = [
			'name'          => 'name',
			'id'            => 'name',
			'class'         => 'form-control',
			'type'          => 'hidden',
		];	
		$this->data['no_pks'] = [
			'name'          => 'no_pks',
			'id'            => 'no_pks',
			'class'         => 'form-control bg-white',
			'autocomplete'  => 'off',
			'readonly'		=> '',
		];	
		$this->data['nama_perusahaan'] = [
			'name'          => 'nama_perusahaan',
			'id'            => 'nama_perusahaan',
			'class'         => 'form-control bg-white',
			'autocomplete'  => 'off',
			'readonly'		=> '',
		];
		$this->data['type_pelaksana'] = [
		  'name'          => 'type_pelaksana',
		  'id'            => 'type_pelaksana',
		  'class'         => 'form-control bg-white',
		  'disabled'	  => '',
		];
		$this->data['type_pelaksana_value'] = [
		  '1'             => 'Kemitraan',
		  '2'             => 'Swakelola',
		];	
		$this->data['nama_pelaksana'] = [
		  'name'          => 'nama_pelaksana',
		  'id'            => 'nama_pelaksana',
		  'class'         => 'form-control bg-white',
		  'readonly'	  => '',
		  'autocomplete'  => 'off',
		];
		$this->data['varietas'] = [
		  'name'          => 'varietas',
		  'id'            => 'varietas',
		  'class'         => 'form-control bg-white',
		  'readonly'	  => '',
		  'autocomplete'  => 'off',
		];
		$this->data['tgl_rencana_tanam'] = [
		  'name'          => 'tgl_rencana_tanam',
		  'id'            => 'tgl_rencana_tanam',
		  'class'         => 'form-control bg-white',
		  'readonly'	  => '',
		  'autocomplete'  => 'off',
		];
		//tanggal perjanjian
		$this->data['tgl_awal_perjanjian'] = [
		  'name'          => 'tgl_awal_perjanjian',
		  'id'            => 'tgl_awal_perjanjian',
		  'class'         => 'form-control bg-white',
		  'readonly'	  => '',
		  'autocomplete'  => 'off',
		];
		$this->data['tgl_akhir_perjanjian'] = [
		  'name'          => 'tgl_akhir_perjanjian',
		  'id'            => 'tgl_akhir_perjanjian',
		  'class'         => 'form-control bg-white',
		  'readonly'	  => '',
		  'autocomplete'  => 'off',
		];
		//end tanggal perjanjian
		$this->data['luas_rencana_tanam'] = [
		  'name'          => 'luas_rencana_tanam',
		  'id'            => 'luas_rencana_tanam',
		  'class'         => 'form-control bg-white',
		  'readonly'	  => '',
		  'autocomplete'  => 'off',
		];
		$this->data['rencana_produksi'] = [
		  'name'          => 'rencana_produksi',
		  'id'            => 'rencana_produksi',
		  'class'         => 'form-control bg-white',
		  'readonly'	  => '',
		  'autocomplete'  => 'off',
		];
		$this->data['provinsi'] = [
		  'name'          => 'provinsi',
		  'id'            => 'provinsi',
		  'class'         => 'form-control bg-white',
		  'disabled'	  => '',
		  'required'      => '',
		];
		$this->data['kabupaten'] = [
		  'name'          => 'kabupaten',
		  'id'            => 'kabupaten',
		  'class'         => 'form-control bg-white',
		  'disabled'	  => '',
		  'autocomplete'  => 'off',
		];
		$this->data['kecamatan'] = [
		  'name'          => 'kecamatan',
		  'id'            => 'kecamatan',
		  'class'         => 'form-control bg-white',
		  'disabled'	  => '',
		  'autocomplete'  => 'off',
		];
		$this->data['desa'] = [
		  'name'          => 'desa',
		  'id'            => 'desa`',
		  'class'         => 'form-control bg-white',
		  'disabled'	  => '',
		  'autocomplete'  => 'off',
		];
		$this->data['address'] = [
		  'name'          => 'address',
		  'id'            => 'address',
		  'class'         => 'form-control bg-white',
		  'readonly'	  => '',
		  'autocomplete'  => 'off',
		  'rows'           => '3',
		];
		$this->data['status_lahan'] = [
		  'name'          => 'status_lahan',
		  'id'            => 'status_lahan',
		  'class'         => 'form-control bg-white',
		  'readonly'	  => '',
		];
		$this->data['status_lahan_value'] = [
		  'Hak Milik'     => 'Hak Milik',
		  'Sewa'          => 'Sewa',
		];
		$this->data['luas_lahan'] = [
		  'name'          => 'luas_lahan',
		  'id'            => 'luas_lahan',
		  'class'         => 'form-control bg-white',
		  'readonly'	  => '',
		  'autocomplete'  => 'off',
		  'required'      => '',
		];
		$this->data['kontur_lahan'] = [
		  'name'          => 'kontur_lahan',
		  'id'            => 'kontur_lahan',
		  'class'         => 'form-control bg-white',
		  'readonly'	  => '',
		];
		$this->data['kontur_lahan_value'] = [
		  '1'             => 'Datar',
		  '2'             => 'Miring',
		];
		$this->data['atitude'] = [
		  'name'          => 'atitude',
		  'id'            => 'atitude',
		  'class'         => 'form-control bg-white',
		  'readonly'	  => '',
		  'autocomplete'  => 'off',
		  'required'      => '',
		];
		$this->data['latitude'] = [
		  'name'          => 'latitude',
		  'id'            => 'latitude',
		  'class'         => 'form-control bg-white',
		  'readonly'	  => '',
		  'autocomplete'  => 'off',
		  'required'      => '',
		];
		$this->data['lampiran'] = [
		  'name'          => 'lampiran',
		  'id'            => 'lampiran',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'required'      => '',
		];
		$this->data['point'] = [
		  'name'          => 'point',
		  'id'            => 'point',
		  'class'         => 'form-control bg-white',
		  'readonly'	  => '',
		  'autocomplete'  => 'off',
		  'required'      => '',
		];
		$this->data['id_r_verifikasi'] = [
		  'name'          => 'id_r_verifikasi',
		  'id'            => 'id_r_verifikasi',
		  'class'         => 'form-control',
		  'type'          => 'hidden',
		  'autocomplete'  => 'off',
		];
		$this->data['is_verifikasi_1'] = [
		  'name'          => 'is_verifikasi_1',
		  'id'            => 'is_verifikasi_1',
		  'class'         => 'form-control',
		];
		$this->data['is_verifikasi_1_value'] = [
		  '1'             => 'Diterima',
		  '2'             => 'Pending',
		  '3'             => 'Ditolak',
		];	
		$this->data['jenis_verifikasi_1'] = [
		  'name'          => 'jenis_verifikasi_1',
		  'id'            => 'jenis_verifikasi_1',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['id_verifikasi_1'] = [
		  'name'          => 'id_verifikasi_1',
		  'id'            => 'id_verifikasi_1',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['keterangan_1'] = [
		  'name'          => 'keterangan_1',
		  'id'            => 'keterangan_1',
		  'class'         => 'form-control bg-white',
		  'readonly'	  => '',
		  'autocomplete'  => 'off',
		  'rows'           => '3',
		];

      $this->load->view('back/verifikator/cpcl_lihat', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Tidak Ditemukan</div>');
      redirect('verifikator');
    }
  }

  function lihatrealisasi($id)
  {
    is_login();
    is_update();
	$this->data['user'] 	= $this->realisasi_model->get_all_realisasi_by_vidrealisasi($id);
	$this->data['gallery'] = $this->m_files->getRows_verifikator($this->session->userdata('id_users'), $id);
    //$this->data['user']     = $this->Cpcl_model->get_all_cpcl_by_idcpcl($id);

    if($this->data['user'])
    {
	  //$namafile1 = 	
      $this->data['page_title'] = 'Update '.$this->data['module'];
      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
	  $this->data['get_jml_verifikasi'] = $this->r_verifikasi->get_jml_r_verifikasi();
	  $this->data['action'] = 'verifikator/verifikasi_l2_action';
      $this->data['id_cpcl'] = [
      'name'          => 'id_cpcl',
      'type'          => 'hidden',
    ];
	$this->data['id_users'] = [
      'name'          => 'id_users',
      'type'          => 'hidden',
    ];	
	$this->data['id_realisasi'] = [
      'name'          => 'id_realisasi',
      'type'          => 'hidden',
    ];	
	$this->data['name'] = [
		'name'          => 'name',
		'id'            => 'name',
		'class'         => 'form-control',
		'type'          => 'hidden',
	];	
    $this->data['nama_perusahaan'] = [
      'name'          => 'nama_perusahaan',
      'id'            => 'nama_perusahaan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['type_pelaksana'] = [
      'name'          => 'type_pelaksana',
      'id'            => 'type_pelaksana',
      'class'         => 'form-control',
    ];
    $this->data['type_pelaksana_value'] = [
      '1'             => 'Kemitraan',
      '2'             => 'Swakelola',
    ];	
    $this->data['nama_pelaksana'] = [
      'name'          => 'nama_pelaksana',
      'id'            => 'nama_pelaksana',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['varietas'] = [
      'name'          => 'varietas',
      'id'            => 'varietas',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['tgl_realisasi_tanam'] = [
      'name'          => 'tgl_realisasi_tanam',
      'id'            => 'tgl_realisasi_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['luas_realisasi_tanam'] = [
      'name'          => 'luas_realisasi_tanam',
      'id'            => 'luas_realisasi_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['provinsi'] = [
      'name'          => 'provinsi',
      'id'            => 'provinsi',
      'class'         => 'form-control',
      'required'      => '',
    ];
	$this->data['kabupaten'] = [
      'name'          => 'kabupaten',
      'id'            => 'kabupaten',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['kecamatan'] = [
      'name'          => 'kecamatan',
      'id'            => 'kecamatan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['desa'] = [
      'name'          => 'desa',
      'id'            => 'desa`',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
    $this->data['address'] = [
      'name'          => 'address',
      'id'            => 'address',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'rows'           => '3',
    ];
	$this->data['status_lahan'] = [
      'name'          => 'status_lahan',
      'id'            => 'status_lahan',
      'class'         => 'form-control',
    ];
    $this->data['status_lahan_value'] = [
      'Hak Milik'     => 'Hak Milik',
      'Sewa'          => 'Sewa',
	];
    $this->data['luas_lahan'] = [
      'name'          => 'luas_lahan',
      'id'            => 'luas_lahan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['kontur_lahan'] = [
      'name'          => 'kontur_lahan',
      'id'            => 'kontur_lahan',
      'class'         => 'form-control',
    ];
    $this->data['kontur_lahan_value'] = [
      '1'             => 'Datar',
      '2'             => 'Miring',
    ];
    $this->data['atitude'] = [
      'name'          => 'atitude',
      'id'            => 'atitude',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['latitude'] = [
      'name'          => 'latitude',
      'id'            => 'latitude',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['realisasi_polygon'] = [
      'name'          => 'realisasi_polygon',
      'id'            => 'realisasi_polygon',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
	];
		$this->data['id_r_verifikasi'] = [
		  'name'          => 'id_r_verifikasi',
		  'id'            => 'id_r_verifikasi',
		  'class'         => 'form-control',
		  'type'          => 'hidden',
		  'autocomplete'  => 'off',
		];
		$this->data['is_verifikasi_1'] = [
		  'name'          => 'is_verifikasi_1',
		  'id'            => 'is_verifikasi_1',
		  'class'         => 'form-control',
		];
		$this->data['is_verifikasi_1_value'] = [
		  '1'             => 'Diterima',
		  '2'             => 'Pending',
		  '3'             => 'Ditolak',
		];	
		$this->data['jenis_verifikasi_1'] = [
		  'name'          => 'jenis_verifikasi_1',
		  'id'            => 'jenis_verifikasi_1',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['id_verifikasi_1'] = [
		  'name'          => 'id_verifikasi_1',
		  'id'            => 'id_verifikasi_1',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['keterangan_1'] = [
		  'name'          => 'keterangan_1',
		  'id'            => 'keterangan_1',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'rows'           => '3',
		];
    $this->load->view('back/verifikator/realisasi_lihat', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect($this->data('verifikator'));
    }
  }

  function lihatproduksi($id)
  {
	  is_login();
    is_update();
	$this->data['user'] 	= $this->produksi_model->get_all_produksi_byid($id);
    //$this->data['user']     = $this->Cpcl_model->get_all_cpcl_by_idcpcl($id);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Lihat '.$this->data['module'];

      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
	  $this->data['get_jml_verifikasi'] = $this->r_verifikasi->get_jml_r_verifikasi();
	  $this->data['action'] = 'verifikator/verifikasi_l3_action';
	  $namafile2 = '_produksi_'.$id;
	  $this->data['gallery'] = $this->m_files->getRowsProduksi_verifikator($this->session->userdata('id_users'), $id);

      $this->data['id_cpcl'] = [
      'name'          => 'id_cpcl',
      'id'            => 'id_cpcl',
      'type'          => 'hidden',
    ];
	$this->data['id_users'] = [
      'name'          => 'id_users',
      'id'            => 'id_users',
      'type'          => 'hidden',
    ];	
	$this->data['id_realisasi'] = [
      'name'          => 'id_realisasi',
      'id'            => 'id_realisasi',
      'type'          => 'hidden',
    ];	
	
	$this->data['name'] = [
      'name'          => 'name',
      'id'            => 'name',
      'type'          => 'hidden',
    ];	
    $this->data['nama_perusahaan'] = [
      'name'          => 'nama_perusahaan',
      'id'            => 'nama_perusahaan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['type_pelaksana'] = [
      'name'          => 'type_pelaksana',
      'id'            => 'type_pelaksana',
      'class'         => 'form-control',
    ];
    $this->data['type_pelaksana_value'] = [
      '1'             => 'Kemitraan',
      '2'             => 'Swakelola',
    ];	
    $this->data['nama_pelaksana'] = [
      'name'          => 'nama_pelaksana',
      'id'            => 'nama_pelaksana',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['varietas'] = [
      'name'          => 'varietas',
      'id'            => 'varietas',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['tgl_produksi'] = [
      'name'          => 'tgl_produksi',
      'id'            => 'tgl_produksi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['luas_realisasi_tanam'] = [
      'name'          => 'luas_realisasi_tanam',
      'id'            => 'luas_realisasi_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['jml_produksi'] = [
      'name'          => 'jml_produksi',
      'id'            => 'jml_produksi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['provinsi'] = [
      'name'          => 'provinsi',
      'id'            => 'provinsi',
      'class'         => 'form-control',
      'required'      => '',
    ];
	$this->data['kabupaten'] = [
      'name'          => 'kabupaten',
      'id'            => 'kabupaten',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['kecamatan'] = [
      'name'          => 'kecamatan',
      'id'            => 'kecamatan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['desa'] = [
      'name'          => 'desa',
      'id'            => 'desa`',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
    $this->data['address'] = [
      'name'          => 'address',
      'id'            => 'address',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'rows'           => '3',
    ];
	$this->data['status_lahan'] = [
      'name'          => 'status_lahan',
      'id'            => 'status_lahan',
      'class'         => 'form-control',
    ];
    $this->data['status_lahan_value'] = [
      'Hak Milik'     => 'Hak Milik',
      'Sewa'          => 'Sewa',
	];
    $this->data['luas_lahan'] = [
      'name'          => 'luas_lahan',
      'id'            => 'luas_lahan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['kontur_lahan'] = [
      'name'          => 'kontur_lahan',
      'id'            => 'kontur_lahan',
      'class'         => 'form-control',
    ];
    $this->data['kontur_lahan_value'] = [
      '1'             => 'Datar',
      '2'             => 'Miring',
    ];
    $this->data['atitude'] = [
      'name'          => 'atitude',
      'id'            => 'atitude',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['latitude'] = [
      'name'          => 'latitude',
      'id'            => 'latitude',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['realisasi_polygon'] = [
      'name'          => 'realisasi_polygon',
      'id'            => 'realisasi_polygon',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
		$this->data['id_r_verifikasi'] = [
		  'name'          => 'id_r_verifikasi',
		  'id'            => 'id_r_verifikasi',
		  'class'         => 'form-control',
		  'type'          => 'hidden',
		  'autocomplete'  => 'off',
		];
		$this->data['is_verifikasi_1'] = [
		  'name'          => 'is_verifikasi_1',
		  'id'            => 'is_verifikasi_1',
		  'class'         => 'form-control',
		];
		$this->data['is_verifikasi_1_value'] = [
		  '1'             => 'Diterima',
		  '2'             => 'Pending',
		  '3'             => 'Ditolak',
		];	
		$this->data['jenis_verifikasi_1'] = [
		  'name'          => 'jenis_verifikasi_1',
		  'id'            => 'jenis_verifikasi_1',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['id_verifikasi_1'] = [
		  'name'          => 'id_verifikasi_1',
		  'id'            => 'id_verifikasi_1',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['keterangan_1'] = [
		  'name'          => 'keterangan_1',
		  'id'            => 'keterangan_1',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'rows'           => '3',
		];
    $this->load->view('back/verifikator/produksi_lihat', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('verifikator');
    }
  }
  
  function verifikasi_l1_action()
  {
	 is_login();
	
          $data = array(
            'id_users'        	=> $this->input->post('id_users'),
			'name'        		=> $this->input->post('name'),
            'nama_perusahaan'	=> $this->input->post('nama_perusahaan'),
            'jenis_verifikasi_1'=> "PKS",
            'id_verifikasi_1'   => $this->input->post('id_cpcl'),
			'is_verifikasi_1'   => $this->input->post('is_verifikasi_1'),
            'keterangan_1' 		=> $this->input->post('keterangan_1'),
            'verifikator_1'		=> $this->session->userdata('username'),
          );

        $this->r_verifikasi->insertv($data);
		if($this->input->post('is_verifikasi_1')=='3'){$updateajuverifikasi='0';}else{$updateajuverifikasi=1;}
        $this->db->select_max('id_verifikasi');
        $result = $this->db->get('verifikasi')->row_array();
		$this->r_verifikasi->update_pks($this->input->post('id_cpcl'), array('is_verifikasi'=>$this->input->post('is_verifikasi_1'),'verifikator'=>$this->session->userdata('username')));
		$this->cpcl_model->update($this->input->post('id_cpcl'), array('is_verifikasi'=>$this->input->post('is_verifikasi_1'),'is_aju_verifikasi'=>$updateajuverifikasi));
		
		$this->write_log();
    
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('verifikator');
      
  }
  
  function verifikasi_l2_action()
  {
	 is_login();
	
          $data = array(
            'id_users'        	=> $this->input->post('id_users'),
			'name'        		=> $this->input->post('name'),
            'nama_perusahaan'	=> $this->input->post('nama_perusahaan'),
            'jenis_verifikasi_1'=> "REALISASI",
            'id_verifikasi_1'   => $this->input->post('id_realisasi'),
			'is_verifikasi_1'   => $this->input->post('is_verifikasi_1'),
            'keterangan_1' 		=> $this->input->post('keterangan_1'),
            'verifikator_1'		=> $this->session->userdata('username'),
          );

        $this->r_verifikasi->insertv($data);

        $this->db->select_max('id_verifikasi');
        $result = $this->db->get('verifikasi')->row_array();
		$this->r_verifikasi->update_realisasi($this->input->post('id_realisasi'), array('is_verifikasi'=>$this->input->post('is_verifikasi_1'),'verifikator'=>$this->session->userdata('username')));
		$this->realisasi_model->update($this->input->post('id_realisasi'), array('is_verifikasi'=>$this->input->post('is_verifikasi_1')));
		
		$this->write_log();
    
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('verifikator');
      
  }
  
  function verifikasi_l3_action()
  {
	 is_login();
	
          $data = array(
            'id_users'        	=> $this->input->post('id_users'),
			'name'        		=> $this->input->post('name'),
            'nama_perusahaan'	=> $this->input->post('nama_perusahaan'),
            'jenis_verifikasi_1'=> "PRODUKSI",
            'id_verifikasi_1'   => $this->input->post('id_produksi'),
			'is_verifikasi_1'   => $this->input->post('is_verifikasi_1'),
            'keterangan_1' 		=> $this->input->post('keterangan_1'),
            'verifikator_1'		=> $this->session->userdata('username'),
          );

        $this->r_verifikasi->insertv($data);

        $this->db->select_max('id_verifikasi');
        $result = $this->db->get('verifikasi')->row_array();
		$this->r_verifikasi->update_produksi($this->input->post('id_produksi'), array('is_verifikasi'=>$this->input->post('is_verifikasi_1'),'verifikator'=>$this->session->userdata('username')));
		$this->produksi_model->update($this->input->post('id_produksi'), array('is_verifikasi'=>$this->input->post('is_verifikasi_1')));
		
		$this->write_log();
    
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('verifikator');
      
  }

  function verifikasilunas($id)
  {
	is_login();
    is_read();
	
	$this->data['user']     = $this->Ajuriph_model->get_by_id($id);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Verifikasi Lunas';
      $this->data['action']     = 'verifikator/verifikasilunas_action';

      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
    
		$this->data['id_mst_riph'] = [
		  'name'          => 'id_mst_riph',
		  'id'            => 'id_mst_riph',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'type'          => 'hidden',
		  'readonly'	  => '',
		];
		$this->data['nomor_riph'] = [
		  'name'          => 'nomor_riph',
		  'id'            => 'nomor_riph',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'readonly'	  => '',
		];
		$this->data['id_users'] = [
		  'name'          => 'id_users',
		  'id'            => 'id_users',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'type'          => 'hidden',
		  'readonly'	  => '',
		];
		$this->data['name'] = [
		  'name'          => 'name',
		  'id'            => 'name',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'readonly'	  => '',
		];
		$this->data['nama_perusahaan'] = [
		  'name'          => 'nama_perusahaan',
		  'id'            => 'nama_perusahaan',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'readonly'	  => '',
		];
		$this->data['jenis_riph'] = [
		  'name'          => 'jenisr_riph',
		  'id'            => 'jenisr_riph',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'value'         => 'Bawang Putih',
		  'readonly'	  => '',
		];
		$this->data['tgl_mulai_berlaku'] = [
		  'name'          => 'tgl_mulai_berlaku',
		  'id'            => 'tgl_mulai_berlaku',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'readonly'	  => '',
		];
		$this->data['tgl_akhir_berlaku'] = [
		  'name'          => 'tgl_akhir_berlaku',
		  'id'            => 'tgl_akhir_berlaku',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'readonly'	  => '',
		];
		$this->data['v_pengajuan_riph'] = [
		  'name'          => 'v_pengajuan_riph',
		  'id'            => 'v_pengajuan_riph',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'readonly'	  => '',
		];
		$this->data['beban_tanam'] = [
		  'name'          => 'beban_tanam',
		  'id'            => 'beban_tanam',
		  'class'         => 'form-control',
		  'required'      => '',
		  'readonly'	  => '',
		];
		$this->data['beban_produksi'] = [
		  'name'          => 'beban_produksi',
		  'id'            => 'beban_produksi',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'readonly'	  => '',
		];$this->data['id_r_verifikasi'] = [
		  'name'          => 'id_r_verifikasi',
		  'id'            => 'id_r_verifikasi',
		  'class'         => 'form-control',
		  'type'          => 'hidden',
		  'autocomplete'  => 'off',
		];
		$this->data['is_verifikasi_1'] = [
		  'name'          => 'is_verifikasi_1',
		  'id'            => 'is_verifikasi_1',
		  'class'         => 'form-control',
		];
		$this->data['is_verifikasi_1_value'] = [
		  '1'             => 'Diterima',
		  '2'             => 'Pending',
		  '3'             => 'Ditolak',
		];	
		$this->data['jenis_verifikasi_1'] = [
		  'name'          => 'jenis_verifikasi_1',
		  'id'            => 'jenis_verifikasi_1',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['id_verifikasi_1'] = [
		  'name'          => 'id_verifikasi_1',
		  'id'            => 'id_verifikasi_1',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['keterangan_1'] = [
		  'name'          => 'keterangan_1',
		  'id'            => 'keterangan_1',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'rows'           => '3',
		];
		$this->load->view('back/verifikator/verifikasilunas', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('verifikator');
    }
  }

  function verifikasilunas_action()
  {
	$this->form_validation->set_rules('is_verifikasi_1', 'Status Verifikasi', 'required');
	//$this->form_validation->set_rules('kontur_lahan', 'Kontur Lahan', 'required');

    $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->create();
    }
    else
    {		
		if($_FILES['file_riph']['error'] <> 4)
		{
			$nmfile = strtolower(url_title($this->input->post('id_users'))).'_RIPH_'.$this->input->post('id_mst_riph').'_'.date('YmdHis');

			$config['upload_path']      = './uploads/user/';
			$config['allowed_types']    = 'jpg|jpeg|png|pdf|doc|docx|bmp';
			$config['max_size']         = 2048; // 2Mb
			$config['file_name']        = $nmfile;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('bukti1'))
			{
			  $error = array('error' => $this->upload->display_errors());
			  $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

			 redirect('verifikator');
			}
			else
			{
			  $bukti1 = $this->upload->data();

			  $thumbnail                  = $config['file_name'];

			  $config['image_library']    = 'gd2';
			  $config['source_image']     = './uploads/user/'.$bukti1['file_name'].'';
			  $config['create_thumb']     = TRUE;
			  $config['maintain_ratio']   = TRUE;
			  $config['width']            = 250;
			  $config['height']           = 250;

			  $this->load->library('image_lib', $config);
			  $this->image_lib->resize();
			  // ----- simpan asal
			  $data = array(
				'id_users'        	=> $this->input->post('id_users'),
				'file_oleh'			=> $this->session->userdata('name'),
				'file_judul'		=> "Bukti Lunas RIPH ".$this->input->post('id_mst_riph'),
				'file_deskripsi'    => "Bukti Verifikasi dan Lunas RIPH ".$this->input->post('id_verifikasi_1')." Oleh Verifikator ".$this->session->userdata('username'),
				'file_data'         => $this->upload->data('file_name'),
				'file_thumb'    	=> $nmfile.'_thumb'.$this->upload->data('file_ext'),
			  );

			  $this->m_files->insert($data);
			}
		}
		 $data = array(
            'id_users'        	=> $this->input->post('id_users'),
			'name'        		=> $this->input->post('name'),
            'nama_perusahaan'	=> $this->input->post('nama_perusahaan'),
            'jenis_verifikasi_1'=> "RIPH",
            'id_verifikasi_1'   => $this->input->post('id_mst_riph'),
			'is_verifikasi_1'   => $this->input->post('is_verifikasi_1'),
            'keterangan_1' 		=> $this->input->post('keterangan_1'),
            'verifikator_1'		=> $this->session->userdata('username'),
          );

        $this->r_verifikasi->insertv($data);

        $this->db->select_max('id_verifikasi');
        $result = $this->db->get('verifikasi')->row_array();
		$this->r_verifikasi->update($this->input->post('id_r_verifikasi'), array('is_verifikasi'=>'1','verifikator'=>$this->session->userdata('username')));
		$this->cpcl_model->update($this->input->post('id_verifikasi_1'), array('is_verifikasi'=>'1'));
		$this->cpcl_model->updateall($this->input->post('id_users'), array('is_verifikasi'=>'1'));
		$this->realisasi_model->updateall($this->input->post('id_users'), array('is_verifikasi'=>'1'));
		$this->produksi_model->updateall($this->input->post('id_users'), array('is_verifikasi'=>'1'));
		$this->r_verifikasi->updateall($this->input->post('id_users'), array('is_verifikasi'=>'1'));
		$this->write_log();
    
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('verifikator');
      }
    }
	
  function createverifikasi2($id)
  {
    is_login();
	$iduser='';$namaPers='';$nameLO='';
	$query = $this->db->get_where('cpcl',array('id_cpcl'=>$id));
	foreach ($query->result() as $value){
		$iduser = $value->id_users;
		$namaPers = $value->nama_perusahaan;
	}
	$query = $this->db->get_where('users',array('id_users'=>$iduser));
	foreach ($query->result() as $value){
		$nameLO = $value->id_users;
	}
	$data = array(
        'id_users'        	=> $iduser,
		'name'        		=> $nameLO,
        'nama_perusahaan'	=> $namaPers,
        'jenis_verifikasi_1'=> "PKS",
        'id_verifikasi_1'   => $id,
		'is_verifikasi_1'   => 1,
        'keterangan_1' 		=> "Diterima Langsung",
        'verifikator_1'		=> $this->session->userdata('username'),
    );

    $this->r_verifikasi->insertv($data);

    $this->db->select_max('id_verifikasi');
	$result = $this->db->get('verifikasi')->row_array();
	$this->r_verifikasi->update_pks($id, array('is_verifikasi'=>'1','verifikator'=>$this->session->userdata('username')));
	$this->cpcl_model->update($id, array('is_verifikasi'=>'1'));
	$this->write_log();
    
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil di Verifikasi</div>');
    redirect('verifikator');
  }

  function createverifikasi3($id)
  {
    is_login();
	$query = $this->db->get_where('realisasi',array('id_realisasi'=>$id));
	foreach ($query->result() as $value) {
		$iduser = $value->id_users;
	}
	$query = $this->db->get_where('users',array('id_users'=>$iduser));
	foreach ($query->result() as $value) {
		$nameLO = $value->id_users;
		$namaPers = $value->nama_perusahaan;
	}
	$data = array(
        'id_users'        	=> $iduser,
		'name'        		=> $nameLO,
        'nama_perusahaan'	=> $namaPers,
        'jenis_verifikasi_1'=> "REALISASI",
        'id_verifikasi_1'   => $id,
		'is_verifikasi_1'   => 1,
        'keterangan_1' 		=> "Diterima Langsung",
        'verifikator_1'		=> $this->session->userdata('username'),
    );

    $this->r_verifikasi->insertv($data);

    $this->db->select_max('id_verifikasi');
	$result = $this->db->get('verifikasi')->row_array();
    $this->r_verifikasi->update_realisasi($id, array('is_verifikasi'=>'1','verifikator'=>$this->session->userdata('username')));
	$this->realisasi_model->update($id, array('is_verifikasi'=>'1'));
	$this->write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil di Verifikasi</div>');
    redirect('verifikator');
  }
  
  function createverifikasi4($id)
  {
    is_login();
	$query = $this->db->get_where('produksi',array('id_produksi'=>$id));
	foreach ($query->result() as $value) {
		$iduser = $value->id_users;
	}
	$query = $this->db->get_where('users',array('id_users'=>$iduser));
	foreach ($query->result() as $value) {
		$nameLO = $value->id_users;
		$namaPers = $value->nama_perusahaan;
	}
	$data = array(
        'id_users'        	=> $iduser,
		'name'        		=> $nameLO,
        'nama_perusahaan'	=> $namaPers,
        'jenis_verifikasi_1'=> "PRODUKSI",
        'id_verifikasi_1'   => $id,
		'is_verifikasi_1'   => 1,
        'keterangan_1' 		=> "Diterima Langsung",
        'verifikator_1'		=> $this->session->userdata('username'),
    );

    $this->r_verifikasi->insertv($data);

    $this->db->select_max('id_verifikasi');
	$result = $this->db->get('verifikasi')->row_array();
    $this->r_verifikasi->update_produksi($id, array('is_verifikasi'=>'1','verifikator'=>$this->session->userdata('username')));
	$this->produksi_model->update($id, array('is_verifikasi'=>'1'));
	$this->write_log();
    
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil di Verifikasi</div>');
    redirect('verifikator');
  }
  
  function verified($id)
  {
    is_login();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->Cpcl_model->update($this->uri->segment('3'), array('is_active'=>'1'));
	$this->write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data activate successfully</div>');
    redirect('verifikator');
  }

  function deverified($id)
  {
    is_login();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->Cpcl_model->update($this->uri->segment('3'), array('is_active'=>'0'));
	$this->write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data deactivate successfully</div>');
    redirect('verifikator');
  }
  
  function write_log()
  {
    $data = array(
      'content'    => $this->db->last_query(),
      'created_by' => $this->session->name,
      'ip_address' => $this->input->ip_address(),
      'user_agent' => $this->input->user_agent(),
    );

    $this->db->insert('log_queries', $data);
  }
  
  function add_ajax_kab($id_prov){
		    $query = $this->db->get_where('wilayah_kabupaten',array('provinsi_id'=>$id_prov));
		    $data = "<option value=''>- Select Kabupaten -</option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id."'>".$value->nama."</option>";
		    }
		    echo $data;
		}
		
		function add_ajax_kec($id_kab){
		    $query = $this->db->get_where('wilayah_kecamatan',array('kabupaten_id'=>$id_kab));
		    $data = "<option value=''> - Pilih Kecamatan - </option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id."'>".$value->nama."</option>";
		    }
		    echo $data;
		}
		
		function add_ajax_des($id_kec){
		    $query = $this->db->get_where('wilayah_desa',array('kecamatan_id'=>$id_kec));
		    $data = "<option value=''> - Pilih Desa - </option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id."'>".$value->nama."</option>";
		    }
		    echo $data;
		}
		
	function array_push_assoc($array, $key, $value){
	 $array[$key] = $value;
	 return $array;
	}
	
	public function get_total_unverifikasi(){
		$totalunverifikasi = $this->r_verifikasi->total_rows_unverif();
		$result['total'] = $totalunverifikasi;
		$result['msg'] = "User Mengajukan Verifikasi";
		echo json_encode($result);
		
	}
}
