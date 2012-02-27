<?php

function jf_connect()
{
	if(DB_TYPE == 'MYSQL')
	{
		$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
		if(!$con) trigger_error('Problem connecting to server');
		$db = mysql_select_db(DB_NAME,$con);
		if (!$db) trigger_error('Problem selecting database');
	}
	elseif(DB_TYPE == 'SQLITE')
	{
		$con = sqlite_open(WEB_ROOT.'jephir.db');
		if(!$con) trigger_error('Problem connecting to server');
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
	if (DB_TYPE == 'MYSQL')
	{
		$result = mysql_query($sql,$con);
		if (!$result)
		{
			trigger_error("Problem updating data");
			echo $result.mysql_error();
		}
	}
	elseif (DB_TYPE == 'SQLITE')
	{
		$result = $con->exec($sql);
		if (!$result)
		{
			trigger_error("Problem updating data");
			echo $result.sqlite_error_string();
		}
	}
	jf_disconnect($con);
}

function jf_select_array($sql)
{
	$con = jf_connect();
	if (DB_TYPE == 'MYSQL')
	{
		$result = mysql_query($sql,$con);
		if(!$result)
		{
			trigger_error("Problem selecting data");
			echo $result.mysql_error();
		}
		$result_array = array();
		array_push($result_array,'0');
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$result_array[] = $row;
		}
	}
	elseif (DB_TYPE == 'SQLITE')
	{
		$result = $con->query($sql);
		if(!$result)
		{
			trigger_error("Problem selecting data");
			echo $result.sqlite_error_string();
		}
		$result_array = array();
		array_push($result_array,'0');
		while($row = $result->fetcharray(SQLITE3_ASSOC))
		{
			$result_array[] = $row;
		}
	}
	jf_disconnect($con);
	return $result_array;
}

function jf_select_row($sql)
{
	$con = jf_connect();
	if(DB_TYPE == 'MYSQL')
	{
		$result = mysql_query($sql,$con);
		if (!$result)
		{
			echo $result.mysql_error();
			return false;
		}
		if (mysql_num_rows($result) <= 0)
		{
			trigger_error('Query returned zero records');
			return false;
		}
		if (mysql_num_rows($result) > 1)
		{
			trigger_error('Query returned multiple records');
			return false;
		}
		$row = mysql_fetch_assoc($result);
		if (mysql_error())
		{
			$result.mysql_error();
			return false;
		}
		else
		{
			return $row;
		}
	}
	elseif(DB_TYPE == 'SQLITE')
	{
		$result = $con->query($sql);
		if (!$result)
		{
			echo $result.sqlite_error_string();
			return false;
		}
		if (sqlite_num_rows($result) <= 0)
		{
			trigger_error('Query returned zero records');
			return false;
		}
		if (sqlite_num_rows($result) > 1)
		{
			trigger_error('Query returned multiple records');
			return false;
		}
		$row = $result->fetcharray(SQLITE3_ASSOC);
		if (sqlite_error_string())
		{
			$result.sqlite_error_string();
			return false;
		}
		else
		{
			return $row;
		}
	}
}

function jf_select_post($page)
{
	$con = jf_connect();
	$sql = ("SELECT `content` FROM `".TABLE_PREFIX."posts` WHERE `nicename` = '".$page."'");
	if(DB_TYPE == 'MYSQL')
	{
		$result = mysql_query($sql,$con);
		$row = mysql_fetch_array($result);
		$content = $row['content']; 
	}
	elseif(DB_TYPE == 'SQLITE')
	{
		$result = $con->query($sql);
		$row = sqlite_fetch_array($result);
		$content = $row['content']; 
	}
	jf_disconnect($con);
	return $content;
}