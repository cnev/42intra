<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('install_model');
	}

	public function setup()
	{
		$this->install_model->setup();
	}
}
