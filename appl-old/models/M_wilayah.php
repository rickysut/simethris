<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_wilayah extends CI_Model {
		public $table = 'wilayah_provinsi';
		public $table2 = 'wilayah_kabupaten';
		public $table3 = 'wilayah_kecamatan';
		public $table4 = 'wilayah_desa';
		public $id    = 'id';
		public $order = 'DESC';
		function __construct() {
			parent::__construct();
		}
		
		function get_all_provinsi() 
		{
			$this->db->order_by('nama');
			$data = $this->db->get($this->table);

			if($data->num_rows() > 0)
			{
			  foreach($data->result_array() as $row)
			  {
				$result[''] = '- Provinsi';
				$result[$row['id'].'|'.$row['lat'].'|'.$row['lng']] = $row['nama'];
			  }
			  return $result;
			}
		}
		
		function get_all_kabupaten() 
		{
			$this->db->order_by('nama');
			$data = $this->db->get($this->table2);

			if($data->num_rows() > 0)
			{
			  foreach($data->result_array() as $row)
			  {
				$result[''] = '- Kabupaten';
				$result[$row['id'].'|'.$row['lat'].'|'.$row['lng']] = $row['nama'];
			  }
			  return $result;
			}
		}
		
		function get_all_provinsi2() 
		{
			$this->db->order_by('nama');
			$data = $this->db->get($this->table);

			if($data->num_rows() > 0)
			{
			  foreach($data->result_array() as $row)
			  {
				$result[''] = '- Provinsi';
				$result[$row['id']] = $row['nama'];
			  }
			  return $result;
			}
		}
		
		function get_all_kabupaten2() 
		{
			$this->db->order_by('nama');
			$data = $this->db->get($this->table2);

			if($data->num_rows() > 0)
			{
			  foreach($data->result_array() as $row)
			  {
				$result[''] = '- Kabupaten';
				$result[$row['id']] = $row['nama'];
			  }
			  return $result;
			}
		}
		
		function get_all_kecamatan() 
		{
			$this->db->order_by('nama');
			$data = $this->db->get($this->table3);

			if($data->num_rows() > 0)
			{
			  foreach($data->result_array() as $row)
			  {
				$result[''] = '- Kecamatan';
				$result[$row['id']] = $row['nama'];
			  }
			  return $result;
			}
		}
		
		function get_all_desa() 
		{
			$this->db->order_by('nama');
			$data = $this->db->get($this->table4);

			if($data->num_rows() > 0)
			{
			  foreach($data->result_array() as $row)
			  {
				$result[''] = '- Desa';
				$result[$row['id']] = $row['nama'];
			  }
			  return $result;
			}
		}
				
	}
?>
