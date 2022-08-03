<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petani extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('petani_model','person');
		$this->load->model('m_wilayah');
		$this->load->model('poktan_model');
		$this->load->model('r_verifikasi');
		$this->load->model('ChatModel');
	}

	public function daftar($idpoktan)
	{
		is_login();
		
		$this->data['user']     = $this->poktan_model->get_by_id($idpoktan);
		if($this->data['user'])
		{
			$this->data['page_title'] = 'Daftar Petani ';
			$this->data['get_all_combobox_provinsi'] = $this->m_wilayah->get_all_provinsi2();
			$this->data['id_poktan'] = [
			  'name'          => 'id_poktan',
			  'type'          => 'hidden',
			];
			
			$this->data['nama_poktan'] = [
			  'name'          => 'nama_poktan',
			  'id'            => 'nama_poktan',
			  'class'         => 'form-control',
			  'autocomplete'  => 'off',
			];
			  
			$this->data['provinsi'] = [
			  'name'          => 'provinsi',
			  'id'            => 'provinsi',
			  'class'         => 'form-control',
			  'autocomplete'  => 'off',
			];
			$this->data['kabupaten'] = [
			  'name'          => 'kabupaten',
			  'id'            => 'kabupaten',
			  'class'         => 'form-control',
			  'autocomplete'  => 'off',
			];
			$this->data['kecamatan'] = [
			  'name'          => 'kecamatan',
			  'id'            => 'kecamatan',
			  'class'         => 'form-control',
			  'autocomplete'  => 'off',
			];
			$this->data['desa'] = [
			  'name'          => 'desa',
			  'id'            => 'desa`',
			  'class'         => 'form-control',
			  'autocomplete'  => 'off',
			];
			$this->load->view('back/petani_view', $this->data);
		}
	}

	public function ajax_list($idpoktan)
	{
		$list = $this->person->get_by_id_poktan($idpoktan);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->id_petani;
			$row[] = $person->nik;
			$row[] = $idpoktan;
			$row[] = $person->nama_petani;
			$row[] = $person->alamat;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary btn-fab" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id_petani."'".')"><i class="icon icon-lead-pencil"></i></a>
				  <a class="btn btn-sm btn-danger btn-fab" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id_petani."'".')"><i class="icon icon-delete-empty"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->person->count_all(),
						"recordsFiltered" => $this->person->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'id_poktan' => $this->input->post('id_poktan'),
				'nik' => $this->input->post('nik'),
				'nama_poktan' => $this->input->post('nama_poktan'),
				'nama_petani' => $this->input->post('nama_petani'),
				'provinsi' => $this->input->post('provinsi'),
				'kabupaten' => $this->input->post('kabupaten'),
				'kecamatan' => $this->input->post('kecamatan'),
				'desa' => $this->input->post('desa'),
				'alamat' => $this->input->post('alamat'),
			);
		$insert = $this->person->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'id_poktan' => $this->input->post('id_poktan'),
				'nik' => $this->input->post('nik'),
				'nama_petani' => $this->input->post('nama_petani'),
				'provinsi' => $this->input->post('provinsi'),
				'kabupaten' => $this->input->post('kabupaten'),
				'kecamatan' => $this->input->post('kecamatan'),
				'desa' => $this->input->post('desa'),
				'alamat' => $this->input->post('alamat'),
			);
		$this->person->update(array('id_petani' => $this->input->post('id_petani')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id_poktan') == '')
		{
			$data['inputerror'][] = 'id_poktan';
			$data['error_string'][] = 'ID Poktan is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('nik') == '')
		{
			$data['inputerror'][] = 'nik';
			$data['error_string'][] = 'NIK is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama_petani') == '')
		{
			$data['inputerror'][] = 'nama_petani';
			$data['error_string'][] = 'Nama Petani is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('provinsi') == '')
		{
			$data['inputerror'][] = 'provinsi';
			$data['error_string'][] = 'provinsi is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('kabupaten') == '')
		{
			$data['inputerror'][] = 'kabupaten';
			$data['error_string'][] = 'kabupaten is required';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('kecamatan') == '')
		{
			$data['inputerror'][] = 'kecamatan';
			$data['error_string'][] = 'kecamatan is required';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('desa') == '')
		{
			$data['inputerror'][] = 'desa';
			$data['error_string'][] = 'desa is required';
			$data['status'] = FALSE;
		}
		
		
		if($this->input->post('alamat') == '')
		{
			$data['inputerror'][] = 'alamat';
			$data['error_string'][] = 'alamat is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
