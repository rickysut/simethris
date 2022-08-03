<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		is_login();

		$this->data['company_data']    				= $this->Company_model->company_profile();
		$this->data['layout_template']    			= $this->Template_model->layout();
		$this->data['skins_template']     			= $this->Template_model->skins();
		$this->load->library('googlemaps');
		$this->load->model('Dashboard_model','',TRUE);
		$this->load->model('customers_model','customers');
		$this->load->helper('tgl_indo');
		$this->load->model('m_wilayah');
		$this->load->model('r_verifikasi');
		$this->load->model('Riph_model');
	}

	public function index()
	{
		$this->data['page_title'] = 'Dashboard';

		$this->data['get_total_menu']     			= $this->Menu_model->total_rows();
		$this->data['get_total_submenu']     		= $this->Submenu_model->total_rows();				
		$this->data['get_total_user']     			= $this->Auth_model->total_rows();
		$this->data['get_total_usertype']     		= $this->Usertype_model->total_rows();
		$this->data['get_all_combobox_provinsi']     = $this->m_wilayah->get_all_provinsi();
		
		if ($this->session->userdata('usertype')=='3'){
			$this->data['get_all_cpcl']  				= $this->Dashboard_model->get_all_cpcl($this->session->userdata('id_users'));
			$this->data['get_all_cpclc']  				= $this->Dashboard_model->get_all_cpclc($this->session->userdata('id_users'));
			$this->data['jumlah_produksi']     			= $this->Dashboard_model->get_all_jumlah_produksi($this->session->userdata('id_users'));
			$this->data['get_all_jumlah_realisasi']    	= $this->Dashboard_model->get_all_jumlah_realisasi($this->session->userdata('id_users'));
			$this->data['get_target_tanam_user']     	= $this->Dashboard_model->get_target_tanam_user($this->session->userdata('id_users'));
			$this->data['get_target_produksi_user']     = $this->Dashboard_model->get_target_produksi_user($this->session->userdata('id_users'));
			$this->data['get_jml_produksi']  			= $this->Dashboard_model->get_jml_produksi_user($this->session->userdata('id_users'));
			$this->data['get_jml_tanam']  				= $this->Dashboard_model->get_jml_realisasi_user($this->session->userdata('id_users'));
			$this->data['get_jml_riph']					= $this->Riph_model->get_jumlah_riph_byno($this->session->userdata('nomor_riph'));
			$this->data['chart1'] = [
			  'name'          => 'chart1',
			  'id'            => 'chart1',
			  'class'         => 'form-control',
			  'autocomplete'  => 'off',
			];
			$this->data['chart2'] = [
			  'name'          => 'chart2',
			  'id'            => 'chart2',
			  'class'         => 'form-control',
			  'autocomplete'  => 'off',
			  'type'  => 'hidden',
			];
			$this->data['chart3'] = [
			  'name'          => 'chart3',
			  'id'            => 'chart3',
			  'class'         => 'form-control',
			  'autocomplete'  => 'off',
			  'type'  => 'hidden',
			];
			$this->data['polygonKu'] = $this->Dashboard_model->get_all_polygon_user($this->session->userdata('id_users'));
			$peta = $this->Dashboard_model->get_all_marker_realisasi($this->session->userdata('id_users'));
			$this->load->library('googlemaps');
			$config['center'] = "-2.2459632,116.2409634";
			$config['zoom'] = "auto";
			$config['map_type'] = "HYBRID";
			$config['onload'] = "google.maps.event.trigger(marker, 'click');";
			$this->googlemaps->initialize($config);
			$coords = $this->Dashboard_model->get_all_marker_realisasi($this->session->userdata('id_users'));
			foreach ($coords as $coordinate) {
				$marker = array();
				$marker['position'] = $coordinate->atitude.','.$coordinate->latitude;
				$marker['title'] = 'ID CPCL : '.$coordinate->id_cpcl.' Petani : '.$coordinate->nama_pelaksana.' Alamat : '.$coordinate->address;
				$marker['infowindow_content'] = $coordinate->nama_pelaksana.' Alamat : '.$coordinate->address;
				$this->googlemaps->add_marker($marker);
			}
			$this->data['map'] = $this->googlemaps->create_map();
			//$polygonku  = $this->Dashboard_model->get_all_polygon_user($this->session->userdata('id_users'));
			$this->load->view('back/dashboard/body', $this->data);
		}
		else{
			$this->data['get_all_cpcl_admin']  				= $this->Dashboard_model->get_all_cpcl_adminc();
			$this->data['get_jml_cpcl_verifikasi']  		= $this->Dashboard_model->get_jml_cpcl_verifikasi_admin();
			$this->data['get_jml_cpcl_blverifikasi']  		= $this->Dashboard_model->get_jml_cpcl_blverifikasi_admin();
			$this->data['get_jml_realisasi_verifikasi']  	= $this->Dashboard_model->get_jml_realisasi_verifikasi_admin();
			$this->data['get_jml_realisasi_blverifikasi']  	= $this->Dashboard_model->get_jml_realisasi_blverifikasi_admin();
			$this->data['get_jml_produksi_verifikasi']  	= $this->Dashboard_model->get_jml_produksi_verifikasi_admin();
			$this->data['get_jml_produksi_blverifikasi']  	= $this->Dashboard_model->get_jml_produksi_blverifikasi_admin();
			$this->data['get_jml_produksi']  				= $this->Dashboard_model->get_jml_produksi_admin();
			$this->data['get_jml_tanam']  					= $this->Dashboard_model->get_jml_realisasi_admin();
			$this->data['get_jml_real_tanam']  				= $this->Dashboard_model->get_all_realisasi_tanam_admin();
			$this->data['get_jml_beban_tanam'] 				= $this->Dashboard_model->get_all_beban_realisasi_tanam_admin();
			$this->data['get_jml_all_produksi'] 			= $this->Dashboard_model->get_all_jml_produksi_admin();
			$this->data['get_jml_beban_produksi']			= $this->Dashboard_model->get_all_beban_produksi_admin();
			$this->data['get_jml_import']					= $this->Dashboard_model->get_volume_import();
			$this->data['get_jml_verifikasi']				= $this->r_verifikasi->get_jml_r_verifikasi();
			$this->data['get_jml_riph']						= $this->Riph_model->get_all_jumlah();
			//$this->data['get_data_perusahaan']				= $this->Dashboard_model->get_data_perusahaan();
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
			$this->data['polygonKu'] = $this->Dashboard_model->get_all_polygon_admin();
			$peta = $this->Dashboard_model->get_all_marker_admin();		
			$this->load->library('googlemaps');
			$config['center'] = "-2.2459632,116.2409634";
			$config['zoom'] = "auto";
			$config['map_type'] = "HYBRID";
			$this->googlemaps->initialize($config);
			$coords = $this->Dashboard_model->get_all_marker_admin();
			foreach ($coords as $coordinate) {
				$marker = array();
				$marker['position'] = $coordinate->atitude.','.$coordinate->latitude;
				$marker['title'] = 'ID CPCL : '.$coordinate->id_cpcl.' Petani : '.$coordinate->nama_pelaksana.' Alamat : '.$coordinate->address;
				$marker['infowindow_content'] = $coordinate->nama_pelaksana.' Alamat : '.$coordinate->address;
				$this->googlemaps->add_marker($marker);
			}
			$this->data['map'] = $this->googlemaps->create_map();
			$this->data['get_all_polygon']  = $this->Dashboard_model->get_all_polygon_admin();
			$this->load->view('back/dashboard/bodyadmin', $this->data);
		}
	}
	
	public function ajax_list()
	{
		$list = $this->customers->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $customers) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $customers->nama_perusahaan;
			$row[] = $customers->nama_prov;
			$row[] = $customers->nama_kab;
			$row[] = $customers->nama_kec;
			$row[] = $customers->nama_des;
			$row[] = $customers->nama_kontak;
			$row[] = $customers->hp_kontak;
			$row[] = $customers->volume;
			$row[] = $customers->kewajiban_tanam;
			$row[] = intval($customers->luas_tanam);
			$sel1 = intval($customers->luas_tanam)-intval($customers->kewajiban_tanam);
			$row[] = $sel1;
			$row[] = $customers->kewajiban_produksi;
			$row[] = intval($customers->jmlproduksi);
			$sel2 = intval($customers->jmlproduksi)-intval($customers->kewajiban_produksi);
			$row[] = $sel2;
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->customers->count_all(),
						"recordsFiltered" => $this->customers->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
}
