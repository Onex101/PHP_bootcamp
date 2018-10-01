<?php
	unset($argv[0]);
	// if (isset($argv[0]))
	// {
	$str = trim(implode($argv, ' '));
	$str = preg_replace('!\s+!', ' ', $str);
	$arr = explode(" ", $str);
	natcasesort($arr);
	foreach ($arr as $var)
		echo $var. "\n";
	// }
	// else
	// 	echo ("\n");
?>