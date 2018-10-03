#!/usr/bin/php
<?php
if (isset($argv[1]))
{
	$i = -1;
	$content = file_get_contents($argv[1]);
	{
		while (++$i < strlen($content))
		{
			echo $i."\n";
			if ($i = strpos($content, "title=", $i))
			{
				while ($content[$i] !== "\"")
					$i++;
				while ($content[++$i] !== "\"")
				{
					$content[$i] = strtoupper($content[$i]);
				}
			}
			else
				break ;
		}
		$i = -1;
		while (++$i < strlen($content))
		{
			if($i = strpos($content, "<a", $i))
			{
				while ($content[$i] !== ">")
					$i++;
				while ($content[++$i] !== "<")
				{
					$content[$i] = strtoupper($content[$i]);
					echo $content[$i]."\n";
				}
			}
			else
				break ;
		}
	}
	echo $content;
}
?>