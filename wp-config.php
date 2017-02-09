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
define('DB_NAME', 'wp-vi-1-08');

/** MySQL database username */
define('DB_USER', 'wp-vi-1-08');

/** MySQL database password */
define('DB_PASSWORD', '1111');

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
define('AUTH_KEY',         'Kbg|+[lR|AhiV:Km>g5?G!M+Jx~yOyD$(pIi:~>%0|d2d-H|Ec]Q&,B/{Xf4L;QA');
define('SECURE_AUTH_KEY',  'Fs0&[KCj*D=$[M~z~P +*L!J=Ux%_b3^PypmU$hs=jz$yUSPD-~S9u4=27)z@q?!');
define('LOGGED_IN_KEY',    'e&CYj+w>L)h_4fAyb.c3)*h}212phz)RI<5{n0/jqo{^M5| 2vLQjh2a8~}w3KNz');
define('NONCE_KEY',        '}GdVj:!Ka3S:V+s~FJ|:eY<xH1EWj|^qb<_o*f7`_>!O[<fswj}9C@cHEy `=_Z8');
define('AUTH_SALT',        '[$*s#MZ7Zn+`=$AZY$IkKeT/(yjtE%56}&@VxC;9KKnEbN)p0usaN].(;h|8=W^+');
define('SECURE_AUTH_SALT', 'mI<|q3m~XusR?<S-@%8 :`~p,yRnAlo,Dtl5pSFalr!xC{S?e3)o-Ayx=jF*yoEi');
define('LOGGED_IN_SALT',   '(5n 4&Tt2k.Ph8aNhkYaMA431 PG l#$B38.%<JG/4kVOaSw9j=qKQc!PDVW]Xfu');
define('NONCE_SALT',       '(wG;e@3Cv-D-h+}he=fD2vYN<,7<O#]hE]Evr7H^Z,ICy]LUlW)U:1oP4Ex3OWv+');

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
