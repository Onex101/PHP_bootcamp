<?php
	function ft_sort($arr)
	{
		$alpha = array();
		$num = array();
		$spc = array();
		$i = -1;
		while (isset($arr[++$i]))
		{
			if (!is_numeric($arr[$i]) && !preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $arr[$i]))
				array_push($alpha, $arr[$i]);
			else if (is_numeric($arr[$i]))
				array_push($num, $arr[$i]);
			else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $arr[$i]))
				array_push($spc, $arr[$i]);
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