<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanam_model extends CI_Model{

  public $table = 'tanam';
  public $id    = 'id_users';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->select('tanam.*,if(tanam.id_pelaksana=1,"Swakelola","Kemitraan") as namapengelola, wilayah_provinsi.nama as nama_prov,wilayah_kabupaten.nama as nama_kab,
      wilayah_kecamatan.nama as nama_kec,wilayah_desa.nama as nama_des');
	$this->db->join('wilayah_provinsi', 'tanam.provinsi = wilayah_provinsi.id');
	$this->db->join('wilayah_kabupaten', 'tanam.kabupaten = wilayah_kabupaten.id');
	$this->db->join('wilayah_kecamatan', 'tanam.kecamatan = wilayah_kecamatan.id');
	$this->db->join('wilayah_desa', 'tanam.desa = wilayah_desa.id');
    $this->db->where('is_delete', '0');
    $this->db->order_by('id_perusahaan', $this->order);
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

  function get_all_deleted()
  {
    $this->db->join('usertype', 'users.usertype = usertype.id_usertype');
    $this->db->where('is_delete', '1');
    $this->db->order_by('name', $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

  function get_by_username($id)
  {
    $this->db->where('username', $id);
    return $this->db->get($this->table)->row();
  }

  function get_by_email($id)
  {
    $this->db->select('email');
    $this->db->where('email', $id);
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

  function update_by_email($id,$data)
  {
    $this->db->where('email', $id);
    $this->db->update($this->table, $data);
  }

  function get_by_code_forgotten($code)
  {
    $this->db->where('code_forgotten', $code);
    return $this->db->get($this->table);
  }

  function update_by_code_forgotten($id,$data)
  {
    $this->db->where('code_forgotten', $id);
    $this->db->update($this->table, $data);
  }

  function soft_delete($id,$data)
  {
    $this->db->where($this->id, $id);
    $this->db->update($this->table, $data);
  }

  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }

  function lock_account($id,$data)
  {
    $this->db->where('username', $id);
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
