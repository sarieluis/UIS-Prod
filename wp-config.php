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
define( 'WPCACHEHOME', '/home/uiscanada/public_html/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'uisc41478637072');

/** MySQL database username */
define('DB_USER', 'uisc41478637072');

/** MySQL database password */
define('DB_PASSWORD', 'xN)=4/RiE|');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'E098+WTUk3-n5UDAHFXR');
define('SECURE_AUTH_KEY',  '4#_A0gaqz4Bsngk9hpM#');
define('LOGGED_IN_KEY',    '-RSk0T4vDQC@R1HB2OW8');
define('NONCE_KEY',        ')mM4BqxI+Q9bmD!P7AgY');
define('AUTH_SALT',        'OIQXrUT0nB6h9qy7&&DC');
define('SECURE_AUTH_SALT', 'C#%Ar_hZv!rEzxC0K5m$');
define('LOGGED_IN_SALT',   'Wr74rp%$#ySgwy4)9L)n');
define('NONCE_SALT',       'REjY2_FnqL=I$XC3Xa#Q');
define('CONCATENATE_SCRIPTS', false);

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_5fghw6fg2t_';

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
 
 // if(in_array($_SERVER['REMOTE_ADDR'],array('62.219.212.139','81.218.173.175','37.142.40.96','82.102.165.193','207.232.22.164'))) { 
	//define('WP_DEBUG', false);
//} else {
	//define('WP_DEBUG', false);
//}

define('WP_DEBUG', false);

define('WP_CACHE', true);
require_once( dirname( __FILE__ ) . '/gd-config.php' );
define('FS_METHOD', 'direct');
define('FS_CHMOD_DIR', (0705 & ~ umask()));
define('FS_CHMOD_FILE', (0604 & ~ umask()));


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

