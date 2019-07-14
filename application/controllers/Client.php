<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ClientDB');
	}

	public function index()
	{
		$this->auths->permission(['admin', 'employee']);
		$post = $this->input->post();
		$config['base_url'] = base_url('client');
		$config['total_rows'] = $this->ClientDB->total_rows($post);
		$config['per_page'] = $perpage = 50;
		$this->pagination->initialize($config);
		
		$page = $this->uri->segment(3,0);

		$data['data']['results'] = $this->ClientDB->pagination($perpage, $page, $post);

		$data['page'] = 'client/index';

		$this->template->view($data);
	}

	public function add()
	{
		$this->auths->permission(['admin', 'employee', 'marketing']);

		if(in_array($this->session->userdata['usertype'], ['admin', 'employee'])) {
			$this->form_validation->set_rules('clt_referral', 'Referral', 'required|numeric|exact_length[6]|callback_check_referral', 
				['check_referral'=>'Please Enter Corrent Promoter ID']
			);
		}
		$this->form_validation->set_rules('clt_full_name', 'Full Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('clt_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('clt_mobile', 'Mobile', 'required|numeric|max_length[10]');
		$this->form_validation->set_rules('clt_aadhar', 'Aadhar', 'required|numeric|max_length[12]');
		$this->form_validation->set_rules('clt_pan', 'Pan', 'required|alpha_numeric|max_length[10]');
		$this->form_validation->set_rules('clt_address', 'Address', 'required|alpha_numeric_spaces|max_length[25]');
		$this->form_validation->set_rules('clt_state', 'State', 'required|is_natural_no_zero|max_length[2]',[
			'is_natural_no_zero' => 'Please choose a state'
		]);
		$this->form_validation->set_rules('clt_district', 'District', 'required|is_natural_no_zero|max_length[2]',[
			'is_natural_no_zero' => 'Please choose a District'
		]);
		$this->form_validation->set_rules('clt_ps', 'Police Station', 'required|alpha|max_length[20]');
		$this->form_validation->set_rules('clt_pin', 'PIN Code', 'required|numeric|max_length[6]');
		$this->form_validation->set_rules('ifsc', 'IFSC', 'required|callback_ifsc_check');
		$this->form_validation->set_rules('account_no', 'Account Number', 'required|numeric|min_length[10]|max_length[20]');

		if($this->form_validation->run() == TRUE){

			$post = $this->input->post();
			$post['clt_bank_detail'] = json_encode(array_merge($this->_get_ifsc($post['ifsc']), ['ACCOUNT'=>$post['account_no']]));
			$post['clt_dob'] = date('Y-m-d', strtotime($post['clt_dob']));
			if(in_array($this->session->userdata['usertype'], ['marketing'])) {
				$post['clt_referral'] = $this->ClientDB->referral()['mrk_referral'];
			}

			unset($post['ifsc'], $post['account_no']);

			if ($this->ClientDB->save($post)) {
				$this->session->set_flashdata('success', 'Successfully Added A New Client');
				redirect(base_url('sale/add'));
			}
		}

		$data['page'] = 'client/add';

		$this->template->view($data);
	}

	public function edit($id)
	{
		$this->auths->permission(['admin']);

		$data['data']['model'] = $this->ClientDB->findRow(['clt_id'=>$id]);

		$this->form_validation->set_rules('clt_full_name', 'Full Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('clt_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('clt_mobile', 'Mobile', 'required|numeric|max_length[10]');
		$this->form_validation->set_rules('clt_aadhar', 'Aadhar', 'required|numeric|max_length[12]');
		$this->form_validation->set_rules('clt_pan', 'Pan', 'required|alpha_numeric|max_length[10]');
		$this->form_validation->set_rules('clt_address', 'Address', 'required|alpha_numeric_spaces|max_length[25]');
		$this->form_validation->set_rules('clt_state', 'State', 'required|is_natural_no_zero|max_length[2]',[
			'is_natural_no_zero' => 'Please choose a state'
		]);
		$this->form_validation->set_rules('clt_district', 'District', 'required|is_natural_no_zero|max_length[2]',[
			'is_natural_no_zero' => 'Please choose a District'
		]);
		$this->form_validation->set_rules('clt_ps', 'Police Station', 'required|alpha|max_length[20]');
		$this->form_validation->set_rules('clt_pin', 'PIN Code', 'required|numeric|max_length[6]');
		$this->form_validation->set_rules('ifsc', 'IFSC', 'required|callback_ifsc_check');
		$this->form_validation->set_rules('account_no', 'Account Number', 'required|numeric|min_length[10]|max_length[20]');

		if($this->form_validation->run() == TRUE){

			// Edit A New Marketing Member
			$post = $this->input->post();
			$post['clt_id'] = $id;
			$post['clt_bank_detail'] = json_encode(array_merge($this->_get_ifsc($post['ifsc']), ['ACCOUNT'=>$post['account_no']]));
			$post['clt_dob'] = date('Y-m-d', strtotime($post['clt_dob']));

			unset($post['ifsc'], $post['account_no']);

			if ($this->ClientDB->update($post)) {
				$this->session->set_flashdata('success', 'Successfully Edited Client');
				redirect(base_url('client/edit/'.$id));
			}
		}

		$data['page'] = 'client/edit';

		$this->template->view($data);
	}

	public function delete($id)
	{
		$this->ClientDB->delete($id);
		redirect(base_url('product'));
	}

	public function check_referral($str)
	{
		if ($this->ClientDB->referral($str)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	private function _get_ifsc($str)
	{
		$url = "https://ifsc.razorpay.com/".$str;
		$ch = curl_init ($url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1) ;
        $res = curl_exec ($ch) ;
		curl_close ($ch) ;
		return (array)json_decode($res);
	}

	public function ifsc_check($str)
	{
		$url = "https://ifsc.razorpay.com/".$str;
		$ch = curl_init ($url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1) ;
        $res = curl_exec ($ch) ;
		curl_close ($ch) ;

		if (strpos($res, 'Not Found')) {
			$this->form_validation->set_message('ifsc_check', 'You Enter Invalic IFSC Code');
			return FALSE;
		} else {
			$this->session->set_flashdata('ifsc',$res);
			return TRUE;
		}
	}

}