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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'e>WzA7[ml3Uv2[{{Y6T3ZN5W@o{rcuvG{Y>KWdPGu0bL,qi}eP,AUX#.3H:u!o} ' );
define( 'SECURE_AUTH_KEY',   'c?-:P`alBhiv?y6q8eJ=fQX7`ewnVaq<}<9H~F=Lb%}>pUe/o}pl.@TVs$Z4=X@k' );
define( 'LOGGED_IN_KEY',     'o5&`7Z@m,+n=k|!RQ@zqa/>O9=`G$:D=$xkxIZ<Ha*MS{!`je2;}xG#6OSo@-gMi' );
define( 'NONCE_KEY',         '8XH`!-l1#$.,qChpB/qa?v:/LE$=G$3(9[S9I$rMlOE>_b%j OIFvX^wX],+>{Iz' );
define( 'AUTH_SALT',         'gAX=?Gu=e!][plH(xvX@u#;0Z/cRFHA9rML.[5#(qx?hI_J3Wp%%^n6lNv6NSxsS' );
define( 'SECURE_AUTH_SALT',  'L#X _g<++<qT0eIV1$`Qrp5z$pw_QIcN*NOy~1^+,R`MVI3=f~ x8GG/Kb?DN+Bs' );
define( 'LOGGED_IN_SALT',    'l1tQl83HPTeN84#dFYsXl>*Vh^j[iM:f_K>]g|BP2SvXVB{}9>DT2Q(vLI2EG!Gz' );
define( 'NONCE_SALT',        '8b6xm7)3OH.Rgkd*Sd&)4I-mU5* KS3(J.fg^{Q+ivC#Pv7xkMZ&^lj6(u&{|b*`' );
define( 'WP_CACHE_KEY_SALT', 'J@;j)R)SokIOp:S2&r),/{6Ak+DYraSAz/-))#+y8C=(sno0GE{v(Y),H48%Dbjj' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
