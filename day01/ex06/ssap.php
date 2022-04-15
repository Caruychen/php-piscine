#!/usr/bin/php
<?php
	if ($argc == 1)
		return ;
	array_shift($argv);
	$result = array();
	foreach ($argv as &$el)
	{
		$formatted_el = preg_replace('/\s+/', ' ', trim($el));
		$split_el = explode(" ", $formatted_el);
		$result = array_merge($result, $split_el);
	}
	sort($result);
	foreach ($result as &$el)
		echo "$el".PHP_EOL;
?>
