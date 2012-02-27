<?php
// Rename this file to config.php if you do not yet have one, or copy the new lines into your existing config

<?php

//	The type of database to use
//	This can be 'MYSQL' or 'SQLITE'
define('DB_TYPE', 'MYSQL' );

//	Hostname for your database server
define('DB_HOST', 'localhost' );

//	Username to connect to the database server with
define('DB_USER', 'root');

//	Password to connect to the database server with
define('DB_PASSWORD', 'november' );

//	The name of the database for Jephir
define('DB_NAME', 'jephir' );

//	The prefix to use
define('TABLE_PREFIX', 'jcf_' );

//	Database Charset to use in creating database tables.
define('DB_CHARSET', 'utf8');

//	The Database Collate type. Don't change this if in doubt.
define('DB_COLLATE', '');

//	
define('DEBUG', false);

//	these are temporary until I've sorted out the in-database configuration
define('SITE_NAME', 'jephir' );
define('WEB_ROOT', '/users/jekotia/jekotia.net/dev/jephir/' );