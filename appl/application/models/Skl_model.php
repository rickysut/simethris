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
    return $this->db->get($this->table)->result();
  }
}
