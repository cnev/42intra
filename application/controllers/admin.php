<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		@session_start();
		$this->load->model("admin_model");
	}

	public function index()
	{
		if (!$this->admin_model->is_admin())
			$this->load->view('unauthorized');
		else
		{
			$this->load->view('admin_index');
		}
	}

	public function module($id = NULL)
	{
		if (!$this->admin_model->is_admin())
			$this->load->view('unauthorized');
		else
		{
			if (!$id)
			{
				$data['module_list'] = $this->admin_model->fetch_all_modules();
				$this->load->view('admin_module_index', $data);
			}
			else
			{
				$data['module'] = $this->admin_model->fetch_module($id);
				$this->load->view('admin_module_view', $data);
			}
		}
	}
}
