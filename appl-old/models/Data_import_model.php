<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class Data_import_model extends CI_Model {
		public $table = 'view_detail_import';
		public $table2 = 'view_import_terbesar';
		public $table3 = 'view_selisih_produksi';
		public $table4 = 'view_surplus_produksi';
		public $table5 = 'cpcl';
		public $table6 = 'realisasi';
		public $id    = 'id';
		public $order = 'desc limit 1';
		function __construct() {
			parent::__construct();
		}
		
		function get_detail_perusahaan($id)
		  {
			$this->db->select('id_users,nomor_riph,nama_perusahaan,tgl_mulai_berlaku, tgl_akhir_berlaku, volume, kewajiban_tanam, luas_tanam, selisih_tanam, kewajiban_produksi, jmlproduksi, selisih_produksi, concat(nama_prov,"-",nama_kab) as alamat');
			$this->db->where('id_users', $id);
			return $this->db->get($this->table)->row();
		  }
		
		function get_import_terbesar()
		  {
			$this->db->select('id_users,nama_perusahaan,concat(nama_prov,"-",nama_kab) as alamat,volume');
			return $this->db->get($this->table2)->row();
		  }
		  
		function get_selisih_produksi()
		  {
			$this->db->select('id_users,nama_perusahaan,concat(nama_prov,"-",nama_kab) as alamat,selisih_produksi');
			return $this->db->get($this->table3)->row();
		  }
		
		function get_surplus_produksi()
		  {
			$this->db->select('id_users,nama_perusahaan,concat(nama_prov,"-",nama_kab) as alamat,selisih_produksi');
			return $this->db->get($this->table4)->row();
		  }
		  
		function get_all_cpcl_by_iduser($id)
		  {
			$this->db->select('cpcl.id_cpcl, cpcl.tgl_rencana_tanam, cpcl.nama_pelaksana, cpcl.is_active, cpcl.is_verifikasi, if(cpcl.type_pelaksana=2, "Swakelola", "Kemitraan") as namapengelola, 
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
			$this->db->where('cpcl.is_active', '1');
			$this->db->where('cpcl.id_users', $id);
			return $this->db->get($this->table5)->result();
		  }
		
		function get_all_realisasi_by_iduser($id)
		  {
			$this->db->select('realisasi.*,if(realisasi.type_pelaksana=2,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
			  wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
			$this->db->join('wilayah_provinsi', 'realisasi.provinsi = wilayah_provinsi.id');
			$this->db->join('wilayah_kabupaten', 'realisasi.kabupaten = wilayah_kabupaten.id');
			$this->db->join('wilayah_kecamatan', 'realisasi.kecamatan = wilayah_kecamatan.id');
			$this->db->join('wilayah_desa', 'realisasi.desa = wilayah_desa.id');
			$this->db->where('realisasi.is_delete', '0');
			$this->db->where('realisasi.id_users', $id);
			$this->db->order_by('realisasi.id_cpcl', $this->order);
			//return $this->db->get($this->table6)->row();
			return $this->db->get($this->table6)->result();
		  }
	}
?>
