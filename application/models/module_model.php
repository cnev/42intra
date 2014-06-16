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
		$str .= '<div>nom</div>';
		$str .= '<input type="text" name="nom">';
		$str .= '<div> description</div>';
		$str .= '<textarea id="descr" class="textfield" name="description" rows=10 cols=50></textarea>';
		$str .= '<div> places</div>';
		$str .= '<input type="text" name="places" >';
		$str .= '<div> debut inscription</div>';
		$str .= '<input type="date" name="debut_inscription">';
		$str .= '<div> fin inscription</div>';
		$str .= '<input type="date" name="fin_inscription">';
		$str .= '<div> debut module</div>';
		$str .= '<input type="date" name="debut_module">';
		$str .= '<div> fin module</div>';
		$str .= '<input type="date" name="fin_module">';
		$str .= '<div> credits</div>';
		$str .= '<input type="text" name="credits">';
		$str .= '</div>';
		return($str);
	}

}
