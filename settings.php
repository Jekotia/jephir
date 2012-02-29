<?php

include('func/auth.php');
include('func/common.php');
include('func/database.php');

$con = jf_connect();

$result = mysql_query("SELECT * FROM `".TABLE_PREFIX."settings`");

while($row = mysql_fetch_array($result))
{
	$settings[$row['label']] = $row['value'];
}

jf_disconnect($con);