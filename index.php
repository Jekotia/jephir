<a href="login" >login</a>
<a href="register" >register</a>
<a href="home" >home</a>
<a href="blog" >blog</a>
<a href="about" >about</a>
<a href="contact" >contact</a>

<!--- test.php?p=blog&archive=5  --->
<br/>
<br/>
<?php
// 'initialization'
	include('config.php');
	include('func/common.php');
	include('func/auth.php');
	jf_select('SELECT * FROM posts WHERE fasdsa =. das');

	if (isset($_GET['p'])) $p = $_GET['p'];
	// auth pages
		if ($p == 'login') echo 'login';
		elseif ($p == 'logout') echo 'logout';
		elseif ($p == 'register') echo 'register';
	// content pages
		elseif ($p == 'home') echo 'home';
		elseif ($p == 'blog') echo 'blog';
		elseif ($p == 'about') echo 'about';
		elseif ($p == 'contact') echo 'contact';
	else $p = 'home';
?>