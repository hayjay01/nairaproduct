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
define('DB_NAME', 'nairapro_wp308');

/** MySQL database username */
define('DB_USER', 'nairapro_wp308');

/** MySQL database password */
define('DB_PASSWORD', '5y3Q!S1.2p');

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
define('AUTH_KEY',         'k7wbypd3pygz2g44sxulkf2t4rmp0ieyibpasayjnwx5eatipw5gnqexwfddneqz');
define('SECURE_AUTH_KEY',  '4zcegtgintpdmiemyf3nk3sguv8efdhq18r9nyoxjowjfpuvvdpmmmt6coexkvj1');
define('LOGGED_IN_KEY',    'a2lmsupd4mnypo9ayb4pk5hcxozeqfnc6hnfsvwun431ireu9vnfhu3bv7qkhfiz');
define('NONCE_KEY',        '68bbrhqdj4k26rfk95jvzp8ona7f0bymourcssayk7wutayja4regbsaqwff2toc');
define('AUTH_SALT',        'tqziigyektlwk5nbla3pi2utrltdf95ryukl2rzumeabjx9tsqscwglpzlb6nneb');
define('SECURE_AUTH_SALT', 'os4hytlbbrjrj2msqqdlx9sctpo1icy9plybgmphcwhsuirfotz15ou0k2yitctk');
define('LOGGED_IN_SALT',   'ebvlibjdi3rk3gi9ih9fuexvdcgumwtlnmd4t7sxlgbmuhv2q0gtmn6m7lmvjju3');
define('NONCE_SALT',       'fboq3ai5okpr2m44jfem265emwjpgrmlmqvhbm4bjjvu6tuet8quq8rhspmtmanm');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp1w_';

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
