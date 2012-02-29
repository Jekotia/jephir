<?php

function jf_validateUser($_)
{
	if(!jf_isLoggedIn())
	{
		session_regenerate_id (); //this is a security measure
		$_SESSION['valid'] = 1;
		$_SESSION['userid'] = $userid;
		$query = "SELECT ip FROM ".$_['table_prefix']."users WHERE id = '$userid';";
		$result = mysql_query($query);
		$userData = mysql_fetch_array($result, MYSQL_ASSOC);
		if ( $_SERVER['REMOTE_ADDR'] != $userData['ip'] )
		{
			jf_logout($_);
		}
	}
}

function jf_isLoggedIn()
{
	if(isset($_SESSION['valid']) && $_SESSION['valid']) return true;
	return false;
}

function jf_logout($_)
{
	setcookie('jcf_'.$_['site_name'], '', time()-1800, '/');
	setcookie('jcf_'.$_['site_name'], '', time()-1800, '/');
	$_SESSION = array(); //destroy all of the session variables
	session_destroy();
}