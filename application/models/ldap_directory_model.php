<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ldap_directory_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		@session_start();
		$this->load->database();
	}

	private function read_entry($row, $key)
	{
		$str = '<td>';
		$str .= $row->$key;
		$str .= '</td>';
		return ($str);
	}

	private function format_entry($row)
	{
		$str = '';
		$str .= $this->read_entry($row, 'login');
		$str .= $this->read_entry($row, 'dob');
		return ($str);
	}

	private function place_selectors()
	{
		$str = '<tr>';
		$str .= '<td>';
		$str .= '<select name="sort">';
		$str .= '<option value="None">None</option>';
		$str .= '<option value="Name">Name</option>';
		$str .= '<option value="Login">Login</option>';
		$str .= '<option value="DOB">DOB</option>';
		$str .= '</select>';
		$str .= '</td>';
		$str .= '<td>';
		$str .= '<select name="order">';
		$str .= '<option value="Ascending">Ascending</option>';
		$str .= '<option value="Descending">Descending</option>';
		$str .= '</select>';
		$str .= '</td>';
		$str .= '<td>';
		$str .= '<input type="submit" name="submit" />';
		$str .= '</td>';
		$str .= '</tr>';
		return ($str);
	}

	private function build_search_query($selectors)
	{
		$sql = 'SELECT * FROM users ';
		if (!$selectors)
			return ($sql);
		$order = ($selectors['order'] == 'Ascending') ? 'ASC' : 'DESC';
		if (isset($selectors['sort']) && $selectors['sort'] == 'Name')
			$sql .= 'ORDER BY `last-name`'.$order.', `first-name` '.$order;
		else if (isset($selectors['sort']) && $selectors['sort'] == 'Login')
			$sql .= 'ORDER BY `login` '.$order;
		else if (isset($selectors['sort']) && $selectors['sort'] == 'DOB')
			$sql .= 'ORDER BY `dob` '.$order;
		return ($sql);
	}

	public function db_search(array $selectors = NULL)
	{
		$sql = $this->build_search_query($selectors);
		$query = $this->db->query($sql);
		$str = '<div><form action="/index.php/ldap_directory/view" method="POST"><table>';
		$str .= $this->place_selectors();
		foreach ($query->result() as $row)
		{
			//print_r($row);
			//die();
			$str .= '<tr>';
			$str .= $this->format_entry($row);
			$str .= '</tr>';
		}
		$str .= '</table></form></div>';
		return ($str);
	}
}
