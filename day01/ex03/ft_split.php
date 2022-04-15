<?php
	function ft_split($str)
	{
		$formatted = preg_replace('/\s+/', ' ', trim($str));
		return (explode(" ", $formatted));
	}
?>
