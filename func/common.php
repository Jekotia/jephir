<?php
	function jf_connect()
	{
		global $mysql_host;
		global $mysql_user;
		global $mysql_pass;
		global $mysql_database;
		$con = mysql_connect($mysql_host, $mysql_user, $mysql_pass)or die();
		if(!$con){
			echo $con.mysql_error();
		}
		mysql_select_db($mysql_database,$con)or die("cannot select DB");
		return $con;
	}

	function jf_disconnect($con)
	{
		$discdb = mysql_close($con);
		if(!$discdb){
			trigger_error("Problem disconnecting database");
		}	
	}

	function jf_select($sql)
	{
		$con = jf_connect();
		mysql_query($sql,$con);
		//mysql_fetch_array($sql);
		jf_disconnect($con);
	}

	function jf_update($sql)
	{
		jf_connect();
		mysql_query($sql);
		//mysql_fetch_array($sql);
		jf_disconnect($con);
	}
?>