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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '>D(5SF->*-*K xJavD^m1|xSQ#3$a88og[ _6!ewj#u>=QDWc)oNdj=<#VKlU5|&' );
define( 'SECURE_AUTH_KEY',  'JX#`zpPP8C2tlDL2~KEM.fx_^20$myC-,w<E(mG7+o{]y)|jqP4K8B#z]3Ccf=e~' );
define( 'LOGGED_IN_KEY',    'H/2vmDDDMb(r!A[0c4;$7C3GBl`,zIB5;mN!9g<Y<!mK/8BoRl<6JtG3x(0sp5!8' );
define( 'NONCE_KEY',        ')<3{aUTs<N%<YZ225ip*Z),+Gr3k@1u$oPpR{,PqzMQuh3Xn*;#!~6dDND644;`f' );
define( 'AUTH_SALT',        'lD3NY7)%;f+qG?5x(S2H1j5~a}w{CO%lQV4qFr*yQTq(Rzk8+5_K.J)adq4OB#^[' );
define( 'SECURE_AUTH_SALT', ')uV.|T6ki<S4e{~Wn=M9z3HTI)[I}USFg^uve+qdP0]C~l{%+dC+!y6`gm^=CiA5' );
define( 'LOGGED_IN_SALT',   '%ZtIe1!c1SRA8BKRw.EPh.MgRZMW,Nq ^[y.v<~M>?I=F<6LZHR`JrX) w>kR9!^' );
define( 'NONCE_SALT',       '/[4&a/D!b%.gZ/(`qjj/U r;?P!nq<n IN~!:.4x|9=?UG;qGPNm&~4W}eER_#NP' );

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
