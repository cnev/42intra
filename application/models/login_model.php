<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		@session_start();
		$this->load->database();
	}

	public function auth($login, $pw)
	{
		$ldapserver = 'ldap.42.fr';
		$ldapport = 389;
		$ldapconn = ldap_connect($ldapserver, 389) or die("FAIL");
		$ldaprdn  = 'uid='.$login.',ou=2013,ou=people,dc=42,dc=fr';
		$ldappass = $pw;
		if ($ldapconn)
		{
			@ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
			$ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);
			if ($ldapbind)
				return (TRUE);
			else
				return (FALSE);
		}
	}

	public function	get_access()
	{
		$query = $this->db->query('SELECT * FROM users WHERE login='.'\''.$_SESSION['login'].'\'');
		foreach ($query->result() as $row)
		{
			return ($row->access);
		}
	}
}
