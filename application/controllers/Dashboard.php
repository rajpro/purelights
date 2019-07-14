<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->auths->permission(['admin', 'employee', 'marketing']);

		$data['page'] = 'dashboard/index';

		$this->template->view($data);
	}
}
