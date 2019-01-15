<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class News extends CI_Controller {  
    
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('All_News');
	}

    public function news(){
		
		$config = array();

		
		$limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->All_News->news_count();

		$data["data"] = $this->All_News->news($limit_per_page, $start_index);

		//echo "fdfdddddd";
		//print_r($data);
		//die(666);
		$config["base_url"] = base_url() . "index.php/News/news";
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
		$this->load->view('news', $data);
		$this->load->view('templates/footer');
	}

	public function add_news(){
		$this->form_validation->set_rules('title', 'Title', 'required');
		if ($this->form_validation->run() == false){
			$this->load->view('templates/header');
			$this->load->view('add_news');
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description')
			);
			$result = $this->All_News->add_news($data);
			if ($result != false) {
				$this->session->set_flashdata('msg', 'Added Successfully');				
				return redirect('News/news');
			}else{
				$this->session->set_flashdata('err_msg', 'Some Error');
				return redirect('News/news');
			}
			
		}
    }
	
	public function edit_news($id){
		$this->form_validation->set_rules('title', 'Title', 'required');
		if ($this->form_validation->run() == false){
			$data["data"] = $this->All_News->edit_news($id);
			//echo "<pre>";
			//print_r($data["data"]);
			//die;
			$this->load->view('templates/header');
			$this->load->view('edit_news', $data);
			$this->load->view('templates/footer');
		}else{
			//echo $id; die;
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
				'news_id' => $id
			);
			//echo "<pre>";
			//print_r($data);
			//die;
			$result = $this->All_News->update_news($data);
			
			if ($result != false) {
				$this->session->set_flashdata('msg', 'Updated Successfully');				
				return redirect('News/news');
			}else{
				$this->session->set_flashdata('err_msg', 'Not Updated');				
				$data["data"] = $this->All_News->edit_news($id);
				//echo "<pre>";
				//print_r($data["data"]);
				//die;
				$this->load->view('templates/header');
				$this->load->view('edit_news', $data);
				$this->load->view('templates/footer');
			}
			
		}
	}
	
	public function delete_news($id){
		$id = $this->uri->segment(3);        
        if (empty($id)){
            show_404();
        }
        if($this->All_News->delete_news($id)){
			$this->session->set_flashdata('msg', 'Deleted Successfully');				
			return redirect('News/news');
		}else{
			$this->session->set_flashdata('err_msg', 'Not Deletd');				
			return redirect('News/news');
		}
	}
	
	public function service_latest_all_news(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		$response = $this->All_News->get_latest_all_news();
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function service_latest_news($id=''){
		if($id > 0){
			$response = $this->All_News->get_latest_news($id);
		}else{
			$response = array(
				'status' => 0,
				'data' => ''
			);
		}
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}
  
}  
?> 