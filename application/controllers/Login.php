<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Login extends CI_Controller {  
    
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
		$this->load->model('User_login');
	}
	
    public function index()  
    {
		$this->load->helper(array('form', 'url'));

		// Load form validation library
		$this->load->library('form_validation');
        //$this->load->view('pages/login');
		$this->load->view('templates/header');
		$this->load->view('login');
		$this->load->view('templates/footer');
    }  
    public function process(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required',
				array('required' => 'You must provide a %s.')
		);
		if ($this->form_validation->run() == false){
			$this->load->view('templates/header');
			$this->load->view('login');
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$result = $this->User_login->login($data);
			if ($result == true) {
				$username = $this->input->post('username');
				$result = $this->User_login->read_user_information($username);
				if ($result != false) {
					$session_data = array(
						'username' => $result[0]->user_name,
						'user_id' => $result[0]->id
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					//$this->load->view('templates/header');
					//$this->load->view('home');
					//$this->load->view('templates/footer');
					return redirect('home');
				}
			} else {
				$this->session->set_flashdata('err_msg', 'Invalid Username or Password');
				/*$data = array(
					'error_message' => 'Invalid Username or Password'
				);*/
				//$this->load->view('templates/header');
				//$this->load->view('login', $data);
				//$this->load->view('templates/footer');
				redirect("Login");
			}
		}
    }
	
	public function change_password(){
		$this->form_validation->set_rules('password', 'Password', 'required',
				array('required' => 'You must provide a %s.')
		);
		if ($this->form_validation->run() == false){
			$this->load->view('templates/header');
			$this->load->view('my_profile');
			$this->load->view('templates/footer');
		}else{
			$password = $this->input->post('password');
			$data['user_id'] = $this->session->userdata('logged_in')['user_id'];
			$data['password'] = $password;
			$result = $this->User_login->update_password($data);
			if ($result != false) {
				/*$data = array(
					'success_message' => 'Password changed successfully'
				);*/
				//$this->load->view('templates/header');
				//$this->load->view('my_profile', $data);
				//$this->load->view('templates/footer');
				$this->session->set_flashdata('msg', 'Updated Successfully');
				return redirect('my_profile');
			}else{
				$this->session->set_flashdata('err_msg', 'Password not changed');
				return redirect('my_profile');
			}
		}
	}
	
    public function logout()  
    {  
        //removing session  
        $this->session->unset_userdata('logged_in');  
        $this->session->unset_userdata('user_id');  
        redirect("Login");
    }  
  
}  
?> 