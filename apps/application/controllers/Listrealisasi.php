<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Load composer's autoloader
require 'vendor/autoload.php';

class Listrealisasi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Realisasi Tanam ';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();

	$this->load->model('m_wilayah');
	$this->load->model('Realisasi_model');
	$this->load->model('r_verifikasi');
  }

  function index()
  {
   is_login();
   is_read();
   $this->data['page_title'] = $this->data['module'].' List';
   $this->data['get_all_realisasi'] = $this->Realisasi_model->get_all_realisasi();
   $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
   $this->data['get_jml_verifikasi']				= $this->r_verifikasi->get_jml_r_verifikasi();
   $this->load->view('back/realisasi/list_all', $this->data);
  }
 
  function activate($id)
  {
    is_login();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->Tanam_model->update($this->uri->segment('3'), array('is_active'=>'1'));

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data activate successfully</div>');
    redirect('cpcl');
  }

  function deactivate($id)
  {
    is_login();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->Cpcl_model->update($this->uri->segment('3'), array('is_active'=>'0'));

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data deactivate successfully</div>');
    redirect('cpcl');
  }
  
  function add_ajax_kab($id_prov){
		    $query = $this->db->get_where('wilayah_kabupaten',array('provinsi_id'=>$id_prov));
		    $data = "<option value=''>- Select Kabupaten -</option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id."'>".$value->nama."</option>";
		    }
		    echo $data;
		}
		
		function add_ajax_kec($id_kab){
		    $query = $this->db->get_where('wilayah_kecamatan',array('kabupaten_id'=>$id_kab));
		    $data = "<option value=''> - Pilih Kecamatan - </option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id."'>".$value->nama."</option>";
		    }
		    echo $data;
		}
		
		function add_ajax_des($id_kec){
		    $query = $this->db->get_where('wilayah_desa',array('kecamatan_id'=>$id_kec));
		    $data = "<option value=''> - Pilih Desa - </option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id."'>".$value->nama."</option>";
		    }
		    echo $data;
		}

}
