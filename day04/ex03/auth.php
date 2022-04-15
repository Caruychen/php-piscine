<?php
	function auth($login, $passwd)
	{
		if (!$login || !$passwd)
			return FALSE;
		$dir = '../private';
		$users_db = unserialize(file_get_contents($dir.'/passwd'));
		foreach ($users_db as $user)
		{
			if ($user['login'] === $login && $user['passwd'] === hash('whirlpool', $passwd))
				return TRUE;
		}
		return FALSE;
	}
?>
