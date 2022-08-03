<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Riph extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'RIPH';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();

    $this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
    $this->data['btn_add']    = 'Add New Data';
	$this->data['btn_back']    = 'Back To List';
	$this->load->model('Riph_model');
	$this->load->model('r_verifikasi');
    $this->data['add_action'] = base_url('riph/create');
    $this->data['back_action'] = base_url('riph');
  }

  function index()
  {
    is_login();
    is_read();
    $this->data['page_title'] = 'Daftar '.$this->data['module'];
    $this->data['get_all_riph'] = $this->Riph_model->get_all_riph();
	$this->data['get_jml_verifikasi'] = $this->r_verifikasi->get_jml_r_verifikasi();
    $this->load->view('back/riph/riph_list', $this->data);
  }

  function create()
  {
    is_login();
    is_create();

    $this->data['page_title'] = 'Create New '.$this->data['module'];
    $this->data['action']     = 'riph/create_action';
	
	$this->data['get_jml_verifikasi'] = $this->r_verifikasi->get_jml_r_verifikasi();

	$this->data['no_riph'] = [
      'name'          => 'no_riph',
      'id'            => 'no_riph',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('no_riph'),
    ];
    $this->data['nama_perusahaan'] = [
      'name'          => 'nama_perusahaan',
      'id'            => 'nama_perusahaan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('nama_perusahaan'),
    ];
	$this->data['tgl_terbit_riph'] = [
      'name'          => 'tgl_terbit_riph',
      'id'            => 'tgl_terbit_riph',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('tgl_terbit_riph'),
    ];
	$this->data['tgl_max_lunas'] = [
      'name'          => 'tgl_max_lunas',
      'id'            => 'tgl_max_lunas',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('tgl_max_lunas'),
    ];
	$this->data['v_pengajuan'] = [
      'name'          => 'v_pengajuan',
      'id'            => 'v_pengajuan',
      'class'         => 'form-control',
	  'onkeyup'		  => 'hitung()',
	  'value'         => $this->form_validation->set_value('v_pengajuan'),
    ];
    $this->data['target_produksi'] = [
      'name'          => 'target_produksi',
      'id'            => 'target_produksi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('target_produksi'),
    ];
	$this->data['target_tanam'] = [
      'name'          => 'target_tanam',
      'id'            => 'target_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('target_tanam'),
    ];
    $this->load->view('back/riph/riph_add', $this->data);

  }

  function create_action()
  {
    $this->form_validation->set_rules('tgl_max_lunas', 'Tanggal Maksimal Pelunasan', 'trim|required');
	$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
	$this->form_validation->set_rules('v_pengajuan', 'Volume Pengajuan', 'required');

    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->create();
    }
    else
    {
        $data = array(
			'no_riph'	=> $this->input->post('no_riph'),
            'nama_perusahaan'	=> $this->input->post('nama_perusahaan'),
            'tgl_terbit_riph' 	=> date('Y-m-d H:i:s',strtotime($this->input->post('tgl_terbit_riph'))),
            'tgl_max_lunas' 	=> date('Y-m-d H:i:s',strtotime($this->input->post('tgl_max_lunas'))),
            'v_pengajuan'		=> $this->input->post('v_pengajuan'),
			'target_produksi'   => $this->input->post('target_produksi'),
			'target_tanam'      => $this->input->post('target_tanam'),
        );

        $this->Riph_model->insert($data);

        $this->db->select_max('id_riph');
        $result = $this->db->get('riph')->row_array();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('riph');
    }
  }

  function update($idc)
  {
    is_login();
    is_update();

    $this->data['user']     = $this->Riph_model->get_by_id($idc);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Update '.$this->data['module'];
      $this->data['action']     = 'riph/update_action';
	  $this->data['get_jml_verifikasi'] = $this->r_verifikasi->get_jml_r_verifikasi();
	  
      $this->data['no_riph'] = [
      'name'          => 'no_riph',
      'id'            => 'no_riph',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
    $this->data['nama_perusahaan'] = [
      'name'          => 'nama_perusahaan',
      'id'            => 'nama_perusahaan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['tgl_terbit_riph'] = [
      'name'          => 'tgl_terbit_riph',
      'id'            => 'tgl_terbit_riph',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['tgl_max_lunas'] = [
      'name'          => 'tgl_max_lunas',
      'id'            => 'tgl_max_lunas',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['v_pengajuan'] = [
      'name'          => 'v_pengajuan',
      'id'            => 'v_pengajuan',
      'class'         => 'form-control',
	  'onkeyup'		  => 'hitung()',
    ];
    $this->data['target_produksi'] = [
      'name'          => 'target_produksi',
      'id'            => 'target_produksi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['target_tanam'] = [
      'name'          => 'target_tanam',
      'id'            => 'target_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
      $this->load->view('back/riph/riph_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('riph');
    }

  }

  function update_action()
  {
    $this->form_validation->set_rules('tgl_max_lunas', 'Tanggal Maksimal Pelunasan', 'trim|required');
	$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
	$this->form_validation->set_rules('volume_riph', 'Volume Pengajuan', 'required');

    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_riph'));
    }
    else
    {
        $data = array(
			'no_riph'	=> $this->input->post('no_riph'),
            'nama_perusahaan'	=> $this->input->post('nama_perusahaan'),
            'tgl_terbit_riph' 	=> date('Y-m-d H:i:s',strtotime($this->input->post('tgl_terbit_riph'))),
            'tgl_max_lunas' 	=> date('Y-m-d H:i:s',strtotime($this->input->post('tgl_max_lunas'))),
            'v_pengajuan'		=> $this->input->post('v_pengajuan'),
			'target_produksi'   => $this->input->post('target_produksi'),
			'target_tanam'      => $this->input->post('target_tanam'),
        );

        $this->Riph_model->update($this->input->post('id_riph'),$data);

        $this->write_log();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
        redirect('riph');
      
    }
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
