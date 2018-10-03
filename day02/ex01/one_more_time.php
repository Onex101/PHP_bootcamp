<?php
	function isValidTime($time, $format = 'h:m:s') {
		$dateObj = DateTime::createFromFormat($format, $time);
		return $dateObj && $dateObj->format($format) == $time;
	}

	$arr = explode(" ", $argv[1]);
	
	$day = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samadi", "dimache");
	$month = array("01"=>"janvier", "02"=>"février", "03"=>"mars", "04"=>"avril", "05"=>"mai", "06"=>"juin", "07"=>"juillet", "08"=>"aout", "09"=>"septembre", "10"=>"octobre", "11"=>"novembre", "12"=>"décembre");
	print_r($day);
	print_r($month);
	$arr[0] = lcfirst($arr[0]);
	print_r($arr);
	if	(in_array($arr[0], $day))
	{
		if (is_numeric($arr[1]) && ($arr[1] <= 31 && $arr[1] > 0))
		{
			lcfirst($arr[2]);
			$str = array_search($arr[2], $month);
			if (isset($str))
			{
				if (strlen($arr[3]) == 4 && is_numeric($arr[3]) && $arr[3] > 1969)
				{
					echo $arr[4];
					if (DateTime::createFromFormat('h:m:s',  $arr[4]))
					{
						$str = $arr[3]."-".$str."-".$arr[1]." ".$arr[4];
						echo $str;
					}
					else
					{
						echo "No time";
						return;
					}
				}
				else
				{
					echo "No year";
					return;
				}
			}
			else
			{
				echo "No month";
				return;
			}
		}
		else
		{
			echo "No day date";
			return;
		}
	}
	else
	{
		echo "No day";
		return;
	}
?>