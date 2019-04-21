<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ForgotPassword extends Admin_Controller
{

	// public function index()
	// {

	// $this->load->view('reg/reg.php');
	// }

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = 'Forgot Password';
		$this->load->model('model_reg');
	}
	/**
	 * forgot
	 *
	 * @return void
	 */
	public function forgot()
	{
		$this->logged_in();

		$this->form_validation->set_rules('email', 'Email', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$email = $this->input->post('email');
			$findemail = $this->model_reg->ForgotPasswordEmailCheck($email);
			if ($findemail) {
				$mail = $this->model_reg->sendpassword($findemail);
				if ($mail) {
					$this->session->set_flashdata('success', 'New Password has been sent to ' . $findemail['email'] . ' successfully');
					redirect('auth/login', 'refresh');
				}
			} else {
				$this->data['errors'] = $email . ' not found, please enter correct email id';
				$this->load->view('forgotPassword/forgotPassword', $this->data);
			}
		} else {
			// false case
			$this->load->view('forgotPassword/forgotPassword');
		}
	}

	public function password_hash($pass = '')
	{
		if ($pass) {
			return password_hash($pass, PASSWORD_DEFAULT);
		}
	}
}
