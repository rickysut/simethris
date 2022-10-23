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
        $this->data['edit_action'] = base_url('skl/add');
        $this->data['page_title'] = 'Daftar ' . $this->data['module'];
        $this->data['skl_data'] = $this->SKL_model->get_all();
        $this->load->view('back/skl/index', $this->data);
    }

    public function add()
    {
        is_login();
        is_read();

        $this->data['page_title']   = 'Tambah ' . $this->data['module'];
        $this->data['action']       = 'skl/update';
        $this->data['btn_submit']   = 'Save';
        $this->data['btn_reset']    = 'Reset';
        $this->data['riph_data']    = $this->Riph_model->get_all_riph_by_user($this->session->id_users);
        // form
        $this->data['id_skl'] = [
            'name'          => 'id_skl',
            'id'            => 'id_skl',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'value'         => $this->form_validation->set_value('id_skl'),
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



    public function edit()
    {
        is_login();
        is_read();

        $this->load->model('SKL_model');
        $this->load->model('r_verifikasi');
        $this->load->model('ChatModel');
        $this->data['btn_add']    = 'Add New SKL';
        $this->data['add_action'] = base_url('skl/add');
        $this->data['edit_action'] = base_url('skl/edit');
        $this->data['page_title'] = 'Daftar ' . $this->data['module'];
        $this->load->view('back/skl/add', $this->data);
    }

    public function update()
    {
        $this->form_validation->set_rules('id_skl', 'Nomor Surat SKL', 'trim|required');
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
            $id_mst_riph = $this->input->post('nomor_riph');
            $nomor_riph  = $this->Riph_model->getNomorRiph($this->session->id_users, $id_mst_riph);
            $nama_pt     = $this->UserModel->GetCompanyName($this->session->id_users);
            $data = array(
                'id_mst_riph'       => $id_mst_riph,
                'nomor_riph'	    => $nomor_riph->nomor_riph,
                'qrcode'	        => $this->input->post('id_skl'),
                'tgl_terbit' 	    => date('Y-m-d H:i:s',strtotime($this->input->post('tgl_terbit'))),
                // 'file'              => $this->input->post('file_skl'),
                'user_id'           => $this->session->id_users,
                'nama_perusahaan'   => $nama_pt
            );
            var_dump($data);
            $this->SKL_model->insert($data);

            // $this->db->select_max('id_riph');
            // $result = $this->db->get('riph')->row_array();

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved succesfully</div>');
            redirect('skl');
        }
    }
}
