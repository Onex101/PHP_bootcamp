<?php
	function ft_is_sort($arr)
	{
		$tmp = $arr;
		sort($tmp);
		foreach($arr as $key => $value)
		{
			if ($value != $tmp[$key])
				return false;
		}
		return true;
	}
	$tab = array("hello", "this", "is", "a", "unsorted", "array");
	$lnk = array("1", "2", "3", "4", "5", "6", "7", "8");
?>