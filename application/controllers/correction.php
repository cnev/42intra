<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Correction extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('correction_model');
	}

	public function view()
	{
		$data['form'] = $this->correction_model->generate_form();
		$this->load->view('correction_form', $data);
	}
}
