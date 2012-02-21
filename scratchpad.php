<?php

	function func_mysql_connect() {
		$con = mysql_connect('localhost', 'user', 'password');
		if(!$con){
		rigger_error("Problem connecting to server");
	}	
	$db =  mysql_select_db('database_name', $con);
	if(!$db){
		trigger_error("Problem selecting database");
	}	
	return $con;
	}

	function disconnect($con) {
		$discdb = mysql_close($con);
		if(!$discdb){
			trigger_error("Problem disconnecting database");
		}	
	}

	function func_mysql_connect()
	{
		mysql_connect($mysql_host, $mysql_user, $mysql_pass)or die("cannot connect");
	}

	function func_mysql_query()
	{
		$result2 = mysql_query($myQuery) or die($myQuery."<br/><br/>".mysql_error());
	}

	//mysql_select_db($mysql_db)or die("cannot select DB");
?>






<?php
	function jf_connect()
	{
		global $mysql_host;
		global $mysql_user;
		global $mysql_pass;
		global $mysql_database;
		$con = mysql_connect($mysql_host,$mysql_user,$mysql_pass)or die($con.mysql_error());
		$db = mysql_select_db($mysql_database,$con)or die($db.mysql_error());
			
		return $con;
	}

	function jf_disconnect($con)
	{
		$discdb = mysql_close($con);
		if(!$discdb){
			trigger_error("Problem disconnecting database");
		}	
	}

	function jf_update($sql)
	{
		$con = jf_connect();
		$result = mysql_query($sql, $con);
		echo $result;
		if(!$result)
		{
			//trigger_error('derp');
			$sql."<br/><br/>".mysql_error();
		}
		jf_disconnect($con);
	}

	function func_mysql_query()
	{
		$result2 = mysql_query($myQuery) or die($myQuery."<br/><br/>".mysql_error());
	}

	//mysql_select_db($mysql_db)or die("cannot select DB");
?>