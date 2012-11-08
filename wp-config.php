<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_devshop');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'g|UCd3Jkt0Boy+5%&woE&U(fBWMar4PY{Sdir>YzQ7dUoQ8#pN.WR2Yf%U*G4L/e');
define('SECURE_AUTH_KEY',  'vu&jqGLQKUR}I2u.<GCt4@nk.W@a|lDR1-!zvr6$PWK5cZSiG/6uO88xq&Vl;fjv');
define('LOGGED_IN_KEY',    'sq9`*b;o!+%]vh,~snn`vK1[-<:V5w>o}bVj&f)53]]UuJ1*aZ<>u#S,q|0}AW9-');
define('NONCE_KEY',        'j;N1/Pm!Dtx,bBOSp!eQ&/dV&G+76jvCN.7%){q;U4BHBh;&,;%urU$5J`dx@f6R');
define('AUTH_SALT',        'o2ZDVM$^cf{Wbt=]!4ZTO]eCb@&m`W]={g?`?aQT ht_;7)#d%HWEQ9I6&^.a-.D');
define('SECURE_AUTH_SALT', 'jWC+|>INM,(;hv0ndw~n*~EfN~:D,T||M&pX[NYA=SSv7BH=W#.7lra:Z%BOe`$J');
define('LOGGED_IN_SALT',   'aS)NR.(RgRrP/Xr?l y,#n+5,Gas<_S^1]P3o?4zR;hk^fO,mLqSR:y(5,#FdzHq');
define('NONCE_SALT',       '>hmUDA3/*1TjB&TLFVWS%m]sAF2u{>X^-`d604f[C^~ihnIRa{>;(LjRh*XEAy]6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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

define('WP_DEFAULT_THEME', 'emporium');