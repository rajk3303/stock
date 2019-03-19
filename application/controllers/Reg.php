<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg extends Admin_Controller 
{
	
	public function index()
	{

	$this->load->view('reg/reg.php');
	$this->load->model('model_reg');

		/* if(!in_array('viewUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$user_data = $this->model_users->getUserData();

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

			$group = $this->model_users->getUserGroup($v['id']);
			$result[$k]['user_group'] = $group;
		}

		$this->data['user_data'] = $result;

		$this->render_template('users/index', $this->data); */
		
		// $data['data']='Registration Controller';
		// $this->load->view('reg.html');
		

	}
	
	 /* public function __construct()
	{
		parent::__construct();

		 $this->not_logged_in();
		
		$this->data['page_title'] = 'Registraion';
		
		$this->load->model('model_registration');
		// $this->load->model('model_users');
		// $this->load->model('model_groups');
	}   */

	
	

	 public function create()
	{
		// if(!in_array('createUser', $this->permission)) {
		// 	redirect('dashboard', 'refresh');
		// }

		$this->form_validation->set_rules('groups', 'Group', 'required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('fname', 'First name', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $password = $this->password_hash($this->input->post('password'));
        	$data = array(
        		'username' => $this->input->post('username'),
        		'password' => $password,
        		'email' => $this->input->post('email'),
        		'firstname' => $this->input->post('fname'),
        		'lastname' => $this->input->post('lname'),
        		'phone' => $this->input->post('phone'),
        		'gender' => $this->input->post('gender'),
        	);

        	$create = $this->model_reg->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
				redirect('auth/login', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('users/create', 'refresh');
        	}
        }
        else {
            // false case
        	$group_data = $this->model_groups->getGroupData();
        	$this->data['group_data'] = $group_data;

            // $this->render_template('users/create', $this->data);
        }	

		
	}

	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}

	
} 