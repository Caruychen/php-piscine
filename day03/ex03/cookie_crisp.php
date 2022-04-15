<?php
	if ($_GET["action"] == "set")
		setcookie($_GET["name"], $_GET["value"], time() + 3600);
	else if ($_GET["action"] == "get")
	{
		$res = $_COOKIE[$_GET["name"]];
		if ($res)
			echo $res.PHP_EOL;
	}
	else if ($_GET["action"] == "del")
		setcookie($_GET["name"], "", time() - 3600);
?>
