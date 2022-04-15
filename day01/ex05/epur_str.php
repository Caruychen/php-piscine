#!/usr/bin/php
<?php
	if ($argc == 1)
		return ;
	$formatted = preg_replace('/\s+/', ' ', trim($argv[1]));
	echo "$formatted".PHP_EOL;
?>
