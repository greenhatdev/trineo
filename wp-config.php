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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'trineo_wp405' );

/** MySQL database username */
define( 'DB_USER', 'trineo_wp405' );

/** MySQL database password */
define( 'DB_PASSWORD', '25S0]-ipxN' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'mbm4tber6m3y7rcsmebucycdny17ohmlx2fs71ryrplk8npwzfttzruo1tadtxru' );
define( 'SECURE_AUTH_KEY',  'hfy3wpl7rrry4fk5zhbzlnjla417wdlqsvgtmru0ztwolefmqzfpw77wt91hxqvq' );
define( 'LOGGED_IN_KEY',    'gy8rtfmxg4tt1zn7ale7qacbpnt8bnonl20w2qujyvapxfgc6xvi4jwkd8y12gcy' );
define( 'NONCE_KEY',        'kcprjr55j2evjzfxynfbghivbkmore0cmyoq7nq7upitzca6mta0bcspwpwijsbv' );
define( 'AUTH_SALT',        'l4hktqed6yfoixnnxlezrqpt7exv0wnb07lihlszsmuszspg9tkzxd7do7dyggrn' );
define( 'SECURE_AUTH_SALT', 'n2e8af9visqbcx5rp5swxuaie6zgxrpcimnhfqi3xcrpmoppshsljmau6qlx4juz' );
define( 'LOGGED_IN_SALT',   'hdjjke75f6zokj0c3xwlld20dduvfircxdgwrqudhxnacjxppu37pp0kxynm7oeu' );
define( 'NONCE_SALT',       'r7zox5eoax4hm6sr3pixxfkqgqhnwjpafpyyl0imzabjfmmpwbnuxt00ecao9jyx' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpom_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
