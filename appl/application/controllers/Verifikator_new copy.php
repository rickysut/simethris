<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use phpDocumentor\Reflection\Types\Object_;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Verifikator_new extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Verifikator';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	
	$this->data['btn_submit'] = 'Simpan';
    $this->data['btn_reset']  = 'Reset';
	$this->data['btn_back']    = 'Back To Verifikator';
	$this->load->model('m_wilayah');
	$this->load->model('r_verifikasi_new');
	$this->load->model('ChatModel');
	$this->load->model('cpcl_model');
	$this->load->model('realisasi_model');
	$this->load->model('produksi_model');
	$this->load->model('Ajuriph_model');
	$this->load->model('m_files');
	$this->data['back_action'] = base_url('verifikator_new');
  }

   

  function index()
  {
    is_login();
    is_read();

    $this->data['page_title'] = $this->data['module'].' List';
    $this->data['get_all_cpcl_by_iduser'] = $this->cpcl_model->get_all_cpcl_by_iduserv();
	$this->data['get_all_r_verifikasi_by_cpcl'] = $this->r_verifikasi_new->get_all_r_verifikasi_by_jenis('PKS');
	$this->data['get_all_r_verifikasi_by_realisasi'] = $this->r_verifikasi_new->get_all_r_verifikasi_by_jenis('REALISASI');
	$this->data['get_all_r_verifikasi_by_produksi'] = $this->r_verifikasi_new->get_all_r_verifikasi_by_jenis('PRODUKSI');
	$this->data['get_jml_verifikasi']				= $this->r_verifikasi_new->get_jml_r_verifikasi();
	//$datacpcl = $this->r_verifikasi_new->get_all_r_verifikasi_by_jenis('PKS');
	$ajuVerif = $this->r_verifikasi_new->get_all_r_verifikasi_by_jenis('PKS');
	//var_dump($ajuVerif);
	$mydatatable = array();
	$mynyoba = array();
	$DataTableKu= array();
	$mydatakids = array();
	$ii=0;
	$ia=0;
	$ib=0;
	$myPKids=array();
	foreach($ajuVerif as $forPerusahaan){
		//var_dump($forPerusahaan);
		$myPerusahaan = $this->r_verifikasi_new->get_data_perusahaan($forPerusahaan->id_users);
		//var_dump($myPerusahaan);
		if (!$myPerusahaan) continue;
		$myverif = $this->r_verifikasi_new->get_all_verifikasi_by_perusahaan($forPerusahaan->id_users);
		foreach($myverif as $VerifPerusahaan){
			if($VerifPerusahaan->is_verifikasi == '1'){$is_verifikasiper = '<a  class="btn btn-xs btn-success">Verified</a>';}
			else{$is_verifikasiper = '<a  class="btn btn-xs btn-danger">Unverified</a>';}
		}
		//$verifikasiper = json_encode('<a href="'.base_url('verifikator_new/createverifikasi1/'.$forPerusahaan->id_users).'" data-toggle="tooltip" title="Verifikasi Perusahaan / Lunas" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>', JSON_HEX_TAG | JSON_HEX_AMP);
		//$ia =0;
		$DataTableKu[$ii] = (object) array(
			'id_company' =>  $forPerusahaan->id_users,
			'nama_perusahaan' => $myPerusahaan['nama_perusahaan'],
			'provinsi' => $myPerusahaan['nama_prov'],
			'kabupaten' => $myPerusahaan['nama_kab'],
			'kecamatan' => $myPerusahaan['nama_kec'],
			'desa' => $myPerusahaan['nama_des'],
			'status' => $is_verifikasiper
		);
		$ii += 1;
		
	}
	$this->data['data_for_table'] = $DataTableKu;
	//var_dump($this->data['data_for_table']);
    $this->load->view('back/verifikator_new/verifikator_list', $this->data);	
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
	  $this->data['get_jml_verifikasi'] = $this->r_verifikasi_new->get_jml_r_verifikasi();
	  $this->data['get_all_marker_cpcl'] = $this->cpcl_model->get_all_marker_cpcl($id);
	  $this->data['btn_submit'] = 'Simpan';
	  $this->data['btn_cancel'] = 'Batal';
	  $this->data['action'] = 'verifikator_new/verifikasi_l1_action';
	  
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
		  '2'             => 'Perbaikan',
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

      $this->load->view('back/verifikator_new/cpcl_lihat_new', $this->data);
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
      $this->data['page_title'] = 'Lihat CPCL / PKS';
      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
	  $this->data['get_jml_verifikasi'] = $this->r_verifikasi_new->get_jml_r_verifikasi();
	  $this->data['get_all_marker_cpcl'] = $this->cpcl_model->get_all_marker_cpcl($id);
	  $this->data['btn_submit'] = 'Simpan';
	  $this->data['btn_cancel'] = 'Batal';
	  $this->data['action'] = 'verifikator_new/verifikasi_l1_action';
	  
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
		  '2'             => 'Perbaikan',
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

      $this->load->view('back/verifikator_new/cpcl_lihat', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Tidak Ditemukan</div>');
      redirect('verifikator_new/view_company/'.$this->data['user']->id_users);
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
	  $this->data['get_jml_verifikasi'] = $this->r_verifikasi_new->get_jml_r_verifikasi();
	  $this->data['action'] = 'verifikator_new/verifikasi_l2_action';
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
		  '2'             => 'Perbaikan',
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
    $this->load->view('back/verifikator_new/realisasi_lihat', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect($this->data('verifikator_new/view_realisasi/'.$this->data['user']->id_cpcl));
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
	  $this->data['get_jml_verifikasi'] = $this->r_verifikasi_new->get_jml_r_verifikasi();
	  $this->data['action'] = 'verifikator_new/verifikasi_l3_action';
	  $namafile2 = '_produksi_'.$id;
	  $this->data['gallery'] = $this->m_files->getRowsProduksi_verifikator($this->session->userdata('id_users'), $id);

      $this->data['id_cpcl'] = [
      'name'          => 'id_cpcl',
      'id'            => 'id_cpcl',
      'type'          => 'hidden',
    ];
	$this->data['id_produksi'] = [
		'name'          => 'id_produksi',
		'id'            => 'id_produksi',
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
		  '2'             => 'Perbaikan',
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
    $this->load->view('back/verifikator_new/produksi_lihat', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('verifikator_new/view_produksi/' . $this->data['users']->id_realisasi);
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

        $this->r_verifikasi_new->insertv($data);
		if($this->input->post('is_verifikasi_1')=='3'){$updateajuverifikasi='0';}else{$updateajuverifikasi=1;}
        $this->db->select_max('id_verifikasi');
        $result = $this->db->get('verifikasi')->row_array();
		$this->r_verifikasi_new->update_pks($this->input->post('id_cpcl'), array('is_verifikasi'=>$this->input->post('is_verifikasi_1'),'verifikator'=>$this->session->userdata('username')));
		$this->cpcl_model->update($this->input->post('id_cpcl'), array('is_verifikasi'=>$this->input->post('is_verifikasi_1'),'is_aju_verifikasi'=>$updateajuverifikasi));
		
		$this->write_log();
    
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('verifikator_new/view_company/'.$this->input->post('id_users'));
      
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

        $this->r_verifikasi_new->insertv($data);

        $this->db->select_max('id_verifikasi');
        $result = $this->db->get('verifikasi')->row_array();
		$this->r_verifikasi_new->update_realisasi($this->input->post('id_realisasi'), array('is_verifikasi'=>$this->input->post('is_verifikasi_1'),'verifikator'=>$this->session->userdata('username')));
		$this->realisasi_model->update($this->input->post('id_realisasi'), array('is_verifikasi'=>$this->input->post('is_verifikasi_1')));
		
		$this->write_log();
    
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('verifikator_new/view_realisasi/'.$this->input->post('id_cpcl'));
      
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

        $this->r_verifikasi_new->insertv($data);
		
        $this->db->select_max('id_verifikasi');
        $result = $this->db->get('verifikasi')->row_array();
		$this->r_verifikasi_new->update_produksi($this->input->post('id_produksi'), array('is_verifikasi'=>$this->input->post('is_verifikasi_1'),'verifikator'=>$this->session->userdata('username')));
		$this->produksi_model->update($this->input->post('id_produksi'), array('is_verifikasi'=>$this->input->post('is_verifikasi_1')));
		
		$this->write_log();
    
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('verifikator_new/view_produksi/'.$this->input->post('id_realisasi') );
      
  }

  function verifikasilunas($id)
  {
	is_login();
    is_read();
	$this->data['user']     = $this->Ajuriph_model->get_by_id($id);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Verifikasi Lunas';
      $this->data['action']     = 'verifikator_new/verifikasilunas_action';

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
		  '2'             => 'Perbaikan',
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
		$this->load->view('back/verifikator_new/verifikasilunas', $this->data);
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
		var_dump($data);
        $this->r_verifikasi_new->insertv($data);

        $this->db->select_max('id_verifikasi');
        $result = $this->db->get('verifikasi')->row_array();
		$this->r_verifikasi_new->update($this->input->post('id_r_verifikasi'), array('is_verifikasi'=>'1','verifikator'=>$this->session->userdata('username')));
		$this->cpcl_model->update($this->input->post('id_verifikasi_1'), array('is_verifikasi'=>'1'));
		$this->cpcl_model->updateall($this->input->post('id_users'), array('is_verifikasi'=>'1'));
		$this->realisasi_model->updateall($this->input->post('id_users'), array('is_verifikasi'=>'1'));
		$this->produksi_model->updateall($this->input->post('id_users'), array('is_verifikasi'=>'1'));
		$this->r_verifikasi_new->updateall($this->input->post('id_users'), array('is_verifikasi'=>'1'));
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

    $this->r_verifikasi_new->insertv($data);

    $this->db->select_max('id_verifikasi');
	$result = $this->db->get('verifikasi')->row_array();
	$this->r_verifikasi_new->update_pks($id, array('is_verifikasi'=>'1','verifikator'=>$this->session->userdata('username')));
	$this->cpcl_model->update($id, array('is_verifikasi'=>'1'));
	$this->write_log();
    
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil di Verifikasi</div>');
    //redirect('verifikator');
	redirect('verifikator_new/view_company/' . $iduser);
  }

  function createverifikasi3($id)
  {
    is_login();
	$query = $this->db->get_where('realisasi',array('id_realisasi'=>$id));
	foreach ($query->result() as $value) {
		$iduser = $value->id_users;
		$idcpcl = $value->id_cpcl;
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

    $this->r_verifikasi_new->insertv($data);

    $this->db->select_max('id_verifikasi');
	$result = $this->db->get('verifikasi')->row_array();
    $this->r_verifikasi_new->update_realisasi($id, array('is_verifikasi'=>'1','verifikator'=>$this->session->userdata('username')));
	$this->realisasi_model->update($id, array('is_verifikasi'=>'1'));
	$this->write_log();
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil di Verifikasi</div>');
    redirect('verifikator_new/view_realisasi/' . $idcpcl);
  }
  
  function createverifikasi4($id)
  {
    is_login();
	$query = $this->db->get_where('produksi',array('id_produksi'=>$id));
	foreach ($query->result() as $value) {
		$iduser = $value->id_users;
		$idr = $value->id_realisasi;
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

    $this->r_verifikasi_new->insertv($data);

    $this->db->select_max('id_verifikasi');
	$result = $this->db->get('verifikasi')->row_array();
    $this->r_verifikasi_new->update_produksi($id, array('is_verifikasi'=>'1','verifikator'=>$this->session->userdata('username')));
	$this->produksi_model->update($id, array('is_verifikasi'=>'1'));
	$this->write_log();
    
    $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil di Verifikasi</div>');
    redirect('verifikator_new/view_produksi/'.$idr);
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
		$totalunverifikasi = $this->r_verifikasi_new->total_rows_unverif();
		$result['total'] = $totalunverifikasi;
		$result['msg'] = "User Mengajukan Verifikasi";
		echo json_encode($result);
		
	}

	function view_company($company_id){
		
		$DataRIPH = array();
		$DataPKS = array();
		$i = 0;
		$myriph = $this->Ajuriph_model->get_all_riph_dy_iduser($company_id);
		//var_dump($myriph);
		foreach($myriph as $forRIPH){
			$jbrealisasi = intval($forRIPH->kewajiban_tanam);$jbproduksi = intval($forRIPH->kewajiban_produksi);
			if(is_null($forRIPH->luas_tanam)){$jrealisasi = 0;}else{$jrealisasi = intval($forRIPH->luas_tanam);}
			if(is_null($forRIPH->jmlproduksi)){$jproduksi = 0;}else{$jproduksi = intval($forRIPH->jmlproduksi);}
			if ($forRIPH->id_mst_riph){
				if(($jbrealisasi <= $jrealisasi) or ($jbproduksi <= $jproduksi)){
					$veriflunas = '<a href="'.base_url('verifikator_new/verifikasilunas/'.$forRIPH->id_mst_riph).'" data-toggle="tooltip" title="Verifikasi / Keterangan Lunas" class="btn btn-warning  btn-sm">Verifikasi / Keterangan Lunas</a>';					
				}else{
					$veriflunas = '<a href="'.base_url('verifikator_new/verifikasilunas/'.$forRIPH->id_mst_riph).'" data-toggle="tooltip" title="Verifikasi / Keterangan Lunas" class="btn btn-warning  btn-sm disabled" role="button" aria-disabled="true">Sudah lunas</a>';
				}
			} else {
				$veriflunas = '';
			}
			//$veriflunas = json_encode('<a href="'.base_url('verifikator_new/verifikasilunas/'.$forRIPH->id_mst_riph).'" data-toggle="tooltip" title="Verifikasi / Keterangan Lunas" class="btn btn-warning btn-fab btn-sm"><i class="icon-pencil-circle"></i></a>', JSON_HEX_TAG | JSON_HEX_AMP);					
			$DataRIPH[0] = (object)array(
				'nama_perusahaan' => $forRIPH->nama_perusahaan,
				'nomor_riph' => $forRIPH->nomor_riph,
				'tgl_awal' => date('d-m-Y',strtotime($forRIPH->tgl_awal_riph)),
				'tgl_akhir' => date('d-m-Y',strtotime($forRIPH->tgl_akhir_riph)),
				'vol_import' => $forRIPH->volume,
				'beban_tanam' => $forRIPH->kewajiban_tanam,
				'beban_produksi' => $forRIPH->kewajiban_produksi,
				'luas_tanam' => $forRIPH->luas_tanam,
				'jml_produksi' => $forRIPH->jmlproduksi,
				'action' => $veriflunas
			);
			
			
			
		}
		//var_dump($DataRIPH);
		$this->data['datariph'] = $DataRIPH;

		// -- daftar PKS
		$myPKS = $this->r_verifikasi_new->get_all_cpcl_by_user($company_id, $this->period_year);
		if($myPKS != null){
			$ia = 0;
			foreach($myPKS as $forPKS){
				$ib =0;
				if($forPKS->is_verifikasi == '1'){$is_verifikasi11 = '<a  title="Sudah Diverifikasi" ><i style="color: green" class="icon-checkbox-marked-circle-outline"></i></a>';}
				elseif($forPKS->is_verifikasi == '2'){$is_verifikasi11 = '<a   title="Pending"><i style="color: #ff9800" class="icon-delta"></i></a>';}
				elseif($forPKS->is_verifikasi == '3'){$is_verifikasi11 = '<a   title="Ditolak" ><i style="color: red" class="icon-cancel"></i></a>';}
				else{$is_verifikasi11 = '<a title="Belum Diverifikasi"><i style="color: #1c1e26" class="icon-close-circle"></i></a>';}
				
				$verifikasi11 = '<a href="'.base_url('verifikator_new/createverifikasi2/'.$forPKS->id_cpcl).'" title="Verifikasi Langsung" onclick="return confirm(\'Yakin mau diverifikasi?\')" ><i class="fa fa-check"></i></a>';
				$lihatPKS = '<a href="'.base_url('verifikator_new/lihatcpcl/'.$forPKS->id_cpcl).'" title="Lihat PKS Untuk Diverifikasi" ><i class="fa fa-eye"></i></a>';
				$ActionPKS = $lihatPKS .$verifikasi11;
				$ActionPKShtml = $ActionPKS;
				

				$DataPKS[$ia] = (Object) array (
					'id_pks' => $forPKS->id_cpcl,
					'nama_pelaksana' => $forPKS->nama_pelaksana,
					'kabupaten' => $forPKS->nama_kab,
					'kecamatan' => $forPKS->nama_kec,
					'desa' => $forPKS->nama_des,
					'status' => $is_verifikasi11,
					'action' => $ActionPKShtml
				);
				
				$ia += 1;


			}
		}
		$this->data['datapks'] = $DataPKS;
		$this->data['page_title'] = 'Detail Perusahaan';
		$this->load->view('back/verifikator_new/view_company', $this->data);

	}

	function view_realisasi($pks_id){
		$myRealisasi = $this->r_verifikasi_new->get_all_realisasi_by_idcpcl($pks_id);
		
		$myPKS = $this->Ajuriph_model->get_all_riph_dy_iduser($myRealisasi[0]->id_users);
		//var_dump($myPKS);
		$this->data['datariph'] = $myPKS;
		$this->data['datarealisasi'] = $myRealisasi;
		$this->data['page_title'] = 'Realisasi';
		$this->load->view('back/verifikator_new/list_realisasi', $this->data);
		
	}

	function view_produksi($id_realisasi){
		$myProduksi=$this->r_verifikasi_new->get_all_produksi_by_idrealisasi($id_realisasi);
		$myPKS = $this->Ajuriph_model->get_all_riph_dy_iduser($myProduksi[0]->id_users);
		//var_dump($myPKS);
		$this->data['datariph'] = $myPKS;
		$this->data['dataproduksi'] = $myProduksi;
		$this->data['page_title'] = 'Produksi';
		$this->load->view('back/verifikator_new/list_produksi', $this->data);
		/*
				$ib += 1;$ip=0;
				$myProduksi=$this->r_verifikasi_new->get_all_produksi_by_idrealisasi($forRealisasi->id_realisasi);
				if($myProduksi != null){
					foreach($myProduksi as $forProduksi){
						if($forProduksi->is_verifikasi == '1'){$is_verifikasi_p = '<button type="button" data-toggle="tooltip" title="Produski Sudah Diverifikasi" class="btn btn-success btn-fab btn-sm"><i class="icon-checkbox-marked-circle-outline"></i></button>';}
						elseif($forProduksi->is_verifikasi == '2'){$is_verifikasi_p = json_encode('<button type="button" data-toggle="tooltip" title="Produksi Sudah Diverifikasi Status Pending" class="btn btn-warning btn-fab btn-sm"><i class="icon-delta"></i></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
						elseif($forProduksi->is_verifikasi == '3'){$is_verifikasi_p = json_encode('<button type="button" data-toggle="tooltip" title="Produksi Sudah Diverifikasi Status Ditolak" class="btn btn-danger btn-fab btn-sm"><i class="icon-cancel"></i></button>', JSON_HEX_TAG | JSON_HEX_AMP);}
						else{$is_verifikasi_p = '<button type="button" data-toggle="tooltip" title="Produksi Belum Diverifikasi" class="btn btn-info btn-fab btn-sm"><i class="icon-close-circle"></i></button>';}
						
						$lihat_p = '<a href="'.base_url('verifikator_new/lihatproduksi/'.$forProduksi->id_produksi).'" data-toggle="tooltip" title="Lihat Untuk Diverifikasi" class="btn btn-warning btn-fab btn-sm"><i class="icon-eye"></i></a>';
						$verifikasi_p = '<a href="'.base_url('verifikator_new/createverifikasi4/'.$forProduksi->id_produksi).'" data-toggle="tooltip" title="Verifikasi Langsung" class="btn btn-warning btn-fab btn-sm"><i class="icon-pencil-circle"></i></a>';
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
				}
		}	*/	
	}

}
