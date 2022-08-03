<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Produksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Produksi ';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();

    $this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
	$this->data['btn_back']    = 'Back To List CP/CL';
	$this->load->model('m_wilayah');
	$this->load->model('Cpcl_model');
	$this->load->model('Realisasi_model');
	$this->load->model('Produksi_model');
	$this->load->model('r_verifikasi');
	$this->load->model('ChatModel');
	$this->load->model('m_files');
	$this->data['back_action'] = base_url('cpcl');
	$this->data['back_action2'] = base_url('produksi/daftarproduksi/'.$this->uri->segment(3));
	$this->data['listuri'] = base_url('produksi/daftarproduksi/'.$this->uri->segment(3));
  }

  //function index()
  //{
  // is_login();
  //  is_read();
  //  $this->data['page_title'] = $this->data['module'].' List';
  //  $this->data['get_all_realisasi_by_idcpcl'] = $this->Realisasi_model->get_all_realisasi_by_idcpcl($id);
  // 	$this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
  //  $this->load->view('back/realisasi/realisasi_list', $this->data);
  //}
  
  function daftarrealisasi($id)
  {
    is_login();
    is_read();
    $this->data['page_title'] = $this->data['module'].' List';
	$this->data['keterangan'] = 'ID CP/CL : '.$id;
    $this->data['get_all_realisasi_by_idcpcl'] = $this->Realisasi_model->get_all_realisasi_by_idcpcl($id);
	$this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
    $this->load->view('back/realisasi/realisasi_list', $this->data);
  }
  
  function daftarproduksi($id)
  {
    is_login();
    is_read();
    $this->data['page_title'] = $this->data['module'].' List';
	$this->data['keterangan'] = 'ID CP/CL : '.$id;
    $this->data['get_all_produksi_byid'] = $this->Produksi_model->get_all_produksi_byid($id);
	$this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
    $this->load->view('back/produksi/produksi_list', $this->data);
  }

  function create($idr)
  {
    is_login();
    is_create();
	
	$this->data['user']     = $this->Realisasi_model->get_all_realisasi_by_id_realisasi_forproduksi($idr);

    if($this->data['user'])
    {
		$this->data['page_title'] = 'Create '.$this->data['module'];
		$this->data['action']     = 'produksi/create_action';
		$this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
		$this->data['get_all_marker_cpcl'] = $this->Cpcl_model->get_all_marker_cpcl($idr);

		$this->data['id_realisasi'] = [
		'name'          => 'id_realisasi',
		'id'            => 'id_realisasi',
		'class'         => 'form-control',
		'autocomplete'  => 'off',
		'type'  => 'hidden',
		];
		$this->data['id_cpcl'] = [
		'name'          => 'id_cpcl',
		'id'            => 'id_cpcl',
		'class'         => 'form-control',
		'autocomplete'  => 'off',
		'type'  => 'hidden',
		];
		$this->data['id_users'] = [
		  'name'          => 'id_users',
		  'id'            => 'id_users',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'type'  		  => 'hidden',
		];	
		$this->data['type_pelaksana'] = [
		  'name'          => 'type_pelaksana',
		  'id'            => 'type_pelaksana',
		  'class'         => 'form-control',
		  'type'  		  => 'hidden',
		];
		$this->data['type_pelaksana_value'] = [
		  '1'             => 'Kemitraan',
		  '2'             => 'Swakelola',
		];	
		$this->data['nama_pelaksana'] = [
		  'name'          => 'nama_pelaksana',
		  'id'            => 'nama_pelaksana',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['nama_petugas'] = [
		  'name'          => 'nama_petugas',
		  'id'            => 'nama_petugas',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['luas_realisasi_tanam'] = [
		  'name'          => 'luas_realisasi_tanam',
		  'id'            => 'luas_realisasi_tanam',
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
		$this->data['desa'] = [
		  'name'          => 'desa',
		  'id'            => 'desa`',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['address'] = [
		  'name'          => 'address',
		  'id'            => 'address',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'rows'           => '3',
		];
		$this->data['status_lahan'] = [
		  'name'          => 'status_lahan',
		  'id'            => 'status_lahan',
		  'class'         => 'form-control',
		];
		$this->data['status_lahan_value'] = [
		  'Hak Milik'     => 'Hak Milik',
		  'Sewa'          => 'Sewa',
		];
		$this->data['kontur_lahan'] = [
		  'name'          => 'kontur_lahan',
		  'id'            => 'kontur_lahan',
		  'class'         => 'form-control',
		];
		$this->data['kontur_lahan_value'] = [
		  '1'             => 'Datar',
		  '2'             => 'Miring',
		];
		$this->data['tgl_realisasi_tanam'] = [
		  'name'          => 'tgl_realisasi_tanam',
		  'id'            => 'tgl_realisasi_tanam',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['atitude'] = [
		  'name'          => 'atitude',
		  'id'            => 'atitude',
		  'class'         => 'form-control',
	      'readonly'      => 'readonly',
		  'autocomplete'  => 'off',
		  'required'      => '',
		];
		$this->data['latitude'] = [
		  'name'          => 'latitude',
		  'id'            => 'latitude',
		  'class'         => 'form-control',
	      'readonly'      => 'readonly',
		  'autocomplete'  => 'off',
		  'required'      => '',
		];
		
		$this->data['realisasi_polygon'] = [
		  'name'          => 'realisasi_polygon',
		  'id'            => 'realisasi_polygon',
		  'class'         => 'form-control',
	      'readonly'      => 'readonly',
		  'autocomplete'  => 'off',
		  'required'      => '',
		];
		}
		$this->data['tgl_produksi'] = [
		  'name'          => 'tgl_produksi',
		  'id'            => 'tgl_produksi',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		   'value'         => $this->form_validation->set_value('tgl_produksi'),
		];
		
		$this->data['jml_produksi'] = [
		  'name'          => 'jml_produksi',
		  'id'            => 'jml_produksi',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		   'value'         => $this->form_validation->set_value('jml_produksi'),
		];
	$this->data['file_judul1'] = [
      'name'          => 'file_judul1',
      'id'            => 'file_judul1',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('file_judul1'),
    ];
    $this->data['file_deskripsi1'] = [
      'name'          => 'file_deskripsi1',
      'id'            => 'file_deskripsi1',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('file_deskripsi1'),
    ];
	$this->data['file_judul2'] = [
      'name'          => 'file_judul2',
      'id'            => 'file_judul2',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('file_judul2'),
    ];
    $this->data['file_deskripsi2'] = [
      'name'          => 'file_deskripsi2',
      'id'            => 'file_deskripsi2',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('file_deskripsi2'),
    ];
	$this->data['file_judul3'] = [
      'name'          => 'file_judul3',
      'id'            => 'file_judul3',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('file_judul3'),
    ];
    $this->data['file_deskripsi3'] = [
      'name'          => 'file_deskripsi3',
      'id'            => 'file_deskripsi3',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('file_deskripsi3'),
    ];
	$this->data['file_judul4'] = [
      'name'          => 'file_judul4',
      'id'            => 'file_judul4',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('file_judul4'),
    ];
    $this->data['file_deskripsi4'] = [
      'name'          => 'file_deskripsi4',
      'id'            => 'file_deskripsi4',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('file_deskripsi4'),
    ];
    $this->data['kegiatan1'] = [
      'name'          => 'kegiatan1',
      'id'            => 'kegiatan1',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('kegiatan1'),
    ];
    $this->data['kegiatan2'] = [
      'name'          => 'kegiatan2',
      'id'            => 'kegiatan2',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('kegiatan2'),
    ];
    $this->data['kegiatan3'] = [
      'name'          => 'kegiatan3',
      'id'            => 'kegiatan3',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('kegiatan3'),
    ];
    $this->data['kegiatan4'] = [
      'name'          => 'kegiatan4',
      'id'            => 'kegiatan4',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('kegiatan4'),
    ];
     $this->load->view('back/produksi/produksi_add', $this->data);
  }

  function create_action()
  {
	$this->form_validation->set_rules('tgl_produksi', 'Tanggal Produksi', 'required');
	$this->form_validation->set_rules('jml_produksi', 'Jumlah Produksi', 'required');

    $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->create($id);
    }
    else
    {
        $data = array(
			'id_realisasi'     	=> $this->input->post('id_realisasi'),
			'id_cpcl'        	=> $this->input->post('id_cpcl'),
            'id_users'        	=> $this->session->userdata('id_users'),
            'type_pelaksana'	=> $this->input->post('type_pelaksana'),
            'nama_pelaksana'    => $this->input->post('nama_pelaksana'),
            'nama_petugas'    => $this->input->post('nama_petugas'),
            'tgl_produksi' 		=> date('Y-m-d H:i:s',strtotime($this->input->post('tgl_produksi'))),
            'jml_produksi' 		=> $this->input->post('jml_produksi'),
            'luas_realisasi_tanam'=> $this->input->post('luas_realisasi_tanam'),
			'status_lahan'      => $this->input->post('status_lahan'),
			'kontur_lahan'      => $this->input->post('kontur_lahan'),            
            'provinsi'          => $this->input->post('provinsi'),
            'kabupaten'         => $this->input->post('kabupaten'),
            'kecamatan'         => $this->input->post('kecamatan'),
            'desa'              => $this->input->post('desa'),
            'address'              => $this->input->post('address'),
			'atitude'           => $this->input->post('atitude'),
			'latitude'          => $this->input->post('latitude'),
         //   'lampiran'             => $this->upload->data('file_name'),
         //   'lampiran_thumb'       => $nmfile.'_thumb'.$this->upload->data('file_ext'),
        );

        $this->Produksi_model->insert($data);

        $this->db->select_max('id_produksi');
        $result = $this->db->get('produksi')->row_array();
		$data2 = array(
            'id_users'        	=> $this->session->userdata('id_users'),
			'name'        		=> $this->session->userdata('name'),
            'nama_perusahaan'	=> $this->session->userdata('nama_perusahaan'),
            'jenis_verifikasi'	=> "PRODUKSI",
            'id_r_jverifikasi'  => $result['id_produksi'],
          );
		  
		  $this->r_verifikasi->insert($data2);
		$this->Realisasi_model->update($this->input->post('id_realisasi'), array('is_produksi'=>'1'));
		
		if($_FILES['kegiatan1']['error'] <> 4)
		{
			$nmfile = strtolower(url_title($this->session->userdata('id_users'))).'_'.$result['id_produksi'].'_produksi_'.date('YmdHis');

			$config['upload_path']      = './uploads/produksi/';
			$config['allowed_types']    = 'jpg|jpeg|png|pdf';
			$config['max_size']         = 2048; // 2Mb
			$config['file_name']        = $nmfile;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('kegiatan1'))
			{
			  $error = array('error' => $this->upload->display_errors());
			  $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

			  $this->create($id);
			}
			else
			{
			  $kegiatan1 = $this->upload->data();

			  $thumbnail                  = $config['file_name'];

			  $config['image_library']    = 'gd2';
			  $config['source_image']     = './uploads/produksi/'.$kegiatan1['file_name'].'';
			  $config['create_thumb']     = TRUE;
			  $config['maintain_ratio']   = TRUE;
			  $config['width']            = 250;
			  $config['height']           = 250;

			  $this->load->library('image_lib', $config);
			  $this->image_lib->resize();
			  // ----- simpan asal
			  $data = array(
				'id_users'        	=> $this->session->userdata('id_users'),
				'usertype'			=> $this->session->userdata('usertype'),
				'file_oleh'			=> $this->session->userdata('name'),
				'file_type'			=> 'PRODUKSI',
				'file_judul'		=> $this->input->post('file_judul1'),
				'file_deskripsi'    => $this->input->post('file_deskripsi1'),
				'file_data'         => $this->upload->data('file_name'),
				'file_thumb'    	=> $nmfile.'_thumb'.$this->upload->data('file_ext'),
			  );

			  $this->m_files->insert($data);
			}
		}
		
		if($_FILES['kegiatan2']['error'] <> 4)
		{
			$nmfile = strtolower(url_title($this->session->userdata('id_users'))).'_'.$result['id_produksi'].'_produksi_'.date('YmdHis');

			$config['upload_path']      = './uploads/produksi/';
			$config['allowed_types']    = 'jpg|jpeg|png|pdf';
			$config['max_size']         = 2048; // 2Mb
			$config['file_name']        = $nmfile;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('kegiatan2'))
			{
			  $error = array('error' => $this->upload->display_errors());
			  $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

			  $this->create($id);
			}
			else
			{
			  $kegiatan2 = $this->upload->data();

			  $thumbnail                  = $config['file_name'];

			  $config['image_library']    = 'gd2';
			  $config['source_image']     = './uploads/produksi/'.$kegiatan2['file_name'].'';
			  $config['create_thumb']     = TRUE;
			  $config['maintain_ratio']   = TRUE;
			  $config['width']            = 250;
			  $config['height']           = 250;

			  $this->load->library('image_lib', $config);
			  $this->image_lib->resize();
			  // ----- simpan asal
			  $data = array(
				'id_users'        	=> $this->session->userdata('id_users'),
				'usertype'			=> $this->session->userdata('usertype'),
				'file_oleh'			=> $this->session->userdata('name'),
				'file_type'			=> 'PRODUKSI',
				'file_judul'		=> $this->input->post('file_judul2'),
				'file_deskripsi'    => $this->input->post('file_deskripsi2'),
				'file_data'         => $this->upload->data('file_name'),
				'file_thumb'    	=> $nmfile.'_thumb'.$this->upload->data('file_ext'),
			  );

			  $this->m_files->insert($data);
			}
		}
		if($_FILES['kegiatan3']['error'] <> 4)
		{
			$nmfile = strtolower(url_title($this->session->userdata('id_users'))).'_'.$result['id_produksi'].'_produksi_'.date('YmdHis');

			$config['upload_path']      = './uploads/produksi/';
			$config['allowed_types']    = 'jpg|jpeg|png|pdf';
			$config['max_size']         = 2048; // 2Mb
			$config['file_name']        = $nmfile;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('kegiatan3'))
			{
			  $error = array('error' => $this->upload->display_errors());
			  $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

			  $this->create($id);
			}
			else
			{
			  $kegiatan3 = $this->upload->data();

			  $thumbnail                  = $config['file_name'];

			  $config['image_library']    = 'gd2';
			  $config['source_image']     = './uploads/produksi/'.$kegiatan3['file_name'].'';
			  $config['create_thumb']     = TRUE;
			  $config['maintain_ratio']   = TRUE;
			  $config['width']            = 250;
			  $config['height']           = 250;

			  $this->load->library('image_lib', $config);
			  $this->image_lib->resize();
			  // ----- simpan asal
			  $data = array(
				'id_users'        	=> $this->session->userdata('id_users'),
				'usertype'			=> $this->session->userdata('usertype'),
				'file_oleh'			=> $this->session->userdata('name'),
				'file_type'			=> 'PRODUKSI',
				'file_judul'		=> $this->input->post('file_judul3'),
				'file_deskripsi'    => $this->input->post('file_deskripsi3'),
				'file_data'         => $this->upload->data('file_name'),
				'file_thumb'    	=> $nmfile.'_thumb'.$this->upload->data('file_ext'),
			  );

			  $this->m_files->insert($data);
			}
		}
		if($_FILES['kegiatan4']['error'] <> 4)
		{
			$nmfile = strtolower(url_title($this->session->userdata('id_users'))).'_'.$result['id_produksi'].'_produksi_'.date('YmdHis');

			$config['upload_path']      = './uploads/produksi/';
			$config['allowed_types']    = 'jpg|jpeg|png|pdf';
			$config['max_size']         = 2048; // 2Mb
			$config['file_name']        = $nmfile;
			$this->load->library('upload', $config);
			$this->upload>initialize($config);
			if(!$this->upload->do_upload('kegiatan4'))
			{
			  $error = array('error' => $this->upload->display_errors());
			  $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

			  $this->create($id);
			}
			else
			{
			  $kegiatan3 = $this->upload->data();

			  $thumbnail                  = $config['file_name'];

			  $config['image_library']    = 'gd2';
			  $config['source_image']     = './uploads/produski/'.$kegiatan4['file_name'].'';
			  $config['create_thumb']     = TRUE;
			  $config['maintain_ratio']   = TRUE;
			  $config['width']            = 250;
			  $config['height']           = 250;

			  $this->load->library('image_lib', $config);
			  $this->image_lib->resize();
			  // ----- simpan asal
			  $data = array(
				'id_users'        	=> $this->session->userdata('id_users'),
				'usertype'			=> $this->session->userdata('usertype'),
				'file_oleh'			=> $this->session->userdata('name'),
				'file_type'			=> 'PRODUKSI',
				'file_judul'		=> $this->input->post('file_judul4'),
				'file_deskripsi'    => $this->input->post('file_deskripsi4'),
				'file_data'         => $this->upload->data('file_name'),
				'file_thumb'    	=> $nmfile.'_thumb'.$this->upload->data('file_ext'),
			  );

			  $this->m_files->insert($data);
			}
		}

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('realisasi/daftarrealisasi/'.$this->input->post('id_cpcl'));
      }
  }

  function update($id,$idr)
  {
    is_login();
    is_update();
	$this->data['user'] 	= $this->Produksi_model->get_all_produksi_by_idrealisasi($id, $idr);
    //$this->data['user']     = $this->Cpcl_model->get_all_cpcl_by_idcpcl($id);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Update '.$this->data['module'];
      $this->data['action']     = 'produksi/update_action';

      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
	  $this->data['get_all_combobox_kabupaten'] = $this->m_wilayah->get_all_kabupaten2();
	  $this->data['get_all_combobox_kecamatan'] = $this->m_wilayah->get_all_kecamatan();
	  $this->data['get_all_combobox_desa'] = $this->m_wilayah->get_all_desa();

      $this->data['id_cpcl'] = [
      'name'          => 'id_cpcl',
      'type'          => 'hidden',
    ];
	$this->data['id_users'] = [
      'name'          => 'id_users',
      'type'          => 'hidden',
    ];	
	$this->data['id_realisasi'] = [
      'name'          => 'id_realisasi',
      'type'          => 'hidden',
    ];	
	$this->data['id_produksi'] = [
      'name'          => 'id_produksi',
      'type'          => 'hidden',
    ];	
    $this->data['nama_perusahaan'] = [
      'name'          => 'nama_perusahaan',
      'id'            => 'nama_perusahaan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['type_pelaksana'] = [
      'name'          => 'type_pelaksana',
      'id'            => 'type_pelaksana',
      'class'         => 'form-control',
    ];
    $this->data['type_pelaksana_value'] = [
      '1'             => 'Kemitraan',
      '2'             => 'Swakelola',
    ];	
    $this->data['nama_pelaksana'] = [
      'name'          => 'nama_pelaksana',
      'id'            => 'nama_pelaksana',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
    $this->data['nama_petugas'] = [
      'name'          => 'nama_petugas',
      'id'            => 'nama_petugas',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
		$this->data['tgl_produksi'] = [
		  'name'          => 'tgl_produksi',
		  'id'            => 'tgl_produksi',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
	$this->data['luas_realisasi_tanam'] = [
      'name'          => 'luas_realisasi_tanam',
      'id'            => 'luas_realisasi_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['provinsi'] = [
      'name'          => 'provinsi',
      'id'            => 'provinsi',
      'class'         => 'form-control',
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
	$this->data['desa'] = [
      'name'          => 'desa',
      'id'            => 'desa`',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
    $this->data['address'] = [
      'name'          => 'address',
      'id'            => 'address',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'rows'           => '3',
    ];
	$this->data['status_lahan'] = [
      'name'          => 'status_lahan',
      'id'            => 'status_lahan',
      'class'         => 'form-control',
    ];
    $this->data['status_lahan_value'] = [
      'Hak Milik'     => 'Hak Milik',
      'Sewa'          => 'Sewa',
	];
    $this->data['luas_lahan'] = [
      'name'          => 'luas_lahan',
      'id'            => 'luas_lahan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
	$this->data['kontur_lahan'] = [
      'name'          => 'kontur_lahan',
      'id'            => 'kontur_lahan',
      'class'         => 'form-control',
    ];
    $this->data['kontur_lahan_value'] = [
      '1'             => 'Datar',
      '2'             => 'Miring',
    ];
    $this->data['atitude'] = [
      'name'          => 'atitude',
      'id'            => 'atitude',
      'class'         => 'form-control',
	  'readonly'      => 'readonly',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['latitude'] = [
      'name'          => 'latitude',
      'id'            => 'latitude',
      'class'         => 'form-control',
	  'readonly'      => 'readonly',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['realisasi_polygon'] = [
      'name'          => 'realisasi_polygon',
      'id'            => 'realisasi_polygon',
      'class'         => 'form-control',
	  'readonly'      => 'readonly',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
		
		$this->data['jml_produksi'] = [
		  'name'          => 'jml_produksi',
		  'id'            => 'jml_produksi',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];

      $this->load->view('back/produksi/produksi_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('realisasi/daftarrealisasi/'.$idr);
    }
  }

  function update_action()
  {
	$this->form_validation->set_rules('nama_pelaksana', 'Pelaksana', 'required');
	$this->form_validation->set_rules('atitude', 'Atitude', 'required');
	$this->form_validation->set_rules('latitude', 'Latitude', 'required');

    // $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_cpcl'),$this->input->post('id_realisasi'));
    }
    else
    {
        $data = array(
		    'id_produksi'        	=> $this->input->post('id_produksi'),
			'id_realisasi'        	=> $this->input->post('id_realisasi'),
			'id_cpcl'        	=> $this->input->post('id_cpcl'),
            'id_users'        	=> $this->session->userdata('id_users'),
            'type_pelaksana'	=> $this->input->post('type_pelaksana'),
            'nama_pelaksana'    => $this->input->post('nama_pelaksana'),
            'nama_petugas'    => $this->input->post('nama_petugas'),
            'tgl_produksi' 		=> date('Y-m-d H:i:s',strtotime($this->input->post('tgl_produksi'))),
			'jml_produksi	'   => $this->input->post('jml_produksi'),
            'luas_realisasi_tanam'=> $this->input->post('luas_realisasi_tanam'),
			'status_lahan'      => $this->input->post('status_lahan'),
			'kontur_lahan'      => $this->input->post('kontur_lahan'),            
            'provinsi'          => $this->input->post('provinsi'),
            'kabupaten'         => $this->input->post('kabupaten'),
            'kecamatan'         => $this->input->post('kecamatan'),
            'desa'              => $this->input->post('desa'),
            'address'              => $this->input->post('address'),
			'atitude'           => $this->input->post('atitude'),
			'latitude'          => $this->input->post('latitude'),
        );

        $this->Produksi_model->update($this->input->post('id_produksi'),$data);

        //$this->write_log();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
        redirect('realisasi/daftarrealisasi/'.$this->input->post('id_cpcl'));
    }
  }

  function delete($id)
  {
    is_login();
    is_delete();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Cpcl_model->get_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Cpcl_model->soft_delete($id, $data);

      $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('cpcl');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('cpcl');
    }
  }

  function delete_permanent($id)
  {
    is_login();
    is_delete();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->Cpcl_model->get_by_id($id);

    if($delete)
    {
      $dir        = "./assets/images/user/".$delete->lampiran;
      $dir_thumb  = "./assets/images/user/".$delete->lampiran_thumb;

      if(is_file($dir))
      {
        unlink($dir);
        unlink($dir_thumb);
      }

      $this->Tanam_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('cpcl/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('cpcl');
    }
  }

  function deleted_list()
  {
    is_login();
    is_restore();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title'] = 'Deleted '.$this->data['module'].' List';

    $this->data['get_all_deleted'] = $this->Auth_model->get_all_deleted();

    $this->load->view('back/cpcl/cpcl_deleted_list', $this->data);
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

    $row = $this->Cpcl_model->get_by_id($id);

    if($row)
    {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Cpcl_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('cpcl/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('cpcl');
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
