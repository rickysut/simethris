<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riphadmin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'RIPH';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();

    $this->data['btn_submit'] = 'Simpan';
    $this->data['btn_reset']  = 'Ulang Data';
    $this->data['btn_add']    = 'Tambah Data Baru';
	$this->data['btn_back']    = 'Kembali ke Daftar';
	$this->load->model('Riph_model');
	$this->load->model('r_verifikasi');
	$this->load->model('ChatModel');
    $this->data['add_action'] = base_url('riphadmin/create');
    $this->data['back_action'] = base_url('riphadmin');
  }

  function index()
  {
    is_login();
    is_read();
    $this->data['page_title'] = 'Daftar '.$this->data['module'];
    $this->data['get_all_riph'] = $this->Riph_model->get_all_riph_admin();
    $this->load->view('back/riphadmin/riph_list', $this->data);
  }

  function create()
  {
    is_login();
    is_create();

    $this->data['page_title'] = 'Data '.$this->data['module'].' Periode Baru';
    $this->data['action']     = 'riphadmin/create_action';

	$this->data['tanggal'] = [
      'name'          => 'tanggal',
      'id'            => 'tanggal',
      'class'         => 'form-control',
	  'data-toggle'   => 'tooltip',
	  'title'         => 'isi dengan tanggal update terakhir',
	  'type'		  => 'datetime-local', 
      'value'         => $this->form_validation->set_value('tanggal'),
    ];
    $this->data['v_pengajuan_import'] = [
      'name'          => 'v_pengajuan_import',
      'id'            => 'v_pengajuan_import',
      'class'         => 'form-control',
	  'data-toggle'   => 'tooltip',
	  'title'         => 'isi dengan nilai volume import dalam satuan ton dengan 2 (dua) digit dibelakang koma',
      'autocomplete'  => 'off',
	  'onkeyup'		  => 'hitung()',
      'value'         => $this->form_validation->set_value('v_pengajuan_import'),
    ];
	$this->data['v_beban_tanam'] = [
      'name'          => 'v_beban_tanam',
      'id'            => 'v_beban_tanam',
      'class'         => 'form-control',
	  'data-toggle'   => 'tooltip',
	  'title'         => 'isi nilai pada kolom volume import. Nilai ini dihitung secara mandiri oleh sistem (auto calculate)',
	  'readonly'      => 'readonly',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('v_beban_tanam'),
    ];
	$this->data['v_beban_produksi'] = [
      'name'          => 'v_beban_produksi',
      'id'            => 'v_beban_produksi',
      'class'         => 'form-control',
	  'data-toggle'   => 'tooltip',
	  'title'         => 'isi nilai pada kolom volume import. Nilai ini dihitung secara mandiri oleh sistem (auto calculate)',
	  'readonly'      => 'readonly',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('v_beban_produksi'),
    ];
	$this->data['jml_importir'] = [
      'name'          => 'jml_importir',
      'id'            => 'jml_importir',
      'class'         => 'form-control',
	  'value'         => $this->form_validation->set_value('jml_importir'),
    ];
    $this->load->view('back/riphadmin/riph_add', $this->data);

  }

  function create_action()
  {
    $this->form_validation->set_rules('tanggal', 'Tanggal Update', 'trim|required');
	$this->form_validation->set_rules('v_pengajuan_import', 'Volume Import', 'required');
	$this->form_validation->set_rules('v_beban_tanam', 'Volume Beban Tanam', 'required');
	$this->form_validation->set_rules('v_beban_produksi', 'Volume Beban Produksi', 'required');
	$this->form_validation->set_rules('jml_importir', 'Jumlah Importir', 'required');

    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->create();
    }
    else
    {
        $data = array(
            'tanggal' 				=> date('Y-m-d H:i:s',strtotime($this->input->post('tanggal'))),
            'v_pengajuan_import'	=> $this->input->post('v_pengajuan_import'),
			'v_beban_tanam'   		=> $this->input->post('v_beban_tanam'),
			'v_beban_produksi'      => $this->input->post('v_beban_produksi'),
			'jml_importir'      	=> $this->input->post('jml_importir'),
        );

        $this->Riph_model->insertadmin($data);

        $this->write_log();

        $this->db->select_max('id_riph');
        $result = $this->db->get('riph_admin')->row_array();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('riphadmin');
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
      $this->data['action']     = 'riphadmin/update_action';
	  $this->data['get_jml_verifikasi'] = $this->r_verifikasi->get_jml_r_verifikasi();
	  
      $this->data['tanggal'] = [
      'name'          => 'tanggal',
      'id'            => 'tanggal',
      'class'         => 'form-control',
	  'type'		  => 'datetime-local', 
    ];
    $this->data['v_pengajuan_import'] = [
      'name'          => 'v_pengajuan_import',
      'id'            => 'v_pengajuan_import',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
	  'onkeyup'		  => 'hitung()',
    ];
	$this->data['v_beban_tanam'] = [
      'name'          => 'v_beban_tanam',
      'id'            => 'v_beban_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['v_beban_produksi'] = [
      'name'          => 'v_beban_produksi',
      'id'            => 'v_beban_produksi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['jml_importir'] = [
      'name'          => 'jml_importir',
      'id'            => 'jml_importir',
      'class'         => 'form-control',
    ];
      $this->load->view('back/riph/riph_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('riphadmin');
    }

  }

  function update_action()
  {
    $this->form_validation->set_rules('tanggal', 'Tanggal Update', 'trim|required');
	$this->form_validation->set_rules('v_pengajuan_import', 'Volume Import', 'required');
	$this->form_validation->set_rules('v_beban_tanam', 'Volume Beban Tanam', 'required');
	$this->form_validation->set_rules('v_beban_produksi', 'Volume Beban Produksi', 'required');
	$this->form_validation->set_rules('jml_importir', 'Jumlah Importir', 'required');

    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');


    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_riph'));
    }
    else
    {
        $data = array(
            'tanggal' 				=> date('Y-m-d H:i:s',strtotime($this->input->post('tanggal'))),
            'v_pengajuan_import'	=> $this->input->post('v_pengajuan_import'),
			'v_beban_tanam'   		=> $this->input->post('v_beban_tanam'),
			'v_beban_produksi'      => $this->input->post('v_beban_produksi'),
			'jml_importir'      	=> $this->input->post('jml_importir'),
        );

        $this->Riph_model->updateadmin($this->input->post('id_riph'),$data);

        $this->write_log();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
        redirect('riphadmin');
      
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
