<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require './vendor/autoload.php';

class Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'User';

    $this->data['company_data']    				  = $this->Company_model->company_profile();
	  $this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();

    $this->data['btn_submit']               = 'Save / Daftar';
    $this->data['btn_reset']                = 'Reset';
    $this->data['btn_add']                  = 'Add New Data';
	  $this->load->model('m_wilayah');
	  $this->load->model('r_verifikasi');
	  $this->load->model('ChatModel');
    $this->data['add_action']               = base_url('auth/create');
  }

  function index()
  {
    is_login();
    is_read();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title']               = $this->data['module'].' List';
    $this->data['get_all']                  = $this->Auth_model->get_all();
	  $this->data['get_jml_verifikasi']			  = $this->r_verifikasi->get_jml_r_verifikasi();

    $this->load->view('back/auth/user_list', $this->data);
  }

  function create()
  {
    is_login();
    is_create();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['page_title']                     = 'Tambah '.$this->data['module'].' Baru';
    $this->data['action']                         = 'auth/create_action';

    $this->data['get_all_combobox_usertype']      = $this->Usertype_model->get_all_combobox();
    $this->data['get_all_combobox_data_access']   = $this->Dataaccess_model->get_all_combobox();
	  $this->data['get_all_combobox_provinsi']      = $this->m_wilayah->get_all_provinsi();
	  $this->data['get_jml_verifikasi']				      = $this->r_verifikasi->get_jml_r_verifikasi();

    $this->data['name'] = [
      'name'          => 'name',
      'id'            => 'name',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('name'),
    ];
    /*$this->data['birthdate'] = [
      'name'          => 'birthdate',
      'id'            => 'birthdate',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
	    'type'          => 'hidden',
      'value'         => $this->form_validation->set_value('birthdate'),
    ];
    $this->data['birthplace'] = [
      'name'          => 'birthplace',
      'id'            => 'birthplace',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
	    'type'          => 'hidden',
      'value'         => $this->form_validation->set_value('birthplace'),
    ];
    $this->data['gender'] = [
      'name'          => 'gender',
      'id'            => 'gender',
      'class'         => 'form-control',
	    'type'          => 'hidden',
    ];
    $this->data['gender_value'] = [
      '1'             => 'Male',
      '2'             => 'Female',
    ];
    */
    $this->data['address'] = [
      'name'          => 'address',
      'id'            => 'address',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'rows'           => '3',
      'value'         => $this->form_validation->set_value('address'),
    ];
    $this->data['phone'] = [
      'name'          => 'phone',
      'id'            => 'phone',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('phone'),
    ];
    $this->data['email'] = [
      'name'          => 'email',
      'id'            => 'email',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('email'),
    ];
    $this->data['username'] = [
      'name'          => 'username',
      'id'            => 'username',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('username'),
    ];
    $this->data['password'] = [
      'name'          => 'password',
      'id'            => 'password',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('password'),
    ];
    $this->data['password_confirm'] = [
      'name'          => 'password_confirm',
      'id'            => 'password_confirm',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('password_confirm'),
    ];
    $this->data['usertype'] = [
      'name'          => 'usertype',
      'id'            => 'usertype',
      'class'         => 'form-control',
      'required'      => '',
    ];
    $this->data['data_access_id'] = [
      'name'          => 'data_access_id[]',
      'id'            => 'data_access_id',
      'class'         => 'form-control select2',
      'required'      => '',
      'multiple'      => '',
    ];
	  /*$this->data['nama_perusahaan'] = [
      'name'          => 'nama_perusahaan',
      'id'            => 'nama_perusahaan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('nama_perusahaan'),
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
      'value'         => $this->form_validation->set_value('kabupaten'),
    ];
	  $this->data['kecamatan'] = [
      'name'          => 'kecamatan',
      'id'            => 'kecamatan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('kecamatan'),
    ];
	  $this->data['desa'] = [
      'name'          => 'desa',
      'id'            => 'desa`',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('desa'),
    ];
	  $this->data['alamat'] = [
      'name'          => 'alamat',
      'id'            => 'alamatn',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'rows'           => '3',
      'value'         => $this->form_validation->set_value('alamat'),
    ];
	  $this->data['phone_number'] = [
      'name'          => 'phone_number',
      'id'            => 'phone_number',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('phone_number'),
    ];
	  $this->data['kode_pos'] = [
      'name'          => 'kode_pos',
      'id'            => 'kode_pos',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('kode_pos'),
    ];
	  $this->data['nomor_riph'] = [
      'name'          => 'nomor_riph',
      'id'            => 'nomor_riph',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('nomor_riph'),
    ];
	  $this->data['jenis_riph'] = [
      'name'          => 'jenis_riph',
      'id'            => 'jenis_riph',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('jenis_riph'),
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
      'value'         => $this->form_validation->set_value('v_pengajuan_riph'),
    ];
	  $this->data['beban_tanam'] = [
      'name'          => 'beban_tanam',
      'id'            => 'beban_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('beban_tanam'),
    ];
	  $this->data['beban_produksi'] = [
      'name'          => 'beban_produksi',
      'id'            => 'beban_produksi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('beban_produksi'),
    ];
    */
    $this->load->view('back/auth/user_add', $this->data);

  }

  function create_action()
  {
    $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
    //$this->form_validation->set_rules('phone', 'Phone No', 'trim|is_numeric');
    $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]|required');
    $this->form_validation->set_rules('username', 'Username', 'trim|is_unique[users.username]|required');
    $this->form_validation->set_rules('usertype', 'Usertype', 'required');
    $this->form_validation->set_rules('data_access_id[]', 'Data Access', 'required');
    $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|required');
    $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|matches[password]|required');
	  /*$this->form_validation->set_rules('nama_perusahaan', 'Full Name', 'trim|required');
	  $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
	  $this->form_validation->set_rules('kabupaten', 'Kabupaten/Kota', 'required');
	  $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
	  $this->form_validation->set_rules('desa', 'Desa/Kelurahan', 'required');
	  $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
    $this->form_validation->set_rules('phone_number', 'Phone No', 'trim|is_numeric');
	  $this->form_validation->set_rules('kode_pos', 'Kode POS', 'trim|is_numeric');
    */
    // $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->create();
    }
    else
    {
      $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
	    $typeuser = 3;
	    $createdby = "Own Self";

      if($_FILES['photo']['error'] <> 4)
      {
        $nmfile = strtolower(url_title($this->input->post('username'))).'_photo_'.date('YmdHis');

        $config['upload_path']      = '.uploads/user/';
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = 2048; // 2Mb
        $config['file_name']        = $nmfile;
        $this->load->library('upload', $config);
		    $this->upload->initialize($config);
        if(!$this->upload->do_upload('photo'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->create();
        }
        else
        {
          $photo = $this->upload->data();

          $thumbnail                  = $config['file_name'];

          $config['image_library']    = 'gd2';
          $config['source_image']     = '.uploads/user/'.$photo['file_name'].'';
          $config['create_thumb']     = TRUE;
          $config['maintain_ratio']   = TRUE;
          $config['width']            = 250;
          $config['height']           = 250;

          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
          // ----- simpan asal
		      $data = array(
            'photo'             => $this->upload->data('file_name'),
            'photo_thumb'       => $nmfile.'_thumb'.$this->upload->data('file_ext'),
          );
        }
      }
      /*if($_FILES['file_sk']['error'] <> 4)
	    {
		    $nmfilesk = strtolower(url_title($this->input->post('username'))).'_sk_'.date('YmdHis');

        $config1['upload_path']      = '.uploads/user/';
        $config1['allowed_types']    = 'docx|pdf|doc|jpg';
        $config1['max_size']         = 2048; // 2Mb
        $config1['file_name']       = $nmfilesk;

        $this->load->library('upload', $config1);
		    $this->upload->initialize($config1);
        if(!$this->upload->do_upload('file_sk'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->create();
        }
		else
		{
			$file_sk = $this->upload->data();
			$data = array(
			'file_sk'     => $this->upload->data('file_name')
			);
		}
	  }
	  if($_FILES['file_ktp']['error'] <> 4)
	  {
		    $nmfilektp = strtolower(url_title($this->input->post('username'))).'_ktp_'.date('YmdHis');

        $config2['upload_path']      = '.uploads/file_ktp/';
        $config2['allowed_types']    = 'docx|pdf|doc|jpg';
        $config2['max_size']         = 2048; // 2Mb
        $config2['file_name']       = $nmfilektp;

        $this->load->library('upload', $config2);
		    $this->upload->initialize($config2);
        if(!$this->upload->do_upload('file_ktp'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->create();
        }
        else
        {
          $file_ktp = $this->upload->data();
          $data = array(
          'file_sk'     => $this->upload->data('file_name')
          );
        }
	  }
	  if($_FILES['file_riph']['error'] <> 4)
	  {
		    $nmfileriph = strtolower(url_title($this->input->post('username'))).'_riph_'.date('YmdHis');

        $config3['upload_path']      = '.uploads/file_riph/';
        $config3['allowed_types']    = 'docx|pdf|doc|jpg';
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
		    $nmfileform5 = strtolower(url_title($this->input->post('username'))).'_f5_'.date('YmdHis');

        $config4['upload_path']      = '.uploads/file_form5/';
        $config4['allowed_types']    = 'docx|pdf|doc|jpg';
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
          $file_riph = $this->upload->data();
          $data = array(
          'file_form5'     => $this->upload->data('file_name')
          );
        }
	  }*/
      $data = array(
          'name'              => $this->input->post('name'),
          'address'           => $this->input->post('address'),
          'phone'             => $this->input->post('phone'),
          'email'             => $this->input->post('email'),
          'username'          => $this->input->post('username'),
          'password'          => $password,
          'usertype'          => $typeuser,
          /*'nama_perusahaan'   => $this->input->post('nama_perusahaan'),
          'provinsi'          => $this->input->post('provinsi'),
          'kabupaten'         => $this->input->post('kabupaten'),
          'kecamatan'         => $this->input->post('kecamatan'),
          'desa'          	  => $this->input->post('desa'),
          'alamat'            => $this->input->post('alamat'),
          'phone_number'      => $this->input->post('phone_number'),
          'kode_pos'          => $this->input->post('kode_pos'),
          'nomor_riph'        => $this->input->post('nomor_riph'),
          'jenis_riph'        => $this->input->post('jenis_riph'),
          'tgl_mulai_berlaku' => $this->input->post('tgl_mulai_berlaku'),
          'tgl_akhir_berlaku' => $this->input->post('tgl_akhir_berlaku'),
          'v_pengajuan_riph'  => $this->input->post('v_pengajuan_riph'),
          'beban_tanam'       => $this->input->post('beban_tanam'),
          'beban_produksi'    => $this->input->post('beban_produksi'),
          'file_sk'     	    => $file_sk['file_name'],
          'file_ktp'     	    => $file_ktp['file_name'],
          'file_riph'     	  => $file_riph['file_name'],
          'file_form5'     	  => $nmfileform5['file_name'],
		      */
          'photo'             => $photo['file_name'],
          'photo_thumb'       => $nmfile.'_thumb'.$this->upload->data('file_ext'),
          'created_by'        => $createdby,
          'ip_add_reg'        => $this->input->ip_address()
        );


          $this->Auth_model->insert($data);

          $this->db->select_max('id_users');
          $result = $this->db->get('users')->row_array();

          $data_access_id = count($this->input->post('data_access_id'));

          for($i_data_access_id = 0; $i_data_access_id < $data_access_id; $i_data_access_id++)
          {
            $datas_data_access_id[$i_data_access_id] = array(
              'user_id'           => $result['id_users'],
              'data_access_id'    => $this->input->post('data_access_id['.$i_data_access_id.']'),
            );

            $this->db->insert('users_data_access', $datas_data_access_id[$i_data_access_id]);
          }
		  
		      //$this->m_files->insert($data);

          $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
          redirect('auth');
		}
  }

  function update($id)
  {
    is_login();
    is_update();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->data['user']     = $this->Auth_model->get_by_id($id);
	  $this->data['get_jml_verifikasi']				= $this->r_verifikasi->get_jml_r_verifikasi();

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Update Data '.$this->data['module'];
      $this->data['action']     = 'auth/update_action';

      $this->data['get_all_combobox_usertype']      = $this->Usertype_model->get_all_combobox();
      $this->data['get_all_combobox_data_access']   = $this->Dataaccess_model->get_all_combobox();
      $this->data['get_all_data_access_old']        = $this->Dataaccess_model->get_all_data_access_old($id);
      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi();
      $this->data['get_all_combobox_kabupaten'] = $this->m_wilayah->get_all_kabupaten();
      $this->data['get_all_combobox_kecamatan'] = $this->m_wilayah->get_all_kecamatan();
      $this->data['get_all_combobox_desa'] = $this->m_wilayah->get_all_desa();
      $this->data['id_users'] = [
        'name'          => 'id_users',
        'type'          => 'hidden',
      ];
      $this->data['name'] = [
        'name'          => 'name',
        'id'            => 'name',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['address'] = [
        'name'          => 'address',
        'id'            => 'address',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'rows'           => '3',
      ];
      $this->data['phone'] = [
        'name'          => 'phone',
        'id'            => 'phone',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
      ];
      $this->data['email'] = [
        'name'          => 'email',
        'id'            => 'email',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['username'] = [
        'name'          => 'username',
        'id'            => 'username',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['password'] = [
        'name'          => 'password',
        'id'            => 'password',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['password_confirm'] = [
        'name'          => 'password_confirm',
        'id'            => 'password_confirm',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['usertype'] = [
        'name'          => 'usertype',
        'id'            => 'usertype',
        'class'         => 'form-control',
        'required'      => '',
      ];
      $this->data['data_access_id'] = [
        'name'          => 'data_access_id[]',
        'id'            => 'data_access_id',
        'class'         => 'form-control select2',
        'required'      => '',
        'multiple'      => '',
      ];
      $this->data['nama_perusahaan'] = [
        'name'          => 'nama_perusahaan',
        'id'            => 'nama_perusahaan',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
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
      $this->data['alamat'] = [
        'name'          => 'alamat',
        'id'            => 'alamatn',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'rows'           => '3',
      ];
      $this->data['phone_number'] = [
        'name'          => 'phone_number',
        'id'            => 'phone_number',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
      ];
      $this->data['kode_pos'] = [
        'name'          => 'kode_pos',
        'id'            => 'kode_pos',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
      ];
      $this->data['nomor_riph'] = [
        'name'          => 'nomor_riph',
        'id'            => 'nomor_riph',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
      ];
      $this->data['jenis_riph'] = [
        'name'          => 'jenis_riph',
        'id'            => 'jenis_riph',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
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
        'autocomplete'  => 'off',
      ];
      $this->data['beban_tanam'] = [
        'name'          => 'beban_tanam',
        'id'            => 'beban_tanam',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
      ];
      $this->data['beban_produksi'] = [
        'name'          => 'beban_produksi',
        'id'            => 'beban_produksi',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
      ];

      $this->load->view('back/auth/user_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('auth');
    }

  }

  function update_action()
  {
    $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
    $this->form_validation->set_rules('phone', 'Phone No', 'trim|is_numeric');
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
    $this->form_validation->set_rules('usertype', 'Usertype', 'required');
    $this->form_validation->set_rules('data_access_id[]', 'Data Access');

    // $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_users'));
    }
    else
    {
      $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
	    $typeuser = 3;
	    $createdby = "Own Self";

      if($_FILES['photo']['error'] <> 4)
      {
        $nmfile = strtolower(url_title($this->input->post('username'))).'_photo_'.date('YmdHis');

        $config['upload_path']      = '.uploads/user/';
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = 2048; // 2Mb
        $config['file_name']        = $nmfile;
        $this->load->library('upload', $config);
		    $this->upload->initialize($config);
        if(!$this->upload->do_upload('photo'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->create();
        }
        else
        {
          $photo = $this->upload->data();

          $thumbnail                  = $config['file_name'];

          $config['image_library']    = 'gd2';
          $config['source_image']     = '.uploads/user/'.$photo['file_name'].'';
          $config['create_thumb']     = TRUE;
          $config['maintain_ratio']   = TRUE;
          $config['width']            = 250;
          $config['height']           = 250;

          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
          // ----- simpan asal
		      $data = array(
          'photo'             => $this->upload->data('file_name'),
          'photo_thumb'       => $nmfile.'_thumb'.$this->upload->data('file_ext'),
        );
        }
      }
      if($_FILES['file_sk']['error'] <> 4)
	    {
		    $nmfilesk = strtolower(url_title($this->input->post('username'))).'_sk_'.date('YmdHis');

        $config1['upload_path']      = '.uploads/file_sk/';
        $config1['allowed_types']    = 'docx|pdf|doc|jpg';
        $config1['max_size']         = 2048; // 2Mb
        $config1['file_name']       = $nmfilesk;

        $this->load->library('upload', $config1);
		    $this->upload->initialize($config1);
        if(!$this->upload->do_upload('file_sk'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->create();
        }
		else
		{
			$file_sk = $this->upload->data();
			$data = array(
			'file_sk'     => $this->upload->data('file_name')
			);
		}
	  }
	  if($_FILES['file_ktp']['error'] <> 4)
	  {
		    $nmfilektp = strtolower(url_title($this->input->post('username'))).'_ktp_'.date('YmdHis');

        $config2['upload_path']      = '.uploads/file_ktp/';
        $config2['allowed_types']    = 'docx|pdf|doc|jpg';
        $config2['max_size']         = 2048; // 2Mb
        $config2['file_name']       = $nmfilektp;

        $this->load->library('upload', $config2);
		    $this->upload->initialize($config2);
        if(!$this->upload->do_upload('file_ktp'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->create();
        }
		else
		{
			$file_ktp = $this->upload->data();
			$data = array(
			'file_sk'     => $this->upload->data('file_name')
			);
		}
	  }
	  if($_FILES['file_riph']['error'] <> 4)
	  {
		    $nmfileriph = strtolower(url_title($this->input->post('username'))).'_riph_'.date('YmdHis');

        $config3['upload_path']      = '.uploads/file_riph/';
        $config3['allowed_types']    = 'docx|pdf|doc|jpg';
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
		    $nmfileriph = strtolower(url_title($this->input->post('username'))).'_f5_'.date('YmdHis');

        $config4['upload_path']      = '.uploads/file_form5/';
        $config4['allowed_types']    = 'docx|pdf|doc|jpg';
        $config4['max_size']         = 2048; // 2Mb
        $config4['file_name']       = $nmfileriph;

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
			$file_riph = $this->upload->data();
			$data = array(
			'file_form5'     => $this->upload->data('file_name')
			);
		}
	  }
      $data = array(
          'name'              => $this->input->post('name'),
          'address'           => $this->input->post('address'),
          'phone'             => $this->input->post('phone'),
          'email'             => $this->input->post('email'),
          'username'          => $this->input->post('username'),
          'password'          => $password,
          'usertype'          => $typeuser,
          'nama_perusahaan'   => $this->input->post('nama_perusahaan'),
          'provinsi'          => $this->input->post('provinsi'),
          'kabupaten'         => $this->input->post('kabupaten'),
          'kecamatan'         => $this->input->post('kecamatan'),
          'desa'          	  => $this->input->post('desa'),
          'alamat'            => $this->input->post('alamat'),
          'phone_number'      => $this->input->post('phone_number'),
          'kode_pos'          => $this->input->post('kode_pos'),
          //'nomor_riph'        => $this->input->post('nomor_riph'),
          //'jenis_riph'        => $this->input->post('jenis_riph'),
          //'tgl_mulai_berlaku' => $this->input->post('tgl_mulai_berlaku'),
          //'tgl_akhir_berlaku' => $this->input->post('tgl_akhir_berlaku'),
          //'v_pengajuan_riph'  => $this->input->post('v_pengajuan_riph'),
          //'beban_tanam'       => $this->input->post('beban_tanam'),
          //'beban_produksi'    => $this->input->post('beban_produksi'),
          'file_sk'     	  => $file_sk['file_name'],
          'file_ktp'     	  => $file_ktp['file_name'],
          //'file_riph'     	  => $file_riph['file_name'],
          //'file_form5'     	  => $file_form5['file_name'],
          'created_by'        => $createdby,
          'ip_add_reg'        => $this->input->ip_address(),
          'photo'             => $photo['file_name'],
          'photo_thumb'       => $nmfile.'_thumb'.$this->upload->data('file_ext'),
        );

        $this->Auth_model->update($this->input->post('id_users'),$data);

        $this->write_log();

        if(!empty($this->input->post('data_access_id')))
        {
          $this->db->where('user_id', $this->input->post('id_users'));
          $this->db->delete('users_data_access');

          $data_access_id = count($this->input->post('data_access_id'));

          for($i_data_access_id = 0; $i_data_access_id < $data_access_id; $i_data_access_id++)
          {
            $datas_data_access_id[$i_data_access_id] = array(
              'user_id'           => $this->input->post('id_users'),
              'data_access_id'    => $this->input->post('data_access_id['.$i_data_access_id.']'),
            );

            $this->db->insert('users_data_access', $datas_data_access_id[$i_data_access_id]);

            $this->write_log();
          }
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
        redirect('auth');
      
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

    $delete = $this->Auth_model->get_by_id($id);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->Auth_model->soft_delete($id, $data);

      $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('auth');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('auth');
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

    $delete = $this->Auth_model->get_by_id($id);

    if($delete)
    {
      $dir         = ".uploads/user/".$delete->photo;
      $dir_thumb   = ".uploads/user/".$delete->photo_thumb;
	    $dir1        = ".uploads/file_sk/".$delete->file_sk;
      $dir2        = ".uploads/file_ktp/".$delete->file_ktp;
      $dir3        = ".uploads/file_riph/".$delete->file_riph;
      $dir4        = ".uploads/file_form5/".$delete->file_form5;

      if(is_file($dir))
      {
        unlink($dir);
        unlink($dir_thumb);
		    unlink($dir1);
        unlink($dir2);
        unlink($dir3);
        unlink($dir4);
      }

      $this->Auth_model->delete($id);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('auth/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('auth');
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

    $this->load->view('back/auth/user_deleted_list', $this->data);
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
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
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

  function activate($id)
  {
    is_login();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->Auth_model->update($this->uri->segment('3'), array('is_active'=>'1'));

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data activate successfully</div>');
	  $gmail = $this->Auth_model->get_by_id($this->uri->segment('3'));
	// Kirim Email Aktivasi
	//$hash = random_str(50);
    $email = $gmail->email;
    $gmail_account    = $this->Company_model->company_profile();
    $this->load->library('phpmailer_lib');

          // PHPMailer object
    $mail = $this->phpmailer_lib->load();

          // SMTP configuration
    $mail->isSMTP();
          //$mail->Host     = 'ssl://smtp.gmail.com';
	  $mail->Host     = 'ssl://smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $gmail_account->company_gmail;
    $mail->Password = $gmail_account->company_gmail_pass;
    $mail->SMTPSecure = 'ssl';
    $mail->Port     = 465;
		  //$mail->SMTPSecure = 'tls';
          //$mail->Port     = 587;
			
    $mail->setFrom($gmail_account->company_gmail, $gmail_account->company_name);
    $mail->addReplyTo($gmail_account->company_gmail);

          // Add a recipient
    $mail->addAddress($email);

          // Email subject
    $mail->Subject = 'Aktivasi Akun simeTHRIS';

          // Set email format to HTML
    $mail->isHTML(true);

          // Email body content
    $mailContent = "
            <h1>Hallo, ".$email."</h1>
            <p>Permintaan anda sebaga user simeTHRIS diterima. Akun anda Sudah di Aktifkan. <br>
              Silahkan Login menggunakan username : ".$gmail->username." di Aplikasi simeTHRIS<br>
            </p>
            <p>Jika Anda tidak melakukan permintaan ini, Anda dapat dengan aman mengabaikan pesan ini. </p>
          ";

    $mail->Body = $mailContent;

          // Send email
    if($mail->send())
    {
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data aktifasi berhasil dikirim. </div>');
        redirect('auth');
    }
    else
    {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

        $this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf, Data aktivasi gagal dikirim. Silakan coba lagi nanti.</div>');
        redirect('auth');
    }
  }

  function deactivate($id)
  {
    is_login();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $this->Auth_model->update($this->uri->segment('3'), array('is_active'=>'0'));

    $this->session->set_flashdata('message', '<div class="alert alert-success">Data deactivate successfully</div>');
    redirect('auth');
  }

  function update_profile($id)
  {
    is_login();

    $this->data['user']     = $this->Auth_model->get_by_id($id);
	  $this->data['get_jml_verifikasi']				= $this->r_verifikasi->get_jml_r_verifikasi();

    if($id != $this->session->id_users)
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t change other user profile</div>');
      redirect('dashboard');
    }

    if($this->data['user'])
    {
      $this->data['page_title'] = 'Update Profile L.O / Perusahaan ';
      $this->data['action']     = 'auth/update_profile_action';

      $this->data['get_all_combobox_usertype']      = $this->Usertype_model->get_all_combobox();
      $this->data['get_all_combobox_data_access']   = $this->Dataaccess_model->get_all_combobox();
      $this->data['get_all_data_access_old']        = $this->Dataaccess_model->get_all_data_access_old($id);
      $this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
      $this->data['get_all_combobox_kabupaten'] = $this->m_wilayah->get_all_kabupaten();
      $this->data['get_all_combobox_kecamatan'] = $this->m_wilayah->get_all_kecamatan();
      $this->data['get_all_combobox_desa'] = $this->m_wilayah->get_all_desa();
      $this->data['id_users'] = [
        'name'          => 'id_users',
        'type'          => 'hidden',
      ];
      $this->data['name'] = [
        'name'          => 'name',
        'id'            => 'name',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
    $this->data['address'] = [
      'name'          => 'address',
      'id'            => 'address',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'rows'           => '3',
    ];
    $this->data['phone'] = [
      'name'          => 'phone',
      'id'            => 'phone',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
    $this->data['email'] = [
      'name'          => 'email',
      'id'            => 'email',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['username'] = [
      'name'          => 'username',
      'id'            => 'username',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['password'] = [
      'name'          => 'password',
      'id'            => 'password',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['password_confirm'] = [
      'name'          => 'password_confirm',
      'id'            => 'password_confirm',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['usertype'] = [
      'name'          => 'usertype',
      'id'            => 'usertype',
      'class'         => 'form-control',
      'required'      => '',
    ];
    $this->data['data_access_id'] = [
      'name'          => 'data_access_id[]',
      'id'            => 'data_access_id',
      'class'         => 'form-control select2',
      'required'      => '',
      'multiple'      => '',
    ];
	$this->data['nama_perusahaan'] = [
      'name'          => 'nama_perusahaan',
      'id'            => 'nama_perusahaan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
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
	$this->data['alamat'] = [
      'name'          => 'alamat',
      'id'            => 'alamatn',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'rows'           => '3',
    ];
	$this->data['phone_number'] = [
      'name'          => 'phone_number',
      'id'            => 'phone_number',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['kode_pos'] = [
      'name'          => 'kode_pos',
      'id'            => 'kode_pos',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['nomor_riph'] = [
      'name'          => 'nomor_riph',
      'id'            => 'nomor_riph',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['jenis_riph'] = [
      'name'          => 'jenis_riph',
      'id'            => 'jenis_riph',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
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
      'autocomplete'  => 'off',
    ];
	$this->data['beban_tanam'] = [
      'name'          => 'beban_tanam',
      'id'            => 'beban_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];
	$this->data['beban_produksi'] = [
      'name'          => 'beban_produksi',
      'id'            => 'beban_produksi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
    ];

      $this->load->view('back/auth/update_profile', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('dashboard');
    }
  }

  function update_profile_action()
  {
    $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
    $this->form_validation->set_rules('phone', 'Phone No', 'trim|is_numeric');
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'valid_email|required');

    $this->form_validation->set_message('required', '{field} wajib diisi');
    $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update_profile($this->input->post('id_users'));
    }
    else
    {
      if($_FILES['photo']['error'] <> 4)
      {
        $nmfile = strtolower(url_title($this->input->post('username'))).'_photo_'.date('YmdHis');

        $config['upload_path']      = '.uploads/user/';
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = 2048; // 2Mb
        $config['file_name']        = $nmfile;
        $this->load->library('upload', $config);
		    $this->upload->initialize($config);
		
		    $delete = $this->Auth_model->get_by_id($this->input->post('id_users'));

        $dir        = ".uploads/user/".$delete->photo;
        $dir_thumb  = ".uploads/user/".$delete->photo_thumb;

        if(is_file($dir))
        {
          unlink($dir);
          unlink($dir_thumb);
        }
		
        if(!$this->upload->do_upload('photo'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->update_profile($this->input->post('id_users'));
        }
        else
        {
          $photo = $this->upload->data();

          $thumbnail                  = $config['file_name'];

          $config['image_library']    = 'gd2';
          $config['source_image']     = '.uploads/user/'.$photo['file_name'].'';
          $config['create_thumb']     = TRUE;
          $config['maintain_ratio']   = TRUE;
          $config['width']            = 250;
          $config['height']           = 250;

          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
		      $delete = $this->Auth_model->get_by_id($this->input->post('id_users'));

          // ----- simpan asal
		      $data = array(
            'photo'             => $this->upload->data('file_name'),
            'photo_thumb'       => $nmfile.'_thumb'.$this->upload->data('file_ext'),
          );
		      $this->Auth_model->update($this->input->post('id_users'),$data);
        }
      }
      if($_FILES['file_sk']['error'] <> 4)
	  {
		    $nmfilesk = strtolower(url_title($this->input->post('username'))).'_sk_'.date('YmdHis');

        $config1['upload_path']      = '.uploads/file_sk/';
        $config1['allowed_types']    = 'docx|pdf|doc|jpg';
        $config1['max_size']         = 2048; // 2Mb
        $config1['file_name']       = $nmfilesk;

        $this->load->library('upload', $config1);
		    $dir        = ".uploads/file_sk/".$delete->file_sk;

        if(is_file($dir))
        {
            unlink($dir);
        }

		    $this->upload->initialize($config1);
        if(!$this->upload->do_upload('file_sk'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->update_profile($this->input->post('id_users'));
        }
		else
		{
			$file_sk = $this->upload->data();
			$data = array(
			'file_sk'     => $this->upload->data('file_name')
			);
			$this->Auth_model->update($this->input->post('id_users'),$data);
		}
	  }
	  if($_FILES['file_ktp']['error'] <> 4)
	  {
		    $nmfilektp = strtolower(url_title($this->input->post('username'))).'_ktp_'.date('YmdHis');

        $config2['upload_path']      = '.uploads/file_ktp/';
        $config2['allowed_types']    = 'docx|pdf|doc|jpg';
        $config2['max_size']         = 2048; // 2Mb
        $config2['file_name']       = $nmfilektp;

        $this->load->library('upload', $config2);
		    $dir        = ".uploads/file_ktp/".$delete->file_ktp;

        if(is_file($dir))
        {
            unlink($dir);
        }
		    $this->upload->initialize($config2);
        if(!$this->upload->do_upload('file_ktp'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->update_profile($this->input->post('id_users'));
        }
		else
		{
			$file_ktp = $this->upload->data();
			$data = array(
			'file_ktp'     => $this->upload->data('file_name')
			);
			$this->Auth_model->update($this->input->post('id_users'),$data);
		}
	  }
	  if($_FILES['logo_perusahaan']['error'] <> 4)
	  {
		    $nmfilelogo = strtolower(url_title($this->input->post('username'))).'_logo_'.date('YmdHis');

        $config5['upload_path']      = './uploads/company/';
        $config5['allowed_types']    = 'jpg|png';
        $config5['max_size']         = 2048; // 2Mb
        $config5['file_name']       = $nmfilelogo;

        $this->load->library('upload', $config5);
		    $dir        = ".uploads/company/".$delete->file_ktp;

        if(is_file($dir))
        {
            unlink($dir);
        }
		    $this->upload->initialize($config5);
        if(!$this->upload->do_upload('logo_perusahaan'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->registration();
        }
		else
		{
			$file_logo = $this->upload->data();
			$data = array(
			'logo_perusahaan'     => $this->upload->data('file_name')
			);
			$this->Auth_model->update($this->input->post('id_users'),$data);
		}
	  }
      $createdby = "Own Self";
      $data = array(
          'name'              => $this->input->post('name'),
          'address'           => $this->input->post('address'),
          'phone'             => $this->input->post('phone'),
          'email'             => $this->input->post('email'),
          'username'          => $this->input->post('username'),
          'nama_perusahaan'   => $this->input->post('nama_perusahaan'),
          'provinsi'          => $this->input->post('provinsi'),
          'kabupaten'         => $this->input->post('kabupaten'),
          'kecamatan'         => $this->input->post('kecamatan'),
          'desa'          	  => $this->input->post('desa'),
          'alamat'            => $this->input->post('alamat'),
          'phone_number'      => $this->input->post('phone_number'),
          'kode_pos'          => $this->input->post('kode_pos'),
		      'created_by'        => $createdby,
          'ip_add_reg'        => $this->input->ip_address(),
        );

        $this->Auth_model->update($this->input->post('id_users'),$data);

        $this->write_log();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
        redirect('auth/update_profile/'.$this->session->id_users);
      }
    
  }

  function change_password()
  {
    is_login();

    $this->data['page_title'] = 'Change Password';
    $this->data['action']     = 'auth/change_password_action';
	  $this->data['get_jml_verifikasi']				= $this->r_verifikasi->get_jml_r_verifikasi();

    $this->data['get_all_users']     = $this->Auth_model->get_all_combobox();

    $this->data['user_id'] = [
      'name'          => 'user_id',
      'type'          => 'hidden',
      'class'          => 'form-control',
    ];
    $this->data['new_password'] = [
      'name'          => 'new_password',
      'id'            => 'new_password',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];
    $this->data['confirm_new_password'] = [
      'name'          => 'confirm_new_password',
      'id'            => 'confirm_new_password',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];

    $this->load->view('back/auth/change_password', $this->data);
  }

  function change_password_action()
  {
    $this->form_validation->set_rules('new_password', 'Password', 'min_length[8]|required');
    $this->form_validation->set_rules('confirm_new_password', 'Password Confirmation', 'matches[new_password]|required');

    // $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() == FALSE)
    {
      $this->change_password();
    }
    else
    {
      $password = password_hash($this->input->post('new_password'), PASSWORD_BCRYPT);

      if(is_superadmin()){$id_user = $this->input->post('user_id');}
      else{$id_user = $this->session->id_users;}

      $data = array(
        'password' => $password
      );

      $this->Auth_model->update($id_user, $data);

      $this->write_log();

      $this->session->set_flashdata('message', '<div class="alert alert-success">Password change successfully</div>');
      redirect('auth/change_password');
    }
  }

  function login()
  {
    $this->data['page_title'] = 'Login';
    $this->data['action']     = 'auth/login';

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    $this->form_validation->set_message('required', '{field} wajib diisi');

    if($this->form_validation->run() === TRUE)
    {
      $row = $this->Auth_model->get_by_username($this->input->post('username'));

      if(!$row->username)
      {
        $this->session->set_flashdata('error', '<div class="alert alert-danger">Username Tidak Ditemukan</div>');
		//$this->toastr->error('Username Tidak Ditemukan');
        redirect('auth/login');
      }
      elseif($row->is_active == 0)
      {
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Akun Anda Tidak Aktif</div>');
		//$this->toastr->error('Akun Anda Tidak Aktif');
        redirect('auth/login');
      }
      elseif(!password_verify($this->input->post('password'), $row->password))
      {
        $log = $this->Auth_model->get_total_login_attempts_per_user($this->input->post('username'));

        // kunci akun kalau gagal input password 3x
        if($log > 2)
        {
          $this->Auth_model->lock_account($this->input->post('username'), array('is_active' => '0'));

          $this->Auth_model->clear_login_attempt($this->input->post('username'));

          $this->session->set_flashdata('message', '<div class="alert alert-danger">Terlalu banyak upaya login, kami mengatur akun Anda menjadi INACTIVE. Silakan hubungi superadmin untuk membukanya lagi.</div>');
          //$this->toastr->error('Terlalu banyak upaya login, kami mengatur akun Anda menjadi INACTIVE. Silakan hubungi superadmin untuk membukanya lagi.');
		      redirect('auth/login');
        }
        else
        {
          $this->Auth_model->insert_login_attempt(array('ip_address'=>$this->input->ip_address(), 'username'=>$this->input->post('username')));

          $this->session->set_flashdata('message', '<div class="alert alert-danger">Salah Password</div>');
          //$this->toastr->error('Salah Password');
		      redirect('auth/login');
        }

      }
      else
      {
        $this->Auth_model->clear_login_attempt($this->input->post('username'));
        if(empty($row->nama_perusahaan)){
            $namaper = "Administrator";
            }else{
            $namaper =$row->nama_perusahaan;
        }
		    if(empty($row->logo_perusahaan)){
            $logoper = './assets/images/logo_dirjen.png';
            }else{
            $logoper = './uploads/company/'.$row->logo_perusahaan;
        }
        $session = array(
          'id_users'    => $row->id_users,
          'name'        => $row->name,
          'username'    => $row->username,
          'email'       => $row->email,
          'usertype'    => $row->usertype,
          'photo'       => $row->photo,
          'photo_thumb' => $row->photo_thumb,
		      'nama_perusahaan' => $namaper,
		      'logo_perusahaan' => $logoper
        );

        $this->session->set_userdata($session);

        $this->Auth_model->update($this->session->id_users, array('last_login'=>date('Y-m-d H:i:s'),'is_online'=>1));

        redirect('dashboard');
      }
    }
    else
    {
      $this->data['username'] = [
        'name'              => 'username',
        'id'                => 'username',
        'class'             => 'form-control',
        'placeholder'       => 'Please insert your username',
		    'aria-label'		=> 'Recipients username', 
		    'aria-describedby'	=> 'basic-addon1',
        'value'             => $this->form_validation->set_value('username'),
      ];

      $this->data['password'] = [
        'name'              => 'password',
        'id'                => 'password',
        'class'             => 'form-control',
        'placeholder'       => 'Please insert your password',
		    'aria-label'		=> 'Recipients password', 
		    'aria-describedby'	=> 'basic-addon2',
        'value'             => $this->form_validation->set_value('password'),
      ];

      $this->load->view('back/auth/login', $this->data);
    }
  }

  function logout()
  {
	  $this->Auth_model->update($this->session->id_users, array('last_login'=>date('Y-m-d H:i:s'),'is_online'=>0));  
    $this->session->sess_destroy();

    redirect('auth/login');
  }

  function forgot_password()
  {
    $this->data['page_title'] = "Forgot Password";
    $this->data['action']     = 'auth/forgot_password_process';

    $this->data['email'] = [
      'name'          => 'email',
      'id'            => 'email',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
    ];

    $this->load->view('back/auth/forgot_password', $this->data);
  }

  function forgot_password_process()
  {
    $this->load->helper(array('random_str'));

    if(isset($_POST['submit']))
    {
      $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

      if($this->form_validation->run() == FALSE)
      {
        $this->forgot_password();
      }
      else
      {
        $email_check = $this->Auth_model->get_by_email($this->input->post('email'));

        if(!$email_check)
        {
          $this->session->set_flashdata('message', '<div class="alert alert-danger">Sorry, we can\'t find your email.</div>');
          redirect('auth/forgot_password');
        }
        else
        {
          $hash = random_str(50);
          $email = $this->input->post('email');

          $gmail_account    = $this->Company_model->company_profile();

          $this->load->library('phpmailer_lib');

          // PHPMailer object
          $mail = $this->phpmailer_lib->load();

          // SMTP configuration
          $mail->isSMTP();
          //$mail->Host     = 'ssl://smtp.gmail.com';
		      $mail->Host     = 'ssl://smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = $gmail_account->company_gmail;
          $mail->Password = $gmail_account->company_gmail_pass;
          $mail->SMTPSecure = 'ssl';
          $mail->Port     = 465;
		      //$mail->SMTPSecure = 'tls';
          //$mail->Port     = 587;
			
          $mail->setFrom($gmail_account->company_gmail, $gmail_account->company_name);
          $mail->addReplyTo($gmail_account->company_gmail);

          // Add a recipient
          $mail->addAddress($email);

          // Email subject
          $mail->Subject = 'Forgot Password Attempt';

          // Set email format to HTML
          $mail->isHTML(true);

          // Email body content
          $mailContent = "
            <h1>Hallo, ".$email."</h1>
            <p>Beberapa saat yang lalu, kami menerima permintaan Anda untuk mengatur ulang akun kata sandi Anda. <br>
              Untuk mengatur ulang kata sandi Anda, silakan klik tautan berikut di bawah ini::
            </p>
            <p><a href='".base_url('auth/reset_password/'.$hash)."'>".$hash."</a></p>
            <p>Jika Anda tidak melakukan permintaan ini, Anda dapat dengan aman mengabaikan pesan ini. Permintaan secara otomatis tidak akan dilanjutkan.</p>
          ";

          $mail->Body = $mailContent;

          // Send email
          if($mail->send())
          {
            $this->Auth_model->update_by_email($email, array('code_forgotten'=>$hash));

            $this->session->set_flashdata('message', '<div class="alert alert-success">Kata sandi Anda telah berhasil direset. Silakan periksa email Anda.</div>');
            redirect('auth/forgot_password');
          }
          else
          {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

            $this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf, lupa kata sandi gagal. Silakan coba lagi nanti.</div>');
            redirect('auth/forgot_password');
          }
        }
      }
    }
    else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You must enter the submit button!</div>');
      redirect('auth/forgot_password');
    }
  }

  function reset_password($code = NULL)
  {
    $this->data['reset'] = $this->Auth_model->get_by_code_forgotten($code);

    if(!$this->data['reset'] OR $code == NULL)
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Sorry, we can\'t found the forgotten code.</div>');
      redirect('auth/forgot_password');
    }
    else
    {
      $this->data['page_title'] = 'Reset Password';
      $this->data['action'] = 'auth/reset_password_process/'.$code;

      $this->data['code_forgotten'] = [
        'name'      => 'code_forgotten',
        'type'      => 'hidden',
        'value'     => $this->uri->segment(3),
      ];
      $this->data['new_password'] = [
        'name'          => 'new_password',
        'class'         => 'form-control',
        'placeholder'   => 'Insert your New Password',
        'required'      => '',
      ];

      $this->load->view('back/auth/reset_password', $this->data);

    }
  }

  function reset_password_process()
  {
    $this->form_validation->set_rules('new_password', 'New Password', 'min_length[8]|required');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() == FALSE)
    {
      $this->reset_password($this->input->post('code_forgotten'));
    }
    else
    {
      $password = password_hash($this->input->post('new_password'), PASSWORD_BCRYPT);

      $data = array(
        'password'        => $password,
        'code_forgotten'  => '',
      );

      $this->Auth_model->update_by_code_forgotten($this->input->post('code_forgotten'), $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success">New Password saved successfully.</div>');
      redirect('auth/login');
    }
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

  function log_list()
  {
    is_login();
    is_superadmin();

    $this->data['page_title'] = 'Log System Process';

    $this->data['get_all']    = $this->Log_model->get_all();
	  $this->data['get_jml_verifikasi']				= $this->r_verifikasi->get_jml_r_verifikasi();

    $this->load->view('back/auth/log_list', $this->data);
  }

  function registration()
  {
    $this->data['page_title']                    = 'Registration';
    $this->data['action']                        = 'auth/registration_action';
    $this->data['get_all_combobox_usertype']     = $this->Usertype_model->get_all_combobox();
    $this->data['get_all_combobox_data_access']  = $this->Dataaccess_model->get_all_combobox();
	  $this->data['get_all_combobox_provinsi']     = $this->m_wilayah->get_all_provinsi();

    $this->data['name'] = [
      'name'          => 'name',
      'id'            => 'name',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('name'),
    ];
    $this->data['address'] = [
      'name'          => 'address',
      'id'            => 'address',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'rows'           => '3',
      'value'         => $this->form_validation->set_value('address'),
    ];
    $this->data['phone'] = [
      'name'          => 'phone',
      'id'            => 'phone',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('phone'),
    ];
    $this->data['email'] = [
      'name'          => 'email',
      'id'            => 'email',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('email'),
    ];
    $this->data['username'] = [
      'name'          => 'username',
      'id'            => 'username',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('username'),
    ];
    $this->data['password'] = [
      'name'          => 'password',
      'id'            => 'password',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('password'),
    ];
    $this->data['password_confirm'] = [
      'name'          => 'password_confirm',
      'id'            => 'password_confirm',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('password_confirm'),
    ];
    $this->data['usertype'] = [
      'name'          => 'usertype',
      'id'            => 'usertype',
      'class'         => 'form-control',
      'required'      => '',
    ];
    $this->data['data_access_id'] = [
      'name'          => 'data_access_id[]',
      'id'            => 'data_access_id',
      'class'         => 'form-control select2',
      'required'      => '',
      'multiple'      => '',
    ];
	$this->data['nama_perusahaan'] = [
      'name'          => 'nama_perusahaan',
      'id'            => 'nama_perusahaan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('nama_perusahaan'),
    ];
	$this->data['direktur_perusahaan'] = [
      'name'          => 'direktur_perusahaan',
      'id'            => 'direktur_perusahaan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'required'      => '',
      'value'         => $this->form_validation->set_value('direktur_perusahaan'),
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
      'value'         => $this->form_validation->set_value('kabupaten'),
    ];
	$this->data['kecamatan'] = [
      'name'          => 'kecamatan',
      'id'            => 'kecamatan',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('kecamatan'),
    ];
	$this->data['desa'] = [
      'name'          => 'desa',
      'id'            => 'desa`',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('desa'),
    ];
	$this->data['alamat'] = [
      'name'          => 'alamat',
      'id'            => 'alamatn',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'rows'           => '3',
      'value'         => $this->form_validation->set_value('alamat'),
    ];
	$this->data['phone_number'] = [
      'name'          => 'phone_number',
      'id'            => 'phone_number',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('phone_number'),
    ];
	$this->data['kode_pos'] = [
      'name'          => 'kode_pos',
      'id'            => 'kode_pos',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('kode_pos'),
    ];
	$this->data['nomor_riph'] = [
      'name'          => 'nomor_riph',
      'id'            => 'nomor_riph',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('nomor_riph'),
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
      'value'         => $this->form_validation->set_value('v_pengajuan_riph'),
    ];
	$this->data['beban_tanam'] = [
      'name'          => 'beban_tanam',
      'id'            => 'beban_tanam',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('beban_tanam'),
    ];
	$this->data['beban_produksi'] = [
      'name'          => 'beban_produksi',
      'id'            => 'beban_produksi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('beban_produksi'),
    ];
    $this->load->view('back/auth/registration', $this->data);

  }

  function registration_action()
  {
    $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
    //$this->form_validation->set_rules('phone', 'Phone No', 'trim|is_numeric');
    $this->form_validation->set_rules('username', 'Username', 'trim|is_unique[users.username]|required');
    $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]|required');
    // $this->form_validation->set_rules('usertype', 'Usertype', 'required');
    // $this->form_validation->set_rules('data_access_id[]', 'Data Access', 'required');
    $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|required');
    $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|matches[password]|required');
    $this->form_validation->set_rules('nama_perusahaan', 'Full Name', 'trim|required');
    $this->form_validation->set_rules('direktur_perusahaan', 'Nama Direktur', 'trim|required');
    $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
    $this->form_validation->set_rules('kabupaten', 'Kabupaten/Kota', 'required');
    $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
    $this->form_validation->set_rules('desa', 'Desa/Kelurahan', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
    $this->form_validation->set_rules('phone_number', 'Phone No', 'trim|is_numeric');
	  $this->form_validation->set_rules('kode_pos', 'Kode POS', 'trim|is_numeric');

    $this->form_validation->set_message('required', '{field} wajib diisi');
    $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->registration();
    }
    else
    {
      $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
	    $typeuser = 3;
	    $createdby = "Own Self";

      if($_FILES['photo']['error'] <> 4)
      {
        $nmfile = strtolower(url_title($this->input->post('username'))).'_photo_'.date('YmdHis');

        $config['upload_path']      = './uploads/user/';
        $config['allowed_types']    = 'docx|pdf|doc|jpg|png|jpeg';
        $config['max_size']         = 2048; // 2Mb
        $config['file_name']        = $nmfile;
        $this->load->library('upload', $config);
		    $this->upload->initialize($config);
        if(!$this->upload->do_upload('photo'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->registration();
        }
        else
        {
          $photo = $this->upload->data();
		      $data = array(
          'photo'             => $this->upload->data('file_name'),
          );
          $thumbnail                  = $config['file_name'];

          $config['image_library']    = 'gd2';
          $config['source_image']     = './uploads/user/'.$photo['file_name'].'';
          $config['create_thumb']     = TRUE;
          $config['maintain_ratio']   = TRUE;
          $config['width']            = 250;
          $config['height']           = 250;

          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
          // ----- simpan asal
		  //$photo_thumb = $nmfile.'_thumb'.$this->upload->data('file_ext');
        }
      }
      if($_FILES['file_sk']['error'] <> 4)
	  {
		    $nmfilesk = strtolower(url_title($this->input->post('username'))).'_sk_'.date('YmdHis');

        $config1['upload_path']      = './uploads/file_sk/';
        $config1['allowed_types']    = 'docx|pdf|doc|jpg|png|jpeg';
        $config1['max_size']         = 2048; // 2Mb
        $config1['file_name']       = $nmfilesk;

        $this->load->library('upload', $config1);
		    $this->upload->initialize($config1);
        if(!$this->upload->do_upload('file_sk'))
        {
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->registration();
        }
		else
		{
			$file_sk = $this->upload->data();
			$data = array(
			'file_sk'     => $this->upload->data('file_name')
			);
		}
	  }
	  if($_FILES['file_ktp']['error'] <> 4)
	  {
		    $nmfilektp = strtolower(url_title($this->input->post('username'))).'_ktp_'.date('YmdHis');

        $config2['upload_path']      = './uploads/file_ktp/';
        $config2['allowed_types']    = 'pdf|doc|jpg|png|jpeg';
        $config2['max_size']         = 2048; // 2Mb
        $config2['file_name']       = $nmfilektp;

        $this->load->library('upload', $config2);
		    $this->upload->initialize($config2);
        if(!$this->upload->do_upload('file_ktp'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->registration();
        }
		else
		{
			$file_ktp = $this->upload->data();
			$data = array(
			'file_ktp'     => $this->upload->data('file_name')
			);
		}
	  }
	  if($_FILES['file_riph']['error'] <> 4)
	  {
		    $nmfileriph = strtolower(url_title($this->input->post('username'))).'_riph_'.date('YmdHis');

        $config3['upload_path']      = './uploads/file_riph/';
        $config3['allowed_types']    = 'docx|pdf|doc|jpg|png|xls|xlsx';
        $config3['max_size']         = 2048; // 2Mb
        $config3['file_name']       = $nmfileriph;

        $this->load->library('upload', $config3);
		    $this->upload->initialize($config3);
        if(!$this->upload->do_upload('file_riph'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->registration();
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
		    $nmfileform5 = strtolower(url_title($this->input->post('username'))).'_f5_'.date('YmdHis');

        $config4['upload_path']      = './uploads/file_form5/';
        $config4['allowed_types']    = 'docx|pdf|doc|jpg|png|xls|xlsx';
        $config4['max_size']         = 2048; // 2Mb
        $config4['file_name']       = $nmfileform5;

        $this->load->library('upload', $config4);
		    $this->upload->initialize($config4);
        if(!$this->upload->do_upload('file_form5'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->registration();
        }
		    else
        {
          $file_form5 = $this->upload->data();
          $data = array(
          'file_form5'     => $this->upload->data('file_name')
          );
        }
	  }
	  if($_FILES['logo_perusahaan']['error'] <> 4)
	  {
		    $nmfilelogo = strtolower(url_title($this->input->post('username'))).'_logo_'.date('YmdHis');

        $config5['upload_path']      = './uploads/company/';
        $config5['allowed_types']    = 'jpg|png|jpeg';
        $config5['max_size']         = 2048; // 2Mb
        $config5['file_name']       = $nmfilelogo;

        $this->load->library('upload', $config5);
		    $this->upload->initialize($config5);
        if(!$this->upload->do_upload('logo_perusahaan'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');
          $this->registration();
        }
        else
        {
          $file_logo = $this->upload->data();
          $data = array(
          'logo_perusahaan'     => $this->upload->data('file_name')
          );
        }
	  }
		//generate simple random code
		    $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    	$code = substr(str_shuffle($set), 0, 12);
		
        $data = array(
          'name'              => $this->input->post('name'),
          'address'           => $this->input->post('address'),
          'phone'             => $this->input->post('phone'),
          'email'             => $this->input->post('email'),
          'username'          => $this->input->post('username'),
          'password'          => $password,
          'usertype'          => $typeuser,
          'nama_perusahaan'   => $this->input->post('nama_perusahaan'),
          'direktur_perusahaan'   => $this->input->post('direktur_perusahaan'),
          'provinsi'          => substr($this->input->post('provinsi'),0,2),
          'kabupaten'         => substr($this->input->post('kabupaten'),0,4),
          'kecamatan'         => $this->input->post('kecamatan'),
          'desa'          	  => $this->input->post('desa'),
          'alamat'            => $this->input->post('alamat'),
          'phone_number'      => $this->input->post('phone_number'),
          'kode_pos'          => $this->input->post('kode_pos'),
          'logo_perusahaan'	  => $file_logo['file_name'],
          'file_sk'     	  => $file_sk['file_name'],
          'file_ktp'     	  => $file_ktp['file_name'],
          'code_activation'	  => $code,
          'created_by'        => $createdby,
          'ip_add_reg'        => $this->input->ip_address(),
          'photo'             => $photo['file_name'],
          'photo_thumb'       => $photo['file_name'],
        );

        $this->Auth_model->insert($data);

        $this->db->select_max('id_users');
        $result = $this->db->get('users')->row_array();
		    $iduser = $result['id_users'];
        $data_access_id = 5;

        for($i_data_access_id = 1; $i_data_access_id < $data_access_id; $i_data_access_id++)
        {
          $datas_data_access_id[$i_data_access_id] = array(
            'user_id'           => $result['id_users'],
            'data_access_id'    => $i_data_access_id,
          );

          $this->db->insert('users_data_access', $datas_data_access_id[$i_data_access_id]);
        }
		// send email
		
          //$hash = random_str(50);
          $email = $this->input->post('email');

          $gmail_account    = $this->Company_model->company_profile();

          $this->load->library('phpmailer_lib');

          // PHPMailer object
          $mail = $this->phpmailer_lib->load();

          // SMTP configuration
          $mail->isSMTP();
          $mail->Host     = 'ssl://smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = $gmail_account->company_gmail;
          $mail->Password = $gmail_account->company_gmail_pass;
          $mail->SMTPSecure = 'ssl';
          $mail->Port     = 465;

          $mail->setFrom($gmail_account->company_gmail, $gmail_account->company_name);
          $mail->addReplyTo($gmail_account->company_gmail);

          // Add a recipient
          $mail->addAddress($email);

          // Email subject
          $mail->Subject = 'Registrasi User SimetHRIS';

          // Set email format to HTML
          $mail->isHTML(true);

          // Email body content
          $mailContent = "
            <h1>Hello, ".$email."</h1>
            <p>Beberapa saat yang lalu, kami menerima permintaan Anda untuk mendaftar di simeTHRIS, dengan detail pendaftaran:
            </p>
            <p>Username : ".$this->input->post('username')."</p>
			      <p>Password : ".$this->input->post('password')."</p>
            <p>Untuk Pengaktifan User Account, silahkan Klik Link Berikut <h4><a href='".base_url()."auth/aktivasi/".$iduser."/".$code."'>Activate My Account</a></h4></p>
            <p>Atau tunggu sampai data yang anda kirimkan diverifikasi oleh Administrator.</p>
            <p>Terima Kasih.</p>
            <p>simeTHRIS</p>
          ";

          $mail->Body = $mailContent;

          // Send email
          if($mail->send())
          {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Pendaftaran Berhasil. Silahkan Periksa email anda.</div>');
          }
          else
          {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

            $this->session->set_flashdata('message', '<div class="alert alert-danger">Sorry, detail pendaftaran gagal dikirimkan ke email anda.</div>');
          }
		
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('deklarasi');
      
    }
  }
  
	public function aktivasi(){
		$id =  $this->uri->segment(3);
		$code = $this->uri->segment(4);

		//fetch user details
		//$user = json_decode($this->Auth_model->get_by_id($id), true);
		$user = $this->Auth_model->get_by_id($id);
		//if code matches
		if($user->code_activation == $code){
			//update user active status
			//$data['is_active'] = 1;
			//$query = $this->Auth_model->update($id, $data);
			//$data = array('is_active' => 1);
			//$this->Auth_model->update($id,$data);
			$query = $this->Auth_model->update($id, array('is_active'=>1));
			
			if($query){
				$this->session->set_flashdata('message', 'User activated successfully');
			}
			else{
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
			}
		}
		else{
			$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
		}

		redirect('deklarasiaktif');

	}
}