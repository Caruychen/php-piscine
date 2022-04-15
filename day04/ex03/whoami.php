<?php
	session_start();
	$logged_user = $_SESSION['loggued_on_user'];
	if ($logged_user)
		echo $logged_user."\n";
	else
		echo "ERROR\n";
?>
