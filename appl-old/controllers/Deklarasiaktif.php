<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deklarasiaktif extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'User';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();
  }
  
  function index()
  {
    $this->load->view('back/auth/deklarasiaktif', $this->data);
  }
}