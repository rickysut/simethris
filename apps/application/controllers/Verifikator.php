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

    $this->data['module'] = 'Verifikator';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();
	
	$this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
	$this->data['btn_back']    = 'Back To List';
	$this->load->model('m_wilayah');
	$this->load->model('r_verifikasi');
	$this->load->model('cpcl_model');
	$this->load->model('realisasi_model');
	$this->load->model('produksi_model');
	$this->load->model('m_files');
	$this->data['back_action'] = base_url('verifikator');
  }

  function index()
  {
    is_login();
    is_read();
    $this->data['page_title'] = $this->data['module'].' List';
    $this->data['get_all_cpcl_by_iduser'] = $this->Cpcl_model->get_all_cpcl_by_iduser();
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
			if($VerifPerusahaan->is_verifikasi == '1'){$is_verifikasiper = json_encode('<button type="button" class="btn btn-xs btn-success">verified <span class="badge">V</span></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
			else{$is_verifikasiper = json_encode('<button type="button" class="btn btn-xs btn-danger">Unverified <span class="badge">X</span></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
		}
		$verifikasiper = json_encode('<a href="'.base_url('verifikator/createverifikasi1/'.$forPerusahaan->id_users).'" data-toggle="tooltip" title="Verifikasi Perusahaan / Lunas" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>', JSON_HEX_TAG | JSON_HEX_AMP);
		$ia =0;
		$ii += 1;
		if($ii > 1){
			$DataTableKu .= ',{"data":{"Nama Perusahaan":"'.$myPerusahaan['nama_perusahaan'].'","Provinsi":"'.$myPerusahaan['nama_prov'].'","Kabupaten":"'.$myPerusahaan['nama_kab'].'","Kecamatan":"'.$myPerusahaan['nama_kec'].'","Desa":"'.$myPerusahaan['nama_des'].'","Status":'.$is_verifikasiper.',"Verifikasi":'.$verifikasiper.'}';
		}else{
			$DataTableKu .= '{"data":{"Nama Perusahaan":"'.$myPerusahaan['nama_perusahaan'].'","Provinsi":"'.$myPerusahaan['nama_prov'].'","Kabupaten":"'.$myPerusahaan['nama_kab'].'","Kecamatan":"'.$myPerusahaan['nama_kec'].'","Desa":"'.$myPerusahaan['nama_des'].'","Status":'.$is_verifikasiper.',"Verifikasi":'.$verifikasiper.'}';
		}
		$myPKS = $this->r_verifikasi->get_all_cpcl_by_user($forPerusahaan->id_users);
		if($myPKS != null){
			$myidcpcl='';$number=0;$ia = 0;
			foreach($myPKS as $forPKS){
				$ib =0;
				if($forPKS->is_verifikasi == '1'){$is_verifikasi11 = json_encode('<button type="button" class="btn btn-xs btn-success">verified <span class="badge">V</span></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
				else{$is_verifikasi11 = json_encode('<button type="button" class="btn btn-xs btn-danger">Unverified <span class="badge">X</span></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
				$verifikasi11 = json_encode('<a href="'.base_url('verifikator/createverifikasi4/'.$forPKS->id_cpcl).'" data-toggle="tooltip" title="Verifikasi PKS" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>', JSON_HEX_TAG | JSON_HEX_AMP);
				$lihatPKS = '<a href="'.base_url('verifikator/lihatcpcl/'.$forPKS->id_cpcl).'" data-toggle="tooltip" title="Lihat Data PKS" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>';
				$ia += 1;
				if($ia > 1){
					$DataTableKu .= ',{"data":{"ID PKS":"'.$forPKS->id_cpcl.'","Nama Pelaksana":"'.$forPKS->nama_pelaksana.'","Kabupaten":"'.$forPKS->nama_kab.'","Kecamatan":"'.$forPKS->nama_kec.'","Desa":"'.$forPKS->nama_des.'", "Status":'.$is_verifikasi11.', "Verifikasi":'.$verifikasi11.'},"kids":[';
				}
				else
				{
					$DataTableKu .= ',"kids":[{"data":{"ID PKS":"'.$forPKS->id_cpcl.'","Nama Pelaksana":"'.$forPKS->nama_pelaksana.'","Kabupaten":"'.$forPKS->nama_kab.'","Kecamatan":"'.$forPKS->nama_kec.'","Desa":"'.$forPKS->nama_des.'", "Status":'.$is_verifikasi11.', "Verifikasi":'.$verifikasi11.'},"kids":[';
				}
				$myidcpcl = $forPKS->id_cpcl;
				$myRealisasi = $this->r_verifikasi->get_all_realisasi_by_idcpcl($forPKS->id_cpcl);
				if($myRealisasi != null){
					foreach ($myRealisasi as $forRealisasi){
						if($forRealisasi->is_verifikasi == '1'){
							$is_verifikasi_r = json_encode('<button type="button" class="btn btn-xs btn-success">verified <span class="badge">V</span></button>', JSON_HEX_TAG | JSON_HEX_AMP);
						}
						else
						{
							$is_verifikasi_r = json_encode('<button type="button" class="btn btn-xs btn-danger">Unverified <span class="badge">X</span></button>', JSON_HEX_TAG | JSON_HEX_AMP);
						}
						$clihat_r = '<a href="'.base_url('verifikator/lihatrealisasi/'.$forRealisasi->id_realisasi).'" data-toggle="tooltip" title="Lihat Realisasi" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>';
						$cverifikasi_r = '<a href="'.base_url('verifikator/createverifikasi2/'.$forRealisasi->id_realisasi).'" data-toggle="tooltip" title="Verifikasi Realisasi Tanam" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>';
						$lihat_r = json_encode($clihat_r, JSON_HEX_TAG | JSON_HEX_AMP);
						$verifikasi_r = json_encode($cverifikasi_r, JSON_HEX_TAG | JSON_HEX_AMP);
						$ib += 1;
						if($ib > 1){
							$DataTableKu .= ',{"data":{"ID Realisasi":"'.$forRealisasi->id_realisasi.'","Nama Pelaksana":"'.$forRealisasi->nama_pelaksana.'","TGL Realisasi":"'.$forRealisasi->tgl_realisasi_tanam.'","Luas":"'.$forRealisasi->luas_realisasi_tanam.'","Status":'.$is_verifikasi_r.', "Lihat":'.$lihat_r.',"Verifikasi":'.$verifikasi_r.'}';
						}
						else{
							$DataTableKu .= '{"data":{"ID Realisasi":"'.$forRealisasi->id_realisasi.'","Nama Pelaksana":"'.$forRealisasi->nama_pelaksana.'","TGL Realisasi":"'.$forRealisasi->tgl_realisasi_tanam.'","Luas":"'.$forRealisasi->luas_realisasi_tanam.'","Status":'.$is_verifikasi_r.', "Lihat":'.$lihat_r.',"Verifikasi":'.$verifikasi_r.'}';
						}
						$myProduksi=$this->r_verifikasi->get_all_produksi_by_idrealisasi($forRealisasi->id_realisasi);
						if($myProduksi != null){
							foreach($myProduksi as $forProduksi){
								if($forProduksi->is_verifikasi == '1'){$is_verifikasi_p = '<button type="button" class="btn btn-xs btn-success">verified <span class="badge">V</span></button>';}
								else{$is_verifikasi_p = '<button type="button" class="btn btn-xs btn-danger">Unverified <span class="badge">X</span></button>';}
								$lihat_p = '<a href="'.base_url('verifikator/lihatproduksi/'.$forProduksi->id_produksi).'" data-toggle="tooltip" title="Lihat Produksi" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>';
								$lihat_pro = json_encode($lihat_p, JSON_HEX_TAG | JSON_HEX_AMP);
								$verifikasi_p = '<a href="'.base_url('verifikator/createverifikasi3/'.$forProduksi->id_produksi).'" data-toggle="tooltip" title="Verifikasi Produksi" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>';
								$verifikasi_pro = json_encode($verifikasi_p, JSON_HEX_TAG | JSON_HEX_AMP);
								$is_verifikasi_pro = json_encode($is_verifikasi_p, JSON_HEX_TAG | JSON_HEX_AMP);
								$DataTableKu .= ',"kids":[{"data":{"ID Produksi":"'.$forProduksi->id_produksi.'","Nama Pelaksana":"'.$forProduksi->nama_pelaksana.'","TGL Produksi":"'.$forProduksi->tgl_produksi.'","Jumlah":"'.$forProduksi->jml_produksi.'","Status":'.$is_verifikasi_pro.',"Lihat":'.$lihat_pro.',"Verifikasi":'.$verifikasi_pro.'},"kids":[]}]}';
							}
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
	//$DataTableKu .= ']}';
	$this->data['data_for_table'] = $DataTableKu;
    $this->load->view('back/verifikator/verifikator_list', $this->data);	
  }
	

  function lihatcpcl($id)
  {
	is_login();
    is_update();

    $this->data['user']     = $this->Cpcl_model->get_all_cpcl_by_idcpclv($id);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Lihat '.$this->data['module'];
      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
	  $this->data['get_all_combobox_kabupaten'] = $this->m_wilayah->get_all_kabupaten();
	  $this->data['get_all_combobox_kecamatan'] = $this->m_wilayah->get_all_kecamatan();
	  $this->data['get_all_combobox_desa'] = $this->m_wilayah->get_all_desa();
	  $this->data['get_jml_verifikasi'] = $this->r_verifikasi->get_jml_r_verifikasi();

      $this->data['id_cpcl'] = [
      'name'          => 'id_cpcl',
      'type'          => 'hidden',
    ];
	$this->data['id_users'] = [
      'name'          => 'id_users',
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

      $this->load->view('back/verifikator/cpcl_lihat', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('verifikator');
    }
  }

  function lihatrealisasi($id)
  {
    is_login();
    is_update();
	$this->data['user'] 	= $this->Realisasi_model->get_all_realisasi_by_vidrealisasi($id);
    //$this->data['user']     = $this->Cpcl_model->get_all_cpcl_by_idcpcl($id);

    if($this->data['user'])
    {
	  $namafile1 = 	
      $this->data['page_title'] = 'Update '.$this->data['module'];
      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
	  $this->data['get_all_combobox_kabupaten'] = $this->m_wilayah->get_all_kabupaten();
	  $this->data['get_all_combobox_kecamatan'] = $this->m_wilayah->get_all_kecamatan();
	  $this->data['get_all_combobox_desa'] = $this->m_wilayah->get_all_desa();
	  $this->data['get_jml_verifikasi'] = $this->r_verifikasi->get_jml_r_verifikasi();

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
	$namafile1 = '_realisasi_'.$id;
	$this->data['get_all_file_realisasi'] = $this->r_verifikasi->get_all_file_realisasi_by_id($namafile1);
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
	$this->data['user'] 	= $this->Produksi_model->get_all_produksi_byid($id);
    //$this->data['user']     = $this->Cpcl_model->get_all_cpcl_by_idcpcl($id);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Lihat '.$this->data['module'];

      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
	  $this->data['get_all_combobox_kabupaten'] = $this->m_wilayah->get_all_kabupaten();
	  $this->data['get_all_combobox_kecamatan'] = $this->m_wilayah->get_all_kecamatan();
	  $this->data['get_all_combobox_desa'] = $this->m_wilayah->get_all_desa();
	  $this->data['get_jml_verifikasi'] = $this->r_verifikasi->get_jml_r_verifikasi();

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
	$namafile2 = '_produksi_'.$id;
	$this->data['get_all_file_produksi'] = $this->r_verifikasi->get_all_file_produksi_by_id($namafile2);
      $this->load->view('back/verifikator/produksi_lihat', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('verifikator');
    }
  }
  
  function createverifikasi1($id)
  {
    is_login();
    is_create();
	$this->data['user'] 	= $this->r_verifikasi->get_all_r_verifikasi_by_idr($id);
	if($this->data['user'])
	{
	$this->data['page_title'] = 'Verifikasi L-1 | '.$this->data['module'];
    $this->data['action']     = 'verifikator/createverifikasi1_action';
	
    $this->data['id_r_verifikasi'] = [
      'name'          => 'id_r_verifikasi',
      'id'            => 'id_r_verifikasi',
      'class'         => 'form-control',
	  'type'          => 'hidden',
      'autocomplete'  => 'off',
    ];
	$this->data['id_users'] = [
      'name'          => 'id_users',
      'id'            => 'id_users',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['name'] = [
      'name'          => 'name',
      'id'            => 'name',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];	
    $this->data['nama_perusahaan'] = [
      'name'          => 'nama_perusahaan',
      'id'            => 'nama_perusahaan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['is_verifikasi_1'] = [
      'name'          => 'is_verifikasi_1',
      'id'            => 'is_verifikasi_1',
      'class'         => 'form-control',
    ];
    $this->data['is_verifikasi_1_value'] = [
      '1'             => 'Terverifikasi',
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
      'value'         => $this->form_validation->set_value('keterangan_1'),
    ];
    $this->load->view('back/verifikator/verifikasi1', $this->data);
	}
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('verifikator');
    }
  }

  function createverifikasi1_action()
  {
	$this->form_validation->set_rules('is_verifikasi_1', 'Status Verifikasi', 'required');
	//$this->form_validation->set_rules('kontur_lahan', 'Kontur Lahan', 'required');

    // $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->create();
    }
    else
    {
          $data = array(
            'id_users'        	=> $this->input->post('id_users'),
			'name'        		=> $this->input->post('name'),
            'nama_perusahaan'	=> $this->input->post('nama_perusahaan'),
            'jenis_verifikasi_1'=> "CPCL",
            'id_verifikasi_1'   => $this->input->post('id_verifikasi_1'),
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
		
		if($_FILES['bukti1']['error'] <> 4)
		{
			$nmfile = strtolower(url_title($this->input->post('username'))).date('YmdHis');

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
				'file_judul'		=> "Bukti Verifikasi CPCL ".$this->input->post('id_verifikasi_1'),
				'file_deskripsi'    => "Bukti Verifikasi CPCL ".$this->input->post('id_verifikasi_1')." Oleh Verifikator ".$this->session->userdata('username'),
				'file_data'         => $this->upload->data('file_name'),
				'file_thumb'    	=> $nmfile.'_thumb'.$this->upload->data('file_ext'),
			  );

			  $this->m_files->insert($data);
			}
		}

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('verifikator');
      }
    }
	
	function createverifikasi2($id)
  {
    is_login();

    $this->realisasi_model->update($this->uri->segment('3'), array('is_verifikasi'=>'1'));
	$this->r_verifikasi->update2($this->uri->segment('3'), array('is_verifikasi'=>'1'));

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil di Verifikasi</div>');
    redirect('verifikator');
  }

	function createverifikasi3($id)
  {
    is_login();

    $this->produksi_model->update($this->uri->segment('3'), array('is_verifikasi'=>'1'));
	$this->r_verifikasi->update2($this->uri->segment('3'), array('is_verifikasi'=>'1'));

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil di Verifikasi</div>');
    redirect('verifikator');
  }
  
  function createverifikasi4($id)
  {
    is_login();

    $this->cpcl_model->update($this->uri->segment('3'), array('is_verifikasi'=>'1'));
	$this->r_verifikasi->update2($this->uri->segment('3'), array('is_verifikasi'=>'1'));

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil di Verifikasi</div>');
    redirect('verifikator');
  }
  
  function delete($id)
  {
    is_login();
    is_delete();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Cpcl_model->get_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Cpcl_model->soft_delete($id, $data);

      $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('cpcl');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('cpcl');
    }
  }

  function delete_permanent($id)
  {
    is_login();
    is_delete();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Cpcl_model->get_by_id($id);

    if($delete)
    {
      $dir        = "./uploads/user/".$delete->lampiran;
      $dir_thumb  = "./uploads/user/".$delete->lampiran_thumb;

      if(is_file($dir))
      {
        unlink($dir);
        unlink($dir_thumb);
      }

      $this->Tanam_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('cpcl/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('cpcl');
    }
  }

  function deleted_list()
  {
    is_login();
    is_restore();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = 'Deleted '.$this->data['module'].' List';

    $this->data['get_all_deleted'] = $this->Auth_model->get_all_deleted();

    $this->load->view('back/cpcl/cpcl_deleted_list', $this->data);
  }

  function restore($id)
  {
    is_login();
    is_restore();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $row = $this->Cpcl_model->get_by_id($id);

    if($row)
    {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Cpcl_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('cpcl/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('cpcl');
    }
  }

  function verified($id)
  {
    is_login();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->Tanam_model->update($this->uri->segment('3'), array('is_active'=>'1'));

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data activate successfully</div>');
    redirect('cpcl');
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

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data deactivate successfully</div>');
    redirect('cpcl');
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

}
