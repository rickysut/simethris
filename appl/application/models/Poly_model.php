<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poly_model extends CI_Model{

  public function __construct()
  {
	  $this->load->database();
  }

  function get_all_poly()
  {
    $data = $this->db->query("SELECT * from query_polygon_user");
	return $data->result();
  }

	function get_all_pagu_kp()
  {
    $data = $this->db->query("SELECT * from pagu_all_satker WHERE kode='KP'");
	return $data->result();
  }
  
  function get_all_pagu_dk()
  {
    $data = $this->db->query("SELECT * from pagu_all_satker WHERE kode='DK' AND lokasi Like '19%'");
	return $data->result();
  }
  
  function get_all_pagu_tpprov()
  {
    $data = $this->db->query("SELECT * from pagu_all_satker WHERE kode='TP' AND tingkat='Provinsi' AND lokasi Like '19%'");
	return $data->result();
  }
  
  function get_all_pagu_tpkab()
  {
    $data = $this->db->query("SELECT * from pagu_all_satker WHERE kode='TP' AND tingkat='Kabupaten' AND lokasi Like '19%'");
	return $data->result();
  }

	function get_pagu_satker()
  {
    $data = $this->db->query("SELECT * from view_pagu_satker");
	return $data->result();
  }
}
