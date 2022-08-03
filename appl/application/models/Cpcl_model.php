<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpcl_model extends CI_Model{

  public $table = 'cpcl';
  public $id    = 'id_users';
  public $idriph    = 'id_mst_riph';
  public $idc    = 'id_cpcl';
  public $order = 'DESC';

  function get_all_cpcl()
  {
    $this->db->select('cpcl.*,if(cpcl.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'cpcl.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'cpcl.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'cpcl.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'cpcl.desa = wilayah_desa.id');
    $this->db->where('is_delete', '0');
    $this->db->group_by('cpcl.id_cpcl');
    return $this->db->get($this->table)->result();
  }
  
  function get_all_cpcl_by_iduser1()
  {
    $this->db->select('cpcl.id_cpcl, cpcl.tgl_rencana_tanam, cpcl.nama_pelaksana, cpcl.is_active, cpcl.is_verifikasi, if(cpcl.type_pelaksana=2, "Swakelola", "Kemitraan") as namapengelola, 
	wilayah_provinsi.nama as nama_prov, wilayah_kabupaten.nama as nama_kab, wilayah_kecamatan.nama as nama_kec, wilayah_desa.nama as nama_des, t1.luas_tanam AS luas_tanam,t2.jmlproduksi AS jmlproduksi  
	FROM cpcl JOIN wilayah_provinsi ON cpcl.provinsi = wilayah_provinsi.id JOIN wilayah_kabupaten ON cpcl.kabupaten = wilayah_kabupaten.id JOIN wilayah_kecamatan ON cpcl.kecamatan = wilayah_kecamatan.id 
	JOIN wilayah_desa ON cpcl.desa = wilayah_desa.id LEFT JOIN (select realisasi.id_users AS id_users,sum(realisasi.luas_realisasi_tanam) AS luas_tanam 
	from realisasi group by realisasi.id_users) t1 on(t1.id_users = cpcl.id_users) LEFT JOIN (select produksi.id_users AS id_users,sum(produksi.jml_produksi) AS jmlproduksi 
	from produksi group by produksi.id_users) t2 on(t2.id_users = cpcl.id_users)  WHERE cpcl.is_delete = 0 AND cpcl.id_users = '.$this->session->userdata('id_users').' GROUP BY cpcl.id_cpcl');
	return $this->db->get($this->table)->result();
  }

  function get_all_cpcl_by_iduser($idriph)
  {
    $this->db->select('cpcl.id_cpcl, cpcl.id_mst_riph, cpcl.tgl_rencana_tanam, cpcl.nama_pelaksana, cpcl.is_active, cpcl.is_verifikasi, cpcl.is_aju_verifikasi, if(cpcl.type_pelaksana=2, "Swakelola", "Kemitraan") as namapengelola, 
	wilayah_provinsi.nama as nama_prov, wilayah_kabupaten.nama as nama_kab, wilayah_kecamatan.nama as nama_kec, wilayah_desa.nama as nama_des, (select IFNULL(sum(realisasi.luas_realisasi_tanam),0) 
	from realisasi where realisasi.is_delete=0 and realisasi.id_cpcl = cpcl.id_cpcl and realisasi.id_users = cpcl.id_users ) AS jmlrealisasi, 
  (select IFNULL(sum(produksi.jml_produksi),0) 
	from produksi where produksi.is_delete=0 and produksi.id_cpcl = cpcl.id_cpcl and produksi.id_users = cpcl.id_users ) AS jmlproduksi');  
	$this->db->join('wilayah_provinsi', 'cpcl.provinsi = wilayah_provinsi.id','left');
	$this->db->join('wilayah_kabupaten', 'cpcl.kabupaten = wilayah_kabupaten.id','left');
	$this->db->join('wilayah_kecamatan', 'cpcl.kecamatan = wilayah_kecamatan.id','left');
	$this->db->join('wilayah_desa', 'cpcl.desa = wilayah_desa.id','left');
	//$this->db->join('(select realisasi.id_users AS id_users,realisasi.id_cpcl AS id_cpcl,sum(realisasi.luas_realisasi_tanam) AS jmlrealisasi 
	//from realisasi where realisasi.is_delete=0 group by realisasi.id_users) t1', 't1.id_users = cpcl.id_users and t1.id_cpcl = cpcl.id_cpcl','left');
	//$this->db->join('(select produksi.id_users AS id_users,produksi.id_cpcl AS id_cpcl,sum(produksi.jml_produksi) AS jmlproduksi 
	//from produksi where produksi.is_delete=0 group by produksi.id_users) t2', 't2.id_users = cpcl.id_users and t2.id_cpcl = cpcl.id_cpcl','left');
	$this->db->where('cpcl.is_delete', '0');
	$this->db->where('cpcl.id_users', $this->session->userdata('id_users'));
	$this->db->where('cpcl.id_mst_riph', $idriph);
	return $this->db->get($this->table)->result();
  }
  
  function get_all_cpcl_by_iduserv()
  {
    $this->db->select('cpcl.id_cpcl, cpcl.id_mst_riph, cpcl.tgl_rencana_tanam, cpcl.nama_pelaksana, cpcl.is_active, cpcl.is_verifikasi, if(cpcl.type_pelaksana=2, "Swakelola", "Kemitraan") as namapengelola, 
	wilayah_provinsi.nama as nama_prov, wilayah_kabupaten.nama as nama_kab, wilayah_kecamatan.nama as nama_kec, wilayah_desa.nama as nama_des, t1.jmlrealisasi AS jmlrealisasi,t2.jmlproduksi AS jmlproduksi');  
	$this->db->join('wilayah_provinsi', 'cpcl.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'cpcl.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'cpcl.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'cpcl.desa = wilayah_desa.id');
	$this->db->join('(select realisasi.id_users AS id_users,sum(realisasi.luas_realisasi_tanam) AS jmlrealisasi 
	from realisasi where realisasi.is_delete=0 group by realisasi.id_users) t1', 't1.id_users = cpcl.id_users','left');
	$this->db->join('(select produksi.id_users AS id_users,sum(produksi.jml_produksi) AS jmlproduksi 
	from produksi where produksi.is_delete=0 group by produksi.id_users) t2', 't2.id_users = cpcl.id_users','left');
	$this->db->where('cpcl.is_delete', '0');
	$this->db->where('cpcl.id_users', $this->session->userdata('id_users'));
	return $this->db->get($this->table)->result();
  }
  
  function get_all_cpcl_by_idcpcl($idc)
  {
    $this->db->select('cpcl.*,if(cpcl.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'cpcl.provinsi = wilayah_provinsi.id','left');
	$this->db->join('wilayah_kabupaten', 'cpcl.kabupaten = wilayah_kabupaten.id','left');
	$this->db->join('wilayah_kecamatan', 'cpcl.kecamatan = wilayah_kecamatan.id','left');
	$this->db->join('wilayah_desa', 'cpcl.desa = wilayah_desa.id','left');
    $this->db->where('is_delete', '0');
	$this->db->where('id_cpcl', $idc);
	return $this->db->get($this->table)->row();
    //return $this->db->get($this->table)->result();
  }
  
  function get_all_marker_cpcl($idc)
  {
    $this->db->select('point');
    $this->db->where('is_delete', '0');
	$this->db->where('is_active', '1');
	$this->db->where('id_cpcl', $idc);
	//return $this->db->get($this->table)->row();
    return $this->db->get($this->table)->result();
  }
  
   function get_total_luas_cpcl_admin($thn)
  {
    $this->db->select('sum(luas_rencana_tanam) as luas_rencana_tanam');
    if ($thn && ($thn!='0') && ($thn!='index') ) {
      $this->db->where('RIGHT(no_pks,4) =', $thn); 
    }
    $this->db->where('is_delete', '0');
	  $this->db->where('is_active', '1');
	return $this->db->get($this->table)->row();
    //return $this->db->get($this->table)->result();
  }
  
  function get_total_luas_cpcl_user($id)
  {
    $this->db->select('sum(luas_rencana_tanam) as luas_rencana_tanam');
    $this->db->where('is_delete', '0');
	$this->db->where('is_active', '1');
	$this->db->where('id_users', $id);
	//return $this->db->get($this->table)->row();
    return $this->db->get($this->table)->result();
  }
  
  function get_all_cpcl_by_idcpclv($idc)
  {
    $this->db->select('cpcl.*,if(cpcl.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'cpcl.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'cpcl.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'cpcl.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'cpcl.desa = wilayah_desa.id');
    $this->db->where('is_delete', '0');
	$this->db->where('id_cpcl', $idc);
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

  function get_by_id($idc)
  {
    $this->db->where('id_cpcl', $idc);
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

  function update($idc,$data)
  {
    $this->db->where('id_cpcl', $idc);
    $this->db->update($this->table, $data);
  }
  
  function updateall($id,$data)
  {
    $this->db->where('id_users', $id);
	$this->db->where('is_verifikasi', '0');
    $this->db->update($this->table, $data);
  }

  function soft_delete($idc,$data)
  {
    $this->db->where('id_cpcl', $idc);
    $this->db->update($this->table, $data);
  }

  function delete($idc)
  {
    $this->db->where('id_cpcl', $idc);
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

  
}
