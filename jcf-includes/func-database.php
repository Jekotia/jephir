<?php

function jf_connect($_)
{
	if($_['db_type'] == 'MYSQL')
	{
		$con = mysql_connect($_['db_host'],$_['db_user'],$_['db_pass']);
		if(!$con) trigger_error('Problem connecting to server');
		$db = mysql_select_db($_['db_name'],$con);
		if (!$db) trigger_error('Problem selecting database');
	}
	elseif($_['db_type'] == 'SQLITE')
	{
		$con = sqlite_open($_['fs_root'].'jephir.db');
		if(!$con) trigger_error('Problem connecting to server');
	}
	return $con;
}

function jf_disconnect($con,$_)
{
	if ($_['db_type'] == 'MYSQL') $discdb = mysql_close($con);
	elseif ($_['db_type'] == 'SQLITE') $discdb = sqlite_close($con);
	if(!$discdb) trigger_error("Problem disconnecting database");
}

function jf_update($sql,$_)
{
	$con = jf_connect($_);
	if ($_['db_type'] == 'MYSQL')
	{
		$result = mysql_query($sql,$con);
		if (!$result)
		{
			trigger_error("Problem updating data");
			echo $result.mysql_error();
		}
	}
	elseif ($_['db_type'] == 'SQLITE')
	{
		$result = $con->exec($sql);
		if (!$result)
		{
			trigger_error("Problem updating data");
			echo $result.sqlite_error_string();
		}
	}
	jf_disconnect($con,$_);
}

function jf_select_array($sql,$_)
{
	$con = jf_connect($_);
	if ($_['db_type'] == 'MYSQL')
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
	elseif ($_['db_type'] == 'SQLITE')
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
	jf_disconnect($con,$_);
	return $result_array;
}

function jf_select_row($sql,$_)
{
	$con = jf_connect($_);
	if($_['db_type'] == 'MYSQL')
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
	elseif($_['db_type'] == 'SQLITE')
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
	jf_disconnect($con,$_);
}

function jf_select_content($page,$_)
{
	$con = jf_connect($_);
	$sql = ("SELECT `content` FROM `".$_['table_prefix']."pages` WHERE `nicename` = '".$page."'");
	if($_['db_type'] == 'MYSQL')
	{
		$result = mysql_query($sql,$con);
		$row = mysql_fetch_array($result);
		$content = $row['content']; 
	}
	elseif($_['db_type'] == 'SQLITE')
	{
		$result = $con->query($sql);
		$row = sqlite_fetch_array($result);
		$content = $row['content']; 
	}
	jf_disconnect($con,$_);
	return $content;
}

function jf_navlist($_)
{
	$con = jf_connect($_);
	$result = mysql_query("SELECT `name`, `nicename` FROM ".$_['table_prefix']."pages ORDER BY `order` ASC");
	while($row = mysql_fetch_array($result))
	{
		echo
'
					<a href="'.$_['web_root'].$row['nicename'].'" >'.$row['name'].'</a>';
	}
	jf_disconnect($con,$_);
}