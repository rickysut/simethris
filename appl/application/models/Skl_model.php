<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skl_model extends CI_Model
{

  public $table = 'tbl_skl';
  public $id    = 'id_skl';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->select('tbl_skl.*');
    $this->db->where('is_delete', '0');
    return $this->db->get($this->table)->result();
  }

  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  function soft_delete($id_skl,$data)
  {
    $this->db->where('id_skl', $id_skl);
    $this->db->update($this->table, $data);
  }

  function get_by_id($id_skl)
  {
    $this->db->where('id_skl', $id_skl);
    return $this->db->get($this->table)->row();
  }

  function update($id_skl, $data)
  {
	  $this->db->where('id_skl', $id_skl);
    $this->db->update($this->table, $data);
  }
}
