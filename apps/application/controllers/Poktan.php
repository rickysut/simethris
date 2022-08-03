<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Load composer's autoloader
require 'vendor/autoload.php';

class Poktan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Poktan';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();

    $this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
    $this->data['btn_add']    = 'Add New Data';
	$this->load->model('m_wilayah');
	$this->load->model('poktan_model');
    $this->data['add_action'] = base_url('poktan/create');
  }

  function index()
  {
    is_login();
    is_read();

    $this->data['page_title'] = $this->data['module'].' List';

    $this->data['get_all'] = $this->poktan_model->get_all();
	
	$this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();

    $this->load->view('back/poktan/poktan_list', $this->data);
  }

  function create()
  {
    is_login();
    is_create();

    $this->data['page_title'] = 'Create New '.$this->data['module'];
    $this->data['action']     = 'poktan/create_action';
	$this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();

    $this->data['nama_poktan'] = [
      'name'          => 'nama_poktan',
      'id'            => 'nama_poktan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('nama_poktan'),
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
	$this->data['jml_anggota'] = [
      'name'          => 'jml_anggota',
      'id'            => 'jml_anggota',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('jml_anggota'),
    ];
	$this->data['luas_lahan'] = [
      'name'          => 'luas_lahan',
      'id'            => 'luas_lahan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('luas_lahan'),
    ];
    $this->load->view('back/poktan/poktan_add', $this->data);

  }

  function create_action()
  {
    $this->form_validation->set_rules('nama_poktan', 'Nama Kelompok Tani', 'trim|required');
    $this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
    $this->form_validation->set_rules('kabupaten', 'Kabupaten / Kota', 'trim|required');
    $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
    $this->form_validation->set_rules('desa', 'Desa / Kelurahan', 'trim|required');
    $this->form_validation->set_rules('jml_anggota', 'Jumlah Anggota', 'trim|is_numeric|required');
    $this->form_validation->set_rules('luas_lahan', 'Luas Lahan', 'trim|is_numeric|required');
   
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
		  'username'          => $this->session->username,
          'nama_poktan'       => $this->input->post('nama_poktan'),
          'provinsi'          => $this->input->post('provinsi'),
          'kabupaten'         => $this->input->post('kabupaten'),
          'kecamatan'         => $this->input->post('kecamatan'),
          'desa'              => $this->input->post('desa'),
		  'atitude'           => $this->input->post('atitude'),
		  'latitude'          => $this->input->post('latitude'),
          'jml_anggota'       => $this->input->post('jml_anggota'),
          'luas_lahan'        => $this->input->post('luas_lahan'),
        );

        $this->poktan_model->insert($data);

        $this->db->select_max('id_poktan');
        $result = $this->db->get('poktan')->row_array();
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('poktan');
    }
  }

  function update($id)
  {
    is_login();
    is_update();

    $this->data['user']     = $this->poktan_model->get_by_id($id);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Update Data '.$this->data['module'];
      $this->data['action']     = 'poktan/update_action';

      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
	  $this->data['get_all_combobox_kabupaten'] = $this->m_wilayah->get_all_kabupaten();
	  $this->data['get_all_combobox_kecamatan'] = $this->m_wilayah->get_all_kecamatan();
	  $this->data['get_all_combobox_desa'] = $this->m_wilayah->get_all_desa();

      $this->data['id_users'] = [
        'name'          => 'id_users',
        'type'          => 'hidden',
      ];
      $this->data['nama_poktan'] = [
      'name'          => 'nama_poktan',
      'id'            => 'nama_poktan',
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
	$this->data['jml_anggota'] = [
      'name'          => 'jml_anggota',
      'id'            => 'jml_anggota',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['luas_lahan'] = [
      'name'          => 'luas_lahan',
      'id'            => 'luas_lahan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];

      $this->load->view('back/poktan/poktan_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('auth');
    }

  }

  function update_action()
  {
    $this->form_validation->set_rules('nama_poktan', 'Nama Kelompok Tani', 'trim|required');
    $this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
    $this->form_validation->set_rules('kabupaten', 'Kabupaten / Kota', 'trim|required');
    $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
    $this->form_validation->set_rules('desa', 'Desa / Kelurahan', 'trim|required');
    $this->form_validation->set_rules('jml_anggota', 'Jumlah Anggota', 'trim|is_numeric|required');
    $this->form_validation->set_rules('luas_lahan', 'Luas Lahan', 'trim|is_numeric|required');

    // $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_poktan'));
    }
    else
    {
        $data = array(
          'username'          => $this->session->username,
          'nama_poktan'       => $this->input->post('nama_poktan'),
          'provinsi'          => $this->input->post('provinsi'),
          'kabupaten'         => $this->input->post('kabupaten'),
          'kecamatan'         => $this->input->post('kecamatan'),
          'desa'              => $this->input->post('desa'),
		  'atitude'           => $this->input->post('atitude'),
		  'latitude'          => $this->input->post('latitude'),
          'jml_anggota'       => $this->input->post('jml_anggota'),
          'luas_lahan'        => $this->input->post('luas_lahan'),
        );

        $this->Poktan_model->update($this->input->post('id_poktan'),$data);

        $this->write_log();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
        redirect('poktan');
      
    }
  }

  function delete($id)
  {
    is_login();
    is_delete();

    $delete = $this->Poktan_model->get_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->poktan_model->soft_delete($id, $data);

      $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('poktan');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('poktan');
    }
  }

  function delete_permanent($id)
  {
    is_login();
    is_delete();

    $delete = $this->Poktan_model->get_by_id($id);
  }

  function deleted_list()
  {
    is_login();
    is_restore();

    $this->data['page_title'] = 'Deleted '.$this->data['module'].' List';

    $this->data['get_all_deleted'] = $this->Poktan_model->get_all_deleted();

    $this->load->view('back/poktan/poktan_deleted_list', $this->data);
  }

  function restore($id)
  {
    is_login();
    is_restore();

    $row = $this->Poktan_model->get_by_id($id);

    if($row)
    {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Poktan_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('poktan/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('poktan');
    }
  }

  function activate($id)
  {
    is_login();

    $this->poktan_model->update($this->uri->segment('3'), array('is_active'=>'1'));

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data activate successfully</div>');
    redirect('poktan');
  }

  function deactivate($id)
  {
    is_login();

    $this->poktan_model->update($this->uri->segment('3'), array('is_active'=>'0'));

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data deactivate successfully</div>');
    redirect('poktan');
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

  function log_list()
  {
    is_login();
    is_superadmin();

    $this->data['page_title'] = 'Log System Process';

    $this->data['get_all']    = $this->Log_model->get_all();

    $this->load->view('back/auth/log_list', $this->data);
  }
}