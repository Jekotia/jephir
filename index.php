<a href="login" >login</a>
<a href="register" >register</a>
<a href="logout" >logout</a>
<a href="home" >home</a>
<a href="blog" >blog</a>
<a href="about" >about</a>
<a href="contact" >contact</a>

<!--- test.php?p=blog&archive=5  --->
<br/>
<br/>
<?php
// 'initialization'
	session_start();
	include('config.php');
	include('func/auth.php');
	include('func/common.php');

	if (isset($_GET['p']))
	{
	// auth pages
		$p = $_GET['p'];
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