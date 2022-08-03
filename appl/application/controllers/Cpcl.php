<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Cpcl extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->data['module'] = 'Rencana Tanam / PKS';
    $this->data['company_data']    				= $this->Company_model->company_profile();
	  $this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();
	  $this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
    $this->load->model('m_wilayah');
    $this->load->model('Cpcl_model');
    $this->load->model('R_verifikasi');
    $this->load->model('Ajuriph_model');
    $this->load->model('r_verifikasi');
    $this->load->model('ChatModel');
    $this->load->model('poktan_model');
    $this->load->model('lokasi_model','lokasi');
    $this->load->model('petani_model','person');
    $this->load->model('saprodi_model','saprodi');
  }

  function daftarriph($idriph)
  {
    is_login();
    is_read();
    $this->data['page_title'] = 'Daftar '.$this->data['module'].' RIPH : '.$idriph;
    $this->data['btn_add']    = 'Tambah Rencana Tanam';
	  $this->data['btn_back']    = 'Kembali Ke List';
    $this->data['add_action'] = base_url('cpcl/create/'.$idriph);
	  $this->data['back_action'] = base_url('cpcl/daftarriph/'.$idriph);
	  $this->data['listuri'] = base_url('cpcl/daftarriph/'.$idriph);
    $this->data['get_all_cpcl_by_iduser'] = $this->Cpcl_model->get_all_cpcl_by_iduser($idriph);
	  $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
    $this->load->view('back/cpcl/cpcl_list', $this->data);
  }

  function create($idriph)
  {
    is_login();
    is_create();
	  $this->data['user']            = $this->Ajuriph_model->get_by_id($idriph);
	  $this->data['for_id_cpcl']     = $this->session->userdata('id_users').date('ymi').rand(0,10);

    if($this->data['user'])
    {	  
		  $this->data['page_title'] = 'Tambah '.$this->data['module'];
		  $this->data['action']     = 'cpcl/create_action';
	    $this->data['listuri'] = base_url('cpcl/daftarriph/'.$idriph);
		
      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
      $this->data['get_all_combobox_kabupaten'] = $this->m_wilayah->get_all_kabupaten();
      $this->data['get_all_combobox_kecamatan'] = $this->m_wilayah->get_all_kecamatan();
      $this->data['get_all_combobox_desa'] = $this->m_wilayah->get_all_desa();
      $this->data['get_all_poktan'] = $this->poktan_model->get_by_users($this->session->userdata('id_users'));

		  $this->data['id_mst_riph'] = [
		    'name'          => 'id_mst_riph',
		    'id'            => 'id_mst_riph',
		    'class'         => 'form-control',
		    'autocomplete'  => 'off',
		    'type'  => 'hidden',
		  ];
		  $this->data['id_users'] = [
		    'name'          => 'id_users',
		    'id'            => 'id_users',
		    'class'         => 'form-control',
		    'autocomplete'  => 'off',
		    'type'  => 'hidden',
		  ];	
    }
    $this->data['id_cpcl'] = [
      'name'          => 'id_cpcl',
      'id'            => 'id_cpcl',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
	    'type'          => 'hidden',
      'value'         => $this->form_validation->set_value('id_cpcl'),
    ];
	  $this->data['no_pks'] = [
      'name'          => 'no_pks',
      'id'            => 'no_pks',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('no_pks'),
    ];
	  $this->data['id_users'] = [
      'name'          => 'id_users',
      'id'            => 'id_users',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('id_users'),
    ];	
    $this->data['nama_perusahaan'] = [
      'name'          => 'nama_perusahaan',
      'id'            => 'nama_perusahaan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('nama_perusahaan'),
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
      'value'         => $this->form_validation->set_value('nama_pelaksana'),
    ];
	  $this->data['varietas'] = [
      'name'          => 'varietas',
      'id'            => 'varietas',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('varietas'),
    ];
	  $this->data['tgl_rencana_tanam'] = [
      'name'          => 'tgl_rencana_tanam',
      'id'            => 'tgl_rencana_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('tgl_rencana_tanam'),
    ];
	  $this->data['tgl_awal_perjanjian'] = [
      'name'          => 'tgl_awal_perjanjian',
      'id'            => 'tgl_awal_perjanjian',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('tgl_awal_perjanjian'),
    ];
	  $this->data['tgl_akhir_perjanjian'] = [
      'name'          => 'tgl_akhir_perjanjian',
      'id'            => 'tgl_akhir_perjanjian',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('tgl_akhir_perjanjian'),
    ];
	  $this->data['luas_rencana_tanam'] = [
      'name'          => 'luas_rencana_tanam',
      'id'            => 'luas_rencana_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('luas_rencana_tanam'),
    ];
	  $this->data['rencana_produksi'] = [
      'name'          => 'rencana_produksi',
      'id'            => 'rencana_produksi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('rencana_produksi'),
    ];
	  $this->data['provinsi'] = [
      'name'          => 'provinsi',
      'id'            => 'provinsi',
      'class'         => 'form-control',
      'required'      => '',
      'value'         => $this->form_validation->set_value('provinsi'),
	//  'onchange'	  => 'setpetaprovinsi(this.options[this.selectedIndex].value)',
    ];
	  $this->data['kabupaten'] = [
      'name'          => 'kabupaten',
      'id'            => 'kabupaten',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('kabupaten'),
    ];
	  $this->data['kecamatan'] = [
      'name'          => 'kecamatan',
      'id'            => 'kecamatan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('kecamatan'),
    ];
	  $this->data['desa'] = [
      'name'          => 'desa',
      'id'            => 'desa`',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('desa'),
    ];
	  $this->data['id_poktan'] = [
		'name'          => 'id_poktan',
	    'id'            => 'id_poktan',
		'class'         => 'form-control',
		'type'          => 'hidden',
	  ];		
	  $this->data['nama_poktan'] = [
	    'name'          => 'nama_poktan',
	    'id'            => 'nama_poktan',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
	  ];	
	  $this->data['nik'] = [
	    'name'          => 'nik',
	    'id'            => 'nik',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
	  ];
	  $this->data['provinsi2'] = [
      'name'          => 'provinsi2',
      'id'            => 'provinsi2',
      'class'         => 'form-control',
      'required'      => '',
      'value'         => $this->form_validation->set_value('provinsi2'),
	//  'onchange'	  => 'setpetaprovinsi(this.options[this.selectedIndex].value)',
    ];
	  $this->data['kabupaten2'] = [
      'name'          => 'kabupaten2',
      'id'            => 'kabupaten2',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('kabupaten2'),
    ];
	  $this->data['kecamatan2'] = [
      'name'          => 'kecamatan2',
      'id'            => 'kecamatan2',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('kecamatan2'),
    ];
	  $this->data['desa2'] = [
      'name'          => 'desa2',
      'id'            => 'desa2`',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('desa2'),
    ];
	
	  $this->data['provinsi3'] = [
      'name'          => 'provinsi3',
      'id'            => 'provinsi3',
      'class'         => 'form-control',
      'required'      => '',
      'value'         => $this->form_validation->set_value('provinsi3'),
	//  'onchange'	  => 'setpetaprovinsi(this.options[this.selectedIndex].value)',
    ];
	  $this->data['kabupaten3'] = [
      'name'          => 'kabupaten3',
      'id'            => 'kabupaten3',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('kabupaten3'),
    ];
	  $this->data['kecamatan3'] = [
      'name'          => 'kecamatan3',
      'id'            => 'kecamatan3',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('kecamatan3'),
    ];
	  $this->data['desa3'] = [
      'name'          => 'desa3',
      'id'            => 'desa3',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('desa3'),
    ];
	  $this->data['petani'] = [
      'name'          => 'petani',
      'id'            => 'petani`',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('petani'),
    ];
    $this->data['address'] = [
      'name'          => 'address',
      'id'            => 'address',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'rows'           => '3',
      'required'      => '',
      'value'         => $this->form_validation->set_value('address'),
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
      'value'         => $this->form_validation->set_value('luas_lahan'),
    ];
	  $this->data['kontur_lahan'] = [
      'name'          => 'kontur_lahan',
      'id'            => 'kontur_lahan',
      'class'         => 'form-control',
    ];
    $this->data['kontur_lahan_value'] = [
      'Datar'        => 'Datar',
      'Miring'       => 'Miring',
    ];
    $this->data['atitude'] = [
      'name'          => 'atitude',
      'id'            => 'atitude',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('atitude'),
    ];
    $this->data['latitude'] = [
      'name'          => 'latitude',
      'id'            => 'latitude',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('latitude'),
    ];
    $this->data['point'] = [
      'name'          => 'point',
      'id'            => 'point',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('point'),
    ];
    $this->data['for_id_poktan'] = [
      'name'          => 'for_id_poktan',
      'id'            => 'for_id_poktan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
	  'type'  => 'hidden',
      'value'         => $this->form_validation->set_value('for_id_poktan'),
    ];
    $this->load->view('back/cpcl/cpcl_add', $this->data);

  }

  function create_action()
  {
	$this->form_validation->set_rules('no_pks', 'Nomor PKS', 'trim|required');
    $this->form_validation->set_rules('luas_rencana_tanam', 'Rencana Luas Tanam', 'trim|is_numeric');
    //$this->form_validation->set_rules('tgl_rencana_tanam', 'Rencana Tanggal Tanam', 'trim|required');
    //$this->form_validation->set_rules('varietas', 'Varietas', 'required');
    $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
    $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
    $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
    $this->form_validation->set_rules('desa', 'Desa', 'required');
	//$this->form_validation->set_rules('nama_pelaksana', 'Pelaksana', 'required');
	//$this->form_validation->set_rules('status_lahan', 'Status Lahan', 'required');
	//$this->form_validation->set_rules('atitude', 'Atitude', 'required');
	//$this->form_validation->set_rules('latitude', 'Latitude', 'required');
	//$this->form_validation->set_rules('kontur_lahan', 'Kontur Lahan', 'required');

    $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	//$namapelaksanya="";$idPoktan = "";$pointPetani = "";
    if($this->form_validation->run() === FALSE)
    {
      $this->create($this->input->post('id_mst_riph'));
    }
    else
    {
		$namapelaksanya="";$idPoktan = "";$pointPetani = "";
        if($this->input->post('type_pelaksana')=='2') {
			$namapelaksanya = $this->session->userdata('nama_perusahaan');
			$data2 = array(
			'id_cpcl'        	=> $this->input->post('id_cpcl'),
            'no_poktan'        	=> '1111',
            'id_users'        	=> $this->session->userdata('id_users'),
            'nama_poktan'     	=> $this->session->userdata('nama_perusahaan'),
            'provinsi'  		=> substr($this->input->post('provinsi'),0,2),
            'kabupaten'       	=> substr($this->input->post('kabupaten'),0,4),
            'kecamatan'    		=> $this->input->post('kecamatan'),
            'desa'    			=> $this->input->post('desa'),
            'jml_anggota'    	=> '1',
            'luas_lahan'    	=> $this->input->post('luas_rencana_tanam'),
			);
			
			$this->poktan_model->insert($data2);
			$this->db->select_max('id_poktan');
			$result = $this->db->get('poktan')->row_array();	
			$idPoktan = $result['id_poktan'];	
			//$this->person->update(array('id_poktan' => $this->input->post('for_id_poktan')), array('id_poktan' => $result['id_poktan']));
			//$this->saprodi->update(array('id_poktan' => $this->input->post('for_id_poktan')), array('id_poktan' => $result['id_poktan']));
		}
		else
		{
			$idPoktan = $this->input->post('nama_pelaksana');
			$query = $this->db->get_where('poktan',array('id_poktan'=>$idPoktan));
			foreach ($query->result() as $value) {
				$namapelaksanya = $value->nama_poktan;
			}
		}
		
		$petani = $this->lokasi->get_by_id_cpcl($this->input->post('id_cpcl'));
		$pointPetani = "";
		if(!empty($petani )){
			foreach($petani as $dataPetani){
				$pointPetani .= "[".$dataPetani->atitude.",".$dataPetani->latitude."],";
			}
		}
		
          $data = array(
		    'id_cpcl'       	=> $this->input->post('id_cpcl'),
            'id_users'        	=> $this->session->userdata('id_users'),
			'id_mst_riph'       => $this->input->post('id_mst_riph'),
			'no_pks'       		=> $this->input->post('no_pks'),
            'nama_perusahaan'	=> $this->session->userdata('nama_perusahaan'),
            'type_pelaksana'	=> $this->input->post('type_pelaksana'),
            'id_poktan'			=> $idPoktan,
            'nama_pelaksana'    => $namapelaksanya,
			'varietas'          => "Bawang Putih",
            'tgl_rencana_tanam' => date('Y-m-d',strtotime($this->input->post('tgl_rencana_tanam'))),
            'tgl_awal_perjanjian' => date('Y-m-d',strtotime($this->input->post('tgl_awal_perjanjian'))),
            'tgl_akhir_perjanjian' => date('Y-m-d',strtotime($this->input->post('tgl_akhir_perjanjian'))),
            'luas_rencana_tanam'=> $this->input->post('luas_rencana_tanam'),
            'rencana_produksi'=> $this->input->post('rencana_produksi'),
			'status_lahan'      => $this->input->post('status_lahan'),
			'kontur_lahan'      => $this->input->post('kontur_lahan'),       
            'provinsi'          => substr($this->input->post('provinsi'),0,2),
            'kabupaten'         => substr($this->input->post('kabupaten'),0,4),
            'kecamatan'         => $this->input->post('kecamatan'),
            'desa'              => $this->input->post('desa'),
			'atitude'           => $this->input->post('atitude'),
			'latitude'          => $this->input->post('latitude'),
			'point'          	=> $pointPetani,
          );

        $this->Cpcl_model->insert($data);
        //$this->db->select_max('id_cpcl');
        //$result = $this->db->get('cpcl')->row_array();		
		//$this->saprodi->update(array('id_poktan' => $idPoktan), array('id_cpcl' => $this->input->post('id_cpcl')));
		  // update poktan
		//$this->poktan_model->update($idPoktan, array('id_cpcl' => $this->input->post('id_cpcl')));
		//$this->person->update(array('id_cpcl' => $this->input->post('id_cpcl')), array('is_active' => '1'));
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('cpcl/daftarriph/'.$this->input->post('id_mst_riph'));
      
    }
  }

  function update($idc)
  {
    is_login();
    is_update();

    $this->data['user']     = $this->Cpcl_model->get_all_cpcl_by_idcpcl($idc);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Update '.$this->data['module'];
      $this->data['action']     = 'cpcl/update_action';

      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
	  $this->data['get_all_marker_cpcl'] = $this->Cpcl_model->get_all_marker_cpcl($idc);
	  $this->data['get_all_poktan'] = $this->poktan_model->get_by_users($this->session->userdata('id_users'));

      $this->data['id_cpcl'] = [
      'name'          => 'id_cpcl',
      'id'            => 'id_cpcl',
      'type'          => 'hidden',
	  ];
	  $this->data['id_mst_riph'] = [
      'name'          => 'id_mst_riph',
      'id'            => 'id_mst_riph',
      'type'          => 'hidden',
    ];
	$this->data['id_poktan'] = [
      'name'          => 'id_poktan',
      'id'            => 'id_poktan',
      'type'          => 'hidden',
	  ];
	$this->data['id_users'] = [
      'name'          => 'id_users',
      'type'          => 'hidden',
    ];	
	$this->data['no_pks'] = [
      'name'          => 'no_pks',
      'id'            => 'no_pks',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'readonly'      => '',
    ];
    $this->data['nama_perusahaan'] = [
      'name'          => 'nama_perusahaan',
      'id'            => 'nama_perusahaan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'readonly'      => '',
    ];
	$this->data['type_pelaksana'] = [
      'name'          => 'type_pelaksana',
      'id'            => 'type_pelaksana',
      'class'         => 'form-control',
      'readonly'      => '',
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
      'readonly'      => '',
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
	$this->data['tgl_awal_perjanjian'] = [
      'name'          => 'tgl_awal_perjanjian',
      'id'            => 'tgl_awal_perjanjian',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'readonly'      => 'true',
    ];
	$this->data['tgl_akhir_perjanjian'] = [
      'name'          => 'tgl_akhir_perjanjian',
      'id'            => 'tgl_akhir_perjanjian',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'readonly'      => 'true',
    ];
	$this->data['luas_rencana_tanam'] = [
      'name'          => 'luas_rencana_tanam',
      'id'            => 'luas_rencana_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'readonly'      => '',
    ];
	$this->data['rencana_produksi'] = [
      'name'          => 'rencana_produksi',
      'id'            => 'rencana_produksi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['provinsi'] = [
      'name'          => 'provinsi',
      'id'            => 'provinsi',
      'class'         => 'form-control',
      'readonly'      => '',
    ];
	$this->data['kabupaten'] = [
      'name'          => 'kabupaten',
      'id'            => 'kabupaten',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'readonly'      => '',
    ];
	$this->data['kecamatan'] = [
      'name'          => 'kecamatan',
      'id'            => 'kecamatan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'readonly'      => '',
    ];
	$this->data['provinsi2'] = [
      'name'          => 'provinsi2',
      'id'            => 'provinsi2',
      'class'         => 'form-control',
      'required'      => '',
	//  'onchange'	  => 'setpetaprovinsi(this.options[this.selectedIndex].value)',
    ];
	$this->data['kabupaten2'] = [
      'name'          => 'kabupaten2',
      'id'            => 'kabupaten2',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['kecamatan2'] = [
      'name'          => 'kecamatan2',
      'id'            => 'kecamatan2',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['desa'] = [
      'name'          => 'desa',
      'id'            => 'desa`',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'readonly'      => '',
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
	  'readonly'  	  => '',
      'required'      => '',
    ];
    $this->data['latitude'] = [
      'name'          => 'latitude',
      'id'            => 'latitude',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
	  'readonly'  	  => '',
      'required'      => '',
    ];
    $this->data['point'] = [
      'name'          => 'point',
      'id'            => 'point',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['for_id_poktan'] = [
      'name'          => 'for_id_poktan',
      'id'            => 'for_id_poktan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
	  'type'  => 'hidden',
    ];

      $this->load->view('back/cpcl/cpcl_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('cpcl/daftarriph/'.$this->input->post('id_mst_riph'));
    }

  }

  function update_action()
  {
	$this->form_validation->set_rules('no_pks', 'Nomor PKS', 'trim|required');
    $this->form_validation->set_rules('renc_luas_tanam', 'Rencana Luas Tanam', 'trim|is_numeric');
    //$this->form_validation->set_rules('renc_tgl_tanam', 'Rencana Tanggal Tanam', 'trim|required');
    //$this->form_validation->set_rules('varietas', 'Varietas', 'required');
    //$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
    //$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
    //$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
    //$this->form_validation->set_rules('desa', 'Desa', 'required');
	//$this->form_validation->set_rules('nama_pelaksana_pelaksana', 'Pelaksana', 'required');
	//$this->form_validation->set_rules('status_lahan', 'Status Lahan', 'required');
	//$this->form_validation->set_rules('atitude', 'Atitude', 'required');
	//$this->form_validation->set_rules('latitude', 'Latitude', 'required');
	//$this->form_validation->set_rules('kontur_lahan', 'Kontur Lahan', 'required');

    $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_cpcl'));
    }
    else
    {
		$namapelaksanya="";$idPoktan = "";$pointPetani = "";
		if($this->input->post('type_pelaksana')=='2') {
			$namapelaksanya = $this->session->userdata('nama_perusahaan');
			$idPoktan = $this->input->post('nama_pelaksana');
		}
		else
		{
			$idPoktan = $this->input->post('nama_pelaksana');
			$query = $this->db->get_where('poktan',array('id_poktan'=>$idPoktan));
			foreach ($query->result() as $value) {
				$namapelaksanya = $value->nama_poktan;
			}
		}
		$petani = $this->person->get_by_id_poktan($idPoktan);
		$pointPetani = "";
		if(!empty($petani)){
		foreach($petani as $dataPetani){
			$pointPetani .= "[".$dataPetani->atitude.",".$dataPetani->latitude."],";
		}
		}
          $data = array(
            'id_users'        	=> $this->session->userdata('id_users'),
			'id_mst_riph'       => $this->input->post('id_mst_riph'),
			'no_pks'       		=> $this->input->post('no_pks'),
            'nama_perusahaan'	=> $this->session->userdata('nama_perusahaan'),
            'type_pelaksana'	=> $this->input->post('type_pelaksana'),
            'id_poktan'			=> $idPoktan,
            'nama_pelaksana'    => $namapelaksanya,
			'varietas'          => "Bawang Putih",
            'tgl_rencana_tanam' => date('Y-m-d',strtotime($this->input->post('tgl_rencana_tanam'))),
            'tgl_awal_perjanjian' => date('Y-m-d',strtotime($this->input->post('tgl_awal_perjanjian'))),
            'tgl_akhir_perjanjian' => date('Y-m-d',strtotime($this->input->post('tgl_akhir_perjanjian'))),
            'luas_rencana_tanam'=> $this->input->post('luas_rencana_tanam'),
            'rencana_produksi'=> $this->input->post('rencana_produksi'),
			'status_lahan'      => $this->input->post('status_lahan'),
			'kontur_lahan'      => $this->input->post('kontur_lahan'),       
            'provinsi'          => substr($this->input->post('provinsi'),0,2),
            'kabupaten'         => substr($this->input->post('kabupaten'),0,4),
            'kecamatan'         => $this->input->post('kecamatan'),
            'desa'              => $this->input->post('desa'),
			'atitude'           => $this->input->post('atitude'),
			'latitude'          => $this->input->post('latitude'),
			'point'          	=> $pointPetani,
          );

        //$this->Cpcl_model->update($this->input->post('id_cpcl'),$data);
		// pengajuan untuk diverifikasi
		  //$data2 = array(
          //  'id_users'        	=> $this->session->userdata('id_users'),
		  //  'name'        		=> $this->session->userdata('name'),
          //  'nama_perusahaan'	=> $this->session->userdata('nama_perusahaan'),
          //  'jenis_verifikasi'	=> "PKS",
          //  'id_r_jverifikasi'  => $result['id_cpcl'],
          //);
		  
		  //$this->R_verifikasi->insert($data2);
		  // update poktan
		//$this->poktan_model->update($idPoktan, array('id_cpcl'=>$this->input->post('id_cpcl')));
		//$this->saprodi->update(array('id_poktan' => $idPoktan), array('id_cpcl' => $this->input->post('id_cpcl')));
		//$this->person->update(array('id_cpcl' => $this->input->post('id_cpcl')), array('is_active' => '1'));
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
        redirect('cpcl/daftarriph/'.$this->input->post('id_mst_riph'));
      
    }
  }
  
    function aju_verifikasi($idc)
  {
    is_login();
    is_update();

    $this->data['user']     = $this->Cpcl_model->get_all_cpcl_by_idcpcl($idc);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Update '.$this->data['module'];
      $this->data['action']     = 'cpcl/aju_verifikasi_action';

      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
	  $this->data['get_all_marker_cpcl'] = $this->Cpcl_model->get_all_marker_cpcl($idc);
	  $this->data['get_all_poktan'] = $this->poktan_model->get_by_users($this->session->userdata('id_users'));

      $this->data['id_cpcl'] = [
      'name'          => 'id_cpcl',
      'id'            => 'id_cpcl',
      'type'          => 'hidden',
	  ];
	  $this->data['id_mst_riph'] = [
      'name'          => 'id_mst_riph',
      'id'            => 'id_mst_riph',
      'type'          => 'hidden',
    ];
	$this->data['id_poktan'] = [
      'name'          => 'id_poktan',
      'id'            => 'id_poktan',
      'type'          => 'hidden',
	  ];
	$this->data['id_users'] = [
      'name'          => 'id_users',
      'type'          => 'hidden',
    ];	
	$this->data['no_pks'] = [
      'name'          => 'no_pks',
      'id'            => 'no_pks',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
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
	$this->data['tgl_awal_perjanjian'] = [
      'name'          => 'tgl_awal_perjanjian',
      'id'            => 'tgl_awal_perjanjian',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['tgl_akhir_perjanjian'] = [
      'name'          => 'tgl_akhir_perjanjian',
      'id'            => 'tgl_akhir_perjanjian',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['luas_rencana_tanam'] = [
      'name'          => 'luas_rencana_tanam',
      'id'            => 'luas_rencana_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['rencana_produksi'] = [
      'name'          => 'rencana_produksi',
      'id'            => 'rencana_produksi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['provinsi'] = [
      'name'          => 'provinsi',
      'id'            => 'provinsi',
      'class'         => 'form-control',
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
    $this->data['point'] = [
      'name'          => 'point',
      'id'            => 'point',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];

      $this->load->view('back/cpcl/cpcl_verifikasi', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('cpcl/daftarriph/'.$this->input->post('id_mst_riph'));
    }

  }

  function aju_verifikasi_action()
  {
	$this->form_validation->set_rules('no_pks', 'Nomor PKS', 'trim|required');
    $this->form_validation->set_rules('renc_luas_tanam', 'Rencana Luas Tanam', 'trim|is_numeric');
    //$this->form_validation->set_rules('renc_tgl_tanam', 'Rencana Tanggal Tanam', 'trim|required');
    //$this->form_validation->set_rules('varietas', 'Varietas', 'required');
    //$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
    //$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
    //$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
    //$this->form_validation->set_rules('desa', 'Desa', 'required');
	//$this->form_validation->set_rules('nama_pelaksana_pelaksana', 'Pelaksana', 'required');
	//$this->form_validation->set_rules('status_lahan', 'Status Lahan', 'required');
	//$this->form_validation->set_rules('kontur_lahan', 'Kontur Lahan', 'required');

    $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_cpcl'));
    }
    else
    {
      if($_FILES['lampiran']['error'] <> 4)
      {
        $nmfile = strtolower($this->session->userdata('id_users')).'_lam_'.$this->input->post('id_mst_riph').'_'.date('YmdHis');

        $config5['upload_path']      = './uploads/pks/';
        $config5['allowed_types']    = 'jpg|jpeg|png|pdf';
        $config5['max_size']         = 2048; // 2Mb
        $config5['file_name']        = $nmfile;
        $this->load->library('upload', $config5);
		$this->upload->initialize($config5);

        $delete = $this->Cpcl_model->get_by_id($this->input->post('id_cpcl'));

        $dir        = "./uploads/pks/".$delete->lampiran;
        $dir_thumb  = "./uploads/pks/".$delete->lampiran_thumb;

        if(is_file($dir))
        {
          unlink($dir);
          unlink($dir_thumb);
        }

        if(!$this->upload->do_upload('lampiran'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->update($this->input->post('id_cpcl'));
        }
        else
        {
          $lampiran = $this->upload->data();

          $config6['image_library']    = 'gd2';
          $config6['source_image']     = './uploads/pks/'.$lampiran['file_name'].'';
          $config6['create_thumb']     = TRUE;
          $config6['maintain_ratio']   = TRUE;
          $config6['width']            = 250;
          $config6['height']           = 250;

          $this->load->library('image_lib', $config6);
          $this->image_lib->resize();
          $data = array(
			'lampiran'             => $this->upload->data('file_name'),
            'lampiran_thumb'       => $nmfile.'_thumb'.$this->upload->data('file_ext'),
          );

          $this->Cpcl_model->update($this->input->post('id_cpcl'),$data);
		  // pengajuan untuk diverifikasi
        }
      }
	  if($_FILES['lampiran2']['error'] <> 4)
      {
        $nmfile2 = strtolower($this->session->userdata('id_users')).'_lam2_'.$this->input->post('id_mst_riph').'_'.date('YmdHis');

        $config['upload_path']      = './uploads/pks/';
        $config['allowed_types']    = 'jpg|jpeg|png|pdf';
        $config['max_size']         = 2048; // 2Mb
        $config['file_name']        = $nmfile2;
        $this->load->library('upload', $config);
		$this->upload->initialize($config);

        $delete = $this->Cpcl_model->get_by_id($this->input->post('id_cpcl'));

        $dir        = "./uploads/pks/".$delete->lampiran;
        $dir_thumb  = "./uploads/pks/".$delete->lampiran_thumb;

        if(is_file($dir))
        {
          unlink($dir);
          unlink($dir_thumb);
        }

        if(!$this->upload->do_upload('lampiran2'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->update($this->input->post('id_cpcl'));
        }
        else
        {
          $lampiran2 = $this->upload->data();

          $config['image_library']    = 'gd2';
          $config['source_image']     = './uploads/pks/'.$lampiran2['file_name'].'';
          $config['create_thumb']     = TRUE;
          $config['maintain_ratio']   = TRUE;
          $config['width']            = 250;
          $config['height']           = 250;

          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
          $data = array(
			'lampiran2'             => $this->upload->data('file_name'),
            'lampiran2_thumb'       => $nmfile.'_thumb'.$this->upload->data('file_ext'),
          );

          $this->Cpcl_model->update($this->input->post('id_cpcl'),$data);
		  // pengajuan untuk diverifikasi
        }
      }
	  $data2 = array(
            'id_users'        	=> $this->session->userdata('id_users'),
		    'name'        		=> $this->session->userdata('name'),
            'nama_perusahaan'	=> $this->session->userdata('nama_perusahaan'),
            'jenis_verifikasi'	=> "PKS",
            'id_r_jverifikasi'  => $this->input->post('id_cpcl'),
          );
		  
	  $this->R_verifikasi->insert($data2);
	  $this->Cpcl_model->update($this->input->post('id_cpcl'),array('is_aju_verifikasi'=>'1'));
		  // update poktan
	  redirect('cpcl/daftarriph/'.$this->input->post('id_mst_riph'));
    }
  }
  
	public function ajax_list($idpoktan)
	{
		$list = $this->person->get_by_id_cpcl($idpoktan);
		$data = array();
		$no = $_POST['start'];
		$lat = "";$lng="";
		foreach ($list as $person) {
			$querylatlng = $this->db->get_where('wilayah_kabupaten',array('id'=>$person->kabupaten));
			foreach ($querylatlng->result() as $value) {
				$lat = $value->lat;
				$lng = $value->lng;
			}
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $idpoktan;
			$row[] = $person->id_petani;
			$row[] = $person->nik;
			$row[] = $person->nama_petani;
			$row[] = $person->atitude;
			$row[] = $person->latitude;
			$row[] = $person->file_kml;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary btn-fab" href="#" title="Isi Data Rencana" onclick="edit_person('."'".$person->id_petani."'".')"><i class="icon icon-account-card-details"></i></a>
				  <a class="btn btn-sm btn-primary btn-fab" href="#" title="Isi Posisi" onclick="edit_personPeta('."'".$person->id_petani."','".$lat."','".$lng."'".')"><i class="icon icon-google-maps"></i></a>';
			//	  <a class="btn btn-sm btn-danger btn-fab" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id_petani."'".')"><i class="icon icon-delete-empty"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->person->count_all(),
						"recordsFiltered" => $this->person->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	public function ajax_list_peta($idcpcl)
	{
		$list = $this->lokasi->get_by_id_cpcl($idcpcl);
   
    
		$data = array();
		$no = $_POST['start'];
		$lat = "";$lng="";
		if(!empty($list)){
			foreach ($list as $lokasi) {
				$querylatlng = $this->db->get_where('wilayah_kabupaten',array('id'=>$lokasi->kabupaten));
				foreach ($querylatlng->result() as $value) {
					$lat = $value->lat;
					$lng = $value->lng;
				}
				$no++;
        $isaction = '<a  class="btn btn-sm btn-primary btn-fab" href="#" title="Isi Data Rencana" onclick="edit_person('."'".$lokasi->id_lokasi."'".')"><i class="icon icon-account-card-details"></i></a>
        <a class="btn btn-sm btn-primary btn-fab" href="#" title="Isi Posisi" onclick="edit_personPeta('."'".$lokasi->id_lokasi."','".$lat."','".$lng."'".')"><i class="icon icon-google-maps"></i></a>';
    
        $data[] = array (
					'no' => $no,
          'id_poktan' => $lokasi->id_poktan,
					'id_lokasi' => $lokasi->id_lokasi,
					'id_petani' => $lokasi->id_petani,
					'nik' => $lokasi->nik,
					'nama_petani' => $lokasi->nama_petani,
					'rencana_luas_tanam' => $lokasi->rencana_luas_tanam,
					'atitude' => $lokasi->atitude,
					'latitude' => $lokasi->latitude,
					'file_kml' => $lokasi->file_kml,
					'action' => $isaction,
				);
				
			}
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => count($data),
						"recordsFiltered" => count($data),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	public function ajax_list_saprodi($id)
	{
		//$list = $this->saprodi->get_by_id_poktan($idpoktan);
		$list = $this->saprodi->get_by_id_cpcl($id);
		$data = array();
		$no = $_POST['start'];
		$lat = "";$lng="";
		foreach ($list as $saprodi) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $saprodi->komponen;
			$row[] = $saprodi->qty;
			$row[] = $saprodi->satuan;
			$row[] = $this->rupiah($saprodi->harga);
			$row[] = $this->rupiah($saprodi->qty * $saprodi->harga);
			$row[] = $saprodi->qty * $saprodi->harga;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary btn-fab" href="#" title="Isi Posisi" onclick="edit_saprodi('."'".$saprodi->id_saprodi."'".')"><i class="icon icon-lead-pencil"></i></a>
				  <a class="btn btn-sm btn-danger btn-fab" href="#" title="Hapus" onclick="delete_saprodi('."'".$saprodi->id_saprodi."'".')"><i class="icon icon-delete-empty"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => count($data),
						"recordsFiltered" => count($data),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	public function ajax_add()
	{
		$this->_validate2();
		$data = array(
				'id_poktan' => $this->input->post('id_poktan'),
				'nik' => $this->input->post('nik'),
				'id_cpcl' => $this->input->post('id_cpcl'),
				'nama_poktan' => $this->session->userdata('nama_perusahaan'),
				'nama_petani' => $this->input->post('nama_petani'),
				'provinsi' => substr($this->input->post('provinsi2'),0,2),
				'kabupaten' => substr($this->input->post('kabupaten2'),0,4),
				'kecamatan' => $this->input->post('kecamatan2'),
				'desa' => $this->input->post('desa2'),
				'alamat' => $this->input->post('alamat')
			);
		$insert = $this->person->save($data);
		
		$this->db->select_max('id_petani');
        $result = $this->db->get('petani')->row_array();	
		$data2 = array(
				'id_petani' => $result['id_petani'],
				'id_poktan' => $this->input->post('id_poktan'),
				'nik' => $this->input->post('nik'),
				'id_cpcl' => $this->input->post('id_cpcl'),
				'nama_poktan' => $this->input->post('nama_poktan'),
				'nama_petani' => $this->input->post('nama_petani'),
				'provinsi' => substr($this->input->post('provinsi2'),0,2),
				'kabupaten' => substr($this->input->post('kabupaten2'),0,4),
				'kecamatan' => $this->input->post('kecamatan2'),
				'desa' => $this->input->post('desa2'),
				'alamat' => $this->input->post('alamat')
			);
		$insert = $this->lokasi->save($data2);
		echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_add2()
	{
		$this->_validate3();
		$petani = $this->person->get_by_id_r($this->input->post('petani'));
		$namaPoktan="";$namaPetani = "";$nikPetani = "";$ProvPetani="";$KabPetani = "";$KecPetani = "";$DesPetani = "";$AlmPetani = "";
		if(!empty($petani)){
			foreach($petani as $dataPetani){
				$namaPetani = $dataPetani->nama_petani;
				$nikPetani = $dataPetani->nik;
				$ProvPetani = $dataPetani->provinsi;
				$KabPetani = $dataPetani->kabupaten;
				$KecPetani = $dataPetani->kecamatan;
				$DesPetani = $dataPetani->desa;
				$AlmPetani = $dataPetani->alamat;
			}
		}
		$poktan = $this->poktan_model->get_by_id_r($this->input->post('id_poktan'));
		if(!empty($poktan)){
			foreach($poktan as $dataPoktan){
				$namaPoktan = $dataPoktan->nama_poktan;
			}
		}
		$data = array(
				'id_poktan' => $this->input->post('id_poktan'),
				'nik' => $nikPetani,
				'id_cpcl' => $this->input->post('id_cpcl'),
				'nama_poktan' => $namaPoktan,
				'nama_petani' => $namaPetani,
				'provinsi' => $ProvPetani,
				'kabupaten' => $KabPetani,
				'kecamatan' => $KecPetani,
				'desa' => $DesPetani,
				'alamat' => $AlmPetani
			);
		$insert = $this->lokasi->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_edit($id)
	{
		$data = $this->lokasi->get_by_id($id);
		//$data->tgl_rencana_tanam = ($data->tgl_rencana_tanam == '00-00-0000') ? '' : $data->tgl_rencana_tanam; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}
	
	
	public function ajax_edit_petani($id)
	{
		$data = $this->person->get_by_id($id);
		//$data->tgl_rencana_tanam = ($data->tgl_rencana_tanam == '00-00-0000') ? '' : $data->tgl_rencana_tanam; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}
	
	public function ajax_edit_poktan($id)
	{
		$data = $this->poktan_model->get_by_id($id);
		//$data->tgl_rencana_tanam = ($data->tgl_rencana_tanam == '00-00-0000') ? '' : $data->tgl_rencana_tanam; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}
	
	public function ajax_edit_saprodi($id)
	{
		$data = $this->saprodi->get_by_id($id);
		//$data->tgl_rencana_tanam = ($data->tgl_rencana_tanam == '00-00-0000') ? '' : $data->tgl_rencana_tanam; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_update()
	{
		  $this->_validate();
			$data = array(
					'nama_lokasi' => $this->input->post('nama_lokasi'),
					'tgl_rencana_tanam' => $this->input->post('tgl_rencana_tanam'),
					'rencana_luas_tanam' => $this->input->post('rencana_luas_tanam'),
				);
			$this->lokasi->update(array('id_lokasi' => $this->input->post('id_lokasi')), $data);
			echo json_encode(array("status" => TRUE));
		
	}
	
	public function ajax_update_peta()
	{
    $status = "";
    if (empty($_FILES['file_kml']['tmp_name']))
    { 
      $status = "error";
    } else
    {
      if ( 0 < $_FILES['file_kml']['error'] ) {
          $status = "error";
      }
      else {
          $thefile = $_FILES['file_kml']['tmp_name'];
      }
    } 
		$file_element_name = 'file_kml';
    
		if($status != "error")
		{
			$nmfile = strtolower(url_title($this->input->post('id_petani'))).date('YmdHis');

			$config['upload_path']      = './uploads/kml/';
			$config['allowed_types']    = 'kml';
			$config['max_size']         = 2048; // 2Mb
			$config['file_name']        = $nmfile;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			$delete = $this->lokasi->get_by_id($this->input->post('id_lokasi'));

			$dir        = "./uploads/kml/".$delete->file_kml;

			if(is_file($dir))
			{
			  unlink($dir);
			}

			if(!$this->upload->do_upload($file_element_name))
			{
			  $error = array('error' => $this->upload->display_errors());
			  $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
			}
			else
			{
			  $file_kml = $this->upload->data();

			  $data = array(
				'atitude' => $this->input->post('atitude'),
				'latitude' => $this->input->post('latitude'),
				'file_kml' => $this->upload->data('file_name')
			  );
			$this->lokasi->update(array('id_lokasi' => $this->input->post('id_lokasi')), $data);
			@unlink($_FILES[$file_element_name]);
			echo json_encode(array("status" => TRUE));
			}
		}
		else
		{
			$data = array(
					'atitude' => $this->input->post('atitude'),
					'latitude' => $this->input->post('latitude')
				);
			$this->lokasi->update(array('id_lokasi' => $this->input->post('id_lokasi')), $data);
			echo json_encode(array("status" => TRUE));
		}
	}
	
	public function ajax_add_saprodi()
	{
		$this->_validate_saprodi();
		$data = array(
				'id_poktan' => $this->input->post('id_poktan'),
				'id_cpcl' => $this->input->post('id_cpcl'),
				'komponen' => $this->input->post('komponen'),
				'qty' => $this->input->post('qty'),
				'harga' => $this->input->post('harga'),
				'satuan' => $this->input->post('satuan'),
				'total_harga' => $this->input->post('qty')*$this->input->post('harga'),
			);
		$insert = $this->saprodi->save($data);
		echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_delete_saprodi($id)
	{
		$this->saprodi->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_update_saprodi()
	{
		$this->_validate_saprodi();
		$data = array(
				'komponen' => $this->input->post('komponen'),
				'qty' => $this->input->post('qty'),
				'satuan' => $this->input->post('satuan'),
				'harga' => $this->input->post('harga'),
				'total_harga' => $this->input->post('qty') * $this->input->post('harga'),
			);
		$this->saprodi->update(array('id_saprodi' => $this->input->post('id_saprodi')), $data);
		echo json_encode(array("status" => TRUE));
	}
	
	private function _validate_saprodi()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('komponen') == '')
		{
			$data['inputerror'][] = 'komponen';
			$data['error_string'][] = 'Komponen is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('qty') == '')
		{
			$data['inputerror'][] = 'qty';
			$data['error_string'][] = 'Jumlah / Banyaknya is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('satuan') == '')
		{
			$data['inputerror'][] = 'satuan';
			$data['error_string'][] = 'Satuan is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('harga') == '')
		{
			$data['inputerror'][] = 'harga';
			$data['error_string'][] = 'Harga is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	
	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('nama_lokasi') == '')
		{
			$data['inputerror'][] = 'nama_lokasi';
			$data['error_string'][] = 'Nama Lokasi is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('rencana_luas_tanam') == '')
		{
			$data['inputerror'][] = 'rencana_luas_tanam';
			$data['error_string'][] = 'Rencana Luas Tanam is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('tgl_rencana_tanam') == '')
		{
			$data['inputerror'][] = 'tgl_rencana_tanam';
			$data['error_string'][] = 'Rencana Tgl Tanam is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	
	private function _validate2()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id_poktan') == '')
		{
			$data['inputerror'][] = 'id_poktan';
			$data['error_string'][] = 'ID Poktan is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('nik') == '')
		{
			$data['inputerror'][] = 'nik';
			$data['error_string'][] = 'NIK is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama_petani') == '')
		{
			$data['inputerror'][] = 'nama_petani';
			$data['error_string'][] = 'Nama Petani is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('provinsi2') == '')
		{
			$data['inputerror'][] = 'provinsi2';
			$data['error_string'][] = 'provinsi is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('kabupaten2') == '')
		{
			$data['inputerror'][] = 'kabupaten2';
			$data['error_string'][] = 'kabupaten is required';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('kecamatan2') == '')
		{
			$data['inputerror'][] = 'kecamatan2';
			$data['error_string'][] = 'kecamatan is required';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('desa2') == '')
		{
			$data['inputerror'][] = 'desa2';
			$data['error_string'][] = 'desa is required';
			$data['status'] = FALSE;
		}
		
		
		if($this->input->post('alamat') == '')
		{
			$data['inputerror'][] = 'alamat';
			$data['error_string'][] = 'alamat is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	
	private function _validate3()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id_poktan') == '')
		{
			$data['inputerror'][] = 'id_poktan';
			$data['error_string'][] = 'ID Poktan is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('provinsi3') == '')
		{
			$data['inputerror'][] = 'provinsi3';
			$data['error_string'][] = 'provinsi is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('kabupaten3') == '')
		{
			$data['inputerror'][] = 'kabupaten3';
			$data['error_string'][] = 'kabupaten is required';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('kecamatan3') == '')
		{
			$data['inputerror'][] = 'kecamatan3';
			$data['error_string'][] = 'kecamatan is required';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('desa3') == '')
		{
			$data['inputerror'][] = 'desa3';
			$data['error_string'][] = 'desa is required';
			$data['status'] = FALSE;
		}
		
		
		if($this->input->post('alamat') == '')
		{
			$data['inputerror'][] = 'alamat';
			$data['error_string'][] = 'alamat is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	
	public function rupiah($angka)
	{
		$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
		return $hasil_rupiah;
	}
	
	function add_ajax_petani($id_poktan){
		    $query = $this->db->get_where('petani',array('id_poktan'=>$id_poktan));
		    $data = "<option value=''> - Pilih Petani - </option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id_petani."'>".$value->nama_petani."</option>";
		    }
		    echo $data;
		}
	
	public function generatePKS($idPks)
	{
		$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template.docx');
		$templateProcessor->setValues([
			'number' => '212/SKD/VII/2019',
			'name' => 'Alfa',
			'birthplace' => 'Bandung',
			'birthdate' => '4 Mei 1991',
			'gender' => 'Laki-Laki',
			'religion' => 'Islam',
			'address' => 'Jln. ABC no 12',
			'date' => date('Y-m-d'),
		]);

		header("Content-Disposition: attachment; filename=template.docx");

		$templateProcessor->saveAs('php://output');
	}
}
