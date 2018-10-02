<?php
	function ft_natsort($a, $b)
	{
		if(is_numeric($a) && !is_numeric($b))
			return 1;
		else if(!is_numeric($a) && is_numeric($b))
			return -1;
		else if (ctype_alnum($a) && is_numeric($b))
			return 1;
		else if (ctype_alnum($a) && !is_numeric($b))
			return 1;
		else if (!ctype_alnum($a) && is_numeric($b))
			return 1;
		else if (is_numeric($a) && !ctype_alnum($b))
			return -1;
		else if (!is_numeric($a) && ctype_alnum($b))
			return 1;
		else
			return ($a < $b) ? -1 : 1;
	}
	unset($argv[0]);
	if (isset($argv))
	{
		$str = implode($argv, ' ');
		$str = trim($str);
		$str =  preg_replace('!\s+!', ' ', $str);
		$arr = explode(" ", $str);
		usort($arr, "ft_natsort");
		foreach ($arr as $var)
			echo $var. "\n";
	}
	else
		echo ("\n");
?>