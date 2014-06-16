<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('activity_model');
	}

	public function view($id = -1)
	{
		$data['title'] = 'Born to View this Module';
		$data['infos'] = $this->activity_model->fetch_module_data($id);
		$this->load->view('activity_view', $data);
	}

	public function index()
	{
		$data['title'] = 'Born To Feed';
		$this->load->view('student_index', $data);
	}
}
