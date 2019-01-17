<?php

Class All_happenings extends CI_Model {
	function __construct() 
    {
      parent::__construct();
    }
	// Read data using username and password
	public function important_days($limit,$start) {
		//echo $start;
		$this->db->limit($limit, $start);
		$query = $this->db->get("important_days");
		//echo "<pre>";
		//print_r($query);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	public function monthly_important_days_count() {
		return $this->db->count_all("important_days");
	}
	
	
	// Read data using username and password
	public function edit_important_days($id) {
		//echo $id."----";
		$condition = "important_days_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('important_days');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		//print_r($query);
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}
	}

	// Insert data to database
	public function add_important_days($data) {
		//print_r($data);die;
		$insert_data = array(
			'title' => $data['title'],
			'date' => date("Y-m-d", strtotime($data['date'])),
			'description' => $data['description']
		);
		if ($this->db->insert('important_days', $insert_data)) {
			return true;
		} else {
			return false;
		}
	}
	
	// Read data from database to show data in admin page
	public function delete_monthly_important_day($id) {		
		$this->db->where('important_days_id', $id);
		if ($this->db->delete('important_days')) {
			return true;
		} else {
			return false;
		}
	}
	
	public function update_monthly_important_days($data){
		//echo "<pre>";print_r($data);die;
		$update_data = array(
			'title' => $data['title'],
			'date' => date("Y-m-d", strtotime($data['date'])),
			'description' => $data['description'],
			'status' => $data['status']
		);
		$this->db->where('important_days_id',$data['important_days_id']);
		
		if($this->db->update('important_days',$update_data)){
			return true;
		} else {
			return false;
		}
	}

	public function get_important_days() {
		$this->db->where('status',1);
		$query = $this->db->get("important_days");
		//echo "<pre>";
		//print_r($query);
		if ($query->num_rows() > 0) {
			$data = $query->result();
			$response = array(
				'status' => 1,
				'data' => $data
			);
			return $response;
		} else {
			$response = array(
				'status' => 0,
				'data' => ''
			);
			return $response;
		}
	}

	public function get_important_day($id) {
		$this->db->where('important_days_id',$id);
		$query = $this->db->get("important_days");
		//echo "<pre>";
		//print_r($query);
		if ($query->num_rows() > 0) {
			$data = $query->result();
			$response = array(
				'status' => 1,
				'data' => $data
			);
			return $response;
		} else {
			$response = array(
				'status' => 0,
				'data' => ''
			);
			return $response;
		}
	}

}

?>