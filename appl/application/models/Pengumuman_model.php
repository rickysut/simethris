<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_model extends CI_Model{

  public $table = 'pengumuman';
  public $id    = 'id';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->order_by('tanggal', $this->order);
    return $this->db->get($this->table)->result();
  }
  
  function get_all_active()
  {
    $this->db->where('is_active', '1');
    $this->db->order_by('tanggal', $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  function update($id,$data)
  {
    $this->db->where($this->id, $id);
    $this->db->update($this->table, $data);
  }

  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }

}
