#!/usr/bin/php
<?php

	function validateDate($date, $format = 'Y-m-d')
	{
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) === $date;
	}
	if ($argc == 2)
	{
		$arr = explode(" ", $argv[1]);
		
		$day = array("Monday"=>"lundi", "Tuesday"=>"mardi", "Wednesday"=>"mercredi", "Thursday"=>"jeudi", "Friday"=>"vendredi", "Saturday"=>"samadi", "Sunday"=>"dimache");
		$month = array("01"=>"janvier", "02"=>"février", "03"=>"mars", "04"=>"avril", "05"=>"mai", "06"=>"juin", "07"=>"juillet", "08"=>"aout", "09"=>"septembre", "10"=>"octobre", "11"=>"novembre", "12"=>"décembre");
		// print_r($day);
		// print_r($month);
		$arr[0] = lcfirst($arr[0]);
		// print_r($arr);
		if	(in_array($arr[0], $day))
		{
			$key = array_search($arr[0], $day);
			if (is_numeric($arr[1]) && ($arr[1] <= 31 && $arr[1] > 0))
			{
				$arr[2] = lcfirst($arr[2]);
				$str = array_search($arr[2], $month);
				if (is_numeric($str))
				{
					// echo $arr[4];
					if (strlen($arr[3]) == 4 && is_numeric($arr[3]) && $arr[3] > 1969)
					{
						// echo $arr[4];
						$str = $arr[3]."-".$str."-".$arr[1]." ".$arr[4];
						if (validateDate($str, 'Y-m-d G:i:s') !== FALSE) 
						{
							if ($str = strtotime($key." ".$str))
							{
								echo $str,"\n";
								return;
							}
							else
							{
								echo "Wrong Format\n";
								return ;
							}
						}
						
						echo "Wrong Format\n";
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