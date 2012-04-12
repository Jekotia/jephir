<?php

include('cf-auth/functions.php');
include('jcf-includes/func-common.php');
include('jcf-includes/func-database.php');

$con = jf_connect($_);
$result = mysql_query("SELECT * FROM `".$_['table_prefix']."settings`");
while($row = mysql_fetch_array($result))
{
	$_[$row['label']] = $row['value'];
}
jf_disconnect($con,$_);

if(isset($_GET['page']))
{
	if($_GET['page'] === "home") $page = $_['home_page'];
	else $page = strtolower($_GET['page']);
}
else $page = $_['home_page'];