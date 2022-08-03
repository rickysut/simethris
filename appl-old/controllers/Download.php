<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Download extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Download';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();
	$this->load->model('m_files');
	$this->load->helper('download');
	$this->load->model('r_verifikasi');
	$this->load->model('ChatModel');
  }

	function index(){
		is_login();
		is_read();

		$this->data['page_title'] = $this->data['module'].' List';
		$this->data['get_jml_verifikasi'] = $this->r_verifikasi->get_jml_r_verifikasi();
		if ($this->session->userdata('usertype')=='3'){
			$this->data['get_all_files'] = $this->m_files->get_all_files_by_admin();
		}else{
			$this->data['get_all_files'] = $this->m_files->get_all_files_by_user();
			$this->data['get_all_files_sk'] = $this->m_files->get_all_files_sk_by_user();
			$this->data['get_all_files_ktp'] = $this->m_files->get_all_files_ktp_by_user();
		}
		$this->load->view('back/download/download_list',$this->data);
	}

	function get_file(){
		$id=$this->uri->segment(3);
		$get_db=$this->m_files->get_file_byid_download($id);
		$q=$get_db->row_array();
		$file=$q['file_data'];
		if ($this->session->userdata('usertype')=='3'){
			$path='./uploads/user/'.$file;
		}
		$data = file_get_contents($path);
		$name = $file;
		force_download($name, $data);
	}

}
