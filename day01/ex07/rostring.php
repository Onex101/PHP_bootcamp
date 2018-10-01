<?php
	$str = trim($argv[1]);
	$str = preg_replace('!\s+!', ' ', $str);
	$arr = explode(" ", $str);
	$tmp = $arr[0];
	unset($arr[0]);
	foreach($arr as $var)
		echo $var. " ";
	echo $tmp. "\n";
?>