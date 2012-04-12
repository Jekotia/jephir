<?php

session_start();
include('config.php');
include('settings.php');

echo
'<html>
	<head>
		<title>'.$_['site_name'].$_['title_divider'].$page.'</title>
		<link rel="stylesheet" href="'.$_['web_root'].'jcf-assets/css/jephir.css" type="text/css" />
		<link rel="shortcut icon" href="'.$_['web_root'].'favicon.ico" />
		<script src="'.$_['web_root'].'jcf-assets/js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="'.$_['web_root'].'jcf-assets/js/custom.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>'.$_['site_name'].$_['title_divider'].$page.'</h1>
			</div>
			<div id="subheader">
				<div id="nav">';

jf_navlist($_);

echo
'
				</div>
				<div id="meta">';
if (jf_isLoggedIn()) echo
'					<a href="'.$_['web_root'].'jcf-admin/" >admin</a>
					<a href="'.$_['web_root'].'user/logout" >logout</a>';
else echo
'
					<a href="'.$_['web_root'].'user/login" >login</a>
					<a href="'.$_['web_root'].'user/register" >register</a>';
echo
'
				</div>
			</div>';

echo
'
			<div id="content">';
				jf_getContent($page,$_);
echo
'			</div>
			<div id="footer">
				CC
			</div>
		</div>
	</body>
</html>';

if (isset($_GET['page'])) echo PHP_EOL.$_GET['page'].' ';
if (isset($_GET['year'])) echo PHP_EOL.$_GET['year'].' ';
if (isset($_GET['month'])) echo PHP_EOL.$_GET['month'].' ';
if (isset($_GET['date'])) echo PHP_EOL.$_GET['date'].' ';
if (isset($_GET['name'])) echo PHP_EOL.$_GET['name'].' ';
if (isset($_GET['category'])) echo PHP_EOL.$_GET['category'].' ';
if (isset($_GET['tag'])) echo PHP_EOL.$_GET['tag'].' ';