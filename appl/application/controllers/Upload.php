<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Upload extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'UNGGAHAN';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	  $this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();

    $this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
    $this->data['btn_add']    = 'Add New Data';
	  $this->data['btn_back']    = 'Back To List';
	  $this->load->model('m_files');
	  $this->load->model('r_verifikasi');
	  $this->load->model('ChatModel');
    $this->data['add_action'] = base_url('upload/create');
	  $this->data['back_action'] = base_url('upload');
  }
  
  function index()
  {
    is_login();
    is_read();
    $this->data['page_title'] = $this->data['module'].' List';
    $this->data['get_by_username'] = $this->m_files->get_by_username($this->session->userdata('id_users'));
	  $this->data['get_jml_verifikasi']				= $this->r_verifikasi->get_jml_r_verifikasi();
    $this->load->view('back/upload/upload_list', $this->data);
  }
  
  function create()
  {
    is_login();
    is_create();

    $this->data['page_title'] = 'Unggah File Baru ';
    $this->data['action']     = 'upload/create_action';
	  $this->data['get_jml_verifikasi']				= $this->r_verifikasi->get_jml_r_verifikasi();
	
    $this->data['id_users'] = [
      'name'          => 'id_users',
      'id'            => 'id_users',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
	  'type'  => 'hidden',
    ];
    $this->data['file_judul'] = [
      'name'          => 'file_judul',
      'id'            => 'file_judul',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('file_judul'),
    ];
    $this->data['file_deskripsi'] = [
      'name'          => 'file_deskripsi',
      'id'            => 'file_deskripsi',
      'class'         => 'form-control',
      'autocomplete'  => 'off',
      'value'         => $this->form_validation->set_value('file_deskripsi'),
    ];
    $this->load->view('back/upload/upload_add', $this->data);

  }

  function create_action()
  {
	  $Cariektensi="";
	  $ektensi="";
    $this->form_validation->set_rules('file_judul', 'Nama / Judul File', 'trim|required');
    $this->form_validation->set_rules('file_deskripsi', 'Deskripsi File', 'trim|required');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->create();
    }
    else
    {
      $nmfile = strtolower(url_title($this->input->post('username'))).date('YmdHis');
      if($_FILES['file_data']['error'] <> 4)
      {
        $nmfile = strtolower(url_title($this->input->post('username'))).date('YmdHis');

        $config['upload_path']      = './uploads/user/';
        $config['allowed_types']    = 'jpg|jpeg|png|pdf|docx|xlsx|doc';
        $config['max_size']         = 2048; // 2Mb
        $config['file_name']        = $nmfile;
		    //$this->upload->initialize($config);
        $this->load->library('upload', $config);
		    $this->upload->initialize($config);

        if(!$this->upload->do_upload('file_data'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->create();
        }
        else
        {
          $file_data = $this->upload->data();
          $Cariektensi = explode(".", $file_data['file_name']);	
          $ektensi = $Cariektensi[1];
          if($ektensi == "pdf"){
            $filethumb = "pdf_thumb.png";
          }
          elseif($ektensi == "docx"){
            $filethumb = "docx_thumb.png";
          }
          elseif($ektensi == "doc"){
            $filethumb = "docx_thumb.png";
          }
          else
          {
            $thumbnail                  = $config['file_name'];

            $config['image_library']    = 'gd2';
            $config['source_image']     = './uploads/user/'.$file_data['file_name'].'';
            $config['create_thumb']     = TRUE;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 250;
            $config['height']           = 250;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();  
            $filethumb = $nmfile.'_thumb'.$this->upload->data('file_ext');
          }
          		  
          $data = array(
            'id_users'        	=> $this->session->userdata('id_users'),
			      'usertype'        	=> $this->session->userdata('usertype'),
            'file_oleh'			    => $this->session->userdata('name'),
            'file_judul'		    => $this->input->post('file_judul'),
            'file_deskripsi'    => $this->input->post('file_deskripsi'),
            'file_data'         => $this->upload->data('file_name'),
            'file_thumb'    	  => $filethumb,
          );

          $this->m_files->insert($data);

          $this->db->select_max('id_users');
          $result = $this->db->get('tbl_files')->row_array();

          $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
          redirect('upload');
        }
      }
      else
      {
        $Cariektensi = explode(".", $this->upload->data('file_name'));	
        $ektensi = $Cariektensi[1];
        if($ektensi=="pdf"){
          $filethumb = "pdf_thumb.png";
        }
        elseif($ektensi=="docx"){
          $filethumb = "docx_thumb.png";
        }
        elseif($ektensi=="doc"){
          $filethumb = "docx_thumb.png";
        }
        else
        {
          $filethumb = $nmfile.'_thumb'.$this->upload->data('file_ext');
        }
          $data = array(
            'id_users'        	=> $this->session->userdata('id_users'),
			      'usertype'        	=> $this->session->userdata('usertype'),
            'file_oleh'			=> $this->session->userdata('name'),
            'file_judul'		=> $this->input->post('file_judul'),
            'file_deskripsi'    => $this->input->post('file_deskripsi'),
            'file_data'         => $this->upload->data('file_name'),
			      'file_type'         => 'USER',
            'lampiran_thumb'    => $filethumb,
          );

        $this->m_files->insert($data);

        $this->db->select_max('id_users');
        $result = $this->db->get('tbl_files')->row_array();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
        redirect('upload');
      }
    }
  }

  function update($idf)
  {
    is_login();
    is_read();
    $this->data['page_title'] = $this->data['module'].' List';
    $this->data['user'] = $this->m_files->get_by_fileid($idf);
	
	if($this->data['user'])
    {
		$this->data['page_title'] = 'Update Data '.$this->data['module'];
		$this->data['action']     = 'upload/update_action';
		$this->data['id_users'] = [
		  'name'          => 'id_users',
		  'id'            => 'id_users',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'type'  => 'hidden',
		];
		$this->data['file_id'] = [
		  'name'          => 'file_id',
		  'id'            => 'file_id',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		  'type'  => 'hidden',
		];
		$this->data['file_judul'] = [
		  'name'          => 'file_judul',
		  'id'            => 'file_judul',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		$this->data['file_deskripsi'] = [
		  'name'          => 'file_deskripsi',
		  'id'            => 'file_deskripsi',
		  'class'         => 'form-control',
		  'autocomplete'  => 'off',
		];
		  $this->load->view('back/upload/upload_edit', $this->data);
    }
	else
	{
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('upload');
    }
  }
  
  function update_action()
  {
    $this->form_validation->set_rules('file_judul', 'Nama / Judul File', 'trim|required');
    $this->form_validation->set_rules('file_deskripsi', 'Deskripsi File', 'trim|required');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('file_id'));
    }
    else
    {
      $nmfile = strtolower(url_title($this->input->post('username'))).date('YmdHis');
      if($_FILES['file_data']['error'] <> 4)
      {
        $nmfile = strtolower(url_title($this->input->post('username'))).date('YmdHis');

        $config['upload_path']      = './uploads/user/';
        $config['allowed_types']    = 'jpg|jpeg|png|pdf|docx|xlsx|doc';
        $config['max_size']         = 2048; // 2Mb
        $config['file_name']        = $nmfile;
		    //$this->upload->initialize($config);
        $this->load->library('upload', $config);
		    $this->upload->initialize($config);
		
		    $delete = $this->m_files->get_by_id($this->input->post('id_users'));

        $dir        = "./uploads/user/".$delete->photo;
        $dir_thumb  = "./uploads/user/".$delete->photo_thumb;

        if(is_file($dir))
        {
          unlink($dir);
          unlink($dir_thumb);
        }
		
        if(!$this->upload->do_upload('file_data'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->create();
        }
        else
        {
          $file_data = $this->upload->data();
		  $Cariektensi = explode(".", $file_data['file_name']);	
		  $ektensi = $Cariektensi[1];
		  if($ektensi="pdf"){
			  $filethumb = "pdf_thumb.png";
		  }
		  elseif($ektensi="docx"){
			  $filethumb = "docx_thumb.png";
		  }
		  elseif($ektensi="doc"){
			  $filethumb = "docx_thumb.png";
		  }
		  else
		  {
			  $thumbnail                  = $config['file_name'];

			  $config['image_library']    = 'gd2';
			  $config['source_image']     = './uploads/user/'.$file_data['file_name'].'';
			  $config['create_thumb']     = TRUE;
			  $config['maintain_ratio']   = TRUE;
			  $config['width']            = 250;
			  $config['height']           = 250;

			  $this->load->library('image_lib', $config);
			  $this->image_lib->resize();  
			  $filethumb = $nmfile.'_thumb'.$this->upload->data('file_ext');
		  }
          $data = array(
            'id_users'        	=> $this->session->userdata('id_users'),
			      'usertype'        	=> $this->session->userdata('usertype'),
            'file_oleh'			=> $this->session->userdata('name'),
            'file_judul'		=> $this->input->post('file_judul'),
            'file_deskripsi'    => $this->input->post('file_deskripsi'),
            'file_data'         => $this->upload->data('file_name'),
            'file_type'         => 'USER',
            'file_thumb'    	=> $filethumb,
          );

          $this->m_files->update($this->input->post('file_id'),$data);

          $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
          redirect('upload');
        }
      }
      else
      {
        $Cariektensi = explode(".", $this->upload->data('file_name'));	
        $ektensi = $Cariektensi[1];
        if($ektensi="pdf"){
          $filethumb = "pdf_thumb.png";
        }
        elseif($ektensi="docx"){
          $filethumb = "docx_thumb.png";
        }
        elseif($ektensi="doc"){
          $filethumb = "docx_thumb.png";
        }
        else
        {
          $filethumb = $nmfile.'_thumb'.$this->upload->data('file_ext');
        }
          $data = array(
            'id_users'        	=> $this->session->userdata('id_users'),
			      'usertype'        	=> $this->session->userdata('usertype'),
            'file_oleh'			=> $this->session->userdata('name'),
            'file_judul'		=> $this->input->post('file_judul'),
            'file_deskripsi'    => $this->input->post('file_deskripsi'),
            'file_data'         => $this->upload->data('file_name'),
			      'file_type'         => 'USER',
            'lampiran_thumb'    => $filethumb,
          );

        $this->m_files->update($this->input->post('file_id'),$data);

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
        redirect('upload');
      }
    }
  }
  
  function delete($idf)
  {
    is_login();
    is_delete();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('upload');
    }

    $delete = $this->m_files->get_by_id($idf);

    if($delete)
    {
      $data = array(
        'is_delete'   => '1',
        'deleted_by'  => $this->session->username,
        'deleted_at'  => date('Y-m-d H:i:a'),
      );

      $this->m_files->soft_delete($idf, $data);


      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
      redirect('upload');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('upload');
    }
  }
  
  function delete_permanent($idf)
  {
    is_login();
    is_delete();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $delete = $this->m_files->get_by_id($idf);

    if($delete)
    {
      $dir        = "./uploads/user/".$delete->photo;
      $dir_thumb  = "./uploads/user/".$delete->photo_thumb;

      if(is_file($dir))
      {
        unlink($dir);
        unlink($dir_thumb);
      }

      $this->m_files->delete($idf);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted permanently</div>');
      redirect('upload/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('upload');
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

    $this->data['get_all_deleted'] = $this->m_files->get_all_deleted();

    $this->load->view('back/upload/upload_deleted_list', $this->data);
  }

  function restore($idf)
  {
    is_login();
    is_restore();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }

    $row = $this->m_files->get_by_id($idf);

    if($row)
    {
      $data = array(
        'is_delete'   => '0',
        'deleted_by'  => NULL,
        'deleted_at'  => NULL,
      );

      $this->m_files->update($idf, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success">Data restored successfully</div>');
      redirect('upload/deleted_list');
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
      redirect('upload');
    }
  }
}