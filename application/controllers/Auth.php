<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthDB');
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == TRUE){
			if ($login = $this->auths->login()) {
				$this->session->set_userdata($login);
				$this->AuthDB->profile();
				redirect(base_url('dashboard'));
			} else {
				$this->session->set_flashdata('error', 'Your username and password is wrong');
			}
		}

		$data['page'] = 'auths/login';
		$data['pagetype']['navbar'] = true;
		$data['pagetype']['sidebar'] = true;
		$data['pagetype']['footer'] = true;
		$data['pagetype']['wrapped_content'] = true;

		$this->template->view($data);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}
