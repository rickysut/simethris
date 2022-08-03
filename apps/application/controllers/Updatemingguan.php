<?php defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
class Updatemingguan extends CI_Controller {
    function  __construct() {
        parent::__construct();
		$this->data['module'] = 'Update Mingguan';
		$this->data['company_data']    				= $this->Company_model->company_profile();
		$this->data['layout_template']    			= $this->Template_model->layout();
		$this->data['skins_template']     			= $this->Template_model->skins();
		$this->load->helper('tgl_indo');
		$this->load->model('m_wilayah');
        $this->load->model('M_files');
		$this->data['btn_back2']    = 'Back To PKS';
		$this->data['back_action2'] = base_url('cpcl');
    }    
	
    function index($id,$idr){
		is_login();
		is_read();
		$this->data['page_title'] = $this->data['module'].' List';
        $data = array();
        if($this->input->post('submitForm') && !empty($_FILES['upload_Files']['name'])){
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
				$config['file_name']= strtolower($id.'_realisasi_'.$idr.'_'.date('YmdHis'));
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('upload_File')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_data'] = $fileData['file_name'];
					$uploadData[$i]['id_users'] = $id;
					$uploadData[$i]['usertype'] = $this->session->userdata('usertype');
					$uploadData[$i]['file_judul'] = 'Update Mingguan';
					$uploadData[$i]['file_deskripsi'] = 'Update Mingguan '.date("Y-m-d H:i:s");
                    $uploadData[$i]['file_tanggal'] = date("Y-m-d H:i:s");
					$uploadData[$i]['file_oleh'] = $this->session->userdata('username');
					$uploadData[$i]['file_download'] = '0';
					$uploadData[$i]['file_type'] = 'REALISASI';
					$uploadData[$i]['file_thumb'] = strtolower($id.'_realisasi_'.$idr.'_'.date('YmdHis').$fileData['file_name']);
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
        $this->data['gallery'] = $this->M_files->getRows($id, $idr);
        //Pass the files data to view
        $this->load->view('back/files_upload/index', $this->data);
    }
}