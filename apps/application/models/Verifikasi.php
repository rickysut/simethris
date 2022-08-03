<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Model{

  public $table = 'verifikasi';
  public $idv    = 'id_verifikasi';
  public $id    = 'id_users';
  public $order = 'DESC';

  function get_all_verifikasi()
  {
    $this->db->group_by('jenis_verifikasi');
	$this->db->order_by('id_users', $this->order);
    return $this->db->get($this->table)->result();
  }
  
  function get_all_verifikasi_by_iduser($id)
  {
	$this->db->where('id_users', $id);
    $this->db->group_by('jenis_verifikasi');
    return $this->db->get($this->table)->result();
  }
  
  function get_by_id($idv)
  {
    $this->db->where($this->id_verifikasi, $idv);
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

  function update($idv,$data)
  {
    $this->db->where($this->id_verifikasi, $idv);
    $this->db->update($this->table, $data);
  }
}