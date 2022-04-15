<?php
	function error_result()
	{
		echo "ERROR\n";
		return ;
	}
	function is_login_exists($users_db)
	{
		foreach ($users_db as $user)
		{
			if ($user['login'] === $_POST['login'])
				return true;
		}
	}
	function update_db($users_db, $dir)
	{
		$users_db[] = array('login' => $_POST['login'],'passwd' => hash('whirlpool', $_POST['passwd']),);
		file_put_contents($dir.'/passwd', serialize($users_db));
	}

	$dir = '../private';
	if (!($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === 'OK'))
		return (error_result());
	if (!file_exists($dir))
		mkdir($dir);
	$users_db = unserialize(file_get_contents($dir.'/passwd'));
	if (is_login_exists($users_db))
		return (error_result());
	update_db($users_db, $dir);
	echo "OK\n";
?>
