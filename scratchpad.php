<?php

// Refer to wordpress config for cookie naming
session_start();
echo '<br />COOKIE1'.$_COOKIE["sqlcraft_user"].'';
echo '<br />COOKIE2'.$_COOKIE["sqlcraft_token"].'';
echo '<br />'.$_COOKIE["sqlcraft_user"];
$user = $_COOKIE["sqlcraft_user"];
$token = $_COOKIE["sqlcraft_token"];

if (isset($_COOKIE["sqlcraft_user"]))
	echo '<br />Welcome' . $_COOKIE["sqlcraft_user"];
else
	echo "'<br />'.Welcome guest!<br />";
if (isset($_COOKIE['sqlcraft_token']))
	echo ','. $_COOKIE["sqlcraft_token"].'<br /><br /><br /><br />';
print_r($_COOKIE);

/**#@+
* Authentication Unique Keys and Salts.
*
* Change these to different unique phrases!
* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
*
* @since 2.6.0
*/
define('AUTH_KEY',         'V}{_NCj#eS7eU3/?Y*Ck^*qjcGlq_9d_Q+$,nAk9yLdPaA48vESx1OFG)CYA`zRg');
define('SECURE_AUTH_KEY',  'qMq_}*/{+p7w,I>Xokl_`1o{M#.{N.v|9&&d.+CoG+C4;1&/,;QafB>z,pzQUnc<');
define('LOGGED_IN_KEY',    '4VxM+-#/ M^3?p*8)^=USz<xM<,H]aWsi0B_G5(S+-t)*5|;*|M{^[7K[Gm6`*pI');
define('NONCE_KEY',        'N6VX 7,5d(+O7HnaDz&OW~Q?BU;?[IiAcfLb=1+ZWQDOxb&w({Dd~SDgkQ@Qf{(?');
define('AUTH_SALT',        'JOoQwmI&,/H0n6(GvJ|s.4%FT9~B(f8jfHV7|t-;^~Vdg}uxo5%jYl&~ 3}H*qcD');
define('SECURE_AUTH_SALT', 'tv0/S~<&xM=4_4{k#>D| r;7iGFb|p?UxMY;:MrRnf*G{k* ./-rOp8p:Qd,3QW6');
define('LOGGED_IN_SALT',   '`zDVQ97{oS=@d;_jChnn.99ud=k_,u{C5$Bx*TJ1MAI7?Bg|]5QW:wJCTuy{XF?`');
define('NONCE_SALT',       '8W!OOlMIeNW-Z3|ZPUeLavHl+zNot`6B(5kq~NA$pVhadbS300S&P<sp-ZUthlHF');

/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*/
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');