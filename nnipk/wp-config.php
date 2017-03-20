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
define('DB_NAME', 'nnipk');

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
define('AUTH_KEY',         '2ddebrbycz3h8nunyvynuak7ytmjvaxgjgdydwifkulnbrxfjsjxwjmyukn6e9k1');
define('SECURE_AUTH_KEY',  'ljdfwhce4mizccwvm8dwobr3iblbcpaanpger8sfwirqu7cg8zghr2greea8ujec');
define('LOGGED_IN_KEY',    '1jajsd9kbajneezzwpkpxlhv2n83vcm11twxc3ujevtknpnc1vu6avw69jhkkm9z');
define('NONCE_KEY',        'shqv0tpb1bhicwclejiy6lrpvmuocxqxlyegapx3pvthvhdh5kzfsezih05e3mhf');
define('AUTH_SALT',        '8qjw4hmhofsdivmzvgflbdagickxndpyhtra5hvcoql4knrcxgc33kqktgkdarqa');
define('SECURE_AUTH_SALT', '6gvqs0zors6kzviabt86wxhktjw5p8mccgwtwvsghei0kh2n06kft8ovo4pm1qvp');
define('LOGGED_IN_SALT',   'fxdckrsg8s8finigkuzmfqobqsgnhfzg6quf2bh4loeawo6yishxma9jme2ewzgz');
define('NONCE_SALT',       'hqptxshppyqz6jgyudrpnbfjbaiwna8tuxn2htde0fch3mvrdwjrrrnfzteogbdx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpbo_';

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
