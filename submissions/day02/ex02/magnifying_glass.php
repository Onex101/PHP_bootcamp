#!/usr/bin/php
<?php
	$fd = fopen($argv[1], "r");
	$file = fread($fd, filesize($argv[1]));
	$doc = new DOMDocument();
	$doc->loadHTML($file, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
	$i = -1;
	$links = $doc->getElementsByTagName('a');
	
	foreach($links as $node)
	{
		if ($node->hasAttribute('title'))
			$node->setAttribute('title', strtoupper($node->getAttribute('title')));
		foreach($node->childNodes as $child)
		{
			if ($child->nodeType != 3)
				if ($child->hasAttribute('title'))
					$child->setAttribute('title', strtoupper($child->getAttribute('title')));
			$child->nodeValue = strtoupper($child->nodeValue);
		}
	}
	echo $doc->saveHTML();
?>