<?php

Class user_login extends CI_Model {

	// Read data using username and password
	public function login($data) {
		$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	// Read data from database to show data in admin page
	public function read_user_information($username) {
		$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function update_password($data){
		//print_r($data);die;
		$update_data = array(
			'user_password' => $data['password']
		);
		$this->db->where('id',$data['user_id']);
		
		if($this->db->update('user_login',$update_data)){
			return true;
		} else {
			return false;
		}
	}

}

?>