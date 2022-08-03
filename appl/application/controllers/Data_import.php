<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_import extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		is_login();
		$this->data['module'] = 'Daftar Perusahaan';
		$this->data['company_data']    				= $this->Company_model->company_profile();
		$this->data['layout_template']    			= $this->Template_model->layout();
		$this->data['skins_template']     			= $this->Template_model->skins();
		$this->load->model('Dashboard_model','',TRUE);
		$this->load->helper('tgl_indo');
		$this->load->model('m_wilayah');
		$this->load->model('r_verifikasi');
		$this->load->model('ChatModel');
		$this->load->model('Data_import_model');
	}

	function index()
	{
		$this->data['page_title'] = 'Daftar Perusahaan';
		$this->data['get_all_combobox_provinsi']     = $this->m_wilayah->get_all_provinsi();
		$this->data['get_data_perusahaan']				= $this->Dashboard_model->get_data_perusahaan();
		$this->data['get_jml_verifikasi']				= $this->r_verifikasi->get_jml_r_verifikasi();
		$this->data['import_terbesar']				= $this->Data_import_model->get_import_terbesar();
		$this->data['selisih_produksi']				= $this->Data_import_model->get_selisih_produksi();
		$this->data['surplus_produksi']				= $this->Data_import_model->get_surplus_produksi();
		$this->load->view('back/dashboard/data_import', $this->data);
		
	}
	
	function detail_perusahaan($id)
	{
		$this->data['page_title'] 					= 'Detail Perusahaan';
		$this->data['user']     					= $this->Auth_model->get_by_id($id);
		$this->data['get_all_cpcl_by_iduser'] 		= $this->Data_import_model->get_all_cpcl_by_iduser($id);
		$this->data['get_all_realisasi_by_iduser'] 	= $this->Data_import_model->get_all_realisasi_by_iduser($id);
		$this->data['get_detail_perusahaan'] 		= $this->Data_import_model->get_detail_perusahaan($id);
		$this->data['get_all_combobox_provinsi'] 	= $this->m_wilayah->get_all_provinsi();
		$this->data['get_all_combobox_kabupaten'] 	= $this->m_wilayah->get_all_kabupaten();
		$this->data['get_all_combobox_kecamatan'] 	= $this->m_wilayah->get_all_kecamatan();
		$this->data['get_all_combobox_desa'] = $this->m_wilayah->get_all_desa();
		$this->data['id_users'] = [
			'name'          => 'id_users',
			'type'          => 'hidden',
		  ];
		$this->data['nama_perusahaan'] = [
		  'name'          => 'nama_perusahaan',
		  'id'            => 'nama_perusahaan',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'required'      => '',
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
		$this->data['alamat'] = [
		  'name'          => 'alamat',
		  'id'            => 'alamatn',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'rows'           => '3',
		];
		$this->data['phone_number'] = [
		  'name'          => 'phone_number',
		  'id'            => 'phone_number',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['kode_pos'] = [
		  'name'          => 'kode_pos',
		  'id'            => 'kode_pos',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->load->view('back/dashboard/detail_perusahaan', $this->data);
		
	}
}
