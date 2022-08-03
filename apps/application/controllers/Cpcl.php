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

    $this->data['module'] = 'PKS';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();

    $this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
    $this->data['btn_add']    = 'Add New Data';
	$this->data['btn_back']    = 'Back To List';
	$this->load->model('m_wilayah');
	$this->load->model('Cpcl_model');
	$this->load->model('R_verifikasi');
    $this->data['add_action'] = base_url('cpcl/create');
	$this->data['back_action'] = base_url('cpcl');
  }

  function index()
  {
    is_login();
    is_read();
    $this->data['page_title'] = 'Daftar '.$this->data['module'];
    $this->data['get_all_cpcl_by_iduser'] = $this->Cpcl_model->get_all_cpcl_by_iduser();
	$this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
    $this->load->view('back/cpcl/cpcl_list', $this->data);
  }

  function create()
  {
    is_login();
    is_create();

    $this->data['page_title'] = 'Create New '.$this->data['module'];
    $this->data['action']     = 'cpcl/create_action';
	
	$this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();

    $this->data['id_cpcl'] = [
      'name'          => 'id_cpcl',
      'id'            => 'id_cpcl',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('id_cpcl'),
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
      'value'         => $this->form_validation->set_value('tgl_rencana_tanam'),
    ];
	$this->data['luas_rencana_tanam'] = [
      'name'          => 'luas_rencana_tanam',
      'id'            => 'luas_rencana_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('luas_rencana_tanam'),
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
      'value'         => $this->form_validation->set_value('kabupaten'),
    ];
	$this->data['kecamatan'] = [
      'name'          => 'kecamatan',
      'id'            => 'kecamatan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('kecamatan'),
    ];
	$this->data['desa'] = [
      'name'          => 'desa',
      'id'            => 'desa`',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('desa'),
    ];
    $this->data['address'] = [
      'name'          => 'address',
      'id'            => 'address',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'rows'           => '3',
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
      'required'      => '',
      'value'         => $this->form_validation->set_value('atitude'),
    ];
    $this->data['latitude'] = [
      'name'          => 'latitude',
      'id'            => 'latitude',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('latitude'),
    ];
	$this->data['filekml'] = [
      'name'          => 'filekml',
      'id'            => 'filekml',
      'class'         => 'form-control',
    ];
    $this->load->view('back/cpcl/cpcl_add', $this->data);

  }

  function create_action()
  {
    $this->form_validation->set_rules('luas_rencana_tanam', 'Rencana Luas Tanam', 'trim|is_numeric');
    $this->form_validation->set_rules('tgl_rencana_tanam', 'Rencana Tanggal Tanam', 'trim|required');
    //$this->form_validation->set_rules('varietas', 'Varietas', 'required');
    $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
    $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
    $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
    $this->form_validation->set_rules('desa', 'Desa', 'required');
	//$this->form_validation->set_rules('nama_pelaksana', 'Pelaksana', 'required');
	//$this->form_validation->set_rules('status_lahan', 'Status Lahan', 'required');
	$this->form_validation->set_rules('atitude', 'Latitude', 'required');
	$this->form_validation->set_rules('latitude', 'Longitude', 'required');
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

      if($_FILES['lampiran']['error'] <> 4)
      {
        $nmfile = strtolower(url_title($this->input->post('username'))).'_lam_'.date('YmdHis');

        $config['upload_path']      = './uploads/user/';
        $config['allowed_types']    = 'jpg|jpeg|png|pdf|docx|doc';
        $config['max_size']         = 2048; // 2Mb
        $config['file_name']        = $nmfile;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

        if(!$this->upload->do_upload('lampiran'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->create();
        }
        else
        {
          $lampiran = $this->upload->data();
		  $Cariektensi = explode(".", $lampiran['file_name']);	
		  $ektensi = $Cariektensi[1];
		  if($ektensi == "pdf"){
			  $filethumb = "pdf_thumb.png";
		  }
		  elseif($ektensi == "docx"){
			  $filethumb = "docx_thumb.png";
		  }
		  elseif($ektensi == "doc"){
			  $filethumb = "docx_thumb.png";
		  }
		  else
		  {
          $thumbnail                  = $config['file_name'];

          $config['image_library']    = 'gd2';
          $config['source_image']     = './uploads/user/'.$lampiran['file_name'].'';
          $config['create_thumb']     = TRUE;
          $config['maintain_ratio']   = TRUE;
          $config['width']            = 250;
          $config['height']           = 250;

          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
		  $filethumb = $nmfile.'_thumb'.$this->upload->data('file_ext');
		  }
		  if(empty($this->input->post('nama_pelaksana'))) {
			  $namapelaksanya = $this->session->userdata('nama_perusahaan');
		  }
		  else
		  {
			  $namapelaksanya = $this->input->post('nama_pelaksana');
		  }
          $data = array(
            'id_users'        	=> $this->session->userdata('id_users'),
            'nama_perusahaan'	=> $this->session->userdata('nama_perusahaan'),
            'type_pelaksana'	=> $this->input->post('type_pelaksana'),
            'nama_pelaksana'    => $namapelaksanya,
			'varietas'          => "Bawang Putih",
            'tgl_rencana_tanam' => date('Y-m-d H:i:s',strtotime($this->input->post('tgl_rencana_tanam'))),
            'luas_rencana_tanam'=> $this->input->post('luas_rencana_tanam'),
			'status_lahan'      => $this->input->post('status_lahan'),
			'kontur_lahan'      => $this->input->post('kontur_lahan'),            
            'provinsi'          => $this->input->post('provinsi'),
            'kabupaten'         => $this->input->post('kabupaten'),
            'kecamatan'         => $this->input->post('kecamatan'),
            'desa'              => $this->input->post('desa'),
			'atitude'           => $this->input->post('atitude'),
			'latitude'          => $this->input->post('latitude'),
            'lampiran'             => $this->upload->data('file_name'),
            'lampiran_thumb'       => $filethumb,
          );
		  
          $this->Cpcl_model->insert($data);

          $this->db->select_max('id_cpcl');
          $result = $this->db->get('cpcl')->row_array();
		  $data2 = array(
            'id_users'        	=> $this->session->userdata('id_users'),
			'name'        		=> $this->session->userdata('name'),
            'nama_perusahaan'	=> $this->session->userdata('nama_perusahaan'),
            'jenis_verifikasi'	=> "PKS",
            'id_r_jverifikasi'  => $result['id_cpcl'],
          );
		  
		  $this->R_verifikasi->insert($data2);

          $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
          redirect('cpcl');
        }
      }
      else
      {
        if(empty($this->input->post('nama_pelaksana'))) {
			  $namapelaksanya = $this->session->userdata('nama_perusahaan');
		  }
		  else
		  {
			  $namapelaksanya = $this->input->post('nama_pelaksana');
		  }
          $data = array(
            'id_users'        	=> $this->session->userdata('id_users'),
            'nama_perusahaan'	=> $this->session->userdata('nama_perusahaan'),
            'type_pelaksana'	=> $this->input->post('type_pelaksana'),
            'nama_pelaksana'    => $namapelaksanya,
			'varietas'          => "Bawang Putih",
            'tgl_rencana_tanam' => date('Y-m-d H:i:s',strtotime($this->input->post('tgl_rencana_tanam'))),
            'luas_rencana_tanam'=> $this->input->post('luas_rencana_tanam'),
			'status_lahan'      => $this->input->post('status_lahan'),
			'kontur_lahan'      => $this->input->post('kontur_lahan'),            
            'provinsi'          => $this->input->post('provinsi'),
            'kabupaten'         => $this->input->post('kabupaten'),
            'kecamatan'         => $this->input->post('kecamatan'),
            'desa'              => $this->input->post('desa'),
			'atitude'           => $this->input->post('atitude'),
			'latitude'          => $this->input->post('latitude'),
            'lampiran'             => $this->upload->data('file_name'),
            'lampiran_thumb'       => $nmfile.'_thumb'.$this->upload->data('file_ext'),
          );

        $this->Cpcl_model->insert($data);

        $this->db->select_max('id_users');
        $result = $this->db->get('cpcl')->row_array();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('cpcl');
      }
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

      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
	  $this->data['get_all_combobox_kabupaten'] = $this->m_wilayah->get_all_kabupaten();
	  $this->data['get_all_combobox_kecamatan'] = $this->m_wilayah->get_all_kecamatan();
	  $this->data['get_all_combobox_desa'] = $this->m_wilayah->get_all_desa();

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

      $this->load->view('back/cpcl/cpcl_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('cpcl');
    }

  }

  function update_action()
  {
    $this->form_validation->set_rules('renc_luas_tanam', 'Rencana Luas Tanam', 'trim|is_numeric');
    //$this->form_validation->set_rules('renc_tgl_tanam', 'Rencana Tanggal Tanam', 'trim|required');
    //$this->form_validation->set_rules('varietas', 'Varietas', 'required');
    $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
    $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
    $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
    $this->form_validation->set_rules('desa', 'Desa', 'required');
	//$this->form_validation->set_rules('nama_pelaksana_pelaksana', 'Pelaksana', 'required');
	//$this->form_validation->set_rules('status_lahan', 'Status Lahan', 'required');
	$this->form_validation->set_rules('atitude', 'Atitude', 'required');
	$this->form_validation->set_rules('latitude', 'Latitude', 'required');
	//$this->form_validation->set_rules('lampiran', 'lampiran', 'required');
	
	//if (empty($_FILES['lampiran']['name'])){$this->form_validation->set_rules('lampiran', 'Scan / Photo Lampiran', 'required');}

    $this->form_validation->set_message('required', '{field} wajib diisi');
    //$this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_cpcl'));
    }
    else
    {
      if($_FILES['lampiran']['error'] <> 4)
      {
        $nmfile = strtolower(url_title($this->input->post('username'))).'_lam_'.date('YmdHis');

        $config5['upload_path']      = './uploads/user/';
        $config5['allowed_types']    = 'jpg|jpeg|png';
        $config5['max_size']         = 2048; // 2Mb
        $config5['file_name']        = $nmfile;
        $this->load->library('upload', $config5);
		$this->upload->initialize($config5);

        $delete = $this->Cpcl_model->get_by_id($this->input->post('id_cpcl'));

        $dir        = "./uploads/user/".$delete->lampiran;
        $dir_thumb  = "./uploads/user/".$delete->lampiran_thumb;

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
          $config6['source_image']     = './uploads/user/'.$lampiran['file_name'].'';
          $config6['create_thumb']     = TRUE;
          $config6['maintain_ratio']   = TRUE;
          $config6['width']            = 250;
          $config6['height']           = 250;

          $this->load->library('image_lib', $config6);
          $this->image_lib->resize();
		  
		  if(empty($this->input->post('nama_pelaksana'))) {
			  $namapelaksanya = $this->session->userdata('nama_perusahaan');
		  }
		  else
		  {
			  $namapelaksanya = $this->input->post('nama_pelaksana');
		  }

          $data = array(
            'nama_perusahaan'	=> $this->session->userdata('nama_perusahaan'),
            'type_pelaksana'	=> $this->session->userdata('type_pelaksana'),
            'nama_pelaksana'    => $namapelaksanya,
			'varietas'          => "Bawang Putih",
            'tgl_rencana_tanam' => date('Y-m-d',strtotime($this->input->post('tgl_rencana_tanam'))),
            'luas_rencana_tanam'=> $this->input->post('luas_rencana_tanam'),
			'status_lahan'      => $this->input->post('status_lahan'),
			'kontur_lahan'      => $this->input->post('kontur_lahan'),            
            'provinsi'          => $this->input->post('provinsi'),
            'kabupaten'         => $this->input->post('kabupaten'),
            'kecamatan'         => $this->input->post('kecamatan'),
            'desa'              => $this->input->post('desa'),
			'atitude'           => $this->input->post('atitude'),
			'latitude'          => $this->input->post('latitude'),
            'lampiran'          => $this->upload->data('file_name'),
            'lampiran_thumb'    => $nmfile.'_thumb'.$this->upload->data('file_ext'),
          );

          $this->Cpcl_model->update($this->input->post('id_cpcl'),$data);

          //$this->write_log();

          $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
          redirect('cpcl');
        }
      }
      else
      {
		if(empty($this->input->post('nama_pelaksana'))) {
			  $namapelaksanya = $this->session->userdata('nama_perusahaan');
		  }
		  else
		  {
			  $namapelaksanya = $this->input->post('nama_pelaksana');
		  }

        $data = array(
          'nama_perusahaan'	=> $this->session->userdata('nama_perusahaan'),
            'type_pelaksana'	=> $this->session->userdata('type_pelaksana'),
            'nama_pelaksana'    => $namapelaksanya,
			'varietas'          => "Bawang Putih",
            'tgl_rencana_tanam' => date('Y-m-d H:i:s',strtotime($this->input->post('tgl_rencana_tanam'))),
            'luas_rencana_tanam'=> $this->input->post('luas_rencana_tanam'),
			'status_lahan'      => $this->input->post('status_lahan'),
			'kontur_lahan'      => $this->input->post('kontur_lahan'),            
            'provinsi'          => $this->input->post('provinsi'),
            'kabupaten'         => $this->input->post('kabupaten'),
            'kecamatan'         => $this->input->post('kecamatan'),
            'desa'              => $this->input->post('desa'),
			'atitude'           => $this->input->post('atitude'),
			'latitude'          => $this->input->post('latitude'),
        );

        $this->Cpcl_model->update($this->input->post('id_cpcl'),$data);

        $this->write_log();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
        redirect('cpcl');
      }
    }
  }

  function delete($id)
  {
    is_login();
    // is_delete();

    
    $delete = $this->Cpcl_model->get_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Cpcl_model->soft_delete($id, $data);

      //$this->write_log();

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

  function activate($id)
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

  function deactivate($id)
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
  
}
