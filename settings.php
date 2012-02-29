<?php

if (isset($_GET['page'])) echo $_GET['page'].' ';
if (isset($_GET['year'])) echo $_GET['year'].' ';
if (isset($_GET['month'])) echo $_GET['month'].' ';
if (isset($_GET['date'])) echo $_GET['date'].' ';
if (isset($_GET['name'])) echo $_GET['name'].' ';
if (isset($_GET['category'])) echo $_GET['category'].' ';
if (isset($_GET['tag'])) echo $_GET['tag'].' ';
echo PHP_EOL.'<br/>'.PHP_EOL.'<br/>'.PHP_EOL;

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