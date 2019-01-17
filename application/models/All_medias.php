<?php

Class All_medias extends CI_Model {

	function __construct(){
      parent::__construct();
    }

    // Read data using username and password
	public function videos($limit,$start) {
		//echo $start;
		$this->db->limit($limit, $start);
		$query = $this->db->get("videos");
		//echo "<pre>";
		//print_r($query);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function videos_count() {
		return $this->db->count_all("videos");
	}


	// Read data using username and password
	public function edit_video($id) {
		//echo $id."----";
		$condition = "video_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('videos');
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
	public function add_video($data) {
		//print_r($data);die;
		$insert_data = array(
			'title' => $data['title'],
			'url' => $data['url'],
			'description' => $data['description']
		);
		if ($this->db->insert('videos', $insert_data)) {
			return true;
		} else {
			return false;
		}
	}
	
	// Read data from database to show data in admin page
	public function delete_video($id) {		
		$this->db->where('video_id', $id);
		if ($this->db->delete('videos')) {
			return true;
		} else {
			return false;
		}
	}
	
	public function update_video($data){
		//echo "<pre>";print_r($data);die;
		$update_data = array(
			'title' => $data['title'],
			'url' => $data['url'],
			'description' => $data['description'],
			'status' => $data['status']
		);
		$this->db->where('video_id',$data['video_id']);
		
		if($this->db->update('videos',$update_data)){
			return true;
		} else {
			return false;
		}
	}


	public function get_videos() {
		$this->db->where('status',1);
		$query = $this->db->get("videos");
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

	public function get_video($id) {
		$this->db->where('video_id',$id);
		$query = $this->db->get("videos");

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


	// Photo

	// Read data using username and password
	public function photos($limit,$start) {
		//echo $start;
		$this->db->limit($limit, $start);
		$query = $this->db->get("photos");
		//echo "<pre>";
		//print_r($query);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function photo_count() {
		return $this->db->count_all("photos");
	}


	// Read data using username and password
	public function edit_photo($id) {
		echo $id."----";
		$condition = "photo_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('photos');
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
	public function add_photo($data) {
		//print_r($data);die;
		$insert_data = array(
			'title' => $data['title'],
			'description' => $data['description']
		);
		if ($this->db->insert('photos', $insert_data)) {
			return $this->db->insert_id();;
		} else {
			return false;
		}
	}
	
	// Read data from database to show data in admin page
	public function delete_photo($id) {		
		$this->db->where('photo_id', $id);
		if ($this->db->delete('photos')) {
			return true;
		} else {
			return false;
		}
	}
	
	public function update_photo($data){
		//echo "<pre>";print_r($data);die;
		$update_data = array(
			'title' => $data['title'],
			'description' => $data['description'],
			'status' => $data['status']
		);
		$this->db->where('photo_id',$data['photo_id']);
		
		if($this->db->update('photos',$update_data)){
			return $data['photo_id'];
		} else {
			return false;
		}
	}

	public function add_photo_update_photo($data){
		//echo "<pre>";print_r($data);
		//echo $data['photo_name']['file_name'];
		//die;
		$update_data = array(
			'photo_name' => $data['photo_name'],
			'thumb_photo_name' => $data['thumb_photo_name']
		);
		$this->db->where('photo_id', $data['photo_id']);
		
		if($this->db->update('photos',$update_data)){
			return true;
		} else {
			return false;
		}
	}

	public function get_photos() {
		$this->db->where('status',1);
		$query = $this->db->get("photos");
		if ($query->num_rows() > 0) {
			$fetched_data = $query->result();
			foreach ($fetched_data as $key => $value) {
				$fetched_data[$key]->thumb_photo_name = base_url()."uploads/photos/thumbnails/".$value->thumb_photo_name;
				$fetched_data[$key]->photo_name = base_url()."uploads/photos/".$value->photo_name;
				//echo $value->thumb_photo_name;
			}
			$response = array(
				'status' => 1,
				'data' => $fetched_data
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

	public function get_photo($id) {
		$this->db->where('photo_id',$id);
		$query = $this->db->get("photos");

		//echo "<pre>";
		//print_r($query);
		if ($query->num_rows() > 0) {
			$fetched_data = $query->result();
			foreach ($fetched_data as $key => $value) {
				$fetched_data[$key]->thumb_photo_name = base_url()."uploads/photos/thumbnails/".$value->thumb_photo_name;
				$fetched_data[$key]->photo_name = base_url()."uploads/photos/".$value->photo_name;
				//echo $value->thumb_photo_name;
			}
			$response = array(
				'status' => 1,
				'data' => $fetched_data
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

	// Songs

	// Read data using username and password
	public function songs($limit,$start) {
		//echo $start;
		$this->db->limit($limit, $start);
		$query = $this->db->get("songs");
		//echo "<pre>";
		//print_r($query);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function song_count() {
		return $this->db->count_all("songs");
	}


	// Read data using username and password
	public function edit_song($id) {
		$condition = "song_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('songs');
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
	public function add_song($data) {
		//print_r($data);die;
		$insert_data = array(
			'title' => $data['title'],
			'description' => $data['description']
		);
		if ($this->db->insert('songs', $insert_data)) {
			return $this->db->insert_id();;
		} else {
			return false;
		}
	}
	
	// Read data from database to show data in admin page
	public function delete_song($id) {		
		$this->db->where('song_id', $id);
		if ($this->db->delete('songs')) {
			return true;
		} else {
			return false;
		}
	}
	
	public function update_song($data){
		//echo "<pre>";print_r($data);die;
		$update_data = array(
			'title' => $data['title'],
			'description' => $data['description'],
			'status' => $data['status']
		);
		$this->db->where('song_id',$data['song_id']);
		
		if($this->db->update('songs',$update_data)){
			return $data['song_id'];
		} else {
			return false;
		}
	}

	public function update_only_song($data){
		//echo "<pre>";print_r($data);
		//die;
		$update_data = array(
			'song_name' => $data['song_name']
		);
		$this->db->where('song_id', $data['song_id']);
		
		if($this->db->update('songs',$update_data)){
			return true;
		} else {
			return false;
		}
	}

	public function get_songs() {
		$this->db->where('status',1);
		$query = $this->db->get("songs");
		if ($query->num_rows() > 0) {
			$fetched_data = $query->result();
			foreach ($fetched_data as $key => $value) {
				$fetched_data[$key]->song_name = base_url()."uploads/songs/".$value->song_name;
			}
			$response = array(
				'status' => 1,
				'data' => $fetched_data
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

	public function get_song($id) {
		$this->db->where('song_id',$id);
		$query = $this->db->get("songs");

		//echo "<pre>";
		//print_r($query);
		if ($query->num_rows() > 0) {
			$fetched_data = $query->result();
			foreach ($fetched_data as $key => $value) {
				$fetched_data[$key]->song_name = base_url()."uploads/songs/".$value->song_name;
			}
			$response = array(
				'status' => 1,
				'data' => $fetched_data
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