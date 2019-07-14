<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('SaleDB');
	}

	public function index()
	{
		$this->auths->permission(['admin', 'employee']);

		$config['base_url'] = base_url('client');
		$config['total_rows'] = $this->SaleDB->total_rows();
		$config['per_page'] = $perpage = 50;
		$this->pagination->initialize($config);
		
		$page = $this->uri->segment(3,0);

		$data['data']['results'] = $this->SaleDB->pagination($perpage, $page);

		$data['page'] = 'sale/index';

		$this->template->view($data);
	}

	public function view($id)
	{
		$this->auths->permission(['admin', 'employee', 'marketing']);
		
		$data['data']['model'] = $this->SaleDB->sale_detail($id);

		$data['page'] = 'sale/view';

		$this->template->view($data);
	}

	public function add($id)
	{
		$this->auths->permission(['admin', 'marketing']);

		$data['data']['product_id'] = $id;

		$this->form_validation->set_rules('product_id', 'Product Name', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('cheques[]', 'Cheques No', 'required');

		if($this->form_validation->run() == TRUE){

			$post = $this->input->post();
			$post['client_id'] = $id;
			$post['cheques'] = json_encode($post['cheques']);

			if ($this->SaleDB->save($post)) {
				$this->session->set_flashdata('success', 'Successfully Added A New Sale');
				redirect(base_url('sale'));
			}
		}

		$data['data']['products'] = $this->SaleDB->products();

		$data['page'] = 'sale/add';

		$this->template->view($data);
	}

	public function bill($id)
	{
		$this->auths->permission(['admin', 'employee', 'marketing']);
		
		$data['data']['model'] = $this->SaleDB->sale_detail($id);

		$data['page'] = 'sale/bill';

		$data['pagetype']['navbar'] = true;
		$data['pagetype']['sidebar'] = true;
		$data['pagetype']['footer'] = true;
		$data['pagetype']['wrapped_content'] = true;

		$this->template->view($data);
	}

	public function check_cheques ($array) {
		print_r($array);
		exit();
		foreach ($array as $value) {
			if (empty($value)) {
				return FALSE;
			}
		}
		return TRUE;
	}

	public function edit($id)
	{
		$this->auths->permission(['admin']);

		$data['data']['model'] = $this->ClientDB->findRow(['id'=>$id]);

		$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('price', 'Price', 'required|numeric|max_length[8]');
		$this->form_validation->set_rules('base_price', 'Base Price', 'required|numeric|max_length[8]');
		$this->form_validation->set_rules('firm_type', 'Firm Type', 'required|alpha');
		$this->form_validation->set_rules('subsidy', 'Subsidy', 'required|numeric|max_length[2]');
		$this->form_validation->set_rules('emi', 'EMI', 'required|numeric|max_length[2]');

		if($this->form_validation->run() == TRUE){

			// Edit A New Marketing Member
			$post = $this->input->post();
			$post['id'] = $id;

			if ($this->ClientDB->update($post)) {
				$this->session->set_flashdata('success', 'Successfully Edited Product');
				redirect(base_url('product/edit/'.$id));
			}
		}

		$data['page'] = 'product/edit';

		$this->template->view($data);
	}

	public function delete($id)
	{
		$this->ClientDB->delete($id);
		redirect(base_url('product'));
	}

}