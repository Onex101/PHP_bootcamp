#!/usr/bin/php
<?php
	if ($argc != 4)
	{
		echo "Incorrect Parameters\n";
		return ;
	}
	unset($argv[0]);
	$str = implode($argv, ' ');
	$str = trim($str);
	$str = preg_replace('/\s+/', ' ', $str);
	$arr = explode(' ', $str);
	switch($arr[1])
	{
		case "+":
			$p = $arr[0] + $arr[2];
			break;
		case "-":
			$p = $arr[0] - $arr[2];
			break;
		case "*":
			$p = $arr[0] * $arr[2];
			break;
		case "/":
			if ($arr[2] == 0)
			{
				echo "Division by zero";
				break;
			}
			$p = $arr[0] / $arr[2];
			break;
		case "%":
			if ($arr[2] == 0)
			{
				echo "Division by zero";
				break;
			}
			$p = $arr[0] / $arr[2];
			break;
	}
	echo $p. "\n";
?>