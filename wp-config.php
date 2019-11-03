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
define( 'DB_NAME', 'wpmtaani' );

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
define( 'AUTH_KEY',         'S} 69S9:3?c^[Y+HW& 5@[?h4-qj+r)_rR[]}[Q>[_pG~hG,%~E0!DVVB}bp}UW#' );
define( 'SECURE_AUTH_KEY',  '!`(]xiYdEP].vWj*of=O[q1$oUPQ>T#@l!gc2W7OiDi4d5=L c+6zYr0nW7zh7(9' );
define( 'LOGGED_IN_KEY',    '~1ea#[y?[&K!4F[D.%:KuzVL6 A{.]ncN<hmsWqrg8?Bq8jV.}<{3[YEXqWl#7Zg' );
define( 'NONCE_KEY',        'KmoIAWJ;26#G)r;8%:.m8]2Ni}d,K?i&Qcs>A5m%3*}a,*E?)n-V#/[CvLq@S.RU' );
define( 'AUTH_SALT',        'h%pgUUOiPtCEp4C&zX;!A3]ALgqO%zv@&P2*M|h1ZLlHCKSMb6WB~?4^U,Q{bgsb' );
define( 'SECURE_AUTH_SALT', 'HaaWO/~JM@#+BLQHj<V_} -5P9KP{I~F|6<7&.pOjl0dfl7juGfJ>[s#onNv4l}k' );
define( 'LOGGED_IN_SALT',   'HS(GHk<I+E@OTa&A7bbm}vktdMkuks%2%|e2st,Rea=yBe8WzglR.8S #J_d<Z2Z' );
define( 'NONCE_SALT',       'o!m0|Lrspuewgd<{!9b6mz3$!n/9]NV<LDnis)$<-CdC5|BiyqOPcoTDDmX8DV,M' );

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
