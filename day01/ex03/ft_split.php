<?php
	function ft_split($str) 
	{
		$str = trim($str);
		$ret =	explode(" ", $str);
		sort($ret);
		return $ret;
	}
?>