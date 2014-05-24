<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ldap_directory extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ldap_directory_model');
	}

	public function view()
	{
		$selectors = $_POST;
		$data['directory'] = $this->ldap_directory_model->db_search($selectors);
		$this->load->view('directory', $data);
	}
}
