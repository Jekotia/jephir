<?php
	$result_array = jf_select_array('SELECT * FROM `'.MYSQL_PREFIX.'users`');
	foreach($result_array as $result){
		if ($result['user_id'] == '12'){ echo $result['user_label']; break;}
	}



	if (isset($_POST['trigger']) and $_POST['trigger'] == true)
	{
		$username = stripslashes(mysql_real_escape_string($_POST['username']));
		$password = stripslashes(mysql_real_escape_string($_POST['password']));

		jf_connect();
		$query = "SELECT password, salt FROM ".MYSQL_PREFIX."users WHERE username = '$username';";
		$result = mysql_query($query);
		if(mysql_num_rows($result) < 1) //no such user exists
		{
			//header('Location: login_form.php');
			echo "Incorret username or password.";
		}
		$userData = mysql_fetch_array($result, MYSQL_ASSOC);
		$hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
		if($hash != $userData['password']) //incorrect password
		{
			//header('Location: login_form.php');
			echo "Incorret username or password.";
		}
	}
	echo '<form name="login" action="login" method="post">
		Username: <input type="text" name="username" /><br/>
		Password: <input type="password" name="password" /><br/>
		<input type="submit" value="Login" />
		<input name="trigger" type="hidden" value="true">
	</form>';
?>