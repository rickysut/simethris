<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Pengumuman';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	  $this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();

    $this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
    $this->data['btn_add']    = 'Add New Data';
    $this->data['add_action'] = base_url('pengumuman/create');
	$this->load->model('Pengumuman_model');
	$this->load->model('m_wilayah');
	$this->load->model('Ajuriph_model');
	$this->load->model('r_verifikasi');
	$this->load->model('ChatModel');
  }

  function index()
  {
    is_login();
    is_read();

    $this->data['page_title'] = 'Daftar '.$this->data['module'];

	if ($this->session->userdata('usertype')=='3'){
		$this->data['get_all'] = $this->Pengumuman_model->get_all_active();
		$this->load->view('back/pengumuman/berita_user', $this->data);
	}
    else{
		$this->data['get_all'] = $this->Pengumuman_model->get_all();
		$this->load->view('back/pengumuman/berita_list', $this->data);
	}
  }

  function create()
  {
    is_login();
    is_create();

    $this->data['page_title'] = 'Buat '.$this->data['module'].' Baru';
    $this->data['action']     = 'pengumuman/create_action';
    $this->data['judul'] = [
      'name'          => 'judul',
      'id'            => 'judul',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('judul'),
    ];
    $this->data['pengumuman'] = [
      'name'          => 'pengumuman',
      'id'            => 'pengumuman',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('pengumuman'),
    ];
    $this->load->view('back/pengumuman/berita_add', $this->data);

  }

  function create_action()
  {
    $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
    $this->form_validation->set_rules('pengumuman', 'Brita', 'trim|required');

    $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->create();
    }
    else
    {
        $data = array(
          'judul'          => $this->input->post('judul'),
          'pengumuman'         => $this->input->post('pengumuman'),
          'is_active'      => '1',
        );

        $this->Pengumuman_model->insert($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('pengumuman');
    }
  }

  function update($id)
  {
    is_login();
    is_update();

    $this->data['user']     = $this->Pengumuman_model->get_by_id($id);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Update Data '.$this->data['module'];
      $this->data['action']     = 'pengumuman/update_action';
      $this->data['id'] = [
        'name'          => 'id',
        'type'          => 'hidden',
      ];
      $this->data['judul'] = [
        'name'          => 'judul',
        'id'            => 'judul',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['pengumuman'] = [
        'name'          => 'pengumuman',
        'id'            => 'pengumuman',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
      ];

      $this->load->view('back/pengumuman/berita_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('pengumuman');
    }

  }

  function update_action()
  {
    $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
    $this->form_validation->set_rules('pengumuman', 'Berita', 'trim|required');

    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id'));
    }
    else
    {
        $data = array(
          'judul'          => $this->input->post('judul'),
          'pengumuman'         => $this->input->post('pengumuman'),
          'is_active'      => '1',
        );

        $this->Pengumuman_model->update($this->input->post('id'),$data);

        $this->write_log();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
        redirect('pengumuman');
      
    }
  }

  function activate($id)
  {
    is_login();

    $this->Pengumuman_model->update($this->uri->segment('3'), array('is_active'=>'1'));

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data activate successfully</div>');
    redirect('pengumuman');
  }

  function deactivate($id)
  {
    is_login();

    $this->Pengumuman_model->update($this->uri->segment('3'), array('is_active'=>'0'));

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data deactivate successfully</div>');
    redirect('pengumuman');
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
  
  function delete($id)
  {
    is_login();
    is_delete();

    $delete = $this->Pengumuman_model->get_by_id($id);

    if($delete){
      $this->Pengumuman_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('pengumuman');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('pengumuman');
    }
  }
}
