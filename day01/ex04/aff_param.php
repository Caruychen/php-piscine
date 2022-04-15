#!/usr/bin/php
<?php
	if ($argc == 1)
		return;
	array_shift($argv);
	foreach ($argv as &$el)
		echo $el.PHP_EOL;
?>
