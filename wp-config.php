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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'website_02' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'f,3t!@+Q[FW^].RDc-(n4&i137Q`0d`%^:e!vAbwx&<=K[r6O*~kRua~T.U!`p4%' );
define( 'SECURE_AUTH_KEY',  'D U).Dzr3iEADnuz`Ix3J%|Qf=AmsGB#<MvTY#P_M&`#&uXw!B?`X.]t<Nef:#h;' );
define( 'LOGGED_IN_KEY',    '3SCpslZ*!MKL1HacG +G,{g%D~Un%p)dn(uGuc,5*W46m4cWZG-;8bniT=:pc&oU' );
define( 'NONCE_KEY',        'j66gH)9wbUd8l31CU=c%@U-@zg|Lkhaj*<3QS:-MOkwQd6:1nSmFNqgr&#JGd`oq' );
define( 'AUTH_SALT',        'b)&VE]QkoT=&@Puu1pmdOeBJ,fi`/L2Jm.EAz#R`R|er_IbntVKjLN0.WT%Cy@q/' );
define( 'SECURE_AUTH_SALT', 'oslx7?Pno^NVD_dk^-GQy+5yxlA^PrN4--f;cWIhO8Y8S)}%i3mC1YP$O.vP%720' );
define( 'LOGGED_IN_SALT',   'YrV*ris,`aPV5DXXRM)xN~hxdm-]GKrkrbPULJAb8b:(||=H(OLCtn_#XDQ*TN&d' );
define( 'NONCE_SALT',       '(ecYEP:{Nb%%]PConSP/b~8ZC(A#NW0u-LARKzh-)kXYdq_(ec73bDH45hueM+>c' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
