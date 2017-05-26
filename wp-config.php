<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nnshop');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '_%qi~k2{p}TaT(f*wo(!6|;FB~RK-R._A[(gnWo8 (uDiGL#NouNOMnx#S%N`4Sw');
define('SECURE_AUTH_KEY',  'V+d]{ld&!@!IY-y/t[ott}<g)_n5L_R&uLE+h?xF!sUkd+Z6of&+fHGvM5%q6W.z');
define('LOGGED_IN_KEY',    'Q~gH(l)gd/a1w?Hvpk1~**htT;K>cSPi8lm^WrD/TJZi,?`b<.lcPR]tqXG#Qmsh');
define('NONCE_KEY',        '-x~z=AAHg3V;/>;{97m_JW/TH`:0N|(9q%Qj?A|xWi)-[$SYTq2C7v}K/Zh098Rw');
define('AUTH_SALT',        '~mV6`;cRJ(f-4z,|.c%LiT:|l!j}SE9gP_f(dy%*8O=Fj<GsA#6 <JPf2IOu[AJs');
define('SECURE_AUTH_SALT', '%DSPDYX9Mq2EB_*s=Sm3X=Bydvm!ogv{luTwRL}cRz>X,-BW/[intSM}8*5g<vkw');
define('LOGGED_IN_SALT',   'QM#m0SyxM:R71`PpBW*kS9BaCNg|&`9IJRe/Rzw:Q:KS_<ed>S1H`mkC-v=e&%0~');
define('NONCE_SALT',       'EItnoixCZbIj.b{^1qo.a)([/akn|Ey&%(&BqPT]ex=!CX+uiBK~?S,R=DwWOg9~');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
