<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajuriph_model extends CI_Model{

  public $table = 'mst_riph';
  public $view = 'view_verifikasi_riph';
  public $viewcp = 'view_company';
  public $id    = 'id_users';
  public $idriph = 'id_mst_riph';
  public $noriph = 'nomor_riph';
  public $order = 'DESC';

  function get_all_riph_id($id)
  {
	$this->db->where('mst_riph.id_users', $id);
    return $this->db->get($this->table)->result();
  }
  
  function get_by_id($idriph)
  {
	$this->db->where('mst_riph.id_mst_riph', $idriph);
    return $this->db->get($this->table)->row();
  }
  
  function get_all_riph_dy_iduser($id, $thn='0')
  {
    $this->db->where('view_company.id_users', $id);
    if ($thn && ($thn!='0') && ($thn!='index')) {
      $this->db->where('right(view_company.nomor_riph,4) = ', $thn);
    }
    $this->db->group_by('view_company.id_users');
    return $this->db->get($this->viewcp)->result();
  }
  
  function get_all_riph_active_id($id)
  {
    $this->db->where('mst_riph.is_active', '1');
    $this->db->where('mst_riph.id_users', $id);
    return $this->db->get($this->table)->row();
  }

  function get_all_jumlah()
  {
	$this->db->select('sum(v_pengajuan_riph) as jmlpengajuan, sum(beban_produksi) as jmltargetproduksi,sum(beban_tanam) as jmltargettanam, count(no_riph) as jmlriph');
    $this->db->where('mst_riph.is_active', '1');
    return $this->db->get($this->table)->row();
  }
  
  function get_jumlah_riph_byno($noriph)
  {
	$this->db->select('sum(v_pengajuan_riph) as jmlpengajuan, sum(beban_produksi) as jmltargetproduksi,sum(beban_tanam) as jmltargettanam, count(no_riph) as jmlriph');
    $this->db->where('mst_riph.nomor_riph', $noriph);
	$this->db->where('mst_riph.is_active', '1');
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

  function update($idriph, $data)
  {
	$this->db->where('mst_riph.id_mst_riph', $idriph);
    $this->db->update($this->table, $data);
  }
}
