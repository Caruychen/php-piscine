#!/usr/bin/php
<?php
	if ($argc == 1)
		return ;
	$target = preg_replace('/\s+/', ' ', trim($argv[1]));
	$target = explode(" ", $target);
	array_push($target, array_shift($target));
	echo implode(" ", $target).PHP_EOL;
?>
