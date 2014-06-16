<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'Born To Feed';
		$this->load->view('student_index', $data);
	}

	public function create()
	{
		$data['form'] = $this->module_model->generate_form();
		$this->load->view('module_form', $data);
	}

	public function view()
	{

	}
}
