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
define('DB_NAME', 'murabha');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'rootroot');

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
define('AUTH_KEY',         'DaoU.Bb@h%nquScwhPW=oTT=v<OUfM(L>F!9M%.m*1lc9Tm(#wd@NJ6>odI+@X,f');
define('SECURE_AUTH_KEY',  'g}7W4-$~0dH+t$mgvOkUR`M)QUo5U.ggO<fn70t}Hklp:)+|vDE=])Ckmd;]FcMD');
define('LOGGED_IN_KEY',    '2AR4@i6Sn#p|J1&@T7.&8fUe_X,qp_2V ~:+?*6.Gf;mKjm+,;`V7IR`f^ZpFEfG');
define('NONCE_KEY',        'Zc^ebxG|C;:2:|0x^ONfunN@y0}bzJjz5<|APmcZqCi.?DIgk1IGFX()u`{|Mjs5');
define('AUTH_SALT',        'i#^<#pTsd{0IjJkXV|0ID=K@U4-_$cMq)H@,ll?)|*d>c(uvw{wtwkb,wh~#1G,f');
define('SECURE_AUTH_SALT', 'k1g:{B,7Nz$3K[}k{]0D=$!c%-sy>)!%o[km^Vo}Nh(lo.=DUkoVOQ!;?#,I&1CT');
define('LOGGED_IN_SALT',   'ld}bsj!j:D/-{SIHKy5={gf #j2]$gwdu_e]ao4/YRzR^U07_p#7>-q+EN*ps=@`');
define('NONCE_SALT',       '9(3&XV(>7LRG(O;cA`r;W4AYv%ZGAF0WW7Kb!G81PTgtxNor!Q*B(1EQ$#.R]l#D');

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
