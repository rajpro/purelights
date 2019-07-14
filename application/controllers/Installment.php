<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Installment extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('InstallmentDB');
	}

	public function index()
	{
		$this->auths->permission(['admin', 'employee']);

		$data['data']['results'] = $this->InstallmentDB->panding_installment();

		$data['page'] = 'installment/index';

		$this->template->view($data);
	}

	public function add($id)
	{
		$this->auths->permission(['admin', 'marketing', 'employee']);

		$data['data']['sales'] = $this->InstallmentDB->bills($id);
		$data['data']['ledger'] = $this->InstallmentDB->ledger($data['data']['sales']);
		$data['page'] = 'installment/add';

		$this->template->view($data);
	}

	public function add_install($id)
	{
		$this->auths->permission(['admin', 'marketing', 'employee']);
		$post = $this->input->post();
		$post['lg_sale_id'] = $id;
		$post['lg_bill_type'] = 'emi';
		if ($this->InstallmentDB->save_installment($post)) {
			$this->session->set_flashdata('success', 'Successfully Paid Installment');
			redirect(base_url('client'));
		}
	}

}