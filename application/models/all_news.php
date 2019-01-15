<?php

Class All_News extends CI_Model {
	function __construct(){
      parent::__construct();
    }

    // Read data using username and password
	public function news($limit,$start) {
		//echo $start;
		$this->db->limit($limit, $start);
		$query = $this->db->get("news");
		//echo "<pre>";
		//print_r($query);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function news_count() {
		return $this->db->count_all("news");
	}


	// Read data using username and password
	public function edit_news($id) {
		//echo $id."----";
		$condition = "news_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('news');
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
	public function add_news($data) {
		//print_r($data);die;
		$insert_data = array(
			'title' => $data['title'],
			'description' => $data['description']
		);
		if ($this->db->insert('news', $insert_data)) {
			return true;
		} else {
			return false;
		}
	}
	
	// Read data from database to show data in admin page
	public function delete_news($id) {		
		$this->db->where('news_id', $id);
		if ($this->db->delete('news')) {
			return true;
		} else {
			return false;
		}
	}
	
	public function update_news($data){
		//echo "<pre>";print_r($data);die;
		$update_data = array(
			'title' => $data['title'],
			'description' => $data['description'],
			'status' => $data['status']
		);
		$this->db->where('news_id',$data['news_id']);
		
		if($this->db->update('news',$update_data)){
			return true;
		} else {
			return false;
		}
	}

	public function get_latest_all_news() {
		$this->db->where('status',1);
		$query = $this->db->get("news");
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

	public function get_latest_news($id) {
		$this->db->where('news_id',$id);
		$query = $this->db->get("news");
		//echo "<pre>";
		//print_r($query);
		if ($query->num_rows() > 0) {
			$data = $query->result();
			$response = array(
				'status' => 1,
				'all_data' => $data
			);
			return $response;
		} else {
			$response = array(
				'status' => 0,
				'all_data' => ''
			);
			return $response;
		}
	}
}

?>