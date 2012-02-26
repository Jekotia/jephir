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

<a href="login" >login</a>
<a href="register" >register</a>
<a href="logout" >logout</a>
<a href="home" >home</a>
<a href="blog" >blog</a>
<a href="about" >about</a>
<a href="contact" >contact</a>

<?php
	if (isset($_GET['page'])) echo $_GET['page'];
	if (isset($_GET['year'])) echo $_GET['year'];
	if (isset($_GET['month'])) echo $_GET['month'];
	if (isset($_GET['date'])) echo $_GET['date'];
	if (isset($_GET['name'])) echo $_GET['name'];
	if (isset($_GET['category'])) echo $_GET['category'];
	if (isset($_GET['tag'])) echo $_GET['tag'];
?> 
 
<br/>
<br/>
<?php
// 'initialization'
	session_start();
	include('config.php');
	include('func/auth.php');
	include('func/common.php');
	include('func/database.php');
	include('inc/init.php');

	if (isset($_GET['page']))
	{
	// auth pages
		$p = $_GET['page'];
		if ($p == 'login')
		{
			include('inc/login.php');
		}
		elseif ($p == 'logout')
		{
			include('inc/logout.php');
		}
		elseif ($p == 'register')
		{
			include('inc/register.php');
		}
	// content pages
		elseif ($p == 'home') echo 'home';
		elseif ($p == 'blog') echo 'blog';
		elseif ($p == 'about') echo 'about';
		elseif ($p == 'contact') echo 'contact';
	}
	else $p = 'home';
?>