<?php
	if (isset($_POST['trigger']) and $_POST['trigger'] == true)
	{
		$username = $_POST['username'];
		$pass1 = stripslashes(mysql_real_escape_string($_POST['pass1']));
		$pass2 = stripslashes(mysql_real_escape_string($_POST['pass2']));

		if (strcmp($pass1,$pass2) == 0)
			{$reg_fail = false;}		

		/*if($pass1 != $pass2)
		{
			//header('Location: register);
			echo 'Passwords do not match.';
			$reg_fail = true;
		}*/
		if(strlen($username) > 30)
		{
			//header('Location: register);
			echo 'The provided username is too long.';
			$reg_fail = true;
		}
		$hash = hash('sha256', $pass1);
		if (isset($reg_fail) and $reg_fail == false)
		{
			function createSalt()
			{
				$string = md5(uniqid(rand(), true));
				return substr($string, 0, 3);
			}
			$salt = createSalt();
			$hash = hash('sha256', $salt . $hash);

			/*$dbhost = 'localhost';
			$dbname = 'jephir';
			$dbuser = 'root';
			$dbpass = 'november'; //not really

			$conn = mysql_connect($dbhost, $dbuser, $dbpass);
			mysql_select_db($dbname, $conn);*/

			//sanitize username
			$username = stripslashes(mysql_real_escape_string($username));
			jf_update("INSERT INTO ".MYSQL_PREFIX."users ( username, password, salt ) VALUES ( '$username' , '$hash' , '$salt' );");


			/*$query = "INSERT INTO users ( username, password, salt )
					VALUES ( '$username' , '$hash' , '$salt' );";
			mysql_query($query);
			mysql_close();
			header('Location: login');*/
			echo 'Registration successful! Click <a href="login">here</a> to login.';
			die();
		}
	}

echo '<form name="register" action="register" method="post">
	Username: <input type="text" name="username" maxlength="30" /><br/>
	Password: <input type="password" name="pass1" /><br/>
	Password Again: <input type="password" name="pass2" /><br/>
	<input type="submit" value="Register" />
	<input name="trigger" type="hidden" value="true">
</form>';
?>