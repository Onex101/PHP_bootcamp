#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$arr = explode(" ", $argv[1]);
		
		$day = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samadi", "dimache");
		$month = array("01"=>"janvier", "02"=>"février", "03"=>"mars", "04"=>"avril", "05"=>"mai", "06"=>"juin", "07"=>"juillet", "08"=>"aout", "09"=>"septembre", "10"=>"octobre", "11"=>"novembre", "12"=>"décembre");
		// print_r($day);
		// print_r($month);
		$arr[0] = lcfirst($arr[0]);
		// print_r($arr);
		if	(in_array($arr[0], $day))
		{
			if (is_numeric($arr[1]) && ($arr[1] <= 31 && $arr[1] > 0))
			{
				$arr[2] = lcfirst($arr[2]);
				$str = array_search($arr[2], $month);
				if (is_numeric($str))
				{
					if (strlen($arr[3]) == 4 && is_numeric($arr[3]) && $arr[3] > 1969)
					{
						// echo $arr[4];
						$str = $arr[3]."-".$str."-".$arr[1]." ".$arr[4];
						if (DateTime::createFromFormat('Y-m-d G:i:s', $str) !== FALSE) 
						{
							echo strtotime($str),"\n";
						}
						else
						{
							echo "Wrong Format\n";
							return ;
						}
					}
					else
					{
						echo "Wrong Format\n";
						return;
					}
				}
				else
				{
					echo "Wrong Format\n";
					return;
				}
			}
			else
			{
				echo "Wrong Format\n";
				return;
			}
		}
		else
		{
			echo "Wrong Format\n";
			return;
		}
	}
?>