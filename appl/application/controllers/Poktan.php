<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Poktan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Kelompok Tani';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();

    $this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
    $this->data['btn_add']    = 'Add New Data';
	$this->load->model('m_wilayah');
	$this->load->model('poktan_model');
	$this->load->model('r_verifikasi');
	$this->load->model('ChatModel');
    $this->data['add_action'] = base_url('poktan/create');
  }

  function index()
  {
    is_login();
    is_read();

    $this->data['page_title'] = 'Daftar '.$this->data['module'];
    $this->data['get_all'] = $this->poktan_model->get_all_users($this->session->userdata('id_users')); //$this->poktan_model->get_by_users($this->session->userdata('id_users'));
    $this->load->view('back/poktan/poktan_list', $this->data);
  }

  function create()
  {
    is_login();
    is_create();

    $this->data['page_title'] = 'Membuat '.$this->data['module'].' Baru';
    $this->data['action']     = 'poktan/create_action';
	$this->data['listuri']     = 'poktan';
	
	$this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
    
	$this->data['no_poktan'] = [
      'name'          => 'no_poktan',
      'id'            => 'no_poktan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('no_poktan'),
    ];
	$this->data['nama_poktan'] = [
      'name'          => 'nama_poktan',
      'id'            => 'nama_poktan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('nama_poktan'),
    ];
	$this->data['provinsi'] = [
      'name'          => 'provinsi',
      'id'            => 'provinsi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('provinsi'),
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
	  'onkeyup'		  => 'hitung()',
      'value'         => $this->form_validation->set_value('kecamatan'),
    ];
	$this->data['beban_tanam'] = [
      'name'          => 'beban_tanam',
      'id'            => 'beban_tanam',
      'class'         => 'form-control',
      'required'      => '',
      'value'         => $this->form_validation->set_value('beban_tanam'),
    ];
	$this->data['desa'] = [
      'name'          => 'desa',
      'id'            => 'desa',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('desa'),
    ];
	
	$this->data['jml_anggota'] = [
      'name'          => 'jml_anggota',
      'id'            => 'jml_anggota',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('jml_anggota'),
    ];
	
	$this->data['luas_lahan'] = [
      'name'          => 'luas_lahan',
      'id'            => 'luas_lahan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('luas_lahan'),
    ];
    $this->load->view('back/poktan/poktan_add', $this->data);

  }

  function create_action()
  {
    //$this->form_validation->set_rules('no_poktan', 'Nomor Kelompok Tani', 'trim|required');
	//$this->form_validation->set_rules('nama_poktan', 'Nama Kelompok Tani', 'trim|required');
    $this->form_validation->set_rules('jml_anggota', 'Jumlah Anggota', 'trim|required');
    $this->form_validation->set_rules('luas_lahan', 'Luas Lahan', 'trim|required');
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
            'no_poktan'        	=> $this->input->post('no_poktan'),
            'id_users'        	=> $this->session->userdata('id_users'),
            'nama_poktan'     	=> $this->input->post('nama_poktan'),
            'provinsi'  => substr($this->input->post('provinsi'),0,2),
            'kabupaten'       => substr($this->input->post('kabupaten'),0,4),
            'kecamatan'    => $this->input->post('kecamatan'),
            'desa'    => $this->input->post('desa'),
            'jml_anggota'    => $this->input->post('jml_anggota'),
            'luas_lahan'    => $this->input->post('luas_lahan'),
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

    $this->data['user']         = $this->poktan_model->get_by_id($id);
	  $this->data['listuri']      = 'poktan';
    if($this->data['user'])
    {
      $this->data['page_title'] = 'Update Data '.$this->data['module'];
      $this->data['action']     = 'poktan/update_action';
      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
	    $this->data['id_poktan'] = [
        'name'          => 'id_poktan',
        'id'            => 'id_poktan',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'type'  => 'hidden',
      ];
      $this->data['no_poktan'] = [
        'name'          => 'no_poktan',
        'id'            => 'no_poktan',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
      ];
	$this->data['nama_poktan'] = [
      'name'          => 'nama_poktan',
      'id'            => 'nama_poktan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['provinsi'] = [
      'name'          => 'provinsi',
      'id'            => 'provinsi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
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
	$this->data['beban_tanam'] = [
      'name'          => 'beban_tanam',
      'id'            => 'beban_tanam',
      'class'         => 'form-control',
      'required'      => '',
    ];
	$this->data['desa'] = [
      'name'          => 'desa',
      'id'            => 'desa',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	
	$this->data['jml_anggota'] = [
      'name'          => 'jml_anggota',
      'id'            => 'jml_anggota',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	
	$this->data['luas_lahan'] = [
      'name'          => 'luas_lahan',
      'id'            => 'luas_lahan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
		$this->load->view('back/poktan/poktan_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('poktan');
    }

  }

  function update_action()
  {
    //$this->form_validation->set_rules('no_poktan', 'Nomor Kelompok Tani', 'require');
	$this->form_validation->set_rules('nama_poktan', 'Nama Kelompok Tani', 'trim|required');
    $this->form_validation->set_rules('jml_anggota', 'Jumlah Anggota', 'trim|required');
    $this->form_validation->set_rules('luas_lahan', 'Luas Lahan', 'trim|required');
    //$this->form_validation->set_message('required', '{field} wajib diisi');
	//if (empty($_FILES['file_riph']['name'])){$this->form_validation->set_rules('file_riph', 'Scan Surat RIPH', 'required');}
	//if (empty($_FILES['file_form5']['name'])){$this->form_validation->set_rules('file_form5', 'Scan Form 5', 'required');}

    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_poktan'));
    }
    else
    {
         $data = array(
            'no_poktan'        	=> $this->input->post('no_poktan'),
            'id_users'        	=> $this->session->userdata('id_users'),
            'nama_poktan'     	=> $this->input->post('nama_poktan'),
            'provinsi'  => substr($this->input->post('provinsi'),0,2),
            'kabupaten'       => substr($this->input->post('kabupaten'),0,4),
            'kecamatan'    => $this->input->post('kecamatan'),
            'desa'    => $this->input->post('desa'),
            'jml_anggota'    => $this->input->post('jml_anggota'),
            'luas_lahan'    => $this->input->post('luas_lahan'),
        );

		$this->poktan_model->update($this->input->post('id_poktan'),$data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('poktan');
    }
  }


  function delete($id)
  {
    is_login();
    is_delete();

    $delete = $this->poktan_model->get_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
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

    $delete = $this->poktan_model->get_by_id($id);

	if($delete)
    {
	  $this->poktan_model->delete($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('poktan/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('poktan');
    }
  }

  function deleted_list()
  {
    is_login();
    is_restore();

    $this->data['page_title'] = 'Deleted '.$this->data['module'].' List';

    $this->data['get_all_deleted'] = $this->Auth_model->get_all_deleted();

    $this->load->view('back/poktan/poktan_deleted_list', $this->data);
  }

  function restore($id)
  {
    is_login();
    is_restore();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $row = $this->Auth_model->get_by_id($id);

    if($row)
    {
      $data = array(
        'is_delete'   => '0',
      );

      $this->Auth_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('auth/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('auth');
    }
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
