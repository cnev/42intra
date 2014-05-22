<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function log_in()
	{
		if ($this->login_model->auth($_POST['login'], $_POST['pwd']))
		{
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['access'] = $this->login_model->get_access();
			if ($_SESSION['access'] == 'admin')
				header("Location: /index.php/admin/index");                      
			else
				header("Location: /index.php/student/index"); 
		}
		else
		{
			$this->load->view('login_fail');
		}
	}
}