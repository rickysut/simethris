<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R_verifikasi_new extends CI_Model{

  public $table = 'r_verifikasi';
  public $tablev = 'verifikasi';
  public $tablec = 'cpcl';
  public $tabler = 'realisasi';
  public $tablep = 'produksi';
  public $tablef = 'tbl_files';
  public $tableu = 'users';
  public $id    = 'id_users';
  public $idr    = 'id_r_verifikasi';
  public $idrj    = 'id_r_jverifikasi';
  public $idre    = 'id_realisasi';
  public $idj    = 'jenis_verifikasi';
  public $idc	= 'id_cpcl';
  public $order = 'DESC';
	
  public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
  
  function get_all_verifikasi_by_perusahaan($id)
  {
	$this->db->where('id_users', $id);
    return $this->db->get($this->tableu)->result();
	//return $this->db->get($this->tablep)->row();
  }
  
  function get_data_perusahaan($id)
  {
	$this->db->select('id_users,nama_perusahaan, logo_perusahaan, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des, alamat, phone_number, name as nama_kontak');
	$this->db->join('wilayah_provinsi', 'users.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'users.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'users.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'users.desa = wilayah_desa.id');
    $this->db->where('users.is_delete', '0');
	$this->db->where('users.is_active', '1');
	$this->db->where('users.id_users', $id);
	$this->db->group_by('id_users');
    return $this->db->get($this->tableu)->row_array();
  }
  
  function get_all_r_verifikasi()
  {
    $this->db->where('is_delete', '0');
	$this->db->group_by('id_users');
    return $this->db->get($this->table)->result();
  }
  
  function get_jml_r_verifikasi()
  {
	$this->db->select('count(id_users) as jumlahVerif');  
    $this->db->where('is_delete', '0');
	$this->db->where('is_verifikasi', '0');
    return $this->db->get($this->table)->row();
  }
  
  function get_all_pks_by_idcpcl($idc)
  {
    $this->db->where('is_delete', '0');
	$this->db->where('id_cpcl', $idc);
    return $this->db->get($this->tablec)->result();
  }
  
  function get_all_cpcl_by_user($id, $thn)
  {
    $this->db->select('id_users,id_cpcl,nama_pelaksana, tgl_rencana_tanam, luas_rencana_tanam, is_verifikasi, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'cpcl.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'cpcl.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'cpcl.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'cpcl.desa = wilayah_desa.id');
    $this->db->where('cpcl.is_delete', '0');
	$this->db->where('cpcl.is_active', '1');
	$this->db->where('cpcl.id_users', $id);
  if ($thn && ($thn!='0') && ($thn!='view_company')) {
    $this->db->where('RIGHT(cpcl.no_pks,4) = ', $thn);
  }
  return $this->db->get($this->tablec)->result();
	//return $this->db->get($this->tablec)->row();
  }
  
  function get_all_produksi_by_idcpcl($idre)
  {
    $this->db->where('is_delete', '0');
	$this->db->where('id_realisasi', $idre);
	$this->db->order_by('id_users', $this->order);
    return $this->db->get($this->tablep)->result();
	//return $this->db->get($this->tablep)->row();
  }
  
  function get_all_produksi_by_idrealisasi($idre)
  {
    $this->db->where('is_delete', '0');
	  $this->db->where('id_realisasi', $idre);
	  $this->db->order_by('id_users', $this->order);
    return $this->db->get($this->tablep)->result();
	//return $this->db->get($this->tablep)->row();
  }
  
  function get_all_file_realisasi_by_id($namafile)
  {
	//$this->db->where('id_users', $id);
	$this->db->like('file_data', $namafile, 'both');
	$this->db->order_by('id_users', $this->order);
    return $this->db->get($this->tablef)->result();
	//return $this->db->get($this->tablep)->row();
  }
  
  function get_all_file_produksi_by_id($namafile)
  {
	//$this->db->where('id_users', $id);
	$this->db->like('file_data', $namafile, 'both');
	$this->db->order_by('id_users', $this->order);
    return $this->db->get($this->tablef)->result();
	//return $this->db->get($this->tablep)->row();
  }
  
  function get_all_file_cpcl_by_id($id,$namafile)
  {
	$this->db->where('id_users', $id);
	$this->db->like('file_data', $namafile, 'after');
	$this->db->order_by('id_users', $this->order);
    return $this->db->get($this->tablef)->result();
	//return $this->db->get($this->tablep)->row();
  }
  
  function get_all_realisasi_by_idcpcl($idc)
  {
    $this->db->where('is_delete', '0');
	$this->db->where('id_cpcl', $idc);
	$this->db->order_by('id_users', $this->order);
	//return $this->db->get($this->tabler)->row_array();
    return $this->db->get($this->tabler)->result();
  }
  
  function get_all_r_verifikasi_by_idr($idr)
  {
	$this->db->where('id_r_verifikasi', $idr);
    $this->db->where('is_delete', '0');
    //return $this->db->get($this->table)->result();
	return $this->db->get($this->table)->row();
  }
  
  function get_all_r_verifikasi_by_iduser($id)
  {
    $this->db->where('is_delete', '0');
	$this->db->where('id_users', $id);
    $this->db->group_by('jenis_verifikasi');
    return $this->db->get($this->table)->result();
  }
  
  function get_all_r_verifikasi_by_status_1()
  {
    $this->db->where('is_delete', '0');
	$this->db->where('is_verifikasi', '1');
    $this->db->group_by('jenis_verifikasi');
    return $this->db->get($this->table)->result();
  }
  
  function get_all_r_verifikasi_by_status_0()
  {
    $this->db->where('is_delete', '0');
	$this->db->where('ii_verifikasi', '0');
    $this->db->group_by('jenis_verifikasi');
    return $this->db->get($this->table)->result();
  }
  
  function get_all_r_verifikasi_by_jenis($idj, $thn)
  {
    
    if ($thn && ($thn!='0') && ($thn!='index')) {
      $this->db->join('mst_riph', 'mst_riph.id_users = r_verifikasi.id_users and RIGHT(mst_riph.nomor_riph,4) = '. $thn);
    }
    $this->db->where('r_verifikasi.is_delete', '0');
	  $this->db->where('r_verifikasi.jenis_verifikasi', $idj);
	  $this->db->group_by('r_verifikasi.nama_perusahaan');
    return $this->db->get($this->table)->result();
  }


  function get_all_deleted()
  {
    $this->db->where('is_delete', '1');
    $this->db->order_by('name', $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_by_id($id)
  {
    $this->db->where($this->id_r_verifikasi, $id);
    return $this->db->get($this->table)->row();
  }

  function total_rows()
  {
    return $this->db->get($this->table)->num_rows();
  }

  function total_rows_unverif()
  {
	$this->db->where('is_verifikasi', '0');
    return $this->db->get($this->table)->num_rows();
  }
  
  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }
  
  function insertv($data)
  {
    $this->db->insert($this->tablev, $data);
  }

  function update_pks($idrj,$data)
  {
    $this->db->where('jenis_verifikasi', 'PKS');
    $this->db->where('id_r_jverifikasi', $idrj);
    $this->db->update($this->table, $data);
  }
  
  function update_realisasi($idrj,$data)
  {
    $this->db->where('jenis_verifikasi', 'REALISASI');
    $this->db->where('id_r_jverifikasi', $idrj);
    $this->db->update($this->table, $data);
  }
  
  function update_produksi($idrj,$data)
  {
    $this->db->where('jenis_verifikasi', 'PRODUKSI');
    $this->db->where('id_r_jverifikasi', $idrj);
    $this->db->update($this->table, $data);
  }
  
  function update($idr,$data)
  {
    $this->db->where('id_r_verifikasi', $idr);
    $this->db->update($this->table, $data);
  }
  
  function update2($idr,$data)
  {
    $this->db->where('id_r_jverifikasi', $idr);
    $this->db->update($this->table, $data);
  }
  
  function updateall($id,$data)
  {
    $this->db->where('id_users', $id);
	$this->db->where('is_verifikasi', '0');
    $this->db->update($this->table, $data);
  }

  function soft_delete($idr,$data)
  {
    $this->db->where($this->id_r_verifikasi, $idr);
    $this->db->update($this->table, $data);
  }

  function delete($idr)
  {
    $this->db->where($this->id_r_verifikasi, $idr);
    $this->db->delete($this->table);
  }
  
  function simpan_verifikasi1($id_users,$name,$nama_perusahaan,$jenisVerifikasi,$id_verifikasi1,$sts_verifikasi1,$ket_verifikasi,$verifikator)
  {
        $hasil=$this->db->query("INSERT INTO verifikasi (id_users,name,nama_perusahaan,jenis_verifikasi_1,id_verifikasi_1,is_verifikasi_1,keterangan_1,verifikator_1) VALUES ('$id_users','$name','$nama_perusahaan','$jenisVerifikasi','$id_verifikasi1','$sts_verifikasi1','$ket_verifikasi','$verifikator')");
        return $hasil;
  }
}