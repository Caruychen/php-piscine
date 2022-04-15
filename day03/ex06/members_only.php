<?php
	$login = 'zaz';
	$password = 'Ilovemylittleponey';
	if ($_SERVER['PHP_AUTH_USER'] === $login && $_SERVER['PHP_AUTH_PW'] === $password):
		echo "<html><body>".PHP_EOL;
		echo "Hello Zaz<br />".PHP_EOL;
		echo "<img src='data:image/png;base64,";
		echo base64_encode(file_get_contents('../img/42.png'))."'>".PHP_EOL;
		echo "</body></html>".PHP_EOL;
	else:
		header("WWW-Authenticate: Basic realm=''Member area''");
		header('HTTP/1.0 401 Unauthorized');
		echo "<html><body>That area is accessible for members only</body></html>".PHP_EOL;
	endif;
?>
