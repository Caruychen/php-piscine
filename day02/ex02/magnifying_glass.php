#!/usr/bin/php
<?php
	function upper($matches)
	{
		return strtoupper($matches[0]);
	}

	if ($argc === 1)
		return ;
	$str = file_get_contents($argv[1]);
	if (!$str)
		return ;
	$arr = preg_split('/<a|\/a>/', $str);
	foreach ($arr as $key=>$value)
	{
		if ($key % 2 !== 0)
		{
			$value = preg_replace_callback('/(?<=title=").*?(?=")/ism', 'upper', $value);
			$value = preg_replace_callback('/(?<=>)[^<>]*?(?=<)/ism', 'upper', $value);
			$value = "<a".$value."/a>";
			$arr[$key] = $value;
		}
	}
	echo implode('', $arr);
?>
