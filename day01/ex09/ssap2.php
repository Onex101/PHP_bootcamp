#!/usr/bin/php
<?php
	function ft_sort($arr)
	{
		$alpha = array();
		$num = array();
		$spc = array();
		$i = -1;
		$z = 0;
		while (isset($arr[++$i]))
		{
			if (!is_numeric($arr[$i]) && !preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬:-]/', $arr[$i]))
			{
				$str = $arr[$i];
				if (is_numeric(substr($str, 0, 1)))
				{
					$digit = (float)$arr[$i];
					array_push($num, $digit);
				}
				else
					array_push($alpha, $arr[$i]);
			}
			else if (is_numeric($arr[$i]))
			{
				$digit = (float)$arr[$i];
				array_push($num, $digit);
			}
			else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $arr[$i]))
			{
				// if (!preg_match("/^[a-z]$/i", $arr[$i][0])) 
				// 	array_push($alpha, $arr[$i]);
				// else
					array_push($spc, $arr[$i]);
			}
		}
		natcasesort($alpha);
		natcasesort($num);
		natcasesort($spc);
		$tmp = array_merge($alpha, $num);
		$tmp = array_merge($tmp, $spc);
		return $tmp;
	}
	unset($argv[0]);
	if (isset($argv))
	{
		$str = implode($argv, ' ');
		$str = trim($str);
		$str =  preg_replace('!\s+!', ' ', $str);
		$arr = explode(" ", $str);
		$arr = ft_sort($arr);
		foreach ($arr as $var)
			echo $var. "\n";
	}
	else
		echo ("\n");
?>