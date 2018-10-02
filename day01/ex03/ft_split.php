#!/usr/bin/php
<?php
	function ft_split($str) 
	{
		$str = trim($str);
		$str = preg_replace('!\s+!', ' ', $str);
		$ret =	explode(" ", $str);
		sort($ret);
		return $ret;
	}
?>