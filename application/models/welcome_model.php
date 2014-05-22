<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		@session_start();
		$this->load->database();
	}

	public function is_logged()
	{
		if (!isset($_SESSION['login']))
			return (FALSE);
		return (TRUE);
	}

	public function is_admin()
	{
		if (!isset($_SESSION['access']))
			return (FALSE);
		if ($_SESSION['access'] != 'admin')
			return (FALSE);
		return (TRUE);
	}
}

/*

LOGIN => $_SESSION
$-SESSION['login'] = $login;
$_SESSION['access'] = 'admin' | 'student';

*/
