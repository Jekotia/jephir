<?php
	function validateUser()
	{
		session_regenerate_id (); //this is a security measure
		$_SESSION['valid'] = 1;
		$_SESSION['userid'] = $userid;
		$query = "SELECT ip FROM ".MYSQL_PREFIX."users WHERE id = '$userid';";
		$result = mysql_query($query);
		$userData = mysql_fetch_array($result, MYSQL_ASSOC);
		if ( $_SERVER['REMOTE_ADDR'] != $userData['ip'] )
		{
			logout();
		}
	}

	function jf_isLoggedIn()
	{
		if(isset($_SESSION['valid']) && $_SESSION['valid'])
			return true;
		return false;
	}

	function logout()
	{
		setcookie('jcf_'.SITE_NAME, '', time()-1800, '/');
		setcookie('jcf_'.SITE_NAME, '', time()-1800, '/');
		$_SESSION = array(); //destroy all of the session variables
		session_destroy();
	}
?>