#!/usr/bin/php
<?php
	function is_valid_format($str)
	{
		$pattern = '/[A-Za-z][a-zàâçéèêëîïôûùüÿñæœ]+ \d{1,2} [A-Za-z][a-zàâçéèêëîïôûùüÿñæœ]+ \d{4} \d{2}:\d{2}:\d{2}/';
		if (!preg_match($pattern, $str))
		{
			echo "Wrong Format".PHP_EOL;
			exit ;
		}
	}

	function print_time($str)
	{
		$fmt = '%A %e %B %Y %T';
		$tm = strptime($str, $fmt);
		if ($tm === false)
		{
			echo "Wrong Format".PHP_EOL;
			exit ;
		}
		$tmstamp = mktime($tm[tm_hour], $tm[tm_min], $tm[tm_sec], $tm[tm_mon] + 1, $tm[tm_mday], $tm[tm_year] + 1900);
		if (date('w', $tmstamp) == $tm[tm_wday])
			echo $tmstamp.PHP_EOL;
		else
			echo "Wrong Format".PHP_EOL;
	}

	if ($argc === 1)
		return ;
	setlocale(LC_TIME, 'fr_FR');
	date_default_timezone_set('Europe/Paris');
	is_valid_format($argv[1]);
	print_time($argv[1]);
?>
