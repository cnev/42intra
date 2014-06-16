<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function is_admin()
	{
		if (!isset($_SESSION['login']) || ($_SESSION['access'] != 'admin'))
			return (FALSE);
		return (TRUE);
	}

	public function generate_form()
	{
		$str = '<div id="form"><form action="" method="POST">';
		$str = '<div id="nom">' . '</div>';
		$str = '</div>';
		return($str);
	}

}
