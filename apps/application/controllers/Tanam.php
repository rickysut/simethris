<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Tanam extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'CP/CL';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();

    $this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
    $this->data['btn_add']    = 'Add New Data';
	$this->load->model('m_wilayah');
	$this->load->model('Tanam_model');
    $this->data['add_action'] = base_url('tanam/create');
  }

  function index()
  {
    is_login();
    is_read();

    $this->data['page_title'] = $this->data['module'].' List';

    $this->data['get_all'] = $this->Tanam_model->get_all();
	
	$this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();

    $this->load->view('back/tanam/tanam_list', $this->data);
  }

  function create()
  {
    is_login();
    is_create();

    $this->data['page_title'] = 'Create New '.$this->data['module'];
    $this->data['action']     = 'tanam/create_action';
	
	$this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
    //$this->data['get_all_combobox_usertype']     = $this->Usertype_model->get_all_combobox();
    //$this->data['get_all_combobox_data_access']  = $this->Dataaccess_model->get_all_combobox();

    //$this->data['id_users'] = [
    //  'name'          => 'id_users',
    //  'id'            => 'id_users',
    //  'class'         => 'form-control',
    //  'autocomplete'  => 'off',
    //  'required'      => '',
    //  'value'         => $this->form_validation->set_value('id_users'),
    //];
    //$this->data['name_users'] = [
    //  'name'          => 'name_users',
    //  'id'            => 'name_users',
    //  'class'         => 'form-control',
    //  'autocomplete'  => 'off',
    //  'value'         => $this->form_validation->set_value('name_users'),
    //];
    //$this->data['id_perusahaan'] = [
    //  'name'          => 'id_perusahaan',
    // 'id'            => 'id_perusahaan',
    //  'class'         => 'form-control',
    //  'autocomplete'  => 'off',
    //  'value'         => $this->form_validation->set_value('id_perusahaan'),
    //];
	$this->data['renc_luas_tanam'] = [
      'name'          => 'renc_luas_tanam',
      'id'            => 'renc_luas_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('renc_luas_tanam'),
    ];
	$this->data['renc_tgl_tanam'] = [
      'name'          => 'renc_tgl_tanam',
      'id'            => 'renc_tgl_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('renc_tgl_tanam'),
    ];
	$this->data['real_luas_tanam'] = [
      'name'          => 'real_luas_tanam',
      'id'            => 'real_luas_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('real_luas_tanam'),
    ];
	$this->data['real_tgl_tanam'] = [
      'name'          => 'real_tgl_tanam',
      'id'            => 'real_tgl_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('real_tgl_tanam'),
    ];
	$this->data['varietas'] = [
      'name'          => 'varietas',
      'id'            => 'varietas',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('varietas'),
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
    $this->data['id_pelaksana'] = [
      'name'          => 'id_pelaksana',
      'id'            => 'id_pelaksana',
      'class'         => 'form-control',
    ];
    $this->data['id_pelaksana_value'] = [
      '1'             => 'Swakelola',
      '2'             => 'Kemitraan',
    ];
    $this->data['id_petani'] = [
      'name'          => 'id_petani',
      'id'            => 'id_petani',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'rows'           => '3',
      'value'         => $this->form_validation->set_value('id_petani'),
    ];
    $this->data['id_petak'] = [
      'name'          => 'id_petak',
      'id'            => 'id_petak',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('id_petak'),
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
	$this->data['kontur_lahan'] = [
      'name'          => 'kontur_lahan',
      'id'            => 'kontur_lahan',
      'class'         => 'form-control',
    ];
    $this->data['kontur_lahan_value'] = [
      '1'             => 'Datar',
      '2'             => 'Miring',
    ];
    $this->load->view('back/tanam/tanam_add', $this->data);

  }

  function create_action()
  {
    //$this->form_validation->set_rules('name_users', 'Nama Pengguna', 'trim|required');
	//$this->form_validation->set_rules('id_perusahaan', 'ID Perusahaan', 'trim|required');
    $this->form_validation->set_rules('renc_luas_tanam', 'Rencana Luas Tanam', 'trim|is_numeric');
    $this->form_validation->set_rules('renc_tgl_tanam', 'Rencana Tanggal Tanam', 'trim|required');
    $this->form_validation->set_rules('varietas', 'Varietas', 'required');
    $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
    $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
    $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
    $this->form_validation->set_rules('desa', 'Desa', 'required');
	$this->form_validation->set_rules('id_pelaksana', 'Pelaksana', 'required');
	//$this->form_validation->set_rules('id_petani', 'Petani', 'required');
	$this->form_validation->set_rules('id_petak', 'petak', 'required');
	$this->form_validation->set_rules('status_lahan', 'Status Lahan', 'required');
	//$this->form_validation->set_rules('luas_lahan', 'Luas Lahan', 'trim|is_numeric|required');
	$this->form_validation->set_rules('atitude', 'Atitude', 'required');
	$this->form_validation->set_rules('latitude', 'Latitude', 'required');
	$this->form_validation->set_rules('kontur_lahan', 'Kontur Lahan', 'required');

    // $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->create();
    }
    else
    {

      if($_FILES['photo']['error'] <> 4)
      {
        $nmfile = strtolower(url_title($this->input->post('username'))).date('YmdHis');

        $config['upload_path']      = './assets/images/user/';
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = 2048; // 2Mb
        $config['file_name']        = $nmfile;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->create();
        }
        else
        {
          $photo = $this->upload->data();

          $thumbnail                  = $config['file_name'];

          $config['image_library']    = 'gd2';
          $config['source_image']     = './assets/images/user/'.$photo['file_name'].'';
          $config['create_thumb']     = TRUE;
          $config['maintain_ratio']   = TRUE;
          $config['width']            = 250;
          $config['height']           = 250;

          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $data = array(
            'name_users'        => $this->session->username,
            'id_perusahaan'     => $this->session->nama_perusahaan,
            'renc_luas_tanam'   => $this->input->post('renc_luas_tanam'),
            'renc_tgl_tanam'    => $this->input->post('renc_tgl_tanam'),
            'varietas'          => $this->input->post('varietas'),
            'provinsi'          => $this->input->post('provinsi'),
            'kabupaten'         => $this->input->post('kabupaten'),
            'kecamatan'         => $this->input->post('kecamatan'),
            'desa'              => $this->input->post('desa'),
            'id_pelaksana'      => $this->input->post('id_pelaksana'),
            'id_petani'         => $this->input->post('id_petani'),
            'id_petak'          => $this->input->post('id_petak'),
			'status_lahan'      => $this->input->post('status_lahan'),
			'luas_lahan'        => $this->input->post('luas_lahan'),
			'atitude'           => $this->input->post('atitude'),
			'latitude'          => $this->input->post('latitude'),
			'kontur_lahan'      => $this->input->post('kontur_lahan'),
            'photo'             => $this->upload->data('file_name'),
            'photo_thumb'       => $nmfile.'_thumb'.$this->upload->data('file_ext'),
          );

          $this->Tanam_model->insert($data);

          $this->db->select_max('id_users');
          $result = $this->db->get('users')->row_array();

          $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
          redirect('tanam');
        }
      }
      else
      {
        $data = array(
            'name_users'        => $this->session->username,
            'id_perusahaan'     => $this->session->userdata('nama_perusahaan'),
            'renc_luas_tanam'   => $this->input->post('renc_luas_tanam'),
            'renc_tgl_tanam'    => $this->input->post('renc_tgl_tanam'),
            'varietas'          => $this->input->post('varietas'),
            'provinsi'          => $this->input->post('provinsi'),
            'kabupaten'         => $this->input->post('kabupaten'),
            'kecamatan'         => $this->input->post('kecamatan'),
            'desa'              => $this->input->post('desa'),
            'id_pelaksana'      => $this->input->post('id_pelaksana'),
            'id_petani'         => $this->input->post('id_petani'),
            'id_petak'          => $this->input->post('id_petak'),
			'status_lahan'      => $this->input->post('status_lahan'),
			'luas_lahan'        => $this->input->post('luas_lahan'),
			'atitude'           => $this->input->post('atitude'),
			'latitude'          => $this->input->post('latitude'),
			'kontur_lahan'      => $this->input->post('kontur_lahan'),
            'photo'             => $this->upload->data('file_name'),
         //   'photo_thumb'       => $nmfile.'_thumb'.$this->upload->data('file_ext'),
        );

        $this->Tanam_model->insert($data);

        $this->db->select_max('id_users');
        $result = $this->db->get('users')->row_array();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('tanam');
      }
    }
  }

  function update($id)
  {
    is_login();
    is_update();

    $this->data['user']     = $this->Tanam_model->get_by_id($id);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Realisasi '.$this->data['module'];
      $this->data['action']     = 'tanam/update_action';

      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
	  $this->data['get_all_combobox_kabupaten'] = $this->m_wilayah->get_all_kabupaten();
	  $this->data['get_all_combobox_kecamatan'] = $this->m_wilayah->get_all_kecamatan();
	  $this->data['get_all_combobox_desa'] = $this->m_wilayah->get_all_desa();

      $this->data['renc_luas_tanam'] = [
      'name'          => 'renc_luas_tanam',
      'id'            => 'renc_luas_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['renc_tgl_tanam'] = [
      'name'          => 'renc_tgl_tanam',
      'id'            => 'renc_tgl_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['real_luas_tanam'] = [
      'name'          => 'real`_luas_tanam',
      'id'            => 'real_luas_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['real_tgl_tanam'] = [
      'name'          => 'real_tgl_tanam',
      'id'            => 'real_tgl_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['varietas'] = [
      'name'          => 'varietas',
      'id'            => 'varietas',
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
      'required'      => '',
    ];
	$this->data['kecamatan'] = [
      'name'          => 'kecamatan',
      'id'            => 'kecamatan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['desa'] = [
      'name'          => 'desa',
      'id'            => 'desa`',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['id_pelaksana'] = [
      'name'          => 'id_pelaksana',
      'id'            => 'id_pelaksana',
      'class'         => 'form-control',
    ];
    $this->data['id_pelaksana_value'] = [
      '1'             => 'Swakelola',
      '2'             => 'Kemitraan',
    ];
    $this->data['id_petani'] = [
      'name'          => 'id_petani',
      'id'            => 'id_petani',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'rows'           => '3',
      'required'      => '',
    ];
    $this->data['id_petak'] = [
      'name'          => 'id_petak',
      'id'            => 'id_petak',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
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
	$this->data['kontur_lahan'] = [
      'name'          => 'kontur_lahan',
      'id'            => 'kontur_lahan',
      'class'         => 'form-control',
    ];
    $this->data['kontur_lahan_value'] = [
      '1'             => 'Datar',
      '2'             => 'Miring',
    ];

      $this->load->view('back/tanam/tanam_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('tanam');
    }

  }

  function update_action()
  {
    $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
    $this->form_validation->set_rules('phone', 'Phone No', 'trim|is_numeric');
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
    $this->form_validation->set_rules('usertype', 'Usertype', 'required');
    $this->form_validation->set_rules('data_access_id[]', 'Data Access');

    // $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_users'));
    }
    else
    {

      if($_FILES['photo']['error'] <> 4)
      {
        $nmfile = strtolower(url_title($this->input->post('username'))).date('YmdHis');

        $config['upload_path']      = './assets/images/user/';
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = 2048; // 2Mb
        $config['file_name']        = $nmfile;

        $this->load->library('upload', $config);

        $delete = $this->Auth_model->get_by_id($this->input->post('id_users'));

        $dir        = "./assets/images/user/".$delete->photo;
        $dir_thumb  = "./assets/images/user/".$delete->photo_thumb;

        if(is_file($dir))
        {
          unlink($dir);
          unlink($dir_thumb);
        }

        if(!$this->upload->do_upload('photo'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->update($this->input->post('id_users'));
        }
        else
        {
          $photo = $this->upload->data();

          $config['image_library']    = 'gd2';
          $config['source_image']     = './assets/images/user/'.$photo['file_name'].'';
          $config['create_thumb']     = TRUE;
          $config['maintain_ratio']   = TRUE;
          $config['width']            = 250;
          $config['height']           = 250;

          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $data = array(
            'name_users'        => $this->session->username,
            'id_perusahaan'     => $this->session->nama_perusahaan,
            'renc_luas_tanam'   => $this->input->post('renc_luas_tanam'),
            'renc_tgl_tanam'    => $this->input->post('renc_tgl_tanam'),
            'varietas'          => $this->input->post('varietas'),
            'provinsi'          => $this->input->post('provinsi'),
            'kabupaten'         => $this->input->post('kabupaten'),
            'kecamatan'         => $this->input->post('kecamatan'),
            'desa'              => $this->input->post('desa'),
            'id_pelaksana'      => $this->input->post('id_pelaksana'),
            'id_petani'         => $this->input->post('id_petani'),
            'id_petak'          => $this->input->post('id_petak'),
			'status_lahan'      => $this->input->post('status_lahan'),
			'luas_lahan'        => $this->input->post('luas_lahan'),
			'atitude'           => $this->input->post('atitude'),
			'latitude'          => $this->input->post('latitude'),
			'kontur_lahan'      => $this->input->post('kontur_lahan'),
            'photo'             => $this->upload->data('file_name'),
            'photo_thumb'       => $nmfile.'_thumb'.$this->upload->data('file_ext'),
          );

          $this->Tanam_model->update($this->input->post('id_users'),$data);

          $this->write_log();

          $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
          redirect('tanam');
        }
      }
      else
      {
        $data = array(
          'name_users'        => $this->session->username,
            'id_perusahaan'     => $this->session->nama_perusahaan,
            'renc_luas_tanam'   => $this->input->post('renc_luas_tanam'),
            'renc_tgl_tanam'    => $this->input->post('renc_tgl_tanam'),
            'varietas'          => $this->input->post('varietas'),
            'provinsi'          => $this->input->post('provinsi'),
            'kabupaten'         => $this->input->post('kabupaten'),
            'kecamatan'         => $this->input->post('kecamatan'),
            'desa'              => $this->input->post('desa'),
            'id_pelaksana'      => $this->input->post('id_pelaksana'),
            'id_petani'         => $this->input->post('id_petani'),
            'id_petak'          => $this->input->post('id_petak'),
			'status_lahan'      => $this->input->post('status_lahan'),
			'luas_lahan'        => $this->input->post('luas_lahan'),
			'atitude'           => $this->input->post('atitude'),
			'latitude'          => $this->input->post('latitude'),
			'kontur_lahan'      => $this->input->post('kontur_lahan'),
            'photo'             => $this->upload->data('file_name'),
            'photo_thumb'       => $nmfile.'_thumb'.$this->upload->data('file_ext'),
        );

        $this->Tanam_model->update($this->input->post('id_users'),$data);

        $this->write_log();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
        redirect('tanam');
      }
    }
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

    $delete = $this->Tanam_model->get_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Tanam_model->soft_delete($id, $data);

      $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('tanam');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('tanam');
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

    $delete = $this->Tanam_model->get_by_id($id);

    if($delete)
    {
      $dir        = "./assets/images/user/".$delete->photo;
      $dir_thumb  = "./assets/images/user/".$delete->photo_thumb;

      if(is_file($dir))
      {
        unlink($dir);
        unlink($dir_thumb);
      }

      $this->Tanam_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('tanam/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('tanam');
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

    $this->load->view('back/tanam/tanam_deleted_list', $this->data);
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

    $row = $this->Auth_model->get_by_id($id);

    if($row)
    {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Auth_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('tanam/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('tanam');
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
    redirect('tanam');
  }

  function deactivate($id)
  {
    is_login();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->Tanam_model->update($this->uri->segment('3'), array('is_active'=>'0'));

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data deactivate successfully</div>');
    redirect('tanam');
  }

  function update_profile($id)
  {
    is_login();

    $this->data['user']     = $this->Tanam_model->get_by_id($id);

    if($id != $this->session->id_users)
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t change other user profile</div>');
      redirect('dashboard');
    }

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Update Profile';
      $this->data['action']     = 'auth/update_profile_action';

      $this->data['get_all_data_access_old']        = $this->Dataaccess_model->get_all_data_access_old($id);

      $this->data['id_users'] = [
        'name'          => 'id_users',
        'type'          => 'hidden',
      ];
      $this->data['name'] = [
        'name'          => 'name',
        'id'            => 'name',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['birthdate'] = [
        'name'          => 'birthdate',
        'id'            => 'birthdate',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
      ];
      $this->data['birthplace'] = [
        'name'          => 'birthplace',
        'id'            => 'birthplace',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
      ];
      $this->data['gender'] = [
        'name'          => 'gender',
        'id'            => 'gender',
        'class'         => 'form-control',
      ];
      $this->data['gender_value'] = [
        '1'             => 'Male',
        '2'             => 'Female',
      ];
      $this->data['address'] = [
        'name'          => 'address',
        'id'            => 'address',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'rows'           => '3',
      ];
      $this->data['phone'] = [
        'name'          => 'phone',
        'id'            => 'phone',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
      ];
      $this->data['email'] = [
        'name'          => 'email',
        'id'            => 'email',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['username'] = [
        'name'          => 'username',
        'id'            => 'username',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['usertype'] = [
        'name'          => 'usertype',
        'id'            => 'usertype',
        'class'         => 'form-control',
        'required'      => '',
      ];

      $this->load->view('back/auth/update_profile', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('dashboard');
    }
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

}
