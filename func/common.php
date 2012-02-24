<?php
	function jf_connect()
	{
		if(DB_TYPE == 'MYSQL') $con = mysql_connect(DB_HOST,DB_USER,DB_PASS);
		elseif(DB_TYPE == 'SQLITE') $con = sqlite_open(WEB_ROOT.'jephir.db');
		if(!$con) trigger_error('Problem connecting to server');
		if(DB_TYPE == 'MYSQL')
		{
			$db = mysql_select_db(DB_DB,$con);
			if (!$db) trigger_error('Problem selecting database');
		}
		return $con;
	}

	function jf_disconnect($con)
	{
		if (DB_TYPE == 'MYSQL') $discdb = mysql_close($con);
		elseif (DB_TYPE == 'SQLITE') $discdb = sqlite_close($con);
		if(!$discdb) trigger_error("Problem disconnecting database");
	}

	function jf_update($sql)
	{
		$con = jf_connect();
		if (DB_TYPE == 'MYSQL') $result = mysql_query($sql,$con);
		elseif (DB_TYPE == 'SQLITE') $result = $con->exec($sql);
		if (!$result)
		{
			trigger_error("Problem updating data");
			if (DB_TYPE == 'MYSQL') echo $result.mysql_error();
			elseif (DB_TYPE == 'SQLITE') echo $result.sqlite_error_string();
		}
		jf_disconnect($con);
	}

	function jf_select_array($sql)
	{
		$con = jf_connect();
		if (DB_TYPE == 'MYSQL') $result = mysql_query($sql,$con);
		elseif (DB_TYPE == 'SQLITE') $result = $con->query($sql);
		if(!$result) trigger_error("Problem selecting data");
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
		if(mysql_num_rows($result) < 1) //no such user exists
		{
			echo "Error: more than one row matches this query.";
		}
	}

	function return_row($sql)
	{
		$con = jf_connect();
		if (DB_TYPE == 'MYSQL') $result = mysql_query($sql,$con);
		elseif (DB_TYPE == 'SQLITE') $result = $con->query($sql);
		if (!$result)
		{
			echo 'Error in function return_row():<br />';
			if(DB_TYPE == 'MYSQL') echo mysql_error().'<br />Query:<br />'.$sql;
			elseif(DB_TYPE == 'SQLITE') echo sqlite_error_string().$sql;
			return false;
		}
		// Did you find anything?
		if (mysql_num_rows($result) <= 0 OR sqlite_num_rows($result) <= 0) {
			echo 'Function return_row() generated an empty result set:<br />Query:<br />'.$sql;
			return false;
		}
		// We only want a single row
		if (mysql_num_rows($result) > 1) {
			echo 'Function return_row() returned multiple records:<br />Query:<br />'.$sql;
			return false;
		}
		// Okay then, let's give this a shot.
		$row = mysql_fetch_assoc($result);
		if (mysql_error()) {
			echo 'Error in function return_row():<br />'.mysql_error().'<br />Query:<br />'.$sql;
			return false;
		} else {return $row;}
		while($row = $result->fetchArray(SQLITE3_ASSOC)); //SQLite
	}
?>