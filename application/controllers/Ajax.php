<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('AjaxDB');
	}

	public function find_district()
	{
        	$state = $this->input->post('state');
        	echo dropdown_input('District', 'district', $this->config->item('state'.$state));
	}

	public function noofcheques()
	{
		$product_id = $this->input->post('product_id');
		if ($product_id == 0) {
			echo "Please select valid package";
		} else {
			$result = $this->AjaxDB->cheques($product_id);
			$string = "";
			for ($i=0; $i < $result['prd_emi']; $i++) {
				$string .= "<input class='form-control' name='cheques[]' placeholder='Enter Cheque No' />";
			}
			echo $string;
		}
		exit();
	}
}
