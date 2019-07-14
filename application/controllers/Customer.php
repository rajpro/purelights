<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('MarketingDB');
	}

	public function index()
	{
		$this->auths->permission(['admin', 'marketing']);

		$config['base_url'] = base_url('marketing');
		$config['total_rows'] = $this->MarketingDB->total_rows();
		$config['per_page'] = $perpage = 50;
		$this->pagination->initialize($config);
		
		$page = $this->uri->segment(3,0);

		$data['data']['results'] = $this->MarketingDB->pagination($perpage, $page);

		$data['page'] = 'marketing/index';

		$this->template->view($data);
	}

	public function add()
	{
		$this->auths->permission(['admin', 'marketing']);

		$this->form_validation->set_rules('full_name', 'Full Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('state', 'State', 'required|is_natural_no_zero',
			['is_natural_no_zero' => 'Please Choose a state']);
			$this->form_validation->set_rules('district', 'District', 'required|is_natural_no_zero',
			['is_natural_no_zero' => 'Please Choose a District']);
		$this->form_validation->set_rules('ifsc', 'IFSC', 'required|callback_ifsc_check');
		$this->form_validation->set_rules('account_no', 'Account Number', 'required|numeric|min_length[10]|max_length[20]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

		if($this->form_validation->run() == TRUE){

			// Add A New Marketing Member
			$post = $this->input->post();
			$post['address'] = json_encode(['address'=>$post['address'], 'state'=>$post['state'], 'district'=>$post['district']]);
			$post['bank_detail'] = json_encode(array_merge($this->_get_ifsc($post['ifsc']), ['ACCOUNT'=>$post['account_no']]));
			$post['referral'] = $this->MarketingDB->referral();
			$post['referred_by'] = $this->MarketingDB->referred_by();
			$post['level'] = $this->MarketingDB->level();
			$post['status'] = 'deactive';
			
			// username password
			$user['username'] = $post['referral'];
			$user['password'] = password_hash($post['password'], PASSWORD_BCRYPT, ['cost'=>12]);
			$user['usertype'] = 'marketing';
			$user['email'] = $post['referral']."@purelights.in";
			$user['status'] = 'deactive';

			unset($post['state'], $post['district'], $post['ifsc'], $post['account_no'], $post['password']);

			if ($this->MarketingDB->save($post)) {
				$user['profile_id'] = $this->db->insert_id();
				$this->MarketingDB->save_credential($user);
				$this->session->set_flashdata('success', 'Successfully Created New Marketing Member');
				redirect(base_url('marketing/add'));
			}
		}

		$data['page'] = 'marketing/add';

		$this->template->view($data);
	}

	public function edit($id)
	{
		$this->auths->permission(['admin', 'marketing']);

		$data['data']['model'] = $this->MarketingDB->findRow(['id'=>$id]);

		$this->form_validation->set_rules('full_name', 'Full Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('state', 'State', 'required|is_natural_no_zero',
			['is_natural_no_zero' => 'Please Choose a state']);
			$this->form_validation->set_rules('district', 'District', 'required|is_natural_no_zero',
			['is_natural_no_zero' => 'Please Choose a District']);
		$this->form_validation->set_rules('ifsc', 'IFSC', 'required|callback_ifsc_check');
		$this->form_validation->set_rules('account_no', 'Account Number', 'required|numeric|min_length[10]|max_length[20]');

		if($this->form_validation->run() == TRUE){

			// Edit A New Marketing Member
			$post = $this->input->post();
			$post['id'] = $id;
			$post['address'] = json_encode(['address'=>$post['address'], 'state'=>$post['state'], 'district'=>$post['district']]);
			$post['bank_detail'] = json_encode(array_merge($this->_get_ifsc($post['ifsc']), ['ACCOUNT'=>$post['account_no']]));
			
			// username password
			$user['profile_id'] = $id;
			if (!empty($post['password'])) {
				$user['password'] = password_hash($post['password'], PASSWORD_BCRYPT, ['cost'=>12]);
			}
			$user['status'] = $post['status'];

			unset($post['state'], $post['district'], $post['ifsc'], $post['account_no'], $post['password']);

			if ($this->MarketingDB->update($post)) {
				$this->MarketingDB->update_credential($user);
				$this->session->set_flashdata('success', 'Successfully Editec Marketing Member');
				redirect(base_url('marketing/edit/'.$id));
			}
		}

		$data['page'] = 'marketing/edit';

		$this->template->view($data);
	}

	public function delete($id)
	{
		$this->MarketingDB->delete($id);
		$this->MarketingDB->delete_credential($id);
		redirect(base_url('marketing'));
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