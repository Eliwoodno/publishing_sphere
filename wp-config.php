<?php

// BEGIN iThemes Security - Ne modifiez pas ou ne supprimez pas cette ligne
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Désactivez l’éditeur de code - iThemes Security > Réglages > Ajustements WordPress > Éditeur de code
// END iThemes Security - Ne modifiez pas ou ne supprimez pas cette ligne

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
define('DB_NAME', 'wp_publishing_sphere');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '@d>9(;xV$>[1Vu{#Y<PLXjjLE$ !!B+qBqI7<TgjCd2O5MzGgK|DtM>@P1@AW{e)');
define('SECURE_AUTH_KEY',  ';fd36H_ZZsTE[XGz4LDGo_l)f%B54ZTj&yv(%[Vryr`~ipiz_Ldi]t:WbUb5Erac');
define('LOGGED_IN_KEY',    ',w1E.Ca0hkwsErADVekOgD:&(n<!3w;kSBm4G^D#VYa.ty)v*}h&[J:K<UffE|A0');
define('NONCE_KEY',        'LUX=7{!T#q(gIcVe|5t(-8Oe8bk};~P[MwN%,_4A<tlB0((3&dEmzquB$t(A[Q-M');
define('AUTH_SALT',        'E^~%)-365TBGwN#`G7/sClc~Bz{|*41gf,%R|NYIgzZID,FB!Jok$WP0T]Hh#hu[');
define('SECURE_AUTH_SALT', ']qH8;WjPHPI%b~N.NwOXBek|;@*-oZ<EdQcEE2XW6;~UBkJ6p6K4;)#Jchedi72N');
define('LOGGED_IN_SALT',   'DDOi:MsRnvXkux+C9erB8MB@cOaau-oN=ff>XWD(/i:&6J66H8i{mqD_+Ep_1gq/');
define('NONCE_SALT',       '?t>+smnwY$Bz2-e~XzCs<a8XLTR,fYn*2uZ::VFNO~}e*ai6mB~Qn?*-]ie+%_;e');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_publishing_sphere';

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
