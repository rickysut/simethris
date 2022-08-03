<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
	$this->load->library('user_agent');
    $this->data['module'] = 'Realisasi Tanam';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();
	
	$this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
	$this->load->model('m_wilayah');
	$this->load->model('Cpcl_model');
	$this->load->model('Realisasi_model');
	$this->load->model('r_verifikasi');
	$this->load->model('ChatModel');
	$this->load->model('M_files');
	$this->load->model('petani_model','person');
	$this->load->model('lokasi_model','lokasi');
  }

  function index()
  {
    is_login();
    is_read();
    $this->data['page_title'] = $this->data['module'].' List';
    //$this->data['get_all_realisasi_by_idcpcl'] = $this->Realisasi_model->get_all_realisasi_by_idcpcl($id);
	  $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
    $this->load->view('back/realisasi/realisasi_list', $this->data);
  }
  
  function daftarrealisasi($id)
  {
    is_login();
    is_read();
    $this->data['page_title'] = 'Daftar '.$this->data['module'].' ID PKS : '.$id;
	  $this->data['keterangan'] = 'ID PKS : '.$id;
    $this->data['btn_add']    = 'Add New Data';
	  $this->data['btn_back']    = 'Back To List PKS';
	  $this->data['btn_back2']    = 'Back To List Realisasi';
    $this->data['add_action'] = base_url('realisasi/create/'.$id);
	  $this->data['back_action'] = base_url('cpcl/daftarriph/'.$id);
	  $this->data['back_action2'] = base_url('realisasi/daftarrealisasi/'.$this->uri->segment(3));
	  $this->data['listuri'] = base_url('realisasi/daftarrealisasi/'.$this->uri->segment(3));
    $this->data['get_all_realisasi_by_idcpcl'] = $this->Realisasi_model->get_all_realisasi_by_idcpcl($id);
	  $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
    $this->load->view('back/realisasi/realisasi_list', $this->data);
  }

  function create($id)
  {
    is_login();
    is_create();
	
	$this->data['user']     = $this->Cpcl_model->get_all_cpcl_by_idcpcl($id);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Tambah '.$this->data['module'];
      $this->data['action']     = 'realisasi/create_action';

      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
	  $this->data['get_all_marker_cpcl'] = $this->Cpcl_model->get_all_marker_cpcl($id);

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
      '0'             => 'Pilih Jenis Pelaksana',
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
	  'type'  => 'hidden',
    ];
	$this->data['tgl_rencana_tanam'] = [
      'name'          => 'tgl_rencana_tanam',
      'id'            => 'tgl_rencana_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['luas_rencana_tanam'] = [
      'name'          => 'luas_rencana_tanam',
      'id'            => 'luas_rencana_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['provinsi'] = [
      'name'          => 'provinsi',
      'id'            => 'provinsi',
      'class'         => 'form-control',
      'required'      => '',
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
      'required'      => '',
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
    }
	$this->data['tgl_realisasi_tanam'] = [
      'name'          => 'tgl_realisasi_tanam',
      'id'            => 'tgl_realisasi_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
	  'value'         => $this->form_validation->set_value('tgl_realisasi_tanam'),
    ];
	$this->data['luas_realisasi_tanam'] = [
      'name'          => 'luas_realisasi_tanam',
      'id'            => 'luas_realisasi_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
	  'value'         => $this->form_validation->set_value('luas_realisasi_tanam'),
    ];
    $this->data['atitude'] = [
      'name'          => 'atitude',
      'id'            => 'atitude',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
	  'readonly'      => 'readonly',
      'required'      => '',
      'value'         => $this->form_validation->set_value('atitude'),
    ];
    $this->data['latitude'] = [
      'name'          => 'latitude',
      'id'            => 'latitude',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
	  'readonly'      => 'readonly',
      'required'      => '',
      'value'         => $this->form_validation->set_value('latitude'),
    ];
    $this->data['realisasi_polygon'] = [
      'name'          => 'realisasi_polygon',
      'id'            => 'realisasi_polygon',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
	  'readonly'      => 'readonly',
      'required'      => '',
      'value'         => $this->form_validation->set_value('realisasi_polygon'),
    ];
	
     $this->load->view('back/realisasi/realisasi_add', $this->data);
  }

  function create_action()
  {
	$this->form_validation->set_rules('nama_pelaksana', 'Pelaksana', 'required');
	$this->form_validation->set_rules('address', 'Alamat', 'required');
	$this->form_validation->set_rules('atitude', 'Atitude', 'required');
	$this->form_validation->set_rules('latitude', 'Latitude', 'required');
	//$this->form_validation->set_rules('kontur_lahan', 'Kontur Lahan', 'required');

    $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->create($this->input->post('id_cpcl'));
    }
    else
    {
        $data = array(
			'id_cpcl'        	=> $this->input->post('id_cpcl'),
            'id_users'        	=> $this->session->userdata('id_users'),
            'type_pelaksana'	=> $this->input->post('type_pelaksana'),
            'nama_pelaksana'    => $this->input->post('nama_pelaksana'),
            'nama_petugas'    => $this->input->post('nama_petugas'),
            'tgl_realisasi_tanam' => date('Y-m-d H:i:s',strtotime($this->input->post('tgl_realisasi_tanam'))),
            'luas_realisasi_tanam'=> $this->input->post('luas_realisasi_tanam'),
			'status_lahan'      => $this->input->post('status_lahan'),
			'kontur_lahan'      => $this->input->post('kontur_lahan'),   
            'provinsi'          => substr($this->input->post('provinsi'),0,2),
            'kabupaten'         => substr($this->input->post('kabupaten'),0,4),
            'kecamatan'         => $this->input->post('kecamatan'),
            'desa'              => $this->input->post('desa'),
            'address'              => $this->input->post('address'),
			'atitude'           => $this->input->post('atitude'),
			'latitude'          => $this->input->post('latitude'),
			'realisasi_polygon' => $this->input->post('realisasi_polygon'),
        );

        $this->Realisasi_model->insert($data);

        $this->db->select_max('id_realisasi');
        $result = $this->db->get('realisasi')->row_array();
		$data2 = array(
            'id_users'        	=> $this->session->userdata('id_users'),
			'name'        		=> $this->session->userdata('name'),
            'nama_perusahaan'	=> $this->session->userdata('nama_perusahaan'),
            'jenis_verifikasi'	=> "REALISASI",
            'id_r_jverifikasi'  => $result['id_realisasi'],
          );
		  
		$this->r_verifikasi->insert($data2);
		
		$data = array();
        if(!empty($_FILES['upload_Files']['name'])){
            $filesCount = count($_FILES['upload_Files']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['upload_File']['name'] = $_FILES['upload_Files']['name'][$i];
                $_FILES['upload_File']['type'] = $_FILES['upload_Files']['type'][$i];
                $_FILES['upload_File']['tmp_name'] = $_FILES['upload_Files']['tmp_name'][$i];
                $_FILES['upload_File']['error'] = $_FILES['upload_Files']['error'][$i];
                $_FILES['upload_File']['size'] = $_FILES['upload_Files']['size'][$i];
                $uploadPath = 'uploads/realisasi';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|ico';  
				$config['file_name']= strtolower($this->session->userdata('id_users').'_realisasi_'.$result['id_realisasi'].'_'.date('YmdHis'));
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('upload_File')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_data'] = $fileData['file_name'];
					$uploadData[$i]['id_users'] = $this->session->userdata('id_users');
					$uploadData[$i]['usertype'] = $this->session->userdata('usertype');
					$uploadData[$i]['file_judul'] = 'Update Mingguan';
					$uploadData[$i]['file_deskripsi'] = 'Update Mingguan '.date("Y-m-d H:i:s");
                    $uploadData[$i]['file_tanggal'] = date("Y-m-d H:i:s");
					$uploadData[$i]['file_oleh'] = $this->session->userdata('username');
					$uploadData[$i]['file_download'] = '0';
					$uploadData[$i]['file_type'] = 'REALISASI';
					$uploadData[$i]['file_thumb'] = strtolower($this->session->userdata('id_users').'_realisasi_'.$result['id_realisasi'].'_'.date('YmdHis').$fileData['file_name']);
                }
            }            
            if(!empty($uploadData)){
                //Insert file information into the database
                $insert = $this->M_files->insertBatch($uploadData);
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
			        }
        //Get files data from database
        //$this->data['gallery'] = $this->m_files->getRows($this->session->userdata('id_users'), $result['id_realisasi']);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
		redirect('realisasi/daftarrealisasi/'.$this->input->post('id_cpcl'));
      }
  }

  function update($id,$idr)
  {
    is_login();
    is_update();
	$this->data['user'] 	= $this->Realisasi_model->get_all_realisasi_by_idrealisasi($id, $idr);
	
	
    //$this->data['user']     = $this->Cpcl_model->get_all_cpcl_by_idcpcl($id);

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Update '.$this->data['module'];
      $this->data['action']     = 'realisasi/update_action';

      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
	  $this->data['gallery'] = $this->M_files->getRows($this->session->userdata('id_users'), $idr);

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
    $this->data['nama_perusahaan'] = [
      'name'          => 'nama_perusahaan',
      'id'            => 'nama_perusahaan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'readonly'  => '',
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
      'readonly'  => '',
    ];
	$this->data['nama_petugas'] = [
      'name'          => 'nama_petugas',
      'id'            => 'nama_petugas',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['varietas'] = [
      'name'          => 'varietas',
      'id'            => 'varietas',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['tgl_realisasi_tanam'] = [
      'name'          => 'tgl_realisasi_tanam',
      'id'            => 'tgl_realisasi_tanam',
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
      'required'      => '',
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
      $this->load->view('back/realisasi/realisasi_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('realisasi/daftarrealisasi/'.$this->input->post('id_cpcl'));
    }
  }

  function update_action()
  {
    $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
    $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
    $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
    $this->form_validation->set_rules('desa', 'Desa', 'required');
	$this->form_validation->set_rules('nama_pelaksana', 'Pelaksana', 'required');
	//$this->form_validation->set_rules('status_lahan', 'Status Lahan', 'required');
	$this->form_validation->set_rules('atitude', 'Atitude', 'required');
	$this->form_validation->set_rules('latitude', 'Latitude', 'required');
	//$this->form_validation->set_rules('kontur_lahan', 'Kontur Lahan', 'required');

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
			'id_cpcl'        	=> $this->input->post('id_cpcl'),
            'id_users'        	=> $this->session->userdata('id_users'),
            'type_pelaksana'	=> $this->input->post('type_pelaksana'),
            'nama_pelaksana'    => $this->input->post('nama_pelaksana'),
            'nama_petugas'    => $this->input->post('nama_petugas'),
            'tgl_realisasi_tanam' => date('Y-m-d H:i:s',strtotime($this->input->post('tgl_realisasi_tanam'))),
            'luas_realisasi_tanam'=> $this->input->post('luas_realisasi_tanam'),
			'status_lahan'      => $this->input->post('status_lahan'),
			'kontur_lahan'      => $this->input->post('kontur_lahan'),         
            'provinsi'          => substr($this->input->post('provinsi'),0,2),
            'kabupaten'         => substr($this->input->post('kabupaten'),0,4),
            'kecamatan'         => $this->input->post('kecamatan'),
            'desa'              => $this->input->post('desa'),
            'address'              => $this->input->post('address'),
			'atitude'           => $this->input->post('atitude'),
			'latitude'          => $this->input->post('latitude'),
			'realisasi_polygon' => $this->input->post('realisasi_polygon'),
        );

        $this->Realisasi_model->update($this->input->post('id_realisasi'),$data);

        //$this->write_log();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
		redirect('realisasi/daftarrealisasi/'.$this->input->post('id_cpcl'));
    }
  }

  function delete($id)
  {
    is_login();

    //if(!is_superadmin())
    //{
    //  $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
    //  redirect('dashboard');
    //}

    $delete = $this->Realisasi_model->get_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Realisasi_model->soft_delete($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('cpcl');
	  //redirect('realisasi/daftarrealisasi/'.$this->input->post('id_cpcl'));
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('cpcl');
	  //redirect('realisasi/daftarrealisasi/'.$this->input->post('id_cpcl'));
    }
  }

  function delete_permanent($id)
  {
    is_login();
    is_delete();

    //if(!is_superadmin())
    //{
    //  $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
    //  redirect('dashboard');
    //}

    $delete = $this->Realisasi_model->get_by_id($id);

    if($delete)
    {
      $dir        = "./uploads/realisasi/".$delete->lampiran;
      $dir_thumb  = "./uploads/realisasi/".$delete->lampiran_thumb;

      if(is_file($dir))
      {
        unlink($dir);
        unlink($dir_thumb);
      }

      $this->Realisasi_model->delete($id);

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

    //if(!is_superadmin())
    //{
    //  $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
    //  redirect('dashboard');
    //}

    $this->data['page_title'] = 'Deleted '.$this->data['module'].' List';

    $this->data['get_all_deleted'] = $this->Realisasi_model->get_all_deleted();

    $this->load->view('back/realisasi/realisasi_deleted_list', $this->data);
  }

  function restore($id)
  {
    is_login();
    is_restore();

    //if(!is_superadmin())
    //{
    //  $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
    //  redirect('dashboard');
    //}

    $row = $this->Realisasi_model->get_by_id($id);

    if($row)
    {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->Realisasi_model->update($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('realisasi/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('realisasi');
    }
  }

  function activate($id)
  {
    is_login();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->Realisasi_model->update($this->uri->segment('3'), array('is_active'=>'1'));

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

    $this->Realisasi_model->update($this->uri->segment('3'), array('is_active'=>'0'));

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
	
	public function ajax_list($idpoktan)
	{
		$list = $this->lokasi->get_by_id_cpcl($idpoktan);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$row = array();
			$row[] = '';
			$row[] = $person->id_lokasi;
			$row[] = $person->nik;
			$row[] = $idpoktan;
			$row[] = $person->nama_petani;
			$row[] = $person->alamat;
			$row[] = $person->tgl_rencana_tanam;
			$row[] = $person->rencana_luas_tanam;
			$row[] = $person->atitude;
			$row[] = $person->latitude;
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->person->count_all(),
						"recordsFiltered" => $this->person->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

}
