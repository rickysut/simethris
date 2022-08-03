<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model{
  public $id    = 'id_users';
  public $tablecpcl = 'cpcl';
  public $tablereal = 'realisasi';
  public $tablepro = 'produksi';
  public $tableuser = 'users';
  public $tableriph = 'mst_riph';
  public $tabler = 'r_verifikasi';
  public $order = 'DESC';
  
  function get_volume_import()
  {
    $this->db->select('sum(mst_riph.v_pengajuan_riph) as vimport');
    $this->db->where('mst_riph.is_delete', '0');
	return $this->db->get($this->tableriph)->row();
    //return $this->db->get($this->tablereal)->result();
  }
  
  function get_data_perusahaan()
  {
    $this->db->select('nama_perusahaan, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des, alamat, phone_number, name as nama_kontak, v_pengajuan_riph as volume');
	$this->db->join('wilayah_provinsi', 'users.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'users.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'users.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'users.desa = wilayah_desa.id');
    $this->db->where('users.is_delete', '0');
	$this->db->where('users.is_active', '1');
	$this->db->where('users.usertype', '3');
	//return $this->db->get($this->tableuser)->row();
    return $this->db->get($this->tableuser)->result();
  }

  function get_all_marker_realisasi($id)
  {
    $this->db->select('realisasi.*,if(realisasi.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'realisasi.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'realisasi.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'realisasi.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'realisasi.desa = wilayah_desa.id');
    $this->db->where('realisasi.is_delete', '0');
	$this->db->where('realisasi.id_users', $id);
	//return $this->db->get($this->tablereal)->row();
    return $this->db->get($this->tablereal)->result();
  }
  
  function get_all_cpcl($id)
  {
    $this->db->select('cpcl.*,if(cpcl.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des,sum(realisasi.luas_realisasi_tanam) as jmlrealisasi,sum(produksi.jml_produksi) as jmlproduksi' );
	$this->db->join('wilayah_provinsi', 'cpcl.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'cpcl.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'cpcl.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'cpcl.desa = wilayah_desa.id');
	$this->db->join('produksi', 'cpcl.id_cpcl = produksi.id_cpcl','left');
	$this->db->join('realisasi', 'cpcl.id_cpcl = realisasi.id_cpcl','left');
    $this->db->where('cpcl.is_delete', '0');
	$this->db->where('cpcl.id_users', $id);
	$this->db->group_by('cpcl.id_cpcl', $this->order);
    $this->db->order_by('cpcl.tgl_rencana_tanam', $this->order);
    return $this->db->get($this->tablecpcl)->result();
  }
  
  function get_all_realisasi($id)
  {
    $this->db->select('realisasi.*,if(realisasi.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'realisasi.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'realisasi.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'realisasi.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'realisasi.desa = wilayah_desa.id');
    $this->db->where('is_delete', '0');
	$this->db->where('realisasi.id_users', $id);
    $this->db->order_by('tgl_realisasi_tanam', $this->order);
    return $this->db->get($this->tablereal)->result();
  }
  
  function get_all_produksi($id)
  {
    $this->db->select('produksi.*,if(produksi.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'produksi.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'produksi.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'produksi.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'produksi.desa = wilayah_desa.id');
    $this->db->where('is_delete', '0');
	$this->db->where('produksi.id_users', $id);
    $this->db->order_by('produksi.tgl_produksi', $this->order);
    return $this->db->get($this->tablepro)->result();
  }
  
  function get_all_cpcl_admin()
  {
    $this->db->select('cpcl.*,if(cpcl.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'cpcl.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'cpcl.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'cpcl.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'cpcl.desa = wilayah_desa.id');
    $this->db->where('cpcl.is_delete', '0');
    return $this->db->get($this->tablecpcl)->result();
  }
  
  function get_all_cpcl_adminc()
  {
    $this->db->select('id_users as id_perusahaan, nama_perusahaan,(select jenis_verifikasi from `r_verifikasi` where jenis_verifikasi="PKS" and id_users=id_perusahaan group by jenis_verifikasi) as tahap1,(select is_verifikasi from `r_verifikasi` where jenis_verifikasi="PKS" and id_users=id_perusahaan group by jenis_verifikasi) as ststahap1, ifnull((select tgl_verifikasi from `r_verifikasi` where jenis_verifikasi="PKS" and id_users=id_perusahaan group by jenis_verifikasi),(select max(tgl_r_verifikasi) as tgl_r_verifikasi from `r_verifikasi` where jenis_verifikasi="PKS" and id_users=id_perusahaan group by jenis_verifikasi)) as tgltahap1, 
(select jenis_verifikasi from `r_verifikasi` where jenis_verifikasi="REALISASI" and id_users=id_perusahaan group by jenis_verifikasi) as tahap2,(select max(is_verifikasi) as is_verifikasi from `r_verifikasi` where jenis_verifikasi="REALISASI" and id_users=id_perusahaan group by jenis_verifikasi) as ststahap2, (select max(tgl_verifikasi) as tgl_verifikasi from `r_verifikasi` where jenis_verifikasi="REALISASI" and id_users=id_perusahaan group by jenis_verifikasi),(select max(tgl_r_verifikasi) as tgl_r_verifikasi from `r_verifikasi` where jenis_verifikasi="REALISASI" and id_users=id_perusahaan group by jenis_verifikasi) as tgltahap2,
(select jenis_verifikasi from `r_verifikasi` where jenis_verifikasi="PRODUKSI" and id_users=id_perusahaan group by jenis_verifikasi) as tahap3,(select max(is_verifikasi) as is_verifikasi from `r_verifikasi` where jenis_verifikasi="PRODUKSI" and id_users=id_perusahaan group by jenis_verifikasi) as ststahap3, (select max(tgl_verifikasi) as tgl_verifikasi from `r_verifikasi` where jenis_verifikasi="PRODUKSI" and id_users=id_perusahaan group by jenis_verifikasi,tgl_verifikasi),(select max(tgl_r_verifikasi) as tgl_r_verifikasi from `r_verifikasi` where jenis_verifikasi="PRODUKSI" and id_users=id_perusahaan group by jenis_verifikasi) as tgltahap3');
	$this->db->group_by('id_perusahaan, nama_perusahaan');
    return $this->db->get($this->tabler)->result();
  }
  
  function get_all_cpclc($id)
  {
    $this->db->select('id_users as id_perusahaan, nama_perusahaan,(select jenis_verifikasi from `r_verifikasi` where jenis_verifikasi="PKS" and id_users=id_perusahaan group by jenis_verifikasi) as tahap1,(select is_verifikasi from `r_verifikasi` where jenis_verifikasi="PKS" and id_users=id_perusahaan group by jenis_verifikasi) as ststahap1, ifnull((select tgl_verifikasi from `r_verifikasi` where jenis_verifikasi="PKS" and id_users=id_perusahaan group by jenis_verifikasi),(select max(tgl_r_verifikasi) as tgl_r_verifikasi from `r_verifikasi` where jenis_verifikasi="PKS" and id_users=id_perusahaan group by jenis_verifikasi)) as tgltahap1, 
(select jenis_verifikasi from `r_verifikasi` where jenis_verifikasi="REALISASI" and id_users=id_perusahaan group by jenis_verifikasi) as tahap2,(select max(is_verifikasi) as is_verifikasi from `r_verifikasi` where jenis_verifikasi="REALISASI" and id_users=id_perusahaan group by jenis_verifikasi) as ststahap2, (select max(tgl_verifikasi) as tgl_verifikasi from `r_verifikasi` where jenis_verifikasi="REALISASI" and id_users=id_perusahaan group by jenis_verifikasi),(select max(tgl_r_verifikasi) as tgl_r_verifikasi from `r_verifikasi` where jenis_verifikasi="REALISASI" and id_users=id_perusahaan group by jenis_verifikasi) as tgltahap2,
(select jenis_verifikasi from `r_verifikasi` where jenis_verifikasi="PRODUKSI" and id_users=id_perusahaan group by jenis_verifikasi) as tahap3,(select max(is_verifikasi) as is_verifikasi from `r_verifikasi` where jenis_verifikasi="PRODUKSI" and id_users=id_perusahaan group by jenis_verifikasi) as ststahap3, (select max(tgl_verifikasi) as tgl_verifikasi from `r_verifikasi` where jenis_verifikasi="PRODUKSI" and id_users=id_perusahaan group by jenis_verifikasi,tgl_verifikasi),(select max(tgl_r_verifikasi) as tgl_r_verifikasi from `r_verifikasi` where jenis_verifikasi="PRODUKSI" and id_users=id_perusahaan group by jenis_verifikasi) as tgltahap3');
	$this->db->where('is_delete', '0');
	$this->db->where('id_users', $id);
	$this->db->group_by('id_users');
    return $this->db->get($this->tabler)->result();
  }
  function get_all_realisasi_admin()
  {
    $this->db->select('realisasi.*,if(realisasi.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'realisasi.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'realisasi.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'realisasi.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'realisasi.desa = wilayah_desa.id');
    $this->db->where('is_delete', '0');
    $this->db->order_by('tgl_realisasi_tanam', $this->order);
    return $this->db->get($this->tablereal)->result();
  }
  
  function get_all_realisasi_tanam_admin()
  {
    $this->db->select('sum(realisasi.luas_realisasi_tanam) as jmlluas');
    $this->db->where('realisasi.is_delete', '0');
	return $this->db->get($this->tablereal)->row();
    //return $this->db->get($this->tablereal)->result();
  }
  
  function get_all_beban_realisasi_tanam_admin()
  {
    $this->db->select('sum(mst_riph.beban_tanam) as jmlbeban');
    $this->db->where('mst_riph.is_delete', '0');
	return $this->db->get($this->tableriph)->row();
    //return $this->db->get($this->tableriph)->result();
  }
  
  function get_all_jml_produksi_admin()
  {
    $this->db->select('sum(produksi.jml_produksi) as jmlproduksi');
    $this->db->where('produksi.is_delete', '0');
	return $this->db->get($this->tablepro)->row();
    //return $this->db->get($this->tablereal)->result();
  }
  
  function get_all_beban_produksi_admin()
  {
    $this->db->select('sum(mst_riph.beban_produksi) as jmlbeban');
    $this->db->where('mst_riph.is_delete', '0');
	return $this->db->get($this->tableriph)->row();
    //return $this->db->get($this->tableuser)->result();
  }
  
  function get_all_produksi_admin()
  {
    $this->db->select('produksi.*,if(produksi.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'produksi.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'produksi.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'produksi.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'produksi.desa = wilayah_desa.id');
    $this->db->where('is_delete', '0');
    $this->db->order_by('tgl_produksi', $this->order);
    return $this->db->get($this->tablepro)->result();
  }
  
  function get_all_marker_admin()
  {
    $this->db->select('realisasi.*,if(realisasi.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'realisasi.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'realisasi.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'realisasi.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'realisasi.desa = wilayah_desa.id');
    $this->db->where('realisasi.is_delete', '0');
	//return $this->db->get($this->tablereal)->row();
    return $this->db->get($this->tablereal)->result();
  }
  
  function get_all_polygon_admin()
  {
    $this->db->select('realisasi.id_users,users.nama_perusahaan, if(realisasi.type_pelaksana=2, "Swakelola", "Kemitraan") as namapengelola, realisasi.nama_pelaksana,wilayah_provinsi.nama as nama_prov, 
	wilayah_kabupaten.nama as nama_kab, wilayah_kecamatan.nama as nama_kec, wilayah_desa.nama as nama_des, realisasi.realisasi_polygon');
	$this->db->join('users', 'realisasi.id_users = users.id_users');
	$this->db->join('wilayah_provinsi', 'realisasi.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'realisasi.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'realisasi.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'realisasi.desa = wilayah_desa.id');
    $this->db->where('realisasi.is_delete', '0');
	//return $this->db->get($this->tablereal)->row();
    return $this->db->get($this->tablereal)->result();
  }
  
  function get_all_polygon_admin1()
  {
    $this->db->select('realisasi_polygon');
    $this->db->where('is_delete', '0');
	//return $this->db->get($this->tablereal)->row();
    return $this->db->get($this->tablereal)->result();
  }
  
  function get_all_polygon_user($id)
  {
    $this->db->select('realisasi_polygon');
    $this->db->where('is_delete', '0');
	$this->db->where('id_users', $id);
	//return $this->db->get($this->tablereal)->row();
    return $this->db->get($this->tablereal)->result();
  }
  function get_all_jumlah_realisasi($id)
  {
    $this->db->select('sum(realisasi.luas_realisasi_tanam) as luas_tanam');
    $this->db->where('is_delete', '0');
	$this->db->where('id_users', $id);
	return $this->db->get($this->tablereal)->row();
    //return $this->db->get($this->tablereal)->result();
  }
  
   function get_all_jumlah_realisasi_admin()
  {
    $this->db->select('realisasi.id_users,sum(realisasi.luas_realisasi_tanam) as luas_tanam');
    $this->db->where('realisasi.is_delete', '0');
	//return $this->db->get($this->tablereal)->row();
    return $this->db->get($this->tablereal)->result();
  }
  
  function get_all_jumlah_produksi($id)
  {
    $this->db->select('sum(produksi.jml_produksi) as jml_produksi');
    $this->db->where('produksi.is_delete', '0');
	$this->db->where('id_users', $id);
	return $this->db->get($this->tablepro)->row();
    //return $this->db->get($this->tablepro)->result();
  }
  
   function get_all_jumlah_produksi_admin()
  {
    $this->db->select('sum(produksi.jml_produksi) as jml_produksi');
    $this->db->where('is_delete', '0');
	//return $this->db->get($this->tablereal)->row();
    return $this->db->get($this->tablepro)->result();
  }
  
  function get_jml_produksi_admin111()
  {
    $this->db->select("DATE_FORMAT(STR_TO_DATE(tgl_produks, '%m/%d/%Y'), '%m') as bulanproduksi, sum(jml_produksi) as jmlproduksi");
    $this->db->where('is_delete', '0');
	$this->db->where('is_active', '1');
	$this->db->group_by('bulanproduksi', $this->order);
	//return $this->db->get($this->tablereal)->row();
    return $this->db->get($this->tablepro)->result();
  }
  
  function get_jml_produksi_admin()
  {
    $this->db->select("MONTH(tgl_produksi) as bulanproduksi, sum(jml_produksi) as jmlproduksi");
    $this->db->where('is_delete', '0');
	$this->db->where('is_active', '1');
	$this->db->group_by('bulanproduksi', $this->order);
	//return $this->db->get($this->tablereal)->row();
    return $this->db->get($this->tablepro)->result();
  }
  
  function get_jml_realisasi_admin111()
  {
    $this->db->select("DATE_FORMAT(STR_TO_DATE(tgl_realisasi_tanam, '%m/%d/%Y'), '%m') as bulanrealisasi, sum(luas_realisasi_tanam) as jmltanam");
    $this->db->where('is_delete', '0');
	$this->db->where('is_active', '1');
	$this->db->group_by('bulanrealisasi', $this->order);
	//return $this->db->get($this->tablereal)->row();
    return $this->db->get($this->tablereal)->result();
  }
  
  function get_jml_realisasi_admin()
  {
    $this->db->select("month(tgl_realisasi_tanam) as bulanrealisasi, sum(luas_realisasi_tanam) as jmltanam");
    $this->db->where('is_delete', '0');
	$this->db->where('is_active', '1');
	$this->db->group_by('bulanrealisasi', $this->order);
	//return $this->db->get($this->tablereal)->row();
    return $this->db->get($this->tablereal)->result();
  }
  
  function get_jml_produksi_user($id)
  {
    $this->db->select("DATE_FORMAT(STR_TO_DATE(tgl_produksi, '%m/%d/%Y'), '%m') as bulanproduksi, sum(jml_produksi) as jmlproduksi");
    $this->db->where('is_delete', '0');
	$this->db->where('is_active', '1');
	$this->db->where('id_users', $id);
	$this->db->group_by('bulanproduksi', $this->order);
	//return $this->db->get($this->tablereal)->row();
    return $this->db->get($this->tablepro)->result();
  }
  
  function get_jml_realisasi_user($id)
  {
    $this->db->select("DATE_FORMAT(STR_TO_DATE(tgl_realisasi_tanam, '%m/%d/%Y'), '%m') as bulanrealisasi, sum(luas_realisasi_tanam) as jmltanam");
    $this->db->where('is_delete', '0');
	$this->db->where('is_active', '1');
	$this->db->where('id_users', $id);
	$this->db->group_by('bulanrealisasi', $this->order);
	//return $this->db->get($this->tablereal)->row();
    return $this->db->get($this->tablereal)->result();
  }
  
  function get_target_tanam_user($id)
  {
    $this->db->select('beban_tanam');
    $this->db->where('is_delete', '0');
	$this->db->where('id_users', $id);
	return $this->db->get($this->tableriph)->row();
    //return $this->db->get($this->tableriph)->result();
  }
  
  function get_target_produksi_user($id)
  {
    $this->db->select('beban_produksi');
    $this->db->where('is_delete', '0');
	$this->db->where('id_users', $id);
	return $this->db->get($this->tableriph)->row();
    //return $this->db->get($this->tableriph)->result();
  }
  
  function get_jml_cpcl_verifikasi_admin()
  {
    $this->db->select('count(is_verifikasi) as jml_verifikasi');
    $this->db->where('is_delete', '0');
	$this->db->where('is_verifikasi', '1');
	return $this->db->get($this->tablecpcl)->row();
    //return $this->db->get($this->tablecpcl)->result();
  }
  function get_jml_cpcl_blverifikasi_admin()
  {
    $this->db->select('count(is_verifikasi) as jml_verifikasi');
    $this->db->where('is_delete', '0');
	$this->db->where('is_verifikasi', '0');
	return $this->db->get($this->tablecpcl)->row();
    //return $this->db->get($this->tablecpcl)->result();
  }
  function get_jml_realisasi_verifikasi_admin()
  {
    $this->db->select('count(is_verifikasi) as jml_verifikasi');
    $this->db->where('is_delete', '0');
	$this->db->where('is_verifikasi', '1');
	return $this->db->get($this->tablereal)->row();
    //return $this->db->get($this->tablereal)->result();
  }
  function get_jml_realisasi_blverifikasi_admin()
  {
    $this->db->select('count(is_verifikasi) as jml_verifikasi');
    $this->db->where('is_delete', '0');
	$this->db->where('is_verifikasi', '0');
	return $this->db->get($this->tablereal)->row();
    //return $this->db->get($this->tablereal)->result();
  }
  function get_jml_produksi_verifikasi_admin()
  {
    $this->db->select('count(is_verifikasi) as jml_verifikasi');
    $this->db->where('is_delete', '0');
	$this->db->where('is_verifikasi', '1');
	return $this->db->get($this->tablepro)->row();
    //return $this->db->get($this->tablepro)->result();
  }
  function get_jml_produksi_blverifikasi_admin()
  {
    $this->db->select('count(is_verifikasi) as jml_verifikasi');
    $this->db->where('is_delete', '0');
	$this->db->where('is_verifikasi', '0');
	return $this->db->get($this->tablepro)->row();
    //return $this->db->get($this->tablepro)->result();
  }

}
