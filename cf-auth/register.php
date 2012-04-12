<?php

if (isset($_POST['trigger']) and $_POST['trigger'] == true)
{
	$username = $_POST['username'];
	$pass1 = stripslashes(mysql_real_escape_string($_POST['pass1']));
	$pass2 = stripslashes(mysql_real_escape_string($_POST['pass2']));

	/*if (strcmp($pass1,$pass2) == 0)
		{$reg_fail = false;}*/
	if($pass1 === $pass2) $reg_fail = false;
	else
	{
		//header('Location: register);
		echo PHP_EOL.'<br/>Passwords do not match.';
		$reg_fail = true;
	}
	if(strlen($username) > 32)
	{
		//header('Location: register);
		echo PHP_EOL.'<br/>The provided username is too long.';
		$reg_fail = true;
	}
	if (isset($reg_fail) and $reg_fail == false)
	{
		function createSalt()
		{
			$string = md5(uniqid(rand(), true));
			return substr($string, 0, 3);
		}
		$salt = createSalt();
		$hash = hash('sha256', $pass1);
		$hash = hash('sha256', $salt . $hash);

		//sanitize username
		$username = stripslashes(mysql_real_escape_string($username));
		$nicename = strtolower($username);
		$ip=$_SERVER['REMOTE_ADDR'];
		jf_update("INSERT INTO ".$_['table_prefix']."users ( username, nicename, password, salt, ip ) VALUES ( '$username' , '$nicename' , '$hash' , '$salt' , '$ip' );",$_);

		echo PHP_EOL.'<br/>Registration successful! Click <a href="login">here</a> to login.';
		die();
	}
}

echo PHP_EOL.'<br/>'.
PHP_EOL.'<form name="register" action="register" method="post">'.
PHP_EOL.'Username: <input type="text" name="username" maxlength="32" /><br/>'.
PHP_EOL.'Password: <input type="password" name="pass1" /><br/>'.
PHP_EOL.'Password Again: <input type="password" name="pass2" /><br/>'.
PHP_EOL.'<input type="submit" value="Register" />'.
PHP_EOL.'<input name="trigger" type="hidden" value="true">'.
PHP_EOL.'</form>';