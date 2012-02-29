<?php

//	initialization
include('settings.php');
if(isset($_GET['page']))
{
	if($_GET['page'] === "home") $page = $_['home_page'];
	else $page = strtolower($_GET['page']);
}
else $page = $_['home_page'];
echo
'<html>
	<head>
		<title>'.$_['site_name'].' '.$_['title_divider'].' '.$page.'</title>
		<link rel="stylesheet" href="'.$_['web_root'].'assets/css/jephir.css" type="text/css" />
		<link rel="shortcut icon" href="'.$_['web_root'].'favicon.ico" />
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>'.$_['site_name'].' '.$_['title_divider'].' '.$page.'</h1>
			</div>
			<div id="subheader">
				<div id="nav">';

jf_navlist($_);

echo
'
				</div>
				<div id="meta">
					<a href="'.$_['web_root'].'user/login" >login</a>
					<a href="'.$_['web_root'].'user/register" >register</a>
					<a href="'.$_['web_root'].'user/logout" >logout</a>
				</div>
			</div>';

echo
'
			<div id="content">';

	if(isset($_GET['category']))
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
	else echo
'
				'.jf_select_content($page,$_);

echo
'
			</div>
			<div id="footer">
				CC
			</div>
		</div>
	</body>
</html>';

if (isset($_GET['page'])) echo $_GET['page'].' ';
if (isset($_GET['year'])) echo $_GET['year'].' ';
if (isset($_GET['month'])) echo $_GET['month'].' ';
if (isset($_GET['date'])) echo $_GET['date'].' ';
if (isset($_GET['name'])) echo $_GET['name'].' ';
if (isset($_GET['category'])) echo $_GET['category'].' ';
if (isset($_GET['tag'])) echo $_GET['tag'].' ';
echo PHP_EOL.'<br/>'.PHP_EOL.'<br/>'.PHP_EOL;