<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi_model extends CI_Model{

  public $table = 'produksi';
  public $id    = 'id_users';
  public $idc   = 'id_cpcl';
  public $idr   = 'id_realisasi';
  public $idp   = 'id_produksi';
  public $order = 'DESC';

  function get_all_produksi()
  {
    $this->db->select('produksi.tgl_produksi, users.nama_perusahaan, if(produksi.type_pelaksana=2, "Swakelola", "Kemitraan") as namapengelola, produksi.nama_pelaksana,wilayah_provinsi.nama as nama_prov, 
wilayah_kabupaten.nama as nama_kab, wilayah_kecamatan.nama as nama_kec, wilayah_desa.nama as nama_des,produksi.jml_produksi,produksi.is_active');
	$this->db->join('users', 'produksi.id_users = users.id_users');
	$this->db->join('wilayah_provinsi', 'produksi.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'produksi.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'produksi.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'produksi.desa = wilayah_desa.id');
    $this->db->where('produksi.is_delete', '0');
    $this->db->order_by('users.nama_perusahaan', $this->order);
    return $this->db->get($this->table)->result();
  }
  
  function get_all_produksi_byid($idp)
  {
    $this->db->select('produksi.*,if(produksi.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'produksi.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'produksi.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'produksi.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'produksi.desa = wilayah_desa.id');
	$this->db->where('id_produksi', $idp);
	return $this->db->get($this->table)->row();
    //return $this->db->get($this->table)->result();
  }
  
  function get_all_produksi_by_idcpcl($id)
  {
    $this->db->select('produksi.*,if(produksi.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'produksi.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'produksi.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'produksi.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'produksi.desa = wilayah_desa.id');
    $this->db->where('is_delete', '0');
	$this->db->where('id_users', $this->session->userdata('id_users'));
	$this->db->where('id_cpcl', $id);
    $this->db->order_by('namapengelola', $this->order);
	//return $this->db->get($this->table)->row();
    return $this->db->get($this->table)->result();
  }
  
  function get_all_produksi_by_idrealisasi($id, $idr)
  {
    $this->db->select('produksi.*,if(produksi.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'produksi.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'produksi.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'produksi.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'produksi.desa = wilayah_desa.id');
    $this->db->where('is_delete', '0');
	$this->db->where('id_users', $this->session->userdata('id_users'));
	$this->db->where('id_cpcl', $id);
	$this->db->where('id_realisasi', $idr);
    $this->db->order_by('namapengelola', $this->order);
	return $this->db->get($this->table)->row();
    //return $this->db->get($this->table)->result();
  }
  

  function get_all_combobox()
  {
    $this->db->order_by('name');
    $data = $this->db->get($this->table);

    if($data->num_rows() > 0)
    {
      foreach($data->result_array() as $row)
      {
        $result[''] = '- Please Choose Users';
        $result[$row['id_users']] = $row['name'];
      }
      return $result;
    }
  }

  function get_all_deleted()
  {
    $this->db->where('is_delete', '1');
    $this->db->order_by('name', $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

  function get_by_username($id)
  {
    $this->db->where('username', $id);
    return $this->db->get($this->table)->row();
  }

  function total_rows()
  {
    return $this->db->get($this->table)->num_rows();
  }

  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  function update($idp, $data)
  {
	$this->db->where('id_produksi', $idp);
    $this->db->update($this->table, $data);
  }
  
  function updateall($id, $data)
  {
	$this->db->where('id_users', $id);
	$this->db->where('is_verifikasi', '0');
    $this->db->update($this->table, $data);
  }

  function soft_delete($id,$idr,$data)
  {
    $this->db->where($this->id, $id);
	$this->db->where($this->idr, $idr);
    $this->db->update($this->table, $data);
  }

  function delete($id, $idr)
  {
    $this->db->where($this->id, $id);
	$this->db->where($this->idr, $idr);
    $this->db->delete($this->table);
  }

  function get_access_read()
  {
    $this->db->select('id_users, data_access_id');
    $this->db->join('users_data_access', 'users.id_users = users_data_access.user_id', 'left');
    $this->db->where('id_users', $this->session->id_users);
    $this->db->where('data_access_id', '1');
    return $this->db->get($this->table)->row();
  }

  function get_access_create()
  {
    $this->db->select('id_users, data_access_id');
    $this->db->join('users_data_access', 'users.id_users = users_data_access.user_id', 'left');
    $this->db->where('id_users', $this->session->id_users);
    $this->db->where('data_access_id', '2');
    return $this->db->get($this->table)->row();
  }

  function get_access_update()
  {
    $this->db->select('id_users, data_access_id');
    $this->db->join('users_data_access', 'users.id_users = users_data_access.user_id', 'left');
    $this->db->where('id_users', $this->session->id_users);
    $this->db->where('data_access_id', '3');
    return $this->db->get($this->table)->row();
  }

  function get_access_delete()
  {
    $this->db->select('id_users, data_access_id');
    $this->db->join('users_data_access', 'users.id_users = users_data_access.user_id', 'left');
    $this->db->where('id_users', $this->session->id_users);
    $this->db->where('data_access_id', '4');
    return $this->db->get($this->table)->row();
  }

  function get_access_restore()
  {
    $this->db->select('id_users, data_access_id');
    $this->db->join('users_data_access', 'users.id_users = users_data_access.user_id', 'left');
    $this->db->where('id_users', $this->session->id_users);
    $this->db->where('data_access_id', '5');
    return $this->db->get($this->table)->row();
  }

  // login attempt
  function get_total_login_attempts_per_user($id)
  {
    $this->db->where('username', $id);
    return $this->db->get('login_attempts')->num_rows();
  }

  function insert_login_attempt($data)
  {
    $this->db->insert('login_attempts', $data);
  }

  function clear_login_attempt($id)
  {
    $this->db->where('username', $id);
    $this->db->delete('login_attempts');
  }
}
