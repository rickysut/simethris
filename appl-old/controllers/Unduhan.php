<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unduhan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Unduhan';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();

	$this->load->model('m_wilayah');
	$this->load->model('r_verifikasi');
	$this->load->model('r_verifikasi');
	$this->load->model('ChatModel');
  }

  function index()
  {
    is_login();
    is_read();

    $this->data['page_title'] = 'Daftar '.$this->data['module'];

    $this->data['get_all'] = $this->Auth_model->get_all();

    $this->load->view('back/download/unduhan', $this->data);
  }
}