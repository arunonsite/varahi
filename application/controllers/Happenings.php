<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Happenings extends CI_Controller {  
    
	public function __construct() {
		parent::__construct();
		// Load form helper library
		//$this->load->helper('form');
		$this->load->helper(array('form', 'url'));

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('All_Happenings');
	}
	
    public function index(){
		$this->load->view('templates/header');
		$this->load->view('add_monthly_important_day');
		$this->load->view('templates/footer');
    }
	
	public function monthly_important_days(){
		
		$config = array();

		
		$limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->All_Happenings->monthly_important_days_count();

		$data["data"] = $this->All_Happenings->important_days($limit_per_page, $start_index);

		//echo "fdfdddddd";
		//print_r($data);
		//die(666);
		$config["base_url"] = base_url() . "index.php/Happenings/monthly_important_days";
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
		$this->load->view('monthly_important_days', $data);
		$this->load->view('templates/footer');
		
		//$all_data = $this->All_Happenings->important_days();
		//echo "<pre>";
		//print_r($this->All_Happenings->important_days());
		//die;
	}
	
    public function add_monthly_important_days(){
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		if ($this->form_validation->run() == false){
			$this->load->view('templates/header');
			$this->load->view('add_monthly_important_day');
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'date' => $this->input->post('date'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description')
			);
			$result = $this->All_Happenings->add_important_days($data);
			if ($result != false) {
				// Add user data in session
				/*$data = array(
					'success_message' => 'Added Successfully'
				);*/
				//$this->load->view('templates/header');
				//$this->load->view('add_monthly_important_day',$data);
				//$this->load->view('templates/footer');
				$this->session->set_flashdata('msg', 'Added Successfully');				
				return redirect('Happenings/monthly_important_days');
			}else{
				$this->session->set_flashdata('err_msg', 'Some Error');
				/*$data = array(
					'error_message' => 'Some Error'
				);*/
				return redirect('Happenings/add_monthly_important_day');
			}
			
		}
    }
	
	public function edit_monthly_important_days($id){
		//echo $id; die;
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		if ($this->form_validation->run() == false){
			$data["data"] = $this->All_Happenings->edit_important_days($id);
			//echo "<pre>";
			//print_r($data["data"]);
			//die;
			$this->load->view('templates/header');
			$this->load->view('edit_monthly_important_day', $data);
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'date' => $this->input->post('date'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
				'important_days_id' => $id
			);
			//echo "<pre>";
			//print_r($data);
			//die;
			$result = $this->All_Happenings->update_monthly_important_days($data);
			
			if ($result != false) {
				// Add user data in session
				//$data = array(
				//	'success_message' => 'Updated Successfully'
				//);
				//$this->monthly_important_days();
				$this->session->set_flashdata('msg', 'Updated Successfully');				
				return redirect('Happenings/monthly_important_days');
			}else{
				//$data = array(
				//	'error_message' => 'Some Error'
				//);
				$this->session->set_flashdata('err_msg', 'Not Updated');				
				$data["data"] = $this->All_Happenings->edit_important_days($id);
				//echo "<pre>";
				//print_r($data["data"]);
				//die;
				$this->load->view('templates/header');
				$this->load->view('edit_monthly_important_day', $data);
				$this->load->view('templates/footer');
			}
			
		}
	}
	
	public function delete_monthly_important_day($id){
		$id = $this->uri->segment(3);        
        if (empty($id)){
            show_404();
        }
        if($this->All_Happenings->delete_monthly_important_day($id)){
			//$data = array(
			//	'success_message' => 'Deleted Successfully'
			//);
			//$data["data"] = $this->All_Happenings->important_days();
			//$this->load->view('templates/header');
			//$this->load->view('Happenings/monthly_important_days/index', $data);
			//$this->load->view('templates/footer');
			//$this->monthly_important_days();
			$this->session->set_flashdata('msg', 'Deleted Successfully');				
			return redirect('Happenings/monthly_important_days');
		}else{
			$this->session->set_flashdata('err_msg', 'Not Deletd');				
			return redirect('Happenings/monthly_important_days');
		}
	}

	public function service_important_days(){
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		$response = $this->All_Happenings->get_important_days();
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function service_important_day($id=''){
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		if($id > 0){
			$response = $this->All_Happenings->get_important_day($id);
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