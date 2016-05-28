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
define('DB_NAME', 'devon');

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
define('AUTH_KEY',         'p]?BW^!BStfBz:m{Sl$K%ZA- tQH){=sP.rg98zZCO8?HT+r{8jjw+Z3!qM1R|NI');
define('SECURE_AUTH_KEY',  'kXFE4Bud?U`]:3]AU+rP,giG0vO:LnW10<Hldgd<<;7=KF2RQ*JaZV_Ra.E4dpf3');
define('LOGGED_IN_KEY',    ' D9_![f]k}#<Gp{$Z~h~eNSmi`/mR-{GCZ4_MTnNC*0Pb;s76F}b$I&@H2fpQTV;');
define('NONCE_KEY',        '`>T(OnZ<KsJa+QwV.2Q2x[V-KW),w9RHI sNO5q+/knJ.R(l)uzHl4qkP+b/OuvS');
define('AUTH_SALT',        'JJ+%{zcLhyOWTOA~XY4!O0uvA?k[/Bz.YOBFm]d<U&xnW5O_uo)x-uuwwE&Ee~SS');
define('SECURE_AUTH_SALT', 'kbm+(R3jY*iuV^s=k2E*JgTYXts/JCVu|1D/9u-dlB..m.?qmT=LWb*feE8gp@<2');
define('LOGGED_IN_SALT',   '2HD[F1X#I`f 3x;L:~gnuH0-.q:>4j}<V30BJm7Y@UH}]Tarh`8?)jm_%IqN~$s6');
define('NONCE_SALT',       '7gfzEu@$c4XO?MJ`IspF-i38Z37N#74:k!;y{a4TUtQ:B~G,m5XW!}U<cdNJW1Vl');

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
