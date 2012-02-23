<?php
	if (isset($_POST['trigger']) and $_POST['trigger'] == true)
	{
		$username = stripslashes(mysql_real_escape_string(strtolower($_POST['username'])));
		$password = stripslashes(mysql_real_escape_string($_POST['password']));

		jf_connect();
		$query = "SELECT password, salt FROM ".MYSQL_PREFIX."users WHERE nicename = '$username';";
		$result = mysql_query($query);
		if(mysql_num_rows($result) < 1) //no such user exists
		{
			echo "Incorret username or password.";
		}
		else
		{
			$userData = mysql_fetch_array($result, MYSQL_ASSOC);
			$hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
			if($hash != $userData['password']) //incorrect password
			{
				echo "Incorret username or password.";
			}
			else
			{
			// Generates a token for use in cookie authentication
				$token = (md5(rand(1000000,9999999)).md5(rand(1000000,9999999)));
			// Writes the generated token to the 'token' column of the users' row in the database
				//jf_update(" UPDATE ".MYSQL_PREFIX."users SET token='".$token."' WHERE nicename='".$username."' ");
				jf_update(" UPDATE ".MYSQL_PREFIX."users SET token='".$token."', ip='".$_SERVER['REMOTE_ADDR']."' WHERE nicename='".$username."' ");
				setcookie('jcf_'.SITE_NAME, $username, time()+1800, '/');
				setcookie('jcf_'.SITE_NAME, $token, time()+1800, '/');
				echo "Login successful.";
			}
		}
	}
	echo '<form name="login" action="login" method="post">
		Username: <input type="text" name="username" /><br/>
		Password: <input type="password" name="password" /><br/>
		<input type="submit" value="Login" />
		<input name="trigger" type="hidden" value="true">
	</form>';
?>