<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Load composer's autoloader
require 'vendor/autoload.php';

class Map_all extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->data['module'] = 'Poktan';

    $this->data['company_data']    				= $this->Company_model->company_profile();
	$this->data['layout_template']    			= $this->Template_model->layout();
    $this->data['skins_template']     			= $this->Template_model->skins();

    $this->data['btn_submit'] = 'Save';
    $this->data['btn_reset']  = 'Reset';
    $this->data['btn_add']    = 'Add New Data';
	$this->load->model('m_wilayah');
	$this->load->model('poktan_model');
    $this->data['add_action'] = base_url('poktan/create');
  }
 
    function index(){
        $this->load->library('googlemaps');
            $config=array();
            $config['center']="37.4419, -122.1419";
            $config['zoom']=17;
            $config['map_height']="400px";
            $this->googlemaps->initialize($config);
            $marker=array();
            $marker['position']="37.4419, -122.1419";
            $this->googlemaps->add_marker($marker);
            $data['map']=$this->googlemaps->create_map();
        $this->load->view('back/maps/all_map',$data);
    }
}