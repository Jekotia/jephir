<?php

session_start();
include('../config.php');
include('../settings.php');

if (jf_isLoggedIn())
	echo "logged in";
else
	echo "not logged in!";