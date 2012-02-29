<?php

function jf_pagelist($_)
{
	$pages = jf_select_array('SELECT name, nicename FROM '.$_['table_prefix'].'posts');
	return $pages;
}

function in($limit)
{
	$indent='';
	$num=0;
	while($num < $limit)
	{
		$num++;
		$indent = $indent.'	';
	}
	return PHP_EOL.$indent;
}