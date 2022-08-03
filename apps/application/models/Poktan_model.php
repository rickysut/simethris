<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poktan_model extends CI_Model{

  public $table = 'poktan';
  public $id    = 'id_poktan';
  public $order = 'DESC';

  function get_all()
  {
	$this->db->select('poktan.*,wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'poktan.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'poktan.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'poktan.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'poktan.desa = wilayah_desa.id');
    $this->db->where('is_delete', '0');
    $this->db->order_by('nama_poktan', $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_combobox()
  {
    $this->db->order_by('nama_poktan');
    $data = $this->db->get($this->table);

    if($data->num_rows() > 0)
    {
      foreach($data->result_array() as $row)
      {
        $result[''] = '- Please Choose Nama Poktan';
        $result[$row['id_poktan']] = $row['nama_poktan'];
      }
      return $result;
    }
  }

  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
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
