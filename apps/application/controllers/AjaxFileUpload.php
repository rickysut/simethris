<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of AjaxFileUpload
 *
 * @author https://www.roytuts.com
 */
class AjaxFileUpload extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('file_upload_ajax', NULL);
    }

    function upload_file() {

        //upload file
        $config['upload_path'] = 'uploads/kml/';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '2024'; //1 MB

        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/kml/' . $_FILES['file']['name'])) {
                    echo 'File already exists : uploads/kml/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo 'File successfully uploaded : uploads/kml/' . $_FILES['file']['name'];
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
    }

}