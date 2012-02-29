<?php

include('config.php');
include('func/auth.php');
include('func/common.php');
include('func/database.php');

$con = jf_connect($_);
$result = mysql_query("SELECT * FROM `".$_['table_prefix']."settings`");
while($row = mysql_fetch_array($result))
{
	$_[$row['label']] = $row['value'];
}
jf_disconnect($con,$_);

session_start();