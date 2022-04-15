<?php
	function error_result()
	{
		echo "ERROR\n";
		return ;
	}
	function is_valid_oldpw($user)
	{
		return ($user['passwd'] === hash('whirlpool', $_POST['oldpw']));
	}
	function is_valid_login($user)
	{
		return ($user['login'] === $_POST['login']);
	}
	function update_user_pwd(&$users_db, $key)
	{
		$users_db[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
	}
	function validate_user($users_db)
	{
		foreach ($users_db as $key => $user)
		{
			if (is_valid_login($user) && is_valid_oldpw($user))
				return $key;
		}
		return false;
	}

	$dir = '../private';
	if (!($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] === 'OK'))
		return (error_result());
	$users_db = unserialize(file_get_contents($dir.'/passwd'));
	$key = validate_user($users_db);
	if ($key === false)
		return (error_result());
	update_user_pwd($users_db, $key);
	file_put_contents($dir.'/passwd', serialize($users_db));
	echo "OK\n";
?>
