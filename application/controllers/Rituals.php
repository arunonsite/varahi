<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Rituals extends CI_Controller {  
    
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('All_Rituals');
	}

    public function daily_rituals(){
		
		$config = array();

		
		$limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->All_Rituals->daily_rituals_count();

		$data["data"] = $this->All_Rituals->daily_rituals($limit_per_page, $start_index);

		//echo "fdfdddddd";
		//print_r($data);
		//die(666);
		$config["base_url"] = base_url() . "index.php/Rituals/daily_rituals";
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
		$this->load->view('daily_rituals', $data);
		$this->load->view('templates/footer');
	}

	public function add_daily_ritual(){
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		if ($this->form_validation->run() == false){
			$this->load->view('templates/header');
			$this->load->view('add_daily_ritual');
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'date' => $this->input->post('date'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description')
			);
			$result = $this->All_Rituals->add_daily_ritual($data);
			if ($result != false) {
				$this->session->set_flashdata('msg', 'Added Successfully');				
				return redirect('Rituals/daily_rituals');
			}else{
				$this->session->set_flashdata('err_msg', 'Some Error');
				return redirect('Rituals/add_daily_ritual');
			}
			
		}
    }
	
	public function edit_daily_ritual($id){
		//echo $id; die;
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		if ($this->form_validation->run() == false){
			$data["data"] = $this->All_Rituals->edit_daily_ritual($id);
			//echo "<pre>";
			//print_r($data["data"]);
			//die;
			$this->load->view('templates/header');
			$this->load->view('edit_daily_ritual', $data);
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'date' => $this->input->post('date'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
				'ritual_id' => $id
			);
			//echo "<pre>";
			//print_r($data);
			//die;
			$result = $this->All_Rituals->update_daily_ritual($data);
			
			if ($result != false) {
				$this->session->set_flashdata('msg', 'Updated Successfully');				
				return redirect('Rituals/daily_rituals');
			}else{
				$this->session->set_flashdata('err_msg', 'Not Updated');				
				$data["data"] = $this->All_Rituals->edit_daily_ritual($id);
				//echo "<pre>";
				//print_r($data["data"]);
				//die;
				$this->load->view('templates/header');
				$this->load->view('edit_daily_ritual', $data);
				$this->load->view('templates/footer');
			}
			
		}
	}
	
	public function delete_daily_ritual($id){
		$id = $this->uri->segment(3);        
        if (empty($id)){
            show_404();
        }
        if($this->All_Rituals->delete_daily_ritual($id)){
			$this->session->set_flashdata('msg', 'Deleted Successfully');				
			return redirect('Rituals/daily_rituals');
		}else{
			$this->session->set_flashdata('err_msg', 'Not Deletd');				
			return redirect('Rituals/daily_rituals');
		}
	}
	
	public function monthly_rituals(){
		
		$config = array();

		
		$limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->All_Rituals->monthly_rituals_count();

		$data["data"] = $this->All_Rituals->monthly_rituals($limit_per_page, $start_index);

		//echo "fdfdddddd";
		//print_r($data);
		//die(666);
		$config["base_url"] = base_url() . "index.php/Rituals/monthly_rituals";
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
		$this->load->view('monthly_rituals', $data);
		$this->load->view('templates/footer');
	}
	
    public function add_monthly_ritual(){
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		if ($this->form_validation->run() == false){
			$this->load->view('templates/header');
			$this->load->view('add_monthly_ritual');
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'date' => $this->input->post('date'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description')
			);
			$result = $this->All_Rituals->add_monthly_ritual($data);
			if ($result != false) {
				$this->session->set_flashdata('msg', 'Added Successfully');				
				return redirect('Rituals/monthly_rituals');
			}else{
				$this->session->set_flashdata('err_msg', 'Some Error');
				return redirect('Rituals/add_monthly_ritual');
			}
			
		}
    }
	
	public function edit_monthly_ritual($id){
		//echo $id; die;
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		if ($this->form_validation->run() == false){
			$data["data"] = $this->All_Rituals->edit_monthly_ritual($id);
			//echo "<pre>";
			//print_r($data["data"]);
			//die;
			$this->load->view('templates/header');
			$this->load->view('edit_monthly_ritual', $data);
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'date' => $this->input->post('date'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
				'ritual_id' => $id
			);
			//echo "<pre>";
			//print_r($data);
			//die;
			$result = $this->All_Rituals->update_monthly_ritual($data);
			
			if ($result != false) {
				$this->session->set_flashdata('msg', 'Updated Successfully');				
				return redirect('Rituals/monthly_rituals');
			}else{
				$this->session->set_flashdata('err_msg', 'Not Updated');				
				$data["data"] = $this->All_Rituals->edit_monthly_ritual($id);
				//echo "<pre>";
				//print_r($data["data"]);
				//die;
				$this->load->view('templates/header');
				$this->load->view('edit_monthly_ritual', $data);
				$this->load->view('templates/footer');
			}
			
		}
	}
	
	public function delete_monthly_ritual($id){
		$id = $this->uri->segment(3);        
        if (empty($id)){
            show_404();
        }
        if($this->All_Rituals->delete_monthly_ritual($id)){
			$this->session->set_flashdata('msg', 'Deleted Successfully');				
			return redirect('Rituals/monthly_rituals');
		}else{
			$this->session->set_flashdata('err_msg', 'Not Deletd');				
			return redirect('Rituals/monthly_rituals');
		}
	}

	public function service_daily_rituals(){
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		$response = $this->All_Rituals->get_daily_rituals();
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function service_daily_ritual($id=''){
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		if($id > 0){
			$response = $this->All_Rituals->get_daily_ritual($id);
		}else{
			$response = array(
				'status' => 0,
				'data' => ''
			);
		}
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function service_monthly_rituals(){
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		$response = $this->All_Rituals->get_monthly_rituals();
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function service_monthly_ritual($id=''){
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		if($id > 0){
			$response = $this->All_Rituals->get_monthly_ritual($id);
		}else{
			$response = array(
				'status' => 0,
				'data' => ''
			);
		}
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}
  
}  
?> 