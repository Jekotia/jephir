<?php
	function jf_connect()
	{
		$con = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS)or die();
		if(!$con){
			trigger_error('Problem connecting to server');
		}
		$db = mysql_select_db(MYSQL_DB,$con);
		if (!$db) {
			trigger_error('Problem selecting database');
		}
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
		$result = mysql_query($sql,$con);
		if (!$result){
			trigger_error("Problem updating data");
			echo $result.mysql_error();
		}
		jf_disconnect($con);
	}

	function jf_select_array($sql)
	{
		$con = jf_connect();
		$result = mysql_query($sql,$con);
		if(!$result){
			trigger_error("Problem selecting data");
		}
		$result_array = array();
		array_push($result_array,'0');
		echo $result.mysql_error();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			$result_array[] = $row;
		}
		jf_disconnect($con);
		return $result_array;	
	}
	function jf_select_row($sql)
	{
		$con = jf_connect();
		$result = mysql_query($sql,$con);
		if(!$result){
			trigger_error("Problem selecting data");
		}
		
	}
?>