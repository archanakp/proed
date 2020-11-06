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
define( 'DB_NAME', 'proeds3f_live' );

/** MySQL database username */
define( 'DB_USER', 'proeds3f_live' );

/** MySQL database password */
define( 'DB_PASSWORD', 'WZii9*63.1m3' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define( 'WP_AUTO_UPDATE_CORE', false );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'FkKIIoFXcteJ6Kblnyo3owzYbmj0K6BHYdpJizMrE3eAz3Pho5uSug89XjWVpy18');
define('SECURE_AUTH_KEY',  'dzFeFbFcjSJVPYoWiZ81yjDvgQ2KbdA45NpMMRx8Ue1HoJ5cqAHHdmfrkns2pvKq');
define('LOGGED_IN_KEY',    'kDHSJhthvcxb3TGsFR1oAhkv7Iha5ydUL3cKIN99PyNWTGNbh6qK5SALoCcnud6E');
define('NONCE_KEY',        'UO9xCFkcNMAmBz4bDfYKDfo2Ret47oR4KdnpUriG9vzdOaNoZZJNuu3imwCXTrCA');
define('AUTH_SALT',        'ZO6aUUhZcSl4ddPFpVfy0tPcqQRhH1vYdJ2UMlMbyoYEQSbCuq6JxQj0JFoLtNYc');
define('SECURE_AUTH_SALT', '87YdVxMks0Reh25EKKlsJdPYO58CBA1kKGA1kdcHaGooXU7GoPEcTjOiaXBAjdLF');
define('LOGGED_IN_SALT',   'Wnf9Nfp215vGZ4bUbk2v1agwNS4XL5Zq1gSnifwxvHNE3w3pKHa5Rc56hl7oowtX');
define('NONCE_SALT',       '0OhKenvlbp8cb0w8dmqZJBRH5GDH5ZCB0PG5K7GeaetRrHY07CIU8bi8re2yjng1');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed externally by Installatron.
 * If you remove this define() to re-enable WordPress's automatic background updating
 * then it's advised to disable auto-updating in Installatron.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
