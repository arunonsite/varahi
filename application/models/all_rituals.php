<?php

Class All_rituals extends CI_Model {
	function __construct(){
      parent::__construct();
    }

    // Read data using username and password
	public function daily_rituals($limit,$start) {
		//echo $start;
		$this->db->limit($limit, $start);
		$cur_date = date('Y-m-d');
		$condition = "date =" . "'" . $cur_date . "'";
		$this->db->where($condition);
		$query = $this->db->get("rituals");
		//echo "<pre>";
		//print_r($query);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function daily_rituals_count() {
		$cur_date = date('Y-m-d');
		//$condition = "date =" . "'" . $cur_date . "'";
		//$this->db->where($condition);

		$this->db->where('date',date('Y-m-d'));
		$this->db->from("rituals");
		return $this->db->count_all_results();

		//return $this->db->count_all("rituals");
	}


	// Read data using username and password
	public function edit_daily_ritual($id) {
		//echo $id."----";
		$condition = "ritual_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('rituals');
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
	public function add_daily_ritual($data) {
		//print_r($data);die;
		$insert_data = array(
			'title' => $data['title'],
			'date' => date("Y-m-d", strtotime($data['date'])),
			'description' => $data['description']
		);
		if ($this->db->insert('rituals', $insert_data)) {
			return true;
		} else {
			return false;
		}
	}
	
	// Read data from database to show data in admin page
	public function delete_daily_ritual($id) {		
		$this->db->where('ritual_id', $id);
		if ($this->db->delete('rituals')) {
			return true;
		} else {
			return false;
		}
	}
	
	public function update_daily_ritual($data){
		//echo "<pre>";print_r($data);die;
		$update_data = array(
			'title' => $data['title'],
			'date' => date("Y-m-d", strtotime($data['date'])),
			'description' => $data['description'],
			'status' => $data['status']
		);
		$this->db->where('ritual_id',$data['ritual_id']);
		
		if($this->db->update('rituals',$update_data)){
			return true;
		} else {
			return false;
		}
	}

	// Read data using username and password
	public function monthly_rituals($limit,$start) {
		//echo $start;
		$this->db->limit($limit, $start);
		$query = $this->db->get("rituals");
		//echo "<pre>";
		//print_r($query);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function monthly_rituals_count() {
		return $this->db->count_all("rituals");
	}	
	
	// Read data using username and password
	public function edit_monthly_ritual($id) {
		//echo $id."----";
		$condition = "ritual_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('rituals');
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
	public function add_monthly_ritual($data) {
		//print_r($data);die;
		$insert_data = array(
			'title' => $data['title'],
			'date' => date("Y-m-d", strtotime($data['date'])),
			'description' => $data['description']
		);
		if ($this->db->insert('rituals', $insert_data)) {
			return true;
		} else {
			return false;
		}
	}
	
	// Read data from database to show data in admin page
	public function delete_monthly_ritual($id) {		
		$this->db->where('ritual_id', $id);
		if ($this->db->delete('rituals')) {
			return true;
		} else {
			return false;
		}
	}
	
	public function update_monthly_ritual($data){
		//echo "<pre>";print_r($data);die;
		$update_data = array(
			'title' => $data['title'],
			'date' => date("Y-m-d", strtotime($data['date'])),
			'description' => $data['description'],
			'status' => $data['status']
		);
		$this->db->where('ritual_id',$data['ritual_id']);
		
		if($this->db->update('rituals',$update_data)){
			return true;
		} else {
			return false;
		}
	}

	public function get_daily_rituals() {
		$cur_date = date('Y-m-d');
		$condition = "date =" . "'" . $cur_date . "' AND status = 1";
		$this->db->where($condition);
		$query = $this->db->get("rituals");
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

	public function get_daily_ritual($id) {
		$this->db->where('ritual_id',$id);
		$query = $this->db->get("rituals");
		//echo "<pre>";
		//print_r($query);
		if ($query->num_rows() > 0) {
			$data = $query->result();
			$response = array(
				'status' => 1,
				'data' => $data
			);
			return $data;
		} else {
			$response = array(
				'status' => 0,
				'data' => ''
			);
			return $data;
		}
	}

	public function get_monthly_rituals() {
		$this->db->where('status',1);
		$this->db->like('date', date('Y-m'));
		$query = $this->db->get("rituals");
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

	public function get_monthly_ritual($id) {
		$this->db->where('ritual_id',$id);
		$query = $this->db->get("rituals");

		//echo "<pre>";
		//print_r($query);
		if ($query->num_rows() > 0) {
			$data = $query->result();
			$response = array(
				'status' => 1,
				'data' => $data
			);
			return $data;
		} else {
			$response = array(
				'status' => 0,
				'data' => ''
			);
			return $data;
		}
	}

}

?>