<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Skl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->data['module'] = 'SKL ';
        $this->data['company_data']                    = $this->Company_model->company_profile();
        $this->data['layout_template']                = $this->Template_model->layout();
        $this->data['skins_template']                 = $this->Template_model->skins();
        $this->load->model('TransaksiModel');
        $this->load->model('r_verifikasi');
        $this->load->model('ChatModel');
        $this->load->model('SKL_model');
        $this->load->model('Riph_model');
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

        $this->data['page_title'] = 'Tambah ' . $this->data['module'];
        $this->data['riph_data'] = $this->Riph_model->get_all_riph();
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
}
