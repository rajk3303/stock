<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Reg extends Admin_Controller 
{
	
	// public function index()
	// {

	// $this->load->view('reg/reg.php');
	// }
	
	   public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = 'Registraion';
		$this->load->model('model_reg');
		$this->load->model('model_groups');
	}    

	
	

	 public function create()
	{
		$this->logged_in();

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('firstname', 'First name', 'trim|required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');

        if ($this->form_validation->run() == TRUE) {
			
            $password = $this->password_hash($this->input->post('password'));
        	$data = array(
        		'username' => $this->input->post('username'),
        		'password' => $password,
        		'email' => $this->input->post('email'),
        		'firstname' => $this->input->post('firstname'),
        		'lastname' => $this->input->post('lastname'),
        		'phone' => $this->input->post('phone'),
        		'gender' => $this->input->post('gender') 
			);
			// Get group id for user group
			$group_id = $this->model_groups->getGroupIdByGroupName('Users');

        	$create = $this->model_reg->create($data,$group_id);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
				redirect('auth/login', 'refresh');
			}
			
			
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('reg/reg.php', 'refresh');
        	}
        } else {
            // false case
			$this->load->view('reg/reg.php');
        }	

		
	}

	public function password_hash($pass = '')
	{
		if($pass) {
			return password_hash($pass, PASSWORD_DEFAULT);
			
		}
	}

	
} 
