<?php

function jf_pagelist($_)
{
	$pages = jf_select_array('SELECT name, nicename FROM '.$_['table_prefix'].'pages');
	return $pages;
}