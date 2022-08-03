<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_perusahaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		is_login();
		$this->data['module'] = 'Daftar Perusahaan';
		$this->data['company_data']    				= $this->Company_model->company_profile();
		$this->data['layout_template']    			= $this->Template_model->layout();
		$this->data['skins_template']     			= $this->Template_model->skins();
		$this->load->model('Dashboard_model','',TRUE);
		$this->load->helper('tgl_indo');
		$this->load->model('m_wilayah');
		$this->load->model('r_verifikasi');
		$this->load->model('ChatModel');
	}

	public function index()
	{
		$this->data['page_title'] = 'Daftar Perusahaan';
		$this->data['get_all_combobox_provinsi']     = $this->m_wilayah->get_all_provinsi();
		$this->data['get_data_perusahaan']				= $this->Dashboard_model->get_data_perusahaan();
		$this->data['get_jml_verifikasi']				= $this->r_verifikasi->get_jml_r_verifikasi();
		$this->load->view('back/dashboard/data_perusahaan', $this->data);
		
	}
}
