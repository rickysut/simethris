<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Polygon_list extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->data['company_data']    				= $this->Company_model->company_profile();
		$this->data['layout_template']    			= $this->Template_model->layout();
		$this->data['skins_template']     			= $this->Template_model->skins();
		$this->load->model('m_files');
		$this->load->model('poly_model');
		$this->load->model('r_verifikasi');
		$this->load->model('ChatModel');
	}
	
	public function index()
	{
		$data['page_title'] = 'Daftar Realisasi Poligon';
		$data['card_title'] = 'Daftar Polygon';
		$data['breadcrumb_title'] = 'Pagu';
		
		$data['show_poly'] = $this->poly_model->get_all_poly();
		
		$this->load->view('back/laporan/polygon_list',$data);
	}
}
