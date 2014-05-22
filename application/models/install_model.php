<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function create_ldap_table()
	{
		$this->db->query('DROP TABLE IF EXISTS users');
		$this->db->query('CREATE TABLE IF NOT EXISTS users
		(
			id INT NOT NULL AUTO_INCREMENT,
			`last-name` varchar(256) NOT NULL,
			`first-name` varchar(256) NOT NULL,
			login varchar(8) NOT NULL,
			dob date NOT NULL,
			photo longblob,
			phone varchar(12) NOT NULL,
			piscine varchar (256) NOT NULL,
			access enum("member", "admin") DEFAULT "member",
			PRIMARY KEY (id)
		);');
	}

	private function convert_to_date($str)
	{
		$date = substr($str, 0, 4).'-'.substr($str, 4, 2).'-'.substr($str, 6, 2);
		return ($date);
	}

	private function setup_ldap()
	{
		include_once("ldap.php");
		$this->create_ldap_table();
		$ldapserver = 'ldap.42.fr';
		$ldapport = 389;
		$ldapconn = ldap_connect($ldapserver, 389) or die("FAIL");
		$ldaprdn  = $ldap_rdn;
		$ldappass = $ldap_pw;
		if ($ldapconn)
		{
			ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
			$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
			if ($ldapbind)
				echo "Connexion LDAP reussie...";
			else
				die("Connexion LDAP echouee...");
		}
		$dn = "ou=2013,ou=people,dc=42,dc=fr";
		//$person = "Clement";
		$filter="(&(first-name=*)(!(close=non*)))";
		$justthese = array("first-name", "last-name", "uid", "birth-date", "picture", "mobile-phone");
		$sr = ldap_search($ldapconn, $dn, $filter, $justthese);
		$info = ldap_get_entries($ldapconn, $sr);
		for ($i=0; $i<$info["count"]; $i++)
		{
			//echo '<div>'.$info[$i]["first-name"][0].' '.$info[$i]["last-name"][0].'</div>';
			if (isset($info[$i]["last-name"]) && isset($info[$i]["first-name"]) && isset($info[$i]["uid"])
				&& isset($info[$i]["birth-date"]) && isset($info[$i]["mobile-phone"]))
			{
				$lname = $this->db->escape($info[$i]["last-name"][0]);
				$fname = $this->db->escape($info[$i]["first-name"][0]);
				$login = $this->db->escape($info[$i]["uid"][0]);
				$dob = $this->db->escape($this->convert_to_date($info[$i]["birth-date"][0]));
				$phone = $this->db->escape($info[$i]["mobile-phone"][0]);
				if (isset($info[$i]["picture"]))
				{
					$photo = $this->db->escape($info[$i]["picture"][0]);
					$sql = 'INSERT INTO users (`last-name`, `first-name`, login, dob, phone, photo)
					VALUES ('.$lname.','.$fname.','.$login.','.$dob.','.$phone.','.$photo.');';
				}
				else
				{
					$sql = 'INSERT INTO users (`last-name`, `first-name`, login, dob, phone)
					VALUES ('.$lname.','.$fname.','.$login.','.$dob.','.$phone.');';
				}
				$this->db->query($sql);
			}
		}
		$this->db->query('UPDATE users SET access="admin" WHERE login="cnev"');
	}

	public function setup()
	{
		$this->setup_ldap();
	}
}
