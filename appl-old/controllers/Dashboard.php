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
		$this->load->model('Dashboard_model','',TRUE);
		$this->load->model('customers_model','customers');
		$this->load->helper('tgl_indo');
		$this->load->model('m_wilayah');
		$this->load->model('r_verifikasi');
		$this->load->model('Riph_model');
		$this->load->model('Cpcl_model');
		$this->load->model('ChatModel');
		$this->load->model('Pengumuman_model');
	}

	public function index()
	{
		$this->data['page_title'] = 'Dashboard';
		$this->data['get_all_combobox_provinsi']     = $this->m_wilayah->get_all_provinsi();
		
		$this->data['get_total_menu']     			= $this->Menu_model->total_rows();
		$this->data['get_total_submenu']     		= $this->Submenu_model->total_rows();				
		$this->data['get_total_user']     			= $this->Auth_model->total_rows();
		$this->data['get_total_usertype']     		= $this->Usertype_model->total_rows();
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
		if ($this->session->userdata('usertype')=='3'){
			$mingguini = date("oW", strtotime(date('d-m-Y')));
			$minggulalu = $mingguini - 1;
			$minggulalu2 = $minggulalu - 1;
			$minggulalu3 = $minggulalu2 - 1;
			$this->data['get_all_cpcl']  				= $this->Dashboard_model->get_all_cpcl($this->session->userdata('id_users'));
			//$this->data['get_all_cpclc']  				= $this->Dashboard_model->get_all_cpclc($this->session->userdata('id_users'));
			$this->data['get_all_cpclc']  				= $this->Dashboard_model->get_all_cpclc2($this->session->userdata('id_users'));
			$this->data['jumlah_produksi']     			= $this->Dashboard_model->get_all_jumlah_produksi($this->session->userdata('id_users'));
			$this->data['get_all_jumlah_realisasi']    	= $this->Dashboard_model->get_all_jumlah_realisasi($this->session->userdata('id_users'));
			$this->data['get_jml_beban_tanam']     		= $this->Dashboard_model->get_target_tanam_user($this->session->userdata('id_users'));
			$this->data['get_jml_beban_produksi']       = $this->Dashboard_model->get_target_produksi_user($this->session->userdata('id_users'));
			$this->data['get_jml_produksi']  			= $this->Dashboard_model->get_jml_produksi_user($this->session->userdata('id_users'));
			$this->data['get_jml_tanam']  				= $this->Dashboard_model->get_jml_realisasi_user($this->session->userdata('id_users'));
			$this->data['polygonKu'] 					= $this->Dashboard_model->get_all_polygon_user($this->session->userdata('id_users'));
			$this->data['myMarker'] 					= $this->Dashboard_model->get_all_marker_realisasi($this->session->userdata('id_users'));
			$this->data['get_all_marker_cpcl'] 			= $this->Cpcl_model->get_all_marker_cpcl($this->session->userdata('id_users'));
			$this->data['get_jml_import']					= $this->Dashboard_model->get_volume_import_user($this->session->userdata('id_users'));
			$this->data['get_chart_beban']					= $this->Dashboard_model->get_beban_users($this->session->userdata('id_users'));
			$this->data['get_chart_beban_w1']				= $this->Dashboard_model->get_beban_users($this->session->userdata('id_users'));
			$this->data['get_chart_beban_w2']				= $this->Dashboard_model->get_beban_users($this->session->userdata('id_users'));
			$this->data['get_chart_beban_w3']				= $this->Dashboard_model->get_beban_users($this->session->userdata('id_users'));
			$this->data['get_chart_jmlrealisasi']			= $this->Dashboard_model->get_realisasi_users($mingguini, $this->session->userdata('id_users'));
			$this->data['get_chart_jmlrealisasi_w1']		= $this->Dashboard_model->get_realisasi_users($minggulalu, $this->session->userdata('id_users'));
			$this->data['get_chart_jmlrealisasi_w2']		= $this->Dashboard_model->get_realisasi_users($minggulalu2, $this->session->userdata('id_users'));
			$this->data['get_chart_jmlrealisasi_w3']		= $this->Dashboard_model->get_realisasi_users($minggulalu3, $this->session->userdata('id_users'));
			$this->data['get_chart_realisasi']				= $this->Dashboard_model->get_chart_realisasi_users($mingguini, $this->session->userdata('id_users'));
			$this->data['get_chart_realisasi_w1']			= $this->Dashboard_model->get_chart_realisasi_users($minggulalu, $this->session->userdata('id_users'));
			$this->data['get_chart_realisasi_w2']			= $this->Dashboard_model->get_chart_realisasi_users($minggulalu2, $this->session->userdata('id_users'));
			$this->data['get_chart_realisasi_w3']			= $this->Dashboard_model->get_chart_realisasi_users($minggulalu3, $this->session->userdata('id_users'));
			$this->data['get_chart_produksi']				= $this->Dashboard_model->get_chart_produksi_users($mingguini, $this->session->userdata('id_users'));
			$this->data['get_chart_produksi_w1']			= $this->Dashboard_model->get_chart_produksi_users($minggulalu, $this->session->userdata('id_users'));
			$this->data['get_chart_produksi_w2']			= $this->Dashboard_model->get_chart_produksi_users($minggulalu2, $this->session->userdata('id_users'));
			$this->data['get_chart_produksi_w3']			= $this->Dashboard_model->get_chart_produksi_users($minggulalu3, $this->session->userdata('id_users'));
			$this->data['get_chart_jmlproduksi']			= $this->Dashboard_model->get_produksi_users($mingguini, $this->session->userdata('id_users'));
			$this->data['get_chart_jmlproduksi_w1']			= $this->Dashboard_model->get_produksi_users($minggulalu, $this->session->userdata('id_users'));
			$this->data['get_chart_jmlproduksi_w2']			= $this->Dashboard_model->get_produksi_users($minggulalu2, $this->session->userdata('id_users'));
			$this->data['get_chart_jmlproduksi_w3']			= $this->Dashboard_model->get_produksi_users($minggulalu3, $this->session->userdata('id_users'));
			$this->data['get_all_pengumuman'] = $this->Pengumuman_model->get_all_active();
			$this->load->view('back/dashboard/bodyusers', $this->data);
		}else{
			$mingguini = date("oW", strtotime(date('d-m-Y')));
			$minggulalu = $mingguini - 1;
			$minggulalu2 = $minggulalu - 1;
			$minggulalu3 = $minggulalu2 - 1;
			$this->data['get_all_table_steps']  			= $this->Dashboard_model->get_all_cpcl_riph_dash();
			$this->data['get_all_cpcl_admin']  				= $this->Dashboard_model->get_all_cpcl_adminc2();
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
			$this->data['get_chart_beban']					= $this->Dashboard_model->get_beban($mingguini);
			$this->data['get_chart_beban_w1']				= $this->Dashboard_model->get_beban($minggulalu);
			$this->data['get_chart_beban_w2']				= $this->Dashboard_model->get_beban($minggulalu2);
			$this->data['get_chart_beban_w3']				= $this->Dashboard_model->get_beban($minggulalu3);
			$this->data['get_chart_jmlrealisasi']			= $this->Dashboard_model->get_realisasi($mingguini);
			$this->data['get_chart_jmlrealisasi_w1']		= $this->Dashboard_model->get_realisasi($minggulalu);
			$this->data['get_chart_jmlrealisasi_w2']		= $this->Dashboard_model->get_realisasi($minggulalu2);
			$this->data['get_chart_jmlrealisasi_w3']		= $this->Dashboard_model->get_realisasi($minggulalu3);
			$this->data['get_chart_realisasi']				= $this->Dashboard_model->get_chart_realisasi($mingguini);
			$this->data['get_chart_realisasi_w1']			= $this->Dashboard_model->get_chart_realisasi($minggulalu);
			$this->data['get_chart_realisasi_w2']			= $this->Dashboard_model->get_chart_realisasi($minggulalu2);
			$this->data['get_chart_realisasi_w3']			= $this->Dashboard_model->get_chart_realisasi($minggulalu3);
			$this->data['get_chart_produksi']				= $this->Dashboard_model->get_chart_produksi($mingguini);
			$this->data['get_chart_produksi_w1']			= $this->Dashboard_model->get_chart_produksi($minggulalu);
			$this->data['get_chart_produksi_w2']			= $this->Dashboard_model->get_chart_produksi($minggulalu2);
			$this->data['get_chart_produksi_w3']			= $this->Dashboard_model->get_chart_produksi($minggulalu3);
			$this->data['get_chart_jmlproduksi']			= $this->Dashboard_model->get_produksi($mingguini);
			$this->data['get_chart_jmlproduksi_w1']			= $this->Dashboard_model->get_produksi($minggulalu);
			$this->data['get_chart_jmlproduksi_w2']			= $this->Dashboard_model->get_produksi($minggulalu2);
			$this->data['get_chart_jmlproduksi_w3']			= $this->Dashboard_model->get_produksi($minggulalu3);
			$this->data['get_chart_verifikasi']				= $this->Dashboard_model->get_verif($mingguini);
			$this->data['get_chart_verifikasi_w1']			= $this->Dashboard_model->get_verif($minggulalu);
			$this->data['get_chart_verifikasi_w2']			= $this->Dashboard_model->get_verif($minggulalu2);
			$this->data['get_chart_verifikasi_w3']			= $this->Dashboard_model->get_verif($minggulalu3);
			$this->data['get_chart_unverifikasi']			= $this->Dashboard_model->get_unverif($mingguini);
			$this->data['get_chart_unverifikasi_w1']		= $this->Dashboard_model->get_unverif($minggulalu);
			$this->data['get_chart_unverifikasi_w2']		= $this->Dashboard_model->get_unverif($minggulalu2);
			$this->data['get_chart_unverifikasi_w3']		= $this->Dashboard_model->get_unverif($minggulalu3);
			$this->data['get_jml_import']					= $this->Dashboard_model->get_volume_import();
			$this->data['get_jml_verifikasi']				= $this->r_verifikasi->get_jml_r_verifikasi();
			$this->data['get_all_lo']  				= $this->Auth_model->get_all_users();
			$this->data['get_all_lo2']  				= $this->Auth_model->get_all_lo();
			$this->data['polygonKu'] 				= $this->Dashboard_model->get_all_polygon_admin();
			$this->data['myMarker'] 				= $this->Dashboard_model->get_all_marker_admin();
			$this->data['rekapdataPerusahaan'] 		= $this->Dashboard_model->rekap_data_perusahaan();
			$this->data['get_all_riph'] = $this->Riph_model->get_all_riph();
			$this->data['get_jml_riph']	= $this->Riph_model->get_all_jumlah();
			$this->data['get_jml_riph_admin']	= $this->Riph_model->get_all_riph_admin_dasboard();
			$this->data['get_jml_rencana_tanam'] = $this->Cpcl_model->get_total_luas_cpcl_admin();
			$this->data['get_jml_perusahaan'] = $this->Riph_model->get_jml_perusahaan();
			$this->load->view('back/dashboard/body', $this->data);
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
	
	public function ajax_grafik_bulanan($bulan)
	{
		$harike = date('d');
		$bulanke = $bulan+1;
		$tahunke = date('Y');
		$bulanSE = "$tahunke-$bulanke-$harike";
		$mingguini = date("oW", strtotime($bulanSE));
		$minggulalu = $mingguini - 1;
		$minggulalu2 = $minggulalu - 1;
		$minggulalu3 = $minggulalu2 - 1;
		
		$get_chart_beban			= $this->Dashboard_model->get_beban($mingguini);
		$get_chart_beban_w1			= $this->Dashboard_model->get_beban($minggulalu);
		$get_chart_beban_w2			= $this->Dashboard_model->get_beban($minggulalu2);
		$get_chart_beban_w3			= $this->Dashboard_model->get_beban($minggulalu3);
		$get_chart_jmlrealisasi		= $this->Dashboard_model->get_realisasi($mingguini);
		$get_chart_jmlrealisasi_w1	= $this->Dashboard_model->get_realisasi($minggulalu);
		$get_chart_jmlrealisasi_w2	= $this->Dashboard_model->get_realisasi($minggulalu2);
		$get_chart_jmlrealisasi_w3	= $this->Dashboard_model->get_realisasi($minggulalu3);
		$get_chart_realisasi		= $this->Dashboard_model->get_chart_realisasi($mingguini);
		$get_chart_realisasi_w1		= $this->Dashboard_model->get_chart_realisasi($minggulalu);
		$get_chart_realisasi_w2		= $this->Dashboard_model->get_chart_realisasi($minggulalu2);
		$get_chart_realisasi_w3		= $this->Dashboard_model->get_chart_realisasi($minggulalu3);
		$get_chart_produksi			= $this->Dashboard_model->get_chart_produksi($mingguini);
		$get_chart_produksi_w1		= $this->Dashboard_model->get_chart_produksi($minggulalu);
		$get_chart_produksi_w2		= $this->Dashboard_model->get_chart_produksi($minggulalu2);
		$get_chart_produksi_w3		= $this->Dashboard_model->get_chart_produksi($minggulalu3);
		$get_chart_jmlproduksi		= $this->Dashboard_model->get_produksi($mingguini);
		$get_chart_jmlproduksi_w1	= $this->Dashboard_model->get_produksi($minggulalu);
		$get_chart_jmlproduksi_w2	= $this->Dashboard_model->get_produksi($minggulalu2);
		$get_chart_jmlproduksi_w3	= $this->Dashboard_model->get_produksi($minggulalu3);
		$get_chart_verifikasi		= $this->Dashboard_model->get_verif($mingguini);
		$get_chart_verifikasi_w1	= $this->Dashboard_model->get_verif($minggulalu);
		$get_chart_verifikasi_w2	= $this->Dashboard_model->get_verif($minggulalu2);
		$get_chart_verifikasi_w3	= $this->Dashboard_model->get_verif($minggulalu3);
		$get_chart_unverifikasi		= $this->Dashboard_model->get_unverif($mingguini);
		$get_chart_unverifikasi_w1	= $this->Dashboard_model->get_unverif($minggulalu);
		$get_chart_unverifikasi_w2	= $this->Dashboard_model->get_unverif($minggulalu2);
		$get_chart_unverifikasi_w3	= $this->Dashboard_model->get_unverif($minggulalu3);
		
		$bebanTanamNasional =0;$bebanProduksiNasional=0;
		if(empty($get_jml_riph_admin->v_beban_tanam)){$data['bebanTanamNasional']=0;}else{$data['bebanTanamNasional']=$get_jml_riph_admin->v_beban_tanam;} 
		if(empty($get_jml_riph_admin->v_beban_produksi)){$data['bebanProduksiNasional']=0;}else{$data['bebanProduksiNasional']=$get_jml_riph_admin->v_beban_produksi;} 
		$chartRW = array();$jmlR = array();$jmlverif =0;$jmlunverif =0;$jmlchartPKS=0;$jmlverifw1 =0;$jmlunverifw1 =0;$jmlchartPKSw1=0;$jmlverifw2=0;$jmlverifw3=0;$jmlunverifw2=0;$jmlunverifw3=0;$jmlchartPKSw2=0;$jmlchartPKSw3=0;
		$jmlchartrealisasi=0;$jmlchartrealisasiw1=0;$jmlchartrealisasiw2=0;$jmlchartrealisasiw3=0;$jmlchartproduksi=0;$jmlchartproduksiw1=0;$jmlchartproduksiw2=0;$jmlchartproduksiw3=0;
		$jmlbrealisasi=0;$jmlbrealisasiw1=0;$jmlbrealisasiw2=0;$jmlbrealisasiw3=0;$jmlbproduksi=0;$jmlbproduksiw1=0;$jmlbproduksiw2=0;$jmlbproduksiw3=0;
		$hari[1] = "Sen";$hari[2] = "Sel";$hari[3] = "Rab";$hari[4] = "Kam";$hari[5] = "Jum";$hari[6] = "Sab";$hari[7] = "Min";
		foreach($get_chart_verifikasi as $getVerif){if (is_null($getVerif->jumlah_verif)){$data['jmlverif']=0;}else{$data['jmlverif']=$getVerif->jumlah_verif;}}
		foreach($get_chart_unverifikasi as $getunVerif){if (is_null($getunVerif->jumlah_unverif)){$data['jmlunverif']=0;$jmlunverif=0;}else{$data['jmlunverif']=$getunVerif->jumlah_unverif;$jmlunverif=$getunVerif->jumlah_unverif;}}
		foreach($get_chart_verifikasi_w1 as $getVerifw1){if (is_null($getVerifw1->jumlah_verif)){$data['jmlverifw1']=0;$jmlverifw1=0;}else{$data['jmlverifw1']=$getVerifw1->jumlah_verif;$jmlverifw1=$getVerifw1->jumlah_verif;}}
		foreach($get_chart_unverifikasi_w1 as $getunVerifw1){if (is_null($getunVerifw1->jumlah_unverif)){$data['jmlunverifw1']=0;$jmlunverifw1=0;}else{$data['jmlunverifw1']=$getunVerifw1->jumlah_unverif;$jmlunverifw1=$getunVerifw1->jumlah_unverif;}}
		foreach($get_chart_verifikasi_w2 as $getVerifw2){if (is_null($getVerifw2->jumlah_verif)){$data['jmlverifw2']=0;$jmlverifw2=0;}else{$data['jmlverifw2']=$getVerifw2->jumlah_verif;$jmlverifw2=$getVerifw2->jumlah_verif;}}
		foreach($get_chart_unverifikasi_w2 as $getunVerifw2){if (is_null($getunVerifw2->jumlah_unverif)){$data['jmlunverifw2']=0;$jmlunverifw2=0;}else{$data['jmlunverifw2']=$getunVerifw2->jumlah_unverif;$jmlunverifw2=$getunVerifw2->jumlah_unverif;}}
		foreach($get_chart_verifikasi_w3 as $getVerifw3){if (is_null($getVerifw3->jumlah_verif)){$data['jmlverifw3']=0;$jmlverifw3=0;}else{$data['jmlverifw3']=$getVerifw3->jumlah_verif;$jmlverifw3=$getVerifw3->jumlah_verif;}}
		foreach($get_chart_unverifikasi_w3 as $getunVerifw3){if (is_null($getunVerifw3->jumlah_unverif)){$data['jmlunverifw3']=0;$jmlunverifw3=0;}else{$data['jmlunverifw3']=$getunVerifw3->jumlah_unverif;$jmlunverifw3=$getunVerifw3->jumlah_unverif;}}
		$data['jmlchartPKSw3'] = $jmlverifw3 + $jmlunverifw3;$data['jmlchartPKSw2'] = $jmlverifw2 + $jmlunverifw2;$data['jmlchartPKSw1'] = $jmlverifw1 + $jmlunverifw1;$data['jmlchartPKS'] = $jmlverif + $jmlunverif;
		foreach($get_chart_beban as $getchartbeban){if (is_null($getchartbeban->bebantanam)){$data['jmlbrealisasi']=0;$jmlbrealisasi=0;}else{$data['jmlbrealisasi']=$getchartbeban->bebantanam;$jmlbrealisasi=$getchartbeban->bebantanam;}
		if (is_null($getchartbeban->bebanproduksi)){$data['jmlbproduksi']=0;$jmlbproduksi=0;}else{$data['jmlbproduksi']=$getchartbeban->bebanproduksi;$jmlbproduksi=$getchartbeban->bebanproduksi;}}
		foreach($get_chart_beban_w1 as $getchartbebanw1){if (is_null($getchartbebanw1->bebantanam)){$data['jmlbrealisasiw1']=0;$jmlbrealisasiw1=0;}else{$data['jmlbrealisasiw1']=$getchartbebanw1->bebantanam;$jmlbrealisasiw1=$getchartbebanw1->bebantanam;}
		if (is_null($getchartbebanw1->bebanproduksi)){$data['jmlbproduksiw1']=0;$jmlbproduksiw1=0;}else{$data['jmlbproduksiw1']=$getchartbebanw1->bebanproduksi;$jmlbproduksiw1=$getchartbebanw1->bebanproduksi;}}
		foreach($get_chart_beban_w2 as $getchartbebanw2){if (is_null($getchartbebanw2->bebantanam)){$data['jmlbrealisasiw2']=0;$jmlbrealisasiw2=0;}else{$data['jmlbrealisasiw2']=$getchartbebanw2->bebantanam;$jmlbrealisasiw2=$getchartbebanw2->bebantanam;}
		if (is_null($getchartbebanw2->bebanproduksi)){$data['jmlbproduksiw2']=0;$jmlbproduksiw2=0;}else{$data['jmlbproduksiw2']=$getchartbebanw2->bebanproduksi;$jmlbproduksiw2=$getchartbebanw2->bebanproduksi;}}
		foreach($get_chart_beban_w3 as $getchartbebanw3){if (is_null($getchartbebanw3->bebantanam)){$data['jmlbrealisasiw3']=0;$jmlbrealisasiw3=0;}else{$data['jmlbrealisasiw3']=$getchartbebanw3->bebantanam;$jmlbrealisasiw3=$getchartbebanw3->bebantanam;}
		if (is_null($getchartbebanw3->bebanproduksi)){$data['jmlbproduksiw3']=0;$jmlbproduksiw3=0;}else{$data['jmlbproduksiw3']=$getchartbebanw3->bebanproduksi;$jmlbproduksiw3=$getchartbebanw3->bebanproduksi;}}
		foreach($get_chart_jmlrealisasi as $getchartrealisasi){if (is_null($getchartrealisasi->jumlah_realisasi)){$data['jmlchartrealisasi']=0;$jmlchartrealisasi=0;}else{$data['jmlchartrealisasi']=$getchartrealisasi->jumlah_realisasi;$jmlchartrealisasi=$getchartrealisasi->jumlah_realisasi;}}
		foreach($get_chart_jmlrealisasi_w1 as $getchartrealisasiw1){if (is_null($getchartrealisasiw1->jumlah_realisasi)){$data['jmlchartrealisasiw1']=0;$jmlchartrealisasiw1=0;}else{$data['jmlchartrealisasiw1']=$getchartrealisasiw1->jumlah_realisasi;$jmlchartrealisasiw1=$getchartrealisasiw1->jumlah_realisasi;}}
		foreach($get_chart_jmlrealisasi_w2 as $getchartrealisasiw2){if (is_null($getchartrealisasiw2->jumlah_realisasi)){$data['jmlchartrealisasiw2']=0;$jmlchartrealisasiw2=0;}else{$data['jmlchartrealisasiw2']=$getchartrealisasiw2->jumlah_realisasi;$jmlchartrealisasiw2=$getchartrealisasiw2->jumlah_realisasi;}}
		foreach($get_chart_jmlrealisasi_w3 as $getchartrealisasiw3){if (is_null($getchartrealisasiw3->jumlah_realisasi)){$data['jmlchartrealisasiw3']=0;$jmlchartrealisasiw3=0;}else{$data['jmlchartrealisasiw3']=$getchartrealisasiw3->jumlah_realisasi;$jmlchartrealisasiw3=$getchartrealisasiw3->jumlah_realisasi;}}		
		foreach($get_chart_jmlproduksi as $getchartproduksi){if (is_null($getchartproduksi->jumlah_produksi)){$data['jmlchartproduksi']=0;$jmlchartproduksi=0;}else{$data['jmlchartproduksi']=$getchartproduksi->jumlah_produksi;$jmlchartproduksi=$getchartproduksi->jumlah_produksi;}}
		foreach($get_chart_jmlproduksi_w1 as $getchartproduksiw1){if (is_null($getchartproduksiw1->jumlah_produksi)){$data['jmlchartproduksiw1']=0;$jmlchartproduksiw1=0;}else{$data['jmlchartproduksiw1']=$getchartproduksiw1->jumlah_produksi;$jmlchartproduksiw1=$getchartproduksiw1->jumlah_produksi;}}
		foreach($get_chart_jmlproduksi_w2 as $getchartproduksiw2){if (is_null($getchartproduksiw2->jumlah_produksi)){$data['jmlchartproduksiw2']=0;$jmlchartproduksiw2=0;}else{$data['jmlchartproduksiw2']=$getchartproduksiw2->jumlah_produksi;$jmlchartproduksiw2=$getchartproduksiw2->jumlah_produksi;}}
		foreach($get_chart_jmlproduksi_w3 as $getchartproduksiw3){if (is_null($getchartproduksiw3->jumlah_produksi)){$data['jmlchartproduksiw3']=0;$jmlchartproduksiw3=0;}else{$data['jmlchartproduksiw3']=$getchartproduksiw3->jumlah_produksi;$jmlchartproduksiw3=$getchartproduksiw3->jumlah_produksi;}}	
		foreach($get_chart_realisasi as $chartRealisasiM){
			$harike = intval($chartRealisasiM->harike);
			for($i = 1; $i < 8; $i++){
				if ($i == $harike) {
					$datadmp = array("x" => $hari[$i],"y" => number_format($chartRealisasiM->jumlah_tanam,0));
					array_push($chartRW, $datadmp);
				}
				else
				{
					$datadmp = array("x" => $hari[$i],"y" => 0);
					array_push($chartRW, $datadmp);
				}
			}
		}
		$data['jsonchartRW'] = $chartRW;
		
		$chartPW = array();
		foreach($get_chart_produksi as $chartProduksiM){
			$harike = intval($chartProduksiM->harike);
			$jmlP[$chartProduksiM->harike] = $chartProduksiM->jumlah_produksi;
			for($i = 1; $i < 8; $i++){
				if ($i == $harike) {
					array_push($chartPW, array("x" => $hari[$i],"y" => number_format($jmlP[$i],0)));
				}
				else
				{
					array_push($chartPW, array("x" => $hari[$i],"y" => 0));
				}
			}
		}
		$data['jsonchartPW'] = $chartPW;
		
		$chartRW1 = array();
		foreach($get_chart_realisasi_w1 as $chartRealisasiM1){
			$harikew1 = intval($chartRealisasiM1->harike);
			$jmlRw1[$chartRealisasiM1->harike] = $chartRealisasiM1->jumlah_tanam;
			for($i = 1; $i < 8; $i++){
				if ($i == $harikew1) {
					array_push($chartRW1, array("x" => $hari[$i],"y" => $jmlRw1[$i]));
				}
				else
				{
					array_push($chartRW1, array("x" => $hari[$i],"y" => 0));
				}
			}
		}
		$data['jsonchartRW1'] = $chartRW1;
		
		$chartPW1 = array();
		foreach($get_chart_produksi_w1 as $chartProduksiM1){
			$hariP1ke = intval($chartProduksiM1->harike);
			$jmlP1[$chartProduksiM1->harike] = $chartProduksiM1->jumlah_produksi;
			for($i = 1; $i < 8; $i++){
				if ($i == $hariP1ke) {
					array_push($chartPW1, array("x" => $hari[$i],"y" => $jmlP1[$i]));
				}
				else
				{
					array_push($chartPW1, array("x" => $hari[$i],"y" => 0));
				}
			}
		}
		$data['jsonchartPW1'] = $chartPW1;
		///-----
		$chartRW2 = array();
		foreach($get_chart_realisasi_w2 as $chartRealisasiM2){
			$harikew2 = intval($chartRealisasiM2->harike);
			$jmlRw2[$chartRealisasiM2->harike] = $chartRealisasiM2->jumlah_tanam;
			for($i = 1; $i < 8; $i++){
				if ($i == $harikew2) {
					array_push($chartRW2, array("x" => $hari[$i],"y" => $jmlRw2[$i]));
				}
				else
				{
					array_push($chartRW2, array("x" => $hari[$i],"y" => 0));
				}
			}
		}
		$data['jsonchartRW2'] = $chartRW2;
		
		$chartPW2 = array();
		foreach($get_chart_produksi_w2 as $chartProduksiM2){
			$hariP2ke = intval($chartProduksiM2->harike);
			$jmlP2[$chartProduksiM2->harike] = $chartProduksiM2->jumlah_produksi;
			for($i = 1; $i < 8; $i++){
				if ($i == $hariP2ke) {
					array_push($chartPW2, array("x" => $hari[$i],"y" => $jmlP2[$i]));
				}
				else
				{
					array_push($chartPW2, array("x" => $hari[$i],"y" => 0));
				}
			}
		}
		$data['jsonchartPW2'] = $chartPW2;
		
		$chartRW3 = array();
		foreach($get_chart_realisasi_w3 as $chartRealisasiM3){
			$harikew3 = intval($chartRealisasiM3->harike);
			$jmlRw3[$chartRealisasiM3->harike] = $chartRealisasiM3->jumlah_tanam;
			for($i = 1; $i < 8; $i++){
				if ($i == $harikew3) {
					array_push($chartRW3, array("x" => $hari[$i],"y" => $jmlRw3[$i]));
				}
				else
				{
					array_push($chartRW3, array("x" => $hari[$i],"y" => 0));
				}
			}
		}
		$data['jsonchartRW3'] = $chartRW3;
		
		$chartPW3 = array();
		foreach($get_chart_produksi_w3 as $chartProduksiM3){
			$hariP3ke = intval($chartProduksiM3->harike);
			$jmlP3[$chartProduksiM3->harike] = $chartProduksiM3->jumlah_produksi;
			for($i = 1; $i < 8; $i++){
				if ($i == $hariP3ke) {
					array_push($chartPW3, array("x" => $hari[$i],"y" => $jmlP3[$i]));
				}
				else
				{
					array_push($chartPW3, array("x" => $hari[$i],"y" => 0));
				}
			}
		}
		$data['jsonchartPW3'] = $chartPW3;
		echo json_encode($data);
	}
}
