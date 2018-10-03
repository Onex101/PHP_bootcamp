#!/usr/bin/php
<?php
	$arr = array();
	$file = "/var/run/utmpx";
	if (!($fd = fopen ($file, 'rb')))
		return 0;
	$read = fread($fd, filesize($file));
	$start = 1256;
	while ($start < filesize($file))
	{
		$user = unpack("A32", $read, $start);
		$device = unpack("A32", $read, $start + 260);
		$type = unpack("s2", $read, $start + 296);
		$date = unpack("L8", $read, $start + 300);
		// print_r($type);
		if ($type[1] == 7)
			array_push($arr, $user[1]." ".$device[1]." ".gmdate("M d H:i", $date[1] + 7200));
		$start += 628;
	}
	foreach ($arr as $usr)
		if ($usr)
			echo $usr, "\n";
	// print_r($arr);
?>
