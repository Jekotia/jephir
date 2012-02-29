<!---
single page
/blog						| index.php?page=blog
categorized page
/user/login					| index.php?category=user&page=login
category
/category/news				| index.php?category=news
tag
/tag/jephir					| index.php?tag=jephir
single post
/blog/2012/02/25/test-post	| index.php?page=blog&year=2012&month=02&date=25&name=test-post
archive
/archive/2012/02			| index.php?page=archive&year=2012&month=02
non-practical sample containing	all variables
index.php?page=blog&year=2012&month=02&date=25&name=test-post&category=news&tag=jephir
--->
<?php

if (isset($_GET['page'])) echo $_GET['page'].' ';
if (isset($_GET['year'])) echo $_GET['year'].' ';
if (isset($_GET['month'])) echo $_GET['month'].' ';
if (isset($_GET['date'])) echo $_GET['date'].' ';
if (isset($_GET['name'])) echo $_GET['name'].' ';
if (isset($_GET['category'])) echo $_GET['category'].' ';
if (isset($_GET['tag'])) echo $_GET['tag'].' ';

echo PHP_EOL.'<br/>'.PHP_EOL.'<br/>'.PHP_EOL;

//	initialization
session_start();
include('config.php');

echo '<title>'.$settings['site_name'].'</title>';

$con = jf_connect();

$result = mysql_query("SELECT `name`, `nicename` FROM ".TABLE_PREFIX."posts");

while($row = mysql_fetch_array($result))
{
	echo '<a href="'.WEB_ROOT.$row['nicename'].'" >'.$row['name'].'</a>'.PHP_EOL
	;
}

jf_disconnect($con);

echo ' - 
<a href="'.WEB_ROOT.'user/login" >login</a>'.PHP_EOL.
'<a href="'.WEB_ROOT.'user/register" >register</a>'.PHP_EOL.
'<a href="'.WEB_ROOT.'user/logout" >logout</a>'.PHP_EOL;

if (isset($_GET['page']))
{
	$page = strtolower($_GET['page']);
	//	auth pages
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
//	content pages
	else echo '<br/>'.PHP_EOL.jf_select_content($page);
}
else echo '<br/>'.PHP_EOL.jf_select_content($settings['home_page']);