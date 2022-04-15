#!/usr/bin/php
<?php
	function cmp_char($a, $b)
	{
		return (strtolower($a) <=> strtolower($b));
	}

	function cmp_alpha_a_to_b($a, $b)
	{
		if (ctype_alpha($b))
			return (cmp_char($a, $b));
		return (-1);
	}

	function cmp_num_a_to_b($a, $b)
	{
		if (ctype_alpha($b))
				return (1);
		if (is_numeric($b))
			return ($a <=> $b);
		return (-1);
	}

	function cmp_other_a_to_b($a, $b)
	{
		if (ctype_alnum($b))
			return (1);
		return (ord($a) - ord($b));
	}

	function cmp($a, $b)
	{
		$a_arr = str_split($a);
		$b_arr = str_split($b);
		$a_count = count($a_arr);
		$b_count = count($b_arr);
		for ($index = 0; $index < $a_count; $index++)
		{
			if ($index == $b_count)
				return (1);
			$a_el = $a_arr[$index];
			$b_el = $b_arr[$index];
			if (ctype_alpha($a_el))
			{
				$result = cmp_alpha_a_to_b($a_el, $b_el);
				if ($result)
					return ($result);
				continue;
			}
			if (is_numeric($a_el))
			{
				$result = cmp_num_a_to_b($a_el, $b_el);
				if ($result)
					return ($result);
				continue;
			}
			$result = cmp_other_a_to_b($a_el, $b_el);
			if ($result)
				return ($result);
			continue;
		}
		return ($a_count <=> $b_count);
	}

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
	usort($result, "cmp");
	foreach ($result as &$el)
		echo "$el".PHP_EOL;
?>
