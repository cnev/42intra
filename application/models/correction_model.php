<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Correction_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function generate_form()
	{
		$str = '<div id="form"><form action="" method="POST">';
		$file = fopen('worknotes/bareme/bareme_wolf3d.txt', 'r');
		if (!$file)
			die('bad');
		$xox = 0;
		while($ret = fgets($file))
			{
				if ($ret == '#END_OF_THE_LINE#'.PHP_EOL)
					break ;
				$xox++;
				$str .= '<div id="category">';
				$ret = fgets($file);
				$str .= '<div id="name">'.$ret.'</div>';
				$str .= '<div id="desc">'.PHP_EOL;
				while ($ret = fgets($file))
				{
					if ($ret != 'desc>'.PHP_EOL)
					{
						if ($ret == '<desc'.PHP_EOL)
							break ;
						$str .= $ret.'<br />';
					}
				}
				$str .= '</div>';
				$ret = fgets($file);
				$nb_note = intval(substr($ret, 6));
				$str .= "<textarea id='descr' class='textfield' name='descr' rows=10 cols=50></textarea>".PHP_EOL;
				$str .= '<div id="pts"><select name="note">';
				for($i = 0; $i < $nb_note; $i++)
				{
					$ret = fgets($file);
					$str .= '<option value="'.$ret.'">'.$ret.'</option>';
				}
				$str .= '</select></div>';
				$str .= '</div>';
				$ret = fgets($file);
			}

		return($str);
	}
}
?>