<?php 
class Model_lokasi_tanam extends CI_Model {
    function __construct(){
        parent::__construct();
    }
    function GetLokasi(){
        $return = array();
        $this->db->select("id_users,id_petani,luas_lahan,photo,latitude,atitude");
        $this->db->from("tanam");
        //$this->db->where('status_realisasi',1);
        $query = $this->db->get();
        if ($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                array_push($return, $row);
            }
        }
        return $return;
    }
    function GetDetailLokasi(){
    $return = array();
         $return = array();
        $this->db->select("id,nama,alamat,foto,latitude,longitude");
        $this->db->from("t_penjahit");
        $query = $this->db->get();
        if ($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                array_push($return, $row);
            }
        }
        return $return;
    }
    public function Update($table, $data, $where){
        $res = $this->db->update($table, $data, $where); 
        return $res;
    }
}