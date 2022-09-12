<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_suetech' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'TIosPUs<V]AlFP_3SKs/jS>A`XX}m>/M0c,lfm_^GBp+cp,r=0^]ouM6$CB8ZrJ`' );
define( 'SECURE_AUTH_KEY',  '_e!A!n(xnyO: ^/WCtGg^NTfZ#SN7BgOn`j8e.ri8;!bB+|SBhSb_joAND;*!L?q' );
define( 'LOGGED_IN_KEY',    'L>#gh>c0#@;F>`eZYeez/A1c`!aaP)MW3EaKFv2]zQn6?nLqY1MNRzOiSG#w$DfQ' );
define( 'NONCE_KEY',        'Zy:(_gu812<7  _+c@cuHY;d=EkRgixp+D]x!(e>hivhg4Pp;h`dg?=9v;>o/oem' );
define( 'AUTH_SALT',        'y;GX4>tNo76f3!Mw$.@X$WUOGAr}L:Uv%`%8IO|+%]T{,GzYlgl&nhsRKH}38)++' );
define( 'SECURE_AUTH_SALT', 'P`<{}#A_w.+<#M+zec,_^559k4L$>%%]ud21HsWJR%F[{)8xPIFUx23fGrXws-)|' );
define( 'LOGGED_IN_SALT',   'O-`IT1/Pk{OQI]yy0.NW{gm|F3OsDH%0F)%.;4-,)>|htV${Z3tvYV_o~oh(<i<0' );
define( 'NONCE_SALT',       'a|2KH{[YOGqPp&q:ycq:s~g(e7E[;sg*/C%q%.~5HwR;!r[tl.Rx4E1hj8#&6I(`' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
