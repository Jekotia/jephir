<?php
// Rename this file to config.php if you do not yet have one, or copy the new lines into your existing config

//	The type of database to use
//	This can be 'MYSQL' or 'SQLITE'
$_['db_type'] = 'MYSQL';

//	Hostname for your database server
$_['db_host'] = 'localhost';

//	Username to connect to the database server with
$_['db_user'] = 'root';

//	Password to connect to the database server with
$_['db_pass'] = 'november';

//	The name of the database for Jephir
$_['db_name'] = 'jephir';

//	The prefix to use
$_['table_prefix'] = 'jcf_';

//	Database Charset to use in creating database tables.
$_['db_charset'] = 'utf8';

//	The Database Collate type. Don't change this if in doubt.
$_['db_collate'] = '';

//	Turns debug mode within Jephir on/off. Currently not working.
//	Can be true or false
$_['debug'] = false;