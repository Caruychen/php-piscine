#!/usr/bin/php
<?php
	date_default_timezone_set('Europe/Helsinki');
	$source = "/var/run/utmpx";
	if (!file_exists($source))
		echo "ERROR: File 'utmpx' not found".PHP_EOL;
	$file = fopen($source, "r");
	while ($entry = fread($file, 628))
	{
		$unpack = unpack("a256user/a4terminal/a32tty/ipid/ilogin/itimestamp", $entry);
		$arr[$unpack['pid']] = $unpack;
	}
	ksort($arr);
	foreach ($arr as $line)
	{
		if ($line['login'] == 7)
		{
			echo str_pad(trim($line['user']), 8, " ")." ";
			echo str_pad(trim($line['tty']), 8, " ")." ";
			echo date("M j H:i", $line['timestamp']);
			echo PHP_EOL;
		}
	}
?>
