#!/usr/bin/php
<?php

	while (1)
	{
		echo "Enter a number: ";
		$handle = fopen("php://stdin","r");
		$line = trim(fgets($handle));
		if (feof($handle))
			exit ;
		if (is_numeric($line))
		{
			if ($line % 2 == 0)
				echo "The number $line is even".PHP_EOL;
			else
				echo "The number $line is odd".PHP_EOL;
		}
		else
			echo "'$line' is not a number".PHP_EOL;
	}
?>
