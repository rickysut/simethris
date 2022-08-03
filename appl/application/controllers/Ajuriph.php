<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Ajuriph extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Input Data RIPH';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();

    $this->data['btn_submit'] = 'Save';
	$this->data['btn_submit2'] = 'Ajukan Verifikasi';
    $this->data['btn_reset']  = 'Reset';
    $this->data['btn_add']    = 'Add New Data';
	$this->load->model('m_wilayah');
	$this->load->model('Ajuriph_model');
	$this->load->model('r_verifikasi');
	$this->load->model('ChatModel');
    $this->data['add_action'] = base_url('ajuriph/create');
  }

  function index()
  {
    is_login();
    is_read();

    $this->data['page_title'] = 'Daftar '.$this->data['module'];
    $this->data['get_all'] = $this->Ajuriph_model->get_all_riph_id($this->session->id_users);
    $this->load->view('back/ajuriph/ajuriph_list', $this->data);
  }

  function create()
  {
    is_login();
    is_create();

    $this->data['page_title'] = $this->data['module'];
    $this->data['action']     = 'ajuriph/create_action';
	
	$this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
    
	$this->data['nomor_riph'] = [
      'name'          => 'nomor_riph',
      'id'            => 'nomor_riph',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('nomor_riph'),
    ];
	$this->data['jenis_riph'] = [
      'name'          => 'jenisr_riph',
      'id'            => 'jenisr_riph',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => 'Bawang Putih',
    ];
	$this->data['tgl_mulai_berlaku'] = [
      'name'          => 'tgl_mulai_berlaku',
      'id'            => 'tgl_mulai_berlaku',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('tgl_mulai_berlaku'),
    ];
	$this->data['tgl_akhir_berlaku'] = [
      'name'          => 'tgl_akhir_berlaku',
      'id'            => 'tgl_akhir_berlaku',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('tgl_akhir_berlaku'),
    ];
	$this->data['v_pengajuan_riph'] = [
      'name'          => 'v_pengajuan_riph',
      'id'            => 'v_pengajuan_riph',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
	  'onkeyup'		  => 'hitung()',
      'value'         => $this->form_validation->set_value('v_pengajuan_riph'),
    ];
	$this->data['beban_tanam'] = [
      'name'          => 'beban_tanam',
      'id'            => 'beban_tanam',
      'class'         => 'form-control',
      'required'      => '',
      'readonly'      => '',
      'value'         => $this->form_validation->set_value('beban_tanam'),
    ];
	$this->data['beban_produksi'] = [
      'name'          => 'beban_produksi',
      'id'            => 'beban_produksi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'readonly'      => '',
      'value'         => $this->form_validation->set_value('beban_produksi'),
    ];
    $this->load->view('back/ajuriph/ajuriph_add', $this->data);

  }

  function create_action()
  {
    $this->form_validation->set_rules('nomor_riph', 'Nomor RIPH', 'trim|required');
	$this->form_validation->set_rules('tgl_mulai_berlaku', 'Tanggal Awal Berlaku RIPH', 'trim|required');
    $this->form_validation->set_rules('tgl_akhir_berlaku', 'Tanggal Akhir Berlaku RIPH', 'trim|required');
    $this->form_validation->set_rules('v_pengajuan_riph', 'Pengajuan Tanam', 'trim|required');
	if (empty($_FILES['file_riph']['name'])){$this->form_validation->set_rules('file_riph', 'Scan Surat RIPH', 'required');}
	if (empty($_FILES['file_form5']['name'])){$this->form_validation->set_rules('file_form5', 'Scan Form 5', 'required');}

    $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->create();
    }
    else
    {
	  if($_FILES['file_riph']['error'] <> 4)
	  {
		$nmfileriph = $this->session->id_users.'_riph_'.date('YmdHis');

        $config3['upload_path']      = './uploads/file_riph/';
        $config3['allowed_types']    = 'jpeg|jpg|png|txt|pdf|doc|docx|xls|xlsx|pptx|rtf';
        $config3['max_size']         = 2048; // 2Mb
        $config3['file_name']       = $nmfileriph;

        $this->load->library('upload', $config3);
		    $this->upload->initialize($config3);
        if(!$this->upload->do_upload('file_riph'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->create();
        }
		else
		{
			$file_riph = $this->upload->data();
			$data = array(
			'file_riph'     => $this->upload->data('file_name')
			);
		}
	  }
	  if($_FILES['file_form5']['error'] <> 4)
	  {
		$nmfileform5 = $this->session->id_users.'_f5_'.date('YmdHis');

        $config4['upload_path']      = './uploads/file_form5/';
        $config4['allowed_types']    = 'jpeg|jpg|png|txt|pdf|doc|docx|xls|xlsx|pptx|rtf';
        $config4['max_size']         = 2048; // 2Mb
        $config4['file_name']       = $nmfileform5;

        $this->load->library('upload', $config4);
		$this->upload->initialize($config4);
        if(!$this->upload->do_upload('file_form5'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->create();
        }
		else
		{
			$file_form5 = $this->upload->data();
			$data = array(
			'file_form5'     => $this->upload->data('file_name')
			);
		}
	  }
	  
	  if($_FILES['file_sptjm']['error'] <> 4)
	  {
		$nmfilesptjm = $this->session->id_users.'_sptjm_'.date('YmdHis');

        $config5['upload_path']      = './uploads/file_sptjm/';
        $config5['allowed_types']    = 'jpeg|jpg|png|txt|pdf|doc|docx|xls|xlsx|pptx|rtf';
        $config5['max_size']         = 2048; // 2Mb
        $config5['file_name']       = $nmfilesptjm;

        $this->load->library('upload', $config5);
		$this->upload->initialize($config5);
        if(!$this->upload->do_upload('file_sptjm'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->create();
        }
		else
		{
			$file_sptjm = $this->upload->data();
			$data = array(
			'file_sptjm'     => $this->upload->data('file_name')
			);
		}
	  }
	  
	  if($_FILES['file_logbook']['error'] <> 4)
	  {
		$nmfilelogbook = $this->session->id_users.'_logbook_'.date('YmdHis');

        $config6['upload_path']      = './uploads/file_logbook/';
        $config6['allowed_types']    = 'jpeg|jpg|png|txt|pdf|doc|docx|xls|xlsx|pptx|rtf';
        $config6['max_size']         = 2048; // 2Mb
        $config6['file_name']       = $nmfilelogbook;

        $this->load->library('upload', $config6);
		$this->upload->initialize($config6);
        if(!$this->upload->do_upload('file_logbook'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->create();
        }
		else
		{
			$file_logbook = $this->upload->data();
			$data = array(
			'file_logbook'     => $this->upload->data('file_name')
			);
		}
	  }
	  
	  if($_FILES['file_lakhir']['error'] <> 4)
	  {
		$nmfilelakhir = $this->session->id_users.'_lakhir_'.date('YmdHis');

        $config7['upload_path']      = './uploads/file_lakhir/';
        $config7['allowed_types']    = 'jpeg|jpg|png|txt|pdf|doc|docx|xls|xlsx|pptx|rtf';
        $config7['max_size']         = 2048; // 2Mb
        $config7['file_name']       = $nmfilelakhir;

        $this->load->library('upload', $config7);
		$this->upload->initialize($config7);
        if(!$this->upload->do_upload('file_lakhir'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->create();
        }
		else
		{
			$file_lakhir = $this->upload->data();
			$data = array(
			'file_lakhir'     => $this->upload->data('file_name')
			);
		}
	  }
        $data = array(
            'id_users'        	=> $this->session->id_users,
            'username'        	=> $this->session->username,
            'nomor_riph'     	=> $this->input->post('nomor_riph'),
            'jenis_riph'     	=> "Bawang Putih",
            'tgl_mulai_berlaku' => date('Y-m-d',strtotime($this->input->post('tgl_mulai_berlaku'))),
            'tgl_akhir_berlaku' => date('Y-m-d',strtotime($this->input->post('tgl_akhir_berlaku'))),
            'v_pengajuan_riph'  => $this->input->post('v_pengajuan_riph'),
            'beban_tanam'       => $this->input->post('beban_tanam'),
            'beban_produksi'    => $this->input->post('beban_produksi'),
			'file_riph'     	=> $file_riph['file_name'],
			'file_form5'     	=> $file_form5['file_name'],
			'file_sptjm'     	=> $file_sptjm['file_name'],
			'file_logbook'     	=> $file_logbook['file_name'],
			'file_lakhir'     	=> $file_lakhir['file_name'],
        );

        $this->Ajuriph_model->insert($data);

        $this->db->select_max('id_users');
        $result = $this->db->get('mst_riph')->row_array();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('ajuriph');
      }
    }

  function update($id)
  {
    is_login();
    is_update();

    $this->data['user']     = $this->Ajuriph_model->get_by_id($id);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Update Data '.$this->data['module'];
      $this->data['action']     = 'ajuriph/update_action';

      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
    
		$this->data['id_mst_riph'] = [
		  'name'          => 'id_mst_riph',
		  'id'            => 'id_mst_riph',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'type'  => 'hidden',
		];
		$this->data['nomor_riph'] = [
		  'name'          => 'nomor_riph',
		  'id'            => 'nomor_riph',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['jenis_riph'] = [
		  'name'          => 'jenisr_riph',
		  'id'            => 'jenisr_riph',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'value'         => 'Bawang Putih',
		];
		$this->data['tgl_mulai_berlaku'] = [
		  'name'          => 'tgl_mulai_berlaku',
		  'id'            => 'tgl_mulai_berlaku',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['tgl_akhir_berlaku'] = [
		  'name'          => 'tgl_akhir_berlaku',
		  'id'            => 'tgl_akhir_berlaku',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['v_pengajuan_riph'] = [
		  'name'          => 'v_pengajuan_riph',
		  'id'            => 'v_pengajuan_riph',
		  'class'         => 'form-control',
		  'onkeyup'		  => 'hitung()',
		  'autocomplete'  => 'off',
		];
		$this->data['beban_tanam'] = [
		  'name'          => 'beban_tanam',
		  'id'            => 'beban_tanam',
		  'class'         => 'form-control',
		  'required'      => '',
      'readonly'      => '',
		];
		$this->data['beban_produksi'] = [
		  'name'          => 'beban_produksi',
		  'id'            => 'beban_produksi',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
      'readonly'      => '',
		];
		$this->load->view('back/ajuriph/ajuriph_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('ajuriph');
    }

  }

  function update_action()
  {
    $this->form_validation->set_rules('nomor_riph', 'Nomor RIPH', 'trim|required');
	$this->form_validation->set_rules('tgl_mulai_berlaku', 'Tanggal Awal Berlaku RIPH', 'trim|required');
    $this->form_validation->set_rules('tgl_akhir_berlaku', 'Tanggal Akhir Berlaku RIPH', 'trim|required');
    $this->form_validation->set_rules('v_pengajuan_riph', 'Jumlah Pengajuan RIPH', 'trim|required');
	//if (empty($_FILES['file_riph']['name'])){$this->form_validation->set_rules('file_riph', 'Scan Surat RIPH', 'required');}
	//if (empty($_FILES['file_form5']['name'])){$this->form_validation->set_rules('file_form5', 'Scan Form 5', 'required');}

    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_mst_riph'));
    }
    else
    {
	  if($_FILES['file_riph']['error'] <> 4)
	  {
		$nmfileriph = strtolower(url_title($this->session->id_users)).'_riph_'.date('YmdHis');

        $config3['upload_path']      = './uploads/file_riph/';
        $config3['allowed_types']    = 'jpeg|jpg|png|txt|pdf|doc|docx|xls|xlsx|pptx|rtf';
        $config3['max_size']         = 2048; // 2Mb
        $config3['file_name']       = $nmfileriph;

        $this->load->library('upload', $config3);
		$this->upload->initialize($config3);
		
        $delete = $this->Ajuriph_model->get_by_id($this->input->post('id_mst_riph'));

        $dir        = "./uploads/file_riph/".$delete->file_riph;

        if(is_file($dir))
        {
          unlink($dir);
        }
		
        if(!$this->upload->do_upload('file_riph'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->update($this->input->post('id_mst_riph'));
        }
		else
		{
			$file_riph = $this->upload->data();
			$data = array(
			'file_riph'     => $this->upload->data('file_name')
			);
			$this->Ajuriph_model->update($this->input->post('id_mst_riph'),$data);
		}
	  }
	  if($_FILES['file_form5']['error'] <> 4)
	  {
		$nmfileform5 = strtolower(url_title($this->session->id_users)).'_f5_'.date('YmdHis');

        $config4['upload_path']      = './uploads/file_form5/';
        $config4['allowed_types']    = 'jpeg|jpg|png|txt|pdf|doc|docx|xls|xlsx|pptx|rtf';
        $config4['max_size']         = 2048; // 2Mb
        $config4['file_name']       = $nmfileform5;

        $this->load->library('upload', $config4);
		$this->upload->initialize($config4);
		$delete = $this->Ajuriph_model->get_by_id($this->input->post('id_mst_riph'));

        $dir2        = "./uploads/file_form5/".$delete->file_form5;

        if(is_file($dir2))
        {
          unlink($dir2);
        }
        if(!$this->upload->do_upload('file_form5'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->update($this->input->post('id_mst_riph'));
        }
		else
		{
			$file_form5 = $this->upload->data();
			$data = array(
			'file_form5'     => $this->upload->data('file_name')
			);
			$this->Ajuriph_model->update($this->input->post('id_mst_riph'),$data);
		}
	  }
	  if($_FILES['file_sptjm']['error'] <> 4)
	  {
		$nmfilesptjm = strtolower(url_title($this->session->id_users)).'_sptjm_'.date('YmdHis');

        $config5['upload_path']      = './uploads/file_sptjm/';
        $config5['allowed_types']    = 'jpeg|jpg|png|txt|pdf|doc|docx|xls|xlsx|pptx|rtf';
        $config5['max_size']         = 2048; // 2Mb
        $config5['file_name']       = $nmfilesptjm;

        $this->load->library('upload', $config5);
		$this->upload->initialize($config5);
		$delete = $this->Ajuriph_model->get_by_id($this->input->post('id_mst_riph'));

        $dir2        = "./uploads/file_sptjm/".$delete->file_sptjm;

        if(is_file($dir2))
        {
          unlink($dir2);
        }
        if(!$this->upload->do_upload('file_sptjm'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->update($this->input->post('id_mst_riph'));
        }
		else
		{
			$file_sptjm = $this->upload->data();
			$data = array(
			'file_sptjm'     => $this->upload->data('file_name')
			);
			$this->Ajuriph_model->update($this->input->post('id_mst_riph'),$data);
		}
	  }
	  if($_FILES['file_logbook']['error'] <> 4)
	  {
		$nmfilelogbook = $this->session->id_users.'_logbook_'.date('YmdHis');

        $config6['upload_path']      = './uploads/file_logbook/';
        $config6['allowed_types']    = 'jpeg|jpg|png|txt|pdf|doc|docx|xls|xlsx|pptx|rtf';
        $config6['max_size']         = 2048; // 2Mb
        $config6['file_name']       = $nmfilelogbook;

        $this->load->library('upload', $config6);
		$this->upload->initialize($config6);
		$delete = $this->Ajuriph_model->get_by_id($this->input->post('id_mst_riph'));

        $dir2        = "./uploads/file_logbook/".$delete->file_logbook;

        if(is_file($dir2))
        {
          unlink($dir2);
        }
        if(!$this->upload->do_upload('file_logbook'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->update($this->input->post('id_mst_riph'));
        }
		else
		{
			$file_logbook = $this->upload->data();
			$data = array(
			'file_logbook'     => $this->upload->data('file_name')
			);
			$this->Ajuriph_model->update($this->input->post('id_mst_riph'),$data);
		}
	  }
	  
	  if($_FILES['file_lakhir']['error'] <> 4)
	  {
		$nmfilelakhir = $this->session->id_users.'_lakhir_'.date('YmdHis');

        $config7['upload_path']      = './uploads/file_lakhir/';
        $config7['allowed_types']    = 'jpeg|jpg|png|txt|pdf|doc|docx|xls|xlsx|pptx|rtf';
        $config7['max_size']         = 2048; // 2Mb
        $config7['file_name']       = $nmfilelakhir;

        $this->load->library('upload', $config7);
		$this->upload->initialize($config7);
		$delete = $this->Ajuriph_model->get_by_id($this->input->post('id_mst_riph'));

        $dir2        = "./uploads/file_lakhir/".$delete->file_lakhir;

        if(is_file($dir2))
        {
          unlink($dir2);
        }
        if(!$this->upload->do_upload('file_lakhir'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->update($this->input->post('id_mst_riph'));
        }
		else
		{
			$file_lakhir = $this->upload->data();
			$data = array(
			'file_lakhir'     => $this->upload->data('file_name')
			);
			$this->Ajuriph_model->update($this->input->post('id_mst_riph'),$data);
		}
	  }
        $data = array(
            'nomor_riph'     	=> $this->input->post('nomor_riph'),
            'jenis_riph'     	=> "Bawang Putih",
            'tgl_mulai_berlaku' => $this->input->post('tgl_mulai_berlaku'),
            'tgl_akhir_berlaku' => $this->input->post('tgl_akhir_berlaku'),
            'v_pengajuan_riph'  => $this->input->post('v_pengajuan_riph'),
            'beban_tanam'       => $this->input->post('beban_tanam'),
            'beban_produksi'    => $this->input->post('beban_produksi'),
        );

		$this->Ajuriph_model->update($this->input->post('id_mst_riph'),$data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('ajuriph');
    }
  }
  
  function aju_verifikasi($id)
  {
    is_login();
    is_update();

    $this->data['user']     = $this->Ajuriph_model->get_by_id($id);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Verifikasi Data '.$this->data['module'];
      $this->data['action']     = 'ajuriph/verifikasi_action';

      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
    
		$this->data['id_mst_riph'] = [
		  'name'          => 'id_mst_riph',
		  'id'            => 'id_mst_riph',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'type'  => 'hidden',
		];
		$this->data['nomor_riph'] = [
		  'name'          => 'nomor_riph',
		  'id'            => 'nomor_riph',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['jenis_riph'] = [
		  'name'          => 'jenisr_riph',
		  'id'            => 'jenisr_riph',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'value'         => 'Bawang Putih',
		];
		$this->data['tgl_mulai_berlaku'] = [
		  'name'          => 'tgl_mulai_berlaku',
		  'id'            => 'tgl_mulai_berlaku',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['tgl_akhir_berlaku'] = [
		  'name'          => 'tgl_akhir_berlaku',
		  'id'            => 'tgl_akhir_berlaku',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['v_pengajuan_riph'] = [
		  'name'          => 'v_pengajuan_riph',
		  'id'            => 'v_pengajuan_riph',
		  'class'         => 'form-control',
		  'onkeyup'		  => 'hitung()',
		  'autocomplete'  => 'off',
		];
		$this->data['beban_tanam'] = [
		  'name'          => 'beban_tanam',
		  'id'            => 'beban_tanam',
		  'class'         => 'form-control',
		  'required'      => '',
      'readonly'      => '',
		];
		$this->data['beban_produksi'] = [
		  'name'          => 'beban_produksi',
		  'id'            => 'beban_produksi',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
      'readonly'      => '',
		];
		$this->load->view('back/ajuriph/ajuriph_verifikasi', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('ajuriph');
    }

  }

  function verifikasi_action()
  {
    $this->form_validation->set_rules('nomor_riph', 'Nomor RIPH', 'trim|required');
	$this->form_validation->set_rules('tgl_mulai_berlaku', 'Tanggal Awal Berlaku RIPH', 'trim|required');
    $this->form_validation->set_rules('tgl_akhir_berlaku', 'Tanggal Akhir Berlaku RIPH', 'trim|required');
    $this->form_validation->set_rules('v_pengajuan_riph', 'Jumlah Pengajuan RIPH', 'trim|required');
	//if (empty($_FILES['file_riph']['name'])){$this->form_validation->set_rules('file_riph', 'Scan Surat RIPH', 'required');}
	//if (empty($_FILES['file_form5']['name'])){$this->form_validation->set_rules('file_form5', 'Scan Form 5', 'required');}

    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_mst_riph'));
    }
    else
    {
	  if($_FILES['file_riph']['error'] <> 4)
	  {
		$nmfileriph = strtolower(url_title($this->session->id_users)).'_riph_'.date('YmdHis');

        $config3['upload_path']      = './uploads/file_riph/';
        $config3['allowed_types']    = 'jpeg|jpg|png|txt|pdf|doc|docx|xls|xlsx|pptx|rtf';
        $config3['max_size']         = 2048; // 2Mb
        $config3['file_name']       = $nmfileriph;

        $this->load->library('upload', $config3);
		$this->upload->initialize($config3);
		
        $delete = $this->Ajuriph_model->get_by_id($this->input->post('id_mst_riph'));

        $dir        = "./uploads/file_riph/".$delete->file_riph;

        if(is_file($dir))
        {
          unlink($dir);
        }
		
        if(!$this->upload->do_upload('file_riph'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->update($this->input->post('id_mst_riph'));
        }
		else
		{
			$file_riph = $this->upload->data();
			$data = array(
			'file_riph'     => $this->upload->data('file_name')
			);
			$this->Ajuriph_model->update($this->input->post('id_mst_riph'),$data);
		}
	  }
	  if($_FILES['file_form5']['error'] <> 4)
	  {
		$nmfileform5 = strtolower(url_title($this->session->id_users)).'_f5_'.date('YmdHis');

        $config4['upload_path']      = './uploads/file_form5/';
        $config4['allowed_types']    = 'jpeg|jpg|png|txt|pdf|doc|docx|xls|xlsx|pptx|rtf';
        $config4['max_size']         = 2048; // 2Mb
        $config4['file_name']       = $nmfileform5;

        $this->load->library('upload', $config4);
		$this->upload->initialize($config4);
		$delete = $this->Ajuriph_model->get_by_id($this->input->post('id_mst_riph'));

        $dir2        = "./uploads/file_form5/".$delete->file_form5;

        if(is_file($dir2))
        {
          unlink($dir2);
        }
        if(!$this->upload->do_upload('file_form5'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->update($this->input->post('id_mst_riph'));
        }
		else
		{
			$file_form5 = $this->upload->data();
			$data = array(
			'file_form5'     => $this->upload->data('file_name')
			);
			$this->Ajuriph_model->update($this->input->post('id_mst_riph'),$data);
		}
	  }
	  if($_FILES['file_sptjm']['error'] <> 4)
	  {
		$nmfilesptjm = strtolower(url_title($this->session->id_users)).'_sptjm_'.date('YmdHis');

        $config5['upload_path']      = './uploads/file_sptjm/';
        $config5['allowed_types']    = 'jpeg|jpg|png|txt|pdf|doc|docx|xls|xlsx|pptx|rtf';
        $config5['max_size']         = 2048; // 2Mb
        $config5['file_name']       = $nmfilesptjm;

        $this->load->library('upload', $config5);
		$this->upload->initialize($config5);
		$delete = $this->Ajuriph_model->get_by_id($this->input->post('id_mst_riph'));

        $dir2        = "./uploads/file_sptjm/".$delete->file_sptjm;

        if(is_file($dir2))
        {
          unlink($dir2);
        }
        if(!$this->upload->do_upload('file_sptjm'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->update($this->input->post('id_mst_riph'));
        }
		else
		{
			$file_sptjm = $this->upload->data();
			$data = array(
			'file_sptjm'     => $this->upload->data('file_name')
			);
			$this->Ajuriph_model->update($this->input->post('id_mst_riph'),$data);
		}
	  }
	  if($_FILES['file_logbook']['error'] <> 4)
	  {
		$nmfilelogbook = $this->session->id_users.'_logbook_'.date('YmdHis');

        $config6['upload_path']      = './uploads/file_logbook/';
        $config6['allowed_types']    = 'jpeg|jpg|png|txt|pdf|doc|docx|xls|xlsx|pptx|rtf';
        $config6['max_size']         = 2048; // 2Mb
        $config6['file_name']       = $nmfilelogbook;

        $this->load->library('upload', $config6);
		$this->upload->initialize($config6);
		$delete = $this->Ajuriph_model->get_by_id($this->input->post('id_mst_riph'));

        $dir2        = "./uploads/file_logbook/".$delete->file_logbook;

        if(is_file($dir2))
        {
          unlink($dir2);
        }
        if(!$this->upload->do_upload('file_logbook'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->update($this->input->post('id_mst_riph'));
        }
		else
		{
			$file_logbook = $this->upload->data();
			$data = array(
			'file_logbook'     => $this->upload->data('file_name')
			);
			$this->Ajuriph_model->update($this->input->post('id_mst_riph'),$data);
		}
	  }
	  
	  if($_FILES['file_lakhir']['error'] <> 4)
	  {
		$nmfilelakhir = $this->session->id_users.'_lakhir_'.date('YmdHis');

        $config7['upload_path']      = './uploads/file_lakhir/';
        $config7['allowed_types']    = 'jpeg|jpg|png|txt|pdf|doc|docx|xls|xlsx|pptx|rtf';
        $config7['max_size']         = 2048; // 2Mb
        $config7['file_name']       = $nmfilelakhir;

        $this->load->library('upload', $config7);
		$this->upload->initialize($config7);
		$delete = $this->Ajuriph_model->get_by_id($this->input->post('id_mst_riph'));

        $dir2        = "./uploads/file_lakhir/".$delete->file_lakhir;

        if(is_file($dir2))
        {
          unlink($dir2);
        }
        if(!$this->upload->do_upload('file_lakhir'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->update($this->input->post('id_mst_riph'));
        }
		else
		{
			$file_lakhir = $this->upload->data();
			$data = array(
			'file_lakhir'     => $this->upload->data('file_name')
			);
			$this->Ajuriph_model->update($this->input->post('id_mst_riph'),$data);
		}
	  }
        $data = array(
            'nomor_riph'     	=> $this->input->post('nomor_riph'),
            'jenis_riph'     	=> "Bawang Putih",
            'tgl_mulai_berlaku' => $this->input->post('tgl_mulai_berlaku'),
            'tgl_akhir_berlaku' => $this->input->post('tgl_akhir_berlaku'),
            'v_pengajuan_riph'  => $this->input->post('v_pengajuan_riph'),
            'beban_tanam'       => $this->input->post('beban_tanam'),
            'beban_produksi'    => $this->input->post('beban_produksi'),
        );

		$this->Ajuriph_model->update($this->input->post('id_mst_riph'),$data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('ajuriph');
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

}
