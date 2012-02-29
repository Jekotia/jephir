<?php

//	initialization
include('settings.php');
?>
<html>
	<head>
<?php

echo
in(2).'<title>'.$_['site_name'].'</title>'.
in(2).'<link rel="stylesheet" href="'.$_['web_root'].'jephir.css" type="text/css" />'.
in(2).'<link rel="shortcut icon" href="'.$_['web_root'].'favicon.ico" />';
?>
	</head>
	<body>
<?php
$con = jf_connect($_);
$result = mysql_query("SELECT `name`, `nicename` FROM ".$_['table_prefix']."posts");
while($row = mysql_fetch_array($result))
{
	echo in(2).'<a href="'.$_['web_root'].$row['nicename'].'" >'.$row['name'].'</a>';
}
jf_disconnect($con,$_);

echo ' - '.
in(2).'<a href="'.$_['web_root'].'user/login" >login</a>'.
in(2).'<a href="'.$_['web_root'].'user/register" >register</a>'.
in(2).'<a href="'.$_['web_root'].'user/logout" >logout</a>';

if (isset($_GET['page']))
{
	$page = strtolower($_GET['page']);
	if ($page == 'home') echo in(2).'<br/>'.in(2).jf_select_content($_['home_page'],$_);	
	elseif(isset($_GET['category']))
	{
		$category = strtolower($_GET['category']);
		if ($category = 'user')
		{
			if ($page == 'login')
			{
				include('inc/login.php');
			}
			elseif ($page == 'logout')
			{
				include('inc/logout.php');
			}
			elseif ($page == 'register')
			{
				include('inc/register.php');
			}
		}
	}
	else echo in(2).'<br/>'.in(2).jf_select_content($page,$_);
}
else echo in(2).'<br/>'.in(2).jf_select_content($_['home_page'],$_);

echo
in(1).'</body>'.
PHP_EOL.'</html>';