#!/usr/bin/php
<?php
	function ft_split($str) 
	{
		trim($str);
		$str = preg_replace('!\s+!', ' ', $str);
		$ret =	explode(" ", $str);
		sort($ret);
		return $ret;
	}
	unset($argv[0]);
	if (isset($argv))
	{
		$arr = ft_split(implode($argv, ' '));
		foreach ($arr as $var)
			echo $var. "\n";
	}
	else
		echo ("\n");
?>