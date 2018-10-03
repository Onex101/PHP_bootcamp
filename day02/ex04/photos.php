#!/usr/bin/php
<?php
	$url = $argv[1];
	$doc = new DOMDocument();
	$doc = new DOMDocument();
	libxml_use_internal_errors(true);
	$doc->loadHTMLFile($url, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
	
	// echo $url . "\n";
	$img_dir = str_replace("http://", "", $url);
	$links = $doc->getElementsByTagName('img');
	// echo $img_dir . "\n";
	if (!file_exists($img_dir))
		mkdir($img_dir, 0777, true);
	foreach($links as $node)
	{
		if ($node->hasAttribute('src'))
		{
			$img_url = $node->getAttribute('src');
			echo $img_url . "\n";
			$img_name = basename($img_url);
			$img_add = $img_dir."/".$img_name;
			// echo $img_add . "\n";
			file_put_contents($img_add, file_get_contents($img_url));
		}		
	}

	// echo $doc->saveHTML();
?>