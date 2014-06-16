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
}
