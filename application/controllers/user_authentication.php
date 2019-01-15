<?php
Class User_Authentication extends CI_Controller {
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
		$this->load->model('user_login');
	}

	// Show login page
	public function index() {
		$this->load->view('pages/login');
	}

	// Check for user login process
	public function user_login_process() {
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
		//	echo "<pre>";
		//print_r($this->form_validation);
		//echo "</pre>";
		//die;
			if(isset($this->session->userdata['logged_in'])){
				//$this->load->view('admin_page');
			}else{
				//$this->load->view('login');
				echo "Sara";
				//redirect('login', 'refresh');
				$this->load->view('templates/header');
				$this->load->view('pages/login');
				$this->load->view('templates/footer');
				
			}
		} else {
			$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);
			$result = $this->user_login->login($data);
			if ($result == TRUE) {

			$username = $this->input->post('username');
			$result = $this->user_login->read_user_information($username);
			if ($result != false) {
			$session_data = array(
			'username' => $result[0]->user_name,
			'email' => $result[0]->user_email,
			);
			// Add user data in session
			$this->session->set_userdata('logged_in', $session_data);
			$this->load->view('admin_page');
			}
			} else {
			$data = array(
			'error_message' => 'Invalid Username or Password'
			);
			$this->load->view('login', $data);
			}
		}
	}
	
	// Logout from admin page
	public function logout() {
		// Removing session data
		$sess_array = array(
			'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('login', $data);
	}
}

?>