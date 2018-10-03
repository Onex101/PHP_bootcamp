#!/usr/bin/php
<?php
	function is_sort($a, $b)
	{
		$a = strtolower($a);
		$b = strtolower($b);
		$arr = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
		$length = min(strlen($a), strlen($b));
		for ($i = 0; $i < $length; $i++)
		{
			$aa = substr($a, $i, 1);
			$bb = substr($b, $i, 1);
			$ia = array_search($aa, $arr);
			$ib = array_search($bb, $arr);
			if ($ia === false)
				$ia = ord($aa) + 100;
			if ($ib === false)
				$ib = ord($bb) + 100;
			if ($ib < $ia)
				return false;
			if ($ib > $ia)
				return true;
		}
		if (strlen($a) <= strlen($b))
			return true;
		else
			return false;
	}
	$array = array();
	unset($argv[0]);
	foreach($argv as $v)
	{
		$tmp = explode(" ", $v);
		foreach ($tmp as $v2)
			if ($v2)
				$array[] = $v2;
	}
	for ($i = 0; $i < count($array) - 1;)
	{
		if (is_sort($array[$i], $array[$i + 1]))
			$i++;
		else 
		{
			$temp = $array[$i];
			$array[$i] = $array[$i + 1];
			$array[$i + 1] = $temp;
			$i = 0;
		}
	}
	foreach ($array as $v)
		echo $v."\n";
?>