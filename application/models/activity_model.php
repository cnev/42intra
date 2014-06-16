<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity_model extends CI_Model
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

	public function fetch_activity_data($id)
	{
		$arr = array();
		if ($id != -1)
			$this->db->where('id', $id);
		$query = $this->db->get('activites');
		if ($id == -1)
		{
			foreach ($query->result_array() as $row)
			{
				$arr[] = $row;
			}
		}
		else
		{
			$arr[] = $query->result_array();
		}
		return ($arr);
}
