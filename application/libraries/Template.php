<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Template
 *
 * Handling views
 *
 * PHP version 5 or later
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   InstaCloudHost
 * @package    Template
 * @author     Rajesh Sardar <rajeshkumarsardar@gmail.com>
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 */
class Template {

	/**
	 * Initialize Codeigniter Objects
	 * @var mixter
	 */
	protected $CI;


	function __construct()
	{
		$this->CI =& get_instance();
	}

    public function view($data=[])
    {
    	if (!isset($data['data'])) {
    		$data['data'] = [];
    	}
    	$this->CI->load->view('template/header', $data);
    	$this->CI->load->view('template/navbar', $data);
    	$this->CI->load->view('template/sidebar', $data);
        $this->CI->load->view('template/content', $data);
        $this->CI->load->view('template/footer', $data);
    }

}