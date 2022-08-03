<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riph_model extends CI_Model{

  public $table = 'riph';
  public $id    = 'id_riph';
  public $noriph    = 'no_riph';
  public $order = 'DESC';

  function get_all_riph()
  {
    $this->db->where('riph.is_active', '1');
    $this->db->order_by('riph.nama_perusahaan', $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_combobox()
  {
    $this->db->order_by('name');
    $data = $this->db->get($this->table);

    if($data->num_rows() > 0)
    {
      foreach($data->result_array() as $row)
      {
        $result[''] = '- Please Choose Users';
        $result[$row['id_users']] = $row['name'];
      }
      return $result;
    }
  }

  function get_all_jumlah()
  {
	$this->db->select('sum(v_pengajuan) as jmlpengajuan, sum(target_produksi) as jmltargetproduksi,sum(target_tanam) as jmltargettanam, count(nama_perusahaan) as jmlperusahaan');
    $this->db->where('riph.is_active', '1');
    return $this->db->get($this->table)->row();
  }
  
  function get_jumlah_riph_byno($noriph)
  {
	$this->db->select('sum(v_pengajuan) as jmlpengajuan, sum(target_produksi) as jmltargetproduksi,sum(target_tanam) as jmltargettanam, count(nama_perusahaan) as jmlperusahaan');
    $this->db->where('riph.no_riph', $noriph);
	$this->db->where('riph.is_active', '1');
    return $this->db->get($this->table)->row();
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

  function update($idr, $data)
  {
	$this->db->where($this->idr, $idr);
    $this->db->update($this->table, $data);
  }

  function get_access_read()
  {
    $this->db->select('id_users, data_access_id');
    $this->db->join('users_data_access', 'users.id_users = users_data_access.user_id', 'left');
    $this->db->where('id_users', $this->session->id_users);
    $this->db->where('data_access_id', '1');
    return $this->db->get($this->table)->row();
  }

  function get_access_create()
  {
    $this->db->select('id_users, data_access_id');
    $this->db->join('users_data_access', 'users.id_users = users_data_access.user_id', 'left');
    $this->db->where('id_users', $this->session->id_users);
    $this->db->where('data_access_id', '2');
    return $this->db->get($this->table)->row();
  }

  function get_access_update()
  {
    $this->db->select('id_users, data_access_id');
    $this->db->join('users_data_access', 'users.id_users = users_data_access.user_id', 'left');
    $this->db->where('id_users', $this->session->id_users);
    $this->db->where('data_access_id', '3');
    return $this->db->get($this->table)->row();
  }

  function get_access_delete()
  {
    $this->db->select('id_users, data_access_id');
    $this->db->join('users_data_access', 'users.id_users = users_data_access.user_id', 'left');
    $this->db->where('id_users', $this->session->id_users);
    $this->db->where('data_access_id', '4');
    return $this->db->get($this->table)->row();
  }

  function get_access_restore()
  {
    $this->db->select('id_users, data_access_id');
    $this->db->join('users_data_access', 'users.id_users = users_data_access.user_id', 'left');
    $this->db->where('id_users', $this->session->id_users);
    $this->db->where('data_access_id', '5');
    return $this->db->get($this->table)->row();
  }

  // login attempt
  function get_total_login_attempts_per_user($id)
  {
    $this->db->where('username', $id);
    return $this->db->get('login_attempts')->num_rows();
  }

  function insert_login_attempt($data)
  {
    $this->db->insert('login_attempts', $data);
  }

  function clear_login_attempt($id)
  {
    $this->db->where('username', $id);
    $this->db->delete('login_attempts');
  }

}
