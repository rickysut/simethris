<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riph_model extends CI_Model{

  public $table = 'mst_riph';
  public $table2 = 'riph_admin';
  public $id    = 'id_riph';
  public $order = 'DESC';

  function get_all_riph_admin_dasboard($thn)
  {
	  $this->db->select('sum(v_pengajuan_import) as v_pengajuan_import, sum(v_beban_tanam) as v_beban_tanam, sum(v_beban_produksi) as v_beban_produksi, sum(jml_importir) as jml_importir');
    if ($thn && ($thn!='0') && ($thn!='index') ) {
      $this->db->where('periode', $thn); 
    }
    $this->db->order_by('tanggal', 'DESC');
    return $this->db->get($this->table2)->row();
  }
  
  function get_all_riph_admin()
  {
    
    $this->db->order_by('riph_admin.tanggal', 'DESC');
    return $this->db->get($this->table2)->result();
  }
  
  function get_all_riph()
  {
    $this->db->where('mst_riph.is_active', '1');
    $this->db->order_by('mst_riph.username', $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_riph_by_user($userid)
  {
    $this->db->where('mst_riph.is_active', '1');
    $this->db->where('mst_riph.id_users', $userid);
    $this->db->order_by('mst_riph.id_mst_riph', 'ASC');
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
  
  function get_jml_perusahaan()
  {
	$this->db->select('count(id_users) as jmlpengajuan');
    $this->db->where('mst_riph.is_active', '1');
    return $this->db->get($this->table)->row();
  }

  function get_all_jumlah()
  {
	$this->db->select('sum(v_pengajuan_riph) as jmlpengajuan, sum(beban_produksi) as jmltargetproduksi,sum(beban_tanam) as jmltargettanam, count(id_users) as jmlperusahaan');
    $this->db->where('mst_riph.is_active', '1');
    return $this->db->get($this->table)->row();
  }
  
  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

  function admin_get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table2)->row();
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
  
  function insertadmin($data)
  {
    $this->db->insert($this->table2, $data);
  }

  function updateadmin($idr, $data)
  {
	  $this->db->where('id_riph', $idr);
    $this->db->update($this->table2, $data);
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

  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table2);
  }

  function getNomorRiph($userid, $mstid)
  {
    $this->db->select('nomor_riph');
    $this->db->where('mst_riph.is_active', '1');
    $this->db->where('mst_riph.id_users', $userid);
    $this->db->where('mst_riph.id_mst_riph', $mstid);
    return $this->db->get($this->table)->row();

  }

}
