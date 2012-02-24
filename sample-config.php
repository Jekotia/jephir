<?php
// Rename this file to config.php if you do not yet have one, or copy the new lines into your existing config

// DB_TYPE can be 'MYSQL' or 'SQLITE'
	define('DB_TYPE', 'MYSQL' );
// 
	define('DB_HOST', 'localhost' );
	define('DB_USER', 'root');
	define('DB_PASS', 'november' );
	define('DB_DB', 'jephir' );
// 
	define('TABLE_PREFIX', 'jcf_' );
	define('SITE_NAME', 'jephir' ); // this is temporary until I've sorted out the in-database configuration
?>