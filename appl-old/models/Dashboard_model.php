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
  public $dashboard = 'view_dashboard';
  public $vbeban = 'view_chart_beban';
  public $vrealiasi = 'view_chart_realisasi';
  public $vproduksi = 'view_chart_produksi';
  public $vverif = 'view_chart_verif';
  public $vunverif = 'view_chart_unverif';
  public $vtstep = 'view_table_step';
  public $order = 'DESC';
  
  function get_beban($filterna)
  {
    $this->db->select('bebantanam,bebanproduksi');
    $this->db->where('mingguke <=', $filterna);
	//return $this->db->get($this->vbeban)->row();
    return $this->db->get($this->vbeban)->result();
  }
  
  function get_beban_users($id)
  {
    $this->db->select('sum(mst_riph.beban_tanam) AS bebantanam,sum(mst_riph.beban_produksi) AS bebanproduksi');
    $this->db->where('id_users', $id);
    $this->db->where('is_active', 1);
	//return $this->db->get($this->vbeban)->row();
    return $this->db->get($this->tableriph)->result();
  }
  
  function get_produksi($filterna)
  {
    $this->db->select('mingguke,sum(jmlproduksi) as jumlah_produksi');
    $this->db->where('mingguke', $filterna);
	$this->db->group_by('mingguke');
	//return $this->db->get($this->vproduksi)->row();
    return $this->db->get($this->vproduksi)->result();
  }
  
  function get_produksi_users($filterna, $id)
  {
    $this->db->select('yearweek(produksi.tgl_produksi,0) AS mingguke, sum(produksi.jml_produksi) AS jumlah_produksi');
    $this->db->where('yearweek(produksi.tgl_produksi)', $filterna);
    $this->db->where('is_active', 1);
    $this->db->where('id_users', $id);
	$this->db->group_by("mingguke");
	//return $this->db->get($this->vproduksi)->row();
    return $this->db->get($this->tablepro)->result();
  }
  
  function get_realisasi($filterna)
  {
    $this->db->select('mingguke,sum(jmltanam) as jumlah_realisasi');
    $this->db->where('mingguke', $filterna);
	$this->db->group_by('mingguke');
	//return $this->db->get($this->vrealiasi)->row();
    return $this->db->get($this->vrealiasi)->result();
  }
  
  function get_realisasi_users($filterna, $id)
  {
    $this->db->select('YEARWEEK(realisasi.tgl_realisasi_tanam) AS mingguke, SUM( realisasi.luas_realisasi_tanam ) AS jumlah_realisasi');
    $this->db->where('YEARWEEK(realisasi.tgl_realisasi_tanam)', $filterna);
    $this->db->where('is_active', 1);
    $this->db->where('id_users', $id);
	$this->db->group_by("mingguke");
	//return $this->db->get($this->vrealiasi)->row();
    return $this->db->get($this->tablereal)->result();
  }
  
  function get_unverif($filterna)
  {
    $this->db->select('mingguke,sum(jmlunverif) as jumlah_unverif');
    $this->db->where('mingguke <=', $filterna);
	$this->db->group_by('mingguke');
	//return $this->db->get($this->vunverif)->row();
    return $this->db->get($this->vunverif)->result();
  }
  
  function get_verif($filterna)
  {
    $this->db->select('mingguke,sum(jmlverif) as jumlah_verif');
    $this->db->where('mingguke <=', $filterna);
	$this->db->group_by('mingguke');
	//return $this->db->get($this->vverif)->row();
    return $this->db->get($this->vverif)->result();
  }
  
  function get_chart_realisasi($filterna)
  {
    $this->db->select('mingguke,harike,hari,sum(jmltanam) as jumlah_tanam');
    $this->db->where('mingguke', $filterna);
	$this->db->group_by('mingguke,harike,hari');
	//return $this->db->get($this->vrealiasi)->row();
    return $this->db->get($this->vrealiasi)->result();
  }
  
  function get_chart_realisasi_users($filterna,$id)
  {
    $this->db->select('YEARWEEK( realisasi.tgl_realisasi_tanam, 0 ) AS mingguke, 
	DAYOFWEEK( realisasi.tgl_realisasi_tanam ) AS harike, CONCAT( CASE DAYOFWEEK( realisasi.tgl_realisasi_tanam ) 
	WHEN 1 THEN "Min" WHEN 2 THEN "Sen" WHEN 3 THEN "Sel" WHEN 4 THEN "Rab" WHEN 5 THEN "Kam" WHEN 6 THEN "Jum" WHEN 7 THEN "Sab" END ) 
	AS hari, SUM( realisasi.luas_realisasi_tanam ) AS jumlah_tanam');
    $this->db->where('YEARWEEK(realisasi.tgl_realisasi_tanam)', $filterna);
    $this->db->where('is_active', 1);
    $this->db->where('id_users', $id);
	$this->db->group_by(array("mingguke", "harike","hari"));
	//return $this->db->get($this->vrealiasi)->row();
    return $this->db->get($this->tablereal)->result();
  }
  
  function get_chart_produksi($filterna)
  {
    $this->db->select('mingguke,harike,hari,sum(jmlproduksi) as jumlah_produksi');
    $this->db->where('mingguke', $filterna);
	$this->db->group_by('mingguke,harike,hari');
	//return $this->db->get($this->vproduksi)->row();
    return $this->db->get($this->vproduksi)->result();
  }
  
   function get_chart_produksi_users($filterna, $id)
  {
    $this->db->select('yearweek(produksi.tgl_produksi,0) AS mingguke,
	dayofweek(produksi.tgl_produksi) AS harike,concat(case dayofweek(produksi.tgl_produksi) when 1 then "Min" when 2 then "Sen" when 3 then "Sel" when 4 then "Rab" when 5 then "Kam" when 6 then "Jum" when 7 then "Sab" end) 
	AS hari,sum(produksi.jml_produksi) AS jumlah_produksi');
    $this->db->where('yearweek(produksi.tgl_produksi)', $filterna);
    $this->db->where('is_active', 1);
    $this->db->where('id_users', $id);
	$this->db->group_by(array("mingguke", "harike", "hari"));
	//return $this->db->get($this->vproduksi)->row();
    return $this->db->get($this->tablepro)->result();
  }
  
  function get_volume_import()
  {
    $this->db->select('sum(mst_riph.v_pengajuan_riph) as vimport');
    $this->db->where('mst_riph.is_delete', '0');
	return $this->db->get($this->tableriph)->row();
    //return $this->db->get($this->tableriph)->result();
  }
  
  function get_volume_import_user($id)
  {
    $this->db->select('sum(mst_riph.v_pengajuan_riph) as vimport');
    $this->db->where('mst_riph.is_delete', '0');
    $this->db->where('mst_riph.id_users', $id);
	return $this->db->get($this->tableriph)->row();
    //return $this->db->get($this->tableriph)->result();
  }
  
  function get_data_perusahaan()
  {
    $this->db->select('users.id_users,nama_perusahaan, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des, users.alamat, users.phone_number, users.name as nama_kontak, mst_riph.v_pengajuan_riph as volume');
	$this->db->join('wilayah_provinsi', 'users.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'users.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'users.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'users.desa = wilayah_desa.id');
	$this->db->join('mst_riph', 'users.id_users = mst_riph.id_users');
    $this->db->where('mst_riph.is_active', '1');
    $this->db->where('users.is_delete', '0');
	$this->db->where('users.is_active', '1');
	$this->db->where('users.usertype', '3');
	//return $this->db->get($this->tableuser)->row();
    return $this->db->get($this->tableuser)->result();
  }
  
  function rekap_data_perusahaan()
  {
    $this->db->select('*');
	//return $this->db->get($this->tableuser)->row();
    return $this->db->get($this->dashboard)->result();
  }

  function get_all_marker_realisasi($id)
  {
    $this->db->select('realisasi.*,if(realisasi.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, users.nama_perusahaan, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('users', 'realisasi.id_users = users.id_users');
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
  
  function get_all_cpcl_riph_dash()
  {
    $this->db->select('mst_riph.*, users.nama_perusahaan' );
	$this->db->join('users', 'mst_riph.id_users = users.id_users');
    $this->db->where('mst_riph.is_active', '1');
    return $this->db->get($this->tableriph)->result();
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
  
  function get_all_cpcl_adminc2()
  {
    return $this->db->get($this->vtstep)->result();
  }
  
  function get_all_cpclc2($id)
  {
    $this->db->where('id_users', $id);
	return $this->db->get($this->vtstep)->result();
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
    //return $this->db->get($this->tableuser)->result();
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
    $this->db->select('realisasi.*,if(realisasi.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, users.nama_perusahaan, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('users', 'realisasi.id_users = users.id_users');
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
	wilayah_kabupaten.nama as nama_kab, wilayah_kecamatan.nama as nama_kec, wilayah_desa.nama as nama_des, realisasi.luas_realisasi_tanam, realisasi.realisasi_polygon');
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
   $this->db->select('realisasi.*,if(realisasi.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, users.nama_perusahaan, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('users', 'realisasi.id_users = users.id_users');
	$this->db->join('wilayah_provinsi', 'realisasi.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'realisasi.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'realisasi.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'realisasi.desa = wilayah_desa.id');
    $this->db->where('realisasi.is_delete', '0');
	$this->db->where('realisasi.id_users', $id);
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
    //$this->db->select("DATE_FORMAT(STR_TO_DATE(tgl_produksi, '%m/%d/%Y'), '%m') as bulanproduksi, sum(jml_produksi) as jmlproduksi");
	$this->db->select("sum(jml_produksi) as jmlproduksi");
    $this->db->where('is_delete', '0');
	$this->db->where('is_active', '1');
	$this->db->where('id_users', $id);
	return $this->db->get($this->tablepro)->row();
    //return $this->db->get($this->tablepro)->result();
  }
  
  function get_jml_realisasi_user($id)
  {
    //$this->db->select("DATE_FORMAT(STR_TO_DATE(tgl_realisasi_tanam, '%m/%d/%Y'), '%m') as bulanrealisasi, sum(luas_realisasi_tanam) as jmltanam");
	$this->db->select("sum(luas_realisasi_tanam) as jmltanam");
    $this->db->where('is_delete', '0');
	$this->db->where('is_active', '1');
	$this->db->where('id_users', $id);
	//$this->db->group_by('bulanrealisasi', $this->order);
	return $this->db->get($this->tablereal)->row();
    //return $this->db->get($this->tablereal)->result();
  }
  
  function get_target_tanam_user($id)
  {
    $this->db->select('sum(beban_tanam) as jmlbeban');
    $this->db->where('is_delete', '0');
	$this->db->where('id_users', $id);
	return $this->db->get($this->tableriph)->row();
    //return $this->db->get($this->tableuser)->result();
  }
  
  function get_target_produksi_user($id)
  {
    $this->db->select('sum(beban_produksi) as jmlbeban');
    $this->db->where('is_delete', '0');
	$this->db->where('id_users', $id);
	return $this->db->get($this->tableriph)->row();
    //return $this->db->get($this->tableuser)->result();
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
