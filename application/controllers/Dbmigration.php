<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbmigration extends CI_Controller {

	public function index()
	{
                $this->load->library('migration');
                if (is_cli()) {
                        echo "Migrating Now";
                        if ($this->migration->current() === FALSE)
                        {
                                show_error($this->migration->error_string());
                        }
                        echo "Migration Complete";
                } else {
                        echo "Migration is not Proceed. Please Contact Administration.";
                }
	}
}
