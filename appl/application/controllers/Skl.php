<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Skl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->data['module'] = 'SKL ';
        $this->data['company_data']                   = $this->Company_model->company_profile();
        $this->data['layout_template']                = $this->Template_model->layout();
        $this->data['skins_template']                 = $this->Template_model->skins();
        $this->load->model('TransaksiModel');
        $this->load->model('r_verifikasi');
        $this->load->model('ChatModel');
        $this->load->model('SKL_model');
        $this->load->model('Riph_model');
        $this->load->model('UserModel');
    }

    public function index()
    {
        is_login();
        is_read();

        $this->data['btn_add']    = 'Add New SKL';
        $this->data['add_action'] = base_url('skl/add');
        $this->data['edit_action'] = base_url('skl/edit');
        $this->data['delete_action'] = base_url('skl/delete');
        $this->data['page_title'] = 'Daftar ' . $this->data['module'];
        if(is_superadmin()){
            $this->data['skl_data'] = $this->SKL_model->get_all();
        } else {
            $this->data['skl_data'] = $this->SKL_model->get_all_user($this->session->id_users);
        }    
        $this->load->view('back/skl/index', $this->data);
    }

    public function add()
    {
        is_login();
        is_create();

        $this->data['page_title']   = 'Tambah ' . $this->data['module'];
        $this->data['action']       = 'skl/store';
        $this->data['btn_submit']   = 'Save';
        $this->data['btn_reset']    = 'Reset';
        $this->data['riph_data']    = $this->Riph_model->get_all_riph_by_user($this->session->id_users);
        // form
        $this->data['no_skl'] = [
            'name'          => 'no_skl',
            'id'            => 'no_skl',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'value'         => $this->form_validation->set_value('no_skl'),
            'placeholder'   => 'Nomor Surat SKL'
        ];
        $this->data['tgl_terbit'] = [
            'type'          => 'date',
            'name'          => 'tgl_terbit',
            'id'            => 'tgl_terbit',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'value'         => $this->form_validation->set_value('tgl_terbit'),
            'placeholder'   => 'Tgl terbit'
        ];
        $this->data['file_skl'] = [
            'type'          => 'file',
            'name'          => 'file_skl',
            'id'            => 'file_skl',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'value'         => $this->form_validation->set_value('file_skl'),
            'placeholder'   => 'File SKL'
        ];
        $this->load->view('back/skl/add', $this->data);
    }



    public function edit($id_skl)
    {
        is_login();
        is_update();

        $this->load->model('SKL_model');
        $this->load->model('r_verifikasi');
        $this->load->model('ChatModel');
        
        $this->data['page_title']   = 'Update ' . $this->data['module'];
        $this->data['action']       = 'skl/update';
        $this->data['btn_submit']   = 'Save';
        $this->data['btn_reset']    = 'Reset';
        $this->data['riph_data']    = $this->Riph_model->get_all_riph_by_user($this->session->id_users);
        $this->data['skl_data']     = $this->SKL_model->get_by_id($id_skl);
        $skl_data = $this->data['skl_data'];
        // form
        $this->data['no_skl'] = [
            'name'          => 'no_skl',
            'id'            => 'no_skl',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            // 'value'         => $this->form_validation->set_value('no_skl'),
            'placeholder'   => 'Nomor Surat SKL'
        ];
        $this->data['tgl_terbit'] = [
            'type'          => 'date',
            'name'          => 'tgl_terbit',
            'id'            => 'tgl_terbit',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            // 'value'         => $this->form_validation->set_value('tgl_terbit'),
            'placeholder'   => 'Tgl terbit'
        ];
        $this->data['file_skl'] = [
            'type'          => 'file',
            'name'          => 'file_skl',
            'id'            => 'file_skl',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'value'         => $skl_data->file,
            'placeholder'   => 'File SKL'
        ];
        $this->load->view('back/skl/edit', $this->data);
    }

    public function store()
    {
        $this->form_validation->set_rules('no_skl', 'Nomor Surat SKL', 'trim|required');
	    $this->form_validation->set_rules('tgl_terbit', 'Tgl terbit', 'required');
        if (empty($_FILES['file_skl']['name'])){$this->form_validation->set_rules('file_skl', 'File SKL', 'required');}
	

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if($this->form_validation->run() === FALSE)
        {
            $this->add();
        }
        else
        {
            //handle fileskl
            if($_FILES['file_skl']['error'] <> 4)
            {
                $nmfile = strtolower(url_title($this->session->userdata('id_users'))).'_'.$this->input->post('no_skl').'_SKL_'.date('YmdHis');

                $config['upload_path']      = './uploads/skl/';
                $config['allowed_types']    = 'jpg|jpeg|png|pdf';
                $config['max_size']         = 2048; // 2Mb
                $config['file_name']        = $nmfile;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('file_skl'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

                }
                else
                {
                    $fileskl                    = $this->upload->data();
                    // $thumbnail                  = $config['file_name'];

                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './uploads/skl/'.$fileskl['file_name'].'';
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 250;
                    $config['height']           = 250;

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    
                    $id_mst_riph = $this->input->post('nomor_riph');
                    $data_riph   = $this->Riph_model->getNomorRiph($this->session->id_users, $id_mst_riph);
                    $nama_pt     = $this->UserModel->GetCompanyName($this->session->id_users);
                    $data = array(
                        'id_mst_riph'       => $id_mst_riph,
                        'nomor_riph'	    => $data_riph->nomor_riph,
                        'no_skl'	        => $this->input->post('no_skl'),
                        'tgl_terbit' 	    => date('Y-m-d H:i:s',strtotime($this->input->post('tgl_terbit'))),
                        'file'              => $this->upload->data('file_name'),
                        'user_id'           => $this->session->id_users,
                        'nama_perusahaan'   => $nama_pt
                    );
                    //var_dump($data);
                    $this->SKL_model->insert($data);

                    // $this->db->select_max('id_skl');
                    // $result = $this->db->get('table_skl')->row_array();

                    $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
                    redirect('skl');
                    
                }
            }
            //-------------

        }
    }

    public function update($id_skl)
    {
        $this->form_validation->set_rules('no_skl', 'Nomor Surat SKL', 'trim|required');
	    $this->form_validation->set_rules('tgl_terbit', 'Tgl terbit', 'required');
        // if (empty($_FILES['file_skl']['name'])){$this->form_validation->set_rules('file_skl', 'File SKL', 'required');}
	

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if($this->form_validation->run() === FALSE)
        {
            $this->edit($id_skl);
        }
        else
        {
            //handle fileskl
            if (!empty($_FILES['file_skl']['name'])){
                if($_FILES['file_skl']['error'] <> 4)
                {
                    $nmfile = strtolower(url_title($this->session->userdata('id_users'))).'_'.$this->input->post('no_skl').'_SKL_'.date('YmdHis');

                    $config['upload_path']      = './uploads/skl/';
                    $config['allowed_types']    = 'jpg|jpeg|png|pdf';
                    $config['max_size']         = 2048; // 2Mb
                    $config['file_name']        = $nmfile;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('file_skl'))
                    {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('message', '<div class="alert alert-danger">'.$error['error'].'</div>');

                    }
                    else
                    {
                        $fileskl                    = $this->upload->data();
                        // $thumbnail                  = $config['file_name'];

                        $config['image_library']    = 'gd2';
                        $config['source_image']     = './uploads/skl/'.$fileskl['file_name'].'';
                        $config['create_thumb']     = TRUE;
                        $config['maintain_ratio']   = TRUE;
                        $config['width']            = 250;
                        $config['height']           = 250;

                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        
                        $id_mst_riph = $this->input->post('nomor_riph');
                        $data_riph   = $this->Riph_model->getNomorRiph($this->session->id_users, $id_mst_riph);
                        $nama_pt     = $this->UserModel->GetCompanyName($this->session->id_users);
                        $data = array(
                            'id_mst_riph'       => $id_mst_riph,
                            'nomor_riph'	    => $data_riph->nomor_riph,
                            'no_skl'	        => $this->input->post('no_skl'),
                            'tgl_terbit' 	    => date('Y-m-d H:i:s',strtotime($this->input->post('tgl_terbit'))),
                            'file'              => $this->upload->data('file_name'),
                            'user_id'           => $this->session->id_users,
                            'nama_perusahaan'   => $nama_pt
                        );
                        //var_dump($data);
                        $this->SKL_model->update($id_skl, $data);

                        // $this->db->select_max('id_skl');
                        // $result = $this->db->get('table_skl')->row_array();

                        $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
                        redirect('skl');
                        
                    }
                }
            } else {
                $id_mst_riph = $this->input->post('nomor_riph');
                $data_riph   = $this->Riph_model->getNomorRiph($this->session->id_users, $id_mst_riph);
                $nama_pt     = $this->UserModel->GetCompanyName($this->session->id_users);
                $data = array(
                    'id_mst_riph'       => $id_mst_riph,
                    'nomor_riph'	    => $data_riph->nomor_riph,
                    'no_skl'	        => $this->input->post('no_skl'),
                    'tgl_terbit' 	    => date('Y-m-d H:i:s',strtotime($this->input->post('tgl_terbit'))),
                    'user_id'           => $this->session->id_users,
                    'nama_perusahaan'   => $nama_pt
                );
                //var_dump($data);
                $this->SKL_model->update($id_skl, $data);

                // $this->db->select_max('id_skl');
                // $result = $this->db->get('table_skl')->row_array();

                $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
                redirect('skl');    
            }
            //-------------

        }
    }


    function delete($id_skl)
    {
        is_login();
        is_delete();

        //$id_skl = $this->uri->segment('3');
        $delete = $this->SKL_model->get_by_id($id_skl);

        if($delete)
        {
            $data = array(
                'is_delete'   => '1',
                'deleted_by'  => $this->session->username,
                'deleted_at'  => date('Y-m-d H:i:a'),
            );

            $this->SKL_model->soft_delete($id_skl, $data);

            $this->write_log();

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data deleted successfully</div>');
            redirect('skl');
        }
        else
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">No data found</div>');
            redirect('skl');
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
}
