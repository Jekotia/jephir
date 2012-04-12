<?php

function jf_pagelist($_)
{
	$pages = jf_select_array('SELECT name, nicename FROM '.$_['table_prefix'].'pages');
	return $pages;
}

function jf_getContent($page,$_)
{	
	if(isset($_GET['category']))
	{
		$category = strtolower($_GET['category']);
		if ($category == 'user')
		{
			if ($page == 'login')
			{
				include('cf-auth/login.php');
			}
			elseif ($page == 'logout')
			{
				include('cf-auth/logout.php');
			}
			elseif ($page == 'register')
			{
				include('cf-auth/register.php');
			}
		}
	}
	else echo
	'
		'.jf_select_content($page,$_);
}