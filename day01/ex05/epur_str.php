<?php
	if (isset($argv[1]))
	{
		$str = $argv[1];
		trim($str);
		$str = preg_replace('!\s+!', ' ', $str);
	}
	echo ($str. "\n");
?>