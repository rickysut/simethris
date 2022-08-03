<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_files extends CI_Model{

  public $table = 'tbl_files';
  public $table2 = 'users';
  public $id    = 'id_users';
  public $idr    = 'id_realisasi';
  public $username  = 'username';
  public $idf   = 'file_id';
  public $order = 'DESC';

	function get_all_files(){
		$this->db->select('file_id,id_users,usertype,file_judul,file_deskripsi,DATE_FORMAT(file_tanggal,"%d/%m/%Y") AS tanggal,file_oleh,file_download,file_type,file_data,file_thumb');
		$this->db->where('is_delete', '0');
		$this->db->order_by('file_id', $this->order);
		return $this->db->get($this->table)->result();
	}
	
	function get_all_files_by_user(){
		$this->db->select('tbl_files.file_id,tbl_files.id_users,tbl_files.usertype,tbl_files.file_judul,tbl_files.file_deskripsi,DATE_FORMAT(tbl_files.file_tanggal,"%d/%m/%Y") AS tanggal,tbl_files.file_oleh,tbl_files.file_download,tbl_files.file_type,tbl_files.file_data,tbl_files.file_thumb,users.nama_perusahaan');
		$this->db->join('users', 'users.id_users = tbl_files.id_users');
		$this->db->where('tbl_files.usertype', '3');
		$this->db->where('tbl_files.is_delete', '0');
		$this->db->order_by('tbl_files.file_id', $this->order);
		return $this->db->get($this->table)->result();
	}
	
	function get_all_files_sk_by_user(){
		$this->db->select('users.id_users,users.usertype,users.name,users.nama_perusahaan,users.file_sk');
		$this->db->where('users.usertype', '3');
		$this->db->where('users.is_delete', '0');
		$this->db->where('users.file_sk is NOT NULL', NULL, FALSE);
		$this->db->order_by('users.id_users', $this->order);
		return $this->db->get($this->table2)->result();
	}
	
	function get_all_files_ktp_by_user(){
		$this->db->select('users.id_users,users.usertype,users.name,users.nama_perusahaan,users.file_ktp');
		$this->db->where('users.usertype', '3');
		$this->db->where('users.is_delete', '0');
		$this->db->where('users.file_ktp is NOT NULL', NULL, FALSE);
		$this->db->order_by('users.id_users', $this->order);
		return $this->db->get($this->table2)->result();
	}
	
	function get_all_files_by_admin(){
		$this->db->select('file_id,id_users,usertype,file_judul,file_deskripsi,DATE_FORMAT(file_tanggal,"%d/%m/%Y") AS tanggal,file_oleh,file_download,file_type,file_data,file_thumb');
		$this->db->where('is_delete', '0');
		$this->db->where("(usertype='1' OR usertype='2')");
		$this->db->order_by('file_id', $this->order);
		return $this->db->get($this->table)->result();
	}
	
	function get_by_username($id)
	{
		$this->db->select('file_id,id_users,file_judul,file_deskripsi,DATE_FORMAT(file_tanggal,"%d/%m/%Y") AS tanggal,file_oleh,file_download,file_type,file_data,file_thumb');
		$this->db->where('id_users', $id);
		$this->db->where('is_delete', '0');
		return $this->db->get($this->table)->result();
		//return $this->db->get($this->table)->row();
	}
	
	function get_by_fileid($idf)
	{
		$this->db->where('file_id', $idf);
		$this->db->where('is_delete', '0');
		//return $this->db->get($this->table)->result();
		return $this->db->get($this->table)->row();
	}
	
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}
	
	function update($idf,$data)
	{
		$this->db->where($this->idf, $idf);
		$this->db->update($this->table, $data);
	}
	
	function soft_delete($idf,$data)
	{	
		$this->db->where($this->idf, $idf);
		$this->db->update($this->table, $data);
	}

	function delete($idf)
	{
		$this->db->where($this->idf, $idf);
		$this->db->delete($this->table);
	}
	
	function get_file_byid_download($idf){
		$hsl=$this->db->query("SELECT file_id,file_judul,file_deskripsi,DATE_FORMAT(file_tanggal,'%d/%m/%Y') AS tanggal,file_oleh,file_download,file_data FROM tbl_files WHERE file_id='$idf'");
		return $hsl;
	}
	
	function get_by_id($idf)
  {
    $this->db->where($this->idf, $idf);
	$this->db->where('is_delete', '0');
    return $this->db->get($this->table)->row();
	//return $this->db->get($this->table)->result();
  }
  
  public function getRows($id,$idr){
		$cari = 'realisasi_'.$idr;
        $this->db->select('file_id,file_judul,file_deskripsi,file_data,file_tanggal');
		$this->db->where('id_users',$id);
		$this->db->like('file_data',$cari,'both');
		return $this->db->get($this->table)->result_array();
    }    
	
	public function getRows_verifikator($id,$idr){
		$cari = 'realisasi_'.$idr;
        $this->db->select('file_id,file_judul,file_deskripsi,file_data,file_tanggal');
		$this->db->like('file_data',$cari,'both');
		return $this->db->get($this->table)->result_array();
    }   

  public function getRowsProduksi($id,$idr){
		$cari = 'produksi_'.$idr;
        $this->db->select('file_id,file_judul,file_deskripsi,file_data,file_tanggal');
		$this->db->where('id_users',$id);
		$this->db->like('file_data',$cari,'both');
		return $this->db->get($this->table)->result_array();
    }   

	public function getRowsProduksi_verifikator($id,$idr){
		$cari = $idr.'_produksi';
        $this->db->select('file_id,file_judul,file_deskripsi,file_data,file_tanggal');
		$this->db->like('file_data',$cari,'both');
		return $this->db->get($this->table)->result_array();
    }    	
	
    public function insertBatch($data = array()){
        $insert = $this->db->insert_batch('tbl_files',$data);
        return $insert?true:false;
    }    
}