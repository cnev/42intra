<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		@session_start();
		$this->load->model("welcome_model");
	}
	public function index()
	{
		if (!$this->welcome_model->is_logged())
			$this->load->view('guest_index');
		else if (!$this->welcome_model->is_admin())
			header("Location: /index.php/admin/index");
		else
			header("Location: /index.php/student/index");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
