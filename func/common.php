<?php

function jf_pagelist()
{
	$pages = jf_select_array('SELECT name, nicename FROM '.TABLE_PREFIX.'posts');
	return $pages;
}