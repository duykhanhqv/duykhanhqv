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
define( 'DB_NAME', 'khanhmoc_wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '{3 ]W2@>4kIUCUqE[^~#k4^DcBU#chg8KMLi+i[f#sdG(YvRgu6Hl+j@ .F|!dG_' );
define( 'SECURE_AUTH_KEY',  'gD.F5 AtI6us+_E[_jjp&/2Q]=ov/B^>uI[~B0o}^xFTt@7.M|AC &ez)( `:YX_' );
define( 'LOGGED_IN_KEY',    '%l%vMHm4rMpN$K;Ma.:ZG2@:vW/ecA#XaPWL hYwb*9KW6N~.QhZw/E_vKC~0rEZ' );
define( 'NONCE_KEY',        'cN+7Sjk.Jtxm!QY4xK8_Mn8m21/AXd8Pw-Y,%a?eD72Cd%P9:.:/Y<O5$qb}nCu=' );
define( 'AUTH_SALT',        '[MpS?2FMk_1HV>ZGbDA[$`yol*Ac8)NUoQ*5t|VpD~NC;QpKwAK}HPs#khs[lMLp' );
define( 'SECURE_AUTH_SALT', '^7$N$N~%f(ZgRb(M]DQh.Giije TQ7yu.R^jG=n;#95_<J,)=jEjHLm|]![fC]W$' );
define( 'LOGGED_IN_SALT',   '-xtD%#1To~`ETTB,l6Zf9SXUxL~rVMNc^a<aquEd!U%=&uBQSTUNAMv[W|Ua~3=J' );
define( 'NONCE_SALT',       'Q|6x/#l*t!ImD%sx%tC{8/./gCwVZ)i=F0U(~KdjsP|2ZYq{d C:g.?b4vKm%K=g' );

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
