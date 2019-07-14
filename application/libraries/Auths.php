<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Login library
 *
 * Handel the Authentication Mechanism
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
 * @package    Auth
 * @author     Rajesh Sardar <rajeshkumarsardar@gmail.com>
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 */
class Auths {

	/**
	 * Initialize Codeigniter Objects
	 * @var mixter
	 */
	protected $CI;

	/**
	 * Table Name
	 * @var string
	 */
	protected $table = 'users';


	function __construct()
	{
		$this->CI =& get_instance();
		$this->table = $this->CI->db->dbprefix.$this->table;
	}

	/**
	 * Check username and password
	 * @return mixed [FALSE or User Data]
	 */
    public function login()
    {
    	extract($this->CI->input->post());
    	$user_account = $this->CI->db->get_where($this->table,['username'=>$username])->row_array();
		
    	if (!empty($user_account)) {
    		if (password_verify($password, $user_account['password'])) {
				unset($user_account['password']);
    			return $user_account;
    		}
    	}
    	
    	return false;

    }

    public function register()
    {
    	
    }

    public function forgot_password()
    {
    	
    }

    public function email_verify()
    {
    	
    }

    public function permission($usertypes=[])
    {
        if ($this->CI->session->userdata('status') == 'active') {
            if (!in_array($this->CI->session->userdata('usertype'), $usertypes)) {
                redirect(base_url('dashboard'));
            }
        } else {
            $this->CI->session->sess_destroy();
            redirect(base_url('login'));
        }
    }
}