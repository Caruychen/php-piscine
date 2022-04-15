#!/usr/bin/php
<?php
	if ($argc == 1 || $argc > 4)
	{
		echo "Incorrect Parameters".PHP_EOL;
		return ;
	}
	$num1 = (int) trim($argv[1]);
	$num2 = (int) trim($argv[3]);
	$op = trim($argv[2]);
	if ($op === "+")
		echo ($num1 + $num2);
	if ($op === "-")
		echo ($num1 - $num2);
	if ($op === "*")
		echo ($num1 * $num2);
	if ($op === "/")
	{
		if ($num2 === 0)
			echo "Inf";
		else
			echo ($num1 / $num2);
	}
	if ($op === "%")
	{
		if ($num2 === 0)
			echo "Undefined";
		else
			echo ($num1 % $num2);
	}
	echo PHP_EOL;
?>
