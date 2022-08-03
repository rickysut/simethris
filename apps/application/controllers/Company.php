<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Company';

    $this->data['company_data']    					= $this->Company_model->company_profile();
		$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();

    $this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
	
	$this->load->model('r_verifikasi');
  }

  function update($id)
  {
    is_login();

    if(!is_superadmin())
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">You can\'t access last page</div>');
      redirect('dashboard');
    }
	
	$this->data['get_jml_verifikasi']				= $this->r_verifikasi->get_jml_r_verifikasi();
    $this->data['company']     = $this->Company_model->get_by_id($id);

    if($this->data['company'])
    {
      $this->data['page_title'] = 'Update Data '.$this->data['module'];
      $this->data['action']     = 'company/update_action';

      $this->data['id_company'] = [
        'name'          => 'id_company',
        'type'          => 'hidden',
      ];
      $this->data['company_name'] = [
        'name'          => 'company_name',
        'id'            => 'company_name',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['company_desc'] = [
        'name'          => 'company_desc',
        'id'            => 'company_desc',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'rows' => '5',
      ];
      $this->data['company_address'] = [
        'name'          => 'company_address',
        'id'            => 'company_address',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
        'rows' => '5',
      ];
      $this->data['company_maps'] = [
        'name'          => 'company_maps',
        'id'            => 'company_maps',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'rows' => '5',
      ];
      $this->data['company_phone'] = [
        'name'          => 'company_phone',
        'id'            => 'company_phone',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['company_phone2'] = [
        'name'          => 'company_phone2',
        'id'            => 'company_phone2',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
      ];
      $this->data['company_fax'] = [
        'name'          => 'company_fax',
        'id'            => 'company_fax',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['company_email'] = [
        'name'          => 'company_email',
        'id'            => 'company_email',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
      ];
      $this->data['company_gmail'] = [
        'name'          => 'company_gmail',
        'id'            => 'company_gmail',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
        'required'      => '',
      ];
      $this->data['new_company_gmail_pass'] = [
        'name'          => 'new_company_gmail_pass',
        'id'            => 'new_company_gmail_pass',
        'class'         => 'form-control',
        'autocomplete'  => 'off',
      ];

      $this->load->view('back/company/company_edit', $this->data);
    }
    else
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User not found</div>');
      redirect('company');
    }

  }

  function update_action()
  {
    $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
    $this->form_validation->set_rules('company_desc', 'Company Description', 'trim|required');
    $this->form_validation->set_rules('company_address', 'Company Address', 'trim|required');

    // $this->form_validation->set_message('required', '{field} wajib diisi');
    // $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if($this->form_validation->run() === FALSE)
    {
      $this->update($this->input->post('id_company'));
    }
    else
    {
      $password = $this->input->post('new_company_gmail_pass');

      if($_FILES['photo']['error'] <> 4)
      {
        $nmfile = strtolower(url_title($this->input->post('company_name'))).date('YmdHis');

        $config['upload_path']      = './assets/images/company/';
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = 2048; // 2Mb
        $config['file_name']        = $nmfile;

        $this->load->library('upload', $config);

        $delete = $this->Company_model->get_by_id($this->input->post('id_company'));

        $dir        = "./assets/images/company/".$delete->company_photo;
        $dir_thumb  = "./assets/images/company/".$delete->company_photo_thumb;

        if(is_file($dir))
        {
          unlink($dir);
          unlink($dir_thumb);
        }

        if(!$this->upload->do_upload('photo'))
        {
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

          $this->update($this->input->post('id_company'));
        }
        else
        {
          $photo = $this->upload->data();

          $config['image_library']    = 'gd2';
          $config['source_image']     = './assets/images/company/'.$photo['file_name'].'';
          $config['create_thumb']     = TRUE;
          $config['maintain_ratio']   = TRUE;
          $config['width']            = 50;
          $config['height']           = 50;

          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          if($this->input->post('new_company_gmail_pass') == NULL)
          {
            $data = array(
              'company_name'          => $this->input->post('company_name'),
              'company_desc'          => $this->input->post('company_desc'),
              'company_address'       => $this->input->post('company_address'),
              'company_maps'          => $this->input->post('company_maps', FALSE),
              'company_phone'         => $this->input->post('company_phone'),
              'company_phone2'        => $this->input->post('company_phone2'),
              'company_fax'           => $this->input->post('company_fax'),
              'company_email'         => $this->input->post('company_email'),
              'company_gmail'         => $this->input->post('company_gmail'),
              'modified_by'           => $this->session->username,
              'company_photo'         => $this->upload->data('file_name'),
              'company_photo_thumb'   => $nmfile.'_thumb'.$this->upload->data('file_ext'),
            );
          }
          else
          {
            $data = array(
              'company_name'          => $this->input->post('company_name'),
              'company_desc'          => $this->input->post('company_desc'),
              'company_address'       => $this->input->post('company_address'),
              'company_maps'          => $this->input->post('company_maps', FALSE),
              'company_phone'         => $this->input->post('company_phone'),
              'company_phone2'        => $this->input->post('company_phone2'),
              'company_fax'           => $this->input->post('company_fax'),
              'company_email'         => $this->input->post('company_email'),
              'company_gmail'         => $this->input->post('company_gmail'),
              'company_gmail_pass'    => $password,
              'modified_by'           => $this->session->username,
              'company_photo'         => $this->upload->data('file_name'),
              'company_photo_thumb'   => $nmfile.'_thumb'.$this->upload->data('file_ext'),
            );
          }

          $this->Company_model->update($this->input->post('id_company'),$data);

          write_log();

          $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
          redirect('company/update/1');
        }
      }
      else
      {
        if($this->input->post('new_company_gmail_pass') == NULL)
        {
          $data = array(
            'company_name'          => $this->input->post('company_name'),
            'company_desc'          => $this->input->post('company_desc'),
            'company_address'       => $this->input->post('company_address'),
            'company_maps'          => $this->input->post('company_maps', FALSE),
            'company_phone'         => $this->input->post('company_phone'),
            'company_phone2'        => $this->input->post('company_phone2'),
            'company_fax'           => $this->input->post('company_fax'),
            'company_email'         => $this->input->post('company_email'),
            'company_gmail'         => $this->input->post('company_gmail'),
            'modified_by'           => $this->session->company_name,
          );
        }
        else
        {
          $data = array(
            'company_name'          => $this->input->post('company_name'),
            'company_desc'          => $this->input->post('company_desc'),
            'company_address'       => $this->input->post('company_address'),
            'company_maps'          => $this->input->post('company_maps', FALSE),
            'company_phone'         => $this->input->post('company_phone'),
            'company_phone2'        => $this->input->post('company_phone2'),
            'company_fax'           => $this->input->post('company_fax'),
            'company_email'         => $this->input->post('company_email'),
            'company_gmail'         => $this->input->post('company_gmail'),
            'company_gmail_pass'    => $password,
            'modified_by'           => $this->session->username,
          );
        }

        $this->Company_model->update($this->input->post('id_company'),$data);

        write_log();

        $this->session->set_flashdata('message', '<div class="alert alert-success">Data update succesfully</div>');
        redirect('company/update/1');
      }
    }
  }

}
