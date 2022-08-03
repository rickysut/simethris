<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videotutorial extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		is_login();

		$this->data['company_data']    				= $this->Company_model->company_profile();
		$this->data['layout_template']    			= $this->Template_model->layout();
		$this->data['skins_template']     			= $this->Template_model->skins();
		$this->load->model('r_verifikasi');
		$this->load->model('ChatModel');
	}

	public function index()
	{
		if ($this->session->userdata('usertype')=='3'){
			$this->data['page_title'] = 'Video Tutorial';
			$this->load->view('back/userguides/vitot3', $this->data);
		}
		else if ($this->session->userdata('usertype')=='2'){
			$this->data['page_title'] = 'Video Tutorial';
			$this->load->view('back/userguides/vitot2', $this->data);
		}
		else{
			$this->data['page_title'] = 'Video Tutorial';
			$this->load->view('back/userguides/vitot1', $this->data);
		}
	}
}
