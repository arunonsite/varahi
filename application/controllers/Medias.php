<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Medias extends CI_Controller {  
    
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('All_medias');
	}

    public function videos(){
		
		$config = array();

		
		$limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->All_medias->videos_count();

		$data["data"] = $this->All_medias->videos($limit_per_page, $start_index);

		//echo "fdfdddddd";
		//print_r($data);
		//die(666);
		$config["base_url"] = base_url() . "index.php/Medias/videos";
		$config['total_rows'] = $total_records;
		$config['per_page'] = $limit_per_page;
		$config["uri_segment"] = 3;
		
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		 
		$config['first_link'] = 'First Page';
		$config['first_tag_open'] = '<span class="firstlink">';
		$config['first_tag_close'] = '</span>';
		 
		$config['last_link'] = 'Last Page';
		$config['last_tag_open'] = '<span class="lastlink">';
		$config['last_tag_close'] = '</span>';
		 
		$config['next_link'] = 'Next Page';
		$config['next_tag_open'] = '<span class="nextlink">';
		$config['next_tag_close'] = '</span>';

		$config['prev_link'] = 'Prev Page';
		$config['prev_tag_open'] = '<span class="prevlink">';
		$config['prev_tag_close'] = '</span>';

		$config['cur_tag_open'] = '<span class="curlink">';
		$config['cur_tag_close'] = '</span>';

		$config['num_tag_open'] = '<span class="numlink">';
		$config['num_tag_close'] = '</span>';
		
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		//echo "<pre>";
		//	print_r($data);echo "</pre>";
			//die;
		
		$this->load->view('templates/header');
		$this->load->view('videos', $data);
		$this->load->view('templates/footer');
	}

	public function add_video(){
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		if ($this->form_validation->run() == false){
			$this->load->view('templates/header');
			$this->load->view('add_video');
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'url' => $this->input->post('url'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description')
			);
			$result = $this->All_medias->add_video($data);
			if ($result != false) {
				$this->session->set_flashdata('msg', 'Added Successfully');				
				return redirect('Medias/videos');
			}else{
				$this->session->set_flashdata('err_msg', 'Some Error');
				return redirect('Medias/videos');
			}
			
		}
    }
	
	public function edit_video($id){
		
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		if ($this->form_validation->run() == false){
			$data["data"] = $this->All_medias->edit_video($id);
			//echo "<pre>";
			//print_r($data["data"]);
			//die;
			$this->load->view('templates/header');
			$this->load->view('edit_video', $data);
			$this->load->view('templates/footer');
		}else{
			//echo $id; die;
			$data = array(
				'url' => $this->input->post('url'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
				'video_id' => $id
			);
			//echo "<pre>";
			//print_r($data);
			//die;
			$result = $this->All_medias->update_video($data);
			
			if ($result != false) {
				$this->session->set_flashdata('msg', 'Updated Successfully');				
				return redirect('Medias/videos');
			}else{
				$this->session->set_flashdata('err_msg', 'Not Updated');				
				$data["data"] = $this->All_medias->edit_video($id);
				//echo "<pre>";
				//print_r($data["data"]);
				//die;
				$this->load->view('templates/header');
				$this->load->view('edit_video', $data);
				$this->load->view('templates/footer');
			}
			
		}
	}
	
	public function delete_video($id){
		$id = $this->uri->segment(3);        
        if (empty($id)){
            show_404();
        }
        if($this->All_medias->delete_video($id)){
			$this->session->set_flashdata('msg', 'Deleted Successfully');				
			return redirect('Medias/videos');
		}else{
			$this->session->set_flashdata('err_msg', 'Not Deletd');				
			return redirect('Medias/videos');
		}
	}

	public function service_videos(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		$response = $this->All_medias->get_videos();
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function service_video($id=''){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		if($id > 0){
			$response = $this->All_medias->get_video($id);
		}else{
			$response = array(
				'status' => 0,
				'data' => ''
			);
		}
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}


	//Photo upload

	public function photos(){
		
		$config = array();

		
		$limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->All_medias->photo_count();

		$data["data"] = $this->All_medias->photos($limit_per_page, $start_index);

		//echo "<pre>";
		//print_r($data);
        //die;
		//die(666);
		$config["base_url"] = base_url() . "index.php/Medias/photos";
		$config['total_rows'] = $total_records;
		$config['per_page'] = $limit_per_page;
		$config["uri_segment"] = 3;
		
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		 
		$config['first_link'] = 'First Page';
		$config['first_tag_open'] = '<span class="firstlink">';
		$config['first_tag_close'] = '</span>';
		 
		$config['last_link'] = 'Last Page';
		$config['last_tag_open'] = '<span class="lastlink">';
		$config['last_tag_close'] = '</span>';
		 
		$config['next_link'] = 'Next Page';
		$config['next_tag_open'] = '<span class="nextlink">';
		$config['next_tag_close'] = '</span>';

		$config['prev_link'] = 'Prev Page';
		$config['prev_tag_open'] = '<span class="prevlink">';
		$config['prev_tag_close'] = '</span>';

		$config['cur_tag_open'] = '<span class="curlink">';
		$config['cur_tag_close'] = '</span>';

		$config['num_tag_open'] = '<span class="numlink">';
		$config['num_tag_close'] = '</span>';
		
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		//echo "<pre>";
		//	print_r($data);echo "</pre>";
			//die;
		
		$this->load->view('templates/header');
		$this->load->view('photos', $data);
		$this->load->view('templates/footer');
	}

	public function add_photo(){
		$config['upload_path']   = './uploads/photos/'; 
      $config['allowed_types'] = 'gif|jpg|png'; 
      $config['max_size']      = 1024;
      $this->load->library('upload', $config);
		$this->form_validation->set_rules('title', 'Title', 'required');
		//$this->form_validation->set_rules('photo_name', 'Photo', 'required');
		if ($this->form_validation->run() == false){
			$this->load->view('templates/header');
			$this->load->view('add_photo');
			$this->load->view('templates/footer');
		}else{
			$uploadedImage = $this->upload->data();
			$data = array(
				//'photo_name' => $this->input->post('photo_name'),
				//'photo_name' => $uploadedImage['photo_name'],
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description')
			);


			$result = $this->All_medias->add_photo($data);
			if ($result != false) {
				$data['mode'] = 'photo';
				$data['id'] = $result;
				$this->do_upload($data);
				$this->session->set_flashdata('msg', 'Added Successfully');				
				return redirect('Medias/photos');
			}else{
				$this->session->set_flashdata('err_msg', 'Some Error');
				return redirect('Medias/photos');
			}
			
		}
    }
	
	public function edit_photo($id){
		$this->form_validation->set_rules('title', 'Title', 'required');
		if ($this->form_validation->run() == false){
			$data["data"] = $this->All_medias->edit_photo($id);
			//echo "<pre>";
			//print_r($data["data"]);
			//echo "</pre>";
			//die;
			$this->load->view('templates/header');
			$this->load->view('edit_photo', $data);
			$this->load->view('templates/footer');
		}else{
			//echo $id; die;
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
				'photo_id' => $id
			);
			//echo "<pre>";
			//print_r($data);
			//die;
			
			$result = $this->All_medias->update_photo($data);			
			if ($result != false) {
				$data['mode'] = 'photo';
				$data['id'] = $result;
				$this->do_upload($data);
				$this->session->set_flashdata('msg', 'Updated Successfully');				
				return redirect('Medias/photos');
			}else{
				$this->session->set_flashdata('err_msg', 'Not Updated');				
				$data["data"] = $this->All_medias->edit_photo($id);
				//echo "<pre>";
				//print_r($data["data"]);
				//die;
				$this->load->view('templates/header');
				$this->load->view('edit_photo', $data);
				$this->load->view('templates/footer');
			}
			
		}
	}
	
	public function delete_photo($id){
		$id = $this->uri->segment(3);        
        if (empty($id)){
            show_404();
        }
        $data = $this->All_medias->edit_photo($id);
        //echo "<pre>";
        //print_r($data);
        //echo realpath('uploads/'.$data['photo_name']);
        //die;
        if($this->All_medias->delete_photo($id)){
        	@unlink(realpath('uploads/photos/'.$data['photo_name']));
        	@unlink(realpath('uploads/photos/thumbnails/'.$data['thumb_photo_name']));
			$this->session->set_flashdata('msg', 'Deleted Successfully');				
			return redirect('Medias/photos');
		}else{
			$this->session->set_flashdata('err_msg', 'Not Deletd');				
			return redirect('Medias/photos');
		}
	}

	public function do_upload($data) {
		$id = $data['id'];
		$mode = $data['mode'];
		if($mode == "song"){
			$config['upload_path']   = './uploads/songs/';
			$field_name = "song_name";
			$redirect = 'Medias/songs';
			$config['allowed_types'] = 'mp3';
		}elseif($mode == "mantra"){
			$config['upload_path']   = './uploads/mantras/';
			$field_name = "mantra_name";
			$redirect = 'Medias/mantras';
			$config['allowed_types'] = 'mp3|MP3';
		}else{
			$config['upload_path']   = './uploads/photos/';
			$field_name = "photo_name";
			$redirect = 'Medias/photos';
			$config['allowed_types'] = 'gif|jpg|png';
		}		
		$config['max_size']      = 100000;
		$this->load->library('upload', $config);
      if ( ! $this->upload->do_upload($field_name)) {
      	//$error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('err_msg', $this->upload->display_errors());				
		return redirect($redirect);
      } else { 

        $uploaded_data = $this->upload->data();
        if($mode=="photo"){
        	$get_photo_data = $this->All_medias->edit_photo($id);
			@unlink(realpath('uploads/photos/'.$get_photo_data['photo_name']));
			@unlink(realpath('uploads/photos/thumbnails/'.$get_photo_data['thumb_photo_name']));
			$filename = $uploaded_data['file_name'];
	        //if($this->resizeImage($filename)){
	        	//$split_image = explode(".", $uploaded_data['file_name']);
	        	//$thumb = $split_image[0] . '_thumb.' . $split_image[1];
	        	$data = array(
					'photo_name' => $uploaded_data['file_name'],
					//'thumb_photo_name' => $thumb,
					'photo_id' => $id
				);

	        	$result = $this->All_medias->add_photo_update_photo($data);
	    	//}
        }elseif($mode=="mantra"){
        	$get_mantra_data = $this->All_medias->edit_mantra($id);
			@unlink(realpath('uploads/mantras/'.$get_mantra_data['mantra_name']));
			$data = array(
				'mantra_name' => $uploaded_data['file_name'],
				'mantra_id' => $id
			);
			$result = $this->All_medias->update_only_mantra($data);
		}else{
        	$get_song_data = $this->All_medias->edit_song($id);
			@unlink(realpath('uploads/songs/'.$get_song_data['song_name']));
			$data = array(
				'song_name' => $uploaded_data['file_name'],
				'song_id' => $id
			);
			$result = $this->All_medias->update_only_song($data);
        }
        
		//echo "--SS-<pre>";
		//print_r($get_photo_data);
		//die;
        

        //print_r('Image Uploaded Successfully.');
        //exit;
      } 
   }

   /**
    * Manage uploadImage
    *
    * @return Response
   */
   public function resizeImage($filename){
      $source_path = $_SERVER['DOCUMENT_ROOT'] . '/temple/uploads/photos/' . $filename;
      $target_path = $_SERVER['DOCUMENT_ROOT'] . '/temple/uploads/photos/thumbnails/';
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => TRUE,
          'thumb_marker' => '_thumb',
          'width' => 150,
          'height' => 150
      );
      //echo "<pre>";
      //print_r($config_manip);

      $this->load->library('image_lib', $config_manip);
      if (!$this->image_lib->resize()) {
          //echo $this->image_lib->display_errors();
      	return false;
      }else{
      	//echo "----";
      	return true;
      }


      $this->image_lib->clear();
      //die;
   }

   public function service_photos(){
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		$response = $this->All_medias->get_photos();
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function service_photo($id=''){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		if($id > 0){
			$response = $this->All_medias->get_photo($id);
		}else{
			$response = array(
				'status' => 0,
				'data' => ''
			);
		}
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}

   // Songs upload

	public function songs(){
		
		$config = array();

		
		$limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->All_medias->song_count();

		$data["data"] = $this->All_medias->songs($limit_per_page, $start_index);

		//echo "fdfdddddd";
		//print_r($data);
		//die(666);
		$config["base_url"] = base_url() . "index.php/Medias/songs";
		$config['total_rows'] = $total_records;
		$config['per_page'] = $limit_per_page;
		$config["uri_segment"] = 3;
		
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		 
		$config['first_link'] = 'First Page';
		$config['first_tag_open'] = '<span class="firstlink">';
		$config['first_tag_close'] = '</span>';
		 
		$config['last_link'] = 'Last Page';
		$config['last_tag_open'] = '<span class="lastlink">';
		$config['last_tag_close'] = '</span>';
		 
		$config['next_link'] = 'Next Page';
		$config['next_tag_open'] = '<span class="nextlink">';
		$config['next_tag_close'] = '</span>';

		$config['prev_link'] = 'Prev Page';
		$config['prev_tag_open'] = '<span class="prevlink">';
		$config['prev_tag_close'] = '</span>';

		$config['cur_tag_open'] = '<span class="curlink">';
		$config['cur_tag_close'] = '</span>';

		$config['num_tag_open'] = '<span class="numlink">';
		$config['num_tag_close'] = '</span>';
		
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		//echo "<pre>";
		//	print_r($data);echo "</pre>";
			//die;
		
		$this->load->view('templates/header');
		$this->load->view('songs', $data);
		$this->load->view('templates/footer');
	}

	public function add_song(){
		$config['upload_path']   = './uploads/songs/'; 
      	$config['allowed_types'] = 'mp3';
      	$config['max_size']      = 1024;
      	$this->load->library('upload', $config);
		$this->form_validation->set_rules('title', 'Title', 'required');
		if ($this->form_validation->run() == false){
			$this->load->view('templates/header');
			$this->load->view('add_song');
			$this->load->view('templates/footer');
		}else{
			$uploadedSong = $this->upload->data();
			$data = array(
				//'photo_name' => $this->input->post('photo_name'),
				//'photo_name' => $uploadedImage['photo_name'],
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description')
			);


			$result = $this->All_medias->add_song($data);
			if ($result != false) {
				$data['mode'] = 'song';
				$data['id'] = $result;
				$this->do_upload($data);
				$this->session->set_flashdata('msg', 'Added Successfully');				
				return redirect('Medias/songs');
			}else{
				$this->session->set_flashdata('err_msg', 'Some Error');
				return redirect('Medias/songs');
			}
			
		}
    }
	
	public function edit_song($id){
		$this->form_validation->set_rules('title', 'Title', 'required');
		if ($this->form_validation->run() == false){
			$data["data"] = $this->All_medias->edit_song($id);
			//echo "<pre>";
			//print_r($data["data"]);
			//echo "</pre>";
			//die;
			$this->load->view('templates/header');
			$this->load->view('edit_song', $data);
			$this->load->view('templates/footer');
		}else{
			//echo $id; die;
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
				'song_id' => $id
			);
			//echo "<pre>";
			//print_r($data);
			//die;
			
			$result = $this->All_medias->update_song($data);			
			if ($result != false) {
				$data['mode'] = 'song';
				$data['id'] = $result;
				$this->do_upload($data);
				$this->session->set_flashdata('msg', 'Updated Successfully');				
				return redirect('Medias/songs');
			}else{
				$this->session->set_flashdata('err_msg', 'Not Updated');				
				$data["data"] = $this->All_medias->edit_song($id);
				//echo "<pre>";
				//print_r($data["data"]);
				//die;
				$this->load->view('templates/header');
				$this->load->view('edit_song', $data);
				$this->load->view('templates/footer');
			}
			
		}
	}
	
	public function delete_song($id){
		$id = $this->uri->segment(3);        
        if (empty($id)){
            show_404();
        }
        $data = $this->All_medias->edit_song($id);
        //echo "<pre>";
        //print_r($data);
        //echo realpath('uploads/'.$data['photo_name']);
        //die;
        if($this->All_medias->delete_song($id)){
        	@unlink(realpath('uploads/songs/'.$data['song_name']));
			$this->session->set_flashdata('msg', 'Deleted Successfully');				
			return redirect('Medias/songs');
		}else{
			$this->session->set_flashdata('err_msg', 'Not Deletd');				
			return redirect('Medias/songs');
		}
	}
	
	public function service_songs(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		$response = $this->All_medias->get_songs();
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function service_song($id=''){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		if($id > 0){
			$response = $this->All_medias->get_song($id);
		}else{
			$response = array(
				'status' => 0,
				'data' => ''
			);
		}
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}
    
    //Mantra upload

	public function mantras(){
		
		$config = array();

		
		$limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->All_medias->mantra_count();

		$data["data"] = $this->All_medias->mantras($limit_per_page, $start_index);

		//echo "<pre>";
		//print_r($data);
        //die;
		//die(666);
		$config["base_url"] = base_url() . "index.php/Medias/mantras";
		$config['total_rows'] = $total_records;
		$config['per_page'] = $limit_per_page;
		$config["uri_segment"] = 3;
		
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		 
		$config['first_link'] = 'First Page';
		$config['first_tag_open'] = '<span class="firstlink">';
		$config['first_tag_close'] = '</span>';
		 
		$config['last_link'] = 'Last Page';
		$config['last_tag_open'] = '<span class="lastlink">';
		$config['last_tag_close'] = '</span>';
		 
		$config['next_link'] = 'Next Page';
		$config['next_tag_open'] = '<span class="nextlink">';
		$config['next_tag_close'] = '</span>';

		$config['prev_link'] = 'Prev Page';
		$config['prev_tag_open'] = '<span class="prevlink">';
		$config['prev_tag_close'] = '</span>';

		$config['cur_tag_open'] = '<span class="curlink">';
		$config['cur_tag_close'] = '</span>';

		$config['num_tag_open'] = '<span class="numlink">';
		$config['num_tag_close'] = '</span>';
		
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		//echo "<pre>";
		//	print_r($data);echo "</pre>";
			//die;
		
		$this->load->view('templates/header');
		$this->load->view('mantras', $data);
		$this->load->view('templates/footer');
	}

	public function add_mantra(){
        $config['upload_path']   = './uploads/mantras/'; 
      $config['allowed_types'] = 'mp3|MP3'; 
      $config['max_size']      = 1000000;
      $this->load->library('upload', $config);
		$this->form_validation->set_rules('title', 'Title', 'required');
		//$this->form_validation->set_rules('photo_name', 'Photo', 'required');
		if ($this->form_validation->run() == false){
			$this->load->view('templates/header');
			$this->load->view('add_mantra');
			$this->load->view('templates/footer');
		}else{
			$uploadedMantra = $this->upload->data();
			$data = array(
				//'photo_name' => $this->input->post('photo_name'),
				//'photo_name' => $uploadedImage['photo_name'],
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description')
			);


			$result = $this->All_medias->add_mantra($data);
			if ($result != false) {
				$data['mode'] = 'mantra';
				$data['id'] = $result;
				$this->do_upload($data);
				$this->session->set_flashdata('msg', 'Added Successfully');				
				return redirect('Medias/mantras');
			}else{
				$this->session->set_flashdata('err_msg', 'Some Error');
				return redirect('Medias/mantras');
			}
			
		}
    }
	
	public function edit_mantra($id){
		$this->form_validation->set_rules('title', 'Title', 'required');
		if ($this->form_validation->run() == false){
			$data["data"] = $this->All_medias->edit_mantra($id);
			//echo "<pre>";
			//print_r($data["data"]);
			//echo "</pre>";
			//die;
			$this->load->view('templates/header');
			$this->load->view('edit_mantra', $data);
			$this->load->view('templates/footer');
		}else{
			//echo $id; die;
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
				'mantra_id' => $id
			);
			//echo "<pre>";
			//print_r($data);
			//die;
			
			$result = $this->All_medias->update_mantra($data);			
			if ($result != false) {
				$data['mode'] = 'mantra';
				$data['id'] = $result;
				$this->do_upload($data);
				$this->session->set_flashdata('msg', 'Updated Successfully');				
				return redirect('Medias/mantras');
			}else{
				$this->session->set_flashdata('err_msg', 'Not Updated');				
				$data["data"] = $this->All_medias->edit_mantra($id);
				//echo "<pre>";
				//print_r($data["data"]);
				//die;
				$this->load->view('templates/header');
				$this->load->view('edit_mantra', $data);
				$this->load->view('templates/footer');
			}
			
		}
	}
	
	public function delete_mantra($id){
		$id = $this->uri->segment(3);        
        if (empty($id)){
            show_404();
        }
        $data = $this->All_medias->edit_mantra($id);
        //echo "<pre>";
        //print_r($data);
        //echo realpath('uploads/'.$data['mantra_name']);
        //die;
        if($this->All_medias->delete_mantra($id)){
        	@unlink(realpath('uploads/mantras/'.$data['mantra_name']));
			$this->session->set_flashdata('msg', 'Deleted Successfully');				
			return redirect('Medias/mantras');
		}else{
			$this->session->set_flashdata('err_msg', 'Not Deletd');				
			return redirect('Medias/mantras');
		}
	}
    
    public function service_mantras(){
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		$response = $this->All_medias->get_mantras();
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}
  
}  
?> 