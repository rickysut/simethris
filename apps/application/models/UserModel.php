<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserModel extends CI_Model {
  	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
	private $User = 'users';

  	public function GetUserData()
	{  
 		$this->db->select('id_users,name,email,phone,address,nama_perusahaan');
		$this->db->from($this->User);
		$this->db->where("id_users",$this->session->userdata['id_users']);
		$this->db->limit(1);
  		$query = $this->db->get();
 		if ($query) {
			 return $query->row_array();
		 } else {
			 return false;
		 }
   	}

	public function IfExistEmail($email){
		 $this->db->select('id_users, email'); 
		 $this->db->from($this->User);
		 $this->db->where('email', $email);
		 $query = $this->db->get();
		 if ($query->num_rows() != 0) {
			  return $query->row_array();
		 } else {
			 return false;
		 }
	}

	public function PictureUrl()
	{  
 		$this->db->select('id_users,photo');
		$this->db->from($this->User);
		$this->db->where("id_users",$this->session->userdata['id_users']);
		$this->db->limit(1);
  		$query = $this->db->get();
		$res = $query->row_array();
		if(!empty($res['photo'])){
			return base_url('uploads/user/'.$res['photo']);
		}else{
			return base_url('public/images/user-icon.jpg');
		}
   	}

	public function PictureUrlById($id)
	{  
 		$this->db->select('id_users,photo');
		$this->db->from($this->User);
		$this->db->where("id_users",$id);
		$this->db->limit(1);
  		$query = $this->db->get();
		$res = $query->row_array();
		if(!empty($res['photo'])){
			return base_url('uploads/user/'.$res['photo']);
		}else{
			return base_url('public/images/user-icon.jpg');
		}
   	}

	public function GetName($id)
	{  
 		$this->db->select('id_users,name');
		$this->db->from($this->User);
		$this->db->where("id_users",$id);
		$this->db->limit(1);
  		$query = $this->db->get();
		$res = $query->row_array();
 		return $res['name'];
  	}

	public function GetIDByName($name)
	{  
 		$this->db->select('id_users,name');
		$this->db->from($this->User);
		$this->db->where("name",$name);
		$this->db->limit(1);
  		$query = $this->db->get();
		$res = $query->row_array();
 		return $res['id'];
   	}
	
	public function GetUserAddress($id)
	{  
 		$this->db->select('id_users,email,phone,address,nama_perusahaan');
		$this->db->from($this->User);
		$this->db->where("id",$id);
		$this->db->limit(1);
  		$query = $this->db->get();
		$res = $query->row_array();
 		return $res;
  	}

	public function UpdateProfileImageByID($data)
	{  
 		$res = $this->db->update($this->User, $data ,['id_users' => $this->session->userdata['id_users']]); 
		if($res == 1)
			return true;
		else
			return false;
 	}

	public function UpdateCustomerProfileImageByID($data)
	{  
 		$res = $this->db->update($this->User, $data ,['id_users' => $this->session->userdata['id_users']]); 
		if($res == 1)
			return true;
		else
			return false;
 	}

	 public function GetUserDataById($id) 
	{  
 		$this->db->select('id_users,name,address,phone,nama_perusahaan,photo,photo_thumb');
		$this->db->from($this->User);
		$this->db->where("id_users",$id);
		$this->db->limit(1);
  		$query = $this->db->get();
 		if ($query) {
			 return $query->row_array();
		 } else {
			 return false;
		 }
   	}

	public function GetMemberNameById($id) 
	{  
 		$this->db->select('id_users,name');
		$this->db->from($this->User);
		$this->db->where("id_users",$id);
		$this->db->limit(1);
  		$query = $this->db->get();
 		$u=$query->row_array();
		return $u['name'];
 	}

	public function AddMember($data)
	{  
		$res = $this->db->insert($this->User,$data);
		if($res == 1)
			return $this->db->insert_id();
		else
			return false;	
  	}

	public function StatusUpdateByID($user_id,$status)
	{  
 		$res = $this->db->update($this->User,['is_online' => $status],['id_users' => $user_id ] ); 
		if($res == 1)
			return true;
		else
			return false;
 	}

	public function TrashByID($user_id)
	{  
 		$res = $this->db->delete($this->User,['id_users' => $user_id ] ); 
		if($res == 1)
			return true;
		else
			return false;
 	}

 	public function AllRoleTypes($role) 
	{  
 		$this->db->select('id_users,name');
		$this->db->from($this->User);
		$this->db->where("usertype",$role);
   		$query = $this->db->get();
 		$u=$query->num_rows();
		return $u;
   	}

	public function VendorsList() 
	{  
 		$this->db->select('id_users,name,photo,is_online');
		$this->db->from($this->User);
		$this->db->where("usertype","2");
		$this->db->where("is_active","1");
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
   	}

	public function ClientsListCs() 
	{  
 		$this->db->select('id_users,name,photo');
		$this->db->from($this->User);
		$this->db->where("usertype","3");
		$this->db->where("is_active","1");
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
   	}
 }

