<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ProductDB');
	}

	public function index()
	{
		$this->auths->permission(['admin']);

		$config['base_url'] = base_url('product');
		$config['total_rows'] = $this->ProductDB->total_rows();
		$config['per_page'] = $perpage = 50;
		$this->pagination->initialize($config);
		
		$page = $this->uri->segment(3,0);

		$data['data']['results'] = $this->ProductDB->pagination($perpage, $page);

		$data['page'] = 'product/index';

		$this->template->view($data);
	}

	public function add()
	{
		$this->auths->permission(['admin']);

		$this->form_validation->set_rules('prd_name', 'Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('prd_price', 'Price', 'required|numeric|max_length[8]');
		$this->form_validation->set_rules('prd_base_price', 'Base Price', 'required|numeric|max_length[8]');
		$this->form_validation->set_rules('prd_firm_type', 'Firm Type', 'required|alpha');
		$this->form_validation->set_rules('prd_subsidy', 'Subsidy', 'required|numeric|max_length[2]');
		$this->form_validation->set_rules('prd_emi', 'EMI', 'required|numeric|max_length[2]');

		if($this->form_validation->run() == TRUE){

			$post = $this->input->post();

			if ($this->ProductDB->save($post)) {
				$this->session->set_flashdata('success', 'Successfully Created New Product');
				redirect(base_url('marketing/add'));
			}
		}

		$data['page'] = 'product/add';

		$this->template->view($data);
	}

	public function edit($id)
	{
		$this->auths->permission(['admin']);

		$data['data']['model'] = $this->ProductDB->findRow(['prd_id'=>$id]);

		$this->form_validation->set_rules('prd_name', 'Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('prd_price', 'Price', 'required|numeric|max_length[8]');
		$this->form_validation->set_rules('prd_base_price', 'Base Price', 'required|numeric|max_length[8]');
		$this->form_validation->set_rules('prd_firm_type', 'Firm Type', 'required|alpha');
		$this->form_validation->set_rules('prd_subsidy', 'Subsidy', 'required|numeric|max_length[2]');
		$this->form_validation->set_rules('prd_emi', 'EMI', 'required|numeric|max_length[2]');

		if($this->form_validation->run() == TRUE){

			// Edit A New Marketing Member
			$post = $this->input->post();
			$post['prd_id'] = $id;

			if ($this->ProductDB->update($post)) {
				$this->session->set_flashdata('success', 'Successfully Edited Product');
				redirect(base_url('product/edit/'.$id));
			}
		}

		$data['page'] = 'product/edit';

		$this->template->view($data);
	}

	public function delete($id)
	{
		$this->ProductDB->delete($id);
		redirect(base_url('product'));
	}

}